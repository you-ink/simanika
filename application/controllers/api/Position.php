<?php
require APPPATH . 'libraries/REST_Controller.php';

class Position extends REST_Controller{

  	public function __construct(){
    	parent::__construct();
    	$this->load->model('api/Position_model', 'position');
  	}

  	public function index_get(){
    	$response = $this->position->list($this->get());
    	$this->response($response);
  	}

  	public function index_post(){
    	$response = $this->position->add($this->post());
    	$this->response($response);
  	}

  	public function index_put(){
    	$response = $this->position->update($this->put());
    	$this->response($response);
  	}

  	public function index_delete(){
	    $response = $this->position->delete($this->delete());
    	$this->response($response);
  	}

}

?>
