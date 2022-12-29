<?php

class Member_model extends CI_Model {

    public function list($params){
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      if ($user['level_id'] != 1) {
        $hasil = array(
            'error' => true,
            'message' => "Unauthorized."
        );
        goto output;
      }

      $length = intval($params['length']);
      $start = intval($params['start']);
      $draw = $params['draw'];
      $sort = (!empty($params['sort'])) ? "ORDER BY users.id " . $this->db->escape_str($params['sort']) : "";
      $search = $params['search']['value'];
      $id = (!empty($params['id'])) ? $params['id'] : "";
      $status = intval($params['status']);
      
      $paging = ($length > 0) ? "LIMIT $start, $length" : "";

      $filter = "WHERE users.id IS NOT NULL";
      (!empty($id)) ? $filter .= " AND users.id = " . $this->db->escape($id) : "";
      (!empty($status)) ? $filter .= " AND users.status = '" . $this->db->escape($status) . "'" : "";
      (!empty($search)) ? $filter .= " AND users.nama LIKE '%" . $this->db->escape_like_str($search) . "%'" : "";

      $recordsTotal = $this->db->query("
        SELECT 
          users.id,
          users.nama,
          users.telp,
          users.email,
          users.alamat,
          users.status,
          users.nim,
          users.angkatan,
          level.nama as level,
          detail_user.bukti_kesanggupan,
          detail_user.bukti_mahasiswa,
          detail_user.tanggal_wawancara,
          detail_user.waktu_wawancara,
          divisi.nama as divisi,
          jabatan.nama as jabatan
        FROM
          users
        LEFT JOIN level ON level.id = users.level_id
        LEFT JOIN detail_user ON users.id = detail_user.user_id
        LEFT JOIN divisi ON detail_user.divisi_id = divisi.id
        LEFT JOIN jabatan ON detail_user.jabatan_id = jabatan.id
        $filter
      ")->num_rows();

      $get_users = $this->db->query("
        SELECT 
          users.id,
          users.nama,
          users.telp,
          users.email,
          users.alamat,
          users.status,
          users.nim,
          users.angkatan,
          level.nama as level,
          detail_user.bukti_kesanggupan,
          detail_user.bukti_mahasiswa,
          detail_user.tanggal_wawancara,
          detail_user.waktu_wawancara,
          divisi.nama as divisi,
          jabatan.nama as jabatan
        FROM
          users
        LEFT JOIN level ON level.id = users.level_id
        LEFT JOIN detail_user ON users.id = detail_user.user_id
        LEFT JOIN divisi ON detail_user.divisi_id = divisi.id
        LEFT JOIN jabatan ON detail_user.jabatan_id = jabatan.id
        $filter
        $sort
        $paging
      ")->result_array();

      $no = 0;
      $hasil['error'] = false;
      $hasil['message'] = "success";
      $hasil['data'] = array();
      $hasil['draw'] = $draw;
      $hasil['recordsTotal'] = $recordsTotal;
      $hasil['recordsFiltered'] = $recordsTotal;
      foreach ($get_users as $key) {
        $key['file_bukti_kesanggupan'] = explode($key['id']."/", $key['bukti_kesanggupan'])[1];
        $key['file_bukti_mahasiswa'] = explode($key['id']."/", $key['bukti_mahasiswa'])[1];
        $hasil['data'][$no++] = $key;
      }
      goto output;

      output:
      return $hasil;
    }

    public function delete($params){
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      if ($user['level_id'] != 1) {
        $hasil = array(
            'error' => true,
            'message' => "Unauthorized."
        );
        goto output;
      }
      
      $id = $params['id'];
      
      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "User belum dipilih."
        );
        goto output;
      }

      $delete = $this->db->delete('users', ['id' => $id]);

      if ($delete) {
        $this->db->delete('detail_user', ['user_id' => $id]);
        $this->db->delete('api_keys', ['user_id' => $id]);

        $hasil = array(
          'error' => false,
          'message' => "User berhasil dihapus."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "User gagal dihapus."
      );

      output:
      return $hasil;
    }

    public function set_interview($params){
      $user = get_user();
      $user_id = $user['id'];

        $wawancara_user_id = $params['user_id'];
        $tanggal = $params['tanggal'];
        $waktu = $params['waktu'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      } 

      if ($user['level_id'] != 1) {
        $hasil = array(
            'error' => true,
            'message' => "Unauthorized."
        );
        goto output;
      }

      if (empty($tanggal)) {
        $hasil = array(
            'error' => true,
            'message' => "Tanggal belum diisi."
        );
        goto output;
      } else if (empty($waktu)) {
        $hasil = array(
            'error' => true,
            'message' => "Waktu belum diisi."
        );
        goto output;
      }

      $currentDate = date('Y-m-d H:i:s');

      $inputDateTime = "$tanggal $waktu:00";

      $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $inputDateTime);

      if ($dateTime->format('Y-m-d H:i:s') < $currentDate) {
        $hasil = array(
            'error' => true,
            'message' => "Tanggal dan waktu harus lebih dari sekarang."
        );
        goto output;
      }

      $update = $this->db->update('detail_user', array(
          'tanggal_wawancara' => $tanggal,
          'waktu_wawancara' => $waktu,
      ), ['user_id' => $wawancara_user_id]);

      if ($update) {

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
        $mail->Subject = 'Tanggal Wawancara';

        $mail->Body = header_email_reset_password().'<table border="0" cellpadding="0" cellspacing="0" class="text_block block-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
        <tr>
        <td class="pad" style="padding-bottom:15px;padding-top:10px;">
        <div style="font-family: sans-serif">
        <div class="" style="font-size: 14px; mso-line-height-alt: 16.8px; color: #000000; line-height: 1.2; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;">
        <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;"><span style="font-size:30px;"><b style="color: DodgerBlue;">Tanggal</b> Wawancara Anda</span></p>
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
        <p style="margin: 0; font-size: 15px; text-align: center; mso-line-height-alt: 21px;">Wawancara anda akan dilaksanakan pada tanggal dibawah ini. Pastikan untuk hadir 5 menit sebelumnya.</p>
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
        <p style="margin: 0; font-size: 15px; text-align: center; mso-line-height-alt: 21px;">'+$dateTime->format('Y-m-d H:i:s')+'</span></p>
        </div>
        </div>
        </td>
        </tr>
        </table>'.footer_email_reset_password();

        $hasil = array(
            'error' => false,
            'message' => "Wawancara berhasil ditetapkan."
        );
        goto output;
      }

      $hasil = array(
          'error' => true,
          'message' => "Wawancara gagal ditetapkan."
      );

      output:
      return $hasil;
    }

    public function set_member($params){
      $user = get_user();
      $user_id = $user['id'];

      $member_user_id = $params['user_id'];
      $divisi = $params['divisi'];
      $jabatan = $params['jabatan'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      if ($user['level_id'] != 1) {
        $hasil = array(
            'error' => true,
            'message' => "Unauthorized."
        );
        goto output;
      }

      if (empty($divisi)) {
        $hasil = array(
            'error' => true,
            'message' => "Divisi belum dipilih."
        );
        goto output;
      } else if (empty($jabatan)) {
        $hasil = array(
            'error' => true,
            'message' => "Jabatan belum diisi."
        );
        goto output;
      }

      $update = $this->db->update('detail_user', array(
          'divisi_id' => $divisi,
          'jabatan_id' => $jabatan,
      ), ['user_id' => $member_user_id]);

      if ($update) {
        $level_id = "3";
        if ($divisi == 1) {
          $level_id = "1";
        }

        if ($jabatan == "5") {
          $level_id = "2";
        }

        $this->db->update('users', array(
          'status' => "1",
          'level_id' => $level_id
        ), ['id' => $member_user_id]);

        $hasil = array(
            'error' => false,
            'message' => "Berhasil menambahkan divisi dan jabatan."
        );
        goto output;
      }

      $hasil = array(
          'error' => true,
          'message' => "Gagal menambahkan divisi dan jabatan."
      );

      output:
      return $hasil;
    }


}

?>