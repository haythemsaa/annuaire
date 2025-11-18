// Contact form logic

const contactForm = document.getElementById('contactForm');
const contactSuccess = document.getElementById('contactSuccess');

// Form submission
contactForm.addEventListener('submit', function(e) {
    e.preventDefault();

    // Get form data
    const formData = new FormData(contactForm);
    const data = Object.fromEntries(formData);

    // Validate required fields
    if (!data.name || !data.email || !data.subject || !data.message) {
        alert('Veuillez remplir tous les champs obligatoires (*)');
        return;
    }

    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(data.email)) {
        alert('Veuillez entrer une adresse email valide');
        return;
    }

    // Validate message length
    if (data.message.length < 10) {
        alert('Veuillez entrer un message plus détaillé (minimum 10 caractères)');
        return;
    }

    // Simulate form submission
    console.log('Message de contact soumis:', data);

    // Show success message
    contactForm.style.display = 'none';
    contactSuccess.style.display = 'block';

    // Scroll to success message
    contactSuccess.scrollIntoView({ behavior: 'smooth', block: 'center' });

    // In a real application, you would send this data to a server
    // fetch('/api/contact', {
    //     method: 'POST',
    //     headers: { 'Content-Type': 'application/json' },
    //     body: JSON.stringify(data)
    // })
    // .then(response => response.json())
    // .then(result => {
    //     // Handle success
    // });
});

// Character counter for message (optional enhancement)
const messageTextarea = document.getElementById('message');
if (messageTextarea) {
    messageTextarea.addEventListener('input', function() {
        const length = this.value.length;
        console.log(`Message length: ${length} characters`);
        // You could display this count on the page if desired
    });
}
