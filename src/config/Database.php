<?php
namespace Config;

use PDO;
use PDOException;

class Database {
    private $host = '127.0.0.1';
    private $db_name = 'desafio_revvo';
    private $username = 'root';
    private $password = '';
    public  $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(["error" => "Database Connection Error: " . $e->getMessage()]);
            exit;
        }
        return $this->conn;
    }
}