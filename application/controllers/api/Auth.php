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

  	public function forgotpassword_post(){
    	$response = $this->auth->forgotpassword($this->post());
    	$this->response($response);
  	}

  	public function check_token_reset_post(){
    	$response = $this->auth->check_token_reset($this->post());
    	$this->response($response);
  	}

  	public function resetpassword_post(){
    	$response = $this->auth->resetpassword($this->post());
    	$this->response($response);
  	}

}

?>
