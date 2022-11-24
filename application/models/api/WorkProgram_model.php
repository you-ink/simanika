<?php

class WorkProgram_model extends CI_Model {

    public function list($params){
      $length = intval($params['length']);
      $start = intval($params['start']);
      $draw = $params['draw'];
      $sort = (!empty($params['sort'])) ? "ORDER BY proker.id " . $this->db->escape_str($params['sort']) : "";
      $search = $params['search']['value'];
      $id = (!empty($params['id'])) ? $params['id'] : "";
      
      $paging = ($length > 0) ? "LIMIT $start, $length" : "";

      $filter = "WHERE proker.id IS NOT NULL";
      (!empty($id)) ? $filter .= " AND proker.id = " . $this->db->escape($id) : "";
      (!empty($search)) ? $filter .= " AND proker.nama LIKE '%" . $this->db->escape_like_str($search) . "%'" : "";

      $recordsTotal = $this->db->query("
        SELECT 
          proker.id,
          proker.nama,
          proker.tanggal_acara,
          proker.status,
          get_status(proker.status) as nama_status,
          proker.tor,
          proker.lpj,
          pelaksana.nama as pelaksana,
          penanggung_jawab.nama as penanggung_jawab,
          pelaksana_id,
          penanggung_jawab_id
        FROM
          proker
        LEFT JOIN users pelaksana ON pelaksana.id = pelaksana_id
        LEFT JOIN users penanggung_jawab ON penanggung_jawab.id = penanggung_jawab_id
        $filter
      ")->num_rows();

      $get_proker = $this->db->query("
        SELECT 
          proker.id,
          proker.nama,
          proker.tanggal_acara,
          proker.status,
          get_status(proker.status) as nama_status,
          proker.tor,
          proker.lpj,
          pelaksana.nama as pelaksana,
          penanggung_jawab.nama as penanggung_jawab,
          pelaksana_id,
          penanggung_jawab_id
        FROM
          proker
        LEFT JOIN users pelaksana ON pelaksana.id = pelaksana_id
        LEFT JOIN users penanggung_jawab ON penanggung_jawab.id = penanggung_jawab_id
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
      foreach ($get_proker as $key) {
        $hasil['data'][$no++] = $key;
      }
      goto output;

      output:
      return $hasil;
    }

    public function add($params){
      $nama = $params['nama'];
      $tanggal = $params['tanggal'];
      $status = $params['status'];
      $pelaksana_id = $params['pelaksana_id'];
      $penanggung_jawab_id = $params['penanggung_jawab_id'];
      
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
      } else if (empty($status)) {
        $hasil = array(
          'error' => true,
          'message' => "Status belum diisi."
        );
        goto output;
      } else if (empty($pelaksana_id)) {
        $hasil = array(
          'error' => true,
          'message' => "Pelaksana tidak dipilih."
        );
        goto output;
      } else if (empty($penanggung_jawab_id)) {
        $hasil = array(
          'error' => true,
          'message' => "Penanggung Jawab tidak dipilih."
        );
        goto output;
      }

      $tambah = $this->db->insert('proker', array(
        'nama' => $nama,
        'tanggal_acara' => $tanggal,
        'status' => $status,
        'pelaksana_id' => $pelaksana_id,
        'penanggung_jawab_id' => $penanggung_jawab_id
      ));

      if ($tambah) {
        $hasil = array(
          'error' => false,
          'message' => "Program Kerja berhasil ditambahkan."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Program Kerja gagal ditambahkan."
      );

      output:
      return $hasil;
    }

    public function update($params){
      $id = $params['id'];
      $nama = $params['nama'];
      $tanggal = $params['tanggal'];
      $status = $params['status'];
      $pelaksana_id = $params['pelaksana_id'];
      $penanggung_jawab_id = $params['penanggung_jawab_id'];
      
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
      } else if (empty($tanggal)) {
        $hasil = array(
          'error' => true,
          'message' => "Tanggal belum diisi."
        );
        goto output;
      } else if (empty($status)) {
        $hasil = array(
          'error' => true,
          'message' => "Status belum diisi."
        );
        goto output;
      } else if (empty($pelaksana_id)) {
        $hasil = array(
          'error' => true,
          'message' => "Pelaksana tidak dipilih."
        );
        goto output;
      } else if (empty($penanggung_jawab_id)) {
        $hasil = array(
          'error' => true,
          'message' => "Penanggung Jawab tidak dipilih."
        );
        goto output;
      }

      $update = $this->db->update('proker', array(
        'nama' => $nama,
        'tanggal_acara' => $tanggal,
        'status' => $status,
        'pelaksana_id' => $pelaksana_id,
        'penanggung_jawab_id' => $penanggung_jawab_id
      ), ['id' => $id]);

      if ($update) {
        $hasil = array(
          'error' => false,
          'message' => "Program Kerja berhasil diupdate."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Program Kerja gagal diupdate."
      );

      output:
      return $hasil;
    }

    public function delete($params){
      $id = $params['id'];
      
      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Program Kerja belum dipilih."
        );
        goto output;
      }

      $delete = $this->db->delete('proker', ['id' => $id]);

      if ($delete) {
        $hasil = array(
          'error' => false,
          'message' => "Program Kerja berhasil dihapus."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Program Kerja gagal dihapus."
      );

      output:
      return $hasil;
    }


}

?>
