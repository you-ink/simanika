<?php
require APPPATH . 'libraries/REST_Controller.php';

class WorkProgram extends REST_Controller{

  	public function __construct(){
    	parent::__construct();
    	$this->load->model('api/WorkProgram_model', 'workprogram');
  	}

  	public function index_get(){
    	$response = $this->workprogram->list($this->get());
    	$this->response($response);
  	}

  	public function index_post(){
    	$response = $this->workprogram->add($this->post());
    	$this->response($response);
  	}

  	public function index_put(){
    	$response = $this->workprogram->update($this->put());
    	$this->response($response);
  	}

  	public function index_delete(){
		$response = $this->workprogram->delete($this->delete());
    	$this->response($response);
  	}

  	public function uploadtor_post(){
    	$response = $this->workprogram->uploadtor($this->post());
    	$this->response($response);
  	}

  	public function uploadlpj_post(){
    	$response = $this->workprogram->uploadlpj($this->post());
    	$this->response($response);
  	}

  	public function budget_get(){
    	$response = $this->workprogram->listbudget($this->get());
    	$this->response($response);
  	}

  	public function budget_post(){
    	$response = $this->workprogram->addbudget($this->post());
    	$this->response($response);
  	}

  	public function budget_delete(){
    	$response = $this->workprogram->deletebudget($this->delete());
    	$this->response($response);
  	}

  	public function budgetdetail_get(){
    	$response = $this->workprogram->listbudgetdetail($this->get());
    	$this->response($response);
  	}

  	public function budgetdetail_post(){
    	$response = $this->workprogram->addbudgetdetail($this->post());
    	$this->response($response);
  	}

  	public function budgetdetail_put(){
    	$response = $this->workprogram->updatebudgetdetail($this->put());
    	$this->response($response);
  	}

  	public function budgetdetail_delete(){
    	$response = $this->workprogram->deletebudgetdetail($this->delete());
    	$this->response($response);
  	}

}

?>
