<?php
class Crud_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    } 

    // function get_person_list_group_by_travel() {
    //     $subquery = "(SELECT MAX(id) AS max_id, person_id FROM travel_information GROUP BY person_id) t";
        
    //     $this->db->select("p.*, ti.gone_dirction as gone", False);
    //     $this->db->from($subquery);
    //     $this->db->join('personal_information p', "t.person_id = p.id");
    //     $this->db->join('travel_information ti', "t.person_id = ti.person_id AND t.max_id = ti.id");
    //     $this->db->where('ti.status !=','2');
    //     $this->db->order_by('ti.id', 'desc');
    //     $this->db->limit(5);
        
    //     return $this->db->get()->result();
    // }
    function get_person_list_group_by_travel() {
        $sql = "SELECT p.*,t.gone_dirction 
                FROM personal_information p 
                JOIN (
                    SELECT t1.person_id, t1.gone_dirction
                    FROM travel_information t1
                    JOIN (
                        SELECT person_id, MAX(id) AS max_travel_id
                        FROM travel_information ti
                        GROUP BY person_id
                    ) t_max ON t1.id = t_max.max_travel_id
                )t ON t.person_id = p.id";
        $query = $this->db->query($sql);
        $data = $query->result();
        return $data;
    }

    function get_person_count_group_by_travel() {  
        $this->db->select("count(id) as count", False);
        $this->db->from('travel_information'); 
        $this->db->where('status !=','2');
        $this->db->group_by('person_id');
        $this->db->order_by('id', 'desc');  
        return $this->db->get()->result();
    }

    function get_person_list_no_limit_group_by_travel() {
        $subquery = "(SELECT MAX(id) AS max_id, person_id FROM travel_information GROUP BY person_id) t";
        
        $this->db->select("p.*, ti.gone_dirction as gone", False);
        $this->db->from($subquery);
        $this->db->join('personal_information p', "t.person_id = p.id");
        $this->db->join('travel_information ti', "t.person_id = ti.person_id AND t.max_id = ti.id");
        $this->db->where('ti.status !=','2');
        $this->db->order_by('ti.id', 'desc'); 
        
        return $this->db->get()->result();
    }

    function get_person_list_limit_group_by_travel($limit, $offset, $param) {
        $subquery = "(SELECT MAX(id) AS max_id, person_id FROM travel_information GROUP BY person_id) t";
        
        $this->db->select("p.*, ti.gone_dirction as gone", False);
        $this->db->from($subquery);
        $this->db->join('personal_information p', "t.person_id = p.id");
        $this->db->join('travel_information ti', "t.person_id = ti.person_id AND t.max_id = ti.id");
        // $this->db->where('ti.status !=','2');
        $this->db->where($param);
        $this->db->order_by('ti.id', 'desc'); 
        $this->db->limit($limit, $offset);
        
        return $this->db->get()->result();
    }

    function get_total_count_traveller_group_by_person($param){
        $this->db->select('COUNT( DISTINCT ti.person_id ) as total');
        $this->db->from('travel_information ti');
        // $this->db->where('status !=','2');
        $this->db->where($param);
        $result = $this->db->get()->row();
        return $result->total;
    }

    function get_travel_detail_list_of_person($where) { 
        
        $this->db->select("*", False);
        $this->db->from('travel_information'); 
        $this->db->where($where);
        $this->db->order_by('id', 'desc'); 
        
        return $this->db->get()->result();
    }

    function get_travel_detail_count_of_person($where) {
        // $subquery = "(SELECT MAX(id) AS max_id, person_id FROM travel_information GROUP BY person_id) t";

        $this->db->select("count(*) as count", False);
        $this->db->from('travel_information'); 
        $this->db->where($where);
        $this->db->order_by('id', 'desc'); 
        
        $result = $this->db->get()->row();
        return $result->count;
    }


    function search_front($search_word,$per_page,$offset)
    {
        $conditions = array();

        if (!empty($search_word)) {

            $conditions[] = '	vw_front_search.title  LIKE "%' . $search_word . '%"';
            $conditions[] = '	vw_front_search.description  LIKE "%' . $search_word . '%"'; 
            $sqlStatement = "SELECT * FROM 	vw_front_search WHERE ".implode(' OR ', $conditions)." ORDER BY vw_front_search.module_name ASC LIMIT $per_page";
            $result = $this->db->query($sqlStatement)->result();
        }else{
            $result = [];
        }

        return $result;
    }
    
    function count_search($search_word)
    {
        // $search_word = $this->session->userdata('search_word');

        $conditions = array();

        if (!empty($search_word)) {

            $conditions[] = '	vw_front_search.title  LIKE "%' . $search_word . '%"';
            $conditions[] = '	vw_front_search.description  LIKE "%' . $search_word . '%"'; 
            $sqlStatement = "SELECT count(title) as total FROM 	vw_front_search WHERE ".implode(' OR ', $conditions);
            $result = $this->db->query($sqlStatement)->row();
            
            $total = isset($result->total)?$result->total:0;
        }else{
            $total = 0;
        }

        return $total;
    }
    
    public function get_module_function($module_name, $function_name)
    {
        $where = array(
            'a.module_name' => $module_name,
            'a.status' => '1',
            'b.function_name' => $function_name,
        );
        $this->db->select("a.module_name, b.function_name, b.id as module_function_id", False);
        $this->db->from('module a');
        $this->db->join('module_function b', "b.module_id = a.id");
        $this->db->where($where);
        return $this->db->get('')->row();
    }

    public function get_module_function_for_role($module_name, $function_name)
    {
        $check_module_dissable = $this->db->get_where('module', array('module_name' => $module_name))->row();
        if (isset($check_module_dissable->status) && $check_module_dissable->status == '1') {
            $current_user = $this->auth->current_user();
            // var_dump($current_user->role_id);
            // exit;
            $sql = "SELECT a.* FROM module_function_role a LEFT JOIN module_function b ON a.module_function_id = b.id LEFT JOIN module c on c.id=b.module_id WHERE c.module_name = '$module_name' AND b.function_name = '$function_name' AND role_id = $current_user->role_id ";
            $query = $this->db->query($sql);
            $data = $query->row();
            if ($data) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function get_module_for_role($module_name)
    {
        $check_module_dissable = $this->db->get_where('module', array('module_name' => $module_name))->row();
        if (isset($check_module_dissable->status) && $check_module_dissable->status == '1') {
            $current_user = $this->auth->current_user();
            
            $sql = "SELECT a.* FROM module_function_role a LEFT JOIN module_function b ON a.module_function_id = b.id LEFT JOIN module c on c.id=b.module_id WHERE c.module_name = '$module_name' AND role_id = $current_user->role_id ";
            $query = $this->db->query($sql);
            $data = $query->row();
            
            if ($data) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function count_all_data($table, $data)
    {
        $this->db->select('count(id) as total')->from($table);
        foreach ($data as $key => $val) {
            if ($key == 'approved_by') {
                if ($val == "1") {
                    $this->db->where('approved_by !=', '');
                } else if ($val == "0") {
                    $this->db->where('approved_by', '');
                } else {
                }
            } else {
                if ($val != '') {
                    $this->db->where($key, $val);
                }
            }
        }
        $this->db->order_by("id", "desc");

        $query = $this->db->get();

        $q = $query->row();
        // echo $this->db->last_query();
        // exit;
        return $q;
    }

    public function get_all_data($table, $data, $limit, $offset)
    {
        $this->db->select('*')->from($table);
        foreach ($data as $key => $val) {
            if ($key == 'approved_by') {
                if ($val == "1") {
                    $this->db->where('approved_by !=', '');
                } else if ($val == "0") {
                    $this->db->where('approved_by', '');
                } else {
                }
            }else if ($key == 'PageTitle' || $key == 'PageTitleNepali' || $key == 'department_name' || $key == 'department_code'|| $key == 'designation_code' || $key == 'designation_name'|| $key == 'name'|| $key == 'email' || $key == 'sh_name'  || $key == 'user_name' || $key == 'title') {
                if ($val != '') {
                    $this->db->like($key, $val);
                }
            }else {
                if ($val != '') {
                    $this->db->where($key, $val);
                }
            }
        }
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $offset);
        $query = $this->db->get();

        $q = $query->result(); //echo $this->db->last_query();exit;
        return $q;
    }

    
    public function getAll($table, $where, $limit, $offset)
    {
        $blogs = $this->db->select('*')->from($table)->where($where)->limit($limit, $offset)->get('')->result_array();
        return $blogs;
    }
    public function get_single($table, $where)
    {
        $blog = $this->db->select('*')->from($table)->where($where)->get('')->row();
        return $blog;
    }

    public function insert($table, $data)
    {
        $result = $this->db->insert($table, $data);
        if ($result) {
            return true;
        } else { 
            return false;
        }
        
    }

    public function update($table, $data, $array)
    {
        $result = $this->db->update($table, $data, $array);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function get_where($table, $where)
    {
        $result = $this->db->order_by('id', 'DESC')->get_where($table, $where)->result();
        return $result;
    }

    public function get_where_order_by($table, $where, $order_by, $order_value)
    {
        $result = $this->db->order_by($order_by, $order_value)->get_where($table, $where)->result();
        return $result;
    }

    public function get_where_single($table, $where)
    {
        return $this->db->get_where($table, $where)->row();
    }

    public function get_where_single_order_by($table, $where, $order_by, $order_value)
    {
        $result = $this->db->order_by($order_by, $order_value)->get_where($table, $where)->row();
        return $result;
    }

    public function get_where_single_order_by_with_offset($table, $where, $order_by, $order_value, $offset)
    {
        $result = $this->db->order_by($order_by, $order_value)->get_where($table, $where, 1, $offset)->row();
        return $result;
    }

    public function count_all($table, $where, $field)
    {
        $total = $this->db->select('count(' . $field . ') as total')->from($table)->where($where)->get()->row();
        return $total->total;
    }
    
    public function count_all_services($table, $where, $field, $subcategories)
    {
                $this->db->select('count(' . $field . ') as total');
                $this->db->from($table);
                $this->db->where($where);
                
                $this->db->group_start();
                foreach($subcategories as $key=>$val){
                    if($key = 0){
                        $this->db->where('service_cat_id',$val);
                    }else{
                        $this->db->or_where('service_cat_id',$val);
                    } 
                }
                $this->db->group_end();
                
                 $total = $this->db->get()->row();
        return $total->total;
    }

    public function get_where_pagination($table, $where, $limit, $offset)
    {
        $result = $this->db->order_by('id', 'DESC')->get_where($table, $where, $limit, $offset)->result();
        return $result;
    }
    
    public function get_where_pagination_service($table, $where, $limit, $offset, $subcategories)
    {
        // $result = $this->db->order_by('id', 'DESC')->get_where($table, $where, $limit, $offset)->result();
        // return $result;
        
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        
        $this->db->group_start();
        foreach($subcategories as $key=>$val){
            if($key = 0){
                $this->db->where('service_cat_id',$val);
            }else{
                $this->db->or_where('service_cat_id',$val);
            } 
        }
        $this->db->group_end();
        
        $this->db->order_by("id", "DESC");
        $this->db->limit($limit, $offset);
        
         $result = $this->db->get()->result();
        return $result;
    }

    public function get_where_pagination_order_by($table, $where, $limit, $offset, $order_by, $type)
    {
        $result = $this->db->order_by($order_by, $type)->get_where($table, $where, $limit, $offset)->result();
        return $result;
    }

    function createUrlSlug($urlString)
    {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
        return $slug;
    }

    public function menuTree($parent_id = 0, $html = '')
    {
        $menus = $this->crud_model->get_where_order_by('contents', array('status' => '1', 'show_on_menu' => 'Yes', 'parent_id' => $parent_id), 'order_no', 'ASC');
        if (count($menus) > 0) {
            $html = '';
            foreach ($menus as $row) {
                $subMenus = $this->crud_model->get_where_order_by('contents', array('status' => '1', 'show_on_menu' => 'Yes', 'parent_id' => $row->id), 'order_no', 'ASC');
                if (count($subMenus) > 0) {
                    $html  .= '<li class="dropdown"><a href="#"><span>' . $row->title . '</span> <i class="bi bi-chevron-right"></i></a>
            
                                    <ul>  
                                    ';
                    $html .= $this->menuTree($row->id);
                    $html .=   '    </ul>
                              </li>';
                } else {
                    $html .= '<li><a href="#">' . $row->title . '</a></li>';
                }
            }
        }
        return  $html;
    }

    public function joinDataSingle($table, $join_table, $where, $key_table, $referencekey, $joinField)
    {
        $this->db->select("$table.*,$join_table.$joinField", False);
        $this->db->from($table);
        $this->db->join($join_table, "$join_table.$referencekey=$table.$key_table");
        $this->db->where($where);
        return $this->db->get('')->row();
    }

    public function joinDataMultiple($table, $join_table, $where, $key_table, $referencekey, $joinField)
    {
        $this->db->select("$table.*,$join_table.$joinField", False);
        $this->db->from($table);
        $this->db->join($join_table, "$join_table.$referencekey=$table.$key_table");
        $this->db->where($where);
        return $this->db->get('')->result();
    } 
    
    public function get_district_detail_with_province($district_id)
    {
        $this->db->select("districts.title as district, provinces.title as province", False);
        $this->db->from('districts');
        $this->db->join('provinces', "provinces.id=districts.province_id");
        $this->db->where('districts.id', $district_id);
        return $this->db->get('')->row();
    }
    
    public function get_banners()
    { 
        $this->db->select("DocPath as file, file_type", False);
        $this->db->from('tbl_banners'); 
        $this->db->where('status','1');
        $this->db->where('file_type !=','digital_slider');
        $this->db->order_by('BOrder','DESC');
        $this->db->limit(10,0);
        return $this->db->get('')->result();
    }
    
    public function get_digital_slider()
    { 
        $this->db->select("DocPath as file, file_type", False);
        $this->db->from('tbl_banners'); 
        $this->db->where('status','1');
        $this->db->where('file_type','digital_slider');
        $this->db->order_by('BOrder','DESC');
        $this->db->limit(3,0);
        return $this->db->get('')->result();
    }
    
    public function get_news_slider_en()
    { 
        $this->db->select("CoverImage as file, Description, slug", False);
        $this->db->from('tbl_news'); 
        $this->db->where('status','1');
        $this->db->where('is_slider','Yes');
        $this->db->order_by('id','DESC');
        $this->db->limit(4,0);
        return $this->db->get('')->result();
    }
    
    public function get_news_slider_np()
    { 
        $this->db->select("CoverImage as file, DescriptionNepali, slug", False);
        $this->db->from('tbl_news'); 
        $this->db->where('status','1');
        $this->db->where('is_slider','Yes');
        $this->db->order_by('id','DESC');
        $this->db->limit(4,0);
        return $this->db->get('')->result();
    }
    
    public function get_news_en()
    { 
        $this->db->select("CoverImage as file, Title, created_on, slug", False);
        $this->db->from('tbl_news'); 
        $this->db->where('status','1');
        $this->db->where('is_slider','No');
        $this->db->order_by('id','DESC');
        $this->db->limit(4,0);
        return $this->db->get('')->result();
    }
    
     public function get_all_news_en( $where, $limit, $offset, $order_by, $type)
    { 
        $this->db->select("CoverImage as file, Title, created_on, slug", False);
        $this->db->from('tbl_news'); 
        $this->db->where($where);
        $this->db->order_by($order_by,' $type');
        $this->db->limit($limit, $offset);
        return $this->db->get('')->result();
    }
    
    
    public function get_news_np()
    { 
        $this->db->select("CoverImage as file, TitleNepali as Title, created_on, slug", False);
        $this->db->from('tbl_news'); 
        $this->db->where('status','1');
        $this->db->where('is_slider','No');
        $this->db->order_by('id','DESC');
        $this->db->limit(4,0);
        return $this->db->get('')->result();
    }
    
    public function get_videos_en()
    { 
        $this->db->select("title, youtube_link, featured_image", False);
        $this->db->from('videos'); 
        $this->db->where('status','1'); 
        $this->db->order_by('id','DESC');
        $this->db->limit(3,0);
        return $this->db->get('')->result();
    }
    
    public function get_videos_np()
    { 
        $this->db->select("title_nepali as title, youtube_link, featured_image", False);
        $this->db->from('videos'); 
        $this->db->where('status','1'); 
        $this->db->order_by('id','DESC');
        $this->db->limit(3,0);
        return $this->db->get('')->result();
    }
    
    public function get_popups()
    { 
        $this->db->select("DocPath as file", False);
        $this->db->from('tbl_popup'); 
        $this->db->where('status','1');
        $this->db->where('Type','PC');
        $this->db->order_by('serial','asc');
         $this->db->order_by('Serial','ASC');
        // $this->db->limit(4,0);
        return $this->db->get('')->result();
    }
     public function get_sql_all($table, $where, $order_by, $type, $limit, $offset,$sql)
    {  
        $this->db->select($sql, False);
        $this->db->from($table); 
        $this->db->where($where); 
        $this->db->order_by($order_by,$type);
        $this->db->limit($limit,$offset);
        return $this->db->get('')->result();
    }
    
     public function get_sql_all_no_pagination($table, $where, $order_by, $type, $sql)
    {  
        $this->db->select($sql, False);
        $this->db->from($table); 
        $this->db->where($where); 
        $this->db->order_by($order_by,$type); 
        return $this->db->get('')->result();
    }
    
    public function get_sql_single($table, $where, $order_by, $type,$sql)
    {  
        $this->db->select($sql, False);
        $this->db->from($table); 
        $this->db->where($where); 
        $this->db->order_by($order_by,$type); 
        return $this->db->get('')->row();
    }
    
    public function get_forex($date){
        $this->db->select("forex_date.date_forex, forex_data.iso3, forex_data.name, forex_data.unit, forex_data.buy, forex_data.sell",FALSE);
        $this->db->from('forex_date');
        $this->db->join('forex_data', "forex_date.id = forex_data.forex_date_id");
        $this->db->where('forex_date.date_forex',$date);
        
        return $this->db->get('')->result();
    }

    //bikash
    function getField($table, $param, $field)  {
        $detail = $this->getDetail($table, $param, $field);
        return $detail->$field;
    }

    function getDetail($table, $param, $field = '*') {
        $sql = $this->db;
        $sql->select($field);
        if($param){
            $sql->where($param);
        }
        $sql->order_by('id DESC');
        return $sql->get($table)->row();
    }
    public function total($table, $param, $like, $field = 'id')
    {
        $sql = $this->db;
        $sql->select('count(' . $field . ') as total');
        if($param){
            $sql->where($param);
        }
        
        if($like){
            $sql->like($like);
        }
        $total = $sql->get($table)->row();
        if($total){
            return $total->total;
        }
        return 0;
    }

    public function getData($table, $param, $like, $limit, $offset, $field = '*', $order_by = 'id DESC')
    {
        $sql = $this->db;
        $sql->select($field);
        if($param){
            $sql->where($param);
        }

        if($like){
            $sql->like($like);
        }

        if($limit){
            $sql->limit($limit, $offset);
        }
        
        if($order_by){
            $sql->order_by($order_by);
        }

        return $sql->get($table)->result();
    }

    public function getTotal($table, $param, $inparam, $inField, $field = 'id')
    {
        $sql = $this->db;
        $sql->select('count(' . $field . ') as total');
        if($param){
            $sql->where($param);
        }
        
        if($inparam){
            $sql->where_in($inField, $inparam);
        }
        $total = $sql->get($table)->row();
        if($total){
            return $total->total;
        }
        return 0;
    }

    public function getAllData($table, $param, $inparam, $inField, $limit, $offset, $field = '*', $order_by = 'id DESC')
    {
        $sql = $this->db;
        $sql->select($field);
        if($param){
            $sql->where($param);
        }

        if($inparam){
            $sql->where_in($inField, $inparam);
        }

        if($limit){
            $sql->limit($limit, $offset);
        }
        
        if($order_by){
            $sql->order_by($order_by);
        }

        return $sql->get($table)->result();
    }
    
    public function getDataArray($table, $param, $field = '*', $order_by = 'id DESC')
    {
        $sql = $this->db;
        $sql->select($field);
        if($param){
            $sql->where($param);
        }
        if($like){
            $sql->like($like);
        }
        if($limit){
            $sql->limit($limit, $offset);
        }
        if($order_by){
            $sql->order_by($order_by);
        }
        return $sql->get($table)->result_array();
    }
    
    //inserted return id
    public function inserted($table, $data)
    {
        $result = $this->db->insert($table, $data);
        if ($result) {
            return $this->db->insert_id();
        } else { 
            return 0;
        }
    }
    
    public function hardDelete($table, $param)
    {
        $this->db->where($param);
        return $this->db->delete($table);
    }

    function ent_to_nepali_num_convert($number){
        $eng_number = array(
			"0",
			"1",
			"2",
			"3",
			"4",
			"5",
			"6",
			"7",
			"8",
			"9",
            "+",
            "-"
		);
        $nep_number = array(
            "०",
            "१",
            "२",
            "३",
            "४",
            "५",
            "६",
            "७",
            "८",
            "९",
            "+",
            "-"
        );
        return str_replace($eng_number, $nep_number, $number);
    }
    
}