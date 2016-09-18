<?php

$tabs = array();
$tabs[] = (object) array( 'link' 		=> 'oversikt',
						  'header' 		=> 'Oversikt',
						  'icon'		=> 'info-button-256',
						  'description'	=> 'Systemoversikt');

$tabs[] = (object) array( 'link' 		=> 'apikeys',
						  'header' 		=> 'UKMid-nøkler',
						  'icon'		=> 'logginn-256',
						  'description' => 'Administrer systemtilgang');

$tabs[] = (object) array( 'link' 		=> 'ukmapikeys',
						  'header'		=> 'UKMapi-nøkler',
						  'icon'		=> 'lock-256',
						  'description' => 'Administrer API-tilgang');

$tabs[] = (object) array( 'link' 		=> 'permissions',
						  'header'		=> 'Tillatelser',
						  'icon'		=> 'tools-256',
						  'description' => 'Administrer API-tillatelser');

$TWIG['tabs'] = $tabs;