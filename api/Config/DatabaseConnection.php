<?php

namespace Api\Config;

class DatabaseConnection
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        $env = parse_ini_file('.env'); 

        $host = $env['DB_HOST'];
        $dbname = $env['DB_NAME'];
        $user = $env['DB_USER'];
        $password = $env['DB_PASSWORD'];

        try {
            $this->pdo = new \PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }

    /**
     * Obtem a instância única
     * @return DatabaseConnection
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Obtem a conexão PDO
     * @return \PDO
     */
    public function getConnection(): \PDO
    {
        return $this->pdo;
    }
}
