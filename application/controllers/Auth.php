<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		if (get_uid()) {
			redirect('dashboard','refresh');
		}
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

	public function forgotpassword()
	{
    	$data['title'] = 'Forgot Password';
		$this->load->view('auth/forgotpassword', $data);
	}

	public function resetpassword()
	{
    	$data['title'] = 'Reset Password';
		$this->load->view('auth/resetpassword', $data);
	}

	public function view___reset_password_email()
	{
    	$data['title'] = 'Reset Password';
		$this->load->view('auth/_template_reset_password', $data);
	}


}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */