<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'tarifs';
$pageTitle = 'Tarifs de déménagement';
$pageDescription = 'Découvrez nos tarifs détaillés par zone et par service. Prix transparents pour votre déménagement en Belgique.';

include __DIR__ . '/includes/header.php';
?>

<style>
    .pricing-table {
        overflow-x: auto;
        margin: 2rem 0;
    }
    .pricing-table table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        border-radius: 0.5rem;
        overflow: hidden;
    }
    .pricing-table th {
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        color: white;
        padding: 1rem;
        text-align: left;
        font-weight: 600;
    }
    .pricing-table td {
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb;
    }
    .pricing-table tr:last-child td {
        border-bottom: none;
    }
    .pricing-table tr:hover {
        background-color: #f9fafb;
    }
    .price-badge {
        display: inline-block;
        padding: 0.375rem 0.75rem;
        border-radius: 1rem;
        font-weight: 600;
        font-size: 0.875rem;
    }
    .price-low {
        background-color: #d1fae5;
        color: #065f46;
    }
    .price-medium {
        background-color: #fef3c7;
        color: #92400e;
    }
    .price-high {
        background-color: #ede9fe;
        color: #5b21b6;
    }
    .zone-card {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        border-left: 4px solid #2563eb;
    }
    .zone-card h3 {
        color: #2563eb;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .service-pricing {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 2rem 0;
    }
    .service-price-card {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.3s, box-shadow 0.3s;
        border-top: 4px solid #2563eb;
    }
    .service-price-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }
    .service-price-card h4 {
        color: #1f2937;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .service-price-card .price {
        font-size: 2rem;
        font-weight: bold;
        color: #2563eb;
        margin: 1rem 0;
    }
    .service-price-card ul {
        list-style: none;
        padding: 0;
    }
    .service-price-card ul li {
        padding: 0.5rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #6b7280;
    }
    .service-price-card ul li i {
        color: #10b981;
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h2><i class="fas fa-euro-sign"></i> Tarifs de déménagement</h2>
            <p>Tous nos prix détaillés par zone et par service - Transparence garantie</p>
        </div>
    </div>
</section>

<!-- Pricing by Housing Type -->
<section style="padding: 4rem 0; background: #f9fafb;">
    <div class="container" style="max-width: 1200px;">
        <h2 class="section-title">Tarifs par type de logement</h2>
        <p style="text-align: center; color: #6b7280; margin-bottom: 3rem;">
            Estimations pour un déménagement local (jusqu'à 30km) en Belgique
        </p>

        <div class="pricing-table">
            <table>
                <thead>
                    <tr>
                        <th>Type de logement</th>
                        <th>Volume estimé</th>
                        <th>Équipe</th>
                        <th>Durée moyenne</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Studio / 1 chambre</strong></td>
                        <td>15-25 m³</td>
                        <td>2 déménageurs</td>
                        <td>3-4 heures</td>
                        <td><span class="price-badge price-low">400-600€</span></td>
                    </tr>
                    <tr>
                        <td><strong>2 chambres</strong></td>
                        <td>30-40 m³</td>
                        <td>2-3 déménageurs</td>
                        <td>4-6 heures</td>
                        <td><span class="price-badge price-low">700-1000€</span></td>
                    </tr>
                    <tr>
                        <td><strong>3 chambres</strong></td>
                        <td>50-60 m³</td>
                        <td>3 déménageurs</td>
                        <td>6-8 heures</td>
                        <td><span class="price-badge price-medium">1100-1500€</span></td>
                    </tr>
                    <tr>
                        <td><strong>4 chambres</strong></td>
                        <td>70-80 m³</td>
                        <td>3-4 déménageurs</td>
                        <td>8-10 heures</td>
                        <td><span class="price-badge price-medium">1600-2200€</span></td>
                    </tr>
                    <tr>
                        <td><strong>Maison 5+ chambres</strong></td>
                        <td>90+ m³</td>
                        <td>4-5 déménageurs</td>
                        <td>10-12 heures</td>
                        <td><span class="price-badge price-high">2500-4000€</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="background: #eff6ff; padding: 1.5rem; border-radius: 0.5rem; margin-top: 2rem; border-left: 4px solid #2563eb;">
            <p style="margin: 0; color: #1e40af;">
                <i class="fas fa-info-circle"></i>
                <strong>Note :</strong> Ces tarifs sont indicatifs et peuvent varier selon la complexité de votre déménagement
                (étages, accessibilité, meubles lourds, etc.). Demandez un devis personnalisé pour un prix exact.
            </p>
        </div>
    </div>
</section>

<!-- Pricing by Distance/Zone -->
<section style="padding: 4rem 0;">
    <div class="container" style="max-width: 1200px;">
        <h2 class="section-title">Tarifs par zone géographique</h2>

        <div class="zone-card">
            <h3><i class="fas fa-map-marker-alt"></i> Bruxelles-Capitale</h3>
            <p style="color: #6b7280; margin-bottom: 1rem;">
                Déménagement dans la région de Bruxelles (19 communes)
            </p>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                    <div style="font-size: 0.875rem; color: #9ca3af;">Studio</div>
                    <div style="font-size: 1.5rem; font-weight: bold; color: #2563eb;">400-600€</div>
                </div>
                <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                    <div style="font-size: 0.875rem; color: #9ca3af;">2-3 chambres</div>
                    <div style="font-size: 1.5rem; font-weight: bold; color: #2563eb;">900-1500€</div>
                </div>
                <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                    <div style="font-size: 0.875rem; color: #9ca3af;">Maison</div>
                    <div style="font-size: 1.5rem; font-weight: bold; color: #2563eb;">2000-3500€</div>
                </div>
            </div>
        </div>

        <div class="zone-card" style="border-left-color: #10b981;">
            <h3 style="color: #10b981;"><i class="fas fa-map-marker-alt"></i> Wallonie</h3>
            <p style="color: #6b7280; margin-bottom: 1rem;">
                Déménagement dans les provinces wallonnes (Brabant wallon, Hainaut, Liège, Luxembourg, Namur)
            </p>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                    <div style="font-size: 0.875rem; color: #9ca3af;">Studio</div>
                    <div style="font-size: 1.5rem; font-weight: bold; color: #10b981;">450-700€</div>
                </div>
                <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                    <div style="font-size: 0.875rem; color: #9ca3af;">2-3 chambres</div>
                    <div style="font-size: 1.5rem; font-weight: bold; color: #10b981;">950-1600€</div>
                </div>
                <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                    <div style="font-size: 0.875rem; color: #9ca3af;">Maison</div>
                    <div style="font-size: 1.5rem; font-weight: bold; color: #10b981;">2100-3800€</div>
                </div>
            </div>
        </div>

        <div class="zone-card" style="border-left-color: #f59e0b;">
            <h3 style="color: #f59e0b;"><i class="fas fa-map-marker-alt"></i> Flandre</h3>
            <p style="color: #6b7280; margin-bottom: 1rem;">
                Déménagement dans les provinces flamandes (Anvers, Brabant flamand, Flandre occidentale, Flandre orientale, Limbourg)
            </p>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                    <div style="font-size: 0.875rem; color: #9ca3af;">Studio</div>
                    <div style="font-size: 1.5rem; font-weight: bold; color: #f59e0b;">450-700€</div>
                </div>
                <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                    <div style="font-size: 0.875rem; color: #9ca3af;">2-3 chambres</div>
                    <div style="font-size: 1.5rem; font-weight: bold; color: #f59e0b;">950-1600€</div>
                </div>
                <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                    <div style="font-size: 0.875rem; color: #9ca3af;">Maison</div>
                    <div style="font-size: 1.5rem; font-weight: bold; color: #f59e0b;">2100-3800€</div>
                </div>
            </div>
        </div>

        <div class="zone-card" style="border-left-color: #8b5cf6;">
            <h3 style="color: #8b5cf6;"><i class="fas fa-route"></i> Longue distance (100km+)</h3>
            <p style="color: #6b7280; margin-bottom: 1rem;">
                Déménagement entre régions ou vers l'international
            </p>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                    <div style="font-size: 0.875rem; color: #9ca3af;">Studio</div>
                    <div style="font-size: 1.5rem; font-weight: bold; color: #8b5cf6;">600-1000€</div>
                </div>
                <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                    <div style="font-size: 0.875rem; color: #9ca3af;">2-3 chambres</div>
                    <div style="font-size: 1.5rem; font-weight: bold; color: #8b5cf6;">1500-2500€</div>
                </div>
                <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem;">
                    <div style="font-size: 0.875rem; color: #9ca3af;">Maison</div>
                    <div style="font-size: 1.5rem; font-weight: bold; color: #8b5cf6;">3000-6000€</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Services Pricing -->
<section style="padding: 4rem 0; background: #f9fafb;">
    <div class="container" style="max-width: 1200px;">
        <h2 class="section-title">Tarifs des services additionnels</h2>
        <p style="text-align: center; color: #6b7280; margin-bottom: 3rem;">
            Options supplémentaires pour personnaliser votre déménagement
        </p>

        <div class="service-pricing">
            <div class="service-price-card">
                <h4><i class="fas fa-box"></i> Emballage professionnel</h4>
                <div class="price">150-500€</div>
                <ul>
                    <li><i class="fas fa-check"></i> Matériel d'emballage inclus</li>
                    <li><i class="fas fa-check"></i> Cartons de qualité</li>
                    <li><i class="fas fa-check"></i> Protection des objets fragiles</li>
                    <li><i class="fas fa-check"></i> Gain de temps considérable</li>
                </ul>
            </div>

            <div class="service-price-card">
                <h4><i class="fas fa-tools"></i> Montage/Démontage meubles</h4>
                <div class="price">100-300€</div>
                <ul>
                    <li><i class="fas fa-check"></i> Démontage avant transport</li>
                    <li><i class="fas fa-check"></i> Remontage dans nouveau logement</li>
                    <li><i class="fas fa-check"></i> Outils professionnels</li>
                    <li><i class="fas fa-check"></i> Protection garantie</li>
                </ul>
            </div>

            <div class="service-price-card">
                <h4><i class="fas fa-dolly"></i> Monte-meubles / Élévateur</h4>
                <div class="price">200-400€</div>
                <ul>
                    <li><i class="fas fa-check"></i> Pour étages élevés</li>
                    <li><i class="fas fa-check"></i> Accès difficile</li>
                    <li><i class="fas fa-check"></i> Sécurité maximale</li>
                    <li><i class="fas fa-check"></i> Rapidité d'exécution</li>
                </ul>
            </div>

            <div class="service-price-card">
                <h4><i class="fas fa-warehouse"></i> Stockage temporaire</h4>
                <div class="price">50-200€/mois</div>
                <ul>
                    <li><i class="fas fa-check"></i> Box sécurisés</li>
                    <li><i class="fas fa-check"></i> Surveillance 24/7</li>
                    <li><i class="fas fa-check"></i> Accès flexible</li>
                    <li><i class="fas fa-check"></i> Assurance incluse</li>
                </ul>
            </div>

            <div class="service-price-card">
                <h4><i class="fas fa-broom"></i> Nettoyage fin de bail</h4>
                <div class="price">150-400€</div>
                <ul>
                    <li><i class="fas fa-check"></i> Nettoyage complet</li>
                    <li><i class="fas fa-check"></i> Récupération de caution</li>
                    <li><i class="fas fa-check"></i> Produits professionnels</li>
                    <li><i class="fas fa-check"></i> Garantie résultat</li>
                </ul>
            </div>

            <div class="service-price-card">
                <h4><i class="fas fa-shield-alt"></i> Assurance premium</h4>
                <div class="price">50-150€</div>
                <ul>
                    <li><i class="fas fa-check"></i> Couverture complète</li>
                    <li><i class="fas fa-check"></i> Valeur à neuf</li>
                    <li><i class="fas fa-check"></i> Franchise réduite</li>
                    <li><i class="fas fa-check"></i> Tranquillité d'esprit</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Factors affecting price -->
<section style="padding: 4rem 0;">
    <div class="container" style="max-width: 900px;">
        <h2 class="section-title">Facteurs influençant le prix</h2>

        <div style="display: grid; gap: 2rem;">
            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                <h3 style="color: #2563eb; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-building"></i> Caractéristiques du logement
                </h3>
                <ul style="color: #6b7280; line-height: 1.8;">
                    <li><strong>Étage :</strong> Chaque étage supplémentaire sans ascenseur augmente le coût de 50-100€</li>
                    <li><strong>Accessibilité :</strong> Rue étroite, stationnement difficile peuvent ajouter 100-200€</li>
                    <li><strong>Volume :</strong> Plus de biens = plus de temps et de personnel nécessaires</li>
                </ul>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                <h3 style="color: #10b981; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-calendar-alt"></i> Période de déménagement
                </h3>
                <ul style="color: #6b7280; line-height: 1.8;">
                    <li><strong>Haute saison (mai-septembre) :</strong> Tarifs 10-20% plus élevés</li>
                    <li><strong>Fin de mois :</strong> Période très demandée, réserver à l'avance</li>
                    <li><strong>Week-end :</strong> Supplément de 10-15% possible</li>
                </ul>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                <h3 style="color: #f59e0b; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-couch"></i> Type de biens
                </h3>
                <ul style="color: #6b7280; line-height: 1.8;">
                    <li><strong>Objets fragiles :</strong> Nécessitent plus de temps et de précautions</li>
                    <li><strong>Meubles volumineux :</strong> Piano, coffre-fort = supplément 100-300€</li>
                    <li><strong>Antiquités :</strong> Emballage spécial et assurance recommandés</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Tips to save money -->
<section style="padding: 4rem 0; background: linear-gradient(135deg, #eff6ff, #dbeafe);">
    <div class="container" style="max-width: 900px;">
        <h2 class="section-title">💡 Conseils pour réduire les coûts</h2>

        <div style="display: grid; gap: 1.5rem;">
            <div style="background: white; padding: 1.5rem; border-radius: 0.5rem; display: flex; gap: 1rem; align-items: start;">
                <div style="background: #2563eb; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="fas fa-box-open"></i>
                </div>
                <div>
                    <h4 style="margin-bottom: 0.5rem; color: #1f2937;">Faites vos cartons vous-même</h4>
                    <p style="color: #6b7280; margin: 0;">Économisez 150-500€ en emballant vos affaires personnellement</p>
                </div>
            </div>

            <div style="background: white; padding: 1.5rem; border-radius: 0.5rem; display: flex; gap: 1rem; align-items: start;">
                <div style="background: #10b981; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div>
                    <h4 style="margin-bottom: 0.5rem; color: #1f2937;">Déménagez hors saison</h4>
                    <p style="color: #6b7280; margin: 0;">Octobre à avril offre les meilleurs tarifs (10-20% moins cher)</p>
                </div>
            </div>

            <div style="background: white; padding: 1.5rem; border-radius: 0.5rem; display: flex; gap: 1rem; align-items: start;">
                <div style="background: #f59e0b; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <div>
                    <h4 style="margin-bottom: 0.5rem; color: #1f2937;">Comparez plusieurs devis</h4>
                    <p style="color: #6b7280; margin: 0;">Obtenez 3-5 devis pour économiser jusqu'à 30%</p>
                </div>
            </div>

            <div style="background: white; padding: 1.5rem; border-radius: 0.5rem; display: flex; gap: 1rem; align-items: start;">
                <div style="background: #8b5cf6; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="fas fa-trash-alt"></i>
                </div>
                <div>
                    <h4 style="margin-bottom: 0.5rem; color: #1f2937;">Désencombrez avant</h4>
                    <p style="color: #6b7280; margin: 0;">Moins de volume = moins de coût. Vendez ou donnez ce dont vous n'avez plus besoin</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Besoin d'un devis personnalisé ?</h2>
        <p>Obtenez une estimation précise adaptée à votre situation en 2 minutes</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
            <a href="/devis.php" class="btn btn-primary btn-large">
                <i class="fas fa-file-invoice"></i> Demander un devis gratuit
            </a>
            <a href="/calculateur.php" class="btn" style="background: white; color: #2563eb;">
                <i class="fas fa-calculator"></i> Utiliser le calculateur
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
