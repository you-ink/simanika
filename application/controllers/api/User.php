<?php
require APPPATH . 'libraries/REST_Controller.php';

class User extends REST_Controller{

  	public function __construct(){
    	parent::__construct();
    	$this->load->model('api/User_model', 'user');
  	}

  	public function getAll_post(){
    	$response = $this->user->getAll($this->post());
    	$this->response($response);
  	}

  	public function profile_post(){
    	$response = $this->user->profile($this->post());
    	$this->response($response);
  	}

  	public function update_profile_post(){
    	$response = $this->user->update_profile($this->post());
    	$this->response($response);
  	}

}

?>
