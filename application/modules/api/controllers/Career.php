<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Career extends Front_controller
{
    protected $param;
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
        // $this->table = 'tbl_careers';
        $this->table = 'tbl_career';
        $this->title = 'Career';
        $this->param = array('Type'=> 'career' ,'status' => '1');
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
                $per_page = null;
                $offset = ($page*$per_page - $per_page); 
                $careerEn = [];
                $careerNe = [];
                $sql = "id, DocPath, Duration, JobNumber, Description, DescriptionNepali, status, Title, TitleNepali,  created_on, slug";
                $careers = $this->crud_model->get_sql_all($this->table,$this->param,'id', 'DESC',$per_page, $offset,$sql);  
                
                foreach($careers as $key=>$val){
                    
                    $doc = '';
                    if($val->DocPath){
                        $doc = base_url('uploads/doc/'.$val->DocPath);
                    }
                    //for english
                    $careerEn[$key]['id'] = $val->id;
                    $careerEn[$key]['title'] = $val->Title;
                    $careerEn[$key]['slug'] = $val->slug;
                    $careerEn[$key]['duration'] = $val->Duration;
                    $careerEn[$key]['jobNumber'] = $val->JobNumber;
                    $careerEn[$key]['description'] = $val->Description;
                    $careerEn[$key]['image'] = $doc;
                    $careerEn[$key]['created_on'] = $val->created_on;

                    //for neapli
                    $careerNe[$key]['id'] = $val->id;
                    $careerNe[$key]['title'] = $val->TitleNepali;
                    $careerNe[$key]['slug'] = $val->slug;
                    $careerNe[$key]['duration'] = $val->Duration;
                    $careerNe[$key]['jobNumber'] = $val->JobNumber;
                    $careerNe[$key]['description'] = $val->DescriptionNepali;
                    $careerNe[$key]['image'] = $doc;
                    $careerNe[$key]['created_on'] = $val->created_on;
                }
                 
                $items = [
                    'en' =>$careerEn,
                    'np' => $careerNe
                ];
                $total = $this->crud_model->count_all($this->table, array('Type'=> 'career','status' => '1'), 'id'); 
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
    
    
    public function detail($slug)
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
                $careerEn = [];
                $careerNe = [];
                $sql = "id, DocPath, Duration, JobNumber, Description, DescriptionNepali, status, Title, TitleNepali,  created_on, slug";
                $detail = $this->crud_model->getDetail($this->table, array_merge($this->param,['slug'=>$slug]), $sql);
                if($detail){
                    
                    $doc = '';
                    if($detail->DocPath){
                        $doc = base_url('uploads/doc/'.$detail->DocPath);
                    }
                    //for english
                    $careerEn['id'] = $detail->id;
                    $careerEn['title'] = $detail->Title;
                    $careerEn['slug'] = $detail->slug;
                    $careerEn['duration'] = $detail->Duration;
                    $careerEn['jobNumber'] = $detail->JobNumber;
                    $careerEn['description'] = $detail->Description;
                    $careerEn['image'] = $doc;
                    $careerEn['created_on'] = $detail->created_on;

                    //for neapli
                    $careerNe['id'] = $detail->id;
                    $careerNe['title'] = $detail->TitleNepali;
                    $careerNe['slug'] = $detail->slug;
                    $careerNe['duration'] = $detail->Duration;
                    $careerNe['jobNumber'] = $detail->JobNumber;
                    $careerNe['description'] = $detail->DescriptionNepali;
                    $careerNe['image'] = $doc;
                    $careerNe['created_on'] = $detail->created_on;
                }
                if(!empty($detail)){
                    $response = array(
                        'status' => "success",
                        'status_code' => 200,
                        'status_message' => "Data Retreived Successfully",
                        'detail' => [
                            'en' =>$careerEn,
                            'np' => $careerNe
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