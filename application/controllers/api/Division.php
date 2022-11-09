<?php
require APPPATH . 'libraries/REST_Controller.php';

class Division extends REST_Controller{

  	public function __construct(){
    	parent::__construct();
    	$this->load->model('api/Division_model', 'division');
  	}

  	public function index_get(){
    	$response = $this->division->list($this->get());
    	$this->response($response);
  	}

  	public function index_post(){
    	$response = $this->division->add($this->post());
    	$this->response($response);
  	}

  	public function index_put(){
    	$response = $this->division->update($this->put());
    	$this->response($response);
  	}

  	public function index_delete(){
	    $response = $this->division->delete($this->delete());
    	$this->response($response);
  	}

}

?>
