<?php

define("SHAREMARK_ENDPOINT", "http://dev.sharemark.com.au/v1/");


function sharemark_init_shortcode( $atts ) {

	if( !sharemark_get_license() ) {

		echo 'You don’t have a valid licence. Visit <a href="http://www.sharemark.com.au" target="_blank">sharemark.com.au</a> and sign up for a free trial.';

		return FALSE;

	}

	if( !isset( $atts['code'] ) ) {

		echo 'You must provide an ASX company code.';		
		
		return FALSE;

	}

	return TRUE;

}


function sharemark_get_license() {

	return get_option( "sharemark_licence" );

}


function sharemark_install($user) {

	add_option("sharemark_licence", $user->licence);

	echo "<script>window.location.href='" . admin_url() . "?page=sharemark-admin-help';</script>";

}


function sharemark_process_request($request) {

	$request_uri = SHAREMARK_ENDPOINT . $request['action'];

	if( isset( $request['value'] ) ) {

		$request_uri .= '/' . $request['value'];

	}

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $request_uri); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

	$header 	= array();
	$header[] = 'Content-length: 0';
	$header[] = 'Content-type: application/json';

	if( isset( $request['license'] ) ) {

		$header[] = 'Authorization: ' . $request['license'];

	}

	curl_setopt($ch, CURLOPT_HTTPHEADER,$header);

	$output = curl_exec($ch); 

	curl_close($ch);

	return json_decode( $output );
	
}


function sharemark_get_shareprice( $code ) {

	$license = sharemark_get_license();

	if( $license ) {

		$request = array(
					
			'action'	=> "price/$code",
			'license'	=> $license,

		);

		return sharemark_process_request($request);		

	}

	return FALSE;

}


function sharemark_get_announcements( $code ) {

	$license = sharemark_get_license();

	if( $license ) {

		$request = array(
					
			'action'	=> "announcements/$code",
			'license'	=> $license,

		);

		return sharemark_process_request($request);

	}

	return FALSE;

}
