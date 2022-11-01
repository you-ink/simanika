<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		redirect('login','refresh');
	}

	public function login()
	{
    	$data['title'] = 'Login';
		$this->load->view('auth/login', $data);
	}

	public function register()
	{
    	$data['title'] = 'Register';
		$this->load->view('auth/register', $data);
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */