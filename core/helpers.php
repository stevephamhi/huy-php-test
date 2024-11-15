<?php

function load_env($path)
{
    if (!file_exists($path)) {
        throw new Exception("File not found: " . $path);
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Split the key and value
        list($name, $value) = explode('=', $line, 2);

        // Remove any surrounding quotes
        $value = trim($value, '"\'');

        // Set environment variable
        putenv(sprintf('%s=%s', $name, $value));
        
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
}

load_env(MAIN_PATH . DIRECTORY_SEPARATOR . '.env');