<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'calculateur';
$pageTitle = 'Calculateur de prix';
$pageDescription = 'Estimez le coût de votre déménagement en quelques clics avec notre calculateur intelligent.';

include __DIR__ . '/includes/header.php';
?>

<style>
    .calculator-container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    .calculator-step {
        display: none;
    }
    .calculator-step.active {
        display: block;
    }
    .option-card {
        border: 2px solid #e5e7eb;
        border-radius: 0.5rem;
        padding: 1.5rem;
        margin-bottom: 1rem;
        cursor: pointer;
        transition: all 0.3s;
    }
    .option-card:hover {
        border-color: #2563eb;
        background: #eff6ff;
    }
    .option-card.selected {
        border-color: #2563eb;
        background: #eff6ff;
    }
    .option-card input[type="radio"] {
        margin-right: 1rem;
    }
    .price-summary {
        background: #eff6ff;
        border: 2px solid #2563eb;
        border-radius: 0.5rem;
        padding: 2rem;
        margin-top: 2rem;
    }
    .price-detail {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
        border-bottom: 1px solid #e5e7eb;
    }
    .price-total {
        font-size: 2rem;
        font-weight: bold;
        color: #2563eb;
        text-align: center;
        margin-top: 1rem;
    }
    .progress-bar {
        height: 8px;
        background: #e5e7eb;
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 2rem;
    }
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #2563eb, #3b82f6);
        transition: width 0.3s;
    }
    .step-indicator {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2rem;
    }
    .step-dot {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #6b7280;
    }
    .step-dot.active {
        background: #2563eb;
        color: white;
    }
    .step-dot.completed {
        background: #10b981;
        color: white;
    }
</style>

<!-- Hero Section -->
<section class="hero" style="padding: 2rem 0;">
    <div class="container">
        <div class="hero-content">
            <h2><i class="fas fa-calculator"></i> Calculateur de Prix Intelligent</h2>
            <p>Obtenez une estimation précise du coût de votre déménagement en 5 étapes</p>
        </div>
    </div>
</section>

<!-- Calculator -->
<section style="padding: 3rem 0; background-color: #f9fafb;">
    <div class="container">
        <div class="calculator-container">
            <!-- Progress Bar -->
            <div class="progress-bar">
                <div class="progress-fill" id="progressBar" style="width: 20%;"></div>
            </div>

            <!-- Step Indicators -->
            <div class="step-indicator">
                <div class="step-dot active" id="dot1">1</div>
                <div class="step-dot" id="dot2">2</div>
                <div class="step-dot" id="dot3">3</div>
                <div class="step-dot" id="dot4">4</div>
                <div class="step-dot" id="dot5">5</div>
            </div>

            <!-- Step 1: Type de logement -->
            <div class="calculator-step active" id="step1">
                <h3 style="margin-bottom: 1.5rem;"><i class="fas fa-home"></i> Type de logement</h3>
                <div class="option-card" onclick="selectOption('rooms', 'studio', 300)">
                    <input type="radio" name="rooms" value="studio">
                    <strong>Studio</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Environ 20-30m² - Base: 300€</p>
                </div>
                <div class="option-card" onclick="selectOption('rooms', '1', 450)">
                    <input type="radio" name="rooms" value="1">
                    <strong>1 chambre (T2)</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Environ 40-50m² - Base: 450€</p>
                </div>
                <div class="option-card" onclick="selectOption('rooms', '2', 700)">
                    <input type="radio" name="rooms" value="2">
                    <strong>2 chambres (T3)</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Environ 60-75m² - Base: 700€</p>
                </div>
                <div class="option-card" onclick="selectOption('rooms', '3', 1000)">
                    <input type="radio" name="rooms" value="3">
                    <strong>3 chambres (T4)</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Environ 80-100m² - Base: 1000€</p>
                </div>
                <div class="option-card" onclick="selectOption('rooms', '4+', 1500)">
                    <input type="radio" name="rooms" value="4+">
                    <strong>4+ chambres (T5+)</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Plus de 100m² - Base: 1500€</p>
                </div>
                <div class="option-card" onclick="selectOption('rooms', 'maison', 2000)">
                    <input type="radio" name="rooms" value="maison">
                    <strong>Maison complète</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Grande maison - Base: 2000€</p>
                </div>
                <button class="btn btn-primary btn-full" onclick="nextStep()" style="margin-top: 1rem;">Suivant</button>
            </div>

            <!-- Step 2: Distance -->
            <div class="calculator-step" id="step2">
                <h3 style="margin-bottom: 1.5rem;"><i class="fas fa-route"></i> Distance du déménagement</h3>
                <div class="option-card" onclick="selectOption('distance', 'local', 0)">
                    <input type="radio" name="distance" value="local">
                    <strong>Moins de 20km</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Déménagement local - Inclus</p>
                </div>
                <div class="option-card" onclick="selectOption('distance', 'medium', 100)">
                    <input type="radio" name="distance" value="medium">
                    <strong>20-50km</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Distance moyenne - +100€</p>
                </div>
                <div class="option-card" onclick="selectOption('distance', 'long', 250)">
                    <input type="radio" name="distance" value="long">
                    <strong>50-100km</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Longue distance - +250€</p>
                </div>
                <div class="option-card" onclick="selectOption('distance', 'verylong', 400)">
                    <input type="radio" name="distance" value="verylong">
                    <strong>Plus de 100km</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Très longue distance - +400€</p>
                </div>
                <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                    <button class="btn btn-secondary" onclick="prevStep()">Retour</button>
                    <button class="btn btn-primary" style="flex: 1;" onclick="nextStep()">Suivant</button>
                </div>
            </div>

            <!-- Step 3: Étages -->
            <div class="calculator-step" id="step3">
                <h3 style="margin-bottom: 1.5rem;"><i class="fas fa-building"></i> Étages et accès</h3>
                <div class="form-group">
                    <label>Étage de départ</label>
                    <select id="fromFloor" onchange="calculateFloorCost()">
                        <option value="0" data-cost="0">Rez-de-chaussée (0€)</option>
                        <option value="1" data-cost="50">1er étage (+50€)</option>
                        <option value="2" data-cost="80">2ème étage (+80€)</option>
                        <option value="3" data-cost="120">3ème étage (+120€)</option>
                        <option value="4" data-cost="150">4ème étage et plus (+150€)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Étage d'arrivée</label>
                    <select id="toFloor" onchange="calculateFloorCost()">
                        <option value="0" data-cost="0">Rez-de-chaussée (0€)</option>
                        <option value="1" data-cost="50">1er étage (+50€)</option>
                        <option value="2" data-cost="80">2ème étage (+80€)</option>
                        <option value="3" data-cost="120">3ème étage (+120€)</option>
                        <option value="4" data-cost="150">4ème étage et plus (+150€)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" id="hasElevator" onchange="calculateFloorCost()">
                        Ascenseur disponible (réduit le coût de 40%)
                    </label>
                </div>
                <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                    <button class="btn btn-secondary" onclick="prevStep()">Retour</button>
                    <button class="btn btn-primary" style="flex: 1;" onclick="nextStep()">Suivant</button>
                </div>
            </div>

            <!-- Step 4: Services supplémentaires -->
            <div class="calculator-step" id="step4">
                <h3 style="margin-bottom: 1.5rem;"><i class="fas fa-tools"></i> Services supplémentaires</h3>
                <div class="option-card" onclick="toggleService('packing', 200, this)">
                    <input type="checkbox" id="servicePacking">
                    <strong>Emballage professionnel</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Cartons et protection inclus - +200€</p>
                </div>
                <div class="option-card" onclick="toggleService('assembly', 150, this)">
                    <input type="checkbox" id="serviceAssembly">
                    <strong>Montage/Démontage de meubles</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Montage et démontage - +150€</p>
                </div>
                <div class="option-card" onclick="toggleService('lift', 250, this)">
                    <input type="checkbox" id="serviceLift">
                    <strong>Location de lift (monte-meubles)</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Pour étages élevés - +250€</p>
                </div>
                <div class="option-card" onclick="toggleService('storage', 300, this)">
                    <input type="checkbox" id="serviceStorage">
                    <strong>Stockage temporaire (1 mois)</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Garde-meubles sécurisé - +300€</p>
                </div>
                <div class="option-card" onclick="toggleService('cleaning', 180, this)">
                    <input type="checkbox" id="serviceCleaning">
                    <strong>Nettoyage de fin de bail</strong>
                    <p style="margin: 0.5rem 0 0 2rem; color: #6b7280;">Nettoyage complet - +180€</p>
                </div>
                <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                    <button class="btn btn-secondary" onclick="prevStep()">Retour</button>
                    <button class="btn btn-primary" style="flex: 1;" onclick="nextStep()">Voir le résultat</button>
                </div>
            </div>

            <!-- Step 5: Résultats -->
            <div class="calculator-step" id="step5">
                <h3 style="margin-bottom: 1.5rem; text-align: center;"><i class="fas fa-check-circle" style="color: #10b981;"></i> Estimation de votre déménagement</h3>

                <div class="price-summary">
                    <h4 style="margin-bottom: 1rem; color: #1f2937;">Détail du prix</h4>
                    <div id="priceBreakdown"></div>
                    <div class="price-total" id="totalPrice">0€</div>
                    <p style="text-align: center; color: #6b7280; margin-top: 0.5rem; font-size: 0.875rem;">
                        * Prix indicatif TTC
                    </p>
                </div>

                <div style="background: #fef3c7; padding: 1.5rem; border-radius: 0.5rem; margin-top: 2rem; border-left: 4px solid #f59e0b;">
                    <h4 style="color: #92400e; margin-bottom: 0.5rem;"><i class="fas fa-lightbulb"></i> Bon à savoir</h4>
                    <ul style="margin: 0; padding-left: 1.5rem; color: #78350f;">
                        <li>Cette estimation est basée sur les informations fournies</li>
                        <li>Le prix final peut varier selon les spécificités de votre déménagement</li>
                        <li>Demandez plusieurs devis pour comparer les offres</li>
                        <li>Les prix peuvent être négociables selon la période</li>
                    </ul>
                </div>

                <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                    <button class="btn btn-secondary" onclick="resetCalculator()">
                        <i class="fas fa-redo"></i> Recommencer
                    </button>
                    <a href="/devis.php" class="btn btn-primary" style="flex: 1; text-align: center;">
                        <i class="fas fa-file-invoice"></i> Demander des devis gratuits
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
let currentStep = 1;
let calculation = {
    base: 0,
    distance: 0,
    floors: 0,
    services: {}
};

function selectOption(name, value, cost) {
    document.querySelectorAll(`input[name="${name}"]`).forEach(input => {
        input.parentElement.classList.remove('selected');
    });

    const selected = document.querySelector(`input[name="${name}"][value="${value}"]`);
    if (selected) {
        selected.checked = true;
        selected.parentElement.classList.add('selected');

        if (name === 'rooms') calculation.base = cost;
        if (name === 'distance') calculation.distance = cost;
    }
}

function calculateFloorCost() {
    const fromFloor = document.getElementById('fromFloor');
    const toFloor = document.getElementById('toFloor');
    const hasElevator = document.getElementById('hasElevator').checked;

    const fromCost = parseInt(fromFloor.options[fromFloor.selectedIndex].dataset.cost);
    const toCost = parseInt(toFloor.options[toFloor.selectedIndex].dataset.cost);

    let total = fromCost + toCost;
    if (hasElevator && total > 0) {
        total = total * 0.6; // 40% de réduction avec ascenseur
    }

    calculation.floors = Math.round(total);
}

function toggleService(name, cost, element) {
    const checkbox = document.getElementById('service' + name.charAt(0).toUpperCase() + name.slice(1));
    checkbox.checked = !checkbox.checked;

    if (checkbox.checked) {
        element.classList.add('selected');
        calculation.services[name] = cost;
    } else {
        element.classList.remove('selected');
        delete calculation.services[name];
    }
}

function nextStep() {
    if (currentStep === 1 && calculation.base === 0) {
        alert('Veuillez sélectionner un type de logement');
        return;
    }
    if (currentStep === 2 && calculation.distance === undefined) {
        alert('Veuillez sélectionner une distance');
        return;
    }

    if (currentStep === 3) {
        calculateFloorCost();
    }

    if (currentStep === 4) {
        showResults();
    }

    if (currentStep < 5) {
        document.getElementById('step' + currentStep).classList.remove('active');
        document.getElementById('dot' + currentStep).classList.remove('active');
        document.getElementById('dot' + currentStep).classList.add('completed');

        currentStep++;

        document.getElementById('step' + currentStep).classList.add('active');
        document.getElementById('dot' + currentStep).classList.add('active');

        updateProgress();
    }
}

function prevStep() {
    if (currentStep > 1) {
        document.getElementById('step' + currentStep).classList.remove('active');
        document.getElementById('dot' + currentStep).classList.remove('active');

        currentStep--;

        document.getElementById('step' + currentStep).classList.add('active');
        document.getElementById('dot' + (currentStep + 1)).classList.remove('completed');

        updateProgress();
    }
}

function updateProgress() {
    const progress = (currentStep / 5) * 100;
    document.getElementById('progressBar').style.width = progress + '%';
}

function showResults() {
    let breakdown = '';
    let total = 0;

    // Base
    breakdown += `<div class="price-detail"><span>Base (logement)</span><strong>${calculation.base}€</strong></div>`;
    total += calculation.base;

    // Distance
    if (calculation.distance > 0) {
        breakdown += `<div class="price-detail"><span>Distance</span><strong>+${calculation.distance}€</strong></div>`;
        total += calculation.distance;
    }

    // Étages
    if (calculation.floors > 0) {
        breakdown += `<div class="price-detail"><span>Étages</span><strong>+${calculation.floors}€</strong></div>`;
        total += calculation.floors;
    }

    // Services
    for (const [service, cost] of Object.entries(calculation.services)) {
        const names = {
            packing: 'Emballage',
            assembly: 'Montage/Démontage',
            lift: 'Location de lift',
            storage: 'Stockage',
            cleaning: 'Nettoyage'
        };
        breakdown += `<div class="price-detail"><span>${names[service]}</span><strong>+${cost}€</strong></div>`;
        total += cost;
    }

    document.getElementById('priceBreakdown').innerHTML = breakdown;
    document.getElementById('totalPrice').textContent = total + '€';
}

function resetCalculator() {
    currentStep = 1;
    calculation = { base: 0, distance: 0, floors: 0, services: {} };

    // Reset all steps
    for (let i = 1; i <= 5; i++) {
        document.getElementById('step' + i).classList.remove('active');
        document.getElementById('dot' + i).classList.remove('active', 'completed');
    }

    // Reset forms
    document.querySelectorAll('.option-card').forEach(card => card.classList.remove('selected'));
    document.querySelectorAll('input[type="radio"]').forEach(input => input.checked = false);
    document.querySelectorAll('input[type="checkbox"]').forEach(input => input.checked = false);
    document.getElementById('fromFloor').selectedIndex = 0;
    document.getElementById('toFloor').selectedIndex = 0;

    // Show first step
    document.getElementById('step1').classList.add('active');
    document.getElementById('dot1').classList.add('active');
    updateProgress();
}
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
