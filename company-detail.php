<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

// Récupérer l'ID de l'entreprise
$companyId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($companyId <= 0) {
    header('Location: /index.php');
    exit;
}

// Récupérer les informations de l'entreprise
$company = getCompanyById($companyId);

if (!$company) {
    header('Location: /index.php');
    exit;
}

$currentPage = 'company-detail';
$pageTitle = $company['name'];
$pageDescription = $company['description'];

include __DIR__ . '/includes/header.php';
?>

<!-- Company Detail Header -->
<div class="company-detail-header">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: start; flex-wrap: wrap; gap: 2rem;">
            <div>
                <h1 style="font-size: 2.5rem; margin-bottom: 1rem; color: #1f2937;"><?php echo escape($company['name']); ?></h1>
                <div style="display: flex; gap: 2rem; margin-bottom: 1rem; flex-wrap: wrap;">
                    <div class="company-rating">
                        <span class="stars"><?php echo generateStars($company['rating']); ?></span>
                        <span class="rating-number">(<?php echo $company['rating']; ?>/5 - <?php echo $company['reviews']; ?> avis)</span>
                    </div>
                    <div class="company-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo escape($company['location']); ?></span>
                    </div>
                    <?php if ($company['verified']): ?>
                        <div class="company-verified">
                            <i class="fas fa-check-circle"></i>
                            <span>Entreprise vérifiée</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <a href="/devis.php" class="btn btn-primary btn-large">
                    <i class="fas fa-file-invoice"></i> Demander un devis
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Company Detail Content -->
<section class="company-detail">
    <div class="container">
        <div class="company-detail-content">
            <!-- Main Content -->
            <div class="company-info">
                <!-- À propos -->
                <section>
                    <h2>À propos</h2>
                    <p><?php echo escape($company['description']); ?></p>
                </section>

                <!-- Services -->
                <section>
                    <h2>Nos services</h2>
                    <div class="company-services">
                        <?php foreach ($company['services'] as $service): ?>
                            <span class="service-tag" style="font-size: 1rem; padding: 0.5rem 1rem;">
                                <i class="fas <?php echo escape($service['icon']); ?>"></i>
                                <?php echo escape($service['name']); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </section>

                <!-- Zones d'intervention -->
                <section>
                    <h2>Zones d'intervention</h2>
                    <p><?php echo escape($company['zones']); ?></p>
                </section>

                <!-- Prix et tarifs -->
                <section>
                    <h2>Tarifs indicatifs</h2>
                    <div class="price-grid">
                        <div class="price-card">
                            <h3>Studio / 1 chambre</h3>
                            <p class="price">À partir de 450€</p>
                            <ul>
                                <li>Volume jusqu'à 20m³</li>
                                <li>2 déménageurs</li>
                                <li>Camion inclus</li>
                                <li>Transport jusqu'à 50km</li>
                            </ul>
                        </div>
                        <div class="price-card">
                            <h3>2-3 chambres</h3>
                            <p class="price">À partir de 900€</p>
                            <ul>
                                <li>Volume 30-50m³</li>
                                <li>3 déménageurs</li>
                                <li>Grand camion</li>
                                <li>Transport jusqu'à 50km</li>
                            </ul>
                        </div>
                        <div class="price-card">
                            <h3>4+ chambres</h3>
                            <p class="price">À partir de 2200€</p>
                            <ul>
                                <li>Volume 60m³+</li>
                                <li>4+ déménageurs</li>
                                <li>Plusieurs véhicules</li>
                                <li>Transport longue distance</li>
                            </ul>
                        </div>
                    </div>
                    <p style="color: #6b7280; font-size: 0.875rem; margin-top: 1rem;">
                        <i class="fas fa-info-circle"></i> Les prix sont indicatifs et peuvent varier selon les spécificités de votre projet.
                        Demandez un devis personnalisé pour obtenir un tarif précis.
                    </p>
                </section>

                <!-- Avis clients -->
                <?php if (!empty($company['reviews'])): ?>
                <section>
                    <h2>Avis clients</h2>
                    <div>
                        <?php foreach ($company['reviews'] as $review): ?>
                            <div style="background-color: #f9fafb; padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                    <strong><?php echo escape($review['customer_name']); ?></strong>
                                    <span class="stars" style="color: #f59e0b;"><?php echo generateStars($review['rating']); ?></span>
                                </div>
                                <p style="color: #6b7280; margin-bottom: 0.5rem;"><?php echo escape($review['comment']); ?></p>
                                <span style="color: #9ca3af; font-size: 0.875rem;"><?php echo timeAgo($review['created_at']); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
                <?php endif; ?>

                <!-- Garanties -->
                <section>
                    <h2>Nos garanties</h2>
                    <div class="info-grid" style="grid-template-columns: repeat(2, 1fr);">
                        <div class="info-card">
                            <i class="fas fa-shield-alt"></i>
                            <h3>Assurance complète</h3>
                            <p>Tous vos biens sont assurés pendant le transport</p>
                        </div>
                        <div class="info-card">
                            <i class="fas fa-certificate"></i>
                            <h3>Certifications</h3>
                            <p>Entreprise certifiée et agréée</p>
                        </div>
                        <div class="info-card">
                            <i class="fas fa-users"></i>
                            <h3>Équipe formée</h3>
                            <p>Personnel qualifié et expérimenté</p>
                        </div>
                        <div class="info-card">
                            <i class="fas fa-clock"></i>
                            <h3>Ponctualité</h3>
                            <p>Respect des horaires convenus</p>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Sidebar -->
            <div class="company-sidebar">
                <!-- Contact Box -->
                <div class="contact-box">
                    <h3>Contactez-nous</h3>
                    <ul class="contact-info">
                        <li>
                            <i class="fas fa-phone"></i>
                            <a href="tel:<?php echo str_replace(' ', '', $company['phone']); ?>"><?php echo escape($company['phone']); ?></a>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:<?php echo $company['email']; ?>"><?php echo escape($company['email']); ?></a>
                        </li>
                        <li>
                            <i class="fas fa-globe"></i>
                            <a href="https://<?php echo $company['website']; ?>" target="_blank"><?php echo escape($company['website']); ?></a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?php echo escape($company['address']); ?></span>
                        </li>
                    </ul>
                    <a href="/devis.php" class="btn btn-primary btn-full" style="margin-top: 1rem;">
                        Demander un devis gratuit
                    </a>
                </div>

                <!-- Horaires -->
                <div class="contact-box">
                    <h3>Horaires d'ouverture</h3>
                    <div style="color: #6b7280;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <span>Lundi - Vendredi:</span>
                            <strong>8h - 18h</strong>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <span>Samedi:</span>
                            <strong>9h - 15h</strong>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span>Dimanche:</span>
                            <strong>Fermé</strong>
                        </div>
                    </div>
                </div>

                <!-- Prix indicatif -->
                <div class="contact-box" style="background-color: #eff6ff; border: 2px solid #2563eb;">
                    <h3 style="color: #1e40af;">Prix moyen</h3>
                    <p class="price" style="font-size: 2.5rem; text-align: center; margin: 1rem 0;"><?php echo escape($company['price_label']); ?></p>
                    <p style="text-align: center; color: #6b7280; font-size: 0.875rem;">
                        <?php
                        $priceLabels = ['low' => 'Économique', 'medium' => 'Prix moyen', 'high' => 'Premium'];
                        echo $priceLabels[$company['price_range']] ?? '';
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Intéressé par cette entreprise ?</h2>
        <p>Demandez un devis personnalisé gratuit et sans engagement</p>
        <a href="/devis.php" class="btn btn-primary btn-large">Demander un devis gratuit</a>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
