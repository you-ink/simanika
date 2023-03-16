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

  	public function upload_foto_profile_post(){
    	$response = $this->user->upload_foto_profile($this->post());
    	$this->response($response);
  	}

  	public function bph_post(){
    	$response = $this->user->bph($this->post());
    	$this->response($response);
  	}

  	public function get_user_by_token_post()
  	{
    	$response = $this->user->get_user_by_token($this->post());
    	$this->response($response);
  	}

}

?>
