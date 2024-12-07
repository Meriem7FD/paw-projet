<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/24344f9aeb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="logine.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body>
    <header>
        <img src="logo.png" alt="">
    </header>

    <main>
        <section class="login">
            <h2>Portail Etudiant</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="mat">Matricule</label>
                    <input type="int" class="form-control" placeholder="inserez votre matricule" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="inserez votre mot de passe" required> 
                    <br>
                </div>
                <button type="submit" class="btn btn-success">Se connecter</button>
                <div class="signup">
                    <p>Vous n'avez pas encore de compte? <a href="signupE.php">Creez un</a></p>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <p>© 2024 Université - Tous droits réservés</p>
        <p>Contactez-nous : <a href="mailto:contact@universite.com">contact@universite.com</a></p>
    </footer>
    
</body>
</html>
