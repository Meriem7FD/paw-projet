<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/24344f9aeb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Portail Administrateur</title>
</head>
<body>
    <header>
        <i class="fa-solid fa-user"></i>
        <div class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
            <label for="search">Recherche</label>
            <input type="text" placeholder="Recherche..">
        </div>
        <form method="POST" action="logout.php">
            <button class="btn btn-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i>Déconnexion</button>
        </form>
    </header>

    <main>
        <div class="main-content">
            <h2 class="text-center">Gestion des Demandes</h2>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de Demande</th>
                        <th>Type de Document</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($demandes)): ?>
                        <?php foreach ($demandes as $demande): ?>
                            <tr>
                                <td><?= htmlspecialchars($demande['mate']) ?></td>
                                <td><?= htmlspecialchars($demande['nome']) ?></td>
                                <td><?= htmlspecialchars($demande['prenome']) ?></td>
                                <td><?= htmlspecialchars($demande['demandedate']) ?></td>
                                <td><?= htmlspecialchars($demande['typedoc']) ?></td>
                                <td><?= htmlspecialchars($demande['statut']) ?></td>
                                <td>
                                    <form method="POST" action="update_demande.php">
                                        <input type="hidden" name="iddoc" value="<?= htmlspecialchars($demande['iddoc']) ?>">
                                        <select name="statut" class="form-select form-select-sm">
                                            <option value="acceptée" <?= $demande['statut'] === 'acceptée' ? 'selected' : '' ?>>Acceptée</option>
                                            <option value="refusée" <?= $demande['statut'] === 'refusée' ? 'selected' : '' ?>>Refusée</option>
                                            <option value="en attente" <?= $demande['statut'] === 'en attente' ? 'selected' : '' ?>>En Attente</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Mettre à jour</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="text-center">Aucune demande trouvée</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <p>© 2024 Université - Tous droits réservés</p>
        <p>Contactez-nous : <a href="mailto:contact@universite.com">contact@universite.com</a></p>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>