<?php

require_once( UKMID_PLUGIN_DIR_PATH . 'class/APIKeyCollection.class.php');

$TWIG['UKMAPIKeyCollection'] = new UKMAPIKeyCollection();
// Sett form-retur til denne siden.
$TWIG['new_apikey_action'] = '?page=ukmid_admin&action=ukmapikeys';
$TWIG['delete_apikey_action'] = '?page=ukmid_admin&action=ukmapikeys';

if( isset($_POST['api_key']) ) {
	// Legg til ny nøkkel i databasen
	$sql = new SQLins('API_Keys', array());
	$sql->add('api_key', $_POST['api_key']);
	if(!empty($_POST['api_secret'])) {
		$sql->add('secret', $_POST['api_secret']);
	}
	else {
		// TODO: Oppdater salt i denne genereringen.
		$hash = md5(time() . 'salt');
		$sql->add('secret', $hash);
	}

	#echo $sql->debug();
	$res = $sql->run();
	#var_dump($res);
	if($res == 1)
		$TWIG['message'] = array( 	'success' 	=> 'success',
									'title' 	=> 'Nøkkelen ble lagret!',
									'body' 		=> '');
	else
		$TWIG['message'] = array( 	'success' 	=> false,
									'title' 	=> 'Klarte ikke å legge til en ny nøkkel - fikk følgende feilmelding: ' . $sql->error(),
									'body' 		=> '');

} elseif( isset($_POST['delete_id']) ) {
	if($_POST['delete_id'] == null || $_POST['delete_id'] == '' || !is_numeric($_POST['delete_id']) ) {
		die('Kan ikke slette uten ID!');
	}
	$sql = new SQLdel('API_Keys', array('id' => $_POST['delete_id']));

	#echo $sql->debug();
	$res = $sql->run();
	if($res != 1) {
		$TWIG['message'] = array( 	'success' 	=> false,
									'title' 	=> 'Klarte ikke å slette nøkkel med id '.$_POST['delete_id'].'!',
									'body' 		=> '');
	} else {
		$TWIG['message'] = array( 	'success' 	=> 'success',
									'title' 	=> 'Slettet nøkkel!',
									'body' 		=> '');
	}

}