<?php

namespace Api\Controllers;

require_once __DIR__ . '/../Services/SwapiService.php';
require_once __DIR__ . '/../Models/AccessLogModel.php';

use Api\Services\SwapiService;
use Api\Models\AccessLogModel;

class FilmController
{
    private SwapiService $swapiService;

    private AccessLogModel $accessLogModel;

    public function __construct()
    {
        $this->swapiService = new SwapiService();
        $this->accessLogModel = new AccessLogModel();
    }

    /**
     * Rota catálogo
     * @return void
     */
    public function getFilms():void 
    {
        $this->accessLogModel->saveLog('/api/films');

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
        $this->accessLogModel->saveLog('/api/films/'. $id);

        $film = $this->swapiService->getFilmDetails($id);

        header('Content-Type: application/json');
        echo json_encode($film);
    }
}
