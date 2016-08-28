<?php

$tabs = array();
$tabs[] = (object) array( 'link' 		=> 'oversikt',
						  'header' 		=> 'Oversikt',
						  'icon'		=> 'info-button-256',
						  'description'	=> 'Systemoversikt');

$tabs[] = (object) array( 'link' 		=> 'apikeys',
						  'header' 		=> 'API-nøkler',
						  'icon'		=> 'lock-256',
						  'description' => 'Administrer systemtilgang');

$TWIG['tabs'] = $tabs;