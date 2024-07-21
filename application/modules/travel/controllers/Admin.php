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
		$this->table = 'travel_information';
		$this->userId = $this->data['userId'];
	}

	

	public function all($person_id)
	{

		$person_detail = $this->crud_model->get_where_single_order_by('personal_information', array('id'=>$person_id), 'id', 'desc');
		if(!$person_detail){
			$this->session->set_flashdata('error', 'Person not found!!!');
			redirect('dataentryform/admin/all');
		}
		$like = [];
		$param = [
			'status !=' => '2',
			'person_id' => $person_id,
		]; 
		if($this->input->method() == 'get'){
			$search = $this->input->get('table_search');
			$like['name' ] = $search;
			
		}
		// $total = $this->crud_model->total($this->table, $param, $like);

		$total = $this->crud_model->get_travel_detail_count_of_person($param);
		// echo "<pre>";
		// var_dump($total);exit;

		$config['base_url'] = base_url('travel/admin/all');
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

		// $travel_lit = $this->crud_model->get_travel_detail_list_of_person($param);
		$travel_lit = $this->crud_model->get_where_order_by($this->table, $param, 'id', 'desc');
		// echo "<pre>";
		// var_dump($travel_lit);exit();
		foreach($travel_lit as $key=>$val){
			$child_list = $this->crud_model->get_where_order_by('children_information', array('travel_id'=>$val->id), 'id', 'desc'); 
			$travel_lit[$key]->childrens_list = $child_list;

			$vehicle_info = $this->crud_model->get_where_single_order_by('vehicle_information', array('travel_id'=>$val->id), 'id', 'desc');
			$travel_lit[$key]->vehicle_info = $vehicle_info;

			$health_info = $this->crud_model->get_where_single_order_by('health_information', array('travel_id'=>$val->id), 'id', 'desc');
			$travel_lit[$key]->health_info = $health_info;
		}
		// echo "<pre>";
		// var_dump($person_detail);exit();
		$data['travel_lit'] = $travel_lit;
		$data['offset'] = $page;
		$data['title'] = 'Travel Detail For Person : '.$person_detail->name?$person_detail->name:'';
		$data['page'] = 'list';
		$data['person_detail'] = $person_detail;
		$data['dataentryform'] = 'dataentryform-all';
		$data = array_merge($this->data, $data);

		if($this->input->post('print_to')){
			// $this->load->view('list'); 

			// var_dump($person_detail->profile_image );exit;
			// $this->load->library('pdf');

			$html = $this->load->view('print', $data, true); 
			
			// Load pdf library
			$this->load->library('pdf');
			
			// Load HTML content
			$this->dompdf->loadHtml($html);

			// (Optional) Setup the paper size and orientation
			$this->dompdf->setPaper('A4', 'landscape');
        
			// Render the HTML as PDF
			$this->dompdf->render();
			
			// Output the generated PDF (1 = download and 0 = preview)
			$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
		}

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

				if ($person) {  
					$response = array(
						'status' => 'successfull',
						'status_code' => 200,
						'status_message' => 'Successfully retrived',
						'data' => $person,
					);
				} else {
					$response = array(
						'status' => 'error',
						'status_code' => 300,
						'status_message' => 'No person found for this number',
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

	public function generate_pdf() {
        // Load view into a variable
        $html = $this->load->view('pdf_template', [], true);

		$this->load->view('layouts/admin/index', $data, true);

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("sample.pdf", array("Attachment" => 0));
    }
}