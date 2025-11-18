// Main application logic for the homepage

// State
let filteredCompanies = [...companies];

// DOM elements
const companiesList = document.getElementById('companiesList');
const searchInput = document.getElementById('searchInput');
const filterService = document.getElementById('filterService');
const filterZone = document.getElementById('filterZone');
const filterPrice = document.getElementById('filterPrice');

// Render companies
function renderCompanies(companiesToRender) {
    if (companiesToRender.length === 0) {
        companiesList.innerHTML = `
            <div style="grid-column: 1/-1; text-align: center; padding: 3rem;">
                <i class="fas fa-search" style="font-size: 3rem; color: #9ca3af; margin-bottom: 1rem;"></i>
                <h3 style="color: #6b7280;">Aucune entreprise trouvée</h3>
                <p style="color: #9ca3af;">Essayez de modifier vos critères de recherche</p>
            </div>
        `;
        return;
    }

    companiesList.innerHTML = companiesToRender.map(company => `
        <div class="company-card">
            <div class="company-header">
                <div>
                    <h3 class="company-name">${company.name}</h3>
                    <div class="company-location">
                        <i class="fas fa-map-marker-alt"></i>
                        ${company.location}
                    </div>
                </div>
                ${company.verified ? '<div class="company-verified"><i class="fas fa-check-circle"></i> Vérifié</div>' : ''}
            </div>

            <div class="company-rating">
                <span class="stars">${generateStars(company.rating)}</span>
                <span class="rating-number">${company.rating}/5 (${company.reviews} avis)</span>
            </div>

            <p class="company-description">${company.description}</p>

            <div class="company-services">
                ${company.services.map(service =>
                    `<span class="service-tag">${serviceLabels[service]}</span>`
                ).join('')}
            </div>

            <div class="company-price">${company.priceLabel} ${getPriceLabel(company.priceRange)}</div>

            <div class="company-actions">
                <a href="company-detail.html?id=${company.id}" class="btn btn-secondary">
                    <i class="fas fa-info-circle"></i> Détails
                </a>
                <a href="devis.html" class="btn btn-primary">
                    <i class="fas fa-file-invoice"></i> Devis gratuit
                </a>
            </div>
        </div>
    `).join('');
}

// Generate stars HTML
function generateStars(rating) {
    const fullStars = Math.floor(rating);
    const hasHalfStar = rating % 1 >= 0.5;
    let stars = '';

    for (let i = 0; i < fullStars; i++) {
        stars += '★';
    }

    if (hasHalfStar) {
        stars += '★';
    }

    const emptyStars = 5 - Math.ceil(rating);
    for (let i = 0; i < emptyStars; i++) {
        stars += '☆';
    }

    return stars;
}

// Get price label
function getPriceLabel(priceRange) {
    const labels = {
        low: 'Économique',
        medium: 'Prix moyen',
        high: 'Premium'
    };
    return labels[priceRange] || '';
}

// Filter companies
function filterCompanies() {
    const searchTerm = searchInput.value.toLowerCase();
    const serviceFilter = filterService.value;
    const zoneFilter = filterZone.value;
    const priceFilter = filterPrice.value;

    filteredCompanies = companies.filter(company => {
        // Search filter
        const matchesSearch = !searchTerm ||
            company.name.toLowerCase().includes(searchTerm) ||
            company.description.toLowerCase().includes(searchTerm) ||
            company.location.toLowerCase().includes(searchTerm);

        // Service filter
        const matchesService = !serviceFilter || company.services.includes(serviceFilter);

        // Zone filter
        const matchesZone = !zoneFilter || company.zone === zoneFilter;

        // Price filter
        const matchesPrice = !priceFilter || company.priceRange === priceFilter;

        return matchesSearch && matchesService && matchesZone && matchesPrice;
    });

    renderCompanies(filteredCompanies);
}

// Event listeners
searchInput.addEventListener('input', filterCompanies);
filterService.addEventListener('change', filterCompanies);
filterZone.addEventListener('change', filterCompanies);
filterPrice.addEventListener('change', filterCompanies);

// Search button
document.querySelector('.btn-search').addEventListener('click', filterCompanies);

// Initial render
renderCompanies(companies);

// Smooth scroll for CTA buttons
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
