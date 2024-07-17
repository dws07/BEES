<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Auth_controller
{
	protected $userId;
	protected $roleId;
	public function __construct()
	{
		parent::__construct();
		// var_dump($this->current_user);exit;
		$this->load->library('form_validation');
		$this->userId = $this->data['userId'];
		$this->roleId = (int) $this->data['current_user']->role_id;
	}
    
	
	public function all($page = '')
	{

		$like = [];
		$param = [
			'status !=' => '2',
		];
		if($this->roleId !== 1){
		   $param['role_id !='] = 1;
		}
		if($this->input->method() == 'get'){
			$title = $this->input->get('Title');
			$status = $this->input->get('status');
			if($status){
				$param['status'] = $this->input->get('status');
			}
			
			if($title){
				$like['user_name'] = $title;

			}
		}

		$total = $this->crud_model->total('users', $param, $like);

		$config['base_url'] = base_url('user/admin/all');
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

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data['pagination'] = $this->pagination->create_links();
		$data['items']  = $this->crud_model->getData('users', $param, $like, $config["per_page"], $page);
		// echo $this->db->last_query();exit;
		$data['designations'] = $this->crud_model->get_where_order_by('designation_para', array('status'=>'1'), 'designation_name', 'DESC');
		$data['departs'] = $this->crud_model->get_where_order_by('department_para', array('status'=>'1'), 'department_name', 'DESC');
        $roleParam = [
			'status' => '1'
		];
		if ($this->auth->current_user()->role_id != 1) {
			$roleParam['id !='] = 1;
		}
		$data['roles'] = $this->crud_model->get_where_order_by('user_role', $roleParam, 'id', 'ASC');

		$data['title'] = 'User';
		$data['offset'] = $page;
		$data['page'] = 'list';
		$data['users'] = 'users-all';
		$data = array_merge($this->data, $data);
		$this->load->view('layouts/admin/index', array_merge($this->data, $data));
	}

	public function form($id = '')
	{
		// $this->send_mail('gurungrajesh1992@gmail.com','user_nmae','password');

		$data['detail'] = $this->db->get_where('users', array('id' => $id))->row();
		if ($this->input->post()) {
			$this->form_validation->set_rules('role_id', 'Role', 'required|trim');
			$this->form_validation->set_rules('staff_id', 'Role', 'required|trim');
			if ($id == '') {
				$this->form_validation->set_rules('user_name', 'Username', 'required|trim');
				$this->form_validation->set_rules('password', 'Password', 'required|trim');
			}

			if ($this->form_validation->run()) {
				$data = array(
					'email' => $this->input->post('email'),
					'role_id' => $this->input->post('role_id'),
					'staff_id' => $this->input->post('staff_id'),
					'status' => $this->input->post('status'),
				);
				$id = $this->input->post('id');
				if ($id == '') {
					$data['created_by'] = $this->userId;
					$data['created_on'] = date('Y-m-d');

					//duplicate user check 
					$is_already = $this->crud_model->get_where_single('users', array('user_name' => $this->input->post('user_name')));
					if (empty($is_already)) {
						$data['user_name'] = $this->input->post('user_name');
					} else {
						$this->session->set_flashdata('error', 'User Name Already Exists!!! Try Another One');
						redirect('user/admin/form/');
					}

					$data['password'] = md5($this->input->post('password'));
				
					$result = $this->crud_model->insert('users', $data);
					
					if ($result) {
						// $this->send_mail('sdsadasd','gurungrajesh1992@gmail.com');
						$this->session->set_flashdata('success', 'Successfully Inserted.');
						redirect('user/admin/all');
					} else {
					    
						$this->session->set_flashdata('error', 'Unable To Insert.');
						redirect('user/admin/form');
					}
				} else {
					$data['updated_on'] = date('Y-m-d');
					$data['updated_by'] = $this->userId;
					$result = $this->crud_model->update('users', $data, array('id' => $id));
					if ($result == true) {
						$this->session->set_flashdata('success', 'Successfully Updated.');
						redirect('user/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Update.');
						redirect('user/admin/form/' . $id);
					}
				}
			}
		}
		// $data['roles'] = $this->crud_model->get_where('user_role', array('status' => '1'));
		if ($this->auth->current_user()->role_id == 1) {
			$data['roles'] = $this->crud_model->get_where_order_by('user_role', array('status' => '1'), 'id', 'ASC');
		} else {
			$data['roles'] = $this->crud_model->get_where_order_by('user_role', array('status' => '1', 'id !=' => 1), 'id', 'ASC');
		}
		$data['staffs'] = $this->crud_model->get_where('staff_infos', array('status' => '1'));
		$data['title'] = 'Add/Edit User';
		$data['page'] = 'form';
		$data['users'] = 'users-form';
		$data = array_merge($this->data, $data);
		
		$this->load->view('layouts/admin/index', array_merge($this->data, $data));
	}

	public function soft_delete($id)
	{
		$data = array(
			'status' => '2',
			'updated_by' => $this->userId,
			'updated_on' => date('Y-m-d'),
		);
		$result = $this->crud_model->update('users', $data, array('id' => $id));
		if ($result == true) {
			$this->session->set_flashdata('success', 'Successfully Deleted.');
			redirect('user/admin/all');
		} else {
			$this->session->set_flashdata('error', 'Unable To Delete.');
			redirect('user/admin/all');
		}
	}
	
	public function changepassword($id = '')
	{
		if ($this->input->post()) {
		    $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password_conf', 'Confirm Password', 'required|matches[password]');

			if ($this->form_validation->run()) {
			    $data['password'] = md5($this->input->post('password'));
			    $data['psd_changed_date'] = date('Y-m-d');
			    $data['psd_changed'] = '0';
				$id = $this->input->post('id');
				if ($id != ''){
					$data['updated_on'] = date('Y-m-d');
					$data['updated_by'] = $this->userId;
					$result = $this->crud_model->update('users', $data, array('id' => $id));
					if ($result == true) {
						$this->session->set_flashdata('success', 'Successfully Updated.');
						redirect('user/admin/all');
					} else {
						$this->session->set_flashdata('error', 'Unable To Update.');
						redirect('user/admin/all');
					}
				}
			}
		} 
		$data['detail'] = $this->db->get_where('users', array('id' => $id))->row();
		$data['title'] = 'Change Password '.$data['detail']->user_name;
		$data['page'] = 'changepassword';
		$data = array_merge($this->data, $data);
		$this->load->view('layouts/admin/index', $data);
	} 

	public function send_mail($email,$user_name,$password){

        $config = array(
            'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'no-reply@deerhold.com',
            'smtp_pass' => 'Q%Zb>>2D123',
            'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
            'mailtype' => 'html', //plaintext 'text' mails or 'html'
            'smtp_timeout' => '4', //in seconds
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
//            'ssl' => array(
//                'verify_peer' => false,
//                'verify_peer_name' => false,
//                'allow_self_signed' => true
//            )
        );

        $site_settings = $this->crud_model->get_where_single('site_settings', array('status' => '1'));

        $html = '';
        $html .= '<!DOCTYPE html>
                    <html>
                        <head>
                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Account Registration</title>
                        </head>
                        <body>
                            <div class="row">
                                <h3>Account Registration!!!</h3>
                            </div>
                            <div class="row">
                                <img src="'.$site_settings->logo .'" />
                            </div>
                            <p> 
								Your account has been created successfully. Use given credentials to login
							</p>
							<p> 
								Usernname : '.$user_name.'
							</p>
							<p> 
								Password : '.$password.'
							</p>
                        
                        </body>
                    </html>';
        $this->load->library('email');

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('no-reply@deerhold.com'); // change it to yours
        $this->email->to($email);// change it to yours
        $this->email->subject('Account Registration');
        $this->email->message($html);
        if($this->email->send())
        {
            return true;
        }
        else
        {
            return false;
//            show_error($this->email->print_debugger());
        }
    }
}