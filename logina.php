<?php
// Inclure les fichiers nécessaires
require_once 'Database.php';
require_once 'Administrateur.php';

// Initialiser le message d'erreur
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $matricule = $_POST['matricule'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $db = new Database();
    $conn = $db->connect();

    // Vérifier les identifiants
    $admin = new Administrateur($conn);
    $result = $admin->verifierIdentifiants($matricule, $password);

    if ($result && password_verify($password, $result['motdepasse'])) {
        // Identifiants corrects, redirection vers admin.php
        header('Location: admin.php');
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
            <form action="logina.php" method="post">
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
