<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invest_interest extends Front_controller
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
    } 
    
    function all($type)
    {  
        header('Access-Control-Allow-Method:GET');
        if ($this->request_method != "GET") {
            $response=array(
                'status' => "Error",
                'status_code' => 204,
                'status_message' => "Access Method Not Allowed",
            );
        } else {   
                //base rates starts----TYpe ---Base ---  Spread  
                $current_date = date('Y-m-d');
                
                $current_fiscal_where = array(
                        'date_from <=' => $current_date,
                        'date_to >=' => $current_date,
                        'status' => '1',
                );
                $current_fiscal_year = $this->crud_model->get_where_single_order_by('tbl_interest_rate_categories', $current_fiscal_where, 'id', 'DESC');
                
                $current_fiscal_year_id = isset($current_fiscal_year->id)?$current_fiscal_year->id:0;
                
                $sql = "id, slug,Title,TitleNepali, created_on, rate, category_id as fisacl_year_id, Description, DescriptionNepali";
                $rates = $this->crud_model->get_sql_all_no_pagination('other_interest_rate',array('status' => '1', 'type' => $type),'id', 'DESC', $sql); 
                $ratesEn = [];
                $ratesNe = [];
                if($rates){
                    foreach($rates as $key=>$rate){
                        $fiscal_title_en = $this->crud_model->getField('tbl_interest_rate_categories', array('status' => '1', 'id' => $rate->fisacl_year_id), 'title');
                        $fiscal_title_ne = $this->crud_model->getField('tbl_interest_rate_categories', array('status' => '1', 'id' => $rate->fisacl_year_id), 'title_nepali');
                        $ratesEn[$key]['id'] = $rate->id;
                        $ratesEn[$key]['title'] = $rate->Title;
                        $ratesEn[$key]['slug'] = $rate->slug;
                        $ratesEn[$key]['rate'] = $rate->rate;
                        $ratesEn[$key]['created_on'] = $rate->created_on;
                        $ratesEn[$key]['fisacl_year_title'] = $fiscal_title_en;
                        $ratesEn[$key]['description'] = $rate->Description;
                        
                        $ratesNe[$key]['id'] = $rate->id;
                        $ratesNe[$key]['title'] = $rate->TitleNepali;
                        $ratesNe[$key]['slug'] = $rate->slug;
                        $ratesNe[$key]['rate'] = $rate->rate;
                        $ratesNe[$key]['created_on'] = $rate->created_on;
                        $ratesNe[$key]['fisacl_year_title'] = $fiscal_title_ne;
                        $ratesNe[$key]['description'] = $rate->DescriptionNepali;
                    }
                }
                
                $ratesInterest = [
                    'en' => $ratesEn,
                    'np' => $ratesNe,
                ];
                    
                
                 
                $response=[
                    'status' => "Success",
                    'status_code' => 200,
                    'status_message' => "Item List",
                    'rates' => $ratesInterest,
                ]; 
            
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
                $detail = $this->crud_model->get_where_single_order_by('other_interest_rate', array('status'=>'1','slug'=>$slug), 'id', 'DESC'); 
                $detailEn['id'] = $detail->id;
                $detailEn['title'] = $detail->Title;
                $detailEn['slug'] = $detail->slug;
                $detailEn['description'] = $detail->Description;
                
                $detailNe['id'] = $detail->id;
                $detailNe['title'] = $detail->TitleNepali;
                $detailNe['description'] = $detail->slug;
                $detailNe['description'] = $detail->DescriptionNepali;
                
                $sql = "id, slug,Title,TitleNepali";
                $rates = $this->crud_model->get_sql_all_no_pagination('other_interest_rate',array('status' => '1', 'type' => 'Commissions'),'id', 'DESC', $sql); 
                $ratesEn = [];
                $ratesNe = [];
                if($rates){
                    foreach($rates as $key=>$rate){
                        $fiscal_title_en = $this->crud_model->getField('tbl_interest_rate_categories', array('status' => '1', 'id' => $rate->fisacl_year_id), 'title');
                        $fiscal_title_ne = $this->crud_model->getField('tbl_interest_rate_categories', array('status' => '1', 'id' => $rate->fisacl_year_id), 'title_nepali');
                        $ratesEn[$key]['id'] = $rate->id;
                        $ratesEn[$key]['title'] = $rate->Title;
                        $ratesEn[$key]['slug'] = $rate->slug;
                        
                        $ratesNe[$key]['id'] = $rate->id;
                        $ratesNe[$key]['title'] = $rate->TitleNepali;
                        $ratesNe[$key]['slug'] = $rate->slug;
                    }
                }
                
                $ratesInterest = [
                    'en' => $ratesEn,
                    'np' => $ratesNe,
                ];
                if(!empty($detail)){
                    $response = array(
                        'status' => "success",
                        'status_code' => 200,
                        'status_message' => "Data Retreived Successfully",
                        'detail' => [
                            'en' => $detailEn,
                            'np' =>$detailNe
                        ], 
                        'category' => $ratesInterest,
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
