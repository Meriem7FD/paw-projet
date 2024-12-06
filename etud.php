<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/24344f9aeb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="etud.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Portail Etudiant</title>
</head>
<body>
    <header>
        <div class="hleft">
        <i class="fa-solid fa-user"></i>
        </div>
        <div class="hcenter">
            <button>Effectuer une demande</button>
            <button>Voir l'etat des demandes</button>
        </div>
        <div class="hright">
            <form method="POST" action="logout.php">
                <button class="btn btn-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i>Déconnexion</button>
            </form>
        </div>
    </header>

    <main>
        <section class="portails">
            <div class="portail left">
                <h2>DEMANDE DE DOCUMENTS</h2>
                <p>Sur notre site internet, les étudiants ont la possibilité de faire des demandes de documents officiels en toute simplicité. 
                    Qu'il s'agisse d'attestations, de relevés de notes ou d'autres documents administratifs, il suffit de se connecter à l'espace 
                    étudiant, de remplir le formulaire dédié et de soumettre la demande. Notre plateforme garantit une prise en charge rapide et 
                    efficace pour répondre aux besoins des étudiants.</p>
            </div>
            <div class="portail center">
                <h2>SUIVI DES DEMANDES</h2>
                <p>Notre site internet permet aux étudiants de suivre l’état de leurs demandes de documents en temps réel. Après avoir soumis une 
                    demande, ils peuvent accéder à leur espace étudiant pour consulter le statut de traitement, qu’il s’agisse d’une demande en cours,
                     validée ou prête à être récupérée. Cette fonctionnalité assure transparence et efficacité, tout en facilitant la communication 
                     avec l’administration.</p>
            </div>
            <div class="portail right">
                <h2>PRISE DE CONTACT DIRECTE</h2>
                <p>Notre site internet offre aux étudiants une fonctionnalité pratique pour prendre contact directement avec l’université. Grâce à 
                    l’espace dédié, ils peuvent poser leurs questions, signaler des problèmes ou obtenir des informations supplémentaires concernant 
                    leurs demandes. Une équipe est à leur disposition pour répondre rapidement et leur fournir l’assistance nécessaire.</p>
            </div>

        </section>
    </main>

    <footer>
        <p>© 2024 Université - Tous droits réservés</p>
        <p>Contactez-nous : <a href="mailto:contact@universite.com">contact@universite.com</a></p>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
