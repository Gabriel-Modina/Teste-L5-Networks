<?php

return [
    // Rotas da API
    '/api/' => function (): void {
        echo 'Você está consultando a API';
    },
    '/api/films/' => function (): void {
        require_once __DIR__ . "/api/Controllers/FilmController.php";
        $controller = new \Api\Controllers\FilmController();
        $controller->getFilms();
    },
    '/api/films/{id}' => function ($params): void {
        require_once __DIR__ . "/api/Controllers/FilmController.php";
        $controller = new \Api\Controllers\FilmController();
        $id = $params['id'] ?? null;

        if (!is_numeric($id)) {
            http_response_code(400);
            echo "400 - Solicitação inválida";
            exit;
        }

        $controller->getFilm($id);
    },
    '/api/people/{id}/' => function ($params): void {
        require_once __DIR__ . "/api/Controllers/PeopleController.php";
        $controller = new \Api\Controllers\PeopleController();
        $id = $params["id"] ?? null;

        if (!is_numeric($id)) {
            http_response_code(400);
            echo "400 - Solicitação inválida";
            exit;
        }
        $controller->getPersonDetails($id);
    },

    // Rotas do App
    '/' => function (): void {
        require_once __DIR__ . "/app/Controllers/FilmController.php";
        $controller = new \App\Controllers\FilmController();
        $controller->index();
    },
    '/films/{id}' => function ($params): void {
        require_once __DIR__ . "/app/Controllers/FilmController.php";
        $controller = new \App\Controllers\FilmController();
        $id = $params['id'] ?? null;

        if (!is_numeric($id)) {
            http_response_code(400);
            echo "400 - Solicitação inválida";
            exit;
        }

        $controller->films($id);
    },
];
