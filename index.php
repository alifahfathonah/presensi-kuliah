<?php
	if ( !session_id() ) {
		session_start();
	}
	require_once __DIR__ . '/app/init.php';
	define('DIREKTORI', __DIR__);
	date_default_timezone_set('Asia/Jakarta');
	
	$app = new App();
?>