<?php
/**
 * Configuration générale du site
 */

// Démarrer la session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configuration du site
define('SITE_NAME', 'Annuaire Déménagement');
define('SITE_URL', 'http://localhost:8000'); // À modifier selon votre environnement
define('SITE_EMAIL', 'info@annuaire-demenagement.be');
define('SITE_PHONE', '+32 2 123 45 67');

// Configuration des emails
define('SMTP_ENABLED', false); // Mettre à true pour utiliser SMTP
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', '');
define('SMTP_PASSWORD', '');
define('SMTP_ENCRYPTION', 'tls');

// Configuration du timezone
date_default_timezone_set('Europe/Brussels');

// Afficher les erreurs en développement (à désactiver en production)
define('DEBUG_MODE', true);
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Inclure la configuration de la base de données
require_once __DIR__ . '/database.php';

// Chemins
define('ROOT_PATH', dirname(__DIR__));
define('INCLUDES_PATH', ROOT_PATH . '/includes');
define('ASSETS_PATH', '/assets');

/**
 * Fonction pour sécuriser les sorties HTML
 */
function escape($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Fonction pour rediriger
 */
function redirect($url) {
    header('Location: ' . $url);
    exit;
}

/**
 * Fonction pour définir un message flash
 */
function setFlashMessage($message, $type = 'success') {
    $_SESSION['flash_message'] = $message;
    $_SESSION['flash_type'] = $type;
}

/**
 * Fonction pour récupérer et afficher un message flash
 */
function getFlashMessage() {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        $type = $_SESSION['flash_type'] ?? 'success';
        unset($_SESSION['flash_message']);
        unset($_SESSION['flash_type']);
        return ['message' => $message, 'type' => $type];
    }
    return null;
}

/**
 * Vérifier si l'utilisateur est connecté (admin)
 */
function isLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

/**
 * Requiert que l'utilisateur soit connecté
 */
function requireLogin() {
    if (!isLoggedIn()) {
        redirect('/admin/login.php');
    }
}
