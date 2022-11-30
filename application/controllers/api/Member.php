<?php
require APPPATH . 'libraries/REST_Controller.php';

class Member extends REST_Controller{

  	public function __construct(){
    	parent::__construct();
    	$this->load->model('api/Member_model', 'member');
  	}

  	public function index_get(){
    	$response = $this->member->list($this->get());
    	$this->response($response);
  	}

  	public function index_delete(){
	    $response = $this->member->delete($this->delete());
    	$this->response($response);
  	}

}

?>
