<?php
$pageTitle = "Changement d'Adresse en Belgique : Guide Complet 2024";
$pageDescription = "Tout savoir sur la déclaration de changement d'adresse en Belgique : démarches obligatoires, délais, documents, organismes à prévenir. Guide pratique avec checklist complète.";
require_once '../includes/header.php';

// Schema.org Article
$articleSchema = [
    "@context" => "https://schema.org",
    "@type" => "BlogPosting",
    "headline" => "Changement d'Adresse en Belgique : Guide Complet 2024",
    "description" => $pageDescription,
    "image" => "https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1200",
    "author" => [
        "@type" => "Person",
        "name" => "Sophie Martin"
    ],
    "publisher" => [
        "@type" => "Organization",
        "name" => SITE_NAME,
        "logo" => [
            "@type" => "ImageObject",
            "url" => "https://" . $_SERVER['HTTP_HOST'] . "/assets/images/logo.png"
        ]
    ],
    "datePublished" => "2024-11-12",
    "dateModified" => "2024-11-12"
];
?>

<script type="application/ld+json">
<?= json_encode($articleSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>

<style>
.article-hero {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    padding: 80px 0;
    color: white;
    text-align: center;
    margin-bottom: 50px;
}

.article-hero h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
}

.article-meta {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 20px;
    font-size: 0.95rem;
    opacity: 0.95;
}

.article-meta span {
    display: flex;
    align-items: center;
    gap: 8px;
}

.article-content {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 20px 80px;
    font-size: 1.1rem;
    line-height: 1.8;
    color: #1f2937;
}

.article-content h2 {
    color: #1f2937;
    font-size: 2rem;
    margin-top: 50px;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 3px solid #3b82f6;
}

.article-content h3 {
    color: #374151;
    font-size: 1.5rem;
    margin-top: 35px;
    margin-bottom: 20px;
}

.article-content img {
    width: 100%;
    border-radius: 12px;
    margin: 30px 0;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.alert-box {
    background: #fee2e2;
    color: #991b1b;
    padding: 25px;
    border-radius: 12px;
    margin: 30px 0;
    border-left: 5px solid #dc2626;
}

.alert-box h4 {
    margin: 0 0 15px 0;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.3rem;
    color: #991b1b;
}

.success-box {
    background: #d1fae5;
    color: #065f46;
    padding: 25px;
    border-radius: 12px;
    margin: 30px 0;
    border-left: 5px solid #10b981;
}

.success-box h4 {
    margin: 0 0 15px 0;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.3rem;
    color: #065f46;
}

.info-box {
    background: #dbeafe;
    color: #1e40af;
    padding: 25px;
    border-radius: 12px;
    margin: 30px 0;
    border-left: 5px solid #3b82f6;
}

.info-box h4 {
    margin: 0 0 15px 0;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.3rem;
    color: #1e40af;
}

.timeline {
    position: relative;
    padding-left: 40px;
    margin: 40px 0;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 12px;
    top: 0;
    bottom: 0;
    width: 3px;
    background: #3b82f6;
}

.timeline-step {
    position: relative;
    margin-bottom: 30px;
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.timeline-step::before {
    content: '';
    position: absolute;
    left: -33px;
    top: 25px;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background: #3b82f6;
    border: 3px solid white;
    box-shadow: 0 0 0 3px #dbeafe;
}

.timeline-step h4 {
    margin: 0 0 10px 0;
    color: #1f2937;
    font-size: 1.2rem;
}

.timeline-step .deadline {
    color: #dc2626;
    font-weight: bold;
    font-size: 0.95rem;
}

.checklist {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    margin: 30px 0;
}

.checklist h4 {
    margin: 0 0 20px 0;
    color: #1f2937;
    font-size: 1.3rem;
}

.checklist li {
    margin: 15px 0;
    padding-left: 35px;
    position: relative;
}

.checklist li:before {
    content: "□";
    position: absolute;
    left: 0;
    color: #3b82f6;
    font-weight: bold;
    font-size: 1.5rem;
}

.table-responsive {
    overflow-x: auto;
    margin: 30px 0;
}

.info-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.info-table th {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    color: white;
    padding: 15px;
    text-align: left;
    font-weight: 600;
}

.info-table td {
    padding: 15px;
    border-bottom: 1px solid #e5e7eb;
}

.info-table tr:last-child td {
    border-bottom: none;
}

.info-table tr:nth-child(even) {
    background: #f9fafb;
}

.cta-box {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    color: white;
    padding: 40px;
    border-radius: 12px;
    text-align: center;
    margin: 50px 0;
}

.cta-box h3 {
    color: white;
    margin-top: 0;
}

.cta-box .btn {
    background: white;
    color: #3b82f6;
    padding: 15px 40px;
    border-radius: 8px;
    text-decoration: none;
    display: inline-block;
    font-weight: 600;
    margin-top: 20px;
    transition: transform 0.3s ease;
}

.cta-box .btn:hover {
    transform: translateY(-2px);
}

.social-share {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin: 50px 0;
    padding: 30px;
    background: #f9fafb;
    border-radius: 12px;
}

.social-share a {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    color: white;
    font-weight: 600;
    transition: transform 0.3s ease;
}

.social-share a:hover {
    transform: translateY(-2px);
}

.share-facebook { background: #1877f2; }
.share-twitter { background: #1da1f2; }
.share-linkedin { background: #0a66c2; }
.share-whatsapp { background: #25d366; }
</style>

<div class="article-hero">
    <div class="container">
        <h1>Changement d'Adresse en Belgique : Guide Complet 2024</h1>
        <div class="article-meta">
            <span><i class="fas fa-user"></i> Sophie Martin</span>
            <span><i class="fas fa-calendar"></i> 12 novembre 2024</span>
            <span><i class="fas fa-clock"></i> 10 min de lecture</span>
        </div>
    </div>
</div>

<div class="article-content">

    <p class="lead" style="font-size: 1.3rem; color: #4b5563; margin-bottom: 40px;">
        Déclarer son changement d'adresse en Belgique est une obligation légale qui doit être effectuée dans les délais impartis. Entre les démarches à la commune, les organismes à prévenir et les documents à fournir, ce guide complet vous accompagne étape par étape pour ne rien oublier.
    </p>

    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1200&h=600&fit=crop" alt="Changement d'adresse Belgique" loading="lazy">

    <h2>⚖️ Obligation Légale : Ce Que Dit la Loi</h2>

    <div class="alert-box">
        <h4><i class="fas fa-gavel"></i> Important : Délai Obligatoire</h4>
        <p><strong>Vous DEVEZ déclarer votre changement d'adresse dans les 8 jours ouvrables suivant votre emménagement.</strong></p>
        <p>Le non-respect de ce délai peut entraîner une amende administrative de 50€ à 500€ selon les communes.</p>
    </div>

    <p>En Belgique, toute personne qui change de domicile est tenue par la loi de s'inscrire à sa nouvelle adresse auprès de l'administration communale. Cette obligation découle de l'article 1er de la loi du 19 juillet 1991 relative aux registres de la population.</p>

    <h3>Pourquoi Est-ce Obligatoire ?</h3>

    <ul>
        <li><strong>Droits civiques :</strong> Recevoir vos convocations électorales à la bonne adresse</li>
        <li><strong>Fiscalité :</strong> Être imposé dans la commune de résidence effective</li>
        <li><strong>Sécurité sociale :</strong> Garantir la continuité de vos droits (mutuelle, chômage, allocations)</li>
        <li><strong>Services communaux :</strong> Accès aux services locaux (crèche, école, déchetterie, etc.)</li>
        <li><strong>Courrier officiel :</strong> Recevoir tous les documents administratifs importants</li>
    </ul>

    <h2>📋 Démarche Principale : Inscription à la Commune</h2>

    <h3>Étape 1 : Prendre Rendez-vous</h3>

    <div class="info-box">
        <h4><i class="fas fa-info-circle"></i> Bon à Savoir</h4>
        <p>Depuis 2020, la plupart des communes belges exigent une prise de rendez-vous en ligne pour les changements d'adresse. Prenez rendez-vous dès que vous connaissez votre date de déménagement !</p>
    </div>

    <p><strong>Comment prendre rendez-vous :</strong></p>
    <ul>
        <li>Site web de votre nouvelle commune (section "Population" ou "État civil")</li>
        <li>Par téléphone au service population</li>
        <li>Certaines petites communes acceptent encore le passage sans rendez-vous</li>
    </ul>

    <p><strong>Délai d'attente moyen :</strong> 3-10 jours dans les grandes villes, immédiat dans les petites communes</p>

    <h3>Étape 2 : Préparer les Documents</h3>

    <div class="checklist">
        <h4>Documents Obligatoires</h4>
        <ul>
            <li><strong>Carte d'identité</strong> ou passeport valide (original)</li>
            <li><strong>Contrat de bail</strong> enregistré OU acte de propriété</li>
            <li><strong>Composition de ménage</strong> de l'ancienne adresse (délivrée par l'ancienne commune)</li>
            <li><strong>Carte d'identité de tous les membres</strong> du ménage qui déménagent</li>
        </ul>
    </div>

    <div class="checklist">
        <h4>Documents Complémentaires (selon situation)</h4>
        <ul>
            <li><strong>Acte de mariage</strong> ou certificat de cohabitation légale</li>
            <li><strong>Acte de naissance</strong> des enfants mineurs</li>
            <li><strong>Autorisation du propriétaire</strong> dans certaines communes (formulaire spécifique)</li>
            <li><strong>Preuve de lien familial</strong> si vous emménagez chez quelqu'un</li>
        </ul>
    </div>

    <div class="alert-box">
        <h4><i class="fas fa-exclamation-triangle"></i> Attention au Bail Enregistré</h4>
        <p>Votre contrat de bail DOIT être enregistré au SPF Finances pour être accepté. L'enregistrement se fait normalement par le propriétaire dans les 2 mois suivant la signature. Vérifiez qu'il porte bien le cachet d'enregistrement !</p>
    </div>

    <h3>Étape 3 : Se Rendre au Rendez-vous</h3>

    <div class="timeline">
        <div class="timeline-step">
            <h4>1. Dépôt du Dossier</h4>
            <p>Présentation des documents à l'agent communal qui vérifie la complétude du dossier.</p>
            <p>Durée : 10-15 minutes</p>
        </div>

        <div class="timeline-step">
            <h4>2. Contrôle de Résidence</h4>
            <p>Un agent de quartier passe vérifier que vous résidez bien à l'adresse indiquée.</p>
            <p class="deadline">Délai : 1 à 4 semaines (variable selon les communes)</p>
        </div>

        <div class="timeline-step">
            <h4>3. Validation de l'Inscription</h4>
            <p>Après contrôle positif, votre inscription est validée dans les registres de la population.</p>
            <p>Vous recevez une convocation pour retirer votre nouvelle carte d'identité.</p>
        </div>

        <div class="timeline-step">
            <h4>4. Nouvelle Carte d'Identité</h4>
            <p>Retrait de votre nouvelle eID avec votre nouvelle adresse.</p>
            <p>Coût : 20€ (gratuit si votre ancienne carte avait -5 ans de validité)</p>
            <p class="deadline">Délai de fabrication : 10-15 jours</p>
        </div>
    </div>

    <h3>Le Contrôle de Résidence : Comment Ça Se Passe ?</h3>

    <p>Le contrôle de résidence (aussi appelé "enquête de résidence") est une visite d'un agent de quartier pour vérifier que vous habitez réellement à l'adresse déclarée.</p>

    <div class="success-box">
        <h4><i class="fas fa-check-circle"></i> Conseils pour un Contrôle Réussi</h4>
        <ul style="margin: 10px 0 0 0;">
            <li>Soyez présent à votre domicile autant que possible pendant les 2-3 semaines suivant votre déclaration</li>
            <li>Laissez votre nom sur la sonnette/boîte aux lettres</li>
            <li>Si vous êtes absent, l'agent laisse un avis de passage - contactez rapidement votre commune</li>
            <li>Ayez une pièce d'identité sur vous lors du contrôle</li>
            <li>L'agent peut poser quelques questions simples (depuis quand habitez-vous ici, qui vit avec vous, etc.)</li>
        </ul>
    </div>

    <div class="alert-box">
        <h4><i class="fas fa-ban"></i> Risques d'un Contrôle Négatif</h4>
        <p>Si l'agent ne peut pas vous trouver après plusieurs passages, votre inscription peut être refusée. Vous devrez alors recommencer toute la procédure. Dans les cas graves (fausse déclaration), des poursuites pénales sont possibles.</p>
    </div>

    <h2>📞 Tous les Organismes à Prévenir</h2>

    <p>Au-delà de la commune, de nombreux organismes doivent être informés de votre changement d'adresse. Voici la checklist complète :</p>

    <h3>1. Organismes Publics (Priorité Haute)</h3>

    <div class="table-responsive">
        <table class="info-table">
            <thead>
                <tr>
                    <th>Organisme</th>
                    <th>Délai</th>
                    <th>Comment</th>
                    <th>Gratuit ?</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>SPF Finances (Impôts)</strong></td>
                    <td>Automatique via commune</td>
                    <td>Aucune démarche requise</td>
                    <td>✓</td>
                </tr>
                <tr>
                    <td><strong>Mutuelle</strong></td>
                    <td>Dans le mois</td>
                    <td>En ligne, par courrier ou guichet</td>
                    <td>✓</td>
                </tr>
                <tr>
                    <td><strong>ONEM (si chômeur)</strong></td>
                    <td>Immédiatement</td>
                    <td>Via syndicat ou CAPAC</td>
                    <td>✓</td>
                </tr>
                <tr>
                    <td><strong>CPAS (si bénéficiaire)</strong></td>
                    <td>Avant déménagement</td>
                    <td>Rendez-vous avec assistant social</td>
                    <td>✓</td>
                </tr>
                <tr>
                    <td><strong>Caisse d'allocations familiales</strong></td>
                    <td>Dans le mois</td>
                    <td>Formulaire en ligne ou courrier</td>
                    <td>✓</td>
                </tr>
                <tr>
                    <td><strong>SPF Mobilité (si véhicule)</strong></td>
                    <td>8 jours</td>
                    <td>En ligne sur MyMinfin ou DIV</td>
                    <td>✓</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h3>2. Services & Abonnements (Priorité Haute)</h3>

    <div class="checklist">
        <h4>Énergie & Télécommunications</h4>
        <ul>
            <li><strong>Électricité :</strong> Prévenir 2-3 semaines avant (relevé index au départ et à l'arrivée)</li>
            <li><strong>Gaz :</strong> Idem électricité, souvent le même fournisseur</li>
            <li><strong>Eau :</strong> Contacter la compagnie des eaux locale (VIVAQUA, SWDE, De Watergroep...)</li>
            <li><strong>Internet/TV/Téléphone :</strong> Prévoir 2-4 semaines de délai pour transfert/installation</li>
            <li><strong>GSM :</strong> Simple mise à jour d'adresse en ligne</li>
        </ul>
    </div>

    <div class="info-box">
        <h4><i class="fas fa-bolt"></i> Astuce Énergie</h4>
        <p>Profitez de votre déménagement pour comparer les fournisseurs ! Utilisez un comparateur (CREG, Comparateur-Énergie.be) pour potentiellement économiser 200-400€/an.</p>
    </div>

    <h3>3. Services Financiers (Priorité Haute)</h3>

    <div class="checklist">
        <ul>
            <li><strong>Banque(s) :</strong> En ligne via mobile banking ou par courrier recommandé</li>
            <li><strong>Cartes de crédit :</strong> Mise à jour séparée parfois nécessaire</li>
            <li><strong>Assurances :</strong> Auto, habitation, familiale, vie (peut impacter les primes !)</li>
            <li><strong>Organisme de crédit :</strong> Si vous avez un prêt en cours</li>
        </ul>
    </div>

    <div class="alert-box">
        <h4><i class="fas fa-shield-alt"></i> Important : Assurance Habitation</h4>
        <p>Vous DEVEZ informer votre assureur dans les 30 jours. Un changement de commune peut modifier votre prime. De plus, votre ancien contrat ne couvre PAS votre nouveau logement - souscrivez une nouvelle police avant d'emménager !</p>
    </div>

    <h3>4. Employeur & Formation</h3>

    <div class="checklist">
        <ul>
            <li><strong>Employeur :</strong> Service RH pour mise à jour paie et documents officiels</li>
            <li><strong>École/Université :</strong> Secrétariat pour courriers et documents</li>
            <li><strong>FOREM/VDAB/Actiris :</strong> Si demandeur d'emploi, mise à jour immédiate</li>
        </ul>
    </div>

    <h3>5. Poste & Courrier</h3>

    <div class="info-box">
        <h4><i class="fas fa-envelope"></i> Service de Réexpédition bpost</h4>
        <p><strong>Coût :</strong> 29,95€ pour 12 mois de réexpédition</p>
        <p><strong>Activation :</strong> En ligne sur bpost.be ou dans un bureau de poste</p>
        <p><strong>Délai :</strong> Activez le service au minimum 5 jours avant votre déménagement</p>
    </div>

    <p>Ce service est très utile pour la période de transition (2-3 mois) le temps que tous vos correspondants soient prévenus.</p>

    <h3>6. Organismes à Prévenir "Quand Possible"</h3>

    <div class="checklist">
        <ul>
            <li>Médecin traitant, dentiste, spécialistes</li>
            <li>Pharmacie habituelle</li>
            <li>Crèche, garderie, école des enfants</li>
            <li>Clubs sportifs, associations</li>
            <li>Bibliothèque municipale</li>
            <li>Abonnements magazines/journaux</li>
            <li>Sites e-commerce (Amazon, Bol.com, etc.)</li>
            <li>Programmes de fidélité</li>
        </ul>
    </div>

    <h2>📱 Outils pour Faciliter vos Démarches</h2>

    <h3>Plateformes Numériques Utiles</h3>

    <table class="info-table">
        <thead>
            <tr>
                <th>Plateforme</th>
                <th>Ce Que Vous Pouvez Faire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>MyMinfin (myminfin.be)</strong></td>
                <td>Consulter votre dossier fiscal, déclarer votre véhicule à nouvelle adresse</td>
            </tr>
            <tr>
                <td><strong>CSAM (csam.be)</strong></td>
                <td>Mettre à jour votre adresse pour votre mutuelle</td>
            </tr>
            <tr>
                <td><strong>MyPension (mypension.be)</strong></td>
                <td>Mise à jour automatique via Registre National</td>
            </tr>
            <tr>
                <td><strong>Student.be</strong></td>
                <td>Changement d'adresse pour étudiants (allocations, bourses)</td>
            </tr>
            <tr>
                <td><strong>My Handicap (myhandicap.be)</strong></td>
                <td>Mise à jour pour les personnes avec handicap</td>
            </tr>
        </tbody>
    </table>

    <h2>⏰ Timeline Optimale du Changement d'Adresse</h2>

    <div class="timeline">
        <div class="timeline-step">
            <h4>2 Mois Avant</h4>
            <p>✓ Donner préavis au propriétaire (3 mois généralement)</p>
            <p>✓ Commencer recherche nouveau logement</p>
            <p>✓ Comparer fournisseurs énergie/internet</p>
        </div>

        <div class="timeline-step">
            <h4>1 Mois Avant</h4>
            <p>✓ Signer nouveau bail et l'enregistrer</p>
            <p>✓ Prendre RDV à la commune (si disponible)</p>
            <p>✓ Prévenir employeur et école des enfants</p>
            <p>✓ Souscrire assurance habitation nouveau logement</p>
        </div>

        <div class="timeline-step">
            <h4>2 Semaines Avant</h4>
            <p>✓ Prévenir fournisseurs énergie (relevé index départ)</p>
            <p>✓ Commander service réexpédition bpost</p>
            <p>✓ Planifier transfert internet/TV</p>
            <p>✓ Informer banque et assurances</p>
        </div>

        <div class="timeline-step">
            <h4>Jour J - Déménagement</h4>
            <p>✓ Relever les index (électricité, gaz, eau) ancien et nouveau logement</p>
            <p>✓ État des lieux de sortie ET d'entrée</p>
            <p>✓ Photos avant/après pour sécurité</p>
        </div>

        <div class="timeline-step">
            <h4>Semaine 1 Après</h4>
            <p class="deadline">✓ S'inscrire à la commune (max 8 jours ouvrables !)</p>
            <p>✓ Mise à jour véhicule (8 jours maximum)</p>
            <p>✓ Prévenir mutuelle</p>
        </div>

        <div class="timeline-step">
            <h4>Mois 1 Après</h4>
            <p>✓ Être présent pour contrôle de résidence</p>
            <p>✓ Finaliser tous les changements d'adresse</p>
            <p>✓ Retirer nouvelle eID</p>
        </div>
    </div>

    <h2>💰 Coûts à Prévoir</h2>

    <table class="info-table">
        <thead>
            <tr>
                <th>Frais</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nouvelle carte d'identité</td>
                <td>20€ (gratuit si ancienne carte récente)</td>
            </tr>
            <tr>
                <td>Composition de ménage</td>
                <td>Gratuit - 5€ selon commune</td>
            </tr>
            <tr>
                <td>Enregistrement bail (propriétaire)</td>
                <td>Environ 0,2% du loyer annuel</td>
            </tr>
            <tr>
                <td>Réexpédition courrier bpost</td>
                <td>29,95€/an</td>
            </tr>
            <tr>
                <td>Changement adresse permis conduire</td>
                <td>Gratuit (automatique)</td>
            </tr>
            <tr>
                <td>Amende si retard déclaration</td>
                <td>50€ - 500€</td>
            </tr>
        </tbody>
    </table>

    <h2>❓ Questions Fréquentes</h2>

    <h3>Puis-je m'inscrire avant mon déménagement ?</h3>
    <p>Non, vous ne pouvez vous inscrire qu'à partir du jour où vous emménagez réellement. Cependant, vous pouvez prendre rendez-vous à l'avance et préparer vos documents.</p>

    <h3>Que faire si je déménage temporairement à l'étranger ?</h3>
    <p>Si vous partez plus d'un an, vous devez vous inscrire au Registre des Belges à l'étranger (RGBE) auprès de l'ambassade ou du consulat belge dans votre pays de résidence.</p>

    <h3>Mon conjoint/colocataire doit-il venir au rendez-vous ?</h3>
    <p>Oui, chaque personne majeure qui déménage doit se présenter personnellement avec sa carte d'identité. Pour les enfants mineurs, un parent peut les inscrire.</p>

    <h3>Puis-je garder mon médecin traitant si je change de commune ?</h3>
    <p>Oui, vous pouvez garder le même médecin même si vous changez de commune. Informez-le simplement de votre nouvelle adresse.</p>

    <h3>Ma carte SIS (mutuelle) change-t-elle automatiquement ?</h3>
    <p>Non, vous devez prévenir votre mutuelle. Certaines mutuelles sont informées automatiquement via le Registre National, mais vérifiez toujours avec elles.</p>

    <h3>Que se passe-t-il si j'oublie de déclarer mon changement d'adresse ?</h3>
    <p>Vous risquez une amende administrative, mais surtout des problèmes pratiques : pas de convocation électorale, courrier officiel non reçu, problèmes avec mutuelle/impôts, etc. Régularisez au plus vite !</p>

    <div class="cta-box">
        <h3>📋 Téléchargez Notre Checklist Complète</h3>
        <p>Liste imprimable de tous les organismes à prévenir + timeline détaillée</p>
        <a href="/checklist.php" class="btn">Voir la checklist interactive</a>
    </div>

    <h2>🎯 Notre Outil pour Vous Simplifier la Vie</h2>

    <p>Pour ne rien oublier lors de votre déménagement, utilisez notre checklist interactive qui vous guide pas à pas dans toutes vos démarches !</p>

    <div class="cta-box" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
        <h3>✅ Checklist Interactive Gratuite</h3>
        <p>Suivez toutes vos démarches de changement d'adresse en un seul endroit</p>
        <a href="/checklist.php" class="btn" style="color: #10b981;">Accéder à la checklist</a>
    </div>

    <div class="social-share">
        <p style="width: 100%; text-align: center; margin: 0 0 20px 0; color: #6b7280; font-weight: 600;">Partagez ce guide utile :</p>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>" target="_blank" class="share-facebook">
            <i class="fab fa-facebook-f"></i> Facebook
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?= urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>&text=Guide%20Changement%20Adresse%20Belgique" target="_blank" class="share-twitter">
            <i class="fab fa-twitter"></i> Twitter
        </a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>" target="_blank" class="share-linkedin">
            <i class="fab fa-linkedin-in"></i> LinkedIn
        </a>
        <a href="https://wa.me/?text=Guide%20Changement%20Adresse%20Belgique%20<?= urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>" target="_blank" class="share-whatsapp">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
    </div>

    <p style="text-align: center; margin-top: 50px; color: #6b7280;">
        <a href="/blog.php" style="color: #3b82f6; text-decoration: none; font-weight: 600;">
            ← Retour au blog
        </a>
    </p>

</div>

<?php require_once '../includes/footer.php'; ?>
