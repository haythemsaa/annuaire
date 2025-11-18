<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'compare';
$pageTitle = 'Comparer les entreprises';
$pageDescription = 'Comparez jusqu\'à 3 entreprises de déménagement côte à côte pour faire le meilleur choix.';

// Récupérer les IDs des entreprises à comparer
$compareIds = isset($_GET['ids']) ? explode(',', $_GET['ids']) : [];
$compareIds = array_filter(array_map('intval', $compareIds));
$compareIds = array_slice($compareIds, 0, 3); // Maximum 3

$companies = [];
foreach ($compareIds as $id) {
    $company = getCompanyById($id);
    if ($company) {
        $companies[] = $company;
    }
}

include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero" style="padding: 2rem 0;">
    <div class="container">
        <div class="hero-content">
            <h2>Comparateur d'entreprises</h2>
            <p>Comparez jusqu'à 3 entreprises pour trouver celle qui correspond le mieux à vos besoins</p>
        </div>
    </div>
</section>

<?php if (empty($companies)): ?>
    <!-- No companies to compare -->
    <section class="form-section">
        <div class="container">
            <div class="form-container">
                <div style="text-align: center; padding: 3rem;">
                    <i class="fas fa-balance-scale" style="font-size: 4rem; color: #9ca3af; margin-bottom: 1rem;"></i>
                    <h3 style="color: #1f2937; margin-bottom: 1rem;">Aucune entreprise sélectionnée</h3>
                    <p style="color: #6b7280; margin-bottom: 2rem;">Retournez à la liste des entreprises et ajoutez des entreprises à comparer.</p>
                    <a href="/index.php" class="btn btn-primary">Voir toutes les entreprises</a>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <!-- Comparison Table -->
    <section style="padding: 3rem 0; background-color: #f9fafb;">
        <div class="container">
            <div style="overflow-x: auto;">
                <table class="comparison-table">
                    <thead>
                        <tr>
                            <th style="width: 200px; position: sticky; left: 0; background: white; z-index: 10;">Critères</th>
                            <?php foreach ($companies as $company): ?>
                                <th style="min-width: 300px;">
                                    <div style="text-align: center; padding: 1rem;">
                                        <h3 style="margin-bottom: 0.5rem;"><?php echo escape($company['name']); ?></h3>
                                        <?php if ($company['verified']): ?>
                                            <span class="company-verified"><i class="fas fa-check-circle"></i> Vérifié</span>
                                        <?php endif; ?>
                                    </div>
                                </th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Note globale -->
                        <tr>
                            <td style="font-weight: 600; position: sticky; left: 0; background: white;">Note globale</td>
                            <?php foreach ($companies as $company): ?>
                                <td style="text-align: center;">
                                    <div class="stars" style="font-size: 1.5rem; color: #f59e0b;"><?php echo generateStars($company['rating']); ?></div>
                                    <div style="font-size: 1.25rem; font-weight: bold; color: #1f2937; margin-top: 0.5rem;">
                                        <?php echo $company['rating']; ?>/5
                                    </div>
                                    <div style="color: #6b7280; font-size: 0.875rem;">
                                        (<?php echo $company['reviews']; ?> avis)
                                    </div>
                                </td>
                            <?php endforeach; ?>
                        </tr>

                        <!-- Localisation -->
                        <tr>
                            <td style="font-weight: 600; position: sticky; left: 0; background: white;"><i class="fas fa-map-marker-alt"></i> Localisation</td>
                            <?php foreach ($companies as $company): ?>
                                <td><?php echo escape($company['location']); ?></td>
                            <?php endforeach; ?>
                        </tr>

                        <!-- Zone d'intervention -->
                        <tr>
                            <td style="font-weight: 600; position: sticky; left: 0; background: white;"><i class="fas fa-map"></i> Zones d'intervention</td>
                            <?php foreach ($companies as $company): ?>
                                <td><?php echo escape($company['zones']); ?></td>
                            <?php endforeach; ?>
                        </tr>

                        <!-- Prix -->
                        <tr>
                            <td style="font-weight: 600; position: sticky; left: 0; background: white;"><i class="fas fa-euro-sign"></i> Gamme de prix</td>
                            <?php foreach ($companies as $company): ?>
                                <td style="text-align: center;">
                                    <div style="font-size: 1.5rem; color: #2563eb; font-weight: bold; margin-bottom: 0.5rem;">
                                        <?php echo escape($company['price_label']); ?>
                                    </div>
                                    <div style="color: #6b7280;">
                                        <?php
                                        $priceLabels = ['low' => 'Économique', 'medium' => 'Prix moyen', 'high' => 'Premium'];
                                        echo $priceLabels[$company['price_range']] ?? '';
                                        ?>
                                    </div>
                                </td>
                            <?php endforeach; ?>
                        </tr>

                        <!-- Services -->
                        <tr>
                            <td style="font-weight: 600; position: sticky; left: 0; background: white;"><i class="fas fa-tools"></i> Services proposés</td>
                            <?php foreach ($companies as $company): ?>
                                <td>
                                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                        <?php foreach ($company['services'] as $service): ?>
                                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                                <i class="fas fa-check" style="color: #10b981;"></i>
                                                <span><?php echo escape($service['name']); ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </td>
                            <?php endforeach; ?>
                        </tr>

                        <!-- Contact -->
                        <tr>
                            <td style="font-weight: 600; position: sticky; left: 0; background: white;"><i class="fas fa-phone"></i> Téléphone</td>
                            <?php foreach ($companies as $company): ?>
                                <td>
                                    <a href="tel:<?php echo str_replace(' ', '', $company['phone']); ?>" style="color: #2563eb; font-weight: 600;">
                                        <?php echo escape($company['phone']); ?>
                                    </a>
                                </td>
                            <?php endforeach; ?>
                        </tr>

                        <!-- Email -->
                        <tr>
                            <td style="font-weight: 600; position: sticky; left: 0; background: white;"><i class="fas fa-envelope"></i> Email</td>
                            <?php foreach ($companies as $company): ?>
                                <td>
                                    <a href="mailto:<?php echo $company['email']; ?>" style="color: #2563eb;">
                                        <?php echo escape($company['email']); ?>
                                    </a>
                                </td>
                            <?php endforeach; ?>
                        </tr>

                        <!-- Actions -->
                        <tr>
                            <td style="font-weight: 600; position: sticky; left: 0; background: white;">Actions</td>
                            <?php foreach ($companies as $company): ?>
                                <td>
                                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                        <a href="/company-detail.php?id=<?php echo $company['id']; ?>" class="btn btn-secondary btn-full">
                                            <i class="fas fa-info-circle"></i> Voir détails
                                        </a>
                                        <a href="/devis.php" class="btn btn-primary btn-full">
                                            <i class="fas fa-file-invoice"></i> Demander un devis
                                        </a>
                                    </div>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style="text-align: center; margin-top: 2rem;">
                <a href="/index.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour à la liste
                </a>
            </div>
        </div>
    </section>

    <style>
        .comparison-table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .comparison-table th,
        .comparison-table td {
            padding: 1.5rem 1rem;
            border: 1px solid #e5e7eb;
        }
        .comparison-table th {
            background: #f9fafb;
            font-weight: 600;
            color: #1f2937;
        }
        .comparison-table tbody tr:nth-child(even) {
            background: #f9fafb;
        }
        .comparison-table tbody tr:hover {
            background: #eff6ff;
        }
        @media (max-width: 768px) {
            .comparison-table {
                font-size: 0.875rem;
            }
            .comparison-table th,
            .comparison-table td {
                padding: 1rem 0.5rem;
            }
        }
    </style>
<?php endif; ?>

<!-- Add to comparison instructions -->
<section class="info-section">
    <div class="container">
        <h2 class="section-title">Comment utiliser le comparateur ?</h2>
        <div class="info-grid" style="grid-template-columns: repeat(3, 1fr);">
            <div class="info-card">
                <i class="fas fa-search"></i>
                <h3>1. Recherchez</h3>
                <p>Parcourez notre liste d'entreprises et trouvez celles qui vous intéressent</p>
            </div>
            <div class="info-card">
                <i class="fas fa-plus-circle"></i>
                <h3>2. Ajoutez</h3>
                <p>Cliquez sur "Comparer" sur les fiches entreprises (maximum 3)</p>
            </div>
            <div class="info-card">
                <i class="fas fa-balance-scale"></i>
                <h3>3. Comparez</h3>
                <p>Analysez les différences et choisissez la meilleure option</p>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
