// Quote request form logic

const devisForm = document.getElementById('devisForm');
const formSuccess = document.getElementById('formSuccess');

// Set minimum date to today
const moveDateInput = document.getElementById('moveDate');
const today = new Date().toISOString().split('T')[0];
moveDateInput.min = today;

// Form submission
devisForm.addEventListener('submit', function(e) {
    e.preventDefault();

    // Get form data
    const formData = new FormData(devisForm);
    const data = Object.fromEntries(formData);

    // Validate required fields
    if (!data.typeMove || !data.fromAddress || !data.toAddress || !data.rooms || !data.moveDate || !data.firstName || !data.lastName || !data.email || !data.phone) {
        alert('Veuillez remplir tous les champs obligatoires (*)');
        return;
    }

    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(data.email)) {
        alert('Veuillez entrer une adresse email valide');
        return;
    }

    // Validate phone
    const phoneRegex = /^[\d\s\+\-\(\)]{8,}$/;
    if (!phoneRegex.test(data.phone)) {
        alert('Veuillez entrer un numéro de téléphone valide');
        return;
    }

    // Simulate form submission
    console.log('Demande de devis soumise:', data);

    // Show success message
    devisForm.style.display = 'none';
    formSuccess.style.display = 'block';

    // Scroll to success message
    formSuccess.scrollIntoView({ behavior: 'smooth', block: 'center' });

    // In a real application, you would send this data to a server
    // fetch('/api/quote-request', {
    //     method: 'POST',
    //     headers: { 'Content-Type': 'application/json' },
    //     body: JSON.stringify(data)
    // })
    // .then(response => response.json())
    // .then(result => {
    //     // Handle success
    // });
});

// Calculate estimated price based on form inputs
function calculateEstimatedPrice() {
    const rooms = document.getElementById('rooms').value;
    const services = [];

    if (document.getElementById('servicePacking').checked) services.push('emballage');
    if (document.getElementById('serviceAssembly').checked) services.push('montage');
    if (document.getElementById('serviceLift').checked) services.push('lift');
    if (document.getElementById('serviceStorage').checked) services.push('stockage');
    if (document.getElementById('serviceCleaning').checked) services.push('nettoyage');

    let basePrice = 0;

    // Base price by room count
    switch(rooms) {
        case 'studio':
        case '1':
            basePrice = 400;
            break;
        case '2':
            basePrice = 700;
            break;
        case '3':
            basePrice = 1000;
            break;
        case '4':
            basePrice = 1500;
            break;
        case '5+':
            basePrice = 2000;
            break;
    }

    // Add service costs
    if (services.includes('emballage')) basePrice += 150;
    if (services.includes('montage')) basePrice += 100;
    if (services.includes('lift')) basePrice += 200;
    if (services.includes('stockage')) basePrice += 300;
    if (services.includes('nettoyage')) basePrice += 150;

    return basePrice;
}

// Optional: Show price estimate as user fills form
const priceInputs = [
    'rooms', 'servicePacking', 'serviceAssembly',
    'serviceLift', 'serviceStorage', 'serviceCleaning'
];

priceInputs.forEach(id => {
    const element = document.getElementById(id);
    if (element) {
        element.addEventListener('change', function() {
            const estimate = calculateEstimatedPrice();
            if (estimate > 0) {
                console.log('Prix estimé:', estimate + '€');
                // You could display this estimate on the page if desired
            }
        });
    }
});
