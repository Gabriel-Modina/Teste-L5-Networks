<?php

namespace Api\Models;

require_once __DIR__ . "/../Config/DatabaseConnection.php";

use Api\Config\DatabaseConnection;

class AccessLogModel
{
    private $pdo;

    /**
     * Recebe a conexão com o banco de dados
     */
    public function __construct()
    {
        $dbConnection = DatabaseConnection::getInstance();
        $this->pdo = $dbConnection->getConnection();
    }

    /**
     * Salva um novo log
     * @param mixed $request
     * @throws \Exception
     * @return mixed
     */
    public function saveLog($request): void
    {
        try {
            $query = $this->pdo->prepare(
                "INSERT INTO access_log (created_at, request) 
                VALUES (NOW(), :request)"
            );
            
            $query->bindParam(':request', $request, \PDO::PARAM_STR);
            
            $query->execute();
        } catch (\PDOException $e) {
            throw new \Exception("Erro ao salvar log: " . $e->getMessage());
        }
    }
}
