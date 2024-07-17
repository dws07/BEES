<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Front_controller
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
            //banners
            $banners = $this->crud_model->get_banners();
            foreach($banners as $key=>$val){
                $banners[$key]->file = base_url('uploads/banners/'.$val->file);
            }
            //banner ends 

            //Forex starts from here
            $latest_date = $this->crud_model->get_where_single_order_by('forex_date', array('status'=>'1'), 'id', 'DESC');
            $date = isset($latest_date->date_forex)?$latest_date->date_forex:date('Y-m-d');
            $sql_dates = "id, date_forex, published_on, modified_on, created_on";     
            $forex_dates = $this->crud_model->get_sql_all_no_pagination('forex_date', array('status'=>'1', 'date_forex' => $date), 'id', 'DESC', $sql_dates);
            foreach($forex_dates as $key=>$val){
                $forex_values = $this->crud_model->get_where_order_by('forex_data', array('forex_date_id' => $val->id), 'id', 'DESC');
                $forex_dates[$key]->forex_values = $forex_values;
            } 
            
            //Services
            $getServices = $this->crud_model->getData('digital_services', array('status'=>'1'), [], 10, 0, 'id, slug, title_nepali, title, featured_image as Image');
            $servicesEn = [];
            $servicesNe = [];
            if($getServices){
                foreach($getServices as $key=>$service){
                    $servicesEn[$key]['id'] = $service->id;
                    $servicesEn[$key]['title'] = $service->title;
                    $servicesEn[$key]['slug'] = $service->slug;
                    $servicesEn[$key]['image'] = $service->Image;
                    
                    $servicesNe[$key]['id'] = $service->id;
                    $servicesNe[$key]['title'] = $service->title_nepali;
                    $servicesNe[$key]['slug'] = $service->slug;
                    $servicesNe[$key]['image'] = $service->Image;
                }
            }
            
            $services = [
                'en' => $servicesEn,
                'np' => $servicesNe,
            ];
            //services
            //products
            $getProducts = $this->crud_model->getData('tbl_products', array('status'=>'1'), [], 10, 0, 'id, slug, title_nepali, title, featured_image');
            
            $productsEn = [];
            $productsNe = [];
            if($getProducts){
                foreach($getProducts as $key=>$product){
                    $productsEn[$key]['id'] = $product->id;
                    $productsEn[$key]['title'] = $product->title;
                    $productsEn[$key]['slug'] = $product->slug;
                    $productsEn[$key]['image'] = $product->featured_image;
                    
                    $productsNe[$key]['id'] = $product->id;
                    $productsNe[$key]['title'] = $product->title_nepali;
                    $productsNe[$key]['slug'] = $product->slug;
                    $productsNe[$key]['image'] = $product->featured_image;
                }
            }
            
            $products = [
                'en' => $productsEn,
                'np' => $productsNe,
            ];
            //Products
            // news 
            $newsEn = [];
            $newsNe = [];
            $sql_news = "id, TitleNepali,  Title, created_on, slug, lastmodified";
            $getNews = $this->crud_model->getData('tbl_news', array('status'=>'1','is_slider'=>'No'), [], 4, 0, $sql_news);
            if($getNews){
                foreach($getNews as $key=>$news){
                    $newsEn[$key]['id'] = $news->id;
                    $newsEn[$key]['title'] = $news->Title;
                    $newsEn[$key]['created'] = (new DateTime($news->created_on))->format('M d, Y');
                    $newsEn[$key]['lastmodified'] = (new DateTime($news->lastmodified))->format('M d, Y');
                    $newsEn[$key]['slug'] = $news->slug;
                    
                    $newsNe[$key]['id'] = $news->id;
                    $newsNe[$key]['title'] = $news->TitleNepali;
                    $newsNe[$key]['created'] = (new DateTime($news->created_on))->format('M d, Y');
                    $newsNe[$key]['lastmodified'] = (new DateTime($news->lastmodified))->format('M d, Y');
                    $newsNe[$key]['slug'] = $news->slug;
                }
            }
            
            $news = array(
                'en' => $newsEn,
                'np' => $newsNe,
            );
            //news

            // career 
            $careerEn = [];
            $careerNe = [];
            $param = [
                'status'=>'1',
                'Type' => 'career'
            ];
            $sql_career = "id,  TitleNepali,DocPath,  Title, created_on, slug, lastmodified";
            $getCareer = $this->crud_model->getData('tbl_career', $param, [], 4, 0, $sql_career);
            if($getCareer){
                foreach($getCareer as $key=>$career){
                    $file = '';
                    if($career->DocPath){
                       $file =  base_url("uploads/doc/").$career->DocPath;
                    }
                    $careerEn[$key]['id'] = $career->id;
                    $careerEn[$key]['title'] = $career->Title;
                    $careerEn[$key]['created'] =(new DateTime($career->created_on))->format('M d, Y');
                    $careerEn[$key]['lastmodified'] = (new DateTime($career->lastmodified))->format('M d, Y');
                    $careerEn[$key]['slug'] = $career->slug;
                    $careerEn[$key]['file'] = $file;
                    
                    $careerNe[$key]['id'] = $career->id;
                    $careerNe[$key]['title'] = $career->TitleNepali;
                    $careerNe[$key]['created'] = (new DateTime($career->created_on))->format('M d, Y');
                    $careerNe[$key]['lastmodified'] = (new DateTime($career->lastmodified))->format('M d, Y');
                    $careerNe[$key]['slug'] = $career->slug;
                    $careerNe[$key]['file'] = $file;
                }
            }
            
            $careers = array(
                'en' => $careerEn,
                'np' => $careerNe,
            );
            //career

            // notice 
            $noticeEn = [];
            $noticeNe = [];
            $param = [
                'status'=>'1',
                'Type' => 'notice'
            ];
            $sql_notice = "id,  TitleNepali, DocPath, Title, created_on, slug, lastmodified";
            $getNotice = $this->crud_model->getData('tbl_career', $param, [], 4, 0, $sql_notice);
            if($getNotice){
                foreach($getNotice as $key=>$notice){
                    $file = '';
                    if($notice->DocPath){
                       $file =  base_url("uploads/doc/").$notice->DocPath;
                    }
                    $noticeEn[$key]['id'] = $notice->id;
                    $noticeEn[$key]['title'] = $notice->Title;
                    $noticeEn[$key]['created'] = (new DateTime($notice->created_on))->format('M d, Y');
                    $noticeEn[$key]['lastmodified'] = (new DateTime($notice->lastmodified))->format('M d, Y');
                    $noticeEn[$key]['slug'] = $notice->slug;
                    $noticeEn[$key]['file'] = $file;
                    
                    $noticeNe[$key]['id'] = $notice->id;
                    $noticeNe[$key]['title'] = $notice->TitleNepali;
                    $noticeNe[$key]['created'] = (new DateTime($notice->created_on))->format('M d, Y');
                    $noticeNe[$key]['lastmodified'] =(new DateTime($notice->lastmodified))->format('M d, Y');
                    $noticeNe[$key]['slug'] = $notice->slug;
                    $noticeNe[$key]['file'] = $file;
                }
            }
            
            $notices = array(
                'en' => $noticeEn,
                'np' => $noticeNe,
            );
            
            $newsAndEvent = [
                'news' => $news,
                'notices' => $notices,
                'careers' => $careers
            ];
            //notice ends

            //grievance
            $grievance_officer  = $this->crud_model->get_where_single_order_by('officers', array('type'=>'Grievance', 'status'=> '1'), 'id', 'DESC');
            //grievance ends

            //information
            $information_officer  = $this->crud_model->get_where_single_order_by('officers', array('type'=>'Information', 'status'=> '1'), 'id', 'DESC'); 
            //information ends

            //compliance
            $compliance_officer  = $this->crud_model->get_where_single_order_by('officers', array('type'=>'Compliance', 'status'=> '1'), 'id', 'DESC'); 
            //compliance ends
            
            $digital_banking  = $this->crud_model->get_where_single_order_by('digital_banking', array('status'=> '1'), 'id', 'DESC'); 
            
            //site-setting
            $site_settings = $this->crud_model->get_where_single_order_by('site_settings', array('id'=>'1'), 'id', 'DESC');
            //site-setting ends

            //proviences
            $proviences = $this->crud_model->getData('provinces', ['status' => '1'], [], 0, 0);
            //proviences ends

            //district 
            $districts = $this->crud_model->getData('districts', ['status' => '1'], [], 0, 0);
            //district ends

            //branch
            $branches= $this->crud_model->getData('tbl_branches', ['status' => '1'], [], 0, 0);
            //branch ends
            
            $popups = $this->crud_model->get_popups();
            foreach($popups as $key=>$val){
                $popups[$key]->file = base_url('uploads/popup/'.$val->file);
            } 
            //pops ends

            //Counts
            $sql_en_count = "Title, Number, slug";
            $count_en = $this->crud_model->get_sql_all('tbl_count',array('status'=>'1'),'id','DESC',8,0,$sql_en_count);
            
            
            $sql_np_count = "TitleNepali as Title, NumberNepali as Number, slug";
            $count_np = $this->crud_model->get_sql_all('tbl_count',array('status'=>'1'),'id','DESC',4,0,$sql_np_count);
            
            
            $count = array(
                'en' => $count_en,
                'np' => $count_np,
            );
            
            //Counts ends
            $response = array(
                'status' => "success",
                'status_code' => 200,
                'status_message' => "Data Retreived Successfully",
                'banners' => $banners,
                'forex' => $forex_dates,
                'services' => $services,
                'products' => $products,
                'newsAndEvent' => $newsAndEvent,
                'digital_banking' => $digital_banking,
                'support' => [
                    'information_officer' => $information_officer,
                    'grievance_officer' => $grievance_officer,
                    'compliance_officer' => $compliance_officer,
                ],
                'proviences' => $proviences,
                'districts' => $districts,
                'branches' => $branches,
                'site_settings' => $site_settings,
                'count' => $count,
                'popups' => $popups, 
            );
        }
        // var_dump($response);exit;
        $json_response = json_encode($response);
        echo $json_response;
    }
}