<?php

class Main_model extends CI_Model {

    public function dashboard($params){
    	$user = get_user();
      	$user_id = $user['id'];
      
      	if (empty($user_id)) {
	        $hasil = array(
    	        'error' => true,
        	    'message' => "Anda belum login."
        	);
        	goto output;
      	}

      	$new_member = $this->db->query("SELECT * FROM users WHERE status != 1")->num_rows();
      	$all_proker = $this->db->query("SELECT * FROM proker")->num_rows();
      	$proker_this_month = $this->db->query("SELECT * FROM proker WHERE MONTH(tanggal_acara) = MONTH('".date("Y-m-d")."')")->num_rows();
      	$done_proker = $this->db->query("SELECT * FROM proker WHERE status = 1")->num_rows();
      	$not_done_proker = $this->db->query("SELECT * FROM proker WHERE status = 2")->num_rows();

      	$hasil = array(
	        'error' => false,
    	    'message' => "Berhasil mengambil data.",
    	    'data' => [
    	    	'new_member' => $new_member,
    	    	'all_proker' => $all_proker,
    	    	'proker_this_month' => $proker_this_month,
    	    	'done_proker' => $done_proker,
    	    	'not_done_proker' => $not_done_proker,
    	    ]
    	);

      	output:
      	return $hasil;
 	}

 	public function proker_this_month($params)
 	{
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

      	$filter = "WHERE MONTH(proker.tanggal_acara) = MONTH('".date("Y-m-d")."')";
      	(!empty($id)) ? $filter .= " AND proker.id = " . $this->db->escape($id) : "";
      	(!empty($search)) ? $filter .= " AND (proker.nama LIKE '%" . $this->db->escape_like_str($search) . "%' OR get_status(proker.status) LIKE '%" . $this->db->escape_like_str($search) . "%')" : "";

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
          		get_status(proker.status) as nama_status,
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
    
    public function get_statistics($params)
    {
    	$user = get_user();
      	$user_id = $user['id'];
      
      	if (empty($user_id)) {
	        $hasil = array(
    	        'error' => true,
        	    'message' => "Anda belum login."
        	);
        	goto output;
      	}

      	$hasil = array(
	        'error' => false,
    	    'message' => "Berhasil mengambil data.",
    	    'data' => []
    	);

    	$year = (empty($params['year']) ? "CURDATE()" : "'".$params['year']."-01-01'");

      	$proker = $this->db->query("SELECT
			  t1.bulan,
			  IFNULL(t2.jumlah, 0) AS jumlah
			FROM (
			  SELECT 1 AS bulan UNION SELECT 2 AS bulan UNION SELECT 3 AS bulan
			  UNION SELECT 4 AS bulan UNION SELECT 5 AS bulan UNION SELECT 6 AS bulan
			  UNION SELECT 7 AS bulan UNION SELECT 8 AS bulan UNION SELECT 9 AS bulan
			  UNION SELECT 10 AS bulan UNION SELECT 11 AS bulan UNION SELECT 12 AS bulan
			) t1
			LEFT JOIN (
			  SELECT
			    MONTH(tanggal_acara) AS bulan,
			    COUNT(*) AS jumlah
			  FROM proker
			  WHERE YEAR(tanggal_acara) = YEAR($year)
			  GROUP BY bulan
			) t2 ON t1.bulan = t2.bulan
			ORDER BY t1.bulan ASC")->result_array();

      	$no1 = 0;
      	foreach ($proker as $key) {
      	    $hasil['data'][$no1++]['proker'] = $key;
      	}

      	$rapat = $this->db->query("SELECT
			  t1.bulan,
			  IFNULL(t2.jumlah, 0) AS jumlah
			FROM (
			  SELECT 1 AS bulan UNION SELECT 2 AS bulan UNION SELECT 3 AS bulan
			  UNION SELECT 4 AS bulan UNION SELECT 5 AS bulan UNION SELECT 6 AS bulan
			  UNION SELECT 7 AS bulan UNION SELECT 8 AS bulan UNION SELECT 9 AS bulan
			  UNION SELECT 10 AS bulan UNION SELECT 11 AS bulan UNION SELECT 12 AS bulan
			) t1
			LEFT JOIN (
			  SELECT
			    MONTH(tanggal) AS bulan,
			    COUNT(*) AS jumlah
			  FROM rapat
			  WHERE YEAR(tanggal) = YEAR($year)
			  GROUP BY bulan
			) t2 ON t1.bulan = t2.bulan
			ORDER BY t1.bulan ASC")->result_array();

      	$no2 = 0;
      	foreach ($rapat as $key) {
      	    $hasil['data'][$no2++]['rapat'] = $key;
      	}

      	output:
      	return $hasil;
    }

}

?>
