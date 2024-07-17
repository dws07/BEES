<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{
	protected $userId;
	protected $site_settings;
	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		$this->load->library('form_validation');
		$this->site_settings = $this->crud_model->get_where_single('site_settings', array('status' => '1'));
		$this->userId = $this->data['userId'];
	}

	public function index()
	{

		$data['site_settings'] = $this->db->get_where('site_settings', array('status' => '1'))->row();
		if ($this->input->post()) {
		
	
				if (strlen($_FILES['logo']['name']) > 0) {
					$config['upload_path'] = 'uploads/';
					$config['allowed_types'] = 'jpeg|jpg|gif|png|pdf';
					$config['max_size'] = '30000000000';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('logo')) {
						$this->session->set_flashdata('error', $this->upload->display_errors());
						if ($id == '') {
							redirect('site_settings/admin/');
						} else {
							redirect('site_settings/admin/' . $id);
						}
					} else {

						$file = $this->upload->data();

						$file_name = $file['file_name'];
					}
				} else {
					if (isset($data['site_settings']->logo) && $data['site_settings']->logo != '') {
						$file_name = $data['site_settings']->logo;
					} else {
						$file_name = "";
					}
				}
				$data = array(
					'site_name' => $this->input->post('site_name'),
					'short_name' => $this->input->post('short_name'),
					'site_slogan' => $this->input->post('site_slogan'),
					'web_url' => $this->input->post('web_url'),
					'address' => $this->input->post('address'),
					'mobile' => $this->input->post('mobile'),
					'telephone' => $this->input->post('telephone'),
					'email' => $this->input->post('email'),
					'logo' => $file_name,
					'updated_on' => date('Y-m-d'),
					'updated_by' => $this->userId,
				);
				
				$result = $this->db->update('site_settings', $data);
				if ($result) {
					$this->session->set_flashdata('success', 'Successfully Updated.');
					redirect('site_settings/admin');
				} else {
					$this->session->set_flashdata('error', 'Unable To Update.');
					redirect('site_settings/admin');
				}
				
		}
		$data['site_settings'] = $this->site_settings;
		$data['title'] = 'Site Settings';
		$data['page'] = 'site_setting';
		$data['setting'] = 'setting';
		$data = array_merge($this->data, $data);
		
		$this->load->view('layouts/admin/index', $data);
	}
}