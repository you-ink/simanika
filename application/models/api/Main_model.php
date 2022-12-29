<?php

class Main_model extends CI_Model {

    public function getAll($params){
    	$user = get_user();
		$user_id = $user['id'];
		
		if (empty($user_id)) {
        	$hasil = array(
          		'error' => true,
          		'message' => "Anda belum login."
        	);
        	goto output;
      	}

		$id = isset($params['id']) ? $params['id'] : '';

		$user1 = $this->db->query("SELECT * FROM users");
          $user = $this->db->num_rows($user1);

		
    }

     output:
     return $hasil;
 }

    

}

?>
