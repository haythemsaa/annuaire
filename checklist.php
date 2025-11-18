<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'checklist';
$pageTitle = 'Checklist de déménagement';
$pageDescription = 'Checklist complète et interactive pour organiser votre déménagement étape par étape. Ne rien oublier !';

include __DIR__ . '/includes/header.php';
?>

<style>
    .checklist-container {
        max-width: 900px;
        margin: 0 auto;
    }
    .checklist-section {
        background: white;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
    }
    .checklist-item {
        display: flex;
        align-items: start;
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb;
        cursor: pointer;
        transition: background 0.2s;
    }
    .checklist-item:last-child {
        border-bottom: none;
    }
    .checklist-item:hover {
        background: #f9fafb;
    }
    .checklist-item.completed {
        opacity: 0.6;
    }
    .checklist-item.completed .item-text {
        text-decoration: line-through;
    }
    .checklist-checkbox {
        width: 24px;
        height: 24px;
        min-width: 24px;
        border: 2px solid #d1d5db;
        border-radius: 6px;
        margin-right: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }
    .checklist-item.completed .checklist-checkbox {
        background: #10b981;
        border-color: #10b981;
    }
    .checklist-checkbox i {
        color: white;
        display: none;
    }
    .checklist-item.completed .checklist-checkbox i {
        display: block;
    }
    .progress-section {
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        color: white;
        padding: 2rem;
        border-radius: 0.5rem;
        text-align: center;
        margin-bottom: 2rem;
    }
    .progress-bar-container {
        background: rgba(255,255,255,0.2);
        height: 30px;
        border-radius: 15px;
        overflow: hidden;
        margin: 1rem 0;
    }
    .progress-bar-fill {
        background: white;
        height: 100%;
        transition: width 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #2563eb;
    }
</style>

<!-- Hero Section -->
<section class="hero" style="padding: 2rem 0;">
    <div class="container">
        <div class="hero-content">
            <h2><i class="fas fa-tasks"></i> Checklist Interactive de Déménagement</h2>
            <p>Ne rien oublier ! Suivez chaque étape et cochez au fur et à mesure</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section style="padding: 3rem 0; background-color: #f9fafb;">
    <div class="container">
        <div class="checklist-container">

            <!-- Progress -->
            <div class="progress-section">
                <h3 style="margin-bottom: 1rem;">Votre progression</h3>
                <div class="progress-bar-container">
                    <div class="progress-bar-fill" id="progressBar" style="width: 0%;">0%</div>
                </div>
                <p id="progressText">0 tâche sur 38 complétées</p>
                <button class="btn" style="background: white; color: #2563eb; margin-top: 1rem;" onclick="resetChecklist()">
                    <i class="fas fa-redo"></i> Réinitialiser
                </button>
                <button class="btn" style="background: rgba(255,255,255,0.2); color: white; margin-top: 1rem; margin-left: 0.5rem;" onclick="printChecklist()">
                    <i class="fas fa-print"></i> Imprimer
                </button>
            </div>

            <!-- 2-3 mois avant -->
            <div class="checklist-section">
                <h3 style="color: #2563eb; margin-bottom: 1.5rem;">
                    <i class="fas fa-calendar-alt"></i> 2-3 mois avant le déménagement
                </h3>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Faire le tri de vos affaires (donner, vendre, jeter)</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Demander plusieurs devis de déménagement (minimum 3)</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Comparer les offres et choisir votre déménageur</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Signer le contrat avec l'entreprise de déménagement</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Donner votre préavis au propriétaire (3 mois généralement)</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Rechercher et visiter le nouveau logement</div>
                </div>
            </div>

            <!-- 1 mois avant -->
            <div class="checklist-section">
                <h3 style="color: #2563eb; margin-bottom: 1.5rem;">
                    <i class="fas fa-calendar-check"></i> 1 mois avant le déménagement
                </h3>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Commander ou récupérer des cartons de déménagement</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Acheter le matériel d'emballage (papier bulle, scotch, marqueurs)</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Commencer à emballer les objets peu utilisés</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Faire votre changement d'adresse à La Poste</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Prévenir votre banque de votre changement d'adresse</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Prévenir votre assurance habitation</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Demander le transfert de vos contrats (électricité, gaz, internet)</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Inscrire vos enfants dans leur nouvelle école</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Trouver un nouveau médecin traitant si nécessaire</div>
                </div>
            </div>

            <!-- 2 semaines avant -->
            <div class="checklist-section">
                <h3 style="color: #2563eb; margin-bottom: 1.5rem;">
                    <i class="fas fa-calendar-week"></i> 2 semaines avant le déménagement
                </h3>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Confirmer la date avec l'entreprise de déménagement</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Vider et nettoyer le congélateur</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Faire l'inventaire de vos meubles et cartons</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Étiqueter tous les cartons (contenu + pièce de destination)</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Prendre rendez-vous pour l'état des lieux de sortie</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Résilier vos abonnements (salle de sport, magazines, etc.)</div>
                </div>
            </div>

            <!-- 1 semaine avant -->
            <div class="checklist-section">
                <h3 style="color: #2563eb; margin-bottom: 1.5rem;">
                    <i class="fas fa-calendar-day"></i> 1 semaine avant le déménagement
                </h3>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Finir d'emballer toutes vos affaires</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Préparer un sac avec l'essentiel pour les premiers jours</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Vider et nettoyer le réfrigérateur</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Relever les compteurs (eau, gaz, électricité)</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Récupérer les clés du nouveau logement</div>
                </div>
            </div>

            <!-- Le jour J -->
            <div class="checklist-section">
                <h3 style="color: #2563eb; margin-bottom: 1.5rem;">
                    <i class="fas fa-truck-moving"></i> Le jour du déménagement
                </h3>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Accueillir les déménageurs et leur expliquer l'organisation</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Vérifier que tous les cartons et meubles sont chargés</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Faire un dernier tour de l'ancien logement</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Fermer eau, gaz et électricité</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Faire l'état des lieux de sortie</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Rendre les clés</div>
                </div>
            </div>

            <!-- Après le déménagement -->
            <div class="checklist-section">
                <h3 style="color: #2563eb; margin-bottom: 1.5rem;">
                    <i class="fas fa-clipboard-check"></i> Après le déménagement
                </h3>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Vérifier que tout a été livré et en bon état</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Déballer les affaires essentielles (chambre, salle de bain, cuisine)</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Mettre à jour votre adresse à la mairie (dans les 8 jours)</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Mettre à jour votre carte grise</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Prévenir votre employeur</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Mettre à jour votre adresse auprès de la sécurité sociale</div>
                </div>
                <div class="checklist-item" onclick="toggleItem(this)">
                    <div class="checklist-checkbox"><i class="fas fa-check"></i></div>
                    <div class="item-text">Prévenir les impôts de votre changement d'adresse</div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
// Load saved progress from localStorage
let completedItems = JSON.parse(localStorage.getItem('checklistProgress') || '[]');

// Initialize checklist on page load
document.addEventListener('DOMContentLoaded', function() {
    completedItems.forEach(index => {
        const items = document.querySelectorAll('.checklist-item');
        if (items[index]) {
            items[index].classList.add('completed');
        }
    });
    updateProgress();
});

function toggleItem(element) {
    const items = Array.from(document.querySelectorAll('.checklist-item'));
    const index = items.indexOf(element);

    element.classList.toggle('completed');

    if (element.classList.contains('completed')) {
        if (!completedItems.includes(index)) {
            completedItems.push(index);
        }
    } else {
        completedItems = completedItems.filter(i => i !== index);
    }

    // Save to localStorage
    localStorage.setItem('checklistProgress', JSON.stringify(completedItems));

    updateProgress();
}

function updateProgress() {
    const totalItems = document.querySelectorAll('.checklist-item').length;
    const completedCount = document.querySelectorAll('.checklist-item.completed').length;
    const percentage = Math.round((completedCount / totalItems) * 100);

    document.getElementById('progressBar').style.width = percentage + '%';
    document.getElementById('progressBar').textContent = percentage + '%';
    document.getElementById('progressText').textContent = completedCount + ' tâche' + (completedCount > 1 ? 's' : '') + ' sur ' + totalItems + ' complétées';
}

function resetChecklist() {
    if (confirm('Êtes-vous sûr de vouloir réinitialiser toute la checklist ?')) {
        completedItems = [];
        localStorage.removeItem('checklistProgress');
        document.querySelectorAll('.checklist-item').forEach(item => {
            item.classList.remove('completed');
        });
        updateProgress();
    }
}

function printChecklist() {
    window.print();
}

// Print styles
const style = document.createElement('style');
style.textContent = `
    @media print {
        .header, .footer, .hero, .btn, .cta-section, .progress-section button {
            display: none !important;
        }
        .checklist-section {
            page-break-inside: avoid;
            box-shadow: none;
            border: 1px solid #e5e7eb;
        }
    }
`;
document.head.appendChild(style);
</script>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Besoin d'aide pour votre déménagement ?</h2>
        <p>Trouvez les meilleurs professionnels et obtenez des devis gratuits</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
            <a href="/devis.php" class="btn btn-primary btn-large">
                <i class="fas fa-file-invoice"></i> Demander des devis
            </a>
            <a href="/conseils.php" class="btn" style="background: white; color: #2563eb;">
                <i class="fas fa-lightbulb"></i> Lire nos conseils
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
