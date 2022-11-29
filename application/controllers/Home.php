<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data['title'] = 'Simanika';
		$this->load->view('home/index', $data);
	}

	public function visi_misi()
	{
		$data['title'] = 'Simanika - Visi Misi';
		$this->load->view('home/visi_misi', $data);
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */