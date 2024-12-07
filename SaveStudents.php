<?php
require_once "DataBase.php";

class Etudiant extends Database {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function inscrire($matricule, $nom, $prenom, $motdepasse, $annee) {
        // Vérification des champs vides
        if (empty($matricule) || empty($nom) || empty($prenom) || empty($motdepasse) || empty($annee)) {
            return "Tous les champs sont obligatoires.";
        }

        // Hashage du mot de passe
        $hashedPassword = password_hash($motdepasse, PASSWORD_BCRYPT);

        // Requête d'insertion
        $sql = "INSERT INTO etudiant (ide, nom, prenom, motdepasse, annee) VALUES (:ide, :nom, :prenom, :motdepasse, :annee)";
        $stmt = $this->conn->prepare($sql);

        try {
            // Exécution de l'insertion dans la base de données
            $stmt->execute([
                ':ide' => $matricule, // Le champ `ide` correspond au `matricule`
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':motdepasse' => $hashedPassword,
                ':annee' => $annee,
            ]);
        
            // Affichage de la popup de confirmation
            echo "<script>
                    var isConfirmed = confirm('Êtes-vous sûr de vouloir confirmer votre inscription ?');
                    if (isConfirmed) {
                        alert('Inscription réussie !');
                        window.location.href = 'logine.php';  // Redirige vers la page de login après confirmation
                    } else {
                        alert('Inscription annulée.');
                        window.location.href = 'signupE.php';  // Redirige vers la page d'inscription si l'utilisateur annule
                    }
                  </script>";
            exit; // S'assure que le script PHP s'arrête après la redirection
        
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Conflit de clé primaire (matricule déjà existant)
                // Affichage de la popup de confirmation
                echo "<script>
                        var isConfirmed = confirm('Un étudiant avec ce matricule existe déjà. Voulez-vous essayer à nouveau ?');
                        if (isConfirmed) {
                            alert('Essayez un autre matricule.');
                            window.location.href = 'signupE.php';  // Redirige vers la page d'inscription pour essayer avec un autre matricule
                        } else {
                            alert('Inscription annulée.');
                            window.location.href = 'logine.php';  // Redirige vers la page de login si l'utilisateur annule
                        }
                      </script>";
                exit; // S'assure que le script PHP s'arrête après la redirection
            } else {
                // Affichage de la popup d'erreur générique
                echo "<script>
                        var isConfirmed = confirm('Erreur lors de l\'inscription : " . $e->getMessage() . ". Voulez-vous réessayer ?');
                        if (isConfirmed) {
                            alert('Réessayez.');
                            window.location.href = 'signupE.php';  // Redirige vers la page d'inscription pour réessayer
                        } else {
                            alert('Inscription annulée.');
                            window.location.href = 'logine.php';  // Redirige vers la page de login si l'utilisateur annule
                        }
                      </script>";
                exit; // S'assure que le script PHP s'arrête après la redirection
            }
        }
        
    }
}

// Gestion de l'inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $annee = $_POST['annee'];
    $motdepasse = $_POST['password'];

    // Initialisation de la base de données et de l'objet étudiant
    $db = new Database();
    $conn = $db->connect();
    $etudiant = new Etudiant($conn);

    // Appeler la méthode pour inscrire l'étudiant
    $message = $etudiant->inscrire($matricule, $nom, $prenom, $motdepasse, $annee);

    // Afficher le message
    echo "<p>$message</p>";
}
?>
