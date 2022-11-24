<?php

class User_model extends CI_Model {

    public function getAll($params){
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

}

?>
