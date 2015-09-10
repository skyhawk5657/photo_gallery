<?php
/**
 * App Configuration
 *
  * Author: Hyview
 *
 * Date created: 9/9/2015; Last updated: 9/10/2015
 */
 
// Determine whether we're working on a local server or on the real server:
$host = substr($_SERVER['HTTP_HOST'], 0, 5);
if ( in_array($host, array('local', '127.0', '192.1')) ) {
	$local = TRUE;
} else {
	$local = FALSE;
}

// Set up site title, url and path
if ( $local ) { // local server
	// Always debug when running locally:
	$debug = TRUE;
	
	// Define the constants
	$site = array (
		"title" => "Hyview Softech",
		"url" => "http://localhost/hyview/",
	);
} else { // remote server
	$site = array (
		"title" => "Hyview Softech",
		"url" => "http://www.hyview.com/",
	);
}

$app_url = $site["url"]."responsive-photo-gallery/";
$img_url = $app_url."images/";
$css_url = $app_url."css/";
$js_url = $app_url."js/";
$fb_url = $app_url."fancybox/";

// Assume debugging is off
if ( !isset($debug) ) {
	$debug = FALSE;
}
?>