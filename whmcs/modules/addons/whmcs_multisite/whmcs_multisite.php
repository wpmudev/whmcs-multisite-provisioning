<?php
/*
WHMCS Multisite Provisioning Addon Module
Plugin Name: WHMCS Multisite Remote Provisioning
Plugin URI: http://premium.wpmudev.org/project/whmcs-multisite-provisioning/
Description: This plugin allows remote control of Multisite provisioning from WHMCS. Includes provisioning for Subdomain, Subdirectory or Domain Mapping Wordpress Multisite installs.
Author: Arnold Bailey {Incsub)
Author Uri: http://premium.wpmudev.org/
Text Domain: mrp
Domain Path: languages
Version: 1.0.5
Network: true
WDP ID: 264
*/

if (!defined("WHMCS"))
die("This file cannot be accessed directly");

function whmcs_multisite_config() {
	$configarray = array(
	"name" => "WHMCS Multisite Provisioning",
	"version" => "1.0.3",
	"author" => "wpmudev.org",
	"language" => "english",

	"fields" => array(

	/*
	"option1" => array ("FriendlyName" => "Multisite Administrator", "Type" => "text", "Size" => "25", "Description" => "Name of an administrator with rights to the Multisite Addon."),
	"option2" => array ("FriendlyName" => "Option2", "Type" => "password", "Size" => "25", "Description" => "Password"),
	"option3" => array ("FriendlyName" => "Option3", "Type" => "yesno", "Size" => "25", "Description" => "Sample Check Box"),
	"option4" => array ("FriendlyName" => "Option4", "Type" => "textarea", "Size" => "25", "Description" => "Textarea"),
	"option5" => array ("FriendlyName" => "Option5", "Type" => "dropdown", "Options" => "1,2,3,4,5", "Description" => "Sample Dropdown"),
	*/
	));
	return $configarray;
}

function whmcs_multisite_activate() {

	# Create Custom DB Table
	$query = "CREATE TABLE IF NOT EXISTS `mod_whmcs_multisite`
	(`id` INT( 1 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`blog_id` INT  NOT NULL,
	`service_id` INT  NOT NULL,
	`domain` TEXT NOT NULL,
	`path` TEXT NOT NULL,
	KEY `service_id` (`service_id`, `blog_id`)
	)";
	$result = mysql_query($query);
}

function whmcs_multisite_deactivate() {

	# Remove Custom DB Table
	//$query = "DROP TABLE `mod_addonexample`";
	//$result = mysql_query($query);

}


function whmcs_multisite_upgrade($vars) {
	/*
	$version = $vars['version'];

	# Run SQL Updates for V1.0 to V1.1
	if ($version < 1.1) {
	$query = "ALTER `mod_addonexample` ADD `demo2` TEXT NOT NULL ";
	$result = mysql_query($query);
	}

	# Run SQL Updates for V1.1 to V1.2
	if ($version < 1.2) {
	$query = "ALTER `mod_addonexample` ADD `demo3` TEXT NOT NULL ";
	$result = mysql_query($query);
	}
	*/
}

function whmcs_multisite_output($vars) {
	$modulelink = $vars['modulelink'];
	$version = $vars['version'];
	$option1 = $vars['option1'];
	$option2 = $vars['option2'];
	$option3 = $vars['option3'];
	$option4 = $vars['option4'];
	$option5 = $vars['option5'];
	$LANG = $vars['_lang'];
	/*
	echo 'output';
	echo '<p>'.$LANG['intro'].'</p>
	<p>'.$LANG['description'].'</p>
	<p>'.$LANG['documentation'].'</p>';
	*/
	echo "<p>Version: $version</p>";

}

function whmcs_multisite_sidebar($vars) {
	/*
	$modulelink = $vars['modulelink'];
	$version = $vars['version'];
	$option1 = $vars['option1'];
	$option2 = $vars['option2'];
	$option3 = $vars['option3'];
	$option4 = $vars['option4'];
	$option5 = $vars['option5'];
	$LANG = $vars['_lang'];

	$sidebar = '<span class="header"><img src="images/icons/addonmodules.png" class="absmiddle" width="16" height="16" /> Example</span>
	<ul class="menu">
	<li><a href="#">Demo Sidebar Content</a></li>
	<li><a href="#">Version: '.$version.'</a></li>
	</ul>';
	return $sidebar;
	*/
	return '';
}

?>