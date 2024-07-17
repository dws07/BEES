<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Downloads extends Front_controller
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
        
        $this->table = 'tbl_download'; 
        $this->title = 'Downloads';
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
            $getdata = json_decode(file_get_contents("php://input")); 
            // var_dump($getdata, );exit;
            $param = array('status' => '1');
            if($_GET['title']){
                $categoryIds = array_unique(array_filter(array_column($this->crud_model->getData('tbl_download', array_merge($param), ['title' => $_GET['title']], 1000, 0, 'category_id', 'id DESC'), 'category_id')));
                
            }
            
            $downloadEn = [];
            $downloadNe = [];
            $sql_cat = "id, title, title_nepali";
            $items = $this->crud_model->getAllData('download_category',$param,$categoryIds, 'id', 1000, 0, $sql_cat,'serial ASC');  
            $items_new = array();
            
            foreach($items as $key1=>$val1){
                $downloadEn[$key1]['id'] = $val1->id;
                $downloadEn[$key1]['cat_title'] = $val1->title;

                $downloadNe[$key1]['id'] = $val1->id;
                $downloadNe[$key1]['cat_title'] = $val1->title_nepali?:'';
                $sql_en = "id,DocPath,title_nepali, title, created, category_id";
                $downloads_english = $this->crud_model->get_sql_all('tbl_download',array('status' => '1', 'category_id' => $val1->id),'Serial', 'ASC',1000, 0,$sql_en);  
                $childEn = [];
                $childNe = [];
                foreach($downloads_english as $key=>$val){
                    $doc = '';
                    if($val->DocPath){
                        $doc = base_url('uploads/doc/'.$val->DocPath);
                    } 
                    $childEn[$key]['id'] = $val->id;
                    $childEn[$key]['title'] = $val->title;
                    $childEn[$key]['category_id'] = $val->category_id;
                    $childEn[$key]['cat_title'] = $val->title;
                    $childEn[$key]['doc'] = $doc;

                    $childNe[$key]['id'] = $val->id;
                    $childNe[$key]['title'] = $val->title_nepali;
                    $childNe[$key]['category_id'] = $val->category_id;
                    $childNe[$key]['cat_title'] = $val->title_nepali;
                    $childNe[$key]['doc'] = $doc;
                } 
                $downloadEn[$key1]['child'] = $childEn;
                $downloadNe[$key1]['child'] = $childNe;
            }
            
            
            $response = array(
                'status' => "success",
                'status_code' => 200,
                'status_message' => "Data Retreived Successfully",
                'downloads_category' => [
                    'en' =>$downloadEn,
                    'np' => $downloadNe
                ], 
            );
        }
        
        $json_response = json_encode($response);
        echo $json_response;
    } 
}