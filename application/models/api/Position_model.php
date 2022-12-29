<?php

class Position_model extends CI_Model {

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
      $sort = (!empty($params['sort'])) ? "ORDER BY jabatan.id " . $this->db->escape_str($params['sort']) : "";
      $search = $params['search']['value'];
      $id = (!empty($params['id'])) ? $params['id'] : "";
      
      $paging = ($length > 0) ? "LIMIT $start, $length" : "";

      $filter = "WHERE jabatan.id IS NOT NULL";
      (!empty($id)) ? $filter .= " AND jabatan.id = " . $this->db->escape($id) : "";
      (!empty($search)) ? $filter .= " AND jabatan.nama LIKE '%" . $this->db->escape_like_str($search) . "%'" : "";

      $recordsTotal = $this->db->query("
        SELECT 
          jabatan.id,
          jabatan.nama
        FROM
          jabatan
        $filter
      ")->num_rows();

      $get_jabatan = $this->db->query("
        SELECT 
          jabatan.id,
          jabatan.nama
        FROM
          jabatan
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
      foreach ($get_jabatan as $key) {
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

      if ($user['level_id'] != 1) {
        $hasil = array(
            'error' => true,
            'message' => "Unauthorized."
        );
        goto output;
      }

      $nama = $params['nama'];
      
      if (empty($nama)) {
        $hasil = array(
          'error' => true,
          'message' => "Nama belum diisi."
        );
        goto output;
      }

      $tambah = $this->db->insert('jabatan', array(
        'nama' => $nama
      ));

      if ($tambah) {
        $hasil = array(
          'error' => false,
          'message' => "Jabatan berhasil ditambahkan."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Jabatan gagal ditambahkan."
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

      if ($user['level_id'] != 1) {
        $hasil = array(
            'error' => true,
            'message' => "Unauthorized."
        );
        goto output;
      }

      $id = $params['id'];
      $nama = $params['nama'];
      
      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Jabatan belum dipilih."
        );
        goto output;
      } else if (empty($nama)) {
        $hasil = array(
          'error' => true,
          'message' => "Nama belum diisi."
        );
        goto output;
      }

      $update = $this->db->update('jabatan', array(
        'nama' => $nama
      ), ['id' => $id]);

      if ($update) {
        $hasil = array(
          'error' => false,
          'message' => "Jabatan berhasil diupdate."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Jabatan gagal diupdate."
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
          'message' => "Jabatan belum dipilih."
        );
        goto output;
      }

      $delete = $this->db->delete('jabatan', ['id' => $id]);

      if ($delete) {
        $hasil = array(
          'error' => false,
          'message' => "Jabatan berhasil dihapus."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Jabatan gagal dihapus."
      );

      output:
      return $hasil;
    }
    
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

      $position = $this->db->query("SELECT
        id,
        nama
      FROM jabatan");

      if ($position->num_rows() > 0) {

        $no = 0;
        foreach ($position->result_array() as $key) {
          $result['error'] = false;
          $result['message'] = null;
          $result['data'][$no++] = [
            'id' => $key['id'],
            'nama' => $key['nama']
          ];
        }
        goto output;
      }

      $result['Error'] = true;
      $result['Message'] = "Jabatan tidak ditemukan";
      goto output;

      output:
      return $result;
    }


}

?>
