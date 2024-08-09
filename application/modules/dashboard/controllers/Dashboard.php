<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Auth_controller {
	protected $userId;
	public function __construct()
	{
		parent::__construct();
		$this->userId = $this->data['userId']; 
		$this->load->library('Nepali_calendar');
		$this->table = 'personal_information';
		$this->userId = $this->data['userId'];
		$this->session->unset_userdata('form_data');
		$this->session->unset_userdata('param');
	}

	public function total_data_gone_direction(){
		$this->db->select('SUM(CASE 
									WHEN (ti.gone_dirction = "नेपाल" AND ti.is_returned = "0" AND pi.gender ="पुरुष") THEN 1 
									WHEN (ti.is_returned = "1" AND pi.gender = "पुरुष") THEN 1 
									ELSE 0 
								END) AS nepal_gone_male,
							
							SUM(CASE 
								WHEN (ti.gone_dirction = "नेपाल" AND ti.is_returned = "0" AND pi.gender ="महिला") THEN 1 
								WHEN (ti.is_returned = "1" AND pi.gender = "महिला") THEN 1 
								ELSE 0 
							END) AS nepal_gone_female,	

							SUM(CASE 
								WHEN (ti.gone_dirction = "नेपाल" AND ti.is_returned = "0" AND pi.gender ="तेस्रोलिंगी") THEN 1 
								WHEN (ti.is_returned = "1" AND pi.gender = "तेस्रोलिंगी") THEN 1 
								ELSE 0 
							END) AS nepal_gone_other,

							SUM(CASE 
								WHEN (ti.gone_dirction = "भारत" AND ti.is_returned = "0" AND pi.gender ="पुरुष") THEN 1 
								WHEN (ti.is_returned = "1" AND pi.gender = "पुरुष") THEN 1 
								ELSE 0 
							END) AS india_gone_male,

							SUM(CASE 
								WHEN (ti.gone_dirction = "भारत" AND ti.is_returned = "0" AND pi.gender ="महिला") THEN 1 
								WHEN (ti.is_returned = "1" AND pi.gender = "महिला") THEN 1 
								ELSE 0 
							END) AS india_gone_female,

							SUM(CASE 
								WHEN (ti.gone_dirction = "भारत" AND ti.is_returned = "0" AND pi.gender ="तेस्रोलिंगी") THEN 1 
								WHEN (ti.is_returned = "1" AND pi.gender = "तेस्रोलिंगी") THEN 1 
								ELSE 0 
							END) AS india_gone_other,
						');
		$this->db->from('travel_information ti');
		$this->db->join('personal_information pi', "ti.person_id = pi.id");
		// $this->db->group_by('pi.gender'); 
        $query = $this->db->get(''); 
        $total_gone_direction_group_by_gender =  $query->row();
		
		$this->db->select('SUM(CASE 
									WHEN (ti.gone_dirction = "नेपाल" AND ci.is_returned = "0") THEN 1 
									WHEN ci.is_returned = "1" THEN 1 
									ELSE 0 
								END) AS nepal_gone_children,
							
								SUM(CASE 
									WHEN (ti.gone_dirction = "भारत" AND ci.is_returned = "0") THEN 1 
									WHEN ci.is_returned = "1" THEN 1 
									ELSE 0 
								END) AS india_gone_children,	 
						');
		$this->db->from('travel_information ti');
		$this->db->join('children_information ci', "ti.id = ci.travel_id");
		// $this->db->group_by('pi.gender'); 
        $query = $this->db->get(''); 
        $children_count_by_direction =  $query->row();

		$this->db->select('SUM(CASE 
									WHEN (ti.gone_dirction = "नेपाल" AND vi.is_returned = "0") THEN 1 
									WHEN vi.is_returned = "1" THEN 1 
									ELSE 0 
								END) AS nepal_gone_vehicle,
							
								SUM(CASE 
									WHEN (ti.gone_dirction = "भारत" AND vi.is_returned = "0") THEN 1 
									WHEN vi.is_returned = "1" THEN 1 
									ELSE 0 
								END) AS india_gone_vehicle,	 
						');
		$this->db->from('travel_information ti');
		$this->db->join('vehicle_information vi', "ti.id = vi.travel_id");
		// $this->db->group_by('pi.gender'); 
        $query = $this->db->get(''); 
        $vehicle_count_by_direction =  $query->row();
		// echo "<pre>";
		// var_dump($children_count_by_direction);
		// exit;
		$total_gone_direction_group_by_gender->nepal_gone_children = $children_count_by_direction->nepal_gone_children;
		$total_gone_direction_group_by_gender->india_gone_children = $children_count_by_direction->india_gone_children;
		$total_gone_direction_group_by_gender->nepal_gone_vehicle = $vehicle_count_by_direction->nepal_gone_vehicle;
		$total_gone_direction_group_by_gender->india_gone_vehicle = $vehicle_count_by_direction->india_gone_vehicle;
		return $total_gone_direction_group_by_gender;
	}
	
	public function get_view_data() {
		// $this->db->select('SUM(CASE WHEN gone_dirction = "नेपाल" THEN 1 ELSE 0 END) AS nepal_gone, SUM(CASE WHEN gone_dirction = "भारत" THEN 1 ELSE 0 END) AS india_gone, created');
		$this->db->select('created,
		SUM(CASE 
				WHEN (gone_dirction = "नेपाल" AND is_returned = "0") THEN 1 
				WHEN is_returned = "1" THEN 1 
				ELSE 0 
			END) AS nepal_gone,
		SUM(CASE 
				WHEN (gone_dirction = "भारत" AND is_returned = "0") THEN 1 
				WHEN is_returned = "1" THEN 1 
				ELSE 0 
			END) AS india_gone');
		$this->db->from('travel_information');
		$this->db->group_by('created');
		$this->db->order_by('created','desc');
        $query = $this->db->get(''); 
        return $query->result(); 
    }
	
	
	
	
	
	public function index()
	{ 
		$like = [];
		$param = [
			'ti.status !='=>'2',
		];  

		$data['roles'] = $this->crud_model->get_person_list_limit_group_by_travel(100, 0, $param);
		// echo "<pre>";
		// var_dump($data['roles']);
		// exit();
		// $data['total_data_gone_nepal']=$this->get_total_sum_gonenepal();
		// $data['total_data_gone_india']=$this->get_total_sum_goneindia();  
		$data['All_Data']=$this->get_view_data();  
		// var_dump($data['All_Data']);exit;
		$data['total_data_gone_direction'] = $this->total_data_gone_direction();
		$data['people_total'] = $this->crud_model->count_all_data('personal_information', array('gone_dirction'=>'nepal',));
		$data['users_total'] = $this->crud_model->count_all_data('users', array('status'=>'1'));
		$data['title'] = 'Dashboard';
        $data['page'] = 'dashboard';
		$data['dashboard'] = 'dashboard';
		$data = array_merge($this->data, $data);

        $this->load->view('layouts/admin/index', $data);

	}

	
}