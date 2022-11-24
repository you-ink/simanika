<?php
require APPPATH . 'libraries/REST_Controller.php';

class User extends REST_Controller{

  	public function __construct(){
    	parent::__construct();
    	$this->load->model('api/User_model', 'user');
  	}

  	public function getAll_post(){
    	$response = $this->user->getAll($this->get());
    	$this->response($response);
  	}

}

?>
