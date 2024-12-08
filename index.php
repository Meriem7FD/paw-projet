<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/24344f9aeb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Page d'acceuil</title>
</head>
<body>
    <header>
        <nav>  
            <ul>
                <li><button>Etudiants</button></li>
                <li><button>Administrateurs</button></li>
                <li><button>Contact de l'universite</button></li>
            </ul>
        </nav>

        <div class="par">
            <h1>Bienvenue sur le portail universitaire</h1>
            <h5>LE LIEN ENTRE ETUDIANTS ET ADMINISTRATEURS</h5>
        </div>
    </header>

    <main>
        <section class="portails" >
            <div class="portail etudiant" id="etd">
                <img src="etd.jpg" alt="Portail Étudiant" id="portailEtudiant">
                <a href="javascript:void(0);" id="etudiant">Portail Étudiant</a>
            </div>

            <div class="portail admin" id="adm">
                <img src="adm.jpg" alt="Portail Administrateur" id="portailAdmin">
                <a href="javascript:void(0);" id="administrateur">Portail Administrateur</a>
            </div>
        </section>
    </main>
    
    <footer>
        <p>© 2024 Université - Tous droits réservés</p>
        <p>Contactez-nous : <a href="mailto:contact@universite.com">contact@universite.com</a></p>
    </footer>

<script>
    // Animation au chargement de la page
    window.addEventListener('load', function () {
        const portails = document.querySelectorAll('.portail');
        
        portails.forEach((portail, index) => {
            setTimeout(() => {
                portail.style.transition = 'opacity 1s, transform 1s';
                portail.style.opacity = '1';
                portail.style.transform = 'translateY(0)';
            }, index * 300); // Délais pour chaque portail
        });
    });

    // Animation de zoom au survol
    const portailsImages = document.querySelectorAll('.portail img');
    
    portailsImages.forEach(image => {
        image.addEventListener('mouseenter', function() {
            image.style.transition = 'transform 0.3s';
            image.style.transform = 'scale(1.05)';
        });

        image.addEventListener('mouseleave', function() {
            image.style.transform = 'scale(1)';
        });
    });

    // Redirection sur le clic des images
    document.getElementById("portailEtudiant").addEventListener("click", function() {
        window.location.href = "logine.php"; // Redirection vers logine.php
    });

    document.getElementById("portailAdmin").addEventListener("click", function() {
        window.location.href = "logina.php"; // Redirection vers logina.php
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
