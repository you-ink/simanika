<?php

class Auth_model extends CI_Model {

    public function login($params){
      $email = $params['email'];
      $password = $params['password'];
      $activityID = guidv4();
      
      if (empty($email)) {
        $hasil = array(
          'error' => true,
          'message' => "Email belum diisi."
        );
        goto output;
      } else if (empty($password)) {
        $hasil = array(
          'error' => true,
          'message' => "Password belum diisi."
        );
        goto output;
      }

      $get_akun = $this->db->query("SELECT * FROM users WHERE email  = '$email'");

      if ($get_akun->num_rows() > 0) {

      	$get_akun = $get_akun->row_array();
      	if (password_verify($password, $get_akun['password'])) {
			
      		$hasil = array(
    				'error' => false,
    				'message' => "Berhasil login",
    				"data" => [
    					'token' => $get_akun['token'],
    					'sesID' => $activityID
    				]
    			);

          // $cookie = array(
          //   'name'   => 'uid',
          //   'value'  => $get_akun['token'],
          //   'expire' => time() + (10 * 365 * 24 * 60 * 60),
          //   'secure' => TRUE
          // );
          // $cookie2 = array(
          //   'name'   => 'sesid',
          //   'value'  => $activityID,
          //   'expire' => time() + (10 * 365 * 24 * 60 * 60),
          //   'secure' => TRUE
          // );
          // set_cookie($cookie);
          // set_cookie($cookie2);

  			  goto output;

  		  } else {
    			$hasil = array(
    				'status' => false,
    				'message' => "Password yang anda masukkan salah."
    			);
    			goto output;
    		}

      } else {
      	$hasil = array(
          'error' => true,
          'message' => "Email yang anda masukkan salah."
        );
        goto output;
      }

      output:
      return $hasil;
    }

}

?>
