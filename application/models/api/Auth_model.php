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

      $forgot_link = base_url("resetpassword")."?email=$email&token=$forgot_token";

      // $mailContent = "<h1>Silahkan Salin atau klik link dibawah untuk melakukan reset password</h1><p><i>Abaikan jika anda merasa tidak melakukan request reset password.</i></p>".base_url("resetpassword")."?email=$email&token=$forgot_token";
      // $mail->Body = $mailContent;
      $mail->Body = header_email_reset_password().'<table border="0" cellpadding="0" cellspacing="0" class="text_block block-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
      <tr>
      <td class="pad" style="padding-bottom:15px;padding-top:10px;">
      <div style="font-family: sans-serif">
      <div class="" style="font-size: 14px; mso-line-height-alt: 16.8px; color: #000000; line-height: 1.2; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;">
      <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;"><span style="font-size:30px;"><b style="color: DodgerBlue;">Reset</b> Your Password</span></p>
      </div>
      </div>
      </td>
      </tr>
      </table>
      <table border="0" cellpadding="5" cellspacing="0" class="text_block block-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
      <tr>
      <td class="pad">
      <div style="font-family: sans-serif">
      <div class="" style="font-size: 15px; mso-line-height-alt: 21px; color: #000000; line-height: 1.5; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;">
      <p style="margin: 0; font-size: 15px; text-align: center; mso-line-height-alt: 21px;">Klik tombol dibawah ini untuk melakukan reset password</p>
      </div>
      </div>
      </td>
      </tr>
      </table>
      <table border="0" cellpadding="0" cellspacing="0" class="button_block block-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
      <tr>
      <td class="pad" style="padding-bottom:20px;padding-left:15px;padding-right:15px;padding-top:20px;text-align:center;">
      <div align="center" class="alignment">
      <a href="'.$forgot_link.'" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#007bff;border-radius:24px;width:auto;border-top:0px solid transparent;font-weight:undefined;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:5px;padding-bottom:5px;font-family:Varela Round, Trebuchet MS, Helvetica, sans-serif;font-size:15px;text-align:center;mso-border-alt:none;word-break:keep-all;" target="_blank"><span style="padding-left:25px;padding-right:25px;font-size:15px;display:inline-block;letter-spacing:normal;"><span style="word-break: break-word;"><span data-mce-style="" style="line-height: 30px;"><strong>RESET PASSWORD</strong></span></span></span></a>
      </div>
      </td>
      </tr>
      </table>
      <table border="0" cellpadding="5" cellspacing="0" class="text_block block-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
      <tr>
      <td class="pad">
      <div style="font-family: sans-serif">
      <div class="" style="font-size: 15px; mso-line-height-alt: 21px; color: #000000; line-height: 1.5; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;">
      <p style="margin: 0; font-size: 15px; text-align: center; mso-line-height-alt: 21px;">Atau salin link berikut dan jalankan di browser anda. <span style="color: dodgerblue; text-decoration: underline;">'.$forgot_link.'</span></p>
      </div>
      </div>
      </td>
      </tr>
      </table>
      <table border="0" cellpadding="0" cellspacing="0" class="divider_block block-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
      <tr>
      <td class="pad" style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;">
      <div align="center" class="alignment">
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="60%">
      <tr>
      <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #ffffff;"><span> </span></td>
      </tr>
      </table>
      </div>
      </td>
      </tr>
      </table>
      <table border="0" cellpadding="0" cellspacing="0" class="text_block block-7" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
      <tr>
      <td class="pad" style="padding-bottom:10px;padding-left:25px;padding-right:25px;padding-top:10px;">
      <div style="font-family: sans-serif">
      <div class="" style="font-size: 14px; mso-line-height-alt: 21px; color: #000000; line-height: 1.5; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;">
      <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;"><b>Tidak melakukan request reset password?</b></p>
      <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;">Anda dapat mengabaikan pesan ini.</p>
      </div>
      </div>
      </td>
      </tr>
      </table>'.footer_email_reset_password();

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
