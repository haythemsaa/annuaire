<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'contact';
$pageTitle = 'Contact';
$pageDescription = 'Contactez-nous pour toute question. Notre équipe est à votre disposition.';

$formSubmitted = false;
$errors = [];

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation
    if (empty($_POST['name'])) {
        $errors[] = "Le nom est obligatoire.";
    }
    if (empty($_POST['email'])) {
        $errors[] = "L'email est obligatoire.";
    } elseif (!isValidEmail($_POST['email'])) {
        $errors[] = "L'adresse email n'est pas valide.";
    }
    if (empty($_POST['subject'])) {
        $errors[] = "Le sujet est obligatoire.";
    }
    if (empty($_POST['message'])) {
        $errors[] = "Le message est obligatoire.";
    } elseif (strlen($_POST['message']) < 10) {
        $errors[] = "Le message doit contenir au moins 10 caractères.";
    }

    // Si pas d'erreurs, enregistrer
    if (empty($errors)) {
        if (saveContactMessage($_POST)) {
            // Envoyer un email de notification à l'admin
            $subject = "Nouveau message de contact - " . SITE_NAME;
            $message = "<h2>Nouveau message de contact</h2>";
            $message .= "<p><strong>De:</strong> " . escape($_POST['name']) . " (" . escape($_POST['email']) . ")</p>";
            $message .= "<p><strong>Sujet:</strong> " . escape($_POST['subject']) . "</p>";
            $message .= "<p><strong>Message:</strong><br>" . nl2br(escape($_POST['message'])) . "</p>";
            sendEmail(SITE_EMAIL, $subject, $message);

            $formSubmitted = true;
            setFlashMessage('Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.', 'success');
        } else {
            $errors[] = "Une erreur est survenue lors de l'envoi de votre message.";
        }
    }
}

include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h2>Contactez-nous</h2>
            <p>Notre équipe est à votre disposition pour répondre à toutes vos questions</p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="form-section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; max-width: 1200px; margin: 0 auto;">
            <!-- Contact Form -->
            <div class="form-container" style="margin: 0;">
                <?php if ($formSubmitted): ?>
                    <div style="text-align: center; padding: 2rem; background-color: #d1fae5; border-radius: 0.5rem;">
                        <i class="fas fa-check-circle" style="font-size: 3rem; color: #10b981; margin-bottom: 1rem;"></i>
                        <h3 style="color: #065f46; margin-bottom: 0.5rem;">Message envoyé !</h3>
                        <p style="color: #047857;">Nous vous répondrons dans les plus brefs délais.</p>
                        <a href="/index.php" class="btn btn-primary" style="margin-top: 1rem;">Retour à l'accueil</a>
                    </div>
                <?php else: ?>
                    <h2 style="margin-bottom: 1.5rem;">Envoyez-nous un message</h2>

                    <?php if (!empty($errors)): ?>
                        <div style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                            <ul style="margin: 0; padding-left: 1.5rem;">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo escape($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="/contact.php">
                        <div class="form-group">
                            <label for="name">Nom complet *</label>
                            <input type="text" id="name" name="name" value="<?php echo escape($_POST['name'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" value="<?php echo escape($_POST['email'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo escape($_POST['phone'] ?? ''); ?>">
                        </div>

                        <div class="form-group">
                            <label for="subject">Sujet *</label>
                            <select id="subject" name="subject" required>
                                <option value="">Sélectionnez un sujet</option>
                                <option value="devis" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'devis') ? 'selected' : ''; ?>>Question sur un devis</option>
                                <option value="entreprise" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'entreprise') ? 'selected' : ''; ?>>Ajouter mon entreprise</option>
                                <option value="partenariat" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'partenariat') ? 'selected' : ''; ?>>Proposition de partenariat</option>
                                <option value="reclamation" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'reclamation') ? 'selected' : ''; ?>>Réclamation</option>
                                <option value="autre" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'autre') ? 'selected' : ''; ?>>Autre</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" required><?php echo escape($_POST['message'] ?? ''); ?></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-full">
                                <i class="fas fa-paper-plane"></i> Envoyer le message
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>

            <!-- Contact Info -->
            <div>
                <div style="background-color: #f9fafb; padding: 2rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                    <h3 style="margin-bottom: 1.5rem; color: #1f2937;">Nos coordonnées</h3>
                    <div style="margin-bottom: 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                            <i class="fas fa-phone" style="color: #2563eb; font-size: 1.5rem;"></i>
                            <div>
                                <strong style="display: block; color: #1f2937;">Téléphone</strong>
                                <a href="tel:<?php echo str_replace(' ', '', SITE_PHONE); ?>" style="color: #6b7280; text-decoration: none;"><?php echo SITE_PHONE; ?></a>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                            <i class="fas fa-envelope" style="color: #2563eb; font-size: 1.5rem;"></i>
                            <div>
                                <strong style="display: block; color: #1f2937;">Email</strong>
                                <a href="mailto:<?php echo SITE_EMAIL; ?>" style="color: #6b7280; text-decoration: none;"><?php echo SITE_EMAIL; ?></a>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <i class="fas fa-map-marker-alt" style="color: #2563eb; font-size: 1.5rem;"></i>
                            <div>
                                <strong style="display: block; color: #1f2937;">Adresse</strong>
                                <span style="color: #6b7280;">Rue de la Loi 123<br>1000 Bruxelles, Belgique</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="background-color: #f9fafb; padding: 2rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                    <h3 style="margin-bottom: 1.5rem; color: #1f2937;">Horaires d'ouverture</h3>
                    <div style="color: #6b7280;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <span>Lundi - Vendredi:</span>
                            <strong>8h00 - 18h00</strong>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <span>Samedi:</span>
                            <strong>9h00 - 14h00</strong>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span>Dimanche:</span>
                            <strong>Fermé</strong>
                        </div>
                    </div>
                </div>

                <div style="background-color: #eff6ff; padding: 2rem; border-radius: 0.5rem; border: 2px solid #2563eb;">
                    <h3 style="margin-bottom: 1rem; color: #1e40af;">Vous êtes une entreprise ?</h3>
                    <p style="color: #1f2937; margin-bottom: 1.5rem;">Rejoignez notre annuaire et augmentez votre visibilité !</p>
                    <a href="mailto:partenariat@annuaire-demenagement.be" class="btn btn-primary" style="display: inline-block;">
                        <i class="fas fa-handshake"></i> Devenir partenaire
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="info-section">
    <div class="container">
        <h2 class="section-title">Questions fréquentes</h2>
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3 style="color: #2563eb; margin-bottom: 0.5rem;">Comment fonctionne le service ?</h3>
                <p style="color: #6b7280;">Vous remplissez une demande de devis en décrivant votre projet de déménagement. Nous transmettons votre demande aux entreprises partenaires qui correspondent à vos besoins. Vous recevez jusqu'à 5 devis gratuits et sans engagement.</p>
            </div>
            <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3 style="color: #2563eb; margin-bottom: 0.5rem;">Le service est-il vraiment gratuit ?</h3>
                <p style="color: #6b7280;">Oui, notre service est 100% gratuit pour les particuliers et les entreprises qui recherchent un déménageur. Vous ne payez rien pour recevoir vos devis.</p>
            </div>
            <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3 style="color: #2563eb; margin-bottom: 0.5rem;">Combien de temps pour recevoir les devis ?</h3>
                <p style="color: #6b7280;">En général, vous commencez à recevoir vos premiers devis dans les 24 heures suivant votre demande. Les entreprises vous contactent directement par email ou téléphone.</p>
            </div>
            <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3 style="color: #2563eb; margin-bottom: 0.5rem;">Les entreprises sont-elles vérifiées ?</h3>
                <p style="color: #6b7280;">Oui, toutes nos entreprises partenaires sont vérifiées et possèdent les assurances et certifications nécessaires pour exercer leur activité.</p>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
