<?php
$pageTitle = "Politique de Confidentialité et Protection des Données (RGPD)";
$pageDescription = "Notre politique de confidentialité et de protection des données personnelles conforme au RGPD. Transparence totale sur la collecte et l'utilisation de vos données.";
require_once 'includes/header.php';
?>

<style>
.privacy-hero {
    background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
    padding: 80px 0;
    color: white;
    text-align: center;
}

.privacy-hero h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.privacy-hero p {
    font-size: 1.2rem;
    max-width: 800px;
    margin: 0 auto;
    opacity: 0.95;
}

.privacy-content {
    max-width: 900px;
    margin: 60px auto;
    padding: 0 20px;
}

.privacy-content h2 {
    color: #1f2937;
    font-size: 2rem;
    margin-top: 50px;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 3px solid #2563eb;
}

.privacy-content h3 {
    color: #374151;
    font-size: 1.5rem;
    margin-top: 35px;
    margin-bottom: 20px;
}

.privacy-content p {
    color: #4b5563;
    line-height: 1.8;
    margin-bottom: 20px;
}

.privacy-content ul, .privacy-content ol {
    margin: 20px 0;
    padding-left: 30px;
}

.privacy-content li {
    margin: 10px 0;
    color: #4b5563;
    line-height: 1.7;
}

.info-box {
    background: #dbeafe;
    border-left: 5px solid #2563eb;
    padding: 25px;
    margin: 30px 0;
    border-radius: 8px;
}

.info-box h4 {
    color: #1e40af;
    margin: 0 0 15px 0;
    font-size: 1.2rem;
}

.info-box p {
    color: #1e3a8a;
    margin: 0;
}

.table-data {
    width: 100%;
    border-collapse: collapse;
    margin: 30px 0;
    background: white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    border-radius: 8px;
    overflow: hidden;
}

.table-data th {
    background: #1f2937;
    color: white;
    padding: 15px;
    text-align: left;
    font-weight: 600;
}

.table-data td {
    padding: 15px;
    border-bottom: 1px solid #e5e7eb;
}

.table-data tr:last-child td {
    border-bottom: none;
}

.table-data tr:nth-child(even) {
    background: #f9fafb;
}

.contact-box {
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: white;
    padding: 40px;
    border-radius: 12px;
    text-align: center;
    margin: 50px 0;
}

.contact-box h3 {
    color: white;
    margin-top: 0;
}

.contact-box a {
    color: white;
    text-decoration: underline;
    font-weight: 600;
}

.last-updated {
    background: #f9fafb;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    color: #6b7280;
    margin-bottom: 40px;
}
</style>

<div class="privacy-hero">
    <div class="container">
        <h1>Politique de Confidentialité</h1>
        <p>Protection de vos données personnelles conforme au Règlement Général sur la Protection des Données (RGPD)</p>
    </div>
</div>

<div class="container">
    <div class="privacy-content">

        <div class="last-updated">
            <strong>Dernière mise à jour :</strong> <?= date('d/m/Y') ?><br>
            <strong>Entrée en vigueur :</strong> 01/01/2024
        </div>

        <div class="info-box">
            <h4><i class="fas fa-shield-alt"></i> Votre Vie Privée est Notre Priorité</h4>
            <p>Nous nous engageons à protéger et respecter votre vie privée. Cette politique explique comment nous collectons, utilisons et protégeons vos données personnelles conformément au RGPD (Règlement UE 2016/679).</p>
        </div>

        <h2>1. Responsable du Traitement des Données</h2>

        <p><strong><?= SITE_NAME ?></strong> est responsable du traitement de vos données personnelles.</p>

        <p><strong>Coordonnées du Responsable :</strong></p>
        <ul>
            <li><strong>Nom :</strong> <?= SITE_NAME ?></li>
            <li><strong>Adresse :</strong> Rue de la Loi 123, 1000 Bruxelles, Belgique</li>
            <li><strong>Email :</strong> <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></li>
            <li><strong>Téléphone :</strong> <?= SITE_PHONE ?></li>
        </ul>

        <h2>2. Données Personnelles Collectées</h2>

        <p>Nous collectons et traitons les catégories de données personnelles suivantes :</p>

        <table class="table-data">
            <thead>
                <tr>
                    <th>Type de Données</th>
                    <th>Exemples</th>
                    <th>Finalité</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Données d'identification</strong></td>
                    <td>Nom, prénom, adresse email, numéro de téléphone</td>
                    <td>Demandes de devis, newsletter, contact</td>
                </tr>
                <tr>
                    <td><strong>Données de localisation</strong></td>
                    <td>Adresse de déménagement, code postal, ville</td>
                    <td>Mise en relation avec déménageurs locaux</td>
                </tr>
                <tr>
                    <td><strong>Données de connexion</strong></td>
                    <td>Adresse IP, cookies, pages visitées</td>
                    <td>Analyse d'audience, amélioration du site</td>
                </tr>
                <tr>
                    <td><strong>Données de navigation</strong></td>
                    <td>Historique de navigation, durée des visites</td>
                    <td>Statistiques, optimisation UX</td>
                </tr>
                <tr>
                    <td><strong>Données du projet</strong></td>
                    <td>Volume à déménager, date souhaitée, services</td>
                    <td>Préparation de devis personnalisés</td>
                </tr>
            </tbody>
        </table>

        <h2>3. Finalités et Bases Légales du Traitement</h2>

        <p>Nous traitons vos données pour les finalités suivantes :</p>

        <h3>3.1 Fourniture de Services (Base légale : Exécution du contrat)</h3>
        <ul>
            <li>Traitement de vos demandes de devis</li>
            <li>Mise en relation avec des déménageurs professionnels</li>
            <li>Réponse à vos questions via formulaire de contact</li>
            <li>Gestion de votre compte utilisateur (si applicable)</li>
        </ul>

        <h3>3.2 Communication Marketing (Base légale : Consentement)</h3>
        <ul>
            <li>Envoi de notre newsletter (si vous y êtes inscrit)</li>
            <li>Informations sur nos services et offres partenaires</li>
            <li>Conseils et astuces pour votre déménagement</li>
        </ul>

        <p><strong>Vous pouvez retirer votre consentement à tout moment</strong> via le lien de désinscription dans chaque email ou en nous contactant.</p>

        <h3>3.3 Amélioration du Site (Base légale : Intérêt légitime)</h3>
        <ul>
            <li>Analyses statistiques de fréquentation</li>
            <li>Optimisation de l'expérience utilisateur</li>
            <li>Détection et prévention des fraudes</li>
            <li>Sécurisation de notre plateforme</li>
        </ul>

        <h3>3.4 Conformité Légale (Base légale : Obligation légale)</h3>
        <ul>
            <li>Respect des obligations comptables et fiscales</li>
            <li>Réponse aux demandes des autorités compétentes</li>
        </ul>

        <h2>4. Destinataires de vos Données</h2>

        <p>Vos données personnelles peuvent être communiquées aux destinataires suivants :</p>

        <h3>4.1 Déménageurs Partenaires</h3>
        <p>Lorsque vous demandez un devis, nous transmettons vos coordonnées et les détails de votre projet aux entreprises de déménagement sélectionnées selon vos critères (localisation, services, etc.).</p>

        <p><strong>Nombre maximum de partenaires contactés :</strong> 5 entreprises</p>

        <h3>4.2 Prestataires Techniques</h3>
        <ul>
            <li><strong>Hébergement :</strong> Nos serveurs sont hébergés en Europe (RGPD compliant)</li>
            <li><strong>Email :</strong> Service d'envoi d'emails (newsletters, notifications)</li>
            <li><strong>Analytics :</strong> Google Analytics, Facebook Pixel (données anonymisées)</li>
        </ul>

        <h3>4.3 Sous-traitants</h3>
        <p>Nous faisons appel à des sous-traitants pour certains services (développement, maintenance). Tous nos sous-traitants sont contractuellement tenus de respecter le RGPD.</p>

        <div class="info-box">
            <h4><i class="fas fa-lock"></i> Garantie de Protection</h4>
            <p>Nous ne vendons jamais vos données personnelles à des tiers. Tous nos partenaires et sous-traitants sont soumis à des obligations strictes de confidentialité et de sécurité.</p>
        </div>

        <h2>5. Transferts de Données hors UE</h2>

        <p>Certains de nos prestataires techniques (Google Analytics, Facebook) peuvent transférer vos données hors de l'Union Européenne.</p>

        <p><strong>Garanties mises en place :</strong></p>
        <ul>
            <li>Clauses contractuelles types approuvées par la Commission Européenne</li>
            <li>Certification Privacy Shield (pour les prestataires américains)</li>
            <li>Anonymisation des données avant transfert quand c'est possible</li>
        </ul>

        <h2>6. Durée de Conservation des Données</h2>

        <table class="table-data">
            <thead>
                <tr>
                    <th>Type de Données</th>
                    <th>Durée de Conservation</th>
                    <th>Justification</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Demandes de devis</td>
                    <td>3 ans</td>
                    <td>Suivi relation commerciale</td>
                </tr>
                <tr>
                    <td>Newsletter</td>
                    <td>Jusqu'à désinscription</td>
                    <td>Durée du consentement</td>
                </tr>
                <tr>
                    <td>Formulaire contact</td>
                    <td>1 an</td>
                    <td>Traitement de la demande</td>
                </tr>
                <tr>
                    <td>Données analytics</td>
                    <td>26 mois maximum</td>
                    <td>Recommandation CNIL</td>
                </tr>
                <tr>
                    <td>Cookies</td>
                    <td>13 mois maximum</td>
                    <td>Réglementation ePrivacy</td>
                </tr>
                <tr>
                    <td>Logs serveur</td>
                    <td>12 mois</td>
                    <td>Sécurité et debug</td>
                </tr>
            </tbody>
        </table>

        <p>À l'expiration de ces délais, vos données sont automatiquement supprimées ou anonymisées.</p>

        <h2>7. Vos Droits (RGPD)</h2>

        <p>Conformément au RGPD, vous disposez des droits suivants concernant vos données personnelles :</p>

        <h3>7.1 Droit d'Accès (Art. 15 RGPD)</h3>
        <p>Vous pouvez obtenir une copie de toutes les données personnelles vous concernant que nous détenons.</p>

        <h3>7.2 Droit de Rectification (Art. 16 RGPD)</h3>
        <p>Vous pouvez demander la correction de données inexactes ou incomplètes.</p>

        <h3>7.3 Droit à l'Effacement / "Droit à l'Oubli" (Art. 17 RGPD)</h3>
        <p>Vous pouvez demander la suppression de vos données dans certains cas (retrait du consentement, données non nécessaires, opposition au traitement).</p>

        <h3>7.4 Droit à la Limitation du Traitement (Art. 18 RGPD)</h3>
        <p>Vous pouvez demander la suspension temporaire du traitement de vos données.</p>

        <h3>7.5 Droit à la Portabilité (Art. 20 RGPD)</h3>
        <p>Vous pouvez recevoir vos données dans un format structuré et couramment utilisé, ou demander leur transmission directe à un autre responsable.</p>

        <h3>7.6 Droit d'Opposition (Art. 21 RGPD)</h3>
        <p>Vous pouvez vous opposer au traitement de vos données pour des raisons tenant à votre situation particulière.</p>

        <h3>7.7 Droit de Retirer votre Consentement</h3>
        <p>Lorsque le traitement est basé sur votre consentement, vous pouvez le retirer à tout moment.</p>

        <h3>7.8 Droit d'Introduire une Réclamation</h3>
        <p>Vous pouvez introduire une réclamation auprès de l'autorité de contrôle compétente :</p>
        <ul>
            <li><strong>Belgique :</strong> Autorité de Protection des Données (APD) - <a href="https://www.autoriteprotectiondonnees.be" target="_blank">www.autoriteprotectiondonnees.be</a></li>
        </ul>

        <div class="contact-box">
            <h3>💬 Comment Exercer vos Droits ?</h3>
            <p>Pour exercer l'un de ces droits, contactez-nous :</p>
            <p>
                <strong>Email :</strong> <a href="mailto:<?= SITE_EMAIL ?>?subject=RGPD - Exercice de mes droits"><?= SITE_EMAIL ?></a><br>
                <strong>Courrier :</strong> <?= SITE_NAME ?>, Rue de la Loi 123, 1000 Bruxelles, Belgique
            </p>
            <p style="font-size: 0.9rem; margin-top: 20px; opacity: 0.9;">
                Nous vous répondrons dans un délai maximum d'un mois. Une pièce d'identité pourra vous être demandée pour vérifier votre identité.
            </p>
        </div>

        <h2>8. Sécurité des Données</h2>

        <p>Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre :</p>

        <ul>
            <li>La destruction accidentelle ou illicite</li>
            <li>La perte accidentelle</li>
            <li>L'altération, la divulgation ou l'accès non autorisés</li>
            <li>Toute autre forme de traitement illicite</li>
        </ul>

        <h3>Mesures de Sécurité Mises en Place :</h3>
        <ul>
            <li><strong>Chiffrement HTTPS</strong> pour toutes les communications</li>
            <li><strong>Pare-feu</strong> et systèmes de détection d'intrusion</li>
            <li><strong>Sauvegardes régulières</strong> et chiffrées</li>
            <li><strong>Accès restreint</strong> aux données (principe du moindre privilège)</li>
            <li><strong>Authentification forte</strong> pour les comptes administrateurs</li>
            <li><strong>Mises à jour régulières</strong> des systèmes et logiciels</li>
            <li><strong>Sensibilisation du personnel</strong> à la protection des données</li>
        </ul>

        <h2>9. Cookies et Technologies Similaires</h2>

        <p>Notre site utilise des cookies et technologies similaires. Pour en savoir plus, consultez notre <a href="/politique-cookies.php">Politique de Cookies</a>.</p>

        <h3>Types de Cookies Utilisés :</h3>
        <ul>
            <li><strong>Cookies strictement nécessaires :</strong> Fonctionnement du site (session, sécurité)</li>
            <li><strong>Cookies de performance :</strong> Google Analytics (mesure d'audience)</li>
            <li><strong>Cookies de ciblage :</strong> Facebook Pixel (publicités personnalisées)</li>
        </ul>

        <p>Vous pouvez gérer vos préférences de cookies via le bandeau de consentement qui s'affiche lors de votre première visite.</p>

        <h2>10. Mineurs</h2>

        <p>Nos services ne s'adressent pas aux personnes de moins de 16 ans. Nous ne collectons pas sciemment de données personnelles concernant des mineurs.</p>

        <p>Si vous êtes parent ou tuteur légal et que vous découvrez que votre enfant nous a fourni des données personnelles, contactez-nous pour que nous puissions les supprimer.</p>

        <h2>11. Modifications de cette Politique</h2>

        <p>Nous pouvons modifier cette politique de confidentialité à tout moment pour refléter les changements dans nos pratiques ou pour des raisons légales.</p>

        <p><strong>En cas de modification substantielle</strong>, nous vous en informerons par email (si vous êtes inscrit à notre newsletter) ou via un bandeau sur notre site.</p>

        <p>La version la plus récente est toujours disponible sur cette page, avec la date de dernière mise à jour en haut.</p>

        <h2>12. Contact et Questions</h2>

        <p>Pour toute question concernant cette politique de confidentialité ou le traitement de vos données personnelles, n'hésitez pas à nous contacter :</p>

        <div class="contact-box">
            <h3>📧 Nous Contacter</h3>
            <p>
                <strong>Email :</strong> <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a><br>
                <strong>Téléphone :</strong> <a href="tel:<?= str_replace(' ', '', SITE_PHONE) ?>"><?= SITE_PHONE ?></a><br>
                <strong>Courrier :</strong> <?= SITE_NAME ?>, Rue de la Loi 123, 1000 Bruxelles, Belgique
            </p>
            <p style="margin-top: 20px;">
                <a href="/contact.php" style="background: white; color: #2563eb; padding: 12px 30px; border-radius: 8px; text-decoration: none; display: inline-block; font-weight: 600;">
                    Formulaire de Contact
                </a>
            </p>
        </div>

        <div class="info-box">
            <h4><i class="fas fa-info-circle"></i> Transparence Totale</h4>
            <p>Cette politique a été rédigée dans un souci de transparence totale. Si certains points ne sont pas clairs, n'hésitez pas à nous contacter pour des clarifications. Votre confiance est notre priorité.</p>
        </div>

        <hr style="margin: 60px 0; border: none; border-top: 2px solid #e5e7eb;">

        <p style="text-align: center; color: #6b7280; font-size: 0.9rem;">
            Dernière révision : <?= date('d/m/Y') ?><br>
            Document conforme au RGPD (Règlement UE 2016/679)
        </p>

    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
