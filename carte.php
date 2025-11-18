<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'carte';
$pageTitle = 'Carte des Déménageurs';
$pageDescription = 'Trouvez un déménageur près de chez vous grâce à notre carte interactive de toute la Belgique.';

// Get all companies
$companies = getAllCompanies();

include __DIR__ . '/includes/header.php';
?>

<style>
    #map {
        width: 100%;
        height: 600px;
        border-radius: 1rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .map-container {
        padding: 2rem 0;
    }

    .map-sidebar {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        max-height: 600px;
        overflow-y: auto;
    }

    .map-company-card {
        background: #f9fafb;
        border-radius: 0.75rem;
        padding: 1rem;
        margin-bottom: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .map-company-card:hover {
        background: white;
        border-color: #2563eb;
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
    }

    .map-company-card.active {
        background: #eff6ff;
        border-color: #2563eb;
    }

    .map-company-name {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.5rem;
        font-size: 1.125rem;
    }

    .map-company-location {
        color: #6b7280;
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .map-company-rating {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
    }

    .map-filters {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }

    .map-filters-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .marker-popup {
        min-width: 250px;
    }

    .marker-popup h3 {
        margin: 0 0 0.5rem 0;
        color: #1f2937;
        font-size: 1.125rem;
    }

    .marker-popup .rating {
        color: #f59e0b;
        margin-bottom: 0.5rem;
    }

    .marker-popup .location {
        color: #6b7280;
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
    }

    .marker-popup .btn {
        display: inline-block;
        margin-top: 0.5rem;
        padding: 0.5rem 1rem;
        background: #2563eb;
        color: white;
        text-decoration: none;
        border-radius: 0.5rem;
        font-size: 0.875rem;
    }

    .legend {
        background: white;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        position: absolute;
        bottom: 20px;
        left: 20px;
        z-index: 1000;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin: 0.5rem 0;
        font-size: 0.875rem;
    }

    .legend-marker {
        width: 20px;
        height: 20px;
        border-radius: 50%;
    }

    @media (max-width: 768px) {
        #map {
            height: 400px;
        }

        .map-sidebar {
            max-height: none;
            margin-top: 1rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">🗺️ Carte des Déménageurs</h1>
            <p style="font-size: 1.25rem;">Trouvez un déménageur professionnel près de chez vous en Belgique</p>
        </div>
    </div>
</section>

<div class="container map-container">
    <!-- Filters -->
    <div class="map-filters">
        <h3 style="margin-bottom: 1rem; color: #1f2937;">
            <i class="fas fa-filter"></i> Filtres de recherche
        </h3>
        <div class="map-filters-grid">
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #6b7280;">Région</label>
                <select id="filterRegion" class="form-control" style="width: 100%; padding: 0.5rem; border: 2px solid #e5e7eb; border-radius: 0.5rem;">
                    <option value="">Toutes les régions</option>
                    <option value="bruxelles">Bruxelles-Capitale</option>
                    <option value="wallonie">Wallonie</option>
                    <option value="flandre">Flandre</option>
                </select>
            </div>
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #6b7280;">Note minimum</label>
                <select id="filterRating" class="form-control" style="width: 100%; padding: 0.5rem; border: 2px solid #e5e7eb; border-radius: 0.5rem;">
                    <option value="0">Toutes les notes</option>
                    <option value="4.5">4.5+ étoiles</option>
                    <option value="4.0">4.0+ étoiles</option>
                    <option value="3.5">3.5+ étoiles</option>
                </select>
            </div>
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #6b7280;">Prix</label>
                <select id="filterPrice" class="form-control" style="width: 100%; padding: 0.5rem; border: 2px solid #e5e7eb; border-radius: 0.5rem;">
                    <option value="">Tous les prix</option>
                    <option value="low">€ - Économique</option>
                    <option value="medium">€€ - Moyen</option>
                    <option value="high">€€€ - Premium</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Map and Sidebar Grid -->
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; margin-bottom: 2rem;">
        <div>
            <div id="map"></div>
        </div>
        <div class="map-sidebar">
            <h3 style="margin-bottom: 1rem; color: #1f2937;">
                <i class="fas fa-list"></i> Entreprises (<span id="companyCount"><?php echo count($companies); ?></span>)
            </h3>
            <div id="companiesList">
                <?php foreach ($companies as $company): ?>
                    <div class="map-company-card"
                         data-id="<?php echo $company['id']; ?>"
                         data-zone="<?php echo $company['zone']; ?>"
                         data-rating="<?php echo $company['rating']; ?>"
                         data-price="<?php echo $company['price_range']; ?>"
                         onclick="focusCompany(<?php echo $company['id']; ?>)">
                        <div class="map-company-name"><?php echo escape($company['name']); ?></div>
                        <div class="map-company-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo escape($company['location']); ?>
                        </div>
                        <div class="map-company-rating">
                            <span class="stars" style="color: #f59e0b;">
                                <?php echo generateStars($company['rating']); ?>
                            </span>
                            <span style="color: #6b7280;"><?php echo $company['rating']; ?>/5</span>
                            <?php if ($company['verified']): ?>
                                <span style="color: #10b981; font-size: 0.75rem;">
                                    <i class="fas fa-check-circle"></i> Vérifié
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div style="background: #eff6ff; border-left: 4px solid #2563eb; padding: 2rem; border-radius: 0.5rem;">
        <h3 style="color: #1e40af; margin-bottom: 1rem;">
            <i class="fas fa-info-circle"></i> Comment utiliser la carte ?
        </h3>
        <ul style="color: #6b7280; line-height: 1.8; padding-left: 1.5rem;">
            <li><strong>Naviguez</strong> sur la carte pour explorer les différentes régions de Belgique</li>
            <li><strong>Cliquez</strong> sur les marqueurs pour voir les détails des entreprises</li>
            <li><strong>Utilisez les filtres</strong> pour affiner votre recherche par région, note ou prix</li>
            <li><strong>Consultez la liste</strong> à droite et cliquez sur une entreprise pour la localiser</li>
            <li><strong>Demandez un devis</strong> directement depuis la carte</li>
        </ul>
    </div>
</div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
// Company data with coordinates
const companies = <?php echo json_encode(array_map(function($company) {
    // Assign approximate coordinates based on location (you should replace with real coordinates)
    $coords = [
        'Bruxelles' => [50.8503, 4.3517],
        'Schaerbeek' => [50.8676, 4.3731],
        'Ixelles' => [50.8333, 4.3667],
        'Anderlecht' => [50.8367, 4.3114],
        'Uccle' => [50.7989, 4.3256],
        'Etterbeek' => [50.8372, 4.3881],
        'Molenbeek' => [50.8580, 4.3142],
        'Saint-Gilles' => [50.8272, 4.3447],
        'Forest' => [50.8164, 4.3206],
        'Jette' => [50.8767, 4.3331]
    ];

    $location = $company['location'];
    $company['latitude'] = $coords[$location][0] ?? 50.8503;
    $company['longitude'] = $coords[$location][1] ?? 4.3517;

    // Add small random offset to avoid exact overlaps
    $company['latitude'] += (rand(-100, 100) / 10000);
    $company['longitude'] += (rand(-100, 100) / 10000);

    return $company;
}, $companies)); ?>;

// Initialize map centered on Belgium
const map = L.map('map').setView([50.5039, 4.4699], 8);

// Add tile layer (OpenStreetMap)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors',
    maxZoom: 18
}).addTo(map);

// Store markers for later reference
const markers = {};

// Custom marker colors based on rating
function getMarkerColor(rating) {
    if (rating >= 4.5) return '#10b981'; // Green - Excellent
    if (rating >= 4.0) return '#2563eb'; // Blue - Very Good
    if (rating >= 3.5) return '#f59e0b'; // Orange - Good
    return '#6b7280'; // Gray - Average
}

// Create custom icon
function createCustomIcon(color) {
    return L.divIcon({
        html: `<div style="background-color: ${color}; width: 30px; height: 30px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.3);"></div>`,
        className: 'custom-marker',
        iconSize: [30, 30],
        iconAnchor: [15, 15]
    });
}

// Add markers for each company
companies.forEach(company => {
    const color = getMarkerColor(company.rating);
    const icon = createCustomIcon(color);

    const marker = L.marker([company.latitude, company.longitude], { icon: icon })
        .addTo(map)
        .bindPopup(`
            <div class="marker-popup">
                <h3>${company.name}</h3>
                <div class="rating">
                    ${'⭐'.repeat(Math.floor(company.rating))} ${company.rating}/5
                </div>
                <div class="location">
                    <i class="fas fa-map-marker-alt"></i> ${company.location}
                </div>
                <div style="color: #6b7280; font-size: 0.875rem;">
                    ${company.verified ? '<i class="fas fa-check-circle" style="color: #10b981;"></i> Vérifié' : ''}
                </div>
                <a href="/company-detail.php?id=${company.id}" class="btn">
                    Voir les détails
                </a>
            </div>
        `);

    markers[company.id] = marker;
});

// Focus on a specific company
function focusCompany(companyId) {
    const marker = markers[companyId];
    if (marker) {
        map.setView(marker.getLatLng(), 13);
        marker.openPopup();

        // Highlight company card
        document.querySelectorAll('.map-company-card').forEach(card => {
            card.classList.remove('active');
        });
        document.querySelector(`[data-id="${companyId}"]`).classList.add('active');
    }
}

// Filter functionality
function applyFilters() {
    const region = document.getElementById('filterRegion').value;
    const minRating = parseFloat(document.getElementById('filterRating').value) || 0;
    const priceRange = document.getElementById('filterPrice').value;

    let visibleCount = 0;

    companies.forEach(company => {
        const card = document.querySelector(`[data-id="${company.id}"]`);
        const marker = markers[company.id];

        let show = true;

        if (region && company.zone !== region) show = false;
        if (company.rating < minRating) show = false;
        if (priceRange && company.price_range !== priceRange) show = false;

        if (show) {
            card.style.display = 'block';
            map.addLayer(marker);
            visibleCount++;
        } else {
            card.style.display = 'none';
            map.removeLayer(marker);
        }
    });

    document.getElementById('companyCount').textContent = visibleCount;
}

// Add event listeners to filters
document.getElementById('filterRegion').addEventListener('change', applyFilters);
document.getElementById('filterRating').addEventListener('change', applyFilters);
document.getElementById('filterPrice').addEventListener('change', applyFilters);

// Add legend
const legend = L.control({ position: 'bottomleft' });

legend.onAdd = function(map) {
    const div = L.DomUtil.create('div', 'legend');
    div.innerHTML = `
        <strong style="display: block; margin-bottom: 0.5rem;">Légende</strong>
        <div class="legend-item">
            <div class="legend-marker" style="background: #10b981;"></div>
            <span>Excellent (4.5+)</span>
        </div>
        <div class="legend-item">
            <div class="legend-marker" style="background: #2563eb;"></div>
            <span>Très bien (4.0+)</span>
        </div>
        <div class="legend-item">
            <div class="legend-marker" style="background: #f59e0b;"></div>
            <span>Bien (3.5+)</span>
        </div>
    `;
    return div;
};

legend.addTo(map);
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
