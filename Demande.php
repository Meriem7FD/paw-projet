<?php
class Demande {
    private $db;
    private $conn;

    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->connect();
    }

    public function updateStatut($iddoc, $new_statut) {
        $sql = "UPDATE demande SET statut = :statut WHERE iddoc = :iddoc";
        $stmt = $this->conn->prepare($sql);

        try {
            $stmt->execute([':statut' => $new_statut, ':iddoc' => $iddoc]);
            return "Statut mis à jour avec succès.";
        } catch (PDOException $e) {
            return "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }

    public function rechercherDemandes($searchQuery, $filterStatut, $filterTypeDoc, $orderBy, $orderType) {
        $sql = "SELECT d.iddoc, d.ide, e.nom, e.prenom, d.typedoc, d.statut
                FROM demande d
                JOIN etudiant e ON d.ide = e.ide
                WHERE (e.nom LIKE :search OR e.prenom LIKE :search OR d.typedoc LIKE :search OR d.statut LIKE :search)";

        if ($filterStatut) {
            $sql .= " AND d.statut = :filterStatut";
        }
        if ($filterTypeDoc) {
            $sql .= " AND d.typedoc = :filterTypeDoc";
        }

        $validOrderColumns = ['iddoc', 'ide', 'nom', 'prenom', 'typedoc', 'statut'];
        if (!in_array($orderBy, $validOrderColumns)) {
            $orderBy = 'iddoc';
        }
        $orderType = ($orderType === 'DESC') ? 'DESC' : 'ASC';

        $sql .= " ORDER BY $orderBy $orderType";

        $stmt = $this->conn->prepare($sql);
        $stmtParams = ['search' => '%' . $searchQuery . '%'];

        if ($filterStatut) {
            $stmtParams['filterStatut'] = $filterStatut;
        }
        if ($filterTypeDoc) {
            $stmtParams['filterTypeDoc'] = $filterTypeDoc;
        }

        $stmt->execute($stmtParams);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
