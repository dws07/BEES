<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_network extends Front_controller
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
        $this->table = 'tbl_networks'; 
        $this->title = 'Member Network';
    }

    function index()
    {
        header('Access-Control-Allow-Method:GET');
        if ($this->request_method != "GET") {
            $response = array(
                'status' => "Error",
                'status_code' => 204,
                'status_message' => "Access Method Not Allowed",
            );
        } else { 
            
            
            $member_category = $this->crud_model->get_where_order_by('member_network_category', array('status' => '1'), 'id', 'DESC');
            
            // echo "<pre>";
            
            // var_dump($member_category);exit;
            
            foreach($member_category as $key => $val){
                $member_networks = $this->crud_model->get_where_order_by('tbl_networks', array('status' => '1', 'category_id' => $val->id), 'id', 'DESC');
                $member_category[$key]->networks = $member_networks;
            }
            
            // $sql_en = "title, featured_image, category_id";
            // $items_english = $this->crud_model->get_sql_all_no_pagination('tbl_networks', array('status' => '1'), 'id', 'DESC', $sql_en); 
            
            // foreach($items_english as $key=>$val){
            //     $sql_cat = "title";
            //     $cat_detail = $this->crud_model->get_sql_single('member_network_category', array('status'=>'1'), 'id', 'DESC', $sql_cat);
            //     $items_english[$key]->cat_name = isset($cat_detail->title)?$cat_detail->title:'';
            // }
            
            // $sql_np = "title_nepali as title, featured_image, category_id";
            // $items_nepali = $this->crud_model->get_sql_all_no_pagination('tbl_networks', array('status' => '1'), 'id', 'DESC', $sql_np); 
            
            // foreach($items_nepali as $key=>$val){
            //     $sql_cat = "title";
            //     $cat_detail = $this->crud_model->get_sql_single('member_network_category', array('status'=>'1'), 'id', 'DESC', $sql_cat);
            //     $items_nepali[$key]->cat_name = isset($cat_detail->title)?$cat_detail->title:'';
            // }
             
             
            // $items = array(
            //     'en' =>$items_english,
            //     'np' => $items_nepali
            //     );
            
            // var_dump($emtDetail->user_id);exit; 
            $response = array(
                'status' => "success",
                'status_code' => 200,
                'status_message' => "Data Retreived Successfully",
                'member_network_category' => $member_category, 
            );
        }
        // var_dump($response);exit;
        $json_response = json_encode($response);
        echo $json_response;
    } 
}
