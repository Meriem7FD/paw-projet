<?php
class Etudiant {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function verifierIdentifiants($ide, $motdepasse) {
        $query = "SELECT * FROM etudiant WHERE ide = :ide AND motdepasse = :motdepasse";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":ide", $ide);
        $stmt->bindParam(":motdepasse", $motdepasse);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Renvoie les données si valide, sinon null
    }
}
?>
