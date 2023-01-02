<?php

class WorkProgram_model extends CI_Model {

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
      $sort = (!empty($params['sort'])) ? "ORDER BY proker.id " . $this->db->escape_str($params['sort']) : "";
      $search = $params['search']['value'];
      $id = (!empty($params['id'])) ? $params['id'] : "";
      
      $paging = ($length > 0) ? "LIMIT $start, $length" : "";

      $filter = "WHERE proker.id IS NOT NULL";
      (!empty($id)) ? $filter .= " AND proker.id = " . $this->db->escape($id) : "";
      (!empty($search)) ? $filter .= " AND (proker.nama LIKE '%" . $this->db->escape_like_str($search) . "%' OR 
          IF(
            proker.status = 1, 
            'Terlaksana',
            'Belum Terlaksana'
          ) LIKE '%" . $this->db->escape_like_str($search) . "%')" : "";

      if ($user['divisi_id'] != 1) {
        $filter .= " AND proker.divisi_id IS NULL OR proker.divisi_id IN(1, ".$user['divisi_id'].")";
      }

      $recordsTotal = $this->db->query("
        SELECT 
          proker.id,
          proker.nama,
          proker.tanggal_acara,
          proker.status,
          IF(
            proker.status = 1, 
            'Terlaksana',
            'Belum Terlaksana'
          ) as nama_status,
          proker.tor,
          proker.lpj,
          pelaksana.nama as pelaksana,
          penanggung_jawab.nama as penanggung_jawab,
          pelaksana_id,
          penanggung_jawab_id,
          (
            SELECT SUM(jumlah*harga) FROM detail_anggaran_proker LEFT JOIN anggaran_proker on anggaran_proker.id = anggaran_proker_id WHERE proker_id = proker.id
          ) as total
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
          IF(
            proker.status = 1, 
            'Terlaksana',
            'Belum Terlaksana'
          ) as nama_status,
          proker.tor,
          proker.lpj,
          pelaksana.nama as pelaksana,
          penanggung_jawab.nama as penanggung_jawab,
          pelaksana_id,
          penanggung_jawab_id,
          (
            SELECT SUM(jumlah*harga) FROM detail_anggaran_proker LEFT JOIN anggaran_proker on anggaran_proker.id = anggaran_proker_id WHERE proker_id = proker.id
          ) as total
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
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      if ($user['level_id'] == 3) {
        $hasil = array(
            'error' => true,
            'message' => "Unauthorized."
        );
        goto output;
      }

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
        'penanggung_jawab_id' => $penanggung_jawab_id,
        'divisi_id' => $user['divisi_id']
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
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      if ($user['level_id'] == 3) {
        $hasil = array(
            'error' => true,
            'message' => "Unauthorized."
        );
        goto output;
      }

      $id = $params['id'];
      $nama = $params['nama'];
      $tanggal = $params['tanggal'];
      $status = $params['status'];
      $pelaksana_id = $params['pelaksana_id'];
      $penanggung_jawab_id = $params['penanggung_jawab_id'];
      
      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Program Kerja belum dipilih."
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
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      if ($user['level_id'] == 3) {
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

    public function uploadtor($params){
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      if ($user['level_id'] == 3) {
        $hasil = array(
            'error' => true,
            'message' => "Unauthorized."
        );
        goto output;
      }

      $id = $params['id'];
      $tor = $params['tor'];

      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Program Kerja belum dipilih."
        );
        goto output;
      } else if (empty($tor)) {
        $hasil = array(
          'error' => true,
          'message' => "TOR belum diisi."
        );
        goto output;
      }

      $uploaded = upload_base64("assets/cdn/proker-document/" . $id . "/", $tor);

      if (!$uploaded['status']) {
        $hasil = array(
          'error' => true,
          'message' => $uploaded['message']
        );
        goto output;
      }

      $update = $this->db->update('proker', array(
        'tor' => $uploaded['path']
      ), ['id' => $id]);

      if ($update) {
        $hasil = array(
          'error' => false,
          'message' => "TOR berhasil ditambahkan."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "TOR gagal ditambahkan."
      );

      output:
      return $hasil;
    }

    public function uploadlpj($params){
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      if ($user['level_id'] == 3) {
        $hasil = array(
            'error' => true,
            'message' => "Unauthorized."
        );
        goto output;
      }

      $id = $params['id'];
      $lpj = $params['lpj'];

      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Program Kerja belum dipilih."
        );
        goto output;
      } else if (empty($lpj)) {
        $hasil = array(
          'error' => true,
          'message' => "LPJ belum diisi."
        );
        goto output;
      }

      $uploaded = upload_base64("assets/cdn/proker-document/" . $id . "/", $lpj);

      if (!$uploaded['status']) {
        $hasil = array(
          'error' => true,
          'message' => $uploaded['message']
        );
        goto output;
      }

      $update = $this->db->update('proker', array(
        'lpj' => $uploaded['path']
      ), ['id' => $id]);

      if ($update) {
        $hasil = array(
          'error' => false,
          'message' => "LPJ berhasil ditambahkan."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "LPJ gagal ditambahkan."
      );

      output:
      return $hasil;
    }

    public function listbudget($params){
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
      $sort = (!empty($params['sort'])) ? "ORDER BY anggaran_proker.id " . $this->db->escape_str($params['sort']) : "";
      $search = $params['search']['value'];
      $id = (!empty($params['id'])) ? $params['id'] : "";
      $proker_id = (!empty($params['proker_id'])) ? $params['proker_id'] : "";
      
      $paging = ($length > 0) ? "LIMIT $start, $length" : "";

      $filter = "WHERE anggaran_proker.id IS NOT NULL";
      (!empty($id)) ? $filter .= " AND anggaran_proker.id = " . $this->db->escape($id) : "";
      (!empty($proker_id)) ? $filter .= " AND anggaran_proker.proker_id = " . $this->db->escape($proker_id) : "";
      (!empty($search)) ? $filter .= " AND anggaran_proker.nama LIKE '%" . $this->db->escape_like_str($search) . "%'" : "";

      $recordsTotal = $this->db->query("
        SELECT 
          anggaran_proker.id,
          anggaran_proker.nama,
          (
            SELECT count(id) FROM detail_anggaran_proker WHERE anggaran_proker_id = anggaran_proker.id
          ) as jumlah_detail
        FROM
          anggaran_proker
        $filter
      ")->num_rows();

      $get_anggaran_proker = $this->db->query("
        SELECT 
          anggaran_proker.id,
          anggaran_proker.nama,
          (
            SELECT count(id) FROM detail_anggaran_proker WHERE anggaran_proker_id = anggaran_proker.id
          ) as jumlah_detail
        FROM
          anggaran_proker
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
      foreach ($get_anggaran_proker as $key) {
        $hasil['data'][$no++] = $key;
      }
      goto output;

      output:
      return $hasil;
    }

    public function addbudget($params){
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      $nama = $params['nama'];
      $proker_id = $params['proker_id'];
      
      if (empty($nama)) {
        $hasil = array(
          'error' => true,
          'message' => "Nama belum diisi."
        );
        goto output;
      } else if (empty($proker_id)) {
        $hasil = array(
          'error' => true,
          'message' => "Program Kerja belum dipilih."
        );
        goto output;
      }

      $tambah = $this->db->insert('anggaran_proker', array(
        'nama' => strtoupper($nama),
        'proker_id' => $proker_id
      ));

      if ($tambah) {
        $hasil = array(
          'error' => false,
          'message' => "Anggaran berhasil ditambahkan."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Anggaran gagal ditambahkan."
      );

      output:
      return $hasil;
    }

    public function deletebudget($params){
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
          'message' => "Anggaran belum dipilih."
        );
        goto output;
      }

      $delete = $this->db->delete('anggaran_proker', ['id' => $id]);

      if ($delete) {
        $hasil = array(
          'error' => false,
          'message' => "Anggaran berhasil dihapus."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Anggaran gagal dihapus."
      );

      output:
      return $hasil;
    }

    public function listbudgetdetail($params){
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
      $sort = (!empty($params['sort'])) ? "ORDER BY detail_anggaran_proker.id " . $this->db->escape_str($params['sort']) : "";
      $search = $params['search']['value'];
      $id = (!empty($params['id'])) ? $params['id'] : "";
      $proker_id = (!empty($params['proker_id'])) ? $params['proker_id'] : "";
      
      $paging = ($length > 0) ? "LIMIT $start, $length" : "";

      $filter = "WHERE detail_anggaran_proker.id IS NOT NULL";
      (!empty($id)) ? $filter .= " AND detail_anggaran_proker.id = " . $this->db->escape($id) : "";
      (!empty($proker_id)) ? $filter .= " AND anggaran_proker.proker_id = " . $this->db->escape($proker_id) : "";
      (!empty($search)) ? $filter .= " AND (detail_anggaran_proker.jenis_pengeluaran LIKE '%" . $this->db->escape_like_str($search) . "%' OR anggaran_proker.nama LIKE '%" . $this->db->escape_like_str($search) . "%')" : "";

      $recordsTotal = $this->db->query("
        SELECT 
          detail_anggaran_proker.id,
          jenis_pengeluaran,
          jumlah,
          satuan,
          harga,
          anggaran_proker_id,
          anggaran_proker.nama as nama_anggaran
        FROM
          detail_anggaran_proker
          LEFT JOIN anggaran_proker on anggaran_proker.id = anggaran_proker_id
        $filter
      ")->num_rows();

      $get_anggaran_proker = $this->db->query("
        SELECT 
          detail_anggaran_proker.id,
          jenis_pengeluaran,
          jumlah,
          satuan,
          harga,
          anggaran_proker_id,
          anggaran_proker.nama as nama_anggaran
        FROM
          detail_anggaran_proker
          LEFT JOIN anggaran_proker on anggaran_proker.id = anggaran_proker_id
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
      foreach ($get_anggaran_proker as $key) {
        $hasil['data'][$no++] = $key;
      }
      goto output;

      output:
      return $hasil;
    }

    public function addbudgetdetail($params){
      $user = get_user();
      $user_id = $user['id'];
      
      if (empty($user_id)) {
        $hasil = array(
            'error' => true,
            'message' => "Anda belum login."
        );
        goto output;
      }

      $anggaran_proker_id = $params['anggaran_proker_id'];
      $jenis_pengeluaran = $params['jenis_pengeluaran'];
      $jumlah = $params['jumlah'];
      $satuan = $params['satuan'];
      $harga = $params['harga'];
      
      if (empty($anggaran_proker_id)) {
        $hasil = array(
          'error' => true,
          'message' => "Anggaran tidak dipilih."
        );
        goto output;
      } else if (empty($jenis_pengeluaran)) {
        $hasil = array(
          'error' => true,
          'message' => "Jenis Pengeluaran belum diisi."
        );
        goto output;
      } else if (empty($jumlah)) {
        $hasil = array(
          'error' => true,
          'message' => "Jumlah belum diisi."
        );
        goto output;
      } else if (empty($satuan)) {
        $hasil = array(
          'error' => true,
          'message' => "Satuan belum diisi."
        );
        goto output;
      } else if (empty($harga)) {
        $hasil = array(
          'error' => true,
          'message' => "Harga belum diisi."
        );
        goto output;
      }

      $tambah = $this->db->insert('detail_anggaran_proker', array(
        'anggaran_proker_id' => $anggaran_proker_id,
        'jenis_pengeluaran' => $jenis_pengeluaran,
        'jumlah' => $jumlah,
        'satuan' => $satuan,
        'harga' => $harga
      ));

      if ($tambah) {
        $hasil = array(
          'error' => false,
          'message' => "Detail Anggaran berhasil ditambahkan."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Detail Anggaran gagal ditambahkan."
      );

      output:
      return $hasil;
    }

    public function updatebudgetdetail($params){
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
      $anggaran_proker_id = $params['anggaran_proker_id'];
      $jenis_pengeluaran = $params['jenis_pengeluaran'];
      $jumlah = $params['jumlah'];
      $satuan = $params['satuan'];
      $harga = $params['harga'];
      
      if (empty($id)) {
        $hasil = array(
          'error' => true,
          'message' => "Program Kerja belum dipilih."
        );
        goto output;
      } else if (empty($anggaran_proker_id)) {
        $hasil = array(
          'error' => true,
          'message' => "Anggaran tidak dipilih."
        );
        goto output;
      } else if (empty($jenis_pengeluaran)) {
        $hasil = array(
          'error' => true,
          'message' => "Jenis Pengeluaran belum diisi."
        );
        goto output;
      } else if (empty($jumlah)) {
        $hasil = array(
          'error' => true,
          'message' => "Jumlah belum diisi."
        );
        goto output;
      } else if (empty($satuan)) {
        $hasil = array(
          'error' => true,
          'message' => "Satuan belum diisi."
        );
        goto output;
      } else if (empty($harga)) {
        $hasil = array(
          'error' => true,
          'message' => "Harga belum diisi."
        );
        goto output;
      }

      $update = $this->db->update('detail_anggaran_proker', array(
        'anggaran_proker_id' => $anggaran_proker_id,
        'jenis_pengeluaran' => $jenis_pengeluaran,
        'jumlah' => $jumlah,
        'satuan' => $satuan,
        'harga' => $harga
      ), ['id' => $id]);

      if ($update) {
        $hasil = array(
          'error' => false,
          'message' => "Detail Anggaran berhasil diupdate."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Detail Anggaran gagal diupdate."
      );

      output:
      return $hasil;
    }

    public function deletebudgetdetail($params){
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
          'message' => "Detail Anggaran belum dipilih."
        );
        goto output;
      }

      $delete = $this->db->delete('detail_anggaran_proker', ['id' => $id]);

      if ($delete) {
        $hasil = array(
          'error' => false,
          'message' => "Detail Anggaran berhasil dihapus."
        );
        goto output;
      }

      $hasil = array(
        'error' => true,
        'message' => "Detail Anggaran gagal dihapus."
      );

      output:
      return $hasil;
    }

}

?>
