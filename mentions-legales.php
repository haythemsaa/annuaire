<?php
$pageTitle = "Mentions Légales";
$pageDescription = "Mentions légales et informations légales du site " . SITE_NAME . ". Éditeur, hébergeur, conditions d'utilisation.";
require_once 'includes/header.php';
?>

<style>
.legal-hero {
    background: linear-gradient(135deg, #374151 0%, #1f2937 100%);
    padding: 80px 0;
    color: white;
    text-align: center;
}

.legal-hero h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.legal-hero p {
    font-size: 1.2rem;
    max-width: 700px;
    margin: 0 auto;
    opacity: 0.95;
}

.legal-content {
    max-width: 900px;
    margin: 60px auto;
    padding: 0 20px 80px;
}

.legal-content h2 {
    color: #1f2937;
    font-size: 2rem;
    margin-top: 50px;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 3px solid #6b7280;
}

.legal-content h3 {
    color: #374151;
    font-size: 1.5rem;
    margin-top: 35px;
    margin-bottom: 20px;
}

.legal-content p {
    color: #4b5563;
    line-height: 1.8;
    margin-bottom: 20px;
}

.legal-content ul {
    margin: 20px 0;
    padding-left: 30px;
}

.legal-content li {
    margin: 10px 0;
    color: #4b5563;
    line-height: 1.7;
}

.info-card {
    background: #f9fafb;
    padding: 30px;
    border-radius: 12px;
    margin: 30px 0;
    border-left: 5px solid #2563eb;
}

.info-card h4 {
    color: #1f2937;
    margin: 0 0 15px 0;
    font-size: 1.3rem;
}

.info-card p {
    margin: 5px 0;
}

.info-card strong {
    color: #1f2937;
    display: inline-block;
    min-width: 150px;
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

<div class="legal-hero">
    <div class="container">
        <h1>Mentions Légales</h1>
        <p>Informations légales concernant l'édition et la publication du site</p>
    </div>
</div>

<div class="container">
    <div class="legal-content">

        <div class="last-updated">
            <strong>Dernière mise à jour :</strong> <?= date('d/m/Y') ?>
        </div>

        <p>Conformément aux dispositions de la loi belge du 11 mars 2003 sur certains aspects juridiques des services de la société de l'information et à l'article VI.53 du Code de droit économique, les mentions légales suivantes sont portées à votre connaissance :</p>

        <h2>1. Éditeur du Site</h2>

        <div class="info-card">
            <h4>Informations sur l'Éditeur</h4>
            <p><strong>Raison sociale :</strong> <?= SITE_NAME ?></p>
            <p><strong>Forme juridique :</strong> [À compléter - Ex: SPRL, SRL, ASBL, etc.]</p>
            <p><strong>Numéro d'entreprise :</strong> BE [À compléter - Ex: 0123.456.789]</p>
            <p><strong>Siège social :</strong> Rue de la Loi 123, 1000 Bruxelles, Belgique</p>
            <p><strong>Téléphone :</strong> <?= SITE_PHONE ?></p>
            <p><strong>Email :</strong> <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></p>
            <p><strong>TVA :</strong> BE [À compléter - Ex: 0123456789]</p>
        </div>

        <h2>2. Directeur de la Publication</h2>

        <p><strong>Nom :</strong> [À compléter]<br>
        <strong>Qualité :</strong> Gérant / Administrateur Délégué<br>
        <strong>Contact :</strong> <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></p>

        <h2>3. Hébergement du Site</h2>

        <div class="info-card">
            <h4>Informations sur l'Hébergeur</h4>
            <p><strong>Raison sociale :</strong> [Nom de l'hébergeur - À compléter]</p>
            <p><strong>Adresse :</strong> [Adresse complète - À compléter]</p>
            <p><strong>Téléphone :</strong> [Numéro - À compléter]</p>
            <p><strong>Site web :</strong> [URL - À compléter]</p>
        </div>

        <h2>4. Protection des Données Personnelles</h2>

        <p>Le responsable du traitement des données personnelles est <?= SITE_NAME ?>.</p>

        <p>Pour toute information concernant la collecte et le traitement de vos données personnelles, veuillez consulter notre <a href="/politique-confidentialite.php">Politique de Confidentialité</a>.</p>

        <p>Vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données vous concernant (loi "Informatique et Libertés" du 6 janvier 1978).</p>

        <p><strong>Exercer vos droits :</strong> <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></p>

        <h2>5. Propriété Intellectuelle</h2>

        <h3>5.1 Contenu du Site</h3>

        <p>L'ensemble du contenu de ce site (textes, images, vidéos, logos, icônes, etc.) est la propriété exclusive de <?= SITE_NAME ?> ou de ses partenaires, sauf mention contraire.</p>

        <p>Toute reproduction, représentation, modification, publication, adaptation totale ou partielle des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de <?= SITE_NAME ?>.</p>

        <h3>5.2 Marques et Logos</h3>

        <p>Les marques, logos, signes et tout autre contenu du site font l'objet d'une protection par le Code de la propriété intellectuelle et plus particulièrement par le droit d'auteur.</p>

        <p>Toute utilisation non autorisée constitue une contrefaçon passible de sanctions pénales et civiles.</p>

        <h3>5.3 Liens Hypertextes</h3>

        <p>La mise en place de liens hypertextes vers des pages du site nécessite une autorisation écrite préalable de <?= SITE_NAME ?>.</p>

        <p>Notre site peut contenir des liens vers d'autres sites internet. Nous ne pouvons être tenus responsables du contenu de ces sites externes.</p>

        <h2>6. Responsabilité et Garanties</h2>

        <h3>6.1 Limitation de Responsabilité</h3>

        <p><?= SITE_NAME ?> s'efforce d'assurer au mieux de ses possibilités, l'exactitude et la mise à jour des informations diffusées sur ce site. Toutefois, nous ne pouvons garantir l'exactitude, la précision ou l'exhaustivité des informations mises à disposition.</p>

        <p>En conséquence, <?= SITE_NAME ?> décline toute responsabilité :</p>

        <ul>
            <li>Pour toute imprécision, inexactitude ou omission portant sur des informations disponibles sur le site</li>
            <li>Pour tous dommages résultant d'une intrusion frauduleuse d'un tiers ayant entraîné une modification des informations</li>
            <li>Pour tous dommages directs ou indirects résultant de l'utilisation du site</li>
            <li>Pour l'interruption temporaire ou permanente du site</li>
        </ul>

        <h3>6.2 Informations sur les Déménageurs</h3>

        <p><?= SITE_NAME ?> est une plateforme de mise en relation entre particuliers et professionnels du déménagement. Nous ne sommes pas responsables :</p>

        <ul>
            <li>De la qualité des services fournis par les entreprises de déménagement</li>
            <li>Des dommages causés lors du déménagement</li>
            <li>Des litiges entre utilisateurs et prestataires</li>
            <li>De l'exactitude des informations fournies par les entreprises partenaires</li>
        </ul>

        <p><strong>Les utilisateurs sont invités à vérifier les certifications, assurances et références des entreprises avant de contracter.</strong></p>

        <h2>7. Cookies</h2>

        <p>Notre site utilise des cookies pour améliorer votre expérience de navigation et analyser le trafic.</p>

        <p>Pour plus d'informations sur l'utilisation des cookies, consultez notre <a href="/politique-confidentialite.php#cookies">Politique de Cookies</a>.</p>

        <p>Vous pouvez gérer vos préférences de cookies via les paramètres de votre navigateur ou via notre bandeau de consentement.</p>

        <h2>8. Droit Applicable et Juridiction</h2>

        <p>Le présent site et les présentes mentions légales sont régis par le droit belge.</p>

        <p>En cas de litige et à défaut d'accord amiable, le litige sera porté devant les tribunaux belges conformément aux règles de compétence en vigueur.</p>

        <p><strong>Juridiction compétente :</strong> Tribunaux de l'arrondissement judiciaire de Bruxelles, Belgique.</p>

        <h2>9. Conditions Générales d'Utilisation</h2>

        <h3>9.1 Acceptation des Conditions</h3>

        <p>L'utilisation de ce site implique l'acceptation pleine et entière des présentes mentions légales et conditions générales d'utilisation.</p>

        <h3>9.2 Utilisation du Site</h3>

        <p>L'utilisateur s'engage à :</p>

        <ul>
            <li>Utiliser le site de manière loyale et conforme à sa destination</li>
            <li>Ne pas perturber le bon fonctionnement du site</li>
            <li>Ne pas utiliser le site à des fins illégales ou frauduleuses</li>
            <li>Ne pas collecter ou extraire des données de manière automatisée</li>
            <li>Fournir des informations exactes et véridiques</li>
        </ul>

        <h3>9.3 Service de Mise en Relation</h3>

        <p><?= SITE_NAME ?> propose un service gratuit de mise en relation entre particuliers et professionnels du déménagement.</p>

        <p><strong>Notre service comprend :</strong></p>
        <ul>
            <li>Un comparateur d'entreprises de déménagement</li>
            <li>La mise à disposition d'outils (calculateur de volume, checklist, etc.)</li>
            <li>La transmission de demandes de devis</li>
            <li>Des guides et conseils pratiques</li>
        </ul>

        <p><strong>Gratuit :</strong> Tous nos services sont entièrement gratuits pour les particuliers. Nous percevons une commission auprès des entreprises partenaires en cas de mise en relation aboutie.</p>

        <h2>10. Médiation et Règlement des Litiges</h2>

        <p>Conformément à l'article XVI.2 du Code de droit économique belge, en cas de litige, vous pouvez faire appel au service de médiation compétent :</p>

        <div class="info-card">
            <h4>Service de Médiation pour le Consommateur</h4>
            <p><strong>Nom :</strong> Service de Médiation pour le Consommateur</p>
            <p><strong>Adresse :</strong> North Gate II, Boulevard du Roi Albert II, 8 Bte 1, 1000 Bruxelles</p>
            <p><strong>Téléphone :</strong> +32 2 702 52 00</p>
            <p><strong>Email :</strong> contact@mediationconsommateur.be</p>
            <p><strong>Site web :</strong> <a href="https://www.mediationconsommateur.be" target="_blank">www.mediationconsommateur.be</a></p>
        </div>

        <p>Vous pouvez également utiliser la plateforme européenne de règlement en ligne des litiges : <a href="https://ec.europa.eu/consumers/odr" target="_blank">https://ec.europa.eu/consumers/odr</a></p>

        <h2>11. Modifications des Mentions Légales</h2>

        <p><?= SITE_NAME ?> se réserve le droit de modifier les présentes mentions légales à tout moment. Les modifications entrent en vigueur dès leur publication sur le site.</p>

        <p>La version la plus récente est toujours disponible sur cette page.</p>

        <h2>12. Contact</h2>

        <p>Pour toute question concernant les présentes mentions légales, vous pouvez nous contacter :</p>

        <div class="info-card">
            <h4>Nous Contacter</h4>
            <p><strong>Par email :</strong> <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></p>
            <p><strong>Par téléphone :</strong> <a href="tel:<?= str_replace(' ', '', SITE_PHONE) ?>"><?= SITE_EMAIL ?></a></p>
            <p><strong>Par courrier :</strong> <?= SITE_NAME ?>, Rue de la Loi 123, 1000 Bruxelles, Belgique</p>
            <p><strong>Formulaire :</strong> <a href="/contact.php">Page de contact</a></p>
        </div>

        <hr style="margin: 60px 0; border: none; border-top: 2px solid #e5e7eb;">

        <h2>13. Liens Utiles</h2>

        <p>Documents légaux complémentaires :</p>

        <ul>
            <li><a href="/politique-confidentialite.php">Politique de Confidentialité (RGPD)</a></li>
            <li><a href="/conditions-generales.php">Conditions Générales de Vente</a> (si applicable)</li>
            <li><a href="/faq.php">Foire Aux Questions (FAQ)</a></li>
        </ul>

        <hr style="margin: 60px 0; border: none; border-top: 2px solid #e5e7eb;">

        <p style="text-align: center; color: #6b7280; font-size: 0.9rem;">
            Dernière révision : <?= date('d/m/Y') ?><br>
            Conforme à la législation belge en vigueur
        </p>

    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
