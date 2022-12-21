<?php

class User_model extends CI_Model {

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

		$user = $this->db->query("SELECT
			id,
			nim,
			angkatan,
			nama,
			telp,
			email,
			alamat
		FROM users");

		if ($user->num_rows() > 0) {

			$no = 0;
			foreach ($user->result_array() as $key) {
				$result['error'] = false;
				$result['message'] = null;
				$result['data'][$no++] = [
					'id' => $key['id'],
					'nim' => $key['nim'],
					'angkatan' => $key['angkatan'],
					'nama' => $key['nama'],
					'telp' => $key['telp'],
					'email' => $key['email'],
					'alamat' => $key['alamat']
				];
			}
			goto output;
		}

		$result['Error'] = true;
		$result['Message'] = "User tidak ditemukan";
		goto output;

		output:
		return $result;
    }

    public function profile(){
    	$user = get_user();
		$user_id = $user['id'];

		$get_user = $this->db->query("SELECT
          	users.id,
          	users.nama,
          	users.telp,
          	users.email,
          	users.alamat,
          	users.status,
          	users.nim,
          	users.angkatan,
          	users.level_id,
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
		WHERE users.id = '$user_id'");

		if ($get_user->num_rows() > 0) {

			$get_user = $get_user->row_array();

			$result['error'] = false;
			$result['message'] = null;
			$result['data'] = [
				'id' => $get_user['id'],
				'nama' => $get_user['nama'],
				'telp' => $get_user['telp'],
				'email' => $get_user['email'],
				'alamat' => $get_user['alamat'],
				'status' => $get_user['status'],
				'nim' => $get_user['nim'],
				'angkatan' => $get_user['angkatan'],
				'level_id' => $get_user['level_id'],
				'level' => $get_user['level'],
				'bukti_kesanggupan' => $get_user['bukti_kesanggupan'],
				'file_bukti_kesanggupan' => explode($get_user['id']."/", $get_user['bukti_kesanggupan'])[1],
				'bukti_mahasiswa' => $get_user['bukti_mahasiswa'],
				'file_bukti_mahasiswa' => explode($get_user['id']."/", $get_user['bukti_mahasiswa'])[1],
				'tanggal_wawancara' => $get_user['tanggal_wawancara'],
				'divisi' => $get_user['divisi'],
				'jabatan' => $get_user['jabatan'],
			];

			goto output;
		}

		$result['error'] = true;
		$result['message'] = "User tidak ditemukan";
		$result['data'] = [];
		goto output;

		output:
		return $result;
    }

    public function update_profile($params){
    	$user = get_user();
		$user_id = $user['id'];

      	$nama = $params['nama'];
      	$angkatan = $params['angkatan'];
      	$telp = $params['telp'];
      	$alamat = $params['alamat'];
      
	    if (empty($user_id)) {
        	$hasil = array(
          		'error' => true,
          		'message' => "Anda belum login."
        	);
        	goto output;
      	} else if (empty($nama)) {
	        $hasil = array(
    	      	'error' => true,
	          	'message' => "Nama belum diisi."
        	);
        	goto output;
      	} else if (empty($angkatan)) {
	        $hasil = array(
	          	'error' => true,
	          	'message' => "Angkatan belum diisi."
	        );
	        goto output;
	    } else if (empty($telp)) {
	        $hasil = array(
	          	'error' => true,
	          	'message' => "No. Telepon belum diisi."
	        );
	        goto output;
	    } else if (empty($alamat)) {
	        $hasil = array(
	          	'error' => true,
	          	'message' => "Alamat belum diisi."
	        );
	        goto output;
	    }

	    $update = $this->db->update('users', array(
	        'nama' => $nama,
	        'angkatan' => $angkatan,
	        'telp' => $telp,
	        'alamat' => $alamat
	    ), ['id' => $user_id]);

	    if ($update) {
	        $hasil = array(
	          	'error' => false,
	          	'message' => "Profile berhasil diupdate."
	        );
	        goto output;
	    }

	    $hasil = array(
	        'error' => true,
	        'message' => "Profile gagal diupdate."
	    );

	    output:
	    return $hasil;
	}

}

?>
