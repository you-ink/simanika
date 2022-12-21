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

    public function forgotpassword($params){
      $email = $params['email'];

      if (empty($email)) {
        $hasil = array(
          'error' => true,
          'message' => "Email belum diisi."
        );
        goto output;
      }

      $forgot_token = generate_unique_id();

      $this->load->library('phpmailer_lib');
        
      // PHPMailer object
      $mail = $this->phpmailer_lib->load();
      
      // SMTP configuration
      $mail->isSMTP();
      $mail->Host     = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = env("mail_username");
      $mail->Password = env("mail_password");
      $mail->SMTPSecure = 'ssl';
      $mail->Port     = 465;

      $mail->isHTML(true);
      $mail->setFrom(env("mail_username"), 'No-reply '.env("mail_name"));
      $mail->addReplyTo(env("mail_username"), 'No-reply '.env("mail_name"));

      $mail->addAddress($email);
      $mail->Subject = 'Reset Password';
      $mailContent = "<h1>Silahkan Salin atau klik link dibawah untuk melakukan reset password</h1>
          <p><i>Abaikan jika anda merasa tidak melakukan request reset password.</i></p>".base_url("resetpassword")."?email=$email&token=$forgot_token";
      $mail->Body = $mailContent;

      if($mail->send()) {

        $this->db->update('users', array(
          'token_forgot_password' => $forgot_token
        ), ['email' => $email]);

        $hasil = array(
          'error' => false,
          'message' => "Email reset password telah dikirim. Silahkan cek email anda secara berkala. Cek folder SPAM jika tidak ada di utama."
        );
        goto output;

      } else {
        $hasil = array(
          'error' => true,
          'message' => "Pesan gagal dikirim.\nError: ".$mail->ErrorInfo
        );
        goto output;
      }

      output:
      return $hasil;
    }

    public function check_token_reset($params)
    {
      $email = htmlspecialchars($params['email']);
      $token = htmlspecialchars($params['token']);

      if (empty($email) || empty($token)) {
        $hasil = array(
          'error' => true,
          'message' => "Gagal mengakses halaman ini."
        );
        goto output;
      }

      $get_akun = $this->db->query("SELECT * FROM users WHERE email  = '$email' AND token_forgot_password = '$token'");
      if ($get_akun->num_rows() > 0) {
        $hasil = array(
          'error' => false,
          'message' => "Berhasil mengakses halaman ini."
        );
        goto output;
      } else {
        $hasil = array(
          'error' => true,
          'message' => "Gagal mengakses halaman ini."
        );
        goto output;
      }

      output:
      return $hasil;
    }

    public function resetpassword($params)
    {
      $email = htmlspecialchars($params['email']);
      $token = htmlspecialchars($params['token']);
      $password = $params['password'];
      $confirm_password = $params['confirm_password'];

      if (empty($email) || empty($token)) {
        $hasil = array(
          'error' => true,
          'message' => "Data tidak valid."
        );
        goto output;
      }

      $get_akun = $this->db->query("SELECT * FROM users WHERE email  = '$email' AND token_forgot_password = '$token'");
      if ($get_akun->num_rows() > 0) {

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
          $hasil = array(
            'error' => true,
            'message' => 'Password harus terdiri dari minimal 8 karakter dan harus menyertakan setidaknya satu huruf besar, satu angka, dan satu karakter khusus.'
          );
          goto output;
        }

        if ($password !== $confirm_password) {
          $hasil = array(
            'error' => true,
            'message' => "Password dan Konfirmasi Password harus sama."
          );
          goto output;
        }

        $update = $this->db->update('users', array(
          'token_forgot_password' => null,
          'password' => password_hash($password, PASSWORD_DEFAULT)
        ), ['email' => $email]);

        if ($update) {
          $hasil = array(
            'error' => false,
            'message' => "Berhasil merubah password."
          );
          goto output;
        } else {
          $hasil = array(
            'error' => true,
            'message' => "Gagal merubah password. Coba kembali beberapa saat lagi."
          );
          goto output;
        }

      } else {
        $hasil = array(
          'error' => true,
          'message' => "Data tidak valid."
        );
        goto output;
      }

      output:
      return $hasil;
    }

}

?>
