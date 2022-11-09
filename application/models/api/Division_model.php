<?php

class Division_model extends CI_Model {

    public function list($params){
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

      $get_sekolah = $this->db->query("
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
      foreach ($get_sekolah as $key) {
        $hasil['data'][$no++] = $key;
      }
      goto output;

      output:
      return $hasil;
    }

    public function add($params){
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


}

?>
