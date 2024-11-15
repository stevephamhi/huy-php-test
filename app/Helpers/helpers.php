<?php

use Core\View;

function route($controller, $method) {
    echo $controller . $method;
}

function dd(...$vars) {
    echo "<pre>";
    foreach ($vars as $var) {
        print_r($var);
    }
    echo "</pre>";
    die();
}

function provider($name)
{
    $file = MAIN_PATH . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'Providers' . DIRECTORY_SEPARATOR . $name . '.php';

    if (file_exists($file)) {
        return $file;
    }

    throw new Error('Provider Name not found:' . $file);
}

function view($path)
{
    return View::make($path)->render();
}

function filter_files($files)
{
    $files = array_filter($files, function($file) {
        return !in_array($file, array('.', '..'));
    });

    return $files;
}

function exception($msg = 'Internal Server Error.', $errorCode = 500)
{
    throw new Error($msg, $errorCode);
}

function env($key) {
    return $_ENV[$key];
}

function asset($file) {
    $host = env('APP_URL');

    return $host . $file;
}

function __e__($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}