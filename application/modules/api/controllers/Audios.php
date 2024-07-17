<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Audios extends Front_controller
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
        // $this->loggedinUser = $authKeyFromApp['Authorization'];
        $this->table = 'tbl_audio'; 
        $this->title = 'Audios';
    } 
    
    function all($page=1)
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
                $per_page = 15;
                $offset = ($page*$per_page - $per_page); 
                 
                
                $sql_audio = "Title, TitleNepali, Description, DescriptionNepali, DocPath, created_on, slug";
                $items = $this->crud_model->get_sql_all('tbl_audio',array('status' => '1'),'id', 'DESC',$per_page, $offset, $sql_audio);  
                foreach($items as $key=>$val){
                    $items[$key]->DocPath = base_url('uploads/audio/'.$val->DocPath);
                } 
                $total = $this->crud_model->count_all($this->table, array('status' => '1'), 'id'); 
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
                
                $sql_en = "Title, Description, DocPath, CoverImage, created_on";
                $items_english = $this->crud_model->get_sql_single('tbl_news', array('status' => '1', 'slug' => $slug), 'id', 'DESC',$sql_en); 
                
                if($items_english->DocPath){
                    $items_english->DocPath = base_url('uploads/doc/'.$items_english->DocPath);
                }else{
                     $items_english->DocPath = '';
                }
                
                 if($items_english->CoverImage){
                    $items_english->CoverImage = base_url('uploads/doc/'.$items_english->CoverImage);
                }else{
                     $items_english->CoverImage = '';
                }
                
                $sql_np = "TitleNepali as Title, DescriptionNepali as Description, DocPath, CoverImage, created_on";
                $items_nepali = $this->crud_model->get_sql_single('tbl_news', array('status' => '1', 'slug' => $slug), 'id', 'DESC',$sql_np); 
                
                if($items_nepali->DocPath){
                    $items_nepali->DocPath = base_url('uploads/doc/'.$items_nepali->DocPath);
                }else{
                     $items_nepali->DocPath = '';
                }
                
                 if($items_nepali->CoverImage){
                    $items_nepali->CoverImage = base_url('uploads/doc/'.$items_nepali->CoverImage);
                }else{
                     $items_nepali->CoverImage = '';
                }
                
                $items = array(
                    'en' => $items_english,
                    'np' => $items_nepali,
                    );
                    
                if(!empty($items_english)){
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
}
