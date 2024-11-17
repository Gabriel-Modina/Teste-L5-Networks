<?php

namespace Api\Controllers;

require_once __DIR__ . '/../Services/SwapiService.php';
require_once __DIR__ . '/../Models/AccessLogModel.php';

use Api\Services\SwapiService;
use Api\Models\AccessLogModel;

class PeopleController
{
    private SwapiService $swapiService;

    private AccessLogModel $accessLogModel;

    public function __construct()
    {
        $this->swapiService = new SwapiService();
        $this->accessLogModel = new AccessLogModel();
    }

    /**
     * Retorna o nome do personagem
     * @return void
     */
    public function getPersonDetails($id):void 
    {
        $this->accessLogModel->saveLog('/api/people/'. $id);

        $films = $this->swapiService->getPersonDetails($id);

        header('Content-Type: application/json');
        echo json_encode($films);
    }
}