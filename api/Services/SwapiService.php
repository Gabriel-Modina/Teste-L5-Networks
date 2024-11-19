<?php

namespace Api\Services;

require_once __DIR__ . '/Clients/SwapiClient.php';
require_once __DIR__ . '/../Models/FilmModel.php';
require_once __DIR__ . '/../Models/PeopleModel.php';

use Api\Models\PeopleModel;
use Api\Models\FilmModel;

class SwapiService {
    private $swapiClient;
    private $cacheDir = __DIR__ . '/../cache/'; // Diretório de cache

    public function __construct() {
        $this->swapiClient = new SwapiClient();
        
        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0777, true);
        }
    }

    /**
     * Obtém todos os filmes ordenados por data de lançamento
     * Primeiro verifica se existe no cache, caso contrário faz a solicitação e valida
     * @return mixed
     */
    public function getFilms(): mixed {
        $cachedData = $this->getCache('films');

        if ($cachedData) {
            return $cachedData;
        }

        $response = $this->swapiClient->get('films/');
        $films = $response['results'] ?? [];

        $validatedFilms = array_map([$this, 'validateFilmData'], $films);

        $validatedFilms = $this->sortFilmsByReleaseDate($validatedFilms);

        $this->setCache('films', $validatedFilms);

        return $validatedFilms;
    }

    /**
     * Obtém os detalhes de um filme específico
     * Primeiro verifica se existe no cache, caso contrário faz a solicitação e valida
     * @param mixed $id
     * @return mixed
     */
    public function getFilmDetails($id): mixed {
        $cacheKey = 'film_' . $id;
        $cachedData = $this->getCache($cacheKey);

        if ($cachedData) {
            return $cachedData;
        }

        $response = $this->swapiClient->get('films/' . $id . '/');

        $validatedFilm = $this->validateFilmData($response);

        $this->setCache($cacheKey, $validatedFilm);

        return $validatedFilm;
    }

    /**
     * Obtém os detalhes de uma pessoa específica
     * Primeiro verifica se existe no cache, caso contrário faz a solicitação e valida
     * @param mixed $id
     * @return mixed
     */
    public function getPersonDetails($id): mixed {
        $cacheKey = 'person_' . $id;
        $cachedData = $this->getCache($cacheKey);

        if ($cachedData) {
            return $cachedData;
        }

        $response = $this->swapiClient->get('people/' . $id . '/');

        $validatedPerson = $this->validatePersonData($response);

        $this->setCache($cacheKey, $validatedPerson);

        return $validatedPerson;
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
        $film->release_date = $filmData['release_date'] ?? '';
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

    /**
     * Obtém dados do cache caso o arquivo de cache existe e não está expirado (1 hora)
     * @param string $cacheKey
     * @return mixed
     */
    private function getCache($cacheKey): mixed {
        $cacheFile = $this->cacheDir . $cacheKey . '.json';

        if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < 3600) {
            return json_decode(file_get_contents($cacheFile), true);
        }

        return null;
    }

    /**
     * Salva dados no cache
     * @param string $cacheKey
     * @param mixed $data
     * @return void
     */
    private function setCache($cacheKey, $data): void {
        $cacheFile = $this->cacheDir . $cacheKey . '.json';
        file_put_contents($cacheFile, json_encode($data));
    }
}
