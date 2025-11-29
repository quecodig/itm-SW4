<?php

// Incluir el autoloader personalizado primero
require_once __DIR__ . '/../core/Autoload.php';

// Incluir el autoloader de Composer como fallback
require_once __DIR__ . '/../vendor/autoload.php';

// Cargar configuración de entorno
require_once __DIR__ . '/../config/env.php';

// Configurar variables de entorno para testing
$_ENV['DB_HOST'] = 'db_test';
$_ENV['DB_NAME'] = 'productos_test_db';
$_ENV['DB_USER'] = 'test_user';
$_ENV['DB_PASSWORD'] = 'test_password';
$_ENV['DB_PORT'] = '3306';
$_ENV['DB_CHARSET'] = 'utf8mb4';
