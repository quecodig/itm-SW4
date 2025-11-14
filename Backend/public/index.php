<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Content-Type: application/json; charset=UTF-8");
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../core/Autoload.php';
    require_once __DIR__ . '/../config/env.php';
    require_once __DIR__ . '/../core/Router.php';
    require_once __DIR__ . '/../routes/api.php';

    \App\Core\Router::dispatch($_SERVER['REQUEST_URI']);
