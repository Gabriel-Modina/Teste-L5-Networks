<?php

$routes = require __DIR__ . '/routes.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Processa parâmetros de rota dinâmica
function matchRoute(string $uri, array $routes): array
{
    foreach ($routes as $route => $handler) {
        $pattern = preg_replace('/\{[^\}]+\}/', '([^\/]+)', $route);
        $pattern = '#^' . $pattern . '$#';

        if (preg_match($pattern, $uri, $matches)) {
            array_shift($matches);
            $params = [];
            preg_match_all('/\{([^\}]+)\}/', $route, $paramNames);
            foreach ($paramNames[1] as $index => $name) {
                $params[$name] = $matches[$index] ?? null;
            }
            return ['handler' => $handler, 'params' => $params];
        }
    }

    return [];
}

$routeMatch = matchRoute($requestUri, $routes);

if (!empty($routeMatch)) {
    $handler = $routeMatch['handler'];
    $params = $routeMatch['params'];
    $handler($params);
} else {
    http_response_code(404);
    echo '<h1>404 - Página não encontrada</h1>';
}
