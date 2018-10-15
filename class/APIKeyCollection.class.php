<?php

require_once('UKM/sql.class.php');

class APIKeyCollection {
	
	public function getKeyFromData($data) {
		$key = new stdClass();
		$key->id = $data['id'];
		$key->api_key = $data['api_key'];
		$key->api_secret = $data['api_secret'];
		$key->api_returnURL = $data['api_returnurl'];
		$key->api_tokenURL = $data['api_tokenurl'];
		
		return $key;
	}

	/**
	 * Returns an array of APIKey-objects.
	 */ 
	public function getAllKeys() {
		$sql = new SQL('SELECT * FROM APIKeys', array(), 'ukmdelta');
		$res = $sql->run();
		$data = array();
		if(!$res) return false;
		while($row = SQL::fetch($res)) {
			$d = array( 
							'id' => $row['id'],
							'api_key' => $row['api_key'],
							'api_secret' => $row['api_secret'],
							'api_returnurl' => $row['api_returnurl'],
							'api_tokenurl' => $row['api_tokenurl']
							);
			$data[] = $this->getKeyFromData($d);
		}

		return $data;
	}
}

class UKMAPIKeyCollection {
	public function getKeyFromData($data) {
		$key = new stdClass();
		$key->id = $data['id'];
		$key->api_key = $data['api_key'];
		$key->api_secret = $data['api_secret'];
		
		return $key;
	}

	/**
	 * Returns an array of APIKey-objects.
	 */ 
	public function getAllKeys() {
		$sql = new SQL('SELECT * FROM API_Keys', array());
		$res = $sql->run();
		$data = array();
		if(!$res) return false;
		while($row = SQL::fetch($res)) {
			$d = array( 
							'id' => $row['id'],
							'api_key' => $row['api_key'],
							'api_secret' => $row['secret'],
							);
			$data[] = $this->getKeyFromData($d);
		}

		return $data;
	}
}