<?php
/**
 * API Newsletter - Confirmation
 * Confirme l'inscription à la newsletter via token
 */

require_once '../config/database.php';

$token = isset($_GET['token']) ? trim($_GET['token']) : '';

if (empty($token)) {
    header('Location: /?error=invalid_token');
    exit;
}

try {
    $db = getDBConnection();

    // Vérifier si le token existe
    $stmt = $db->prepare("SELECT id, email, confirmed FROM newsletter_subscribers WHERE token = :token");
    $stmt->bindValue(':token', $token, PDO::PARAM_STR);
    $stmt->execute();
    $subscriber = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$subscriber) {
        header('Location: /?error=token_not_found');
        exit;
    }

    if ($subscriber['confirmed'] == 1) {
        header('Location: /?info=already_confirmed');
        exit;
    }

    // Confirmer l'inscription
    $stmt = $db->prepare("
        UPDATE newsletter_subscribers
        SET confirmed = 1, confirmed_at = CURRENT_TIMESTAMP
        WHERE token = :token
    ");
    $stmt->bindValue(':token', $token, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // Envoyer email de bienvenue
        sendWelcomeEmail($subscriber['email']);

        // Redirection vers page de confirmation
        header('Location: /newsletter-merci.php');
        exit;
    } else {
        header('Location: /?error=confirmation_failed');
        exit;
    }

} catch (Exception $e) {
    header('Location: /?error=system_error');
    exit;
}

function sendWelcomeEmail($email) {
    $subject = "Bienvenue dans notre communauté !";

    $message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 30px; text-align: center; border-radius: 8px 8px 0 0; }
            .content { background: #f9fafb; padding: 30px; border-radius: 0 0 8px 8px; }
            .button { display: inline-block; background: #10b981; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; margin: 20px 0; }
            .tip-box { background: white; padding: 20px; border-left: 4px solid #10b981; margin: 20px 0; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>🎉 Inscription confirmée !</h1>
            </div>
            <div class='content'>
                <h2>Bienvenue dans la communauté !</h2>
                <p>Votre inscription à notre newsletter est confirmée. Vous allez recevoir nos meilleurs conseils pour réussir votre déménagement en Belgique !</p>

                <div class='tip-box'>
                    <h3 style='margin-top: 0;'>📬 À quoi vous attendre ?</h3>
                    <ul>
                        <li><strong>1 email par semaine</strong> avec nos meilleurs conseils</li>
                        <li><strong>Guides exclusifs</strong> réservés aux abonnés</li>
                        <li><strong>Offres spéciales</strong> de déménageurs partenaires (-10 à -20%)</li>
                        <li><strong>Checklists téléchargeables</strong> gratuitement</li>
                    </ul>
                </div>

                <h3>🎁 Votre cadeau de bienvenue</h3>
                <p>Pour bien commencer, voici nos 3 articles les plus populaires :</p>
                <ul>
                    <li><a href='https://" . $_SERVER['HTTP_HOST'] . "/blog/preparer-demenagement-3-mois-avance.php'>Comment préparer son déménagement 3 mois à l'avance</a></li>
                    <li><a href='https://" . $_SERVER['HTTP_HOST'] . "/blog/budget-realiste-demenagement-belgique.php'>Budget réaliste pour un déménagement en Belgique</a></li>
                    <li><a href='https://" . $_SERVER['HTTP_HOST'] . "/blog/emballage-objets-fragiles.php'>Emballer vos objets fragiles comme un pro</a></li>
                </ul>

                <p style='text-align: center; margin-top: 30px;'>
                    <a href='https://" . $_SERVER['HTTP_HOST'] . "/blog.php' class='button'>Découvrir le blog complet</a>
                </p>

                <p style='margin-top: 30px; font-size: 14px; color: #6b7280;'>
                    Vous pouvez vous désinscrire à tout moment en cliquant sur le lien en bas de nos emails.
                </p>
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
?>
