<?php
/**
 * Configuration de la base de données
 */

// Configuration pour SQLite (plus simple, pas besoin de serveur MySQL)
define('DB_TYPE', 'sqlite');
define('DB_PATH', __DIR__ . '/../data/annuaire.db');

// Alternative: Configuration pour MySQL (décommenter si vous utilisez MySQL)
/*
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'annuaire');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');
*/

/**
 * Établit la connexion à la base de données
 * @return PDO
 */
function getDatabase() {
    static $pdo = null;

    if ($pdo === null) {
        try {
            if (DB_TYPE === 'sqlite') {
                // Créer le dossier data s'il n'existe pas
                $dataDir = dirname(DB_PATH);
                if (!is_dir($dataDir)) {
                    mkdir($dataDir, 0755, true);
                }

                $pdo = new PDO('sqlite:' . DB_PATH);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                // Activer les foreign keys pour SQLite
                $pdo->exec('PRAGMA foreign_keys = ON;');
            } else {
                // MySQL
                $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
            }
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données: ' . $e->getMessage());
        }
    }

    return $pdo;
}

/**
 * Initialise la base de données avec le schéma SQL
 * @return bool
 */
function initializeDatabase() {
    try {
        $pdo = getDatabase();
        $sql = file_get_contents(__DIR__ . '/../database.sql');

        // Exécuter le script SQL
        $pdo->exec($sql);

        return true;
    } catch (PDOException $e) {
        error_log('Erreur lors de l\'initialisation de la base de données: ' . $e->getMessage());
        return false;
    }
}
