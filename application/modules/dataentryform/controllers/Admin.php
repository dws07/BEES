<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{
	protected $table;
	protected $userId;
	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->table = 'personal_information';
		$this->userId = $this->data['userId'];
		$this->redirect = 'dataentryform/admin/';
	} 
	

	public function all($page = '')
	{ 

		// $number = "1234567890";
		// var_dump($this->crud_model->ent_to_nepali_num_convert($number));exit;
		$like = [];
		$param = [
			'ti.status !=' => '2',
		];
		$session_param = $this->session->userdata('param');
		if($this->input->method() == 'post' && $this->input->post()){
			$fromdate = $this->input->post('fromdate');
			$todate = $this->input->post('todate');
			$param['ti.created >='] = $fromdate;
			$param['ti.created <='] = $todate;
			$this->session->set_userdata('param', $param);
			$this->session->set_userdata('form_data', $this->input->post());

			redirect('dataentryform/admin/all');
		// 	echo "<pre>";
		// var_dump($param);exit; 
		}else if($session_param){
			$param = $session_param;
		}
		// echo "<pre>";
		// var_dump($param);exit; 
		$total = $this->crud_model->get_total_count_traveller_group_by_person($param); 
		// var_dump($total);exit;
		$config['base_url'] = base_url($this->redirect.'all');
		$config['total_rows'] = $total;
		$config['uri_segment'] = 4;
		$config['per_page'] = 10;
		//outside of flist that is <ul></ul>
		$config['full_tag_open'] = '<ul class="pagination pagination-sm m-0 float-right">';

		//go to first link customize
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		//for all list outside of the a tag that is <li></li>
		$config['num_tag_open'] = '<li class="page-item">'; 
		//to add class to attribute
		$config['attributes'] = array('class' => 'page-link');
		$config['num_tag_close'] = '</li>';
		
		$config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

		//customize current page
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['full_tag_close'] = '</ul>';
		$config['suffix'] = isset($search)?"?table_search=$search":'';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data['pagination'] = $this->pagination->create_links();

		$data['items']  = $this->crud_model->get_person_list_limit_group_by_travel($config['per_page'], $page, $param);
		// echo "<pre>";
		// var_dump($data['roles']);exit();
		$data['offset'] = $page;
		$data['title'] = 'Data Entry Form';
		$data['page'] = 'list';
		$data['dataentryform'] = 'dataentryform-all';
		$data = array_merge($this->data, $data);

		$this->load->view('layouts/admin/index', $data);
	} 

	public function saveSnaps(){
		$folderPath = 'uploads/';
		$image_parts = explode(";base64,", $_POST['image']);
		$image_type_aux = explode("image/",$image_parts[0]);
		$image_type = $image_type_aux[1];
		$image_base64 = base64_decode($image_parts[1]);
		$file = $folderPath . uniqid() . '.png';
		file_put_contents($file, $image_base64);
		echo $file;
	}

	public function upload_image() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|webp|pdf|heic';
        $config['max_size'] = 500000;
        // $config['max_width'] = 1024;
        // $config['max_height'] = 768;

        // $this->load->library('upload', $config);
		$this->upload->initialize($config);

        if (!$this->upload->do_upload('document_upload')) {
            $error = array('error' => $this->upload->display_errors());
            echo $error['error'];
        } else {
            // $data = array('upload_data' => $this->upload->data());
			$file = $this->upload->data();
            $Image = $file[ 'file_name' ];
            echo 'uploads/'.$Image;
        }
    }

	public function upload_file() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|webp|pdf|heic';
        $config['max_size'] = 500000;
        // $config['max_width'] = 1024;
        // $config['max_height'] = 768;

        // $this->load->library('upload', $config);
		$this->upload->initialize($config);

        if (!$this->upload->do_upload('document_upload')) { 
			$response = array(
				'status' => 'error',
				'status_message' => $this->upload->display_errors()
			);   
        } else {
            // $data = array('upload_data' => $this->upload->data());
			$file = $this->upload->data();
            $Image = $file[ 'file_name' ];
			$html = '<div class="iles_upld">
						<a href="'.base_url('uploads/').$Image.'" target="_blank">View</a>
						<a class="btn btn-sm btn-danger removeFiles"><i class="fa fa-trash"></i></a>
						<input type="hidden" name="captured_file[]" value="/uploads/'.$Image.'">
					</div>';
			$response = array(
				'status' => 'success',
				'status_message' => 'successfully uploaded',
				'html' => $html
			);
        }
		header('Content-Type: application/json');
		echo json_encode($response);
    }

	public function upload_file_travel() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 500000;
        // $config['max_width'] = 1024;
        // $config['max_height'] = 768;

        // $this->load->library('upload', $config);
		$this->upload->initialize($config);

        if (!$this->upload->do_upload('document_upload')) { 
			$response = array(
				'status' => 'error',
				'status_message' => $this->upload->display_errors()
			);   
        } else {
            // $data = array('upload_data' => $this->upload->data());
			$file = $this->upload->data();
            $Image = $file[ 'file_name' ];
			$html = '<div class="iles_upld">
						<a href="'.base_url('uploads/').$Image.'" target="_blank">View</a>
						<a class="btn btn-sm btn-danger removeFiles"><i class="fa fa-trash"></i></a>
						<input type="hidden" name="captured_file_travel[]" value="/uploads/'.$Image.'">
					</div>';
			$response = array(
				'status' => 'success',
				'status_message' => 'successfully uploaded',
				'html' => $html
			);
        }
		header('Content-Type: application/json');
		echo json_encode($response);
    }

	public function form($id = '')
	{
		$data['detail'] = $this->crud_model->get_where_single($this->table, array('id' => $id));
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());exit;
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('phone_number', 'सम्पर्क नम्बर', 'required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('country_code', 'Country Code', 'required');
			if ($this->form_validation->run()) {
				$personal_data = array(
					'nationality' => $this->input->post('nationality'),
					'phone_number' => $this->input->post('phone_number'),
					'name' => $this->input->post('name'),
					'gender' => $this->input->post('gender'),
					'identicard_type' => $this->input->post('identicard_type'),
					'identicard_number' => $this->input->post('identicard_number'),
					'date_of_birth' => $this->input->post('date_of_birth'),
					'nepali_date_of_birth' => $this->input->post('nepali_date_of_birth'),
					'age' => $this->input->post('age'),
					'address' => $this->input->post('address'),
					'marital_status' => $this->input->post('marital_status'),
					'marital_status_remarks' => $this->input->post('marital_status_remarks'),
					'occupation' => $this->input->post('occupation'),
					'profile_image' => $this->input->post('captured_image'),
					// 'captured_file' => $this->input->post('captured_file'),
					'country_code' => $this->input->post('country_code'),
					// $number = "1234567890";
					// var_dump($this->crud_model->ent_to_nepali_num_convert($number));exit;$this->input->post('country_code'),
					'remarks' => $this->input->post('remarks'),
				);

				$travell_data = array(
					'travel_start_country' => $this->input->post('travel_start_country'),
					'entry_adress' => $this->input->post('entry_adress'),
					'entry_time' => $this->input->post('entry_time'),
					// 'exit_time' => $this->input->post('exit_time'),
					'entry_address2' => $this->input->post('entry_address2'),
					'travel_destination' => $this->input->post('travel_destination'),
					'travel_deuration' => $this->input->post('travel_deuration'),
					'travel_porpose' => $this->input->post('travel_porpose'),
					'traveler_proporty' => $this->input->post('traveler_proporty'),
					'travel_type' => $this->input->post('travel_type'),
					'gone_dirction' => $this->input->post('gone_dirction'),
					'remarks' => $this->input->post('remarks'),
				);

				$vehicle_information = array(
					'vehicle_information' => $this->input->post('vehicle_information'),
					'types_of_vehicle' => $this->input->post('types_of_vehicle'),
					'vehicle_number' => $this->input->post('vehicle_number'),
					'vehicle_number_nepali' => $this->input->post('vehicle_number_nepali'),
					'drivers_name' => $this->input->post('drivers_name'),
					'driving_licence' => $this->input->post('driving_licence'),
					'drivers_number' => $this->input->post('drivers_number'),
					'use_of_vehicle' => $this->input->post('use_of_vehicle'),
					'heavy_vehicle_type' => $this->input->post('heavy_vehicle_type'),
					'property_information' => $this->input->post('property_information'),
					'pasengers' => $this->input->post('pasengers'),
				);

				$children_name = $this->input->post('children_name'); 
				$nepali_dob_children = $this->input->post('nepali_date_of_birthss');
				$children_dob = $this->input->post('children_dob');
				$children_age = $this->input->post('children_age');
				$children_gender = $this->input->post('children_gender');
				$children_address = $this->input->post('children_address');
				$children_identicard_number = $this->input->post('children_identicard_number');
				$children_parent_name = $this->input->post('children_parent_name');
				$children_relations = $this->input->post('children_relations');
				$captured_image_child = $this->input->post('captured_image_child');
				$captured_file_children = $this->input->post('captured_file_children');
				

				$health_information = array(
					'health_status' => $this->input->post('health_status'),
					'health_result' => $this->input->post('health_result'),
				);

				$captured_file = $this->input->post('captured_file');
				$captured_file_travel = $this->input->post('captured_file_travel');
				// print_r($data);exit;
				$id = $this->input->post('id');
				if ($id == '') { 
					$person = $this->crud_model->get_where_single('personal_information', array('phone_number' => $this->input->post('phone_number'),'country_code' => $this->input->post('country_code')));
					if($person){ 
						$person_id = $person->id; 
						$personal_data['updated'] = date('Y-m-d');
						$personal_data['updated_by'] = $this->userId;
						$result = $this->crud_model->update('personal_information', $personal_data, array('id' => $person_id));
						if($result){
							if(count($captured_file)>0){ 
								if(isset($captured_file[0]) && $captured_file[0] !=''){
									$delete_all_child = $this->crud_model->hardDelete('person_info_files', array('person_id'=>$person_id));
									for($i=0;$i<count($captured_file);$i++){ 
										$captured_file_data['person_id'] = $person_id; 
										$captured_file_data['files'] = $captured_file[$i];   

										$this->crud_model->insert('person_info_files', $captured_file_data);
									}
								} 
							}	
						}
					}else{
						$personal_data['created'] = date('Y-m-d');
						$personal_data['created_by'] = $this->userId;
						$personal_data['status'] = '1';
						$result = $this->crud_model->insert('personal_information', $personal_data);
						if(!$result){
							$this->session->set_flashdata('error', 'Unable To Insert Personal Information.');
							redirect('dataentryform/admin/form/' . $id);
						}
						$person_id = $this->db->insert_id();
						if(count($captured_file)>0){ 
							if(isset($captured_file[0]) && $captured_file[0] !=''){ 
								for($i=0;$i<count($captured_file);$i++){ 
									$captured_file_data['person_id'] = $person_id; 
									$captured_file_data['files'] = $captured_file[$i];   

									$this->crud_model->insert('person_info_files', $captured_file_data);
								}
							} 
						}
					}	
					
					$latest_travel_info = $this->crud_model->get_where_single_order_by('travel_information', array('is_returned'=>0,'person_id'=>$person_id), 'id', 'desc');
					if($latest_travel_info){
						$update_travel_info['exit_time'] = $this->input->post('exit_time');
						$update_travel_info['is_returned'] = 1;
						$update_travel_info['updated'] = date('Y-m-d');
						$update_travel_info['updated_by'] = $this->userId;
						$result_update_travel_info = $this->crud_model->update('travel_information', $update_travel_info, array('id' => $latest_travel_info->id));
						if ($result_update_travel_info == true) {
							if(count($captured_file_travel)>0){ 
								if(isset($captured_file_travel[0]) && $captured_file_travel[0] !=''){
									$delete_all_child = $this->crud_model->hardDelete('travel_info_files', array('travel_id'=>$latest_travel_info->id));
									for($i=0;$i<count($captured_file_travel);$i++){ 
										$captured_file_travel_data['travel_id'] = $latest_travel_info->id; 
										$captured_file_travel_data['files'] = $captured_file_travel[$i];   

										$this->crud_model->insert('travel_info_files', $captured_file_travel_data);
									}
								} 
							}
							// $gone_direction = '';
							// if($latest_travel_info->gone_dirction == "नेपाल"){
							// 	$gone_direction = "भारत";
							// }else{
							// 	$gone_direction = "नेपाल";
							// }
							// $insert_return_data['travel_id'] = $latest_travel_info->id;
							// $insert_return_data['direction'] = $gone_direction;
							// $result_insert_return_data = $this->crud_model->insert('gone_direction_information', $insert_return_data); 
								if($this->input->post('travel_type') == 'गाडी'){ 
									$update_vehicle_info['is_returned'] = $this->input->post('is_returned_vehicle');
									$update_vehicle_info['updated'] = date('Y-m-d');
									$update_vehicle_info['updated_by'] = $this->userId;
									$result_update_vehicle_info = $this->crud_model->update('vehicle_information', $update_vehicle_info, array('travel_id' => $latest_travel_info->id));
								}
								if(count($children_name)>0){ 
									if(isset($children_name[0]) && $children_name[0] !=''){
										$delete_all_child = $this->crud_model->hardDelete('children_information', array('travel_id'=>$latest_travel_info->id));
										$isreturneed = $this->input->post('is_returned_child');
										for($i=0;$i<count($children_name);$i++){ 
											$children_data['travel_id'] = $latest_travel_info->id; 
											$children_data['children_name'] = $children_name[$i];  
											$children_data['nepali_dob_children'] = $nepali_dob_children[$i]; 
											$children_data['children_dob'] = $children_dob[$i]; 
											$children_data['children_age'] = $children_age[$i]; 
											$children_data['children_gender'] = $children_gender[$i]; 
											$children_data['children_address'] = $children_address[$i]; 
											$children_data['children_identicard_number'] = $children_identicard_number[$i]; 
											$children_data['children_parent_name'] = $children_parent_name[$i]; 
											$children_data['children_relations'] = $children_relations[$i]; 
											$children_data['captured_image'] = $captured_image_child[$i]; 
											$children_data['captured_file_children'] = $captured_file_children[$i]; 
											$children_data['is_returned'] = $isreturneed[$i];
											$children_data['updated'] = date('Y-m-d');
											$children_data['updated_by'] = $this->userId;

											$this->crud_model->insert('children_information', $children_data);
										}
									} 
								}		
							$this->session->set_flashdata('success', 'Successfully Updated.');
							redirect('dataentryform/admin/all');	
						}
					}else{
						$travell_data['person_id'] = $person_id;
						$travell_data['is_returned'] = 0;
						$travell_data['created'] = date('Y-m-d');
						$travell_data['created_by'] = $this->userId;
						$travell_data['status'] = '1';
						$travel_insert = $this->crud_model->insert('travel_information', $travell_data); 
						$travel_id = $this->db->insert_id();
						if($travel_insert){ 
							// $insert_gone_direction_data['travel_id'] = $travel_id;
							// $insert_gone_direction_data['direction'] = $travell_data['gone_dirction'];
							// $result_insert_gone_direction_data = $this->crud_model->insert('gone_direction_information', $insert_gone_direction_data); 

							$vehicle_information['travel_id'] = $travel_id;  
							if($this->input->post('travel_type')=='गाडी'){ 
								$vehicle_information['created'] = date('Y-m-d');
								$vehicle_information['created_by'] = $this->userId;
								$vehicle_insert = $this->crud_model->insert('vehicle_information', $vehicle_information);
							}

							if(count($captured_file_travel)>0){ 
								if(isset($captured_file_travel[0]) && $captured_file_travel[0] !=''){ 
									for($i=0;$i<count($captured_file_travel);$i++){ 
										$captured_file_travel_data['travel_id'] = $travel_id; 
										$captured_file_travel_data['files'] = $captured_file_travel[$i];   

										$this->crud_model->insert('travel_info_files', $captured_file_travel_data);
									}
								} 
							}

							$health_information['travel_id'] = $travel_id; 
							$health_insert = $this->crud_model->insert('health_information', $health_information);

							if(count($children_name)>0){
								if(isset($children_name[0]) && $children_name[0] !=''){
									for($i=0;$i<count($children_name);$i++){
										$children_data['travel_id'] = $travel_id; 
										$children_data['children_name'] = $children_name[$i];  
										$children_data['nepali_dob_children'] = $nepali_dob_children[$i]; 
										$children_data['children_dob'] = $children_dob[$i]; 
										$children_data['children_age'] = $children_age[$i]; 
										$children_data['children_gender'] = $children_gender[$i]; 
										$children_data['children_address'] = $children_address[$i]; 
										$children_data['children_identicard_number'] = $children_identicard_number[$i]; 
										$children_data['children_parent_name'] = $children_parent_name[$i]; 
										$children_data['children_relations'] = $children_relations[$i];
										$children_data['captured_image'] = $captured_image_child[$i]; 
										$children_data['captured_file_children'] = $captured_file_children[$i]; 
										$children_data['created'] = date('Y-m-d');
										$children_data['created_by'] = $this->userId; 

										$this->crud_model->insert('children_information', $children_data);
									}
								}
							}
							
							// $children_insert = $this->crud_model->insert('children_information', $children_information);
							

						}
						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect('dataentryform/admin/all');
					}	 
				} else {
					$data['updated'] = date('Y-m-d');
					$data['updated_by'] = $this->userId;
					$result = $this->crud_model->update('personal_information', $personal_data, array('id' => $id));
					if ($result == true) {
						$this->session->set_flashdata('success', 'Successfully Updated.');
						redirect('dataentryform/admin/all');
						
					} else {
						$this->session->set_flashdata('error', 'Unable To Update.');
						redirect('dataentryform/admin/form/' . $id);
						
					}
				}
			}
		}
		$data['title'] = 'Add/Edit Data Entry Form';
		$data['page'] = 'form';
		$data['dataentryform'] = 'dataentryform-form';
		$data = array_merge($this->data, $data);
		$this->load->view('layouts/admin/index', $data);
	}

	public function soft_delete($id)
	{
		
		$data = array(
			'status' => '2',
			'updated_by' => $this->userId,
			'updated' => date('Y-m-d'),
		);
		$result = $this->crud_model->update('personal_information', $data, array('id' => $id));
		if ($result == true) {
			$this->session->set_flashdata('success', 'Successfully Deleted.');
			redirect('dataentryform/admin/all');
			
		} else {
			$this->session->set_flashdata('error', 'Unable To Delete.');
			redirect('dataentryform/admin/all');
			
		}
	}

	public function getDetailFromContact()
	{
		try {

			if (!$this->input->is_ajax_request()) {
				exit('No direct script access allowed');
			} else {
				//access ok 
				// echo "here";
				// exit;
				// $check = $this->load->view('listall/image_form');  
				$data = $this->input->post(); 
				
				$contact = $data['conatct'];  
				$country_code = $data['country_code'];  

				$person = $this->crud_model->get_where_single('personal_information', array('phone_number' => $contact,'country_code'=>$country_code));
				$totalchildren = 1;
				if ($person) {
					$latest_travel_info = $this->crud_model->get_where_single_order_by('travel_information', array('is_returned'=>0,'person_id'=>$person->id), 'id', 'desc');
					if($latest_travel_info){
						// echo "here";exit;
						$childrens = [];
						$childrens = $this->crud_model->get_where_order_by('children_information', array('travel_id'=>$latest_travel_info->id), 'id', 'desc');
						$travel_files = $this->crud_model->get_where_order_by('travel_info_files', array('travel_id'=>$latest_travel_info->id), 'id', 'desc');
						$person_files = $this->crud_model->get_where_order_by('person_info_files', array('person_id'=>$person->id), 'id', 'desc');
						$health_info = $this->crud_model->get_where_single_order_by('health_information', array('travel_id'=>$latest_travel_info->id), 'id', 'desc');
						$vehicle_info = $this->crud_model->get_where_single_order_by('vehicle_information', array('travel_id'=>$latest_travel_info->id), 'id', 'desc');
						
						$html = '';
						
						if($childrens){ 
							foreach($childrens as $key=>$val){
								$totalchildren = $totalchildren + $key;
								$chld_img = ($val->captured_image !== '' && $val->captured_image)?base_url('/').$val->captured_image:base_url('/uploads/Circle-icons-profile.svg.png'); 

								$html .= '<div class="DeleteFunctionsssss childraj" style="border-top:1px dashed #ccc;margin-top:20px">
								<div class="row MainForm">
									<div class="col-sm-12">
										<div class="form-group child_btn">
											<label>पुरा नाम : </label>
											<input type="text" name="children_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_name'.($key+1).'" style="width:80% !important" placeholder="पुरा नाम" value="'.$val->children_name.'">
										</div>
									</div> 
									<div class="col-sm-12">
										<div class="form-group child_btn">
											<div class="flexxx">
												<label>जन्म मिति  : </label>
											</div>  
												<div class="swtchcld">
													AD / BS
													<label class="switch">
														<input id="Switchssschild'.($key+1).'"  type="checkbox">
														<span class="slider round"></span>
													</label>
												</div>   
												<input type="text" name="nepali_date_of_birthss[]" id="nepali-datepickerchild'.($key+1).'" style="width:58%" class="form-control personalinfo2 nepdatesschild activessssss cmnreset" placeholder="जन्म मिति" autocomplete="off" value="'.$val->nepali_dob_children.'"> 
												<input type="text" name="english_date_of_birthss[]"
																				id="datepickerchild'.($key+1).'"
																				style="width:58%"
																				class="form-control personalinfo2 engdatesschild "
																				placeholder="Date of Birth"
																				value="'.$val->children_dob.'">
												<input type="hidden" name="children_dob[]" id="dobsssschid'.($key+1).'">
										</div>
									</div>    
									<div class="col-sm-12">
										<div class="form-group">
											<label> उमेर : </label> 
											<input style="width:80%" type="text" name="children_age[]" class="form-control personalinfo2 cmnreset" id="children_age'.($key+1).'" placeholder="उमेर" value="'.$val->children_age.'" readonly>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>लिंग : </label> 
											<div class="radiosss" style="width:59%">
												<input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender['.$key.']" value="पुरुष" '.(((isset($val->children_gender)) && $val->children_gender == "पुरुष") ? "checked" : "").'> <span>पुरुष</span>
												<input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender['.$key.']" value="महिला" '.(((isset($val->children_gender)) && $val->children_gender == "महिला") ? "checked" : "").'> <span>महिला</span>
												<input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender['.$key.']" value="तेस्रोलिंगी" '.(((isset($val->children_gender)) && $val->children_gender == "तेस्रोलिंगी") ? "checked" : "").'> <span>तेस्रोलिंगी</span>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>ठेगाना : </label>
											<input type="text" name="children_address[]" class="form-control utf8val width75 personalinfo2 cmnreset" id="children_address'.($key+1).'" placeholder="ठेगाना" value="'.$val->children_address.'">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label> संरक्षकको पुरा नाम : </label>
											<input type="text" name="children_parent_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_parent_name'.($key+1).'" style="width:80%" placeholder="संरक्षकको पुरा नाम " value="'.$val->children_parent_name.'">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>सम्बन्ध : </label>
											<input type="text" name="children_relations[]" class="form-control utf8val personalinfo2 cmnreset" style="width:80%" id="children_relations'.($key+1).'" placeholder="सम्बन्ध " value=""> 
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>परिचय पत्र नम्बर : </label>
											<input type="text" name="children_identicard_number[]" class="form-control utf8val personalinfo2 cmnreset" style="width:58%" id="children_identicard_number'.($key+1).'" placeholder="परिचय पत्र नम्बर " value="'.$val->children_identicard_number.'"> 
										</div>
									</div>  
									<div class="col-sm-6">
										<div class="form-group">
											<label>फर्केको : </label> 
											<div class="radiosss width75 ">
												<input type="radio" class="personalinfo2_checked cmnreset_checked" name="is_returned_child['.$key.']" value="1" '.(((isset($val->is_returned)) && $val->is_returned == "1") ? "checked" : "").'> <span>हो</span>
												<input type="radio" class="personalinfo2_checked cmnreset_checked" name="is_returned_child['.$key.']" value="0" '.(((isset($val->is_returned)) && $val->is_returned == "0") ? "checked" : "").'> <span>होइन</span> 
											</div>  
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group children-photo">  
											<div id="camera_open'.($key+1).'" class="camera_open_hai" camera_count="'.($key+1).'">
												<i class="fa fa-camera"></i>
												<p>फोटो</p>
												<input type="hidden" name="captured_image_child[]" id="captured_image'.($key+1).'" value="">
											</div>
											<div id="viewImage'.($key+1).'" class="chldimg">
												<img id = "webcam" src = "'.$chld_img.'">
											</div>
											<div id="appendcam'.($key+1).'">

											</div> 
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group children-photo">  
											<p id="viewFileChildren'.($key+1).'">Upload File</p>
											<input type="file" name="document_upload" class="children_doc" id="document_upload_children'.($key+1).'" filecount="'.($key+1).'">
											<input type="hidden" name="captured_file_children[]" id="captured_file_children'.($key+1).'" value="">
											<a class="btn btn-sm btn-danger FormRemoveFunction" id="FormRemoveFunction"><i class="fa fa-trash"></i></a>
										</div>
									</div>
								</div>
							</div>';			
							}
						}else{
									$html .= '<div class="DeleteFunctionsssss childraj" style="border-top:1px dashed #ccc;margin-top:20px">
									<div class="row MainForm">
										<div class="col-sm-12">
											<div class="form-group child_btn">
												<label>पुरा नाम : </label>
												<input type="text" name="children_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_name1" style="width:80% !important" placeholder="पुरा नाम" value="">
											</div>
										</div> 
										<div class="col-sm-12">
											<div class="form-group child_btn">
												<div class="flexxx">
													<label>जन्म मिति  : </label>
												</div>  
													<div class="swtchcld">
														AD / BS
														<label class="switch">
															<input id="Switchssschild1"  type="checkbox">
															<span class="slider round"></span>
														</label>
													</div>   
													<input type="text" name="nepali_date_of_birthss[]" id="nepali-datepickerchild1" style="width:58%" class="form-control personalinfo2 nepdatesschild activessssss cmnreset" placeholder="जन्म मिति" autocomplete="off"> 
													<input type="text" name="english_date_of_birthss[]"
																					id="datepickerchild1"
																					style="width:58%"
																					class="form-control personalinfo2 engdatesschild "
																					placeholder="Date of Birth">
													<input type="hidden" name="children_dob[]" id="dobsssschid1">
											</div>
										</div>    
										<div class="col-sm-12">
											<div class="form-group">
												<label> उमेर : </label> 
												<input style="width:80%" type="text" name="children_age[]" class="form-control personalinfo2 cmnreset" id="children_age1" placeholder="उमेर" value="" readonly>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>लिंग : </label>
												<div class="radiosss" style="width:59%">
													<input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender[0]" value="पुरुष"> <span>पुरुष</span>
													<input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender[0]" value="महिला"> <span>महिला</span>
													<input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender[0]" value="तेस्रोलिंगी"> <span>तेस्रोलिंगी</span>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>ठेगाना : </label>
												<input type="text" name="children_address[]" class="form-control utf8val width75 personalinfo2 cmnreset" id="children_address1" placeholder="ठेगाना" value="">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label> संरक्षकको पुरा नाम : </label>
												<input type="text" name="children_parent_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_parent_name1" style="width:80%" placeholder="संरक्षकको पुरा नाम " value="">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>सम्बन्ध : </label>
												<input type="text" name="children_relations[]" class="form-control utf8val personalinfo2 cmnreset" style="width:80%" id="children_relations1" placeholder="सम्बन्ध " value=""> 
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>परिचय पत्र नम्बर : </label>
												<input type="text" name="children_identicard_number[]" class="form-control utf8val personalinfo2 cmnreset" style="width:58%" id="children_identicard_number1" placeholder="परिचय पत्र नम्बर " value=""> 
											</div>
										</div>  
										<div class="col-sm-6">
											<div class="form-group">
												<label>फर्केको : </label>
												<div class="radiosss width75 ">
													<input type="radio" class="personalinfo2_checked cmnreset_checked" name="is_returned_child[0]" value="1"> <span>हो</span>
													<input type="radio" class="personalinfo2_checked cmnreset_checked" name="is_returned_child[0]" value="0"> <span>होइन</span> 
												</div>  
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group children-photo"> 
												<div id="camera_open1" class="camera_open_hai" camera_count="1">
													<i class="fa fa-camera"></i>
													<p>फोटो</p>
													<input type="hidden" name="captured_image_child[]" id="captured_image1" value="">
												</div>
												<div id="viewImage1" class="chldimg"></div>
												<div id="appendcam1">
					
												</div>  
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group children-photo">  
												<p id="viewFileChildren1">Upload File</p>
												<input type="file" name="document_upload" class="children_doc" id="document_upload_children1" filecount="1">
												<input type="hidden" name="captured_file_children[]" id="captured_file_children1" value="">
												<a class="btn btn-sm btn-danger FormRemoveFunction" id="FormRemoveFunction"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</div>
								</div>';
						}

						$travel_files_html = '';
						if($travel_files){
							foreach($travel_files as $key=>$val){ 
								$files_travel = ($val->files !== '' && $val->files)?base_url('/').$val->files:base_url('/uploads/Circle-icons-profile.svg.png'); 

								$travel_files_html .= '<div class="iles_upld">
											<a href="'.$files_travel.'" target="_blank">View</a>
											<a class="btn btn-sm btn-danger removeFiles"><i class="fa fa-trash"></i></a>
											<input type="hidden" name="captured_file_travel[]" value="'.$val->files.'">
										</div>';			
							}
						}

						$person_file_html = '';
						if($person_files){
							foreach($person_files as $key=>$val){ 
								$files_person = ($val->files !== '' && $val->files)?base_url('/').$val->files:base_url('/uploads/Circle-icons-profile.svg.png'); 

								$person_file_html .= '<div class="iles_upld">
											<a href="'.$files_person.'" target="_blank">View</a>
											<a class="btn btn-sm btn-danger removeFiles"><i class="fa fa-trash"></i></a>
											<input type="hidden" name="captured_file[]" value="'.$val->files.'">
										</div>';			
							}
						}
						
						$person->travel_info = $latest_travel_info;
						$person->totalchildren = $totalchildren;
						$person->childrens = $html;
						$person->health_info = $health_info;
						$person->vehicle_info = $vehicle_info;
						$response = array(
							'status' => 'successfull',
							'status_code' => 200,
							'status_message' => 'Successfully retrived',
							'data' => $person,
							'htmlperson' => $person_file_html,
							'htmltravel' => $travel_files_html,
							'returned' => 0,
						);
					}else{ 
						$html = '<div class="DeleteFunctionsssss childraj" style="border-top:1px dashed #ccc;margin-top:20px">
									<div class="row MainForm">
										<div class="col-sm-12">
											<div class="form-group child_btn">
												<label>पुरा नाम : </label>
												<input type="text" name="children_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_name1" style="width:80% !important" placeholder="पुरा नाम" value="">
											</div>
										</div> 
										<div class="col-sm-12">
											<div class="form-group child_btn">
												<div class="flexxx">
													<label>जन्म मिति  : </label>
												</div>  
													<div class="swtchcld">
														AD / BS
														<label class="switch">
															<input id="Switchssschild1"  type="checkbox">
															<span class="slider round"></span>
														</label>
													</div>   
													<input type="text" name="nepali_date_of_birthss[]" id="nepali-datepickerchild1" style="width:58%" class="form-control personalinfo2 nepdatesschild activessssss cmnreset" placeholder="जन्म मिति" autocomplete="off"> 
													<input type="text" name="english_date_of_birthss[]"
																					id="datepickerchild1"
																					style="width:58%"
																					class="form-control personalinfo2 engdatesschild "
																					placeholder="Date of Birth">
													<input type="hidden" name="children_dob[]" id="dobsssschid1">
											</div>
										</div>    
										<div class="col-sm-12">
											<div class="form-group">
												<label> उमेर : </label> 
												<input style="width:80%" type="text" name="children_age[]" class="form-control personalinfo2 cmnreset" id="children_age1" placeholder="उमेर" value="" readonly>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>लिंग : </label>
												<div class="radiosss" style="width:59%">
													<input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender[0]" value="पुरुष"> <span>पुरुष</span>
													<input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender[0]" value="महिला"> <span>महिला</span>
													<input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender[0]" value="तेस्रोलिंगी"> <span>तेस्रोलिंगी</span>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>ठेगाना : </label>
												<input type="text" name="children_address[]" class="form-control utf8val width75 personalinfo2 cmnreset" id="children_address1" placeholder="ठेगाना" value="">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label> संरक्षकको पुरा नाम : </label>
												<input type="text" name="children_parent_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_parent_name1" style="width:80%" placeholder="संरक्षकको पुरा नाम " value="">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>सम्बन्ध : </label>
												<input type="text" name="children_relations[]" class="form-control utf8val personalinfo2 cmnreset" style="width:80%" id="children_relations1" placeholder="सम्बन्ध " value=""> 
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>परिचय पत्र नम्बर : </label>
												<input type="text" name="children_identicard_number[]" class="form-control utf8val personalinfo2 cmnreset" style="width:58%" id="children_identicard_number1" placeholder="परिचय पत्र नम्बर " value=""> 
											</div>
										</div>  
										<div class="col-sm-6">
											<div class="form-group">
												<label>फर्केको : </label>
												<div class="radiosss width75 ">
													<input type="radio" class="personalinfo2_checked cmnreset_checked" name="is_returned_child[0]" value="1"> <span>हो</span>
													<input type="radio" class="personalinfo2_checked cmnreset_checked" name="is_returned_child[0]" value="0"> <span>होइन</span> 
												</div>  
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group children-photo"> 
												<div id="camera_open1" class="camera_open_hai" camera_count="1">
													<i class="fa fa-camera"></i>
													<p>फोटो</p>
													<input type="hidden" name="captured_image_child[]" id="captured_image1" value="">
												</div>
												<div id="viewImage1" class="chldimg"></div>
												<div id="appendcam1">
					
												</div>  
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group children-photo">  
												<p id="viewFileChildren1">Upload File</p>
												<input type="file" name="document_upload" class="children_doc" id="document_upload_children1" filecount="1">
												<input type="hidden" name="captured_file_children[]" id="captured_file_children1" value="">
												<a class="btn btn-sm btn-danger FormRemoveFunction" id="FormRemoveFunction"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</div>
								</div>';
						$person->childrens = $html;
						$person->totalchildren = $totalchildren;
						$response = array(
							'status' => 'successfull',
							'status_code' => 200,
							'status_message' => 'Successfully retrived',
							'data' => $person,
							'htmlperson' => '',
							'htmltravel' => '',
							'returned' => 1, 
						);
					} 
				} else { 
					$response = array(
						'status' => 'error',
						'status_code' => 300,
						'status_message' => 'No person found for this number',
						'data' => [],
						'totalchildren' => $totalchildren,
						'htmlperson' => '',
						'htmltravel' => '',
						'html' => '<div class="DeleteFunctionsssss childraj" style="border-top:1px dashed #ccc;margin-top:20px">
						<div class="row MainForm">
							<div class="col-sm-12">
								<div class="form-group child_btn">
									<label>पुरा नाम : </label>
									<input type="text" name="children_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_name1" style="width:80% !important" placeholder="पुरा नाम" value="">
								</div>
							</div> 
							<div class="col-sm-12">
								<div class="form-group child_btn">
									<div class="flexxx">
										<label>जन्म मिति  : </label>
									</div>  
										<div class="swtchcld">
											AD / BS
											<label class="switch">
												<input id="Switchssschild1"  type="checkbox">
												<span class="slider round"></span>
											</label>
										</div>   
										<input type="text" name="nepali_date_of_birthss[]" id="nepali-datepickerchild1" style="width:58%" class="form-control personalinfo2 nepdatesschild activessssss cmnreset" placeholder="जन्म मिति" autocomplete="off"> 
										<input type="text" name="english_date_of_birthss[]"
																		id="datepickerchild1"
																		style="width:58%"
																		class="form-control personalinfo2 engdatesschild "
																		placeholder="Date of Birth">
										<input type="hidden" name="children_dob[]" id="dobsssschid1">
								</div>
							</div>    
							<div class="col-sm-12">
								<div class="form-group">
									<label> उमेर : </label> 
									<input style="width:80%" type="text" name="children_age[]" class="form-control personalinfo2 cmnreset" id="children_age1" placeholder="उमेर" value="" readonly>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>लिंग : </label>
									<div class="radiosss" style="width:59%">
										<input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender[0]" value="पुरुष"> <span>पुरुष</span>
										<input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender[0]" value="महिला"> <span>महिला</span>
										<input type="radio" class="personalinfo2_checked cmnreset_checked" name="children_gender[0]" value="तेस्रोलिंगी"> <span>तेस्रोलिंगी</span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>ठेगाना : </label>
									<input type="text" name="children_address[]" class="form-control utf8val width75 personalinfo2 cmnreset" id="children_address1" placeholder="ठेगाना" value="">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label> संरक्षकको पुरा नाम : </label>
									<input type="text" name="children_parent_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_parent_name1" style="width:80%" placeholder="संरक्षकको पुरा नाम " value="">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>सम्बन्ध : </label>
									<input type="text" name="children_relations[]" class="form-control utf8val personalinfo2 cmnreset" style="width:80%" id="children_relations1" placeholder="सम्बन्ध " value=""> 
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>परिचय पत्र नम्बर : </label>
									<input type="text" name="children_identicard_number[]" class="form-control utf8val personalinfo2 cmnreset" style="width:58%" id="children_identicard_number1" placeholder="परिचय पत्र नम्बर " value=""> 
								</div>
							</div>  
							<div class="col-sm-6">
								<div class="form-group">
									<label>फर्केको : </label>
									<div class="radiosss width75 ">
										<input type="radio" class="personalinfo2_checked cmnreset_checked" name="is_returned_child[0]" value="1"> <span>हो</span>
										<input type="radio" class="personalinfo2_checked cmnreset_checked" name="is_returned_child[0]" value="0"> <span>होइन</span> 
									</div>  
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group children-photo"> 
									<div id="camera_open1" class="camera_open_hai" camera_count="1">
										<i class="fa fa-camera"></i>
										<p>फोटो</p>
										<input type="hidden" name="captured_image_child[]" id="captured_image1" value="">
									</div>
									<div id="viewImage1" class="chldimg"></div>
									<div id="appendcam1">
		
									</div>  
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group children-photo">  
									<p id="viewFileChildren1">Upload File</p>
									<input type="file" name="document_upload" class="children_doc" id="document_upload_children1" filecount="1">
									<input type="hidden" name="captured_file_children[]" id="captured_file_children1" value="">
									<a class="btn btn-sm btn-danger FormRemoveFunction" id="FormRemoveFunction"><i class="fa fa-trash"></i></a>
								</div>
							</div>
						</div>
					</div>'
					);
				}
			}
		} catch (Exception $e) {
			$response = array(
				'status' => 'error',
				'status_message' => $e->getMessage()
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}