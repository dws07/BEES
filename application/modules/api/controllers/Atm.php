<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atm extends Front_controller
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
        $this->table = 'tbl_atm'; 
        $this->title = 'Atms';
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
            $atmEn = [];
            $atmNe = [];
            $sql_en = "id,PageTitle, PageTitleNepali, Address, contact, contact_nepali,  AddressNepali, Map, google_plus, Location, latitude, longitude";
            $items = $this->crud_model->get_sql_all_no_pagination($this->table, array('status' => '1'), 'Serial', 'ASC', $sql_en);  
            foreach($items as $key=>$val){
                //for english
                $atmEn[$key]['id'] = $val->id;
                $atmEn[$key]['PageTitle'] = $val->PageTitle;
                $atmEn[$key]['address'] = $val->Address;
                // $atmEn[$key]['map'] = $val->Map;
                // $atmEn[$key]['google_plus'] = $val->google_plus;
                $atmEn[$key]['location'] = $val->Location;
                $atmEn[$key]['phone'] = $val->contact;
                $atmEn[$key]['latitude'] = $val->latitude;
                $atmEn[$key]['longitude'] = $val->longitude;

                //for nepali
                $atmNe[$key]['id'] = $val->id;
                $atmNe[$key]['address'] = $val->AddressNepali;
                $atmNe[$key]['PageTitle'] = $val->PageTitleNepali;
                // $atmNe[$key]['map'] = $val->Map;
                // $atmNe[$key]['google_plus'] = $val->google_plus;
                $atmNe[$key]['phone'] = $val->contact_nepali;
                $atmNe[$key]['location'] = $val->Location;
                $atmNe[$key]['latitude'] = $val->latitude;
                $atmNe[$key]['longitude'] = $val->longitude;
            } 
            $items = array(
                'en' =>$atmEn,
                'np' => $atmNe
            );
            
            $response = array(
                'status' => "success",
                'status_code' => 200,
                'status_message' => "Data Retreived Successfully",
                'branch' => $items, 
            );
        }
        
        $json_response = json_encode($response);
        echo $json_response;
    }
    
}