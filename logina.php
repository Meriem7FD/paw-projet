<?php
session_start();
require 'Database.php';
require 'Administrateur.php';

// Créer une instance de la connexion à la base de données
$db = new Database();
$conn = $db->getConnection();

// Créer une instance de la classe Administrateur
$admin = new Administrateur($conn);

$error_message = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricule = $_POST['matricule'];
    $password = $_POST['password'];

    // Vérifier les identifiants
    $result = $admin->verifierIdentifiants($matricule, $password);

    if ($result) {
        // Connexion réussie
        $_SESSION['admin'] = $result['ida']; // Stocker l'IDA dans la session
        header('Location: admin.php'); // Rediriger vers la page des étudiants
        exit();
    } else {
        // Identifiants incorrects
        $error_message = "Vérifiez votre matricule et votre mot de passe.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logina.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Connexion Administrateur</title>
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo">
    </header>

    <main>
        <section class="login">
            <h2>Portail Administrateur</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="matricule">Matricule</label>
                    <input type="text" class="form-control" name="matricule" id="matricule" placeholder="Insérez votre matricule" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Insérez votre mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Se connecter</button>
            </form>
            <?php
            if (!empty($error_message)) {
                echo '<div class="alert alert-danger mt-3">' . $error_message . '</div>';
            }
            ?>
        </section>
    </main>

    <footer>
        <p>© 2024 Université - Tous droits réservés</p>
        <p>Contactez-nous : <a href="mailto:contact@universite.com">contact@universite.com</a></p>
    </footer>
</body>
</html>
