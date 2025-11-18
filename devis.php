<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'devis';
$pageTitle = 'Demander un devis';
$pageDescription = 'Recevez jusqu\'à 5 devis personnalisés gratuits pour votre déménagement.';

$formSubmitted = false;
$errors = [];

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation
    $required = ['typeMove', 'fromAddress', 'toAddress', 'rooms', 'moveDate', 'firstName', 'lastName', 'email', 'phone'];

    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "Le champ est obligatoire.";
        }
    }

    // Validation de l'email
    if (!empty($_POST['email']) && !isValidEmail($_POST['email'])) {
        $errors[] = "L'adresse email n'est pas valide.";
    }

    // Validation du téléphone
    if (!empty($_POST['phone']) && !isValidPhone($_POST['phone'])) {
        $errors[] = "Le numéro de téléphone n'est pas valide.";
    }

    // Si pas d'erreurs, enregistrer et envoyer les emails
    if (empty($errors)) {
        if (saveQuoteRequest($_POST)) {
            // Envoyer les emails de notification
            sendQuoteNotification($_POST);
            sendQuoteConfirmation($_POST);

            $formSubmitted = true;
            setFlashMessage('Votre demande de devis a été envoyée avec succès ! Vous recevrez vos devis par email dans les prochaines 24h.', 'success');
        } else {
            $errors[] = "Une erreur est survenue lors de l'enregistrement de votre demande.";
        }
    }
}

include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h2>Demandez votre devis gratuit</h2>
            <p>Recevez jusqu'à 5 devis personnalisés en quelques minutes</p>
        </div>
    </div>
</section>

<!-- Form Section -->
<section class="form-section">
    <div class="container">
        <div class="form-container">
            <?php if ($formSubmitted): ?>
                <div style="text-align: center; padding: 2rem; background-color: #d1fae5; border-radius: 0.5rem;">
                    <i class="fas fa-check-circle" style="font-size: 3rem; color: #10b981; margin-bottom: 1rem;"></i>
                    <h3 style="color: #065f46; margin-bottom: 0.5rem;">Demande envoyée avec succès !</h3>
                    <p style="color: #047857;">Vous recevrez vos devis par email dans les prochaines 24h.</p>
                    <a href="/index.php" class="btn btn-primary" style="margin-top: 1rem;">Retour à l'accueil</a>
                </div>
            <?php else: ?>
                <h2 class="section-title">Détails de votre déménagement</h2>

                <?php if (!empty($errors)): ?>
                    <div style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                        <ul style="margin: 0; padding-left: 1.5rem;">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo escape($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="/devis.php">
                    <!-- Type de déménagement -->
                    <div class="form-group">
                        <label for="typeMove">Type de déménagement *</label>
                        <select id="typeMove" name="typeMove" required>
                            <option value="">Sélectionnez le type</option>
                            <option value="residential" <?php echo (isset($_POST['typeMove']) && $_POST['typeMove'] === 'residential') ? 'selected' : ''; ?>>Résidentiel</option>
                            <option value="commercial" <?php echo (isset($_POST['typeMove']) && $_POST['typeMove'] === 'commercial') ? 'selected' : ''; ?>>Professionnel / Commercial</option>
                            <option value="office" <?php echo (isset($_POST['typeMove']) && $_POST['typeMove'] === 'office') ? 'selected' : ''; ?>>Bureau</option>
                        </select>
                    </div>

                    <!-- Adresses -->
                    <h3 style="margin-top: 2rem; margin-bottom: 1rem;">Adresses</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fromAddress">Adresse de départ *</label>
                            <input type="text" id="fromAddress" name="fromAddress" placeholder="Rue, numéro, code postal, ville" value="<?php echo escape($_POST['fromAddress'] ?? ''); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="toAddress">Adresse d'arrivée *</label>
                            <input type="text" id="toAddress" name="toAddress" placeholder="Rue, numéro, code postal, ville" value="<?php echo escape($_POST['toAddress'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="fromFloor">Étage de départ</label>
                            <select id="fromFloor" name="fromFloor">
                                <option value="0">Rez-de-chaussée</option>
                                <option value="1">1er étage</option>
                                <option value="2">2ème étage</option>
                                <option value="3">3ème étage</option>
                                <option value="4">4ème étage et plus</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="toFloor">Étage d'arrivée</label>
                            <select id="toFloor" name="toFloor">
                                <option value="0">Rez-de-chaussée</option>
                                <option value="1">1er étage</option>
                                <option value="2">2ème étage</option>
                                <option value="3">3ème étage</option>
                                <option value="4">4ème étage et plus</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>
                                <input type="checkbox" id="fromElevator" name="fromElevator" <?php echo isset($_POST['fromElevator']) ? 'checked' : ''; ?>>
                                Ascenseur disponible au départ
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" id="toElevator" name="toElevator" <?php echo isset($_POST['toElevator']) ? 'checked' : ''; ?>>
                                Ascenseur disponible à l'arrivée
                            </label>
                        </div>
                    </div>

                    <!-- Taille du logement -->
                    <h3 style="margin-top: 2rem; margin-bottom: 1rem;">Taille du logement</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="rooms">Nombre de pièces *</label>
                            <select id="rooms" name="rooms" required>
                                <option value="">Sélectionnez</option>
                                <option value="studio" <?php echo (isset($_POST['rooms']) && $_POST['rooms'] === 'studio') ? 'selected' : ''; ?>>Studio</option>
                                <option value="1" <?php echo (isset($_POST['rooms']) && $_POST['rooms'] === '1') ? 'selected' : ''; ?>>1 chambre</option>
                                <option value="2" <?php echo (isset($_POST['rooms']) && $_POST['rooms'] === '2') ? 'selected' : ''; ?>>2 chambres</option>
                                <option value="3" <?php echo (isset($_POST['rooms']) && $_POST['rooms'] === '3') ? 'selected' : ''; ?>>3 chambres</option>
                                <option value="4" <?php echo (isset($_POST['rooms']) && $_POST['rooms'] === '4') ? 'selected' : ''; ?>>4 chambres</option>
                                <option value="5+" <?php echo (isset($_POST['rooms']) && $_POST['rooms'] === '5+') ? 'selected' : ''; ?>>5 chambres ou plus</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="surface">Surface approximative (m²)</label>
                            <input type="number" id="surface" name="surface" placeholder="Ex: 80" value="<?php echo escape($_POST['surface'] ?? ''); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="volume">Volume estimé (m³)</label>
                        <input type="number" id="volume" name="volume" placeholder="Si vous connaissez le volume" value="<?php echo escape($_POST['volume'] ?? ''); ?>">
                    </div>

                    <!-- Services supplémentaires -->
                    <h3 style="margin-top: 2rem; margin-bottom: 1rem;">Services supplémentaires</h3>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" id="servicePacking" name="servicePacking" <?php echo isset($_POST['servicePacking']) ? 'checked' : ''; ?>>
                            Emballage / Déballage
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" id="serviceAssembly" name="serviceAssembly" <?php echo isset($_POST['serviceAssembly']) ? 'checked' : ''; ?>>
                            Montage / Démontage de meubles
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" id="serviceLift" name="serviceLift" <?php echo isset($_POST['serviceLift']) ? 'checked' : ''; ?>>
                            Location de lift (monte-meubles)
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" id="serviceStorage" name="serviceStorage" <?php echo isset($_POST['serviceStorage']) ? 'checked' : ''; ?>>
                            Stockage temporaire
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" id="serviceCleaning" name="serviceCleaning" <?php echo isset($_POST['serviceCleaning']) ? 'checked' : ''; ?>>
                            Nettoyage de fin de bail
                        </label>
                    </div>

                    <!-- Date souhaitée -->
                    <h3 style="margin-top: 2rem; margin-bottom: 1rem;">Date du déménagement</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="moveDate">Date souhaitée *</label>
                            <input type="date" id="moveDate" name="moveDate" min="<?php echo date('Y-m-d'); ?>" value="<?php echo escape($_POST['moveDate'] ?? ''); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="flexibility">Flexibilité</label>
                            <select id="flexibility" name="flexibility">
                                <option value="fixed" <?php echo (isset($_POST['flexibility']) && $_POST['flexibility'] === 'fixed') ? 'selected' : ''; ?>>Date fixe</option>
                                <option value="week" <?php echo (isset($_POST['flexibility']) && $_POST['flexibility'] === 'week') ? 'selected' : ''; ?>>Flexible (±1 semaine)</option>
                                <option value="month" <?php echo (isset($_POST['flexibility']) && $_POST['flexibility'] === 'month') ? 'selected' : ''; ?>>Flexible (±1 mois)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Informations de contact -->
                    <h3 style="margin-top: 2rem; margin-bottom: 1rem;">Vos coordonnées</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">Prénom *</label>
                            <input type="text" id="firstName" name="firstName" value="<?php echo escape($_POST['firstName'] ?? ''); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Nom *</label>
                            <input type="text" id="lastName" name="lastName" value="<?php echo escape($_POST['lastName'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" value="<?php echo escape($_POST['email'] ?? ''); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone *</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo escape($_POST['phone'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <!-- Message additionnel -->
                    <div class="form-group">
                        <label for="message">Informations complémentaires</label>
                        <textarea id="message" name="message" placeholder="Décrivez tout détail important : objets fragiles, piano, œuvres d'art, parking difficile, etc."><?php echo escape($_POST['message'] ?? ''); ?></textarea>
                    </div>

                    <!-- Submit -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-full">
                            <i class="fas fa-paper-plane"></i> Envoyer ma demande de devis
                        </button>
                    </div>

                    <p style="text-align: center; color: #6b7280; margin-top: 1rem; font-size: 0.875rem;">
                        * Champs obligatoires. Vos informations sont confidentielles et ne seront jamais partagées.
                    </p>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Info Section -->
<section class="info-section">
    <div class="container">
        <h2 class="section-title">Comment ça marche ?</h2>
        <div class="info-grid">
            <div class="info-card">
                <i class="fas fa-edit"></i>
                <h3>1. Remplissez le formulaire</h3>
                <p>Décrivez votre projet de déménagement en quelques minutes</p>
            </div>
            <div class="info-card">
                <i class="fas fa-search"></i>
                <h3>2. Nous trouvons les pros</h3>
                <p>Nous sélectionnons les meilleurs déménageurs pour votre besoin</p>
            </div>
            <div class="info-card">
                <i class="fas fa-envelope"></i>
                <h3>3. Recevez vos devis</h3>
                <p>Jusqu'à 5 devis gratuits et sans engagement</p>
            </div>
            <div class="info-card">
                <i class="fas fa-handshake"></i>
                <h3>4. Choisissez le meilleur</h3>
                <p>Comparez et choisissez l'offre qui vous convient</p>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
