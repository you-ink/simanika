<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomError extends CI_Controller {

	public function index()
	{
		err404();
	}

	public function err404()
	{
		$this->load->view('errors/html/error_404');
	}

}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */