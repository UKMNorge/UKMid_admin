<?php

require_once( UKMID_PLUGIN_DIR_PATH . 'class/APIKeyCollection.class.php');

$TWIG['APIKeyCollection'] = new APIKeyCollection();
// Sett form-retur til denne siden.
$TWIG['new_apikey_action'] = '?page=ukmid_admin&action=apikeys&do=new';
$TWIG['delete_apikey_action'] = '?page=ukmid_admin&action=apikeys&do=delete';

if( isset($_POST['api_key']) ) {
	$TWIG['message'] = array( 	'success' 	=> 'success',
								'title' 	=> 'Du gjorde noe riktig!',
								'body' 		=> '');
} elseif( isset($_POST['delete_id']) ) {
	$TWIG['message'] = array( 	'success' 	=> false,
								'title' 	=> 'Du slettet noe!',
								'body' 		=> '');
}