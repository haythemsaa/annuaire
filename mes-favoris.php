<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'favoris';
$pageTitle = 'Mes Favoris';
$pageDescription = 'Retrouvez toutes les entreprises que vous avez mises en favoris pour comparer facilement.';

include __DIR__ . '/includes/header.php';
?>

<style>
    .favorites-hero {
        background: linear-gradient(135deg, #ec4899 0%, #8b5cf6 100%);
        color: white;
        padding: 3rem 0;
        text-align: center;
    }

    .favorites-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 1rem;
    }

    .favorites-empty {
        text-align: center;
        padding: 4rem 2rem;
        background: #f9fafb;
        border-radius: 1rem;
    }

    .favorites-empty i {
        font-size: 5rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }

    .favorites-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .clear-all-btn {
        background: #ef4444;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        cursor: pointer;
        font-weight: 600;
        transition: background 0.3s;
    }

    .clear-all-btn:hover {
        background: #dc2626;
    }

    .compare-selected-btn {
        background: #2563eb;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .favorite-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 2rem;
        align-items: center;
        transition: all 0.3s;
    }

    .favorite-card:hover {
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        transform: translateY(-2px);
    }

    .favorite-info h3 {
        font-size: 1.5rem;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .favorite-meta {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
        margin: 1rem 0;
        color: #6b7280;
        font-size: 0.875rem;
    }

    .favorite-actions {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .export-btn {
        background: #10b981;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        cursor: pointer;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    @media (max-width: 768px) {
        .favorite-card {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Hero -->
<div class="favorites-hero">
    <div class="container">
        <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">
            <i class="fas fa-heart"></i> Mes Favoris
        </h1>
        <p style="font-size: 1.125rem; opacity: 0.95;">
            Retrouvez toutes les entreprises que vous avez sauvegardées
        </p>
    </div>
</div>

<div class="favorites-container">
    <!-- Empty State (hidden by JS if favorites exist) -->
    <div id="emptyState" class="favorites-empty">
        <i class="far fa-heart"></i>
        <h2 style="color: #6b7280; margin-bottom: 1rem;">Aucun favori pour le moment</h2>
        <p style="color: #9ca3af; margin-bottom: 2rem;">
            Parcourez notre liste d'entreprises et ajoutez vos préférées en cliquant sur le cœur
        </p>
        <a href="/index.php" class="btn btn-primary">
            <i class="fas fa-search"></i> Découvrir les entreprises
        </a>
    </div>

    <!-- Favorites List (hidden initially) -->
    <div id="favoritesList" style="display: none;">
        <div class="favorites-actions">
            <div>
                <h2 style="color: #1f2937; margin: 0;">
                    <span id="favoritesCount">0</span> entreprise(s) en favoris
                </h2>
            </div>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <button class="export-btn" onclick="exportFavorites()">
                    <i class="fas fa-download"></i> Exporter (PDF)
                </button>
                <button class="compare-selected-btn" onclick="compareSelected()" id="compareBtn" style="display: none;">
                    <i class="fas fa-balance-scale"></i> Comparer (<span id="selectedCount">0</span>)
                </button>
                <button class="clear-all-btn" onclick="clearAllFavorites()">
                    <i class="fas fa-trash"></i> Tout supprimer
                </button>
            </div>
        </div>

        <div id="favoritesGrid"></div>
    </div>

    <!-- Tips -->
    <div style="background: #eff6ff; border-left: 4px solid #2563eb; padding: 2rem; border-radius: 0.5rem; margin-top: 3rem;">
        <h3 style="color: #1e40af; margin-bottom: 1rem;">
            <i class="fas fa-lightbulb"></i> Astuce
        </h3>
        <ul style="color: #6b7280; line-height: 1.8; padding-left: 1.5rem;">
            <li>Utilisez les favoris pour créer votre short-list d'entreprises</li>
            <li>Comparez jusqu'à 3 entreprises côte à côte</li>
            <li>Exportez votre liste en PDF pour la partager</li>
            <li>Les favoris sont sauvegardés dans votre navigateur</li>
        </ul>
    </div>
</div>

<script>
// Load favorites on page load
document.addEventListener('DOMContentLoaded', function() {
    loadFavorites();
});

async function loadFavorites() {
    const favorites = window.favoriteSystem.getFavorites();

    if (favorites.length === 0) {
        document.getElementById('emptyState').style.display = 'block';
        document.getElementById('favoritesList').style.display = 'none';
        return;
    }

    document.getElementById('emptyState').style.display = 'none';
    document.getElementById('favoritesList').style.display = 'block';
    document.getElementById('favoritesCount').textContent = favorites.length;

    // Fetch company data for each favorite
    const favoritesGrid = document.getElementById('favoritesGrid');
    favoritesGrid.innerHTML = '<p style="text-align: center; padding: 2rem;">Chargement...</p>';

    try {
        // In real app, would fetch from API
        // For now, we'll create cards with IDs
        favoritesGrid.innerHTML = '';

        favorites.forEach(companyId => {
            const card = createFavoriteCard(companyId);
            favoritesGrid.innerHTML += card;
        });

        updateCompareButton();
    } catch (error) {
        favoritesGrid.innerHTML = '<p style="text-align: center; color: #ef4444;">Erreur lors du chargement des favoris</p>';
    }
}

function createFavoriteCard(companyId) {
    // In real app, fetch company data from server
    // For demo, we'll use placeholder data
    return `
        <div class="favorite-card" data-company-id="${companyId}">
            <div class="favorite-info">
                <h3>Entreprise #${companyId}</h3>
                <div class="favorite-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Bruxelles</span>
                    <span><i class="fas fa-star" style="color: #f59e0b;"></i> 4.5/5 (42 avis)</span>
                    <span><i class="fas fa-check-circle" style="color: #10b981;"></i> Vérifié</span>
                </div>
                <p style="color: #6b7280; margin: 1rem 0;">
                    Entreprise de déménagement professionnelle avec plus de 10 ans d'expérience.
                </p>
                <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-top: 1rem;">
                    <span class="badge badge-gold"><i class="fas fa-trophy"></i> Top noté</span>
                    <span class="badge badge-blue"><i class="fas fa-certificate"></i> Certifié</span>
                </div>
            </div>
            <div class="favorite-actions">
                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem;">
                    <input type="checkbox" class="compare-checkbox" data-id="${companyId}" onchange="updateCompareButton()">
                    <span style="font-size: 0.875rem; color: #6b7280;">Comparer</span>
                </label>
                <a href="/company-detail.php?id=${companyId}" class="btn btn-secondary" style="white-space: nowrap;">
                    <i class="fas fa-info-circle"></i> Détails
                </a>
                <button class="btn btn-primary" onclick="window.location.href='/devis.php'" style="white-space: nowrap;">
                    <i class="fas fa-file-invoice"></i> Devis
                </button>
                <button class="btn" style="background: #ef4444; color: white;" onclick="removeFavorite(${companyId})">
                    <i class="fas fa-heart-broken"></i>
                </button>
            </div>
        </div>
    `;
}

function removeFavorite(companyId) {
    if (confirm('Supprimer cette entreprise de vos favoris ?')) {
        window.favoriteSystem.remove(companyId);
        loadFavorites();
    }
}

function clearAllFavorites() {
    if (confirm('Êtes-vous sûr de vouloir supprimer tous vos favoris ?')) {
        localStorage.removeItem('annuaire_favorites');
        loadFavorites();
    }
}

function updateCompareButton() {
    const checkboxes = document.querySelectorAll('.compare-checkbox:checked');
    const count = checkboxes.length;
    const compareBtn = document.getElementById('compareBtn');
    const selectedCount = document.getElementById('selectedCount');

    if (count > 0 && count <= 3) {
        compareBtn.style.display = 'inline-flex';
        selectedCount.textContent = count;
    } else {
        compareBtn.style.display = 'none';
    }
}

function compareSelected() {
    const checkboxes = document.querySelectorAll('.compare-checkbox:checked');
    const ids = Array.from(checkboxes).map(cb => cb.dataset.id);

    if (ids.length < 2) {
        alert('Sélectionnez au moins 2 entreprises à comparer');
        return;
    }

    if (ids.length > 3) {
        alert('Vous pouvez comparer maximum 3 entreprises');
        return;
    }

    window.location.href = `/compare.php?ids=${ids.join(',')}`;
}

function exportFavorites() {
    alert('Fonctionnalité d\'export PDF en cours de développement.\n\nVous pourrez bientôt exporter votre liste de favoris en PDF pour la partager ou l\'imprimer !');

    // In real implementation, would generate PDF
    // window.print() could be used as simple alternative
}
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
