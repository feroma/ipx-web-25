<?php
header( "Access-Control-Allow-Origin:*" );
header( "Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept" );
header( 'Content-Type: application/json' );
require_once( 'includes/config.php' );
include( 'includes/log.php' );
include( 'includes/functions.php' );
$POST     = file_get_contents( "php://input" );
$payload = json_decode( $POST );


$mylog = new log();
$mylog->scriviLog( 'call - API metodo :' );
$mylog->scriviLog( 'payload :' );
$mylog->scriviLog( print_r( $payload, 1 ) );
// $mylog->scriviLog( $data );
/**@see https://www.php.net/manual/en/function.http-response-code.php */
$response_code = 200;
/**
 * i messaggi di errore personalizzati NON DEVONO ritornare uno status 500
 * altrimenti vue si blocca
 * per ritornare un errore la $response deve contenere un oggetto ERROR:...
 * se presente message:... si apre la popup
 */
$response_custom_error = 200;
$response = array(
	'error' => 'No post data',
	'message' => 'No specific request has been passed',
);

if($POST && $payload->payload ){
	$payloadData = $payload->payload;

	if ( ! $payloadData->action ) {
		$response = array(
			'error' => 'No post data',
			'message' => 'No specific request has been passed',
		);
	} else {
		switch ( $payloadData->action ) {
			case 'get_website_data':
				$response = website_main_data();
				break;
			case 'get_page':
				$response = getPage( $payloadData->data );
				break;
			default:
				$response_code = $response_custom_error;
				$response      = [
					'error' => 'no action founded',
					'message' => 'No response for requested action: '.$payloadData->action,
				];
		}
	}
}



$mylog->scriviLog( 'response :' );
$mylog->scriviLog( print_r( $response, 1 ) );
/**/
print json_encode( $response );


function website_main_data() {
	return [

		"nav" => [
			[ "id" => "1", "label" => 'homepage', "slug" => '/' ],
		],
		"config" => [
			'REPO_URL' => REPO_URL,
			'COPYRIGHT' => '©2025,️iperformx.com | all rights reserved |  all content is protected and cannot be replicated without explicit authorization.',
			'FOOTER_LINK' => 'Do you want<br>more info?<strong>BOOK A<br>DEMO now!</strong>'
		],
		"pages" => [
			"1" => [
				"title" => 'Welcome',
				"body" => 'Welcome to our new site',
				"sections" => [],
			],
		],

	];
}