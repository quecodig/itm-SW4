<?php

// Incluir el autoloader de Composer
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../core/Autoload.php';
require_once __DIR__ . '/../config/env.php';

// Configurar variables de entorno para testing
$_ENV['DB_HOST'] = 'localhost';
$_ENV['DB_NAME'] = 'productos_test_db';
$_ENV['DB_USER'] = 'test_user';
$_ENV['DB_PASSWORD'] = 'test_password';
$_ENV['DB_PORT'] = '3306';
$_ENV['DB_CHARSET'] = 'utf8mb4';
