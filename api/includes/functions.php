<?php
function getPage($args){
	//$nid = $args->id;
	$slug = $args->slug;
	//	$last_char = substr($slug, -1);
	//	if($last_char=='/'){
	//		$slug = substr($slug, 0, -1);
	//	}

	$page = [];
	if($slug == '/'){
		$slug = '/home';
	}
	$exist = file_exists('includes/pages/'. $slug.'.php');

	if($exist){
		include ('includes/pages/'. $slug.'.php');

	}else{
		$page = array(
			'error' => 'No page file found',
			'message' => 'La pagina richiesta non esiste',
		);
	}

	return [
		'page' => $page,
	];
}