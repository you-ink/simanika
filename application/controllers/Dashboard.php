<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data['title'] = 'Simanika - Dashboard';
		$this->load->view('app/dashboard/header', $data);
		$this->load->view('dashboard/main', $data);
		$data['script'] = get_views('dashboard/js/main');
		$this->load->view('app/dashboard/footer', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */