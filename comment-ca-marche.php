<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'comment-ca-marche';
$pageTitle = 'Comment ça marche';
$pageDescription = 'Découvrez comment notre plateforme vous aide à trouver le meilleur déménageur en 4 étapes simples. Processus transparent et efficace.';

include __DIR__ . '/includes/header.php';
?>

<style>
    .process-step {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        margin-bottom: 6rem;
    }
    .process-step:nth-child(even) {
        direction: rtl;
    }
    .process-step:nth-child(even) > * {
        direction: ltr;
    }
    .step-number {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
        box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);
    }
    .step-visual {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        border-radius: 1rem;
        padding: 3rem;
        text-align: center;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .step-visual i {
        font-size: 6rem;
        color: #2563eb;
        margin-bottom: 1rem;
        opacity: 0.8;
    }
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }
    .feature-card {
        background: white;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
        border: 2px solid transparent;
    }
    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        border-color: #2563eb;
    }
    .feature-card i {
        font-size: 3rem;
        color: #2563eb;
        margin-bottom: 1rem;
    }
    @media (max-width: 968px) {
        .process-step {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        .process-step:nth-child(even) {
            direction: ltr;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h2><i class="fas fa-question-circle"></i> Comment ça marche ?</h2>
            <p>Trouvez le meilleur déménageur en 4 étapes simples et rapides</p>
        </div>
    </div>
</section>

<!-- Process Steps -->
<section style="padding: 4rem 0;">
    <div class="container" style="max-width: 1100px;">

        <!-- Step 1 -->
        <div class="process-step">
            <div>
                <div class="step-number">1</div>
                <h2 style="font-size: 2rem; margin-bottom: 1rem; color: #1f2937;">
                    Décrivez votre projet
                </h2>
                <p style="font-size: 1.125rem; color: #6b7280; line-height: 1.8; margin-bottom: 1.5rem;">
                    Remplissez notre formulaire en quelques minutes. Indiquez la taille de votre logement,
                    la distance, les services souhaités et la date de déménagement.
                </p>
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span>Formulaire simple et rapide (2 minutes)</span>
                    </li>
                    <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span>100% gratuit et sans engagement</span>
                    </li>
                    <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span>Vos données restent confidentielles</span>
                    </li>
                </ul>
                <a href="/devis.php" class="btn btn-primary" style="margin-top: 1.5rem; display: inline-block;">
                    Commencer maintenant <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="step-visual">
                <i class="fas fa-edit"></i>
                <h3 style="color: #2563eb; margin-bottom: 0.5rem;">Formulaire intelligent</h3>
                <p style="color: #6b7280;">Notre calculateur vous aide à estimer le coût</p>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="process-step">
            <div>
                <div class="step-number">2</div>
                <h2 style="font-size: 2rem; margin-bottom: 1rem; color: #1f2937;">
                    Recevez des devis personnalisés
                </h2>
                <p style="font-size: 1.125rem; color: #6b7280; line-height: 1.8; margin-bottom: 1.5rem;">
                    Nous transmettons votre demande aux entreprises qui correspondent à vos critères.
                    Vous recevez jusqu'à 5 devis détaillés sous 24-48h.
                </p>
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span>Jusqu'à 5 devis différents</span>
                    </li>
                    <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span>Entreprises vérifiées et certifiées</span>
                    </li>
                    <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span>Réponse rapide (24-48h)</span>
                    </li>
                </ul>
            </div>
            <div class="step-visual">
                <i class="fas fa-file-invoice-dollar"></i>
                <h3 style="color: #2563eb; margin-bottom: 0.5rem;">Devis détaillés</h3>
                <p style="color: #6b7280;">Prix transparents et services inclus</p>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="process-step">
            <div>
                <div class="step-number">3</div>
                <h2 style="font-size: 2rem; margin-bottom: 1rem; color: #1f2937;">
                    Comparez et choisissez
                </h2>
                <p style="font-size: 1.125rem; color: #6b7280; line-height: 1.8; margin-bottom: 1.5rem;">
                    Utilisez notre comparateur pour analyser les offres côte à côte. Consultez les avis clients,
                    les services inclus et les tarifs pour faire le meilleur choix.
                </p>
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span>Comparateur d'entreprises intégré</span>
                    </li>
                    <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span>Avis clients vérifiés</span>
                    </li>
                    <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span>Aucune obligation</span>
                    </li>
                </ul>
                <a href="/compare.php" class="btn btn-primary" style="margin-top: 1.5rem; display: inline-block;">
                    Voir le comparateur <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="step-visual">
                <i class="fas fa-balance-scale"></i>
                <h3 style="color: #2563eb; margin-bottom: 0.5rem;">Comparaison facile</h3>
                <p style="color: #6b7280;">Toutes les infos en un coup d'œil</p>
            </div>
        </div>

        <!-- Step 4 -->
        <div class="process-step">
            <div>
                <div class="step-number">4</div>
                <h2 style="font-size: 2rem; margin-bottom: 1rem; color: #1f2937;">
                    Réservez et déménagez sereinement
                </h2>
                <p style="font-size: 1.125rem; color: #6b7280; line-height: 1.8; margin-bottom: 1.5rem;">
                    Contactez directement l'entreprise choisie pour finaliser les détails.
                    Le jour J, profitez d'un déménagement professionnel et sans stress.
                </p>
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span>Contact direct avec l'entreprise</span>
                    </li>
                    <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span>Service professionnel garanti</span>
                    </li>
                    <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <span>Suivi de votre déménagement</span>
                    </li>
                </ul>
                <a href="/checklist.php" class="btn btn-primary" style="margin-top: 1.5rem; display: inline-block;">
                    Voir la checklist <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="step-visual">
                <i class="fas fa-truck-loading"></i>
                <h3 style="color: #2563eb; margin-bottom: 0.5rem;">Déménagement réussi</h3>
                <p style="color: #6b7280;">Des professionnels à votre service</p>
            </div>
        </div>

    </div>
</section>

<!-- Features Section -->
<section style="padding: 4rem 0; background: #f9fafb;">
    <div class="container">
        <h2 class="section-title">Pourquoi choisir notre plateforme ?</h2>
        <div class="feature-grid">
            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3 style="margin-bottom: 0.5rem;">Entreprises vérifiées</h3>
                <p style="color: #6b7280;">Toutes nos entreprises partenaires sont vérifiées et assurées</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-euro-sign"></i>
                <h3 style="margin-bottom: 0.5rem;">100% gratuit</h3>
                <p style="color: #6b7280;">Notre service de comparaison est entièrement gratuit</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-clock"></i>
                <h3 style="margin-bottom: 0.5rem;">Gain de temps</h3>
                <p style="color: #6b7280;">Recevez plusieurs devis en une seule demande</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-chart-line"></i>
                <h3 style="margin-bottom: 0.5rem;">Meilleurs prix</h3>
                <p style="color: #6b7280;">La concurrence vous fait économiser jusqu'à 30%</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-star"></i>
                <h3 style="margin-bottom: 0.5rem;">Avis certifiés</h3>
                <p style="color: #6b7280;">Consultez les avis réels de clients vérifiés</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-headset"></i>
                <h3 style="margin-bottom: 0.5rem;">Support dédié</h3>
                <p style="color: #6b7280;">Notre équipe vous accompagne tout au long du processus</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section style="padding: 4rem 0; background: linear-gradient(135deg, #2563eb, #3b82f6); color: white;">
    <div class="container">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem;">Nos chiffres parlent d'eux-mêmes</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 3rem; text-align: center;">
            <div>
                <div style="font-size: 3.5rem; font-weight: bold; margin-bottom: 0.5rem;">10+</div>
                <div style="font-size: 1.125rem; opacity: 0.9;">Entreprises partenaires</div>
            </div>
            <div>
                <div style="font-size: 3.5rem; font-weight: bold; margin-bottom: 0.5rem;">1000+</div>
                <div style="font-size: 1.125rem; opacity: 0.9;">Déménagements réalisés</div>
            </div>
            <div>
                <div style="font-size: 3.5rem; font-weight: bold; margin-bottom: 0.5rem;">4.8/5</div>
                <div style="font-size: 1.125rem; opacity: 0.9;">Note moyenne</div>
            </div>
            <div>
                <div style="font-size: 3.5rem; font-weight: bold; margin-bottom: 0.5rem;">24h</div>
                <div style="font-size: 1.125rem; opacity: 0.9;">Délai de réponse moyen</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Prêt à trouver votre déménageur idéal ?</h2>
        <p>Commencez dès maintenant et recevez jusqu'à 5 devis gratuits</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
            <a href="/devis.php" class="btn btn-primary btn-large">
                <i class="fas fa-file-invoice"></i> Demander des devis gratuits
            </a>
            <a href="/calculateur.php" class="btn" style="background: white; color: #2563eb;">
                <i class="fas fa-calculator"></i> Estimer mon budget
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
