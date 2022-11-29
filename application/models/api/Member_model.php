<?php

class Member_model extends CI_Model {

    public function list($params){
      $length = intval($params['length']);
      $start = intval($params['start']);
      $draw = $params['draw'];
      $sort = (!empty($params['sort'])) ? "ORDER BY users.id " . $this->db->escape_str($params['sort']) : "";
      $search = $params['search']['value'];
      $id = (!empty($params['id'])) ? $params['id'] : "";
      
      $paging = ($length > 0) ? "LIMIT $start, $length" : "";

      $filter = "WHERE users.id IS NOT NULL";
      (!empty($id)) ? $filter .= " AND users.id = " . $this->db->escape($id) : "";
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
        $hasil['data'][$no++] = $key;
      }
      goto output;

      output:
      return $hasil;
    }

    public function add($params){
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


}

?>