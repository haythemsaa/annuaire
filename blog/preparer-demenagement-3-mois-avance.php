<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/functions.php';

$currentPage = 'blog';
$pageTitle = 'Comment préparer son déménagement 3 mois à l\'avance';
$pageDescription = 'Un déménagement réussi se prépare bien en avance. Planning détaillé étape par étape pour ne rien oublier et éviter le stress.';

include __DIR__ . '/../includes/header.php';

// Article Schema.org
$articleSchema = [
    "@context" => "https://schema.org",
    "@type" => "BlogPosting",
    "headline" => "Comment préparer son déménagement 3 mois à l'avance",
    "description" => "Un déménagement réussi se prépare bien en avance. Découvrez notre planning détaillé pour ne rien oublier et éviter le stress de dernière minute.",
    "image" => "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1200",
    "author" => [
        "@type" => "Person",
        "name" => "Marie Dubois"
    ],
    "publisher" => [
        "@type" => "Organization",
        "name" => SITE_NAME,
        "logo" => [
            "@type" => "ImageObject",
            "url" => "https://" . $_SERVER['HTTP_HOST'] . "/assets/images/logo.png"
        ]
    ],
    "datePublished" => "2024-11-15",
    "dateModified" => "2024-11-15"
];
?>

<!-- Schema.org Article -->
<script type="application/ld+json">
<?php echo json_encode($articleSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<style>
    .article-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .article-header {
        margin-bottom: 3rem;
    }

    .article-meta {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
        color: #6b7280;
        font-size: 0.875rem;
        margin-bottom: 2rem;
    }

    .article-category {
        background: #2563eb;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 1rem;
        font-weight: 600;
    }

    .article-title {
        font-size: 3rem;
        color: #1f2937;
        line-height: 1.2;
        margin-bottom: 1.5rem;
    }

    .article-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 1rem;
        margin-bottom: 3rem;
    }

    .article-content {
        line-height: 1.8;
        color: #1f2937;
        font-size: 1.125rem;
    }

    .article-content h2 {
        font-size: 2rem;
        color: #1f2937;
        margin-top: 3rem;
        margin-bottom: 1rem;
    }

    .article-content h3 {
        font-size: 1.5rem;
        color: #2563eb;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .article-content p {
        margin-bottom: 1.5rem;
    }

    .article-content ul, .article-content ol {
        margin: 1.5rem 0;
        padding-left: 2rem;
    }

    .article-content li {
        margin-bottom: 0.75rem;
    }

    .tip-box {
        background: #eff6ff;
        border-left: 4px solid #2563eb;
        padding: 1.5rem;
        margin: 2rem 0;
        border-radius: 0.5rem;
    }

    .tip-box strong {
        color: #1e40af;
        display: block;
        margin-bottom: 0.5rem;
    }

    .warning-box {
        background: #fef3c7;
        border-left: 4px solid #f59e0b;
        padding: 1.5rem;
        margin: 2rem 0;
        border-radius: 0.5rem;
    }

    .warning-box strong {
        color: #92400e;
        display: block;
        margin-bottom: 0.5rem;
    }

    .article-footer {
        margin-top: 4rem;
        padding-top: 2rem;
        border-top: 2px solid #e5e7eb;
    }

    .share-article {
        display: flex;
        gap: 1rem;
        align-items: center;
        margin-bottom: 2rem;
    }

    .back-to-blog {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #2563eb;
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 2rem;
    }

    .back-to-blog:hover {
        gap: 0.75rem;
    }
</style>

<div class="article-container">
    <a href="/blog.php" class="back-to-blog">
        <i class="fas fa-arrow-left"></i> Retour au blog
    </a>

    <article class="article-header">
        <div class="article-meta">
            <span class="article-category">Préparation</span>
            <span><i class="far fa-clock"></i> 8 min de lecture</span>
            <span><i class="far fa-calendar"></i> 15 novembre 2024</span>
            <span><i class="fas fa-user-circle"></i> Marie Dubois</span>
        </div>

        <h1 class="article-title">Comment préparer son déménagement 3 mois à l'avance</h1>

        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1200" alt="Préparation déménagement" class="article-image">

        <div class="article-content">
            <p><strong>Un déménagement réussi se prépare bien en avance.</strong> En commençant 3 mois avant le jour J, vous évitez le stress de dernière minute et réalisez des économies substantielles. Voici votre planning détaillé étape par étape.</p>

            <h2>Pourquoi commencer 3 mois avant ?</h2>

            <p>La préparation anticipée d'un déménagement présente de nombreux avantages :</p>

            <ul>
                <li><strong>Meilleurs prix :</strong> En réservant à l'avance, vous obtenez jusqu'à 30% de réduction sur les tarifs de déménagement</li>
                <li><strong>Plus de choix :</strong> Accès aux meilleurs déménageurs, même en haute saison</li>
                <li><strong>Moins de stress :</strong> Vous avancez progressivement sans vous épuiser</li>
                <li><strong>Meilleure organisation :</strong> Le temps de comparer et de prendre les bonnes décisions</li>
                <li><strong>Économies :</strong> Possibilité de faire vous-même certaines tâches</li>
            </ul>

            <h2>📅 Planning détaillé : 3 mois avant</h2>

            <h3>Semaines 1-2 : Évaluation et budget</h3>

            <p>Commencez par faire un état des lieux complet :</p>

            <ol>
                <li><strong>Inventaire exhaustif :</strong> Listez tous vos biens pièce par pièce</li>
                <li><strong>Tri préliminaire :</strong> Identifiez ce que vous garderez, vendrez, donnerez ou jetterez</li>
                <li><strong>Budget prévisionnel :</strong> Estimez tous les coûts (déménageurs, fournitures, nettoyage, etc.)</li>
                <li><strong>Recherche de devis :</strong> Contactez 3-5 déménageurs pour comparer</li>
            </ol>

            <div class="tip-box">
                <strong>💡 Astuce Pro :</strong>
                Utilisez notre <a href="/calculateur.php" style="color: #2563eb;">calculateur de prix</a> pour obtenir une estimation instantanée de votre déménagement selon votre type de logement.
            </div>

            <h3>Semaines 3-4 : Désencombrement</h3>

            <p>C'est LE moment de faire du tri ! Moins vous emportez, moins le déménagement coûte cher.</p>

            <ul>
                <li><strong>Méthode KonMari :</strong> Gardez seulement ce qui vous apporte de la joie</li>
                <li><strong>Règle des 6 mois :</strong> Si vous ne l'avez pas utilisé depuis 6 mois, vous n'en avez probablement pas besoin</li>
                <li><strong>Vente en ligne :</strong> 2ememain.be, Marketplace Facebook pour récupérer de l'argent</li>
                <li><strong>Dons :</strong> Ressourceries, associations caritatives (Croix-Rouge, Oxfam)</li>
            </ul>

            <div class="warning-box">
                <strong>⚠️ Attention :</strong>
                Débarrassez-vous des produits dangereux (peintures, solvants, batteries) AVANT le déménagement. Les déménageurs n'ont pas le droit de les transporter.
            </div>

            <h2>📅 2 mois avant : Organisation administrative</h2>

            <h3>Formalités essentielles</h3>

            <p>Ne sous-estimez pas le temps nécessaire pour les démarches administratives :</p>

            <ol>
                <li><strong>Préavis de départ :</strong> Envoyez votre courrier recommandé au propriétaire (généralement 3 mois en Belgique)</li>
                <li><strong>État des lieux de sortie :</strong> Planifiez la date avec votre propriétaire</li>
                <li><strong>Changement d'adresse :</strong> Préparez la liste de tous les organismes à prévenir</li>
                <li><strong>Inscription commune :</strong> Prenez RDV pour votre nouvelle commune</li>
                <li><strong>Écoles/crèches :</strong> Inscrivez vos enfants dans leurs nouveaux établissements</li>
            </ol>

            <h3>Services et abonnements</h3>

            <p>Organisez vos transferts de services :</p>

            <ul>
                <li>Électricité et gaz (demandez coupure et raccordement)</li>
                <li>Internet et téléphone</li>
                <li>Assurances (habitation, voiture)</li>
                <li>Banques et mutuelles</li>
                <li>Abonnements divers (magazines, salle de sport, etc.)</li>
            </ul>

            <h2>📅 1 mois avant : Action !</h2>

            <h3>Achat du matériel</h3>

            <p>Commencez à rassembler votre matériel d'emballage :</p>

            <ul>
                <li><strong>Cartons :</strong> Récupérez-les gratuitement dans les supermarchés ou achetez des cartons spécialisés (livres, vaisselle)</li>
                <li><strong>Papier bulle :</strong> Protégez les objets fragiles</li>
                <li><strong>Ruban adhésif :</strong> Large et résistant</li>
                <li><strong>Marqueurs :</strong> Pour étiqueter chaque carton</li>
                <li><strong>Couvertures :</strong> Pour les meubles</li>
            </ul>

            <div class="tip-box">
                <strong>💡 Économie :</strong>
                Utilisez vos serviettes, draps et vêtements pour emballer la vaisselle. Vous économisez du papier bulle ET de l'espace dans les cartons !
            </div>

            <h3>Début de l'emballage</h3>

            <p>Commencez par les pièces que vous utilisez le moins :</p>

            <ol>
                <li><strong>Cave et grenier :</strong> Objets saisonniers, archives</li>
                <li><strong>Décorations :</strong> Cadres, bibelots, livres que vous ne lisez pas</li>
                <li><strong>Vêtements hors saison :</strong> Manteaux en été, maillots en hiver</li>
                <li><strong>Vaisselle de fête :</strong> Service pour les grandes occasions</li>
            </ol>

            <h2>📅 Les 2 dernières semaines : Sprint final</h2>

            <h3>Emballage intensif</h3>

            <p>Il est temps d'emballer le reste :</p>

            <ul>
                <li>Cuisine (laissez juste le nécessaire pour les derniers jours)</li>
                <li>Salle de bain (gardez une trousse de toilette)</li>
                <li>Vêtements quotidiens (préparez un sac pour la semaine de déménagement)</li>
                <li>Démontage des meubles complexes</li>
            </ul>

            <div class="warning-box">
                <strong>⚠️ Important :</strong>
                Prévoyez un "carton de survie" avec le strict nécessaire pour les premiers jours dans votre nouveau logement : draps, serviettes, produits toilette, quelques ustensiles de cuisine, vêtements de rechange.
            </div>

            <h3>Derniers préparatifs</h3>

            <ul>
                <li><strong>Confirmation déménageurs :</strong> Reconfirmez date, heure et accès</li>
                <li><strong>Autorisation de stationnement :</strong> Si nécessaire pour le camion</li>
                <li><strong>Nettoyage :</strong> Commencez le nettoyage progressif de l'ancien logement</li>
                <li><strong>Garde d'enfants/animaux :</strong> Organisez leur garde pour le jour J</li>
            </ul>

            <h2>✅ Checklist finale</h2>

            <p>Voici votre checklist pour être sûr de ne rien oublier :</p>

            <div style="background: #f9fafb; padding: 1.5rem; border-radius: 0.5rem; margin: 2rem 0;">
                <h3 style="margin-bottom: 1rem;">3 mois avant :</h3>
                <ul style="list-style-type: none; padding: 0;">
                    <li>☑️ Inventaire complet</li>
                    <li>☑️ Budget établi</li>
                    <li>☑️ Devis déménageurs demandés</li>
                    <li>☑️ Tri et désencombrement démarrés</li>
                </ul>

                <h3 style="margin: 2rem 0 1rem 0;">2 mois avant :</h3>
                <ul style="list-style-type: none; padding: 0;">
                    <li>☑️ Préavis donné</li>
                    <li>☑️ Changements d'adresse organisés</li>
                    <li>☑️ Services transférés</li>
                    <li>☑️ Matériel rassemblé</li>
                </ul>

                <h3 style="margin: 2rem 0 1rem 0;">1 mois avant :</h3>
                <ul style="list-style-type: none; padding: 0;">
                    <li>☑️ Emballage pièces inutilisées</li>
                    <li>☑️ Déménageur confirmé</li>
                    <li>☑️ Planning détaillé jour J</li>
                </ul>

                <h3 style="margin: 2rem 0 1rem 0;">2 semaines avant :</h3>
                <ul style="list-style-type: none; padding: 0;">
                    <li>☑️ Tout emballé sauf essentiel</li>
                    <li>☑️ Nettoyage en cours</li>
                    <li>☑️ État des lieux prévu</li>
                    <li>☑️ Carton survie préparé</li>
                </ul>
            </div>

            <h2>💰 Combien ça coûte ?</h2>

            <p>Avec 3 mois de préparation, voici les économies possibles :</p>

            <ul>
                <li><strong>-30% sur le déménageur :</strong> Réservation anticipée</li>
                <li><strong>-€300-500 :</strong> Emballage fait vous-même</li>
                <li><strong>+€200-1000 :</strong> Revente objets inutiles</li>
                <li><strong>-€150-400 :</strong> Pas de nettoyage professionnel nécessaire</li>
            </ul>

            <p><strong>Total économies potentielles : 800-2000€ !</strong></p>

            <div class="tip-box">
                <strong>💡 Conseil final :</strong>
                Consultez notre <a href="/checklist.php" style="color: #2563eb;">checklist interactive</a> pour suivre votre progression en temps réel et ne rien oublier !
            </div>

            <h2>Conclusion</h2>

            <p>Avec ce planning de 3 mois, vous êtes assuré d'un déménagement serein et maîtrisé. La clé du succès ? Commencer tôt et avancer progressivement. N'oubliez pas : chaque minute investie en préparation, c'est 10 minutes de stress évitées le jour J !</p>

            <p><strong>Prêt à déménager ?</strong> <a href="/devis.php" style="color: #2563eb;">Demandez vos devis gratuits maintenant</a> et comparez les meilleurs déménageurs de Belgique !</p>
        </div>
    </article>

    <div class="article-footer">
        <h3 style="margin-bottom: 1rem;">Partager cet article</h3>
        <div class="share-article">
            <span style="font-weight: 600; color: #6b7280;">Partager :</span>
            <div class="share-buttons">
                <button class="share-btn share-btn-facebook" onclick="window.shareSystem.facebook(window.location.href, '<?php echo addslashes($pageTitle); ?>')" title="Partager sur Facebook">
                    <i class="fab fa-facebook-f"></i>
                </button>
                <button class="share-btn share-btn-twitter" onclick="window.shareSystem.twitter(window.location.href, '<?php echo addslashes($pageTitle); ?>')" title="Partager sur Twitter">
                    <i class="fab fa-twitter"></i>
                </button>
                <button class="share-btn share-btn-linkedin" onclick="window.shareSystem.linkedin(window.location.href, '<?php echo addslashes($pageTitle); ?>')" title="Partager sur LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </button>
                <button class="share-btn share-btn-whatsapp" onclick="window.shareSystem.whatsapp(window.location.href, '<?php echo addslashes($pageTitle); ?>')" title="Partager sur WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </button>
            </div>
        </div>

        <div style="background: #eff6ff; padding: 2rem; border-radius: 0.5rem; margin-top: 2rem;">
            <h3 style="color: #1e40af; margin-bottom: 1rem;">
                <i class="fas fa-truck-moving"></i> Besoin d'aide pour votre déménagement ?
            </h3>
            <p style="color: #6b7280; margin-bottom: 1rem;">
                Obtenez jusqu'à 5 devis gratuits de déménageurs professionnels vérifiés
            </p>
            <a href="/devis.php" class="btn btn-primary">
                <i class="fas fa-file-invoice"></i> Demander un devis gratuit
            </a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
