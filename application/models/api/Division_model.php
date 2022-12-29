<?php

class Division_model extends CI_Model {

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
      $sort = (!empty($params['sort'])) ? "ORDER BY divisi.id " . $this->db->escape_str($params['sort']) : "";
      $search = $params['search']['value'];
      $id = (!empty($params['id'])) ? $params['id'] : "";
      
      $paging = ($length > 0) ? "LIMIT $start, $length" : "";

      $filter = "WHERE divisi.id IS NOT NULL";
      (!empty($id)) ? $filter .= " AND divisi.id = " . $this->db->escape($id) : "";
      (!empty($search)) ? $filter .= " AND divisi.nama LIKE '%" . $this->db->escape_like_str($search) . "%'" : "";

      $recordsTotal = $this->db->query("
        SELECT 
          divisi.id,
          divisi.nama,
          users.nama as ketua,
          ketua_id
        FROM
          divisi
        LEFT JOIN users ON users.id = divisi.ketua_id
        $filter
      ")->num_rows();

      $get_divisi = $this->db->query("
        SELECT 
          divisi.id,
          divisi.nama,
          users.nama as ketua,
          ketua_id
        FROM
          divisi
        LEFT JOIN users ON users.id = divisi.ketua_id
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
      foreach ($get_divisi as $key) {
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
      $ketua_id = $params['ketua_id'];
      
      if (empty($nama)) {
        $hasil = array(
          'error' => true,
          'message' => "Nama belum diisi."
        );
        goto output;
      } else if (empty($ketua_id)) {
        $hasil = array(
          'error' => true,
          'message' => "Ketua belum dipilih."
        );
        goto output;
      }

      $tambah = $this->db->insert('divisi', array(
        'nama' => $nama,
        'ketua_id' => $ketua_id
      ));

      if ($tambah) {
        $hasil = array(
          'error' => false,
          'message' => "Divisi berhasil ditambahkan."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Divisi gagal ditambahkan."
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
      $ketua_id = $params['ketua_id'];
      
      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Divisi belum dipilih."
        );
        goto output;
      } else if (empty($nama)) {
        $hasil = array(
          'error' => true,
          'message' => "Nama belum diisi."
        );
        goto output;
      } else if (empty($ketua_id)) {
        $hasil = array(
          'error' => true,
          'message' => "Ketua belum dipilih."
        );
        goto output;
      }

      $update = $this->db->update('divisi', array(
        'nama' => $nama,
        'ketua_id' => $ketua_id
      ), ['id' => $id]);

      if ($update) {
        $hasil = array(
          'error' => false,
          'message' => "Divisi berhasil diupdate."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Divisi gagal diupdate."
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
          'message' => "Divisi belum dipilih."
        );
        goto output;
      }

      $delete = $this->db->delete('divisi', ['id' => $id]);

      if ($delete) {
        $hasil = array(
          'error' => false,
          'message' => "Divisi berhasil dihapus."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Divisi gagal dihapus."
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

      $division = $this->db->query("SELECT
        id,
        nama
      FROM divisi");

      if ($division->num_rows() > 0) {

        $no = 0;
        foreach ($division->result_array() as $key) {
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
      $result['Message'] = "Divisi tidak ditemukan";
      goto output;

      output:
      return $result;
    }


}

?>
