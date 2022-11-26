<?php

class Meeting_model extends CI_Model {

    public function list($params){
      $length = intval($params['length']);
      $start = intval($params['start']);
      $draw = $params['draw'];
      $sort = (!empty($params['sort'])) ? "ORDER BY rapat.id " . $this->db->escape_str($params['sort']) : "";
      $search = $params['search']['value'];
      $id = (!empty($params['id'])) ? $params['id'] : "";
      
      $paging = ($length > 0) ? "LIMIT $start, $length" : "";

      $filter = "WHERE rapat.id IS NOT NULL";
      (!empty($id)) ? $filter .= " AND rapat.id = " . $this->db->escape($id) : "";
      (!empty($search)) ? $filter .= " AND rapat.nama LIKE '%" . $this->db->escape_like_str($search) . "%'" : "";

      $recordsTotal = $this->db->query("
        SELECT 
          rapat.id,
          rapat.tipe,
          rapat.nama,
          rapat.tanggal
        FROM
          rapat
        $filter
      ")->num_rows();

      $get_rapat = $this->db->query("
        SELECT 
          rapat.id,
          rapat.tipe,
          rapat.nama,
          rapat.tanggal
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
      foreach ($get_sekolah as $key) {
        $hasil['data'][$no++] = $key;
      }
      goto output;

      output:
      return $hasil;
    }

    public function add($params){
      $type = $params['tipe'];
      $nama = $params['nama'];
      $time = $params['tanggal'];
      
      if (empty($type)) {
        $hasil = array(
          'error' => true,
          'message' => "Tipe belum diisi."
        );
        goto output;
      } else if (empty($nama)) {
        $hasil = array(
          'error' => true,
          'message' => "Nama rapat belum diisi."
        );
        goto output;
      } else if (empty($time)) {
        $hasil = array(
          'error' => true,
          'message' => "Tanggal belum diisi."
        );
        goto output;
      }

      $tambah = $this->db->insert('rapat', array(
        'tipe' => $type;
        'nama' => $nama;
        'tanggal' => $time;

      ));

      if ($tambah) {
        $hasil = array(
          'error' => false,
          'message' => "Rapat berhasil ditambahkan."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Rapat gagal ditambahkan."
      );

      output:
      return $hasil;
    }

    public function update($params){
      $id = $params['id'];
      $type = $params['tipe'];
      $nama = $params['nama'];
      $time = $params['tanggal'];
      
      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Rapat belum dipilih."
        );
        goto output;
      } else if (empty($type)) {
        $hasil = array(
          'error' => true,
          'message' => "Tipe belum diisi."
        );
        goto output;
      } else if (empty($nama)) {
        $hasil = array(
          'error' => true,
          'message' => "Nama rapat belum diisi."
        );
        goto output;
      } else if (empty($time)) {
        $hasil = array(
          'error' => true,
          'message' => "Tanggal belum diisi."
        );
        goto output;
      }

      $update = $this->db->update('rapat', array(
        'tipe' => $type,
        'nama' => $nama,
        'tanggal' => $time
      ), ['id' => $id]);

      if ($update) {
        $hasil = array(
          'error' => false,
          'message' => "Rapat berhasil diupdate."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Rapat gagal diupdate."
      );

      output:
      return $hasil;
    }

    public function delete($params){
      $id = $params['id'];
      
      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Rapat belum dipilih."
        );
        goto output;
      }

      $delete = $this->db->delete('Rapat', ['id' => $id]);

      if ($delete) {
        $hasil = array(
          'error' => false,
          'message' => "Rapat berhasil dihapus."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Rapat gagal dihapus."
      );

      output:
      return $hasil;
    }


}

?>
