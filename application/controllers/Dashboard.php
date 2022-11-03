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
		$this->load->view('app/dashboard/sidebar', $data);
		$this->load->view('app/dashboard/navbar', $data);
		$this->load->view('dashboard/main', $data);
		$data['script'] = get_views('dashboard/js/main');
		$this->load->view('app/dashboard/footer', $data);
	}

	public function profile()
	{
		$data['title'] = 'Simanika - User Profile';

		$this->load->view('app/dashboard/header', $data);
		$this->load->view('app/dashboard/sidebar', $data);
		$this->load->view('app/dashboard/navbar', $data);
		$this->load->view('dashboard/user_profile', $data);
		$data['script'] = get_views('dashboard/js/user_profile');
		$this->load->view('app/dashboard/footer', $data);
	}

	public function member()
	{
		$data['title'] = 'Simanika - Data Anggota';

		$this->load->view('app/dashboard/header', $data);
		$this->load->view('app/dashboard/sidebar', $data);
		$this->load->view('app/dashboard/navbar', $data);
		$this->load->view('dashboard/member', $data);
		$data['script'] = get_views('dashboard/js/member');
		$this->load->view('app/dashboard/footer', $data);
	}

	public function division()
	{
		$data['title'] = 'Simanika - Data Divisi';

		$this->load->view('app/dashboard/header', $data);
		$this->load->view('app/dashboard/sidebar', $data);
		$this->load->view('app/dashboard/navbar', $data);
		$this->load->view('dashboard/division', $data);
		$data['script'] = get_views('dashboard/js/division');
		$this->load->view('app/dashboard/footer', $data);
	}

	public function position()
	{
		$data['title'] = 'Simanika - Data Jabatan';

		$this->load->view('app/dashboard/header', $data);
		$this->load->view('app/dashboard/sidebar', $data);
		$this->load->view('app/dashboard/navbar', $data);
		$this->load->view('dashboard/position', $data);
		$data['script'] = get_views('dashboard/js/position');
		$this->load->view('app/dashboard/footer', $data);
	}

	public function meeting()
	{
		$data['title'] = 'Simanika - Data Rapat';

		$this->load->view('app/dashboard/header', $data);
		$this->load->view('app/dashboard/sidebar', $data);
		$this->load->view('app/dashboard/navbar', $data);
		$this->load->view('dashboard/meeting', $data);
		$data['script'] = get_views('dashboard/js/meeting');
		$this->load->view('app/dashboard/footer', $data);
	}

	public function proker()
	{
		$data['title'] = 'Simanika - Data Proker';

		$this->load->view('app/dashboard/header', $data);
		$this->load->view('app/dashboard/sidebar', $data);
		$this->load->view('app/dashboard/navbar', $data);
		$this->load->view('dashboard/work_program', $data);
		$data['script'] = get_views('dashboard/js/work_program');
		$this->load->view('app/dashboard/footer', $data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */