<?php
/**
 * API Newsletter - Inscription
 * Gère les inscriptions à la newsletter avec double opt-in
 */

header('Content-Type: application/json');
require_once '../config/database.php';

// Fonction pour valider l'email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Fonction pour générer un token de confirmation
function generateToken() {
    return bin2hex(random_bytes(32));
}

// Fonction pour envoyer l'email de confirmation
function sendConfirmationEmail($email, $token) {
    $confirmUrl = "https://" . $_SERVER['HTTP_HOST'] . "/api/newsletter-confirm.php?token=" . $token;

    $subject = "Confirmez votre inscription à notre newsletter";

    $message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center; border-radius: 8px 8px 0 0; }
            .content { background: #f9fafb; padding: 30px; border-radius: 0 0 8px 8px; }
            .button { display: inline-block; background: #667eea; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; margin: 20px 0; }
            .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #6b7280; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Bienvenue !</h1>
            </div>
            <div class='content'>
                <h2>Confirmez votre inscription</h2>
                <p>Merci de votre intérêt pour notre newsletter sur le déménagement en Belgique !</p>
                <p>Pour finaliser votre inscription et recevoir nos conseils exclusifs, cliquez sur le bouton ci-dessous :</p>
                <p style='text-align: center;'>
                    <a href='$confirmUrl' class='button'>Confirmer mon inscription</a>
                </p>
                <p style='font-size: 14px; color: #6b7280;'>
                    Si le bouton ne fonctionne pas, copiez ce lien dans votre navigateur :<br>
                    <a href='$confirmUrl'>$confirmUrl</a>
                </p>
                <p style='margin-top: 30px; font-size: 14px;'>
                    <strong>Ce que vous recevrez :</strong><br>
                    ✓ Conseils pratiques pour votre déménagement<br>
                    ✓ Comparatifs de prix et astuces d'économie<br>
                    ✓ Checklists et guides téléchargeables<br>
                    ✓ Offres exclusives de nos partenaires déménageurs
                </p>
            </div>
            <div class='footer'>
                <p>Vous recevez cet email car vous vous êtes inscrit sur " . SITE_NAME . "</p>
                <p>Si vous n'êtes pas à l'origine de cette demande, ignorez simplement cet email.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: " . SITE_NAME . " <noreply@" . $_SERVER['HTTP_HOST'] . ">" . "\r\n";

    return mail($email, $subject, $message, $headers);
}

// Traitement de la requête
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération et nettoyage des données
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $source = isset($_POST['source']) ? trim($_POST['source']) : 'blog'; // D'où vient l'inscription

    // Validation
    if (empty($email)) {
        echo json_encode([
            'success' => false,
            'message' => 'Veuillez fournir une adresse email.'
        ]);
        exit;
    }

    if (!isValidEmail($email)) {
        echo json_encode([
            'success' => false,
            'message' => 'Adresse email invalide.'
        ]);
        exit;
    }

    try {
        $db = getDBConnection();

        // Créer la table si elle n'existe pas
        $db->exec("CREATE TABLE IF NOT EXISTS newsletter_subscribers (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT UNIQUE NOT NULL,
            token TEXT UNIQUE NOT NULL,
            confirmed INTEGER DEFAULT 0,
            source TEXT,
            subscribed_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            confirmed_at DATETIME,
            ip_address TEXT,
            user_agent TEXT
        )");

        // Vérifier si l'email existe déjà
        $stmt = $db->prepare("SELECT id, confirmed FROM newsletter_subscribers WHERE email = :email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            if ($existing['confirmed'] == 1) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Cette adresse email est déjà inscrite à notre newsletter.'
                ]);
                exit;
            } else {
                // Renvoi du mail de confirmation
                $stmt = $db->prepare("SELECT token FROM newsletter_subscribers WHERE email = :email");
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                sendConfirmationEmail($email, $data['token']);

                echo json_encode([
                    'success' => true,
                    'message' => 'Un email de confirmation vous a été renvoyé. Vérifiez votre boîte de réception.'
                ]);
                exit;
            }
        }

        // Générer token de confirmation
        $token = generateToken();

        // Insérer le nouvel abonné
        $stmt = $db->prepare("
            INSERT INTO newsletter_subscribers (email, token, source, ip_address, user_agent)
            VALUES (:email, :token, :source, :ip, :ua)
        ");

        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':token', $token, PDO::PARAM_STR);
        $stmt->bindValue(':source', $source, PDO::PARAM_STR);
        $stmt->bindValue(':ip', $_SERVER['REMOTE_ADDR'] ?? 'unknown', PDO::PARAM_STR);
        $stmt->bindValue(':ua', $_SERVER['HTTP_USER_AGENT'] ?? 'unknown', PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Envoyer l'email de confirmation
            if (sendConfirmationEmail($email, $token)) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Merci ! Un email de confirmation vous a été envoyé. Vérifiez votre boîte de réception (et vos spams).'
                ]);
            } else {
                echo json_encode([
                    'success' => true,
                    'message' => 'Inscription réussie ! (Note: l\'envoi d\'email n\'est pas configuré sur ce serveur)'
                ]);
            }
        } else {
            throw new Exception('Erreur lors de l\'inscription');
        }

    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
            'error' => $e->getMessage()
        ]);
    }

} else {
    echo json_encode([
        'success' => false,
        'message' => 'Méthode non autorisée'
    ]);
}
?>
