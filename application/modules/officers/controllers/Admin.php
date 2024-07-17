<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{
	protected $userId;
	protected $table;
	protected $redirect;
	protected $title;

	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		$this->load->library('form_validation');
		$this->table = 'officers';
		$this->redirect = 'officers/admin/';
		$this->title = 'Officer';
		$this->userId = $this->data['userId'];
	}

	public function all($page = '')
	{
		$like = [];
		$param = [];
		if($this->input->method() == 'get'){
			$title = $this->input->get('Title');
			$type = $this->input->get('type');
			$status = $this->input->get('status');
			// $param['status'] = $status;
			if($status){
				$param['status'] = $status;
			}
			if($type){
				$param['type'] = $type;
			}
			
			if($title){
				$like['name'] = $title;

			}
		}
		$total = $this->crud_model->total($this->table, $param, $like);
		
		$config['base_url'] = base_url($this->redirect . 'all');
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
		$config['suffix'] = "?type=$type&satus=$status&Title=$title";
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data['pagination'] = $this->pagination->create_links();
		$data['items']  = $this->crud_model->getData($this->table, $param, $like, $config["per_page"], $page);
		
		
		$data['offset'] = $page;
		$data['title'] = $this->title;
		$data['page'] = 'list';
		$data['redirect'] = $this->redirect;
		$data['officers'] = 'officers-all';
		$data = array_merge($this->data, $data);
		$this->load->view('layouts/admin/index', $data);
	}

	public function form($id = '')
	{

		$data['detail'] = $this->db->get_where($this->table, array('id' => $id))->row();
		// 		echo "<pre>";
		// 		var_dump($this->db->last_query());exit;
		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

			if ($this->form_validation->run()) {
				$data = array(
					'name' => $this->input->post('name'),
					'name_nepali' => $this->input->post('name_nepali'),
					'email' => $this->input->post('email'),
					'featured_image' => $this->input->post('featured_image'),
					'type'=> $this->input->post('type'),
					'mobile' => $this->input->post('mobile'),
					'contact' => $this->input->post('contact'),
					
					'status' => $this->input->post('status'),
				);
				$id = $this->input->post('id');
				$slug = $this->crud_model->createUrlSlug($this->input->post('name'));
				$check_slug = $this->crud_model->get_where_single($this->table, array('slug' => $slug));
				if (empty($check_slug)) {
					$data['slug'] = strtolower($slug);
				} else {
					$data['slug'] = strtolower($slug) . time();
				}
				if ($id == '') {
					$data['created_by'] = $this->userId;
					$data['created'] = date('Y-m-d');
				
					$result = $this->crud_model->insert($this->table, $data);
					if ($result == true) {
						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect($this->redirect . 'all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect($this->redirect . 'form');
					}
				} else {
					$data['updated'] = date('Y-m-d');
					$data['updated_by'] = $this->userId;
					$result = $this->crud_model->update($this->table, $data, array('id' => $id));
					if ($result == true) {
						$this->session->set_flashdata('success', 'Successfully Updated.');
						redirect($this->redirect . 'all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Update.');
						redirect($this->redirect . 'form/' . $id);
					}
				}
			}
		}
		$data['title'] = 'Add/Edit ' . $this->title;
		$data['page'] = 'form';
		$data['officers'] = 'officers-form';
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
		$result = $this->crud_model->update($this->table, $data, array('id' => $id));
		if ($result == true) {
			$this->session->set_flashdata('success', 'Successfully Deleted.');
			redirect($this->redirect . 'all');
		} else {
			$this->session->set_flashdata('error', 'Unable To Delete.');
			redirect($this->redirect . 'all');
		}
	}
}