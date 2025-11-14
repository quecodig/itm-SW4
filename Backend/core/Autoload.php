<?php
	spl_autoload_register(function($class){
		$prefix = 'App\\';
		$base_dir = __DIR__ . '/../';

		$len = strlen($prefix);
		if (strncmp($prefix, $class, $len) !== 0) {
			return;
		}

		$relative_class = substr($class, $len);
		$file = $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $relative_class) . '.php';

		if(file_exists($file)){
			require_once $file;
		} else {
			die("❌ Error: No se pudo cargar la clase: {$file}");
		}
	});
