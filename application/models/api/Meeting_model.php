<?php

class Meeting_model extends CI_Model {

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

      $length = intval($params['length']);
      $start = intval($params['start']);
      $draw = $params['draw'];
      $sort = (!empty($params['sort'])) ? "ORDER BY rapat.id " . $this->db->escape_str($params['sort']) : "";
      $search = $params['search']['value'];
      $id = (!empty($params['id'])) ? $params['id'] : "";
      
      $paging = ($length > 0) ? "LIMIT $start, $length" : "";

      $filter = "WHERE rapat.id IS NOT NULL";
      (!empty($id)) ? $filter .= " AND rapat.id = " . $this->db->escape($id) : "";
      (!empty($search)) ? $filter .= " AND (rapat.nama LIKE '%" . $this->db->escape_like_str($search) . "%' OR get_tipe_rapat(rapat.tipe) LIKE '%" . $this->db->escape_like_str($search) . "%')" : "";

      $recordsTotal = $this->db->query("
        SELECT 
          rapat.id,
          rapat.tipe,
          rapat.nama,
          rapat.tanggal,
          rapat.waktu_mulai,
          rapat.notulensi,
          rapat.daftar_hadir,
          get_tipe_rapat(rapat.tipe) as deskripsi_tipe
        FROM
          rapat
        $filter
      ")->num_rows();

      $get_rapat = $this->db->query("
        SELECT 
          rapat.id,
          rapat.tipe,
          rapat.nama,
          rapat.tanggal,
          rapat.waktu_mulai,
          rapat.notulensi,
          rapat.daftar_hadir,
          get_tipe_rapat(rapat.tipe) as deskripsi_tipe
        FROM
          rapat
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
      foreach ($get_rapat as $key) {
        $hasil['data'][$no++] = $key;
      }
      goto output;

      output:
      return $hasil;
    }

    public function add($params){
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      $tipe = $params['tipe'];
      $nama = $params['nama'];
      $tanggal = $params['tanggal'];
      
      if (empty($nama)) {
        $hasil = array(
          'error' => true,
          'message' => "Nama belum diisi."
        );
        goto output;
      } else if (empty($tanggal)) {
        $hasil = array(
          'error' => true,
          'message' => "Tanggal belum diisi."
        );
        goto output;
      } else if (empty($tipe)) {
        $hasil = array(
          'error' => true,
          'message' => "Tipe Rapat belum dipilih."
        );
        goto output;
      }

      $tambah = $this->db->insert('rapat', array(
        'tipe' => $tipe,
        'nama' => $nama,
        'tanggal' => $tanggal
      ));

      if ($tambah) {
        $hasil = array(
          'error' => false,
          'message' => "Agenda Rapat berhasil ditambahkan."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Agenda Rapat gagal ditambahkan."
      );

      output:
      return $hasil;
    }

    public function update($params){
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      $id = $params['id'];
      $tipe = $params['tipe'];
      $nama = $params['nama'];
      $tanggal = $params['tanggal'];
      
      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Agenda Rapat belum dipilih."
        );
        goto output;
      } else if (empty($nama)) {
        $hasil = array(
          'error' => true,
          'message' => "Nama belum diisi."
        );
        goto output;
      } else if (empty($tanggal)) {
        $hasil = array(
          'error' => true,
          'message' => "Tanggal belum diisi."
        );
        goto output;
      } else if (empty($tipe)) {
        $hasil = array(
          'error' => true,
          'message' => "Tipe Rapat belum dipilih."
        );
        goto output;
      }

      $update = $this->db->update('rapat', array(
        'tipe' => $tipe,
        'nama' => $nama,
        'tanggal' => $tanggal
      ), ['id' => $id]);

      if ($update) {
        $hasil = array(
          'error' => false,
          'message' => "Agenda Rapat berhasil diupdate."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Agenda Rapat gagal diupdate."
      );

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

      $id = $params['id'];
      
      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Agenda Rapat belum dipilih."
        );
        goto output;
      }

      $delete = $this->db->delete('rapat', ['id' => $id]);

      if ($delete) {
        $hasil = array(
          'error' => false,
          'message' => "Agenda Rapat berhasil dihapus."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Agenda Rapat gagal dihapus."
      );

      output:
      return $hasil;
    }

    public function uploadnotulensi($params){
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      $id = $params['id'];
      $notulensi = $params['notulensi'];

      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Agenda Rapat belum dipilih."
        );
        goto output;
      } else if (empty($notulensi)) {
        $hasil = array(
          'error' => true,
          'message' => "Notulensi belum diisi."
        );
        goto output;
      }

      $uploaded = upload_base64("assets/cdn/meeting-document/" . $id . "/", $notulensi);

      if (!$uploaded['status']) {
        $hasil = array(
          'error' => true,
          'message' => $uploaded['message']
        );
        goto output;
      }

      $update = $this->db->update('rapat', array(
        'notulensi' => $uploaded['path']
      ), ['id' => $id]);

      if ($update) {
        $hasil = array(
          'error' => false,
          'message' => "Notulensi berhasil ditambahkan."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Notulensi gagal ditambahkan."
      );

      output:
      return $hasil;
    }

    public function uploaddaftarhadir($params){
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }
      
      $id = $params['id'];
      $daftar_hadir = $params['daftar_hadir'];

      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Agenda Rapat belum dipilih."
        );
        goto output;
      } else if (empty($daftar_hadir)) {
        $hasil = array(
          'error' => true,
          'message' => "Daftar Hadir belum diisi."
        );
        goto output;
      }

      $uploaded = upload_base64("assets/cdn/meeting-document/" . $id . "/", $daftar_hadir);

      if (!$uploaded['status']) {
        $hasil = array(
          'error' => true,
          'message' => $uploaded['message']
        );
        goto output;
      }

      $update = $this->db->update('rapat', array(
        'daftar_hadir' => $uploaded['path']
      ), ['id' => $id]);

      if ($update) {
        $hasil = array(
          'error' => false,
          'message' => "Daftar Hadir berhasil ditambahkan."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Daftar Hadir gagal ditambahkan."
      );

      output:
      return $hasil;
    }

}

?>
