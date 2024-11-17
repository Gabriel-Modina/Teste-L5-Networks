<?php

namespace Api\Services;

require_once __DIR__ . '/Clients/SwapiClient.php';

class SwapiService {
    private $swapiClient;

    public function __construct() {
        $this->swapiClient = new SwapiClient();
    }

    /**
     * Obtém todos os filmes ordenados por data de lançamento
     * @return mixed
     */
    public function getFilms():mixed {
        $response = $this->swapiClient->get('films/');
        $response['results'] = $this->sortFilmsByReleaseDate($response['results']);

        return $response['results'];
    }    

    /**
     * Obtém os detalhes de um filme específico
     * @param mixed $id
     * @return mixed
     */
    public function getFilmDetails($id):mixed {
        $response = $this->swapiClient->get('films/' . $id . '/');

        return $response;
    }

    /**
     * Obtém todas as pessoas ordenadas por nome
     * @return mixed
     */
    public function getPeople():mixed {
        $response = $this->swapiClient->get('people/');

        return $response['results'];
    }

    /**
     * Obtém os detalhes de uma pessoa específica
     * @param mixed $id
     * @return mixed
     */
    public function getPersonDetails($id):mixed {
        $response = $this->swapiClient->get('people/' . $id . '/');

        return $response;
    }

    /**
     * Ordena os filmes pela data de lançamento
     * @param mixed $films
     * @return array
     */
    private function sortFilmsByReleaseDate($films):array {
        usort($films, function($a, $b) {
            $timestampA = strtotime($a['release_date']);
            $timestampB = strtotime($b['release_date']);
            
            if ($timestampA == $timestampB) {
                return 0;
            }
            
            return ($timestampA < $timestampB) ? -1 : 1;
        });
    
        return $films;
    }

}
?>
