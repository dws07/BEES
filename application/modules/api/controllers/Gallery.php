<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends Front_controller
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
        $this->table = 'gallery'; 
        $this->title = 'Gallery';
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
                $galleryEn = [];
                $galleryNe = [];
                $per_page = 200;
                $offset = ($page*$per_page - $per_page); 
                $items = $this->crud_model->get_where_pagination_order_by($this->table, $this->param, $per_page, $offset, 'id', 'DESC');
                
                $total = $this->crud_model->count_all($this->table, $this->param, 'id');
              
                if($items){
                    foreach($items as $key=>$val){
                        //for english
                        $galleryEn[$key]['id'] = $val->id;
                        $galleryEn[$key]['title'] = $val->title;
                        $galleryEn[$key]['slug'] = $val->slug;
                        $galleryEn[$key]['description'] = $val->description;
                        $galleryEn[$key]['image'] = $val->featured_image;
                        $galleryEn[$key]['created_on'] = $val->created;

                        //for neapli
                        // $galleryNe[$key]['id'] = $val->id;
                        // $galleryNe[$key]['title'] = $val->title_nepali;
                        // $galleryNe[$key]['slug'] = $val->slug;
                        // $galleryNe[$key]['description'] = $val->description_nepali;
                        // $galleryNe[$key]['image'] = $val->featured_image;
                        // $galleryNe[$key]['created_on'] = $val->created;
                    }
                    
                    $response=array(
                            'status' => "Success",
                            'status_code' => 200,
                            'status_message' => "Item List",
                            'items' => $galleryEn,
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
}