<?php
	spl_autoload_register(function($class){
		$prefix = 'App\\';
		$base_dir = __DIR__ . '/../';

		$len = strlen($prefix);
		if (strncmp($prefix, $class, $len) !== 0) {
			return;
		}

		$relative_class = substr($class, $len);
		
		// Mapear namespaces específicos a directorios
		$namespace_mappings = [
			'Controllers\\' => 'controllers/',
			'Model\\' => 'model/',
			'Helpers\\' => 'helpers/',
			'Core\\' => 'core/'
		];
		
		$file = null;
		foreach ($namespace_mappings as $namespace => $directory) {
			if (strpos($relative_class, $namespace) === 0) {
				$class_name = substr($relative_class, strlen($namespace));
				$file = $base_dir . $directory . $class_name . '.php';
				break;
			}
		}
		
		// Si no coincide con ningún mapeo específico, usar la ruta por defecto
		if ($file === null) {
			$file = $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $relative_class) . '.php';
		}

		if(file_exists($file)){
			require_once $file;
		} else {
			// No mostrar error, permitir que otros autoloaders intenten cargar la clase
			return false;
		}
	});
