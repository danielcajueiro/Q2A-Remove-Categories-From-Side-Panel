<?php
/*
	Plugin Name: Remove Categories from side panel
	Plugin URI: 
	Plugin Description: Remove categories from side panel
	Plugin Version: 1.0
	Plugin Date: 2015-02-14
	Plugin Author: Daniel O. Cajueiro
	Plugin Author URI:
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: Tested in 1.7.0
	Plugin Update Check URI: 
*/


if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

 
qa_register_plugin_module('module', 'caju_remove_cat_module_admin.php', 'Caju_remove_cat_module_admin', 'Caju Remove Cat Module Admin');
qa_register_plugin_layer('caju_remove_cat_layer.php', 'Caju Remove Cat Layer');
//qa_register_plugin_phrases('lang/caju_catrem_*.php', 'caju_catrem');

/*
	Omit PHP closing tag to help avoid accidental output
*/
