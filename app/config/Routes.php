<?php

require_once __DIR__ . '/../controllers/FilmeController.php';


$routes = [];

function route(string $method, string $path, callable $callback)
{
    global $routes;
    $routes[] = compact('method', 'path', 'callback');
}

// Registrando as rotas
route('GET', '/', function () {
    $controller = new FilmeController();
    $controller->index();
});


// Processa a requisição
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$matched = false;

foreach ($routes as $route) {
    if ($route['method'] === $requestMethod && $route['path'] === $requestUri) {
        $matched = true;
        call_user_func($route['callback']);
        break;
    }
}

if (!$matched) {
    http_response_code(404);
    echo "404 - Página não encontrada";
}
