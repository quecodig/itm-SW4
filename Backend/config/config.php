<?php
	require_once 'env.php';
	define('DB_HOST', $_ENV['DB_HOST']);
	define('DB_NAME', $_ENV['DB_NAME']);
	define('DB_USER', $_ENV['DB_USER']);
	define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
	define('DB_PORT', $_ENV['DB_PORT']);
	define('DB_CHARSET', 'utf8mb4');

	print_r($_ENV);

	define("BASEURL", $_ENV['BASEURL']);

	setlocale(LC_TIME, 'es_ES.UTF-8');
	date_default_timezone_set('America/Bogota');

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$url_actual = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
