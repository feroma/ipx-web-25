<?php
header( "Access-Control-Allow-Origin:*" );
header( "Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept" );
header( 'Content-Type: application/json' );
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
			[ "id" => "2", "label" => 'About Us', "slug" => '/about-us' ],
			[ "id" => "3", "label" => 'Contact', "slug" => '/contact' ],
		],
		"pages" => [
			"1" => [
				"title" => 'Welcome',
				"body" => 'Welcome to our new site',
				"sections" => [
					'1' => [
						"title" => 'First Section',
						"body" => 'This is the first section',
						"layout" => 'default',
					],
					'2' => [
						"title" => 'Second Section',
						"body" => 'This is the second section',
						"layout" => 'default',
					],
					'3' => [
						"title" => 'Third Section',
						"body" => 'No layout specified',
					],

				],
			],
			"2" => [
				"title" => 'About us',
				"body" => 'Here some information about our company',
			],
			"3" => [
				"title" => 'Contact',
				"body" => 'Let\'s keep in touch!',
			],
		],

	];
}