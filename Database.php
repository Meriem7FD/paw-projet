<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "meriemmimim30";
    private $dbname = "minipaw";
    private $conn;

    public function __construct() {
        // Créer une nouvelle connexion PDO
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
