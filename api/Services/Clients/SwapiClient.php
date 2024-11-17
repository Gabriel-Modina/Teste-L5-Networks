<?php

namespace Api\Services;
class SwapiClient {
    private $baseUrl;

    public function __construct() {
        $this->baseUrl = 'https://swapi.dev/api/';
    }

    /**
     * Faz a requisição cURL e retorna a resposta em formato JSON
     * @param mixed $endpoint
     * @return mixed
     */
    public function get($endpoint):mixed {
        $url = $this->baseUrl . $endpoint;
        
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);

        if(curl_errno($ch)) {
            echo 'Erro de cURL: ' . curl_error($ch);
        }

        curl_close($ch);

        return json_decode($response, true);
    }
}
?>
