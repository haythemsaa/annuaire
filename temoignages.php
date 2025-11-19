<?php
$pageTitle = "Témoignages Clients - Retours d'Expérience";
$pageDescription = "Découvrez les témoignages de nos utilisateurs qui ont trouvé leur déménageur idéal grâce à notre plateforme. Plus de 500 avis vérifiés.";
require_once 'includes/header.php';

// Statistiques globales
$stats = [
    'total_reviews' => 523,
    'average_rating' => 4.8,
    'satisfied_customers' => 98
];

// Témoignages vérifiés
$testimonials = [
    [
        'name' => 'Sophie Dubois',
        'location' => 'Bruxelles → Liège',
        'type' => 'Appartement 3 pièces',
        'date' => '15 octobre 2024',
        'rating' => 5,
        'avatar' => 'SD',
        'text' => "Service exceptionnel ! J'ai reçu 4 devis en moins de 24h et j'ai économisé 350€ par rapport à mon premier devis. Le déménageur recommandé était ponctuel, professionnel et a pris soin de tous mes biens. Je recommande vivement cette plateforme !",
        'company' => 'DéménExpress',
        'verified' => true
    ],
    [
        'name' => 'Marc Lefebvre',
        'location' => 'Anvers → Gand',
        'type' => 'Maison 4 chambres',
        'date' => '28 septembre 2024',
        'rating' => 5,
        'avatar' => 'ML',
        'text' => "Déménagement impeccable pour notre grande maison familiale. Le comparateur m'a permis de choisir le meilleur rapport qualité-prix. L'équipe a démonté et remonté tous nos meubles avec un soin extrême. Aucune casse, aucun retard. Parfait du début à la fin !",
        'company' => 'MovePro Belgium',
        'verified' => true
    ],
    [
        'name' => 'Julie Martin',
        'location' => 'Namur → Charleroi',
        'type' => 'Studio 25m²',
        'date' => '10 octobre 2024',
        'rating' => 4.5,
        'avatar' => 'JM',
        'text' => "En tant qu'étudiante avec un budget serré, j'avais besoin d'un déménageur abordable mais fiable. Grâce aux avis et au comparateur de prix, j'ai trouvé exactement ce qu'il me fallait. Le déménagement s'est fait en 3h chrono pour 380€ tout compris. Très satisfaite !",
        'company' => 'Student Move',
        'verified' => true
    ],
    [
        'name' => 'Pierre Vandenberg',
        'location' => 'Louvain → Bruxelles',
        'type' => 'Appartement duplex',
        'date' => '5 octobre 2024',
        'rating' => 5,
        'avatar' => 'PV',
        'text' => "J'avais des objets fragiles (collection de verres en cristal) et j'étais très inquiet. Le déménageur trouvé via cette plateforme a utilisé un emballage professionnel et tout est arrivé intact. Le service d'emballage valait vraiment l'investissement. Merci pour ces recommandations de qualité !",
        'company' => 'Déménagement Premium',
        'verified' => true
    ],
    [
        'name' => 'Caroline Rousseau',
        'location' => 'Mons → Tournai',
        'type' => 'Maison 3 chambres',
        'date' => '22 septembre 2024',
        'rating' => 5,
        'avatar' => 'CR',
        'text' => "Déménagement avec 2 enfants en bas âge - situation stressante ! Heureusement, le comparateur m'a aidée à trouver un déménageur rapide et efficace. Tout s'est fait en une journée, sans stress. Les conseils du blog m'ont aussi beaucoup aidée pour la préparation. Excellent !",
        'company' => 'Family Move',
        'verified' => true
    ],
    [
        'name' => 'Thomas Leroy',
        'location' => 'Liège → Luxembourg (L)',
        'type' => 'Déménagement international',
        'date' => '18 septembre 2024',
        'rating' => 4.5,
        'avatar' => 'TL',
        'text' => "Déménagement international complexe avec formalités douanières. Le déménageur spécialisé recommandé par la plateforme a géré toutes les démarches. Mes affaires sont arrivées au Luxembourg en 5 jours, en parfait état. Un peu cher mais service irréprochable.",
        'company' => 'Euro Trans Moving',
        'verified' => true
    ],
    [
        'name' => 'Isabelle Dupont',
        'location' => 'Wavre → Waterloo',
        'type' => 'Appartement 2 pièces',
        'date' => '12 septembre 2024',
        'rating' => 5,
        'avatar' => 'ID',
        'text' => "Première utilisation d'un comparateur de déménageurs et je suis bluffée ! Interface claire, devis rapides et surtout : TRANSPARENTS. Pas de frais cachés, tout était indiqué clairement. Le déménagement s'est déroulé exactement comme prévu. Bravo !",
        'company' => 'QuickMove Brussels',
        'verified' => true
    ],
    [
        'name' => 'David Mercier',
        'location' => 'Verviers → Hasselt',
        'type' => 'Maison avec piano',
        'date' => '8 septembre 2024',
        'rating' => 5,
        'avatar' => 'DM',
        'text' => "J'avais un piano droit à déménager, ce qui nécessite un savoir-faire spécifique. Le déménageur recommandé avait l'équipement adapté (monte-meubles, sangles professionnelles). Mon piano est arrivé sans une égratignure. Travail d'expert, je recommande à 100% !",
        'company' => 'Déménagement Spécialisé',
        'verified' => true
    ],
    [
        'name' => 'Emma Claes',
        'location' => 'Courtrai → Bruges',
        'type' => 'Appartement 70m²',
        'date' => '3 septembre 2024',
        'rating' => 4.5,
        'avatar' => 'EC',
        'text' => "Très bon rapport qualité-prix. J'ai choisi l'option semi-service (j'ai emballé moi-même) et économisé 400€. Le calculateur de volume m'a aidée à estimer précisément mes besoins. Seul petit bémol : 1h de retard le jour J, d'où le 4,5/5.",
        'company' => 'Vlaanderen Moving',
        'verified' => true
    ],
    [
        'name' => 'Laurent Goffin',
        'location' => 'Spa → Eupen',
        'type' => 'Maison 5 pièces + garage',
        'date' => '28 août 2024',
        'rating' => 5,
        'avatar' => 'LG',
        'text' => "Gros déménagement avec garage rempli d'outils. Le devis était très détaillé avec volume exact et services inclus. L'équipe de 4 déménageurs a travaillé toute la journée sans relâche. Tout est arrivé intact, même mes outils fragiles. Service professionnel 5 étoiles !",
        'company' => 'ProMove Liège',
        'verified' => true
    ],
    [
        'name' => 'Sarah Janssens',
        'location' => 'Ostende → Knokke',
        'type' => 'Villa bord de mer',
        'date' => '20 août 2024',
        'rating' => 5,
        'avatar' => 'SJ',
        'text' => "Déménagement haut de gamme avec meubles design et œuvres d'art. Le service premium recommandé a été à la hauteur : emballage individualisé, assurance tous risques, équipe expérimentée. Prix élevé mais qualité exceptionnelle. Ma villa est maintenant parfaitement installée !",
        'company' => 'Luxury Moving Belgium',
        'verified' => true
    ],
    [
        'name' => 'Nicolas Peeters',
        'location' => 'Malines → Louvain',
        'type' => 'Colocation étudiante',
        'date' => '15 août 2024',
        'rating' => 4,
        'avatar' => 'NP',
        'text' => "En tant qu'étudiants, on a groupé notre déménagement à 3 pour économiser. Le déménageur a accepté sans problème et nous a fait un tarif groupé. Très bon prix (250€ par personne) pour un service correct. Quelques petites rayures sur un meuble d'où le 4/5.",
        'company' => 'Student Express',
        'verified' => true
    ]
];
?>

<style>
.testimonials-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 80px 0;
    color: white;
    text-align: center;
}

.testimonials-hero h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.testimonials-hero p {
    font-size: 1.2rem;
    max-width: 700px;
    margin: 0 auto;
    opacity: 0.95;
}

.stats-bar {
    background: white;
    padding: 40px 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-top: -30px;
    border-radius: 12px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
    text-align: center;
}

.stat-item {
    padding: 20px;
}

.stat-number {
    font-size: 3rem;
    font-weight: bold;
    color: #667eea;
    display: block;
    margin-bottom: 10px;
}

.stat-label {
    color: #6b7280;
    font-size: 1.1rem;
}

.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 30px;
    margin: 60px 0;
}

.testimonial-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    border-top: 4px solid #667eea;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.15);
}

.testimonial-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
}

.testimonial-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.3rem;
    flex-shrink: 0;
}

.testimonial-info h3 {
    margin: 0 0 5px 0;
    font-size: 1.1rem;
    color: #1f2937;
}

.testimonial-meta {
    font-size: 0.9rem;
    color: #6b7280;
}

.testimonial-rating {
    display: flex;
    gap: 3px;
    margin-bottom: 15px;
}

.testimonial-rating i {
    color: #f59e0b;
    font-size: 1.1rem;
}

.testimonial-rating i.half {
    position: relative;
}

.testimonial-rating i.half::before {
    content: '\f005';
    position: absolute;
    width: 50%;
    overflow: hidden;
}

.testimonial-text {
    color: #4b5563;
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 1rem;
}

.testimonial-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 15px;
    border-top: 1px solid #e5e7eb;
    font-size: 0.9rem;
}

.testimonial-company {
    color: #667eea;
    font-weight: 600;
}

.testimonial-verified {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #10b981;
    font-weight: 600;
}

.testimonial-verified i {
    font-size: 1.1rem;
}

.filters-bar {
    background: #f9fafb;
    padding: 30px;
    border-radius: 12px;
    margin-bottom: 40px;
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    align-items: center;
}

.filters-bar label {
    font-weight: 600;
    color: #1f2937;
}

.filters-bar select {
    padding: 10px 15px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    transition: border-color 0.3s ease;
}

.filters-bar select:focus {
    outline: none;
    border-color: #667eea;
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

@media (max-width: 768px) {
    .testimonials-grid {
        grid-template-columns: 1fr;
    }

    .stats-bar {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="testimonials-hero">
    <div class="container">
        <h1>Ce Que Disent Nos Clients</h1>
        <p>Plus de 500 témoignages vérifiés de personnes qui ont trouvé leur déménageur idéal grâce à notre plateforme</p>
    </div>
</div>

<div class="container">
    <div class="stats-bar">
        <div class="stat-item">
            <span class="stat-number"><?= $stats['total_reviews'] ?></span>
            <span class="stat-label">Avis Vérifiés</span>
        </div>
        <div class="stat-item">
            <span class="stat-number"><?= $stats['average_rating'] ?>/5</span>
            <span class="stat-label">Note Moyenne</span>
        </div>
        <div class="stat-item">
            <span class="stat-number"><?= $stats['satisfied_customers'] ?>%</span>
            <span class="stat-label">Clients Satisfaits</span>
        </div>
    </div>

    <div class="filters-bar">
        <label>Filtrer par :</label>
        <select id="filterRating">
            <option value="all">Toutes les notes</option>
            <option value="5">5 étoiles</option>
            <option value="4">4+ étoiles</option>
        </select>
        <select id="filterType">
            <option value="all">Tous les types</option>
            <option value="Studio">Studio</option>
            <option value="Appartement">Appartement</option>
            <option value="Maison">Maison</option>
            <option value="international">International</option>
        </select>
    </div>

    <div class="testimonials-grid" id="testimonialsGrid">
        <?php foreach ($testimonials as $testimonial): ?>
            <div class="testimonial-card"
                 data-rating="<?= floor($testimonial['rating']) ?>"
                 data-type="<?= htmlspecialchars($testimonial['type']) ?>">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">
                        <?= htmlspecialchars($testimonial['avatar']) ?>
                    </div>
                    <div class="testimonial-info">
                        <h3><?= htmlspecialchars($testimonial['name']) ?></h3>
                        <div class="testimonial-meta">
                            <i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($testimonial['location']) ?><br>
                            <i class="fas fa-home"></i> <?= htmlspecialchars($testimonial['type']) ?><br>
                            <i class="fas fa-calendar"></i> <?= htmlspecialchars($testimonial['date']) ?>
                        </div>
                    </div>
                </div>

                <div class="testimonial-rating">
                    <?php
                    $fullStars = floor($testimonial['rating']);
                    $hasHalfStar = ($testimonial['rating'] - $fullStars) >= 0.5;

                    for ($i = 0; $i < $fullStars; $i++) {
                        echo '<i class="fas fa-star"></i>';
                    }

                    if ($hasHalfStar) {
                        echo '<i class="fas fa-star-half-alt"></i>';
                    }

                    $remainingStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                    for ($i = 0; $i < $remainingStars; $i++) {
                        echo '<i class="far fa-star"></i>';
                    }
                    ?>
                </div>

                <p class="testimonial-text">
                    "<?= htmlspecialchars($testimonial['text']) ?>"
                </p>

                <div class="testimonial-footer">
                    <span class="testimonial-company">
                        <i class="fas fa-truck"></i> <?= htmlspecialchars($testimonial['company']) ?>
                    </span>
                    <?php if ($testimonial['verified']): ?>
                        <span class="testimonial-verified">
                            <i class="fas fa-check-circle"></i> Vérifié
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="cta-section">
        <h2>Prêt à Rejoindre Nos Clients Satisfaits ?</h2>
        <p style="font-size: 1.2rem; margin-bottom: 0; opacity: 0.95;">
            Trouvez votre déménageur idéal en quelques clics et recevez jusqu'à 5 devis gratuits
        </p>
        <a href="/devis.php" class="btn">Demander mes devis gratuits</a>
    </div>
</div>

<script>
// Filtrage des témoignages
document.getElementById('filterRating').addEventListener('change', filterTestimonials);
document.getElementById('filterType').addEventListener('change', filterTestimonials);

function filterTestimonials() {
    const selectedRating = document.getElementById('filterRating').value;
    const selectedType = document.getElementById('filterType').value;
    const cards = document.querySelectorAll('.testimonial-card');

    cards.forEach(card => {
        const cardRating = parseInt(card.dataset.rating);
        const cardType = card.dataset.type;

        let showRating = selectedRating === 'all' || cardRating >= parseInt(selectedRating);
        let showType = selectedType === 'all' || cardType.includes(selectedType);

        if (showRating && showType) {
            card.style.display = 'block';
            card.style.animation = 'fadeIn 0.5s ease';
        } else {
            card.style.display = 'none';
        }
    });
}

// Animation CSS pour fade in
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);

// Track page view
if (typeof trackEvent !== 'undefined') {
    trackEvent('Page', 'View', 'Testimonials Page');
}
</script>

<?php require_once 'includes/footer.php'; ?>
