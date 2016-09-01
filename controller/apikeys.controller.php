<?php

require_once( UKMID_PLUGIN_DIR_PATH . 'class/APIKeyCollection.class.php');

$TWIG['APIKeyCollection'] = new APIKeyCollection();
// Sett form-retur til denne siden.
$TWIG['new_apikey_action'] = '?page=ukmid_admin&action=apikeys';
$TWIG['delete_apikey_action'] = '?page=ukmid_admin&action=apikeys';

if( isset($_POST['api_key']) ) {
	// Legg til ny nøkkel i databasen
	$sql = new SQLins('APIKeys', array(), 'ukmdelta');
	$sql->add('api_key', $_POST['api_key']);
	if(!empty($_POST['api_secret'])) {
		$sql->add('api_secret', $_POST['api_secret']);
	}
	else {
		// TODO: Oppdater salt i denne genereringen.
		$hash = md5(time() . 'salt');
		$sql->add('api_secret', $hash);
	}
	$sql->add('api_returnurl', $_POST['api_returnURL']);
	$sql->add('api_tokenurl', $_POST['api_tokenURL']);

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
	$sql = new SQLdel('APIKeys', array('id' => $_POST['delete_id']), 'ukmdelta');

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