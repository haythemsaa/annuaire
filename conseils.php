<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'conseils';
$pageTitle = 'Conseils pour votre déménagement';
$pageDescription = 'Tous nos conseils d\'experts pour réussir votre déménagement : organisation, budget, astuces et checklist complète.';

include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h2><i class="fas fa-lightbulb"></i> Guide Complet du Déménagement</h2>
            <p>Tous les conseils d'experts pour un déménagement réussi et sans stress</p>
        </div>
    </div>
</section>

<!-- Table of Contents -->
<section style="padding: 2rem 0; background-color: #eff6ff;">
    <div class="container" style="max-width: 800px;">
        <div style="background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <h3 style="margin-bottom: 1rem;"><i class="fas fa-list"></i> Sommaire</h3>
            <ol style="line-height: 2;">
                <li><a href="#preparation">Préparation du déménagement (2-3 mois avant)</a></li>
                <li><a href="#budget">Budget et devis</a></li>
                <li><a href="#emballage">Techniques d'emballage</a></li>
                <li><a href="#jour-j">Le jour du déménagement</a></li>
                <li><a href="#installation">Installation dans le nouveau logement</a></li>
                <li><a href="#administratif">Démarches administratives</a></li>
                <li><a href="#astuces">Astuces et conseils pratiques</a></li>
            </ol>
        </div>
    </div>
</section>

<!-- Content Sections -->
<section style="padding: 3rem 0;">
    <div class="container" style="max-width: 900px;">

        <!-- Section 1 -->
        <article id="preparation" style="margin-bottom: 4rem;">
            <h2 style="color: #2563eb; margin-bottom: 1rem;">
                <i class="fas fa-calendar-check"></i> 1. Préparation du déménagement
            </h2>
            <div style="background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3>2-3 mois avant</h3>
                <ul style="line-height: 2;">
                    <li><strong>Triez vos affaires</strong> - C'est le moment de désencombrer et de vous débarrasser du superflu</li>
                    <li><strong>Demandez plusieurs devis</strong> - Comparez au moins 3 entreprises de déménagement</li>
                    <li><strong>Réservez votre déménageur</strong> - Les meilleures dates partent vite !</li>
                    <li><strong>Prévenez votre propriétaire</strong> - Respectez le préavis de votre bail</li>
                    <li><strong>Inscrivez vos enfants</strong> - Nouvelle école si changement de ville</li>
                </ul>

                <h3 style="margin-top: 2rem;">1 mois avant</h3>
                <ul style="line-height: 2;">
                    <li><strong>Commencez à emballer</strong> - Les objets peu utilisés en premier</li>
                    <li><strong>Collectez des cartons</strong> - Supermarchés, magasins, ou achetez-en</li>
                    <li><strong>Faites vos changements d'adresse</strong> - Poste, banque, assurances</li>
                    <li><strong>Transférez vos abonnements</strong> - Électricité, gaz, internet, téléphone</li>
                    <li><strong>Demandez votre état des lieux de sortie</strong></li>
                </ul>

                <div style="background: #fef3c7; padding: 1rem; border-radius: 0.5rem; margin-top: 1.5rem; border-left: 4px solid #f59e0b;">
                    <strong><i class="fas fa-star"></i> Conseil d'expert :</strong> Créez un dossier avec tous les documents importants du déménagement (contrats, devis, inventaires).
                </div>
            </div>
        </article>

        <!-- Section 2 -->
        <article id="budget" style="margin-bottom: 4rem;">
            <h2 style="color: #2563eb; margin-bottom: 1rem;">
                <i class="fas fa-euro-sign"></i> 2. Budget et devis
            </h2>
            <div style="background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3>Prix moyens par type de logement</h3>
                <table style="width: 100%; border-collapse: collapse; margin: 1rem 0;">
                    <tr style="background: #f9fafb;">
                        <th style="padding: 1rem; text-align: left; border-bottom: 2px solid #e5e7eb;">Type</th>
                        <th style="padding: 1rem; text-align: right; border-bottom: 2px solid #e5e7eb;">Prix moyen</th>
                    </tr>
                    <tr>
                        <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">Studio (20-30m²)</td>
                        <td style="padding: 1rem; text-align: right; border-bottom: 1px solid #e5e7eb; font-weight: bold;">300-500€</td>
                    </tr>
                    <tr>
                        <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">T2 (40-50m²)</td>
                        <td style="padding: 1rem; text-align: right; border-bottom: 1px solid #e5e7eb; font-weight: bold;">450-750€</td>
                    </tr>
                    <tr>
                        <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">T3 (60-75m²)</td>
                        <td style="padding: 1rem; text-align: right; border-bottom: 1px solid #e5e7eb; font-weight: bold;">700-1100€</td>
                    </tr>
                    <tr>
                        <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">T4+ (80m²+)</td>
                        <td style="padding: 1rem; text-align: right; border-bottom: 1px solid #e5e7eb; font-weight: bold;">1000-2500€</td>
                    </tr>
                </table>

                <h3 style="margin-top: 2rem;">Coûts supplémentaires à prévoir</h3>
                <ul style="line-height: 2;">
                    <li>📦 <strong>Cartons et matériel</strong> : 50-150€</li>
                    <li>🏗️ <strong>Location de lift</strong> : 200-400€</li>
                    <li>📁 <strong>Frais administratifs</strong> : 100-300€</li>
                    <li>🧹 <strong>Nettoyage fin de bail</strong> : 150-400€</li>
                    <li>🔧 <strong>Petits travaux</strong> : 100-500€</li>
                </ul>

                <a href="/calculateur.php" class="btn btn-primary" style="margin-top: 1.5rem; display: inline-block;">
                    <i class="fas fa-calculator"></i> Calculer mon budget
                </a>
            </div>
        </article>

        <!-- Section 3 -->
        <article id="emballage" style="margin-bottom: 4rem;">
            <h2 style="color: #2563eb; margin-bottom: 1rem;">
                <i class="fas fa-box"></i> 3. Techniques d'emballage
            </h2>
            <div style="background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3>Matériel nécessaire</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin: 1.5rem 0;">
                    <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                        <strong>📦 Cartons</strong><br>
                        <span style="color: #6b7280;">Différentes tailles</span>
                    </div>
                    <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                        <strong>📋 Papier bulle</strong><br>
                        <span style="color: #6b7280;">Pour objets fragiles</span>
                    </div>
                    <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                        <strong>📰 Papier journal</strong><br>
                        <span style="color: #6b7280;">Protection et calage</span>
                    </div>
                    <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                        <strong>🎭 Ruban adhésif</strong><br>
                        <span style="color: #6b7280;">Renforcé de préférence</span>
                    </div>
                    <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                        <strong>🏷️ Marqueurs</strong><br>
                        <span style="color: #6b7280;">Pour étiqueter</span>
                    </div>
                    <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                        <strong>🎨 Couvertures</strong><br>
                        <span style="color: #6b7280;">Pour les meubles</span>
                    </div>
                </div>

                <h3 style="margin-top: 2rem;">Conseils d'emballage par pièce</h3>

                <div style="margin: 1.5rem 0; padding: 1rem; background: #eff6ff; border-left: 4px solid #2563eb;">
                    <h4 style="margin-bottom: 0.5rem;">🍽️ Cuisine</h4>
                    <ul>
                        <li>Emballez la vaisselle verticalement dans les cartons</li>
                        <li>Mettez du papier bulle entre chaque assiette</li>
                        <li>Remplissez les verres avec du papier journal</li>
                        <li>Videz et dégivrez le frigo 24h avant</li>
                    </ul>
                </div>

                <div style="margin: 1.5rem 0; padding: 1rem; background: #fef3c7; border-left: 4px solid #f59e0b;">
                    <h4 style="margin-bottom: 0.5rem;">👔 Vêtements</h4>
                    <ul>
                        <li>Utilisez des valises pour les vêtements lourds</li>
                        <li>Gardez les vêtements sur cintres avec des housses</li>
                        <li>Roulez les vêtements pour gagner de la place</li>
                    </ul>
                </div>

                <div style="margin: 1.5rem 0; padding: 1rem; background: #d1fae5; border-left: 4px solid #10b981;">
                    <h4 style="margin-bottom: 0.5rem;">📚 Livres et objets lourds</h4>
                    <ul>
                        <li>Utilisez de petits cartons pour les livres</li>
                        <li>Ne surchargez pas les cartons (max 20kg)</li>
                        <li>Renforcez le fond avec du ruban adhésif</li>
                    </ul>
                </div>
            </div>
        </article>

        <!-- Section 4 -->
        <article id="jour-j" style="margin-bottom: 4rem;">
            <h2 style="color: #2563eb; margin-bottom: 1rem;">
                <i class="fas fa-truck"></i> 4. Le jour du déménagement
            </h2>
            <div style="background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3>Le matin</h3>
                <ul style="line-height: 2;">
                    <li>✅ Préparez un sac avec l'essentiel (documents, médicaments, chargeurs)</li>
                    <li>✅ Prenez un bon petit-déjeuner</li>
                    <li>✅ Vérifiez que tous les cartons sont fermés et étiquetés</li>
                    <li>✅ Préparez du café et des collations pour les déménageurs</li>
                </ul>

                <h3 style="margin-top: 2rem;">Pendant le déménagement</h3>
                <ul style="line-height: 2;">
                    <li>👥 Désignez une personne responsable</li>
                    <li>📝 Faites un inventaire des meubles et cartons</li>
                    <li>🚪 Protégez les passages (murs, portes, escaliers)</li>
                    <li>🔍 Surveillez les objets fragiles</li>
                    <li>💧 Prévoyez de l'eau pour tout le monde</li>
                </ul>

                <h3 style="margin-top: 2rem;">Avant de partir</h3>
                <ul style="line-height: 2;">
                    <li>🔦 Vérifiez toutes les pièces et placards</li>
                    <li>🔌 Coupez eau, gaz et électricité</li>
                    <li>📸 Prenez des photos de l'état des lieux</li>
                    <li>🔑 Rendez les clés au propriétaire ou à l'agence</li>
                </ul>
            </div>
        </article>

        <!-- Section 5 -->
        <article id="installation" style="margin-bottom: 4rem;">
            <h2 style="color: #2563eb; margin-bottom: 1rem;">
                <i class="fas fa-home"></i> 5. Installation dans le nouveau logement
            </h2>
            <div style="background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3>Ordre de priorité pour déballer</h3>
                <ol style="line-height: 2.5;">
                    <li><strong>Chambre et literie</strong> - Pour pouvoir dormir le premier soir</li>
                    <li><strong>Salle de bain</strong> - Produits d'hygiène essentiels</li>
                    <li><strong>Cuisine</strong> - Pour pouvoir se préparer à manger</li>
                    <li><strong>Vêtements</strong> - Pour le lendemain</li>
                    <li><strong>Salon</strong> - Pour le confort</li>
                    <li><strong>Reste des affaires</strong> - Au fur et à mesure</li>
                </ol>

                <div style="background: #fee2e2; padding: 1rem; border-radius: 0.5rem; margin-top: 1.5rem; border-left: 4px solid #ef4444;">
                    <strong><i class="fas fa-exclamation-triangle"></i> Important :</strong> Vérifiez immédiatement que l'eau, l'électricité et le chauffage fonctionnent.
                </div>
            </div>
        </article>

        <!-- Section 6 -->
        <article id="administratif" style="margin-bottom: 4rem;">
            <h2 style="color: #2563eb; margin-bottom: 1rem;">
                <i class="fas fa-file-alt"></i> 6. Démarches administratives
            </h2>
            <div style="background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3>Dans les 8 jours</h3>
                <ul style="line-height: 2;">
                    <li>🏛️ Mairie - Changement d'adresse</li>
                    <li>📮 La Poste - Réexpédition du courrier</li>
                    <li>🚗 Carte grise - Mise à jour adresse</li>
                </ul>

                <h3 style="margin-top: 2rem;">Dans le mois</h3>
                <ul style="line-height: 2;">
                    <li>🏦 Banques et assurances</li>
                    <li>💼 Employeur</li>
                    <li>🏥 Sécurité sociale et mutuelle</li>
                    <li>💰 Impôts</li>
                    <li>🏫 Établissements scolaires</li>
                    <li>📱 Opérateurs téléphoniques et internet</li>
                </ul>

                <a href="/checklist.php" class="btn btn-primary" style="margin-top: 1.5rem; display: inline-block;">
                    <i class="fas fa-tasks"></i> Voir la checklist complète
                </a>
            </div>
        </article>

        <!-- Section 7 -->
        <article id="astuces" style="margin-bottom: 4rem;">
            <h2 style="color: #2563eb; margin-bottom: 1rem;">
                <i class="fas fa-magic"></i> 7. Astuces et conseils pratiques
            </h2>
            <div style="background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                    <div style="padding: 1.5rem; background: #f0fdf4; border-radius: 0.5rem; border: 2px solid #10b981;">
                        <h4 style="color: #065f46; margin-bottom: 0.5rem;">💡 Astuce économique</h4>
                        <p>Déménagez en milieu de semaine et hors vacances scolaires pour obtenir de meilleurs tarifs.</p>
                    </div>
                    <div style="padding: 1.5rem; background: #fef3c7; border-radius: 0.5rem; border: 2px solid #f59e0b;">
                        <h4 style="color: #92400e; margin-bottom: 0.5rem;">🎨 Astuce organisation</h4>
                        <p>Utilisez un code couleur par pièce pour faciliter le rangement dans le nouveau logement.</p>
                    </div>
                    <div style="padding: 1.5rem; background: #eff6ff; border-radius: 0.5rem; border: 2px solid #2563eb;">
                        <h4 style="color: #1e40af; margin-bottom: 0.5rem;">🔧 Astuce pratique</h4>
                        <p>Prenez des photos de vos branchements électroniques avant de les débrancher.</p>
                    </div>
                    <div style="padding: 1.5rem; background: #fce7f3; border-radius: 0.5rem; border: 2px solid #ec4899;">
                        <h4 style="color: #831843; margin-bottom: 0.5rem;">👶 Avec des enfants</h4>
                        <p>Préparez un carton "survie" avec leurs jouets préférés et doudous pour le premier jour.</p>
                    </div>
                </div>
            </div>
        </article>

    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Prêt à organiser votre déménagement ?</h2>
        <p>Demandez des devis gratuits aux meilleures entreprises</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
            <a href="/devis.php" class="btn btn-primary btn-large">
                <i class="fas fa-file-invoice"></i> Demander des devis
            </a>
            <a href="/calculateur.php" class="btn" style="background: white; color: #2563eb;">
                <i class="fas fa-calculator"></i> Calculer mon budget
            </a>
            <a href="/checklist.php" class="btn" style="background: white; color: #2563eb;">
                <i class="fas fa-tasks"></i> Voir la checklist
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
