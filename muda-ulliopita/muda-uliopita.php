<?php
/*
Plugin Name: Muda Uliopita
Plugin URI: http://mtaawasaba.com
Description: njia rahisi ya kuonesha muda uliopita kwenye post badala ya tarehe
Version: 1.1.0
Author: Joel Nyandigira
Author URI: http://Projects.simba.co.tz/joel
License: GPLv2 or later
*/

/*  Copyright 2020 mtaawasaba (email: mtoto6@gmail.com)

*/


defined( 'ABSPATH' ) or die( 'oyaaa vipi wewe!' );



// Add activate/deactivate links.
function mtaawasaba_muda_uliopita_plugin_action_links( $actions, $plugin_file ){
	
	static $plugin;

	if ( !isset($plugin) ){
		$plugin = plugin_basename(__FILE__);
	}
		
	
	return $actions;
	
}

// Time ago function
function mtaawasaba_muda_uliopita() {
	global $post;
	$from = get_post_time('U', false, $post->ID, false); // get post time
	$to = current_time('timestamp'); // get current time
	$diff = (int) abs( $to - $from );
	include ( plugin_dir_path( __FILE__ ).'/mahesabu.php' ); // time and date calculator
	return $since; // display time ago
}

if( !is_admin() ){
	add_filter('human_time_diff', 'mtaawasaba_muda_uliopita'); // return mtaawasaba_muda_uliopita() instead of human_time_diff()
	add_filter('get_the_date', 'mtaawasaba_muda_uliopita'); // return mtaawasaba_muda_uliopita() instead of get_the_date()
	add_filter('get_the_time', 'mtaawasaba_muda_uliopita'); // return mtaawasaba_muda_uliopita() instead of get_the_time()
	add_filter('the_time', 'mtaawasaba_muda_uliopita'); // return mtaawasaba_muda_uliopita() instead of the_time()
}


// Display time ago to comments date
if( !is_admin() ){	
	function mtaawasaba_muda_uliopita_comments() {
		$from = get_comment_time('U'); // get comment time
		$to = current_time('timestamp'); // get current time
		$diff = (int) abs( $to - $from );
		include ( plugin_dir_path( __FILE__ ).'/mahesabu.php' ); // time and date calculator
		return $since; // display time ago
	}
	add_filter('get_comment_date', 'mtaawasaba_muda_uliopita_comments'); // return mtaawasaba_muda_uliopita() instead of get_comment_date()
}

?>