<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends Front_controller
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
        $this->table = 'tbl_news'; 
        $this->title = 'News';
    } 
    
    function all($cat_slug,$page=1)
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
                $per_page = 200;
                $offset = ($page*$per_page - $per_page); 
                
                
                $cat_detail = $this->crud_model->get_where_single('report_category', array('slug'=>$cat_slug,'status'=>'1'));
                
                $sql_en = "id, DocPath, title, created, title_nepali, category_id";
                
                $fiscalEn = [];
                $fiscalNe = [];
                $fiscal_year = $this->crud_model->get_sql_all('tbl_interest_rate_categories',array('status' => '1'),'title', 'DESC',10000, 0,'id, title, title_nepali');
                foreach($fiscal_year as $key1=>$val1){
                
                    $fiscalEn[$key1]['id'] = $val1->id;
                    $fiscalEn[$key1]['title'] = $val1->title;
                
                    $fiscalNe[$key1]['id'] = $val1->id;
                    $fiscalNe[$key1]['title'] = $val1->title_nepali;
                    $items = $this->crud_model->get_sql_all('tbl_report',array('status' => '1', 'category_id' => $cat_detail->id, 'fiscal_id' => $val1->id),'id', 'DESC',10000, $offset, $sql_en);  
                    // $items_en = $this->crud_model->get_sql_all('tbl_report',array('status' => '1', 'category_id' => $cat_detail->id, 'fiscal_id' => $val1->id),'id', 'DESC',10000, $offset, $sql_en);  
                    
                    $childEn = [];
                    $childNe = [];
                
                    foreach($items as $key => $val){
                        $file = '';    
                        if($val->DocPath){
                            $file = base_url('uploads/doc/'.$val->DocPath);
                        }
                        $childEn[$key]['id'] = $val->id;
                        $childEn[$key]['title'] = $val->title;
                        $childEn[$key]['created_on'] = $val->created;
                        $childEn[$key]['file'] = $file;
                        
                        $childNe[$key]['id'] = $val->id;
                        $childNe[$key]['title'] = $val->title_nepali;
                        $childNe[$key]['created_on'] = $val->created; 
                        $childNe[$key]['file'] = $file;
                    }
                    $fiscalEn[$key1]['child'] = $childEn;
                    $fiscalNe[$key1]['child'] = $childNe;
                }
                
                // $sql_np = "DocPath, title_nepali as title, created, category_id";
                // $items_nepali = $this->crud_model->get_sql_all('tbl_report',array('status' => '1',  'category_id' => $cat_detail->id),'id', 'DESC',$per_page, $offset,$sql_np);  
                // foreach($items_nepali as $key=>$val){
                //     if($val->DocPath){
                //         $items_nepali[$key]->DocPath = base_url('uploads/doc/'.$val->DocPath);
                //     } 
                //     $items_nepali[$key]->created = (new DateTime($val->created))->format('Y-m-d');
                // }
                 
                $items = array(
                    'en' =>$fiscalEn,
                    'np' => $fiscalNe
                );
                
                if($items){ 
                    $response=array(
                            'status' => "Success",
                            'status_code' => 200,
                            'status_message' => "Item List",
                            'items' => $items,
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
