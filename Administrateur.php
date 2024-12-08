<?php
class Administrateur {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function verifierIdentifiants($ida, $motdepasse) {
        $query = "SELECT * FROM administrateur WHERE ida = :ida AND motdepasse = :motdepasse";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ida', $ida);
        $stmt->bindParam(':motdepasse', $motdepasse);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Renvoie les données si valide, sinon false
    }
}
?>
