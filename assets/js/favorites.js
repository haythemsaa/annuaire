// Favorites system with localStorage
const FAVORITES_KEY = 'annuaire_favorites';

// Get favorites from localStorage
function getFavorites() {
    const favorites = localStorage.getItem(FAVORITES_KEY);
    return favorites ? JSON.parse(favorites) : [];
}

// Save favorites to localStorage
function saveFavorites(favorites) {
    localStorage.setItem(FAVORITES_KEY, JSON.stringify(favorites));
}

// Add to favorites
function addToFavorites(companyId) {
    const favorites = getFavorites();
    if (!favorites.includes(companyId)) {
        favorites.push(companyId);
        saveFavorites(favorites);
        updateFavoriteButton(companyId, true);
        showNotification('Entreprise ajoutée aux favoris', 'success');
        updateFavoritesCount();
    }
}

// Remove from favorites
function removeFromFavorites(companyId) {
    let favorites = getFavorites();
    favorites = favorites.filter(id => id !== companyId);
    saveFavorites(favorites);
    updateFavoriteButton(companyId, false);
    showNotification('Entreprise retirée des favoris', 'info');
    updateFavoritesCount();
}

// Toggle favorite
function toggleFavorite(companyId) {
    const favorites = getFavorites();
    if (favorites.includes(companyId)) {
        removeFromFavorites(companyId);
    } else {
        addToFavorites(companyId);
    }
}

// Update favorite button UI
function updateFavoriteButton(companyId, isFavorite) {
    const buttons = document.querySelectorAll(`[data-favorite-id="${companyId}"]`);
    buttons.forEach(button => {
        if (isFavorite) {
            button.classList.add('is-favorite');
            button.innerHTML = '<i class="fas fa-heart"></i>';
            button.title = 'Retirer des favoris';
        } else {
            button.classList.remove('is-favorite');
            button.innerHTML = '<i class="far fa-heart"></i>';
            button.title = 'Ajouter aux favoris';
        }
    });
}

// Initialize favorites on page load
function initializeFavorites() {
    const favorites = getFavorites();
    favorites.forEach(companyId => {
        updateFavoriteButton(companyId, true);
    });
    updateFavoritesCount();
}

// Update favorites count in UI
function updateFavoritesCount() {
    const count = getFavorites().length;
    const counters = document.querySelectorAll('.favorites-count');
    counters.forEach(counter => {
        counter.textContent = count;
        counter.style.display = count > 0 ? 'inline-block' : 'none';
    });
}

// Show notification
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-info-circle'}"></i>
        <span>${message}</span>
    `;

    notification.style.cssText = `
        position: fixed;
        top: 80px;
        right: 20px;
        background: ${type === 'success' ? '#d1fae5' : '#e0f2fe'};
        color: ${type === 'success' ? '#065f46' : '#0c4a6e'};
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        z-index: 10000;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        animation: slideInRight 0.3s ease-out;
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease-out';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }

    .favorite-btn {
        background: white;
        border: 2px solid #e5e7eb;
        color: #6b7280;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.3s;
        font-size: 1.25rem;
    }

    .favorite-btn:hover {
        border-color: #ef4444;
        color: #ef4444;
        transform: scale(1.1);
    }

    .favorite-btn.is-favorite {
        background: #fef2f2;
        border-color: #ef4444;
        color: #ef4444;
    }

    .favorite-btn.is-favorite:hover {
        background: #ef4444;
        color: white;
    }

    .favorites-count {
        background: #ef4444;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: bold;
        margin-left: 0.25rem;
    }
`;
document.head.appendChild(style);

// Initialize on page load
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeFavorites);
} else {
    initializeFavorites();
}

// Export for use in other scripts
window.favoriteSystem = {
    add: addToFavorites,
    remove: removeFromFavorites,
    toggle: toggleFavorite,
    get: getFavorites,
    init: initializeFavorites
};
