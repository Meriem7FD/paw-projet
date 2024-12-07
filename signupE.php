<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signupE.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inscription</title>
    <link rel="icon" href="logo.png">
</head>
<body>
    <header>
        <img src="logo.png" alt="">
    </header>

    <main>
        <section class="signup">
            <h2>Portail Etudiant</h2>
            <h3>Sign Up</h3>
            <div class="input-box">
            <form action="signupE.php" method="post">
                <div class="form-group">
        <label for="matricule">Matricule :</label>
        <input type="text" id="matricule" name="matricule" placeholder="inserez votre matricule" required><br><br>
        </div>
        <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" placeholder="inserez votre nom" required name="off"><br><br>
        </div>
        <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom"  placeholder="inserez votre prenom" required name="off"><br><br>
        </div>
        <div class="form-group">
        <label for="annee">Année Universitaire :</label>
        <select id="annee" type="text" name="annee" placeholder="inserez votre année universitaire" required name="off">
        <option value="">Sélectionnez votre année universitaire</option>
        <option value="L1">L1</option>
        <option value="L2">L2</option>
        <option value="L3">L3</option>
        <option value="M1">M1</option>
        <option value="M2">M2</option>
    </select>
    </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <div class="password-container">
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required name="off">
                <span id="togglePassword" class="eye-icon">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
        </div>
        <button type="submit" value="  INSERT " style="margin-top: 15px;" name="sb" class="btn btn-success">S'inscrire</button>
                </div>
            </form>
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sb'])) {
                    include "SaveStudents.php";
                    $matricule = $_POST['matricule'];
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $annee = $_POST['annee'];
                    $motdepasse = $_POST['password'];
                    $db = new Database();
                    $conn = $db->connect();
                    $etudiant = new Etudiant($conn);
                    $result = $etudiant->inscrire($matricule, $nom, $prenom, $motdepasse, $annee);
                    echo "<p style='color: green;'>$result</p>";
                }
                ?>
          </div>
        </form>
        </section>
    </main>

    <footer>
        <p>© 2024 Université - Tous droits réservés</p>
        <p>Contactez-nous : <a href="mailto:contact@universite.com">contact@universite.com</a></p>
    </footer>
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/24344f9aeb.js" crossorigin="anonymous"></script>
</body>
</html>
