<?php

namespace Api\Controllers;

require_once __DIR__ . '/../Services/SwapiService.php';

use Api\Services\SwapiService;

class FilmController
{
    private SwapiService $swapiService;

    public function __construct()
    {
        $this->swapiService = new SwapiService();
    }

    /**
     * Rota catálogo
     * @return void
     */
    public function getFilms():void {
        
        $films = $this->swapiService->getFilms();

        header('Content-Type: application/json');
        echo json_encode($films);
    }

    /**
     * Rota detalhes de um filme
     * @param mixed $id
     * @return void
     */
    public function getFilm($id):void
    {
        $film = $this->swapiService->getFilmDetails($id);
        
        header('Content-Type: application/json');
        echo json_encode($film);
    }
}