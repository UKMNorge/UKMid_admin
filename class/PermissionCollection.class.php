<?php

class PermissionCollection {

	public function getPermissionFromData($data) {
		$key = new stdClass();
		$key->id = $data['id'];
		$key->system = $data['system'];
		$key->permission = $data['permission'];
		$key->api_key = $data['api_key'];
		return $key;
	}

	public function getAllPermissions() {
		$sql = new SQL('SELECT * FROM API_Permissions', array());
		$res = $sql->run();
		$data = array();
		if(!$res) return false;
		while($row = mysql_fetch_assoc($res)) {
			$d = array( 
							'id' => $row['id'],
							'system' => $row['system'],
							'permission' => $row['permission'],
							'api_key' => $row['api_key'],
							);
			$data[] = $this->getPermissionFromData($d);
		}

		return $data;
	}
}