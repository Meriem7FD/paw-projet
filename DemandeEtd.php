<?php
require_once 'Database.php';

$db = new Database();
$conn = $db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ide = $_POST['ide'];
    $typedoc = $_POST['typedoc'];
    $iddoc = uniqid('doc_');
    $statut = "en cours";

    $sql = "INSERT INTO demande (iddoc, ide, typedoc, statut) VALUES (:iddoc, :ide, :typedoc, :statut)";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([
            ':iddoc' => $iddoc,
            ':ide' => $ide,
            ':typedoc' => $typedoc,
            ':statut' => $statut,
        ]);
        $message = "Votre demande a été enregistrée avec succès.";
    } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Demande</title>
    <link rel="stylesheet" href="style_etudiant.css">
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo">
    </header>
    <main>
        <div class="signup">
            <h2>Faire une demande de document</h2>
            <?php if (isset($message)) echo "<p class='message'>$message</p>"; ?>
            <form method="post" action="">
                <div class="input-box">
                    <div class="form-group">
                        <label for="ide">Matricule :</label>
                        <input type="text" id="ide" name="ide" required>
                    </div>
                    <div class="form-group">
                        <label for="typedoc">Type de Document :</label>
                        <select id="typedoc" name="typedoc" required>
                            <option value="Certificat de scolarité">Certificat de scolarité</option>
                            <option value="Relevé de notes">Relevé de notes</option>
                            <option value="Attestation d'inscription">Attestation d'inscription</option>
                        </select>
                    </div>
                    <button type="submit">Soumettre</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
    <p>© 2024 Université - Tous droits réservés</p>
    <p>Contactez-nous : <a>contact@universite.com</a></p>
    </footer>
</body>
</html>
