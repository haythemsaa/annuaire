// Company detail page logic

// Get company ID from URL
const urlParams = new URLSearchParams(window.location.search);
const companyId = parseInt(urlParams.get('id'));

// Find the company
const company = companies.find(c => c.id === companyId);

// If company not found, redirect to homepage
if (!company) {
    window.location.href = 'index.html';
} else {
    // Populate company details
    document.getElementById('companyName').textContent = company.name;
    document.getElementById('companyLocation').textContent = company.location;
    document.getElementById('companyStars').textContent = generateStars(company.rating);
    document.getElementById('companyRating').textContent = `(${company.rating}/5 - ${company.reviews} avis)`;
    document.getElementById('companyDescription').textContent = company.description;
    document.getElementById('companyZones').textContent = company.zones;

    // Contact info
    document.getElementById('companyPhone').textContent = company.phone;
    document.getElementById('companyPhone').href = `tel:${company.phone.replace(/\s/g, '')}`;
    document.getElementById('companyEmail').textContent = company.email;
    document.getElementById('companyEmail').href = `mailto:${company.email}`;
    document.getElementById('companyWebsite').textContent = company.website;
    document.getElementById('companyWebsite').href = `https://${company.website}`;
    document.getElementById('companyAddress').textContent = company.address;

    // Price label
    document.getElementById('sidebarPrice').textContent = company.priceLabel;

    // Services
    const servicesContainer = document.getElementById('companyServicesDetail');
    servicesContainer.innerHTML = company.services.map(service =>
        `<span class="service-tag" style="font-size: 1rem; padding: 0.5rem 1rem;">${serviceLabels[service]}</span>`
    ).join('');

    // Update page title
    document.title = `${company.name} - Annuaire Déménagement`;
}

// Generate stars
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
