<?php
require_once 'Database.php';
require_once 'Demande.php';

$demande = new Demande();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_statut'])) {
    $iddoc = $_POST['iddoc'];
    $new_statut = $_POST['statut'];
    $message = $demande->updateStatut($iddoc, $new_statut);
}

$searchQuery = '';
$filterStatut = '';
$filterTypeDoc = '';
$orderBy = isset($_GET['order_by']) ? $_GET['order_by'] : 'iddoc';
$orderType = isset($_GET['order_type']) ? $_GET['order_type'] : 'ASC';

if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
}
if (isset($_GET['filter_statut'])) {
    $filterStatut = $_GET['filter_statut'];
}
if (isset($_GET['filter_type'])) {
    $filterTypeDoc = $_GET['filter_type'];
}

$demandes = $demande->rechercherDemandes($searchQuery, $filterStatut, $filterTypeDoc, $orderBy, $orderType);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Demandes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_admin.css">
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo" style="height: 80%; max-width: 200px; object-fit: contain;">
        <h1>Interface Administrateur</h1>
    </header>

    <main class="container my-4">
        <h2 class="mb-4">Liste des Demandes</h2>

        <?php if (!empty($message)): ?>
            <script>
                alert("<?= addslashes($message) ?>");
            </script>
        <?php endif; ?>

        <div class="mb-4">
            <form method="GET" action="" class="d-flex justify-content-center">
                <div class="input-group w-50">
                    <input type="text" name="search" class="form-control" placeholder="Entrez un mot-clé..." value="<?= htmlspecialchars($searchQuery) ?>">
                    <button type="submit" class="btn btn-outline-primary">Rechercher</button>
                </div>
            </form>
        </div>

        <div class="mb-4">
            <form method="GET" action="" class="d-flex justify-content-center">
                <div class="input-group w-75">
                    <select name="filter_type" class="form-select" aria-label="Filtrer par type de document">
                        <option value="">Par type de document</option>
                        <option value="Certificat de scolarité" <?= $filterTypeDoc == 'Certificat de scolarité' ? 'selected' : '' ?>>Certificat de scolarité</option>
                        <option value="Attestation d'inscription" <?= $filterTypeDoc == 'Attestation d`inscription' ? 'selected' : '' ?>>Attestation d'inscription</option>
                        <option value="Relevé de notes" <?= $filterTypeDoc == 'Relevé de notes' ? 'selected' : '' ?>>Relevé de notes</option>
                    </select>

                    <select name="filter_statut" class="form-select" aria-label="Filtrer par statut">
                        <option value="">Par statut</option>
                        <option value="en cours" <?= $filterStatut == 'en cours' ? 'selected' : '' ?>>En cours</option>
                        <option value="prêt à être retiré" <?= $filterStatut == 'prêt à être retiré' ? 'selected' : '' ?>>Prêt à être retiré</option>
                        <option value="rejeté" <?= $filterStatut == 'rejeté' ? 'selected' : '' ?>>Rejeté</option>
                    </select>

                    <button type="submit" class="btn btn-outline-primary">Filtrer</button>
                </div>
            </form>
        </div>

        <table class="table table-bordered" id="demandes-table">
            <thead>
                <tr>
                    <th><a href="?search=<?= urlencode($searchQuery) ?>&filter_statut=<?= urlencode($filterStatut) ?>&filter_type=<?= urlencode($filterTypeDoc) ?>&order_by=ide&order_type=<?= $orderBy == 'ide' && $orderType == 'ASC' ? 'DESC' : 'ASC' ?>">Matricule Étudiant</a></th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Type de Document</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($demandes) > 0): ?>
                    <?php foreach ($demandes as $demande): ?>
                        <tr>
                            <td><?= htmlspecialchars($demande['ide']) ?></td>
                            <td><?= htmlspecialchars($demande['nom']) ?></td>
                            <td><?= htmlspecialchars($demande['prenom']) ?></td>
                            <td><?= htmlspecialchars($demande['typedoc']) ?></td>
                            <td><?= htmlspecialchars($demande['statut']) ?></td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="iddoc" value="<?= htmlspecialchars($demande['iddoc']) ?>">
                                    <div class="input-group">
                                        <select name="statut" class="form-select">
                                            <option value="en cours" <?= $demande['statut'] == 'en cours' ? 'selected' : '' ?>>En cours</option>
                                            <option value="prêt à être retiré" <?= $demande['statut'] == 'prêt à être retiré' ? 'selected' : '' ?>>Prêt à être retiré</option>
                                            <option value="rejeté" <?= $demande['statut'] == 'rejeté' ? 'selected' : '' ?>>Rejeté</option>
                                        </select>
                                        <button type="submit" name="update_statut" class="btn btn-primary">Mettre à jour</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Aucune demande trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <footer>
    <p>© 2024 Université - Tous droits réservés</p>
    <p>Contactez-nous : <a>contact@universite.com</a></p>
    </footer>
</body>
</html>
