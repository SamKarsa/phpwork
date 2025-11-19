<?php
// /public/index.php

// 1. AUTOLOADER: Carga de clases
spl_autoload_register(function ($class) {
    $directories = [
        'core/',
        'models/',
        'controllers/',
    ];
    $baseDir = __DIR__ . '/../';

    foreach ($directories as $dir) {
        $file = $baseDir . $dir . $class . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
});

// 2. CONFIGURACIÓN DEL ROUTER
$router = new Router();

$router->addRoute('/', 'ProductController@index'); 
$router->addRoute('/products', 'ProductController@index');
$router->addRoute('/products/update', 'ProductController@update');

// 3. LIMPIEZA Y DISPATCH DE LA URI
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];
$basePath = str_replace(basename($scriptName), '', $scriptName);

$uri = strtok($requestUri, '?');
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

if (empty($uri)) {
    $uri = '/';
} elseif ($uri[0] !== '/') {
    $uri = '/' . $uri;
}

$router->dispatch($uri);