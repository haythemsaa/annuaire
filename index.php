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

// Récupérer les statistiques
$stats = getHomepageStats();

include __DIR__ . '/includes/header.php';

// Schema.org structured data for Website
$websiteSchema = [
    "@context" => "https://schema.org",
    "@type" => "WebSite",
    "name" => SITE_NAME,
    "url" => "https://" . $_SERVER['HTTP_HOST'],
    "potentialAction" => [
        "@type" => "SearchAction",
        "target" => [
            "@type" => "EntryPoint",
            "urlTemplate" => "https://" . $_SERVER['HTTP_HOST'] . "/index.php?search={search_term_string}"
        ],
        "query-input" => "required name=search_term_string"
    ]
];

// Schema.org structured data for ItemList of moving companies
$itemListSchema = [
    "@context" => "https://schema.org",
    "@type" => "ItemList",
    "itemListElement" => []
];

foreach (array_slice($companies, 0, 10) as $index => $company) {
    $itemListSchema['itemListElement'][] = [
        "@type" => "ListItem",
        "position" => $index + 1,
        "item" => [
            "@type" => "LocalBusiness",
            "name" => $company['name'],
            "description" => $company['description'],
            "telephone" => $company['phone'],
            "aggregateRating" => [
                "@type" => "AggregateRating",
                "ratingValue" => $company['rating'],
                "reviewCount" => $company['reviews']
            ],
            "url" => "https://" . $_SERVER['HTTP_HOST'] . "/company-detail.php?id=" . $company['id']
        ]
    ];
}

// Organization Schema
$organizationSchema = [
    "@context" => "https://schema.org",
    "@type" => "Organization",
    "name" => SITE_NAME,
    "url" => "https://" . $_SERVER['HTTP_HOST'],
    "logo" => "https://" . $_SERVER['HTTP_HOST'] . "/assets/images/logo.png",
    "contactPoint" => [
        "@type" => "ContactPoint",
        "telephone" => SITE_PHONE,
        "contactType" => "Customer Service",
        "email" => SITE_EMAIL,
        "areaServed" => "BE",
        "availableLanguage" => ["French", "Dutch"]
    ],
    "sameAs" => []
];
?>

<!-- Schema.org Structured Data -->
<script type="application/ld+json">
<?php echo json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<script type="application/ld+json">
<?php echo json_encode($itemListSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<script type="application/ld+json">
<?php echo json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

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

<!-- Dynamic Stats Section -->
<section style="padding: 3rem 0; background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%); color: white;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h2 style="font-size: 2rem; margin-bottom: 0.5rem; color: white;">Nos chiffres en temps réel</h2>
            <p style="opacity: 0.9; font-size: 1.125rem;">Des milliers de clients satisfaits nous font confiance</p>
        </div>
        <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; text-align: center;">
            <div class="stat-item">
                <div class="stat-icon" style="font-size: 3rem; margin-bottom: 0.5rem;">
                    <i class="fas fa-building"></i>
                </div>
                <div class="stat-number" style="font-size: 3rem; font-weight: bold; margin-bottom: 0.5rem;" data-target="<?php echo $stats['total_companies']; ?>">0</div>
                <div class="stat-label" style="font-size: 1rem; opacity: 0.9;">Entreprises vérifiées</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon" style="font-size: 3rem; margin-bottom: 0.5rem;">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="stat-number" style="font-size: 3rem; font-weight: bold; margin-bottom: 0.5rem;" data-target="<?php echo $stats['total_reviews']; ?>">0</div>
                <div class="stat-label" style="font-size: 1rem; opacity: 0.9;">Avis clients</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon" style="font-size: 3rem; margin-bottom: 0.5rem;">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-number" style="font-size: 3rem; font-weight: bold; margin-bottom: 0.5rem;" data-target="<?php echo $stats['average_rating']; ?>" data-decimals="1">0</div>
                <div class="stat-label" style="font-size: 1rem; opacity: 0.9;">Note moyenne / 5</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon" style="font-size: 3rem; margin-bottom: 0.5rem;">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-number" style="font-size: 3rem; font-weight: bold; margin-bottom: 0.5rem;" data-target="<?php echo $stats['satisfaction']; ?>">0</div>
                <div class="stat-label" style="font-size: 1rem; opacity: 0.9;">% de satisfaction</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon" style="font-size: 3rem; margin-bottom: 0.5rem;">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <div class="stat-number" style="font-size: 3rem; font-weight: bold; margin-bottom: 0.5rem;" data-target="<?php echo $stats['weekly_quotes']; ?>">0</div>
                <div class="stat-label" style="font-size: 1rem; opacity: 0.9;">Devis cette semaine</div>
            </div>
        </div>
    </div>
</section>

<script>
// Animated counter for stats
function animateCounter(element) {
    const target = parseFloat(element.getAttribute('data-target'));
    const decimals = parseInt(element.getAttribute('data-decimals')) || 0;
    const duration = 2000; // 2 seconds
    const increment = target / (duration / 16); // 60 FPS
    let current = 0;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = decimals > 0 ? target.toFixed(decimals) : Math.floor(target);
            clearInterval(timer);
        } else {
            element.textContent = decimals > 0 ? current.toFixed(decimals) : Math.floor(current);
        }
    }, 16);
}

// Intersection Observer to trigger animation when visible
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counters = entry.target.querySelectorAll('.stat-number');
            counters.forEach(counter => {
                if (counter.textContent === '0' || counter.textContent === '0.0') {
                    animateCounter(counter);
                }
            });
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

// Observe the stats section
const statsSection = document.querySelector('.stats-grid');
if (statsSection) {
    observer.observe(statsSection.parentElement);
}
</script>

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
                        <!-- Price Range Color Bar -->
                        <div class="card-top-bar card-top-bar-<?php echo $company['price_range']; ?>"></div>

                        <div class="company-header">
                            <div>
                                <h3 class="company-name"><?php echo escape($company['name']); ?></h3>
                                <div class="company-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php echo escape($company['location']); ?>
                                </div>
                            </div>
                            <div style="display: flex; gap: 0.5rem; align-items: center;">
                                <button class="favorite-btn" data-favorite-id="<?php echo $company['id']; ?>" onclick="window.favoriteSystem.toggle(<?php echo $company['id']; ?>)" title="Ajouter aux favoris">
                                    <i class="far fa-heart"></i>
                                </button>
                                <?php if ($company['verified']): ?>
                                    <div class="company-verified"><i class="fas fa-check-circle"></i> Vérifié</div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="company-rating">
                            <span class="stars"><?php echo generateStars($company['rating']); ?></span>
                            <span class="rating-number"><?php echo $company['rating']; ?>/5 (<?php echo $company['reviews']; ?> avis)</span>
                        </div>

                        <!-- Quality Badges -->
                        <div class="quality-badges" style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin: 1rem 0;">
                            <?php if ($company['rating'] >= 4.5): ?>
                                <span class="badge badge-gold">
                                    <i class="fas fa-trophy"></i> Top noté
                                </span>
                            <?php endif; ?>
                            <?php if ($company['verified']): ?>
                                <span class="badge badge-blue">
                                    <i class="fas fa-certificate"></i> Certifié
                                </span>
                            <?php endif; ?>
                            <?php if ($company['price_range'] === 'low'): ?>
                                <span class="badge badge-green">
                                    <i class="fas fa-euro-sign"></i> Meilleur prix
                                </span>
                            <?php endif; ?>
                            <?php if ($company['reviews'] >= 50): ?>
                                <span class="badge badge-purple">
                                    <i class="fas fa-users"></i> Très populaire
                                </span>
                            <?php endif; ?>
                            <?php if (isset($company['years_experience']) && $company['years_experience'] >= 10): ?>
                                <span class="badge badge-orange">
                                    <i class="fas fa-award"></i> +10 ans d'expérience
                                </span>
                            <?php endif; ?>
                        </div>

                        <p class="company-description"><?php echo escape($company['description']); ?></p>

                        <!-- Service Icons Preview -->
                        <div class="company-services-icons" style="display: flex; gap: 0.75rem; margin: 1rem 0; flex-wrap: wrap;">
                            <?php
                            $maxServicesToShow = 4;
                            $servicesCount = count($company['services']);
                            $servicesToDisplay = array_slice($company['services'], 0, $maxServicesToShow);
                            foreach ($servicesToDisplay as $service):
                            ?>
                                <div class="service-icon-item" style="display: flex; align-items: center; gap: 0.375rem; font-size: 0.875rem; color: #6b7280;">
                                    <i class="fas <?php echo escape($service['icon']); ?>" style="color: #2563eb; font-size: 1rem;"></i>
                                    <span><?php echo escape($service['name']); ?></span>
                                </div>
                            <?php endforeach; ?>
                            <?php if ($servicesCount > $maxServicesToShow): ?>
                                <span style="color: #9ca3af; font-size: 0.875rem;">+<?php echo $servicesCount - $maxServicesToShow; ?> autres</span>
                            <?php endif; ?>
                        </div>

                        <!-- Company Stats -->
                        <div class="company-stats" style="display: flex; gap: 1.5rem; padding: 1rem 0; border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb; margin: 1rem 0;">
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-comment-dots" style="color: #10b981;"></i>
                                <span style="font-size: 0.875rem; color: #6b7280;"><?php echo $company['reviews']; ?> avis</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-clock" style="color: #f59e0b;"></i>
                                <span style="font-size: 0.875rem; color: #6b7280;">Réponse 24h</span>
                            </div>
                            <?php if (isset($company['years_experience']) && $company['years_experience'] > 0): ?>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-calendar-check" style="color: #8b5cf6;"></i>
                                <span style="font-size: 0.875rem; color: #6b7280;"><?php echo $company['years_experience']; ?>+ ans</span>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="company-price" style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <div style="font-size: 0.75rem; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.05em;">À partir de</div>
                                <div style="font-size: 1.5rem; color: #2563eb; font-weight: 700;"><?php echo escape($company['price_label']); ?></div>
                            </div>
                            <div class="price-indicator price-indicator-<?php echo $company['price_range']; ?>">
                                <?php
                                $priceLabels = ['low' => 'Économique', 'medium' => 'Prix moyen', 'high' => 'Premium'];
                                echo $priceLabels[$company['price_range']] ?? '';
                                ?>
                            </div>
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
