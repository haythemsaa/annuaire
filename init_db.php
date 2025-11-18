<?php
/**
 * Script d'initialisation de la base de données
 * Exécutez ce fichier une seule fois pour créer la base de données et insérer les données d'exemple
 */

require_once __DIR__ . '/config/config.php';

echo "<h1>Initialisation de la base de données</h1>";
echo "<pre>";

try {
    // Créer le dossier data s'il n'existe pas
    $dataDir = __DIR__ . '/data';
    if (!is_dir($dataDir)) {
        mkdir($dataDir, 0755, true);
        echo "✓ Dossier 'data' créé\n";
    }

    // Supprimer l'ancienne base de données si elle existe
    $dbFile = $dataDir . '/annuaire.db';
    if (file_exists($dbFile)) {
        unlink($dbFile);
        echo "✓ Ancienne base de données supprimée\n";
    }

    // Initialiser la base de données
    echo "\nInitialisation de la base de données...\n";

    if (initializeDatabase()) {
        echo "✓ Base de données créée avec succès\n";
        echo "✓ Tables créées\n";
        echo "✓ Services insérés\n";
        echo "✓ Entreprises insérées (10 entreprises)\n";
        echo "✓ Services associés aux entreprises\n";
        echo "✓ Avis clients insérés\n";
        echo "✓ Utilisateur admin créé (username: admin, password: admin123)\n";

        echo "\n<strong style='color: green;'>✓ INITIALISATION TERMINÉE AVEC SUCCÈS !</strong>\n\n";

        echo "Vous pouvez maintenant :\n";
        echo "1. Accéder au site : <a href='/index.php'>index.php</a>\n";
        echo "2. Accéder à l'administration : <a href='/admin/'>admin/</a>\n";
        echo "   - Identifiant : admin\n";
        echo "   - Mot de passe : admin123\n";

        echo "\n<strong>IMPORTANT :</strong> Supprimez ce fichier (init_db.php) après l'initialisation pour des raisons de sécurité.\n";

    } else {
        echo "<strong style='color: red;'>✗ ERREUR lors de l'initialisation</strong>\n";
        echo "Vérifiez les permissions du dossier data/\n";
    }

} catch (Exception $e) {
    echo "<strong style='color: red;'>✗ ERREUR : " . $e->getMessage() . "</strong>\n";
    echo "Stack trace:\n";
    echo $e->getTraceAsString();
}

echo "</pre>";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initialisation de la base de données</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #f9fafb;
        }
        h1 {
            color: #1f2937;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 1rem;
        }
        pre {
            background-color: #1f2937;
            color: #f9fafb;
            padding: 1.5rem;
            border-radius: 0.5rem;
            line-height: 1.6;
        }
        a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
</body>
</html>
