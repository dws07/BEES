<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fiscal_year_wise_interest extends Front_controller
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
        $this->table = 'tbl_interest_rate_fiscal';  
        // $this->type = 'NU';
    } 
    
    function index()
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
                $items = $this->crud_model->get_sql_all('tbl_interest_rate_categories',array('status' => '1'),'title', 'DESC',1000, 0, 'id, title, title_nepali'); 
                
                $fiscalEn = [];
                $fiscalNe = [];
                foreach($items as $key1=>$val1){
                    $fiscalEn[$key1]['id'] = $val1->id;
                    $fiscalEn[$key1]['title'] = $val1->title;
    
                    $fiscalNe[$key1]['id'] = $val1->id;
                    $fiscalNe[$key1]['title'] = $val1->title_nepali?:'';
                    
                    $childEn = [];
                    $childNe = [];
                    $fiscal_year_wise_interest_rates = $this->crud_model->get_where_order_by($this->table, array('status' => '1','category_id' => $val1->id), 'Serial', 'ASC');
                    
                    foreach($fiscal_year_wise_interest_rates as $key => $val){
                        $doc = '';
                        if($val->DocPath){
                            $doc = base_url('uploads/interest_rate/'.$val->DocPath);
                        } 
                        $childEn[$key]['id'] = $val->id;
                        $childEn[$key]['title'] = $val->Title;
                        $childEn[$key]['doc'] = $doc;
    
                        $childNe[$key]['id'] = $val->id;
                        $childNe[$key]['title'] = $val->TitleNepali;
                        $childNe[$key]['doc'] = $doc;
                    } 
                    $fiscalEn[$key1]['child'] = $childEn;
                    $fiscalNe[$key1]['child'] = $childNe;
                } 
                if($items){ 
                    $response=array(
                            'status' => "Success",
                            'status_code' => 200,
                            'status_message' => "Item List",
                            'items' => [
                                'en' => $fiscalEn,
                                'np' => $fiscalNe
                            ],  
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
                $detail = $this->crud_model->get_where_single_order_by('tbl_services', array('status'=>'1','slug'=>$slug), 'id', 'DESC'); 
                if(isset($detail->DocPath) && $detail->DocPath !=''){
                    $detail->DocPath = base_url('uploads/doc/'.$detail->DocPath);
                }
                
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
    
    function details($slug){  
		header('Access-Control-Allow-Method:GET');
        if ($this->request_method != "GET") {
            $response = array(
                'status' => "Error",
                'status_code' => 204,
                'status_message' => "Access Method Not Allowed",
            );
        } else {
            if($slug){
                $detail = $this->crud_model->get_where_single_order_by('tbl_services', array('Disabled'=>0,'PageName'=>$slug), 'id', 'DESC');  
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
