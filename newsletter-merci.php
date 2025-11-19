<?php
$pageTitle = "Inscription Confirmée - Merci !";
$pageDescription = "Votre inscription à notre newsletter est confirmée. Découvrez nos ressources gratuites pour réussir votre déménagement.";
require_once 'includes/header.php';
?>

<style>
.thank-you-hero {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    padding: 80px 0;
    text-align: center;
    color: white;
}

.thank-you-hero h1 {
    font-size: 3rem;
    margin-bottom: 20px;
    animation: fadeInUp 0.6s ease;
}

.thank-you-hero p {
    font-size: 1.3rem;
    max-width: 700px;
    margin: 0 auto;
    opacity: 0.95;
}

.checkmark-icon {
    font-size: 5rem;
    margin-bottom: 20px;
    animation: scaleIn 0.5s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes scaleIn {
    from {
        transform: scale(0);
    }
    to {
        transform: scale(1);
    }
}

.resources-section {
    padding: 80px 0;
}

.resource-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.resource-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-top: 4px solid #10b981;
}

.resource-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.15);
}

.resource-card h3 {
    color: #1f2937;
    margin-top: 15px;
    margin-bottom: 15px;
}

.resource-card p {
    color: #6b7280;
    margin-bottom: 20px;
}

.resource-card a {
    display: inline-block;
    background: #10b981;
    color: white;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    transition: background 0.3s ease;
}

.resource-card a:hover {
    background: #059669;
}

.icon-large {
    font-size: 3rem;
    color: #10b981;
}

.cta-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 60px 30px;
    border-radius: 12px;
    text-align: center;
    color: white;
    margin: 80px 0;
}

.cta-section h2 {
    color: white;
    margin-bottom: 20px;
}

.cta-section .btn {
    background: white;
    color: #667eea;
    padding: 15px 40px;
    border-radius: 8px;
    text-decoration: none;
    display: inline-block;
    font-weight: 600;
    margin-top: 20px;
    transition: transform 0.3s ease;
}

.cta-section .btn:hover {
    transform: translateY(-2px);
}

.benefits-list {
    background: #f9fafb;
    padding: 50px 30px;
    border-radius: 12px;
    margin: 50px 0;
}

.benefits-list h2 {
    text-align: center;
    margin-bottom: 40px;
    color: #1f2937;
}

.benefit-item {
    display: flex;
    align-items: start;
    gap: 20px;
    margin: 25px 0;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.benefit-icon {
    font-size: 2rem;
    color: #10b981;
    min-width: 50px;
}

.benefit-content h3 {
    margin: 0 0 10px 0;
    color: #1f2937;
}

.benefit-content p {
    margin: 0;
    color: #6b7280;
}
</style>

<div class="thank-you-hero">
    <div class="container">
        <div class="checkmark-icon">✅</div>
        <h1>Inscription Confirmée !</h1>
        <p>Merci de votre confiance. Vous faites maintenant partie de notre communauté de plus de 5 000 personnes qui réussissent leur déménagement en Belgique.</p>
    </div>
</div>

<div class="resources-section container">
    <div style="text-align: center; max-width: 800px; margin: 0 auto 30px;">
        <h2 style="font-size: 2.5rem; color: #1f2937; margin-bottom: 20px;">
            Vos Ressources Gratuites
        </h2>
        <p style="font-size: 1.2rem; color: #6b7280;">
            En attendant votre premier email (qui arrivera d'ici quelques jours), profitez de nos outils et guides gratuits :
        </p>
    </div>

    <div class="resource-grid">
        <div class="resource-card">
            <div class="icon-large"><i class="fas fa-calculator"></i></div>
            <h3>Calculateur de Volume</h3>
            <p>Estimez précisément le volume de votre déménagement en 2 minutes. Obtenez des devis plus justes !</p>
            <a href="/calculateur.php">Calculer mon volume →</a>
        </div>

        <div class="resource-card">
            <div class="icon-large"><i class="fas fa-balance-scale"></i></div>
            <h3>Comparateur de Devis</h3>
            <p>Comparez jusqu'à 5 devis de déménageurs professionnels. Économisez jusqu'à 40% !</p>
            <a href="/compare.php">Comparer les prix →</a>
        </div>

        <div class="resource-card">
            <div class="icon-large"><i class="fas fa-list-check"></i></div>
            <h3>Checklist Interactive</h3>
            <p>Ne rien oublier avec notre checklist complète de déménagement. 150+ tâches organisées par délai.</p>
            <a href="/checklist.php">Voir la checklist →</a>
        </div>

        <div class="resource-card">
            <div class="icon-large"><i class="fas fa-book-open"></i></div>
            <h3>Blog Expert</h3>
            <p>6 articles complets (2500+ mots) avec tous nos secrets pour un déménagement réussi.</p>
            <a href="/blog.php">Lire le blog →</a>
        </div>

        <div class="resource-card">
            <div class="icon-large"><i class="fas fa-map-marked-alt"></i></div>
            <h3>Carte Interactive</h3>
            <p>Trouvez les meilleurs déménageurs près de chez vous. Filtrez par note, prix et région.</p>
            <a href="/carte.php">Voir la carte →</a>
        </div>

        <div class="resource-card">
            <div class="icon-large"><i class="fas fa-question-circle"></i></div>
            <h3>FAQ Complète</h3>
            <p>25+ questions fréquentes avec réponses détaillées. Recherche en temps réel incluse.</p>
            <a href="/faq.php">Voir la FAQ →</a>
        </div>
    </div>

    <div class="benefits-list">
        <h2>Ce Que Vous Allez Recevoir</h2>

        <div class="benefit-item">
            <div class="benefit-icon">📬</div>
            <div class="benefit-content">
                <h3>1 Email Par Semaine</h3>
                <p>Chaque mercredi, recevez nos meilleurs conseils, astuces et tendances du secteur du déménagement. Pas de spam, uniquement du contenu de qualité.</p>
            </div>
        </div>

        <div class="benefit-item">
            <div class="benefit-icon">📚</div>
            <div class="benefit-content">
                <h3>Guides Exclusifs PDF</h3>
                <p>Téléchargez nos guides complets réservés aux abonnés : "Le Guide Ultime du Déménagement", "50 Astuces d'Économie", "Checklist Imprimable".</p>
            </div>
        </div>

        <div class="benefit-item">
            <div class="benefit-icon">💰</div>
            <div class="benefit-content">
                <h3>Offres Partenaires Exclusives</h3>
                <p>Bénéficiez de réductions de -10% à -20% chez nos déménageurs partenaires certifiés. Économisez des centaines d'euros !</p>
            </div>
        </div>

        <div class="benefit-item">
            <div class="benefit-icon">🎯</div>
            <div class="benefit-content">
                <h3>Conseils Personnalisés</h3>
                <p>Selon votre profil (étudiant, famille, senior, international), recevez des conseils adaptés à votre situation spécifique.</p>
            </div>
        </div>

        <div class="benefit-item">
            <div class="benefit-icon">🆕</div>
            <div class="benefit-content">
                <h3>Nouveautés en Avant-Première</h3>
                <p>Soyez le premier informé de nos nouveaux outils, comparateurs et fonctionnalités exclusives.</p>
            </div>
        </div>
    </div>

    <div class="cta-section">
        <h2>Prêt à Déménager ?</h2>
        <p style="font-size: 1.2rem; margin-bottom: 0; opacity: 0.95;">
            Recevez jusqu'à 5 devis gratuits de déménageurs professionnels près de chez vous
        </p>
        <a href="/devis.php" class="btn">Demander mes devis gratuits</a>
    </div>

    <div style="text-align: center; margin-top: 60px; padding: 40px; background: #f9fafb; border-radius: 12px;">
        <h3 style="color: #1f2937; margin-bottom: 15px;">Une question ? Un problème ?</h3>
        <p style="color: #6b7280; margin-bottom: 20px;">
            Notre équipe est là pour vous aider
        </p>
        <a href="/contact.php" style="color: #10b981; font-weight: 600; text-decoration: none;">
            Nous contacter →
        </a>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
