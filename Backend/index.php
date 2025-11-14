<?php

    if (file_exists(__DIR__ . '/public' . $_SERVER['REQUEST_URI'])) {
        return false; // Sirve el archivo directamente si existe
    } else {
        include_once __DIR__ . '/public/index.php'; // Redirige todas las solicitudes a index.php
    }
