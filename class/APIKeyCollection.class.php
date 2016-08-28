<?php

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
		$dummyData = array(	'id' => 1,
							'api_key' => 'dummy_key',
							'api_secret' => 'dummy_secret',
							'api_returnurl' => 'http://test.ukm.dev/login_dummy',
							'api_tokenurl' => 'http://test.ukm.dev/receive_dummy' );
		
		$keys = array();
		for($i = 0; $i < 3; $i++) {
			$dummyData['id'] = $i;
			$keys[] = $this->getKeyFromData($dummyData);
		}

		return $keys;
	}
}