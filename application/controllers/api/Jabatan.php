<?php
require APPPATH . 'libraries/REST_Controller.php';

class Jabatan extends REST_Controller{

  	public function __construct(){
    	parent::__construct();
    	$this->load->model('api/Jabatan_model', 'jabatan');
  	}

  	public function index_get(){
    	$response = $this->jabatan->list($this->get());
    	$this->response($response);
  	}

  	public function index_post(){
    	$response = $this->jabatan->add($this->post());
    	$this->response($response);
  	}

  	public function index_put(){
    	$response = $this->jabatan->update($this->put());
    	$this->response($response);
  	}

  	public function index_delete(){
	    $response = $this->jabatan->delete($this->delete());
    	$this->response($response);
  	}

}

?>
