<?php
require APPPATH . 'libraries/REST_Controller.php';

class Main extends REST_Controller{

  	public function __construct(){
    	parent::__construct();
    	$this->load->model('api/Main_model', 'main');
  	}

  	public function dashboard_post(){
    	$response = $this->main->dashboard($this->post());
    	$this->response($response);
  	}

  	public function proker_this_month_post(){
    	$response = $this->main->proker_this_month($this->post());
    	$this->response($response);
  	}

  	public function get_statistics_post(){
    	$response = $this->main->get_statistics($this->post());
    	$this->response($response);
  	}

}

?>
