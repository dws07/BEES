<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Officers extends Front_controller
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
        $this->table = 'branch_wise_officers'; 
        $this->title = 'Branch Wise Officers';
    }

    function grievance($page=1)
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
                $per_page = 100;
                $offset = ($page*$per_page - $per_page); 
                $items = $this->crud_model->get_where_pagination_order_by($this->table, array('type'=>'Grievance','status' => '1'), $per_page, $offset, 'id', 'DESC'); 
                
                foreach($items as $key=>$val){
                    $branch_detail = $this->crud_model->get_where_single_order_by('tbl_branches', array('status'=>'1','id'=>$val->branch), 'id', 'DESC');
                    $items[$key]->branch = isset($branch_detail->PageTitle)?$branch_detail->PageTitle:'';
                    $items[$key]->valley = isset($branch_detail->Valley)?$branch_detail->Valley:'';
                }
                 
                $total = $this->crud_model->count_all($this->table, array('type'=>'Grievance','status' => '1'), 'id'); 
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
    
    function information($page=1)
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
                $per_page = 100;
                $offset = ($page*$per_page - $per_page); 
                $items = $this->crud_model->get_where_pagination_order_by($this->table, array('type'=>'Information','status' => '1'), $per_page, $offset, 'serial', 'ASC');  
                
                foreach($items as $key=>$val){
                    $branch_detail = $this->crud_model->get_where_single_order_by('tbl_branches', array('status'=>'1','id'=>$val->branch), 'id', 'DESC');
                    $items[$key]->branch = isset($branch_detail->PageTitle)?$branch_detail->PageTitle:'';
                    $items[$key]->valley = isset($branch_detail->Valley)?$branch_detail->Valley:'';
                }
                 
                $total = $this->crud_model->count_all($this->table, array('type'=>'Information','status' => '1'), 'id'); 
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
    
    function compliance($page=1)
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
                $per_page = 100;
                $offset = ($page*$per_page - $per_page); 
                $items = $this->crud_model->get_where_pagination_order_by($this->table, array('type'=>'Compliance','status' => '1'), $per_page, $offset, 'id', 'DESC');  
                
                foreach($items as $key=>$val){
                    $branch_detail = $this->crud_model->get_where_single_order_by('tbl_branches', array('status'=>'1','id'=>$val->branch), 'id', 'DESC');
                    $items[$key]->branch = isset($branch_detail->PageTitle)?$branch_detail->PageTitle:'';
                }
                 
                $total = $this->crud_model->count_all($this->table, array('type'=>'Compliance','status' => '1'), 'id'); 
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
                $per_page = 5;
                $offset = ($page*$per_page - $per_page); 
                // $items = $this->crud_model->get_where_pagination_order_by($this->table, array('status' => '1'), $per_page, $offset, 'id', 'DESC');  
                 $items = $this->crud_model->get_where_pagination_order_by($this->table, array('status' => '1'), $per_page, $offset, 'serial', 'ASC');  
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
                $detail = $this->crud_model->get_where_single_order_by($this->table, array('status'=>'1','slug'=>$slug), 'id', 'DESC');
                    
                if(!empty($detail)){
                    $response = array(
                        'status' => "success",
                        'status_code' => 200,
                        'status_message' => "Data Retreived Successfully",
                        'detail' => $detail, 
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
    
    function officer($slug)
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
                $detail = $this->crud_model->get_where_single_order_by('officers', array('status'=>'1','slug'=>$slug), 'id', 'DESC');
                    
                if(!empty($detail)){
                    $response = array(
                        'status' => "success",
                        'status_code' => 200,
                        'status_message' => "Data Retreived Successfully",
                        'detail' => $detail, 
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
