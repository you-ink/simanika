<?php
require APPPATH . 'libraries/REST_Controller.php';

class Auth extends REST_Controller{

  	public function __construct(){
    	parent::__construct();
    	$this->load->model('api/Auth_model', 'auth');
  	}

  	public function login_post(){
    	$response = $this->auth->login($this->post());
    	$this->response($response);
  	}

}

?>
