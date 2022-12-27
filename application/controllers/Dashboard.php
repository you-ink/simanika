<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $user = [];

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		if (empty(get_uid())) {
            header('location: '.base_url('login'));
        }

        $this->user = $this->Func->get_profile();
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
		if ($this->user['level_id'] != 1 || $this->user['status'] != 1) {
			show_404();
		}

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
		if ($this->user['level_id'] != 1 || $this->user['status'] != 1) {
			show_404();
		}
		
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
		if ($this->user['level_id'] != 1 || $this->user['status'] != 1) {
			show_404();
		}
		
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
		if ($this->user['status'] != 1) {
			show_404();
		}
		
		$data['title'] = 'Simanika - Rapat';

		$this->load->view('app/dashboard/header', $data);
		$this->load->view('app/dashboard/sidebar', $data);
		$this->load->view('app/dashboard/navbar', $data);
		$this->load->view('dashboard/meeting', $data);
		$data['script'] = get_views('dashboard/js/meeting');
		$this->load->view('app/dashboard/footer', $data);
	}

	public function program()
	{
		if ($this->user['status'] != 1) {
			show_404();
		}
		
		$data['title'] = 'Simanika - Program Kerja';

		$this->load->view('app/dashboard/header', $data);
		$this->load->view('app/dashboard/sidebar', $data);
		$this->load->view('app/dashboard/navbar', $data);
		$this->load->view('dashboard/work_program', $data);
		$data['script'] = get_views('dashboard/js/work_program');
		$this->load->view('app/dashboard/footer', $data);
	}

	public function Budget()
	{
		if ($this->user['status'] != 1) {
			show_404();
		}
		
		$data['title'] = 'Simanika - Anggaran Proker';

		$this->load->view('app/dashboard/header', $data);
		$this->load->view('app/dashboard/sidebar', $data);
		$this->load->view('app/dashboard/navbar', $data);
		$this->load->view('dashboard/budget', $data);
		$data['script'] = get_views('dashboard/js/budget');
		$this->load->view('app/dashboard/footer', $data);
	}

	public function homepage()
	{
		$data['title'] = 'Simanika - Homepage';

		$this->load->view('app/dashboard/header', $data);
		$this->load->view('app/dashboard/sidebar', $data);
		$this->load->view('app/dashboard/navbar', $data);
		$this->load->view('dashboard/homepage', $data);
		$data['script'] = get_views('dashboard/js/homepage');
		$this->load->view('app/dashboard/footer', $data);
	}

	public function homepage1()
	{
		$data['title'] = 'Simanika - Homepage';

		$this->load->view('app/dashboard/header', $data);
		$this->load->view('app/dashboard/sidebar', $data);
		$this->load->view('app/dashboard/navbar', $data);
		$this->load->view('dashboard/homepage1', $data);
		$data['script'] = get_views('dashboard/js/homepage1');
		$this->load->view('app/dashboard/footer', $data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */