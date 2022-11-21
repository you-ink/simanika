<?php
require APPPATH . 'libraries/REST_Controller.php';

class Meeting extends REST_Controller{

  	public function __construct(){
    	parent::__construct();
    	$this->load->model('api/Meeting_model', 'meeting');
  	}

  	public function index_get(){
    	$response = $this->meeting->list($this->get());
    	$this->response($response);
  	}

  	public function index_post(){
    	$response = $this->meeting->add($this->post());
    	$this->response($response);
  	}

  	public function index_put(){
    	$response = $this->meeting->update($this->put());
    	$this->response($response);
  	}

  	public function index_delete(){
	$response = $this->meeting->delete($this->delete());
    	$this->response($response);
  	}

}

?>
