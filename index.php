<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'index';
$pageTitle = 'Accueil';
$pageDescription = 'Trouvez les meilleurs déménageurs professionnels. Comparez les prix et services de déménagement.';

// Récupérer les filtres de la requête
$filters = [];
if (isset($_GET['search'])) {
    $filters['search'] = trim($_GET['search']);
}
if (isset($_GET['service']) && !empty($_GET['service'])) {
    $filters['service'] = $_GET['service'];
}
if (isset($_GET['zone']) && !empty($_GET['zone'])) {
    $filters['zone'] = $_GET['zone'];
}
if (isset($_GET['price']) && !empty($_GET['price'])) {
    $filters['price'] = $_GET['price'];
}

// Récupérer les entreprises filtrées
$companies = getAllCompanies($filters);
$services = getAllServices();

include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h2>Trouvez les meilleurs déménageurs professionnels</h2>
            <p>Comparez les prix et services de déménagement pour votre projet</p>
            <a href="/devis.php" class="btn btn-primary">Demander un devis gratuit</a>
        </div>
    </div>
</section>

<!-- Search & Filter Section -->
<section class="search-section">
    <div class="container">
        <form method="GET" action="/index.php">
            <div class="search-box">
                <input type="text" id="searchInput" name="search" placeholder="Rechercher une entreprise, un service..." value="<?php echo escape($_GET['search'] ?? ''); ?>">
                <button type="submit" class="btn-search"><i class="fas fa-search"></i> Rechercher</button>
            </div>
            <div class="filters">
                <select name="service" id="filterService">
                    <option value="">Tous les services</option>
                    <?php foreach ($services as $service): ?>
                        <option value="<?php echo escape($service['slug']); ?>" <?php echo (isset($_GET['service']) && $_GET['service'] === $service['slug']) ? 'selected' : ''; ?>>
                            <?php echo escape($service['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <select name="zone" id="filterZone">
                    <option value="">Toutes les zones</option>
                    <option value="bruxelles" <?php echo (isset($_GET['zone']) && $_GET['zone'] === 'bruxelles') ? 'selected' : ''; ?>>Bruxelles</option>
                    <option value="wallonie" <?php echo (isset($_GET['zone']) && $_GET['zone'] === 'wallonie') ? 'selected' : ''; ?>>Wallonie</option>
                    <option value="flandre" <?php echo (isset($_GET['zone']) && $_GET['zone'] === 'flandre') ? 'selected' : ''; ?>>Flandre</option>
                </select>
                <select name="price" id="filterPrice">
                    <option value="">Tous les prix</option>
                    <option value="low" <?php echo (isset($_GET['price']) && $_GET['price'] === 'low') ? 'selected' : ''; ?>>€ - Économique</option>
                    <option value="medium" <?php echo (isset($_GET['price']) && $_GET['price'] === 'medium') ? 'selected' : ''; ?>>€€ - Moyen</option>
                    <option value="high" <?php echo (isset($_GET['price']) && $_GET['price'] === 'high') ? 'selected' : ''; ?>>€€€ - Premium</option>
                </select>
            </div>
        </form>
    </div>
</section>

<!-- Info Section -->
<section class="info-section">
    <div class="container">
        <div class="info-grid">
            <div class="info-card">
                <i class="fas fa-check-circle"></i>
                <h3>Entreprises vérifiées</h3>
                <p>Toutes nos entreprises sont vérifiées et certifiées</p>
            </div>
            <div class="info-card">
                <i class="fas fa-euro-sign"></i>
                <h3>Devis gratuits</h3>
                <p>Recevez plusieurs devis gratuitement et sans engagement</p>
            </div>
            <div class="info-card">
                <i class="fas fa-star"></i>
                <h3>Avis clients</h3>
                <p>Consultez les avis de clients vérifiés</p>
            </div>
            <div class="info-card">
                <i class="fas fa-headset"></i>
                <h3>Support 24/7</h3>
                <p>Une équipe à votre écoute pour vous accompagner</p>
            </div>
        </div>
    </div>
</section>

<!-- Companies Listing -->
<section class="companies-section">
    <div class="container">
        <h2 class="section-title">Nos entreprises partenaires</h2>
        <div id="companiesList" class="companies-grid">
            <?php if (empty($companies)): ?>
                <div style="grid-column: 1/-1; text-align: center; padding: 3rem;">
                    <i class="fas fa-search" style="font-size: 3rem; color: #9ca3af; margin-bottom: 1rem;"></i>
                    <h3 style="color: #6b7280;">Aucune entreprise trouvée</h3>
                    <p style="color: #9ca3af;">Essayez de modifier vos critères de recherche</p>
                </div>
            <?php else: ?>
                <?php foreach ($companies as $company): ?>
                    <div class="company-card">
                        <div class="company-header">
                            <div>
                                <h3 class="company-name"><?php echo escape($company['name']); ?></h3>
                                <div class="company-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php echo escape($company['location']); ?>
                                </div>
                            </div>
                            <?php if ($company['verified']): ?>
                                <div class="company-verified"><i class="fas fa-check-circle"></i> Vérifié</div>
                            <?php endif; ?>
                        </div>

                        <div class="company-rating">
                            <span class="stars"><?php echo generateStars($company['rating']); ?></span>
                            <span class="rating-number"><?php echo $company['rating']; ?>/5 (<?php echo $company['reviews']; ?> avis)</span>
                        </div>

                        <p class="company-description"><?php echo escape($company['description']); ?></p>

                        <div class="company-services">
                            <?php foreach ($company['services'] as $service): ?>
                                <span class="service-tag"><?php echo escape($service['name']); ?></span>
                            <?php endforeach; ?>
                        </div>

                        <div class="company-price"><?php echo escape($company['price_label']); ?>
                            <?php
                            $priceLabels = ['low' => 'Économique', 'medium' => 'Prix moyen', 'high' => 'Premium'];
                            echo $priceLabels[$company['price_range']] ?? '';
                            ?>
                        </div>

                        <div class="company-actions">
                            <a href="/company-detail.php?id=<?php echo $company['id']; ?>" class="btn btn-secondary">
                                <i class="fas fa-info-circle"></i> Détails
                            </a>
                            <a href="/devis.php" class="btn btn-primary">
                                <i class="fas fa-file-invoice"></i> Devis gratuit
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Price Guide Section -->
<section class="price-guide">
    <div class="container">
        <h2 class="section-title">Guide des prix</h2>
        <div class="price-grid">
            <div class="price-card">
                <h3>Studio / 1 chambre</h3>
                <p class="price">À partir de 400€</p>
                <ul>
                    <li>Transport jusqu'à 50km</li>
                    <li>2 déménageurs</li>
                    <li>Camion inclus</li>
                </ul>
            </div>
            <div class="price-card">
                <h3>2-3 chambres</h3>
                <p class="price">À partir de 800€</p>
                <ul>
                    <li>Transport jusqu'à 50km</li>
                    <li>3 déménageurs</li>
                    <li>Grand camion inclus</li>
                </ul>
            </div>
            <div class="price-card">
                <h3>4+ chambres</h3>
                <p class="price">À partir de 2000€</p>
                <ul>
                    <li>Transport jusqu'à 100km</li>
                    <li>4+ déménageurs</li>
                    <li>Plusieurs camions</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Prêt à déménager ?</h2>
        <p>Obtenez jusqu'à 5 devis gratuits en 2 minutes</p>
        <a href="/devis.php" class="btn btn-primary btn-large">Demander un devis gratuit</a>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
