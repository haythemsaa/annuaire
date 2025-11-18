<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'a-propos';
$pageTitle = 'À propos de nous';
$pageDescription = 'Découvrez qui nous sommes et notre mission : vous aider à trouver le meilleur déménageur en Belgique.';

include __DIR__ . '/includes/header.php';
?>

<style>
    .about-hero {
        background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
        color: white;
        padding: 5rem 0;
        text-align: center;
    }

    .about-section {
        padding: 4rem 0;
    }

    .about-section:nth-child(even) {
        background: #f9fafb;
    }

    .about-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 3rem;
        margin-top: 3rem;
    }

    .value-card {
        text-align: center;
        padding: 2rem;
        background: white;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.3s;
    }

    .value-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }

    .value-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: white;
    }

    .timeline {
        position: relative;
        padding: 2rem 0;
    }

    .timeline-item {
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        gap: 2rem;
        margin-bottom: 3rem;
        align-items: center;
    }

    .timeline-item:nth-child(even) .timeline-content:first-child {
        order: 3;
    }

    .timeline-content {
        background: white;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .timeline-dot {
        width: 20px;
        height: 20px;
        background: #2563eb;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 0 0 4px #2563eb;
    }

    .stat-big {
        font-size: 4rem;
        font-weight: bold;
        color: #2563eb;
        line-height: 1;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .team-card {
        text-align: center;
        background: white;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .team-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, #ec4899, #8b5cf6);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: white;
    }
</style>

<!-- Hero -->
<div class="about-hero">
    <div class="container">
        <h1 style="font-size: 3rem; margin-bottom: 1rem;">À propos de nous</h1>
        <p style="font-size: 1.25rem; max-width: 700px; margin: 0 auto; opacity: 0.95;">
            Nous facilitons votre déménagement en Belgique depuis 2020
        </p>
    </div>
</div>

<!-- Notre Mission -->
<section class="about-section">
    <div class="container" style="max-width: 900px;">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 2rem; color: #1f2937;">
            Notre Mission
        </h2>
        <p style="font-size: 1.25rem; line-height: 1.8; color: #6b7280; text-align: center; margin-bottom: 2rem;">
            Nous croyons que <strong style="color: #2563eb;">déménager ne devrait pas être stressant</strong>.
            Notre mission est de vous connecter avec les meilleurs déménageurs professionnels de Belgique,
            en toute transparence et simplicité.
        </p>
        <p style="font-size: 1.125rem; line-height: 1.8; color: #6b7280; text-align: center;">
            Grâce à notre plateforme, vous économisez du temps et de l'argent en comparant rapidement
            plusieurs devis personnalisés. Nous vérifions chaque entreprise pour vous garantir qualité et sérieux.
        </p>
    </div>
</section>

<!-- Nos Valeurs -->
<section class="about-section">
    <div class="container" style="max-width: 1200px;">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem; color: #1f2937;">
            Nos Valeurs
        </h2>
        <div class="about-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 style="color: #1f2937; margin-bottom: 1rem;">Confiance</h3>
                <p style="color: #6b7280; line-height: 1.6;">
                    Toutes nos entreprises partenaires sont vérifiées : licences, assurances, avis clients authentiques.
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h3 style="color: #1f2937; margin-bottom: 1rem;">Transparence</h3>
                <p style="color: #6b7280; line-height: 1.6;">
                    Prix clairs, avis vérifiés, aucun frais caché. Nous affichons tout ce que vous devez savoir.
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h3 style="color: #1f2937; margin-bottom: 1rem;">Service</h3>
                <p style="color: #6b7280; line-height: 1.6;">
                    Notre équipe est là pour vous aider à chaque étape, du premier devis jusqu'au jour du déménagement.
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 style="color: #1f2937; margin-bottom: 1rem;">Innovation</h3>
                <p style="color: #6b7280; line-height: 1.6;">
                    Calculateur intelligent, comparateur 3D, carte interactive : nous innovons pour vous simplifier la vie.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Chiffres Clés -->
<section class="about-section">
    <div class="container" style="max-width: 1200px;">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem; color: #1f2937;">
            Nos Chiffres Clés
        </h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 3rem; text-align: center;">
            <div>
                <div class="stat-big">100+</div>
                <p style="color: #6b7280; font-size: 1.125rem; margin-top: 0.5rem;">Entreprises Vérifiées</p>
            </div>
            <div>
                <div class="stat-big">5000+</div>
                <p style="color: #6b7280; font-size: 1.125rem; margin-top: 0.5rem;">Déménagements Réalisés</p>
            </div>
            <div>
                <div class="stat-big">4.8/5</div>
                <p style="color: #6b7280; font-size: 1.125rem; margin-top: 0.5rem;">Note Moyenne</p>
            </div>
            <div>
                <div class="stat-big">98%</div>
                <p style="color: #6b7280; font-size: 1.125rem; margin-top: 0.5rem;">Clients Satisfaits</p>
            </div>
        </div>
    </div>
</section>

<!-- Notre Histoire -->
<section class="about-section">
    <div class="container" style="max-width: 1000px;">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem; color: #1f2937;">
            Notre Histoire
        </h2>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3 style="color: #2563eb; margin-bottom: 0.5rem;">2020 - La Naissance</h3>
                    <p style="color: #6b7280; line-height: 1.6;">
                        Création de la plateforme avec 10 entreprises partenaires à Bruxelles.
                        Notre objectif : simplifier la recherche de déménageurs.
                    </p>
                </div>
                <div class="timeline-dot"></div>
                <div></div>
            </div>

            <div class="timeline-item">
                <div></div>
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h3 style="color: #2563eb; margin-bottom: 0.5rem;">2021 - L'Expansion</h3>
                    <p style="color: #6b7280; line-height: 1.6;">
                        Extension à toute la Belgique (Wallonie et Flandre).
                        Lancement du calculateur de prix et du comparateur d'entreprises.
                    </p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-content">
                    <h3 style="color: #2563eb; margin-bottom: 0.5rem;">2022 - Innovation</h3>
                    <p style="color: #6b7280; line-height: 1.6;">
                        Ajout de la carte interactive, de la checklist et du blog.
                        Plus de 50 entreprises vérifiées sur la plateforme.
                    </p>
                </div>
                <div class="timeline-dot"></div>
                <div></div>
            </div>

            <div class="timeline-item">
                <div></div>
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h3 style="color: #2563eb; margin-bottom: 0.5rem;">2024 - Leader Européen</h3>
                    <p style="color: #6b7280; line-height: 1.6;">
                        100+ entreprises partenaires, 5000+ déménagements réalisés.
                        Nous sommes devenus la référence en Belgique et visons l'Europe !
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Notre Équipe -->
<section class="about-section">
    <div class="container" style="max-width: 1200px;">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem; color: #1f2937;">
            Notre Équipe
        </h2>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-avatar">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3 style="color: #1f2937; margin-bottom: 0.5rem;">Marc Dubois</h3>
                <p style="color: #2563eb; font-weight: 600; margin-bottom: 1rem;">CEO & Fondateur</p>
                <p style="color: #6b7280; font-size: 0.875rem;">
                    Expert en logistique avec 15 ans d'expérience dans le secteur du déménagement.
                </p>
            </div>

            <div class="team-card">
                <div class="team-avatar">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h3 style="color: #1f2937; margin-bottom: 0.5rem;">Sophie Laurent</h3>
                <p style="color: #2563eb; font-weight: 600; margin-bottom: 1rem;">Directrice Qualité</p>
                <p style="color: #6b7280; font-size: 0.875rem;">
                    Responsable de la vérification et de l'accréditation de nos entreprises partenaires.
                </p>
            </div>

            <div class="team-card">
                <div class="team-avatar">
                    <i class="fas fa-user-cog"></i>
                </div>
                <h3 style="color: #1f2937; margin-bottom: 0.5rem;">Pierre Martin</h3>
                <p style="color: #2563eb; font-weight: 600; margin-bottom: 1rem;">CTO</p>
                <p style="color: #6b7280; font-size: 0.875rem;">
                    Développeur de nos outils innovants : calculateur, comparateur, carte interactive.
                </p>
            </div>

            <div class="team-card">
                <div class="team-avatar">
                    <i class="fas fa-user-headset"></i>
                </div>
                <h3 style="color: #1f2937; margin-bottom: 0.5rem;">Julie Leroy</h3>
                <p style="color: #2563eb; font-weight: 600; margin-bottom: 1rem;">Service Client</p>
                <p style="color: #6b7280; font-size: 0.875rem;">
                    À votre écoute pour vous accompagner dans toutes vos démarches de déménagement.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Pourquoi Nous Choisir -->
<section class="about-section">
    <div class="container" style="max-width: 900px;">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem; color: #1f2937;">
            Pourquoi Nous Choisir ?
        </h2>
        <div style="display: grid; gap: 2rem;">
            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                <h3 style="color: #2563eb; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-check-circle"></i> 100% Gratuit et Sans Engagement
                </h3>
                <p style="color: #6b7280; line-height: 1.8;">
                    Notre service est entièrement gratuit. Vous recevez des devis sans aucune obligation d'accepter.
                    Comparez tranquillement et choisissez l'offre qui vous convient.
                </p>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                <h3 style="color: #2563eb; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-check-circle"></i> Entreprises Vérifiées et Assurées
                </h3>
                <p style="color: #6b7280; line-height: 1.8;">
                    Chaque entreprise est rigoureusement vérifiée : licences professionnelles, assurances RC,
                    avis clients authentiques, expérience minimum de 2 ans.
                </p>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                <h3 style="color: #2563eb; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-check-circle"></i> Économisez jusqu'à 40%
                </h3>
                <p style="color: #6b7280; line-height: 1.8;">
                    En comparant plusieurs devis, vous obtenez les meilleurs prix. Nos utilisateurs économisent
                    en moyenne 30-40% par rapport à une demande directe.
                </p>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                <h3 style="color: #2563eb; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-check-circle"></i> Outils Innovants Uniques
                </h3>
                <p style="color: #6b7280; line-height: 1.8;">
                    Calculateur de prix intelligent, comparateur 3 entreprises, carte interactive,
                    checklist 38 tâches, blog conseils d'experts... Des outils que vous ne trouverez nulle part ailleurs !
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container">
        <h2>Prêt à déménager avec les meilleurs ?</h2>
        <p>Rejoignez les 5000+ clients qui nous ont fait confiance</p>
        <a href="/devis.php" class="btn btn-primary btn-large">
            <i class="fas fa-file-invoice"></i> Demander un devis gratuit
        </a>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
