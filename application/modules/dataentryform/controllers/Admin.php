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
	}

	

	public function all($page = '')
	{

		$like = [];
		$param = [
			'status !=' => '2',
		];
		// if ($this->auth->current_user()->role_id == 1) {
		//     $config['total_rows'] = $this->crud_model->count_all('dataentryform', array('status !=' => '2'), 'id');
		// }else{
		//     $config['total_rows'] = $this->crud_model->count_all('dataentryform', array('status !=' => '2','id !=' => 1), 'id');
		// }
		// if ($this->auth->current_user()->role_id != 1) {
		//     $param['id !='] =1;
		// }
		if($this->input->method() == 'get'){
			$search = $this->input->get('table_search');
			$like['name' ] = $search;
			
		}
		$total = $this->crud_model->total($this->table, $param, $like);

		$config['base_url'] = base_url('dataentryform/admin/all');
		$config['total_rows'] = $total;
		$config['uri_segment'] = 4;
		$config['per_page'] = 0;
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
		// if ($this->auth->current_user()->role_id == 1) {
		//     $data['roles'] = $this->crud_model->get_where_pagination('dataentryform', array('status !=' => '2'), $config["per_page"], $page);
		// }else{
		//     $data['roles'] = $this->crud_model->get_where_pagination('dataentryform', array('status !=' => '2','id !=' => 1), $config["per_page"], $page);
		// }
		// $data['roles']  = $this->crud_model->getData($this->table, $param, $like, $config["per_page"], $page);
		$data['roles']  = $this->crud_model->get_person_list_no_limit_group_by_travel();
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
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 5000;
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

	public function form($id = '')
	{
		$data['detail'] = $this->crud_model->get_where_single($this->table, array('id' => $id));
		if ($this->input->post()) {
			// echo "<pre>";
			// var_dump($this->input->post());exit;
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('phone_number', 'सम्पर्क नम्बर', 'required|min_length[10]|max_length[10]');
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
					'country_code' => $this->input->post('country_code'),
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
				$children_age = $this->input->post('children_age');
				$children_gender = $this->input->post('children_gender');
				$children_address = $this->input->post('children_address');
				$children_identicard_number = $this->input->post('children_identicard_number');
				$children_parent_name = $this->input->post('children_parent_name');
				$children_relations = $this->input->post('children_relations');
				

				$health_information = array(
					'health_status' => $this->input->post('health_status'),
					'health_result' => $this->input->post('health_result'),
				);
				// print_r($data);exit;
				$id = $this->input->post('id');
				if ($id == '') { 
					$person = $this->crud_model->get_where_single('personal_information', array('phone_number' => $this->input->post('phone_number'),'country_code' => $this->input->post('country_code')));
					if($person){ 
						$person_id = $person->id; 
						$personal_data['updated'] = date('Y-m-d');
						$personal_data['updated_by'] = $this->userId;
						$result = $this->crud_model->update('personal_information', $personal_data, array('id' => $person_id));
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
					}	
					
					$latest_travel_info = $this->crud_model->get_where_single_order_by('travel_information', array('is_returned'=>0,'person_id'=>$person_id), 'id', 'desc');
					if($latest_travel_info){
						$update_travel_info['exit_time'] = $this->input->post('exit_time');
						$update_travel_info['is_returned'] = 1;
						$update_travel_info['updated'] = date('Y-m-d');
						$update_travel_info['updated_by'] = $this->userId;
						$result_update_travel_info = $this->crud_model->update('travel_information', $update_travel_info, array('id' => $latest_travel_info->id));
						if ($result_update_travel_info == true) {
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
									$delete_all_child = $this->crud_model->hardDelete('children_information', array('travel_id'=>$latest_travel_info->id));
									$isreturneed = $this->input->post('is_returned_child');
									for($i=0;$i<count($children_name);$i++){ 
										$children_data['travel_id'] = $latest_travel_info->id; 
										$children_data['children_name'] = $children_name[$i];  
										$children_data['nepali_dob_children'] = $nepali_dob_children[$i]; 
										$children_data['children_age'] = $children_age[$i]; 
										$children_data['children_gender'] = $children_gender[$i]; 
										$children_data['children_address'] = $children_address[$i]; 
										$children_data['children_identicard_number'] = $children_identicard_number[$i]; 
										$children_data['children_parent_name'] = $children_parent_name[$i]; 
										$children_data['children_relations'] = $children_relations[$i]; 
										$children_data['is_returned'] = $isreturneed[$i];
										$children_data['updated'] = date('Y-m-d');
										$children_data['updated_by'] = $this->userId;

										$this->crud_model->insert('children_information', $children_data);
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

							$health_information['travel_id'] = $travel_id; 
							$health_insert = $this->crud_model->insert('health_information', $health_information);

							if(count($children_name)>0){
								for($i=0;$i<count($children_name);$i++){
									$children_data['travel_id'] = $travel_id; 
									$children_data['children_name'] = $children_name[$i];  
									$children_data['nepali_dob_children'] = $nepali_dob_children[$i]; 
									$children_data['children_age'] = $children_age[$i]; 
									$children_data['children_gender'] = $children_gender[$i]; 
									$children_data['children_address'] = $children_address[$i]; 
									$children_data['children_identicard_number'] = $children_identicard_number[$i]; 
									$children_data['children_parent_name'] = $children_parent_name[$i]; 
									$children_data['children_relations'] = $children_relations[$i];
									$children_data['created'] = date('Y-m-d');
									$children_data['created_by'] = $this->userId; 

									$this->crud_model->insert('children_information', $children_data);
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

				$person = $this->crud_model->get_where_single('personal_information', array('phone_number' => $contact));
				$totalchildren = 1;
				if ($person) {
					$latest_travel_info = $this->crud_model->get_where_single_order_by('travel_information', array('is_returned'=>0,'person_id'=>$person->id), 'id', 'desc');
					if($latest_travel_info){
						// echo "here";exit;
						$childrens = [];
						$childrens = $this->crud_model->get_where_order_by('children_information', array('travel_id'=>$latest_travel_info->id), 'id', 'desc');
						$health_info = $this->crud_model->get_where_single_order_by('health_information', array('travel_id'=>$latest_travel_info->id), 'id', 'desc');
						$vehicle_info = $this->crud_model->get_where_single_order_by('vehicle_information', array('travel_id'=>$latest_travel_info->id), 'id', 'desc');
						
						$html = '';
						
						if($childrens){ 
							foreach($childrens as $key=>$val){
								$totalchildren = $totalchildren + $key;
								$html .= '<div class="DeleteFunctionsssss childraj">
								<div class="row MainForm">
									<div class="col-sm-6">
										<div class="form-group child_btn">
											<label>पुरा नाम : </label>
											<input type="text" name="children_name[]" class="form-control utf8val width100 personalinfo2 cmnreset" id="children_name" placeholder="पुरा नाम" value="'.$val->children_name.'">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group child_btn">
											<div class="flexxx">
												<label>जन्म मिति  : </label>
											</div>  
												<input type="text" name="nepali_date_of_birthss[]" id="nepali-datepickerchild'.($key+1).'" class="form-control personalinfo nepdatesschild activessssss" placeholder="जन्म मिति" autocomplete="off" value="'.$val->nepali_dob_children.'"/>   
										</div>
									</div>    
									<div class="col-sm-6">
										<div class="form-group">
											<label> उमेर : </label>
											<input type="text" name="children_age[]" class="form-control width75 personalinfo2 cmnreset" id="children_age" placeholder="उमेर" value="'.$val->children_age.'">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>लिंग : </label>
											<div class="radiosss width75 ">
												<input type="radio" class="personalinfo2 cmnreset" name="children_gender['.$key.']" value="पुरुष" '.(((isset($val->children_gender)) && $val->children_gender == "पुरुष") ? "checked" : "").'> <span>पुरुष</span>
												<input type="radio" class="personalinfo2 cmnreset" name="children_gender['.$key.']" value="महिला" '.(((isset($val->children_gender)) && $val->children_gender == "महिला") ? "checked" : "").'> <span>महिला</span>
												<input type="radio" class="personalinfo2 cmnreset" name="children_gender['.$key.']" value="तेस्रोलिंगी" '.(((isset($val->children_gender)) && $val->children_gender == "तेस्रोलिंगी") ? "checked" : "").'> <span>तेस्रोलिंगी</span>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>ठेगाना : </label>
											<input type="text" name="children_address[]" class="form-control utf8val width75 personalinfo2 cmnreset" id="children_address" placeholder="ठेगाना" value="'.$val->children_address.'">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>परिचय पत्र नम्बर : </label>
											<input type="text" name="children_identicard_number[]" class="form-control personalinfo2 cmnreset" id="children_identicard_number" placeholder="परिचय पत्र नम्बर " value="'.$val->children_identicard_number.'"> 
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label> संरक्षकको पुरा नाम : </label>
											<input type="text" name="children_parent_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_parent_name" placeholder="संरक्षकको पुरा नाम " value="'.$val->children_parent_name.'">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>सम्बन्ध : </label>
											<input type="text" name="children_relations[]" class="form-control utf8val personalinfo2 cmnreset width70" id="children_relations" placeholder="सम्बन्ध " value="'.$val->children_relations.'"> 
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>फर्केको : </label>
											<div class="radiosss width75 ">
												<input type="radio" class="personalinfo2" cmnreset name="is_returned_child['.$key.']" value="1" '.(((isset($val->is_returned)) && $val->is_returned == "1") ? "checked" : "").'> <span>हो</span>
												<input type="radio" class="personalinfo2" cmnreset name="is_returned_child['.$key.']" value="0" '.(((isset($val->is_returned)) && $val->is_returned == "0") ? "checked" : "").'> <span>होइन</span> 
											</div>  
										</div>
									</div>
								</div>
							</div>';
							}
						}else{
							$html .= '<div class="DeleteFunctionsssss childraj">
											<div class="row MainForm">
												<div class="col-sm-6">
													<div class="form-group child_btn">
														<label>पुरा नाम : </label>
														<input type="text" name="children_name[]" class="form-control utf8val width100 personalinfo2 cmnreset" id="children_name" placeholder="पुरा नाम" value="">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group child_btn">
														<div class="flexxx">
															<label>जन्म मिति  : </label>
														</div>    
															<input type="text" name="nepali_date_of_birthss[]" id="nepali-datepickerchild1" class="form-control personalinfo nepdatesschild ndp-nepali-calendar activessssss" placeholder="जन्म मिति" autocomplete="off"> 
													</div>
												</div>    
												<div class="col-sm-6">
													<div class="form-group">
														<label> उमेर : </label>
														<input type="text" name="children_age[]" class="form-control width75 personalinfo2 cmnreset" id="children_age" placeholder="उमेर" value="">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>लिंग : </label>
														<div class="radiosss width75 ">
															<input type="radio" class="personalinfo2 cmnreset" name="children_gender[0]" value="पुरुष"> <span>पुरुष</span>
															<input type="radio" class="personalinfo2 cmnreset" name="children_gender[0]" value="महिला"> <span>महिला</span>
															<input type="radio" class="personalinfo2 cmnreset" name="children_gender[0]" value="तेस्रोलिंगी"> <span>तेस्रोलिंगी</span>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>ठेगाना : </label>
														<input type="text" name="children_address[]" class="form-control utf8val width75 personalinfo2 cmnreset" id="children_address" placeholder="ठेगाना" value="">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>परिचय पत्र नम्बर : </label>
														<input type="text" name="children_identicard_number[]" class="form-control personalinfo2 cmnreset" id="children_identicard_number" placeholder="परिचय पत्र नम्बर " value=""> 
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label> संरक्षकको पुरा नाम : </label>
														<input type="text" name="children_parent_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_parent_name" placeholder="संरक्षकको पुरा नाम " value="">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>सम्बन्ध : </label>
														<input type="text" name="children_relations[]" class="form-control utf8val personalinfo2 cmnreset width70" id="children_relations" placeholder="सम्बन्ध " value=""> 
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>फर्केको : </label>
														<div class="radiosss width75 ">
															<input type="radio" class="personalinfo2" cmnreset name="is_returned_child[0]" value="1"> <span>हो</span>
															<input type="radio" class="personalinfo2" cmnreset name="is_returned_child[0]" value="0"> <span>होइन</span> 
														</div>  
													</div>
												</div>
											</div>
										</div>';
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
							'returned' => 0,
						);
					}else{ 
						$html = '<div class="DeleteFunctionsssss childraj">
									<div class="row MainForm">
										<div class="col-sm-6">
											<div class="form-group child_btn">
												<label>पुरा नाम : </label>
												<input type="text" name="children_name[]" class="form-control utf8val width100 personalinfo2 cmnreset" id="children_name" placeholder="पुरा नाम" value="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group child_btn">
												<div class="flexxx">
													<label>जन्म मिति  : </label>
												</div>    
													<input type="text" name="nepali_date_of_birthss[]" id="nepali-datepickerchild1" class="form-control personalinfo nepdatesschild ndp-nepali-calendar activessssss" placeholder="जन्म मिति" autocomplete="off"> 
											</div>
										</div>    
										<div class="col-sm-6">
											<div class="form-group">
												<label> उमेर : </label>
												<input type="text" name="children_age[]" class="form-control width75 personalinfo2 cmnreset" id="children_age" placeholder="उमेर" value="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>लिंग : </label>
												<div class="radiosss width75 ">
													<input type="radio" class="personalinfo2 cmnreset" name="children_gender[0]" value="पुरुष"> <span>पुरुष</span>
													<input type="radio" class="personalinfo2 cmnreset" name="children_gender[0]" value="महिला"> <span>महिला</span>
													<input type="radio" class="personalinfo2 cmnreset" name="children_gender[0]" value="तेस्रोलिंगी"> <span>तेस्रोलिंगी</span>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>ठेगाना : </label>
												<input type="text" name="children_address[]" class="form-control utf8val width75 personalinfo2 cmnreset" id="children_address" placeholder="ठेगाना" value="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>परिचय पत्र नम्बर : </label>
												<input type="text" name="children_identicard_number[]" class="form-control personalinfo2 cmnreset" id="children_identicard_number" placeholder="परिचय पत्र नम्बर " value=""> 
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label> संरक्षकको पुरा नाम : </label>
												<input type="text" name="children_parent_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_parent_name" placeholder="संरक्षकको पुरा नाम " value="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>सम्बन्ध : </label>
												<input type="text" name="children_relations[]" class="form-control utf8val personalinfo2 cmnreset width70" id="children_relations" placeholder="सम्बन्ध " value=""> 
											</div>
										</div>
										<div class="col-sm-6">
													<div class="form-group">
														<label>फर्केको : </label>
														<div class="radiosss width75 ">
															<input type="radio" class="personalinfo2" cmnreset name="is_returned_child[0]" value="1"> <span>हो</span>
															<input type="radio" class="personalinfo2" cmnreset name="is_returned_child[0]" value="0"> <span>होइन</span> 
														</div>  
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
						'html' => '<div class="DeleteFunctionsssss childraj">
										<div class="row MainForm">
											<div class="col-sm-6">
												<div class="form-group child_btn">
													<label>पुरा नाम : </label>
													<input type="text" name="children_name[]" class="form-control utf8val width100 personalinfo2 cmnreset" id="children_name" placeholder="पुरा नाम" value="">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group child_btn">
													<div class="flexxx">
														<label>जन्म मिति  : </label>
													</div>    
														<input type="text" name="nepali_date_of_birthss[]" id="nepali-datepickerchild1" class="form-control personalinfo nepdatesschild ndp-nepali-calendar activessssss" placeholder="जन्म मिति" autocomplete="off"> 
												</div>
											</div>    
											<div class="col-sm-6">
												<div class="form-group">
													<label> उमेर : </label>
													<input type="text" name="children_age[]" class="form-control width75 personalinfo2 cmnreset" id="children_age" placeholder="उमेर" value="">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>लिंग : </label>
													<div class="radiosss width75 ">
														<input type="radio" class="personalinfo2 cmnreset" name="children_gender[0]" value="पुरुष"> <span>पुरुष</span>
														<input type="radio" class="personalinfo2 cmnreset" name="children_gender[0]" value="महिला"> <span>महिला</span>
														<input type="radio" class="personalinfo2 cmnreset" name="children_gender[0]" value="तेस्रोलिंगी"> <span>तेस्रोलिंगी</span>
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>ठेगाना : </label>
													<input type="text" name="children_address[]" class="form-control utf8val width75 personalinfo2 cmnreset" id="children_address" placeholder="ठेगाना" value="">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>परिचय पत्र नम्बर : </label>
													<input type="text" name="children_identicard_number[]" class="form-control personalinfo2 cmnreset" id="children_identicard_number" placeholder="परिचय पत्र नम्बर " value=""> 
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label> संरक्षकको पुरा नाम : </label>
													<input type="text" name="children_parent_name[]" class="form-control utf8val personalinfo2 cmnreset" id="children_parent_name" placeholder="संरक्षकको पुरा नाम " value="">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>सम्बन्ध : </label>
													<input type="text" name="children_relations[]" class="form-control utf8val personalinfo2 cmnreset width70" id="children_relations" placeholder="सम्बन्ध " value=""> 
												</div>
											</div>
											<div class="col-sm-6">
													<div class="form-group">
														<label>फर्केको : </label>
														<div class="radiosss width75 ">
															<input type="radio" class="personalinfo2" cmnreset name="is_returned_child[0]" value="1"> <span>हो</span>
															<input type="radio" class="personalinfo2" cmnreset name="is_returned_child[0]" value="0"> <span>होइन</span> 
														</div>  
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