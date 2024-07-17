<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notices extends Front_controller
{
    protected $param;
    protected $table;
    protected $title;
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
        
        $this->table = 'tbl_career';
        $this->title = 'Notices';
        $this->param = [
            'Type'=> 'notice' ,
            'status' => '1'
        ];
    }
    function all($page=1)
    { 
        header('Access-Control-Allow-Method:GET');
        if ($this->request_method != "GET") {
            $response=array(
                'status' => "Error",
                'status_code' => 204,
                'status_message' => "Access Method Not Allowed",
            );
        } else { 
            $noticeEn = [];
            $noticeNe = []; 
            $per_page = 12;
            $offset = ($page*$per_page - $per_page); 
            $sql = "id, DocPath, Description, DescriptionNepali, Title, TitleNepali,  created_on, slug";
            $notices = $this->crud_model->get_sql_all($this->table,$this->param,'id', 'DESC',$per_page, $offset,$sql);  
            foreach($notices as $key=>$val){
                
                $doc = '';
                if($val->DocPath){
                    $doc = base_url('uploads/doc/'.$val->DocPath);
                }
                //for english
                $noticeEn[$key]['id'] = $val->id;
                $noticeEn[$key]['title'] = $val->Title;
                $noticeEn[$key]['slug'] = $val->slug;
                $noticeEn[$key]['description'] = $val->Description;
                $noticeEn[$key]['image'] = $doc;
                $noticeEn[$key]['created_on'] = $val->created_on;

                //for neapli
                $noticeNe[$key]['id'] = $val->id;
                $noticeNe[$key]['title'] = $val->TitleNepali;
                $noticeNe[$key]['slug'] = $val->slug;
                $noticeNe[$key]['description'] = $val->DescriptionNepali;
                $noticeNe[$key]['image'] = $doc;
                $noticeNe[$key]['created_on'] = $val->created_on;
                
            }
             
            $total = $this->crud_model->count_all($this->table, $this->param, 'id'); 
            if($total){ 
                $response=array(
                        'status' => "Success",
                        'status_code' => 200,
                        'status_message' => "Item List",
                        'items' => [
                            'en' =>$noticeEn,
                            'np' => $noticeNe
                        ],
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
    
    
    public function detail($slug)
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
                $noticeEn = [];
                $noticeNe = [];
                $sql = "id, DocPath, Description, DescriptionNepali, Title, TitleNepali,  created_on, slug";
                $detail = $this->crud_model->getDetail($this->table, array_merge($this->param,['slug'=>$slug]), $sql);
                if($detail){ 
                    $doc = '';
                    if($detail->DocPath){
                        $doc = base_url('uploads/doc/'.$detail->DocPath);
                    }
                    //for english
                    $noticeEn['id'] = $detail->id;
                    $noticeEn['title'] = $detail->Title;
                    $noticeEn['slug'] = $detail->slug;
                    $noticeEn['description'] = $detail->Description;
                    $noticeEn['image'] = $doc;
                    $noticeEn['created_on'] = $detail->created_on;

                    //for neapli
                    $noticeNe['id'] = $detail->id;
                    $noticeNe['title'] = $detail->TitleNepali;
                    $noticeNe['slug'] = $detail->slug;
                    $noticeNe['description'] = $detail->DescriptionNepali;
                    $noticeNe['image'] = $doc;
                    $noticeNe['created_on'] = $detail->created_on;
                }
                
                if(!empty($detail)){
                    $response = array(
                        'status' => "success",
                        'status_code' => 200,
                        'status_message' => "Data Retreived Successfully",
                        'detail' => [
                            'en' => $noticeEn,
                            'ne' => $noticeNe
                        ], 
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
}