<?php
header( "Access-Control-Allow-Origin:*" );
header( "Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept" );
header( 'Content-Type: application/json' );


$response = [

	"nav" => [
		[ "id" => "1", "label" => 'homepage', "slug" => '/' ],
		[ "id" => "2", "label" => 'About Us', "slug" => '/about-us' ],
		[ "id" => "3", "label" => 'Contact', "slug" => '/contact' ],
	],
	"pages" => [
		"1" => [
			"title" => 'Welcome',
			"body" => 'Welcome to our new site',
			"sections" =>[
				'1' => [
					"title" => 'First Section',
					"body" => 'This is the first section',
				],
				'2' => [
					"title" => 'Second Section',
					"body" => 'This is the second section',
				]

			]
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

/*$response = array(
	'error' => 'No post data',
	'message' => 'Non è presente una request',
);*/
print json_encode( $response );