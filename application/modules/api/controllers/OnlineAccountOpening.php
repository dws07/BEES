<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OnlineAccountOpening extends Front_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('file');
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
        $this->table = 'account_opening'; 
        $this->title = 'Grievance';
        $this->load->library('Nepali_calendar');
    }

    function form()
    { 
        // echo "here";exit;
        header('Access-Control-Allow-Method:POST');
        if ($this->request_method != "POST") {
            $response=array(
                'status' => "Error",
                'status_code' => 204,
                'status_message' => "Access Method Not Allowed",
            );
        } 
        else 
        {  
            
            $input_data = json_decode(file_get_contents("php://input"));
            
                
            $salution_name = isset($input_data->salution_name)? $input_data->salution_name:''; 
            $first_name =  isset($input_data->first_name)? $input_data->first_name:''; 
            $middle_name = isset($input_data->middle_name)? $input_data->middle_name:'';
            $last_name = isset($input_data->phone)? $input_data->last_name:''; 
            $gender = isset($input_data->gender)? $input_data->gender:'';
            $email = isset($input_data->email)? $input_data->email:'';
            $phone = isset($input_data->phone)? $input_data->phone:'';
            $branch_id = isset($input_data->branch_id)? $input_data->branch_id:'';
            $bod_ad = isset($input_data->bod_ad)? $input_data->bod_ad:'';
            
            $currentDate  = new DateTime($bod_ad);
            
    	    $current = $this->nepali_calendar->AD_to_BS($currentDate->format('Y'), $currentDate->format('m'), $currentDate->format('d'));
        	$nepaliBOD = new DateTime($current['year'] . '-' . $current['month'] . '-' . $current['date']);
        	
            $permanent_address = isset($input_data->permanent_address)? $input_data->permanent_address:''; 
            $temporary_address = isset($input_data->temporary_address)? $input_data->temporary_address:''; 
            $images = isset($input_data->image)? $input_data->image:'';
            
            if ($input_data) {
			
			if($first_name == ""){
                $response=array(
                        'status' => "Error",
                        'status_code' => 307,
                        'status_message' => "First Name is Required!!!", 
                    );
                $json_response = json_encode($response);
                echo $json_response;
                // exit;
            } 
            if($last_name == ""){
                $response=array(
                        'status' => "Error",
                        'status_code' => 307,
                        'status_message' => "Last Name is Required!!!", 
                    );
                $json_response = json_encode($response);
                echo $json_response;
                // exit;
            } 
            
            
            
            
            if($email == ""){
                $response=array(
                        'status' => "Error",
                        'status_code' => 307,
                        'status_message' => "Email And Issue Required!!!", 
                    );
                $json_response = json_encode($response);
                echo $json_response;
                // exit;
            } 
            
            if($phone == ""){
                $response=array(
                        'status' => "Error",
                        'status_code' => 307,
                        'status_message' => "Mobile No is Required!!!", 
                    );
                $json_response = json_encode($response);
                echo $json_response;
                // exit;
            } 
            
            if($branch_id == ""){
                $response=array(
                        'status' => "Error",
                        'status_code' => 307,
                        'status_message' => "Branch Name is Required!!!", 
                    );
                $json_response = json_encode($response);
                echo $json_response;
                // exit;
            } 
            
            if($bod_ad == ""){
                $response=array(
                        'status' => "Error",
                        'status_code' => 307,
                        'status_message' => "BOD (AD) is Required!!!", 
                    );
                $json_response = json_encode($response);
                echo $json_response;
                // exit;
            } 
            
            if($permanent_address == ""){
                $response=array(
                        'status' => "Error",
                        'status_code' => 307,
                        'status_message' => "Permanent Address is Required!!!", 
                    );
                $json_response = json_encode($response);
                echo $json_response;
                // exit;
            } 
            
            if($temporary_address == ""){
                $response=array(
                        'status' => "Error",
                        'status_code' => 307,
                        'status_message' => "Temporary Address is Required!!!", 
                    );
                $json_response = json_encode($response);
                echo $json_response;
                // exit;
            } 
            $file_name = '';
			if($images){
			    $explode = explode(",",$images);
      
                $file_name = $first_name."_".$last_name.'_online_account_passport_'. $email .time(). '.jpg';
                // $uploadpath   = $_SERVER["DOCUMENT_ROOT"].'/PCS/dashprisallc/uploads/resumes/';
                $uploadpath   = $_SERVER["DOCUMENT_ROOT"].'/uploads/online_account/';
                $parts        = explode(";base64,", $images);
                $imageparts   = explode("image/", @$parts[0]);
                $imagetype    = $imageparts[1];
                $imagebase64  = base64_decode($explode[1]);
                $photo         = $uploadpath .$file_name;
			}
			
            $citizenships = isset($input_data->citizenship)? $input_data->citizenship:'';
            
            if($citizenships){
                 $explode_citizenship = explode(",",$citizenships);
  
                $citizenshipfile_name = $first_name.'_online_account_citizenship_'. $email.time() . '.jpg';
                // $uploadpath   = $_SERVER["DOCUMENT_ROOT"].'/PCS/dashprisallc/uploads/resumes/';
                $uploadpath   = $_SERVER["DOCUMENT_ROOT"].'/uploads/online_account/';
                $parts_front        = explode(";base64,", $citizenships);
                $imagepartsCit   = explode("image/", @$parts_front[0]);
                $imagetype    = $imagepartsCit[1];
                $imagebase64citizen  = base64_decode($explode_citizenship[1]);
                $citizenship_path_url  = $uploadpath .$citizenshipfile_name;
                
                
            }else{
                // echo "come";exit;
                    $response=array(
                        'status' => "Error",
                        'status_code' => 206,
                        'status_message' => "Cizitenship file is required", 
                    );
            }
                
                    
            $citizen_back = isset($input_data->citizen_back)? $input_data->citizen_back:'';
            
            if($citizen_back){
                 $explode_citizenship_back = explode(",",$citizen_back);
  
                $citizenshipfile_back_name = $first_name.'_online_account_citizenship_back_'. $email.time() . '.jpg';
                // $uploadpath   = $_SERVER["DOCUMENT_ROOT"].'/PCS/dashprisallc/uploads/resumes/';
                $uploadpath   = $_SERVER["DOCUMENT_ROOT"].'/uploads/online_account/';
                $parts_back        = explode(";base64,", $citizen_back);
                $imageparts   = explode("image/", @$parts_back[0]);
                $imagetype    = $imageparts[1];
                $imagebase64citizenback  = base64_decode($explode_citizenship_back[1]);
                $citizenship_path_back_url  = $uploadpath .$citizenshipfile_back_name;
                
                
            }else{
                // echo "come";exit;
                    $response=array(
                        'status' => "Error",
                        'status_code' => 206,
                        'status_message' => "Cizitenship file is required", 
                    );
            }
                    
    				
			$data = array(
                'salution' => $salution_name,
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'gender' => $gender,
                'email' => $email,
                'phone' => $phone,
                'branch_id' => $branch_id,
                'bod_bs' => $nepaliBOD->format('Y-m-d'),
                'bod_ad' => $bod_ad,
                'paremanent_address' => $permanent_address,
                'temporary_address' => $temporary_address,
                'created' => date('Y-m-d'),
                'status' => '1',
            );
                    
            if($images){
                if(file_put_contents($photo, $imagebase64)){ 
                    $data['passport_photo'] = $file_name;
                }else{
                    // echo "come";exit;
                    $response=array(
                        'status' => "Error",
                        'status_code' => 206,
                        'status_message' => "Unable To Upload Attachment Passport Photo", 
                    );
                }
                
            } 
            
            if($citizenships){
                if(file_put_contents($citizenship_path_url, $imagebase64citizen)){ 
                    $data['font_citizenship'] = $citizenshipfile_name;
                }else{
                    // echo "come";exit;
                    $response=array(
                        'status' => "Error",
                        'status_code' => 206,
                        'status_message' => "Unable To Upload Attachment Citizenship Front Image", 
                    );
                }
                
            } 
            
            if($citizen_back){
                if(file_put_contents($citizenship_path_back_url, $imagebase64citizenback)){ 
                    $data['back_citizenship'] = $citizenshipfile_back_name;
                }else{
                    // echo "come";exit;
                    $response=array(
                        'status' => "Error",
                        'status_code' => 206,
                        'status_message' => "Unable To Upload Attachment Citizenship Back Image", 
                    );
                }
                
            } 
            
            $this->load->library('email');
			    
		    $config = Array(
                'protocol' => 'sendmail',
                // 'smtp_host'  => 'ssl://smtp.gmail.com',
                'smtp_host' => 'mi3-sr5.supercp.com',
                'smtp_port' => '465',
                'smtp_user' => 'no-reply-online-account@skdbl.com.np', 
                'smtp_pass' => 'IM3V,uF=~$c+', 
                // 'smtp_host' => 'mail.admin.icfcbank.com',
                // 'smtp_port' => '465',
                // 'smtp_user' => 'grievance@admin.icfcbank.com', 
                // 'smtp_pass' => '(cx$iLtX=N@%', 
                'mailtype' => 'html',
                //   'charset' => 'iso-8859-1',
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );
            
            $this->email->initialize($config);
            $this->email->from('no-reply-online-account@skdbl.com.np','Saptakoshi Development Bank LTD.');
            $this->email->to($email); 
           
            // $this->email->cc();
            // $this->email->bcc();
            $this->email->subject('Saptakoshi Development Bank LTD. Online Account Opening');
            $this->email->message(
                    '
                <p>Dear Customer,</p>

                <p>Your online account opening has been successfully submitted. The bank will response back to you soon.</p></br>
                <p>Keep checking your mail. </p></br>
                <p>Regards,</p></br>
                
                <p>Saptakoshi Development Bank.</p></br>'
            );
                    
            if($this->email->send()){
                
				$account_id = $this->crud_model->inserted($this->table, $data);
				if($account_id){
				    $detail =$this->crud_model->get_where_single($this->table, array('id' => $account_id));
				    $fullName = implode(' ',[$detail->first_name, $detail->middle_name, $detail->last_name]);
				    $this->email->initialize($config);
                    $this->email->from('no-reply-online-account@skdbl.com.np','Saptakoshi Development Bank LTD.');
                    $this->email->to('operation@skdbl.com.np');  
                   
                    // $this->email->cc();
                    // $this->email->bcc();
                    $this->email->subject('Saptakoshi Development Bank LTD. Online Account Opening');
                    $html = "
                            <p>Dear Admin,</p>

                            <p>User $fullName have been submitted Online Account. Please verify the below listed user details.</p>
                            <ul>
                                <li>
                                    <p> <b>Full Name : </b> $fullName </span></p>
                                </li>
                                <li>
                                    <p> <b> Email : </b> <span> ". $detail->email."</span></p>
                                </li>
                                <li>
                                    <b> Paremanent Address : </b> <span> ". $detail->paremanent_address."</span></p>
                                </li>
                                <li>
                                    <p><b>Temporary Address : </b> <span> ".  $detail->temporary_address."</span></p>
                                </li>
                                <li>
                                    <p><b>Contact : </b> <span>".  $detail->phone."</span></p>
                                </li>
                                <li>
                                    <p><b>Date Of Birth (BS) : </b> <span>".  $detail->bod_bs."</span></p>
                                </li>
                                <li>
                                    <p><b>Date Of Birth (AD) : </b> <span>".  $detail->bod_ad."</span></p>
                                </li>
                                <li>
                                    <p><b>Gender : </b> <span> ".  $detail->gender."</span></p>
                                </li>
                                <li>
                                    <p><b>Branch Name : </b>".$this->crud_model->getField('tbl_branches', ['id' => $detail->branch_id], 'PageTitle')."</p>
                                </li>
                                <li>
                                    <p><b>Citizenship No : </b> <span>".  $detail->citizenship_id."</span></p>
                                </li>
                                <li>
                                    <p><b>Citizenship Front Image : </b>";
                                    
                                    $html .= "</p>";
                                    if($detail->font_citizenship){ 
                                        $html .= "<a href=' ". base_url("uploads/online_account/").$detail->font_citizenship ."' download> <span class='text-primary'>Download Front Citizenship</span></a>";
                                    
                                    }else{ 
                                        $html .= "<span class='text-danger'> No Front Citizenship image found</span>";
                                     } 
                                $html .= "</p></li>
                                <li>
                                    <p><b>Citizenship Back Image : </b> ";
                                    
                                     if($detail->back_citizenship){ 
                                    $html .= "<a href='".base_url("uploads/online_account/").$detail->back_citizenship."' download> <span class='text-primary'>Download Back Citizenship</span></a>";
                                    }else{ 
                                    $html .= "<span class='text-danger'> No Back Citizenship image found</span>";
                                     } 
                                     $html .= "</p>";
                                $html .= "</li>
                                <li>
                                    <p><b>Passport Image : </b>";
                                    if($detail->passport_photo){
                                        $html .= "<a href='". base_url("uploads/online_account/").$detail->passport_photo."' download> 
                                        <span class='text-primary'>Download Passport Photo</span></a> ";
                                    }else{ 
                                        $html .= "<span class='text-danger'> No passport image found</span>";
                                    }
                                    $html .= "</p></li>
                            </ul>
                            </br>
                            <p>Keep checking your mail. </p></br>
                            <p>Regards,</p></br>
                            
                            <p>Saptakoshi Development Bank.</p></br>";
                    $this->email->message($html);
                    if($this->email->send()){
                        $response=array(
                            'status' => "Success",
                            'status_code' => 200,
                            'status_message' => "Successfully Submitted Online Opening Account. Please, check your mail.", 
                        );
                    }
                }else{
                    $response=array(
                            'status' => "Error",
                            'status_code' => 307,
                            'status_message' => "Unable to submit Online Opening Account. Please, contact to SKDBL", 
                        );
                }
            }
			else {  
				$response=array(
                    'status' => "Error",
                    'status_code' => 307,
                    'status_message' => "Mail Not Sent!", 
                );
			} 
            }else{
                $response=array(
                            'status' => "Error",
                            'status_code' => 300,
                            'status_message' => "Input data required", 
                        );
            }   
            
        } 
        $json_response = json_encode($response);
        echo $json_response;
    }
    
}
