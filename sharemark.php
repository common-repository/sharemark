<?php

/*
  Plugin Name: Sharemark
  Plugin URI: http://www.sharemark.com.au
  Description: Integrate ASX market information to your website
  Author: 1Byte Beta
  Version: 1.0
  Author URI: http://www.1bytebeta.com
 */

define("SHAREMARK_MSG_ERROR_INVALID_LICENCE", 
	"You must enter a valid licence key. Visit <a href='http://www.sharemark.com.au' target='blank'>sharemark.com.au</a> for more information.");


require_once('helpers.php');
require_once('shortcodes/shortcodes.php');


global $wp_version;

if( !version_compare( $wp_version, "3.0", ">=" ) ) {

	die("You need to run WordPress 3.0 or higher to use the Sharemark plugin on your website.");

}


function sharemark_init() {

	global $licence;	

	$licence = sharemark_get_license();

	if( !$licence ) {

		$licence = FALSE;

	} else {

		$licence = TRUE;

	}

}

add_action( 'init', 'sharemark_init' );


function sharemark_deactivate() {

	delete_option( "sharemark_licence" );

}

register_deactivation_hook( __FILE__ , 'sharemark_deactivate' );


function sharemark_enqueue_scripts() {

	wp_enqueue_style( 'sharemark_style', plugins_url('css/sharemark.css', __FILE__) );	

}

add_action( 'wp_enqueue_scripts', 'sharemark_enqueue_scripts' );


function sharemark_admin_head() {
	
	wp_register_style('sharemark_admin_style', plugins_url('css/sharemark.css', __FILE__) );
	wp_enqueue_style('sharemark_admin_style');

}

add_action( 'admin_head', 'sharemark_admin_head' );


function sharemark_admin_install() {

	$error = 0;

	$user 	= wp_get_current_user();
	$nonce 	= isset( $_REQUEST['_wpnonce'] ) ? $_REQUEST['_wpnonce'] : FALSE;

	if( $_POST['sharemark-install'] == 'Y' && wp_verify_nonce( $nonce, 'install-user-licence_' . $user->ID ) ) {

		$license = sanitize_text_field( $_POST['license'] );

		if( strlen($license) != 32 ) {

			$error = 1;

		} else {

			$request = array(
			
				'action'	=> 'valid_license',
				'value'		=> $license

			);

			$response = sharemark_process_request($request);

			if( $response->error ) {

				$error = 2;

			} else {

				sharemark_install($response->user);

			}

		}

	}

	require_once( 'views/admin-install.php' );
	
}


function sharemark_admin_help() {

	require_once( 'views/admin-help.php' );

}


function sharemark_admin_menu() {

	global $licence;

	if( !$licence ) {

		add_menu_page( 'Sharemark', 'Sharemark', 'manage_options', 'sharemark-admin-install', 'sharemark_admin_install', 'dashicons-chart-area' );

	} else {

		add_menu_page( 'Sharemark', 'Sharemark', 'manage_options', 'sharemark-admin-help', 'sharemark_admin_help', 'dashicons-chart-area' );		

	}

}

add_action( 'admin_menu', 'sharemark_admin_menu' );


function sharemark_get_licence() {

	$licence = sharemark_get_license();

	if( $licence ) {

		echo json_encode( array( 'licence' => $licence, 'error' => 0 ) );

	} else {

		echo json_encode( array( 'error' => 1 ) );

	}

	die();

}

add_action('wp_ajax_nopriv_sharemark_get_licence', 'sharemark_get_licence' );
add_action('wp_ajax_sharemark_get_licence', 'sharemark_get_licence' );
