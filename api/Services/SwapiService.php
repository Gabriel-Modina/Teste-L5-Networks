<?php

namespace Api\Services;

require_once __DIR__ . '/Clients/SwapiClient.php';
require_once __DIR__ . '/../Models/FilmModel.php';
require_once __DIR__ . '/../Models/PeopleModel.php';

use Api\Models\PeopleModel;
use Api\Models\FilmModel;

class SwapiService {
    private $swapiClient;

    public function __construct() {
        $this->swapiClient = new SwapiClient();
    }

    /**
     * Obtém todos os filmes ordenados por data de lançamento
     * @return mixed
     */
    public function getFilms(): mixed {
        $response = $this->swapiClient->get('films/');
        $films = $response['results'] ?? [];

        // Validação dos filmes
        $validatedFilms = array_map([$this, 'validateFilmData'], $films);

        $validatedFilms = $this->sortFilmsByReleaseDate($validatedFilms);
        return $validatedFilms;
    }

    /**
     * Obtém os detalhes de um filme específico
     * @param mixed $id
     * @return mixed
     */
    public function getFilmDetails($id): mixed {
        $response = $this->swapiClient->get('films/' . $id . '/');

        // Validação do filme específico
        return $this->validateFilmData($response);
    }

    /**
     * Obtém os detalhes de uma pessoa específica
     * @param mixed $id
     * @return mixed
     */
    public function getPersonDetails($id): mixed {
        $response = $this->swapiClient->get('people/' . $id . '/');

        return $this->validatePersonData($response);
    }

    /**
     * Valida os dados de um filme
     * @param array $filmData
     * @return FilmModel
     */
    private function validateFilmData($filmData): FilmModel {
        $film = new FilmModel();

        $film->title = $filmData['title'] ?? 'Título não disponível';
        $film->episode_id = isset($filmData['episode_id']) ? (int)$filmData['episode_id'] : 0;
        $film->opening_crawl = $filmData['opening_crawl'] ?? '';
        $film->director = $filmData['director'] ?? '';
        $film->producer = $filmData['producer'] ?? '';
        $film->characters = $filmData['characters'] ?? [];
        $film->url = $filmData['url'] ?? 'URL não disponível';

        return $film;
    }

    /**
     * Valida os dados de uma pessoa
     * @param array $personData
     * @return PeopleModel
     */
    private function validatePersonData($personData): PeopleModel {
        $person = new PeopleModel();

        $person->name = $personData['name'] ?? 'Nome não disponível';
        $person->url = $personData['url'] ?? 'URL não disponível';

        return $person;
    }

    /**
     * Ordena os filmes pela data de lançamento
     * @param mixed $films
     * @return array
     */
    private function sortFilmsByReleaseDate($films): array {
        usort($films, function($a, $b) {
            $timestampA = strtotime($a->release_date);
            $timestampB = strtotime($b->release_date);

            if ($timestampA == $timestampB) {
                return 0;
            }

            return ($timestampA < $timestampB) ? -1 : 1;
        });

        return $films;
    }
}
