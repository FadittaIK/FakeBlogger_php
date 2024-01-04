<?php
    class Database{
        
    private $servername = "db";
    private $username = "fadi";
    private $password = "fadi";
    private $database = "blog";
    private $conn;

    public function __construct() {
        $this->connect();
    }

    public function __destruct() {
        $this->disconnect();
    }

    public function getConnection() {
        return $this->conn;
    }

    private function connect() {
        
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    private function disconnect() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
    }
?>