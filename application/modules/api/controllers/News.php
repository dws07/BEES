<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends Front_controller
{
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
        // $this->loggedinUser = $authKeyFromApp['Authorization'];
        $this->table = 'tbl_news'; 
        $this->title = 'News';
        $this->param = [
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
                $per_page = 5;
                $offset = ($page*$per_page - $per_page); 
                $newsEn = [];
                $newsNe = [];
                $sql = "id, slug, TitleNepali , Title, DocPath, CoverImage, created_on, lastmodified";
                $items = $this->crud_model->get_sql_all($this->table, $this->param, 'id', 'DESC',$per_page, $offset,$sql);  
                foreach($items as $key=>$val){
                    $doc = '';
                    if($val->DocPath){
                        $doc = base_url('uploads/doc/'.$val->DocPath);
                    }

                    $image = '';
                    if($val->CoverImage){
                        $image = base_url('uploads/doc/'.$val->CoverImage);
                    }
                    //for english
                    $newsEn[$key]['id'] = $val->id;
                    $newsEn[$key]['title'] = $val->Title;
                    $newsEn[$key]['slug'] = $val->slug;
                    $newsEn[$key]['doc'] = $doc;
                    $newsEn[$key]['image'] = $image;
                    $newsEn[$key]['created_on'] = $val->created_on;
                    $newsEn[$key]['lastmodified'] = $val->lastmodified;

                    //for neapli
                    $newsNe[$key]['id'] = $val->id;
                    $newsNe[$key]['title'] = $val->Title;
                    $newsNe[$key]['slug'] = $val->slug;
                    $newsNe[$key]['doc'] = $doc;
                    $newsNe[$key]['image'] = $image;
                    $newsNe[$key]['created_on'] = $val->created_on;
                    $newsNe[$key]['lastmodified'] = $val->lastmodified;
                }
                
                
                 
                $items = array(
                    'en' =>$newsEn,
                    'np' => $newsNe
                );
                $total = $this->crud_model->count_all($this->table, $this->param, 'id'); 
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
                $items_english = [];
                $items_nepali = [];
                
                $sql = "id, slug, TitleNepali , Title, DescriptionNepali, Description, DocPath, CoverImage, created_on";
                $detail = $this->crud_model->getDetail($this->table, array_merge($this->param,['slug' => $slug]), $sql); 
                if($detail){
                    $doc = '';
                    if($detail->DocPath){
                        $doc = base_url('uploads/doc/'.$detail->DocPath);
                    }
                    $image = '';
                    if($detail->CoverImage){
                        $image = base_url('uploads/doc/'.$detail->CoverImage);
                    }

                    //for english
                    $items_english['id'] = $detail->id;
                    $items_english['title'] = $detail->Title;
                    $items_english['slug'] = $detail->slug;
                    $items_english['description'] = $detail->Description;
                    $items_english['doc'] = $doc;
                    $items_english['image'] = $image;
                    $items_english['created_on'] = $detail->created_on;

                    //for neapli
                    $items_nepali['id'] = $detail->id;
                    $items_nepali['title'] = $detail->Title;
                    $items_nepali['slug'] = $detail->slug;
                    $items_nepali['description'] = $detail->DescriptionNepali;
                    $items_nepali['doc'] = $doc;
                    $items_nepali['image'] = $image;
                    $items_nepali['created_on'] = $detail->created_on;
                    
                    $items = array(
                        'en' => $items_english,
                        'np' => $items_nepali,
                    );
                
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
        $json_response = json_encode($response);
        echo $json_response;
    }
}