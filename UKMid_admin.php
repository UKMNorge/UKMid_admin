<?php  
/* 
Plugin Name: UKMid-admin
Plugin URI: http://www.ukm-norge.no
Description: Verktøy for å administrere "single signon"-løsningen UKMid / UKMDip.
Author: UKM Norge / A Hustad 
Version: 1.0 
Author URI: http://www.ukm-norge.no
*/

if(is_admin()) {
	add_action('network_admin_menu', 'UKMid_admin_menu');
}


function UKMid_admin_menu() {
	$page = add_menu_page('UKMid-admin', 'UKMid-admin', 'superadmin', 'ukmid_admin', 'ukmid_admin', 'none', 28);

	define('UKMID_PLUGIN_DIR_PATH', __DIR__.'/');

	// Queue up script-includes
	ukmid_admin_scripts();
	// Queue up style-includes
	ukmid_admin_styles();

	
	
	#$page = add_menu_page('UKM Norge Systemverktøy', 'System', 'superadmin', 'UKMsystemtools','UKMsystemtools', 'http://ico.ukm.no/system-16.png',22);

	#$subpage1 = add_submenu_page( 'UKMsystemtools', 'Kontakteksport', 'Kontakteksport', 'superadministrator', 'UKMkontakteksport', 'UKMkontakteksport' );
}


function ukmid_admin() {
	$TWIG = array();
	require_once('controller/layout.controller.php');

	$VIEW = isset( $_GET['action'] ) ? $_GET['action'] : 'oversikt';
	$TWIG['tab_active'] = $VIEW;
	require_once('controller/'. $VIEW .'.controller.php');
	
	echo TWIG($VIEW .'.html.twig', $TWIG, dirname(__FILE__), true);
	echo TWIGjs( dirname(__FILE__) );
}

function ukmid_admin_scripts() {
	#wp_enqueue_script('TwigJS');
	wp_enqueue_script('WPbootstrap3_js');	
}

function ukmid_admin_styles() {
	wp_enqueue_style('WPbootstrap3_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
}