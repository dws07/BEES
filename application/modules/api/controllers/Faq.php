<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends Front_controller
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
        $this->table = 'faq'; 
        $this->title = 'FAQ';
    }

    function index()
    { 
        header('Access-Control-Allow-Method:GET');
        if ($this->request_method != "GET") {
            $response=array(
                'status' => "Error",
                'status_code' => 204,
                'status_message' => "Access Method Not Allowed",
            );
        } else {  
                $categories = $this->crud_model->get_where_order_by('faq_category', array('status' => '1'), 'order_no', 'ASC');
                // $items = $this->crud_model->get_where_order_by($this->table, array('status' => '1'), 'id', 'DESC'); 
                foreach($categories as $key=>$val){
                    $faqs = $this->crud_model->get_where_order_by('faq', array('status' => '1','faq_cat'=>$val->id), 'id', 'ASC');
                    
                    $categories[$key]->faqs = $faqs;
                } 
                if($categories){ 
                    $response=array(
                            'status' => "Success",
                            'status_code' => 200,
                            'status_message' => "Item List",
                            'items' => $categories, 
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
