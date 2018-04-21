<?php

	session_start();	//turn on sessions
	ob_start();
	define ("WWW_ROOT",'/dessert_mall/public');
	define("PRIVATE_PATH", dirname(__FILE__));
	define("PROJECT_PATH",dirname(PRIVATE_PATH));
	define("PUBLIC_PATH",PROJECT_PATH.'/public');
	define("SHARED_PATH",PRIVATE_PATH.'/shared');
	#define sequrity questions here
	$questions[0]='Who is your childhood hero?';
	$questions[1]='In what town was your first job?';
	$questions[2]='What is your favorite movie?';


	require_once('functions.php');
	require_once('db_functions.php');
	require_once('query_functions.php');
	require_once('auth_functions.php');
	require_once('validation_functions.php');
	$db=db_connect();


?>
