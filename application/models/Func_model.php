<?php

class Func_model extends CI_Model {

	/*
	* cURL Post
	*/
	public function curl_post($url, $data = array())
	{
		$api_url = base_url('api/').$url;

		$curl = curl_init();

		$token = get_uid();

		// $token="G10b41-4p1-K3y";
		$data[env('api_access')] = $token;

		$options = [
		  	CURLOPT_URL        => $api_url,
		  	CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST       => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_HTTPHEADER => array(
				"authorization: Basic ".env("api_key"),
				"Cookie: uid=".$token
			),
			CURLOPT_SSL_VERIFYPEER => 0
		];

		curl_setopt_array($curl, $options);

		$result = curl_exec($curl);

		return $result;

		curl_close($curl);
	}

	/*
	* Get profil user
	*/
	public function get_profile()
	{
		if(get_uid()){
			$hasil = $this->curl_post("user/profile");
			$data =	json_decode($hasil, true);
			if($data['error']) {
				delete_cookie('uid');
				header('location: '.base_url('login'));
			}
			return $data['data'];
		}else{
			return null;
		}
	}

}

?>
