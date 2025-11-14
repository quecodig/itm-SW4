<?php
	function loadEnv($path){
		// Primero intenta cargar desde variables de entorno del sistema
		$envVars = [
			'DB_HOST', 'DB_PORT', 'DB_NAME', 'DB_USER', 'DB_PASSWORD', 'DB_CHARSET', 'BASEURL', 'ENCRYPTION_KEY'
		];
		foreach ($envVars as $var) {
			$value = getenv($var);
			if ($value !== false) {
				$_ENV[$var] = $value;
			}
		}
		// Luego carga desde el archivo .env si existe y no está ya definido
		if (file_exists($path)) {
			$lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			foreach ($lines as $line) {
				if (strpos(trim($line), '#') === 0) {
					continue;
				}
				list($name, $value) = explode('=', $line, 2);
				if (!isset($_ENV[$name])) {
					$_ENV[$name] = trim($value);
				}
			}
		}
	}
	loadEnv(__DIR__ . '/../.env');
