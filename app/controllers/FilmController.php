<?php

namespace App\Controllers;

class FilmController
{

    /**
     * Exibe a página inicial
     * @return void
     */
    public function index()
    {
        require_once __DIR__ . '/../views/index.php';
    }

    /**
     * Exibe os detalhes do filme
     * @param mixed $id
     * @return void
     */
    public function films($id)
    {
        require_once __DIR__ . '/../views/films.php';
    }
}