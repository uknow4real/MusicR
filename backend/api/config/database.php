<?php
class Database {

    private $host = "localhost";
    private $db_name = "beats";
    private $username = "musicr";
    private $password = "NzfWKb7c8MMx,4E";
    public $conn;

    public function getConnection() {

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
