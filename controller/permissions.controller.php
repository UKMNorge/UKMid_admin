<?php

require_once( UKMID_PLUGIN_DIR_PATH . 'class/PermissionCollection.class.php');
$TWIG['PermissionCollection'] = new PermissionCollection();

$TWIG['new_permission_action'] = '?page=ukmid_admin&action=permissions';
$TWIG['delete_permission_action'] = '?page=ukmid_admin&action=permissions';

// Finn hvilke systemer vi har, sånn at vi kan legge de til i listen.
$sql = new SQL("SELECT `api_key` FROM API_Keys");
$res = $sql->run();
$api_keys = array();
while($row = SQL::fetch($res)) {
	$api_keys[] = $row['api_key'];	
}
$TWIG['api_keys'] = $api_keys;


if( isset($_POST['permission']) ) {
	// Legg til ny nøkkel i databasen
	$sql = new SQLins('API_Permissions', array());
	$sql->add('system', $_POST['system']);
	$sql->add('permission', $_POST['permission']);
	$sql->add('api_key', $_POST['api_key']);

	#echo $sql->debug();
	$res = $sql->run();
	#var_dump($res);
	if($res == 1)
		$TWIG['message'] = array( 	'success' 	=> 'success',
									'title' 	=> 'Tilgangen ble lagret!',
									'body' 		=> '');
	else
		$TWIG['message'] = array( 	'success' 	=> false,
									'title' 	=> 'Klarte ikke å legge til en ny tilgang - fikk følgende feilmelding: ' . $sql->error(),
									'body' 		=> '');

} elseif( isset($_POST['delete_id']) ) {
	if($_POST['delete_id'] == null || $_POST['delete_id'] == '' || !is_numeric($_POST['delete_id']) ) {
		die('Kan ikke slette uten ID!');
	}
	$sql = new SQLdel('API_Permissions', array('id' => $_POST['delete_id']));

	#echo $sql->debug();
	$res = $sql->run();
	if($res != 1) {
		$TWIG['message'] = array( 	'success' 	=> false,
									'title' 	=> 'Klarte ikke å slette tilgang med id '.$_POST['delete_id'].'!',
									'body' 		=> '');
	} else {
		$TWIG['message'] = array( 	'success' 	=> 'success',
									'title' 	=> 'Slettet tilgang!',
									'body' 		=> '');
	}

}