<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Csr extends Front_controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        header('Content-type:application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept, Content-Length, Accept-Encoding, X-API-KEY, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT");
        $this->request_method = $_SERVER["REQUEST_METHOD"];
        // $this->request = $_SERVER['REQUEST']; 

        if ($this->request_method == "OPTIONS") {
            die();
        }

        $authKeyFromApp = apache_request_headers();
        $this->table = 'tbl_csr'; 
        $this->title = 'CSR';
    } 
   
   function all($id = '')
    { 
        // echo "here";exit;
        header('Access-Control-Allow-Method:GET');
        if ($this->request_method != "GET") {
            $response=array(
                'status' => "Error",
                'status_code' => 204,
                'status_message' => "Access Method Not Allowed",
            );
        } else { 
                $csrEn = [];
                $csrNe = [];
                $per_page = 6;
                $param = array('status' => '1');
                if($id){
                   $param['csr_type_id'] = $id;
                }
                // $page = $this->input->get('offset');
                $page= isset($_GET['offset'])?intval($_GET['offset']):1;
                $offset = ($page*$per_page - $per_page); 
                
                $sql_en = "id, csr_type_id,DocPath, Title, TitleNepali, created_on, slug";
                $items_english = $this->crud_model->get_sql_all('tbl_csr',$param,'id', 'DESC',$per_page, $offset,$sql_en);  
                foreach($items_english as $key=>$val){
                    $doc = '';
                    if($val->DocPath){
                        $doc = base_url('uploads/doc/'.$val->DocPath);
                    } 
                    $csr_type_name_en = '';
                    $csr_type_name_ne = '';
                    if($val->csr_type_id){
                         $sql_en_type = "id,Title, TitleNepali, slug";
                         $csr_type_detail=$this->crud_model->get_sql_single('csr_type', array('status' => '1', 'id' =>$val->csr_type_id), 'serial', 'DESC',$sql_en_type); 
                        $csr_type_name_en = $csr_type_detail->Title;
                        $csr_type_name_ne = $csr_type_detail->TitleNepali;
                    } 

                    //for english
                    $csrEn[$key]['id'] = $val->id;
                    $csrEn[$key]['title'] = $val->Title;
                    $csrEn[$key]['slug'] = $val->slug;
                    $csrEn[$key]['csr_type_name'] = $csr_type_name_en;
                    $csrEn[$key]['image'] = $doc;
                    $csrEn[$key]['created_on'] = $val->created_on;

                    //for neapli
                    $csrNe[$key]['id'] = $val->id;
                    $csrNe[$key]['title'] = $val->TitleNepali;
                    $csrNe[$key]['slug'] = $val->slug;
                    $csrNe[$key]['csr_type_name'] = $csr_type_name_ne;
                    $csrNe[$key]['image'] = $doc;
                    $csrNe[$key]['created_on'] = $val->created_on;
                }
                 
                $items = array(
                    'en' =>$csrEn,
                    'np' => $csrNe
                );
                $total = $this->crud_model->count_all('tbl_csr', $param, 'id'); 
                if($items){ 
                    $response=array(
                            'status' => "Success",
                            'status_code' => 200,
                            'status_message' => "Item List",
                            'items' => $items,
                            'total' => $total,
                            'per_page' => $per_page,
                        );
                }else{
                    $response=array(
                            'status' => "error",
                            'status_code' => 208,
                            'status_message' => "No Items Found", 
                        );
                } 
            
        } 
        $json_response = json_encode($response);
        echo $json_response;
    }

    function detail($slug)
    {
        header('Access-Control-Allow-Method:GET');
        if ($this->request_method != "GET") {
            $response = array(
                'status' => "Error",
                'status_code' => 204,
                'status_message' => "Access Method Not Allowed",
            );
        } else {
            if($slug){
                $csrEn = [];
                $csrNe = [];
                $sql_en = "id, slug, Title, TitleNepali, Description, DescriptionNepali, DocPath, created_on";
                $items = $this->crud_model->get_sql_single('tbl_csr', array('status' => '1', 'slug' => $slug), 'id', 'DESC',$sql_en); 
                if($items){
                    $doc = '';
                    if($items->DocPath){
                        $doc = base_url('uploads/doc/'.$items->DocPath);
                    }
                    
                    //for english
                    $csrEn['id'] = $items->id;
                    $csrEn['title'] = $items->Title;
                    $csrEn['slug'] = $items->slug;
                    $csrEn['description'] = $items->Description;
                    $csrEn['image'] = $doc;
                    $csrEn['created_on'] = $items->created_on;

                    //for neapli
                    $csrNe['id'] = $items->id;
                    $csrNe['title'] = $items->TitleNepali;
                    $csrNe['slug'] = $items->slug;
                    $csrNe['description'] = $items->DescriptionNepali;
                    $csrNe['image'] = $doc;
                    $csrNe['created_on'] = $items->created_on;
                }
                
                
                $items = array(
                    'en' => $csrEn,
                    'np' => $csrNe,
                );
                    
                if(!empty($items)){
                    $response = array(
                        'status' => "success",
                        'status_code' => 200,
                        'status_message' => "Data Retreived Successfully",
                        'detail' => $items, 
                    );
                }else{
                    $response = array(
                        'status' => "error",
                        'status_code' => 200,
                        'status_message' => "Invalid Slug", 
                    );
                } 
            }else{
                $response = array(
                    'status' => "error",
                    'status_code' => 200,
                    'status_message' => "Slug Required", 
                );
            }
            
        }
        // var_dump($response);exit;
        $json_response = json_encode($response);
        echo $json_response;
    }
   
    function csr_type($page=1)
    { 
        // echo "here";exit;
        header('Access-Control-Allow-Method:GET');
        if ($this->request_method != "GET") {
            $response=array(
                'status' => "Error",
                'status_code' => 204,
                'status_message' => "Access Method Not Allowed",
            );
        } else {  
                $per_page = 10;
                $offset = ($page*$per_page - $per_page); 
                
                $sql_en = "id,DocPath, Title, created_on, slug";
                $items_english = $this->crud_model->get_sql_all('csr_type',array('status' => '1','parent_id'=>'0'),'serial', 'DESC',$per_page, $offset,$sql_en);  
                foreach($items_english as $key=>$val){
                    if($val->DocPath){
                        $items_english[$key]->DocPath = base_url('uploads/doc/'.$val->DocPath);
                    } 
                }
                
                $sql_np = "id,DocPath, TitleNepali as Title, created_on, slug";
                $items_nepali = $this->crud_model->get_sql_all('csr_type',array('status' => '1','parent_id'=>'0'),'serial', 'DESC',$per_page, $offset,$sql_np);  
                foreach($items_nepali as $key=>$val){
                    if($val->DocPath){
                        $items_nepali[$key]->DocPath = base_url('uploads/doc/'.$val->DocPath);
                    } 
                }
                 
                $items = array(
                    'en' =>$items_english,
                    'np' => $items_nepali
                    );
                $total = $this->crud_model->count_all('csr_type', array('status' => '1'), 'id'); 
                if($items){ 
                    $response=array(
                            'status' => "Success",
                            'status_code' => 200,
                            'status_message' => "Item List",
                            'items' => $items,
                            'total' => $total,
                            'per_page' => $per_page,
                        );
                }else{
                    $response=array(
                            'status' => "error",
                            'status_code' => 208,
                            'status_message' => "No Items Found", 
                        );
                } 
            
        } 
        $json_response = json_encode($response);
        echo $json_response;
    }

    
    
    function csr_sub($slug)
    {
        header('Access-Control-Allow-Method:GET');
        if ($this->request_method != "GET") {
            $response = array(
                'status' => "Error",
                'status_code' => 204,
                'status_message' => "Access Method Not Allowed",
            );
        } else {
            if($slug){
                $csrTypeEn = [];
                $csrTypeNe = [];
                
                $items = array(
                    'en' => $this->get_parents($slug),
                    'np' => $this->get_parents_ne($slug),
                );
                if(!empty($items)){
                    $response = array(
                        'status' => "success",
                        'status_code' => 200,
                        'status_message' => "Data Retreived Successfully",
                        'detail' => $items, 
                    );
                }else{
                    $response = array(
                        'status' => "error",
                        'status_code' => 200,
                        'status_message' => "Invalid Slug", 
                    );
                } 
            }else{
                $response = array(
                    'status' => "error",
                    'status_code' => 200,
                    'status_message' => "Slug Required", 
                );
            }
            
        }
        // var_dump($response);exit;
        $json_response = json_encode($response);
        echo $json_response;
    }

    public function get_parents($slug = '')
	{
		$html = [];
		$parents = $this->db->get_where('csr_type', array('status' => '1', 'slug' => $slug))->result();
         
		if ($parents) {
			foreach ($parents as $key => $value) {
                $image = '';
                if($value->DocPath){
                    $image = base_url('uploads/doc/'.$value->DocPath);
                    
                } 
				$html['category']  =[
                    'id' => $value->id,
                    'title' => $value->Title,
                    'image' => $image,
                ];
				$childs = $this->db->get_where('csr_type', array('parent_id' => $value->id, 'status' => '1'))->result();
				if (!empty($childs)) {
					$html[$key]  =[
                        'id' => $value->id,
                        'title' => $value->Title,
                        'image' => $image,
                    ];
					$html[$key] = $this->get_childs($childs);
				}
			}
		}

		return $html;
	}

	public function get_childs($childs = array())
	{
		$html = [];
		if (!empty($childs)) {
			foreach ($childs as $key => $value) {
				$image = '';
                if($value->DocPath){
                    $image = base_url('uploads/doc/'.$value->DocPath);
                    
                } 
				$html[$key]  =[
                    'id' => $value->id,
                    'title' => $value->Title,
                    'image' => $image,
                ];
				$new_childs = $this->db->get_where('csr_type', array('parent_id' => $value->id, 'status' => '1'))->result();
				if (!empty($new_childs)) {
					$html[$key]  =[
                        'id' => $value->id,
                        'title' => $value->Title,
                        'image' => $image,
                    ];
					$html[$key] = $this->get_childs($new_childs);
				}
			}
		}
		return $html;
	}

    public function get_parents_ne($slug = '')
	{
		$html = [];
		$parents = $this->db->get_where('csr_type', array('status' => '1', 'slug' => $slug))->result();
         
		if ($parents) {
			foreach ($parents as $key => $value) {
                $image = '';
                if($value->DocPath){
                    $image = base_url('uploads/doc/'.$value->DocPath);
                    
                } 
				$html['category']  =[
                    'id' => $value->id,
                    'title' => $value->TitleNepali,
                    'image' => $image,
                ];
				$childs = $this->db->get_where('csr_type', array('parent_id' => $value->id, 'status' => '1'))->result();
				if (!empty($childs)) {
					$html[$key]  =[
                        'id' => $value->id,
                        'title' => $value->TitleNepali,
                        'image' => $image,
                    ];
					$html[$key] = $this->get_childs_ne($childs);
				}
			}
		}

		return $html;
	}

	public function get_childs_ne($childs = array())
	{
		$html = [];
		if (!empty($childs)) {
			foreach ($childs as $key => $value) {
				$image = '';
                if($value->DocPath){
                    $image = base_url('uploads/doc/'.$value->DocPath);
                    
                } 
				$html[$key]  =[
                    'id' => $value->id,
                    'title' => $value->TitleNepali,
                    'image' => $image,
                ];
				$new_childs = $this->db->get_where('csr_type', array('parent_id' => $value->id, 'status' => '1'))->result();
				if (!empty($new_childs)) {
					$html[$key]  =[
                        'id' => $value->id,
                        'title' => $value->TitleNepali,
                        'image' => $image,
                    ];
					$html[$key] = $this->get_childs_ne($new_childs);
				}
			}
		}
		return $html;
	}
}