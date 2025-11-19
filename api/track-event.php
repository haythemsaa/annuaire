<?php
/**
 * API Tracking Interne
 * Enregistre les événements de tracking dans la base de données
 */

header('Content-Type: application/json');
require_once '../config/database.php';

// Vérifier que c'est bien une requête POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Récupérer les données JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON']);
    exit;
}

try {
    $db = getDBConnection();

    // Créer la table d'événements si elle n'existe pas
    $db->exec("CREATE TABLE IF NOT EXISTS analytics_events (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        category TEXT NOT NULL,
        action TEXT NOT NULL,
        label TEXT,
        page TEXT,
        referrer TEXT,
        ip_address TEXT,
        user_agent TEXT,
        session_id TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // Créer index pour les requêtes rapides
    $db->exec("CREATE INDEX IF NOT EXISTS idx_category_action ON analytics_events(category, action)");
    $db->exec("CREATE INDEX IF NOT EXISTS idx_created_at ON analytics_events(created_at)");

    // Générer ou récupérer session ID
    session_start();
    if (!isset($_SESSION['analytics_session_id'])) {
        $_SESSION['analytics_session_id'] = bin2hex(random_bytes(16));
    }
    $sessionId = $_SESSION['analytics_session_id'];

    // Insérer l'événement
    $stmt = $db->prepare("
        INSERT INTO analytics_events (category, action, label, page, referrer, ip_address, user_agent, session_id)
        VALUES (:category, :action, :label, :page, :referrer, :ip, :ua, :session_id)
    ");

    $stmt->bindValue(':category', $data['category'] ?? 'unknown', PDO::PARAM_STR);
    $stmt->bindValue(':action', $data['action'] ?? 'unknown', PDO::PARAM_STR);
    $stmt->bindValue(':label', $data['label'] ?? null, PDO::PARAM_STR);
    $stmt->bindValue(':page', $data['page'] ?? $_SERVER['HTTP_REFERER'] ?? null, PDO::PARAM_STR);
    $stmt->bindValue(':referrer', $data['referrer'] ?? null, PDO::PARAM_STR);
    $stmt->bindValue(':ip', $_SERVER['REMOTE_ADDR'] ?? 'unknown', PDO::PARAM_STR);
    $stmt->bindValue(':ua', $_SERVER['HTTP_USER_AGENT'] ?? 'unknown', PDO::PARAM_STR);
    $stmt->bindValue(':session_id', $sessionId, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'event_id' => $db->lastInsertId()]);
    } else {
        throw new Exception('Failed to insert event');
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Internal server error', 'message' => $e->getMessage()]);
}
?>
