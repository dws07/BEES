<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends Front_controller
{
    protected $param;
    protected $table;
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
        $this->table = 'tbl_services';  
        $this->param = ['status' => '1'];
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
                $per_page = 10;
                $offset = ($page*$per_page - $per_page); 
                $sql_services = "id, TitleNepali, DescriptionNepali, Title, Description, slug, Link, CoverImage, DocPath, Image, created_on, lastmodified";
                $getServices = $this->crud_model->getData($this->table, $this->param, $per_page, $offset, $sql_services);
                $servicesEn = [];
                $servicesNe = [];
                foreach($getServices as $key=>$val){
                    $doc = '';
                    if($val->DocPath){
                        $doc = base_url('uploads/doc/'.$val->DocPath);
                    }

                    $image = '';
                    if($val->Image){
                        $image = base_url('uploads/doc/'.$val->Image);
                    }
                    
                    $coverImage = '';
                    if($val->CoverImage){
                        $coverImage = base_url('uploads/doc/'.$val->CoverImage);
                    }
                    //for english
                    $servicesEn[$key]['id'] = $val->id;
                    $servicesEn[$key]['title'] = $val->Title;
                    $servicesEn[$key]['slug'] = $val->slug;
                    $servicesEn[$key]['Link'] = $val->Link;
                    $servicesEn[$key]['description'] = $val->Description;
                    $servicesEn[$key]['doc'] = $doc;
                    $servicesEn[$key]['cover_image'] = $coverImage;
                    $servicesEn[$key]['image'] = $image;
                    $servicesEn[$key]['created_on'] = $val->created_on;
                    $servicesEn[$key]['lastmodified'] = $val->lastmodified;

                    //for neapli
                    $servicesNe[$key]['id'] = $val->id;
                    $servicesNe[$key]['title'] = $val->TitleNepali;
                    $servicesNe[$key]['slug'] = $val->slug;
                    $servicesNe[$key]['Link'] = $val->Link;
                    $servicesNe[$key]['description'] = $val->DescriptionNepali;
                    $servicesNe[$key]['doc'] = $doc;
                    $servicesNe[$key]['cover_image'] = $coverImage;
                    $servicesNe[$key]['image'] = $image;
                    $servicesNe[$key]['created_on'] = $val->created_on;
                    $servicesNe[$key]['lastmodified'] = $val->lastmodified;
                    

                }

                $total = $this->crud_model->count_all($this->table, $this->param, 'id'); 
                if($total){ 
                    $response=array(
                        'status' => "Success",
                        'status_code' => 200,
                        'status_message' => "Item List",
                        'items' => [
                            'en' => $servicesEn,
                            'ne' => $servicesNe
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
                $sql_services = "id, TitleNepali, Title, slug";
                $getServices = $this->crud_model->getData($this->table, $this->param, $per_page, $offset, $sql_services);
                
                $categoryEn = [];
                $categoryNe = [];
                foreach($getServices as $key=>$val){
                    //for english
                    $categoryEn[$key]['id'] = $val->id;
                    $categoryEn[$key]['title'] = $val->Title;
                    $categoryEn[$key]['slug'] = $val->slug;

                    //for neapli
                    $categoryNe[$key]['id'] = $val->id;
                    $categoryNe[$key]['title'] = $val->TitleNepali;
                    $categoryNe[$key]['slug'] = $val->slug;
                }
                
                $sql_services = "id, TitleNepali, DescriptionNepali, Title, Description, slug, Link, CoverImage, DocPath, Image, created_on, lastmodified";
                $servicesEn = [];
                $servicesNe = [];
                $detail = $this->crud_model->getDetail($this->table, array_merge($this->param, ['slug'=>$slug]), $sql_services); 
                if($detail){
                    $doc = '';
                if($detail->DocPath){
                    $doc = base_url('uploads/doc/'.$detail->DocPath);
                }

                $image = '';
                if($detail->Image){
                    $image = base_url('uploads/doc/'.$detail->Image);
                }
                
                $coverImage = '';
                if($detail->CoverImage){
                    $coverImage = base_url('uploads/doc/'.$detail->CoverImage);
                }
                //for english
                $servicesEn['id'] = $detail->id;
                $servicesEn['title'] = $detail->Title;
                $servicesEn['slug'] = $detail->slug;
                $servicesEn['Link'] = $detail->Link;
                $servicesEn['description'] = $detail->Description;
                $servicesEn['doc'] = $doc;
                $servicesEn['cover_image'] = $coverImage;
                $servicesEn['image'] = $image;
                $servicesEn['created_on'] = $detail->created_on;
                $servicesEn['lastmodified'] = $detail->lastmodified;

                //for neapli
                $servicesNe['id'] = $detail->id;
                $servicesNe['title'] = $detail->TitleNepali;
                $servicesNe['slug'] = $detail->slug;
                $servicesNe['Link'] = $detail->Link;
                $servicesNe['description'] = $detail->DescriptionNepali;
                $servicesNe['doc'] = $doc;
                $servicesNe['cover_image'] = $coverImage;
                $servicesNe['image'] = $image;
                $servicesNe['created_on'] = $detail->created_on;
                $servicesNe['lastmodified'] = $detail->lastmodified;
                }
                
                if(!empty($detail)){
                    $response = array(
                        'status' => "success",
                        'status_code' => 200,
                        'status_message' => "Data Retreived Successfully",
                        'detail' => [
                            'en' => $servicesEn,
                            'ne' => $servicesNe
                        ],
                        'category' => [
                            'en' => $categoryEn,
                            'ne' => $categoryNe
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