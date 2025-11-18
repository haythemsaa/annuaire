<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'faq';
$pageTitle = 'Questions Fréquentes (FAQ)';
$pageDescription = 'Toutes les réponses à vos questions sur le déménagement en Belgique. Guide complet des questions fréquentes.';

include __DIR__ . '/includes/header.php';

// Schema.org FAQ Page
$faqSchema = [
    "@context" => "https://schema.org",
    "@type" => "FAQPage",
    "mainEntity" => []
];

// FAQ Categories
$faqCategories = [
    'Général' => [
        [
            'question' => 'Comment fonctionne votre service d\'annuaire ?',
            'answer' => 'Notre plateforme vous met en relation avec des déménageurs professionnels vérifiés en Belgique. Vous remplissez un formulaire de devis gratuit, et vous recevez jusqu\'à 5 offres personnalisées sous 24-48h. Vous comparez, choisissez et réservez en toute confiance.'
        ],
        [
            'question' => 'Est-ce vraiment gratuit et sans engagement ?',
            'answer' => 'Oui, absolument ! Notre service de mise en relation est 100% gratuit et sans aucun engagement. Vous n\'êtes jamais obligé d\'accepter une offre. Vous pouvez comparer tranquillement et décider si une proposition vous convient.'
        ],
        [
            'question' => 'Comment vérifiez-vous les entreprises de déménagement ?',
            'answer' => 'Nous vérifions : les licences et assurances professionnelles, les avis clients authentiques, l\'expérience (minimum 2 ans), la solvabilité financière, et le respect des normes de qualité. Seules les entreprises qui passent notre processus de vérification rigoureux sont acceptées.'
        ],
        [
            'question' => 'Puis-je modifier ou annuler ma demande de devis ?',
            'answer' => 'Oui, vous pouvez nous contacter à tout moment pour modifier ou annuler votre demande. Si vous avez déjà reçu des offres et souhaitez décliner, vous pouvez le faire directement auprès des entreprises concernées.'
        ]
    ],
    'Tarifs et Paiement' => [
        [
            'question' => 'Combien coûte un déménagement en Belgique ?',
            'answer' => 'Les prix varient selon : la taille du logement (400€ pour un studio à 4000€+ pour une grande maison), la distance (local ou longue distance), l\'accessibilité (étage, ascenseur), les services additionnels (emballage, montage). Consultez notre guide des tarifs pour des estimations détaillées.'
        ],
        [
            'question' => 'Comment sont calculés les devis ?',
            'answer' => 'Les déménageurs calculent leurs devis selon : le volume en m³, la distance à parcourir, le nombre de déménageurs nécessaires, le temps estimé, les services demandés (emballage, démontage, etc.), et les difficultés particulières (piano, objets fragiles, etc.).'
        ],
        [
            'question' => 'Quand dois-je payer le déménagement ?',
            'answer' => 'Les modalités de paiement varient selon les entreprises : acompte de 20-30% à la réservation généralement, solde à la fin du déménagement, ou paiement complet après prestation. Certaines acceptent les paiements échelonnés. Tout est précisé dans le devis.'
        ],
        [
            'question' => 'Y a-t-il des frais cachés ?',
            'answer' => 'Les entreprises vérifiées sur notre plateforme s\'engagent à la transparence totale. Tous les coûts doivent être détaillés dans le devis. Attention aux suppléments possibles : étages sans ascenseur, stationnement difficile, objets non déclarés. Lisez bien le devis avant de signer.'
        ],
        [
            'question' => 'Puis-je négocier les prix ?',
            'answer' => 'Oui ! Comparer plusieurs devis vous donne un pouvoir de négociation. Les entreprises sont souvent flexibles, surtout hors saison haute (octobre-avril). Mentionnez que vous avez d\'autres offres. Vous pouvez aussi négocier en retirant certains services pour réduire le coût.'
        ]
    ],
    'Préparation du Déménagement' => [
        [
            'question' => 'Combien de temps à l\'avance réserver un déménagement ?',
            'answer' => 'Idéalement 4-6 semaines à l\'avance, surtout en haute saison (mai-septembre) et en fin de mois. Pour un déménagement urgent, certaines entreprises peuvent intervenir sous 1-2 semaines, mais les prix seront plus élevés et le choix limité.'
        ],
        [
            'question' => 'Dois-je faire mes cartons moi-même ?',
            'answer' => 'Non, c\'est optionnel. Vous pouvez : tout faire vous-même (économie de 150-500€), demander l\'emballage partiel (fragiles uniquement), ou opter pour l\'emballage complet. Les déménageurs professionnels sont rapides et protègent mieux les objets fragiles.'
        ],
        [
            'question' => 'Que faire des objets encombrants ?',
            'answer' => 'Pour les objets que vous ne déménagez pas : vendez-les (2ememain.be, marketplace), donnez-les (ressourceries, associations), recyclez-les (parcs à conteneurs), ou réservez un service d\'enlèvement d\'encombrants. Certains déménageurs proposent ce service moyennant supplément.'
        ],
        [
            'question' => 'Comment protéger mes objets fragiles ?',
            'answer' => 'Utilisez du papier bulle, du papier journal, des couvertures. Mettez les objets lourds en bas des cartons. Marquez clairement "FRAGILE". Pour les objets de valeur (œuvres d\'art, antiquités), informez le déménageur et souscrivez une assurance complémentaire si nécessaire.'
        ],
        [
            'question' => 'Que mettre dans le "carton de première nécessité" ?',
            'answer' => 'Emportez avec vous : documents importants, bijoux et objets de valeur, médicaments, vêtements de rechange, chargeurs de téléphone/ordinateur, produits de toilette, nécessaire pour bébé si applicable, et de quoi manger le premier soir. Ce carton ne va pas dans le camion !'
        ]
    ],
    'Assurance et Responsabilité' => [
        [
            'question' => 'Mes biens sont-ils assurés pendant le déménagement ?',
            'answer' => 'Oui, tous les déménageurs professionnels ont une assurance responsabilité civile obligatoire qui couvre les dommages causés à vos biens. Cette couverture de base est généralement de 3-5€/kg. Pour une protection complète "valeur à neuf", souscrivez une assurance complémentaire.'
        ],
        [
            'question' => 'Que faire en cas de dommages ?',
            'answer' => 'Faites constater les dégâts IMMÉDIATEMENT sur le bon de livraison avant le départ des déménageurs. Prenez des photos. Envoyez une lettre recommandée dans les 3-7 jours. Conservez tous les documents. L\'assurance du déménageur prendra en charge selon les conditions du contrat.'
        ],
        [
            'question' => 'Suis-je couvert pour les objets de valeur ?',
            'answer' => 'L\'assurance de base couvre au poids (3-5€/kg), ce qui est insuffisant pour les objets de valeur. Pour les bijoux, œuvres d\'art, antiquités, électronique haut de gamme : déclarez-les au déménageur, souscrivez une assurance complémentaire "tous risques", ou transportez-les vous-même.'
        ],
        [
            'question' => 'Que se passe-t-il si le déménageur est en retard ?',
            'answer' => 'Si le retard est significatif et non justifié, vous pouvez : demander une réduction du prix, réclamer une compensation pour les frais occasionnés (hôtel, location, etc.), ou dans les cas graves, annuler et demander un remboursement. Tout dépend des conditions du contrat.'
        ]
    ],
    'Spécificités Belgique' => [
        [
            'question' => 'Ai-je besoin d\'une autorisation pour stationner le camion ?',
            'answer' => 'À Bruxelles et dans certaines grandes villes : oui, une autorisation de stationnement est souvent nécessaire. Demandez-la à votre commune 2-3 semaines avant. Certains déménageurs s\'en chargent moyennant supplément. Sans autorisation, vous risquez une amende et des complications le jour J.'
        ],
        [
            'question' => 'Puis-je déménager entre la Flandre et la Wallonie ?',
            'answer' => 'Absolument ! Toutes nos entreprises partenaires opèrent dans toute la Belgique. Certaines sont spécialisées dans les déménagements interrégionaux. Les prix sont légèrement plus élevés pour les longues distances, mais le service reste le même.'
        ],
        [
            'question' => 'Quelles sont les périodes à éviter ?',
            'answer' => 'Évitez si possible : les fins de mois (pic de demande), l\'été juillet-août (haute saison), les week-ends, et les jours fériés. Les meilleurs prix et disponibilités sont : en semaine, mi-mois, et en automne-hiver (octobre à avril).'
        ],
        [
            'question' => 'Les déménageurs parlent-ils français ET néerlandais ?',
            'answer' => 'Cela dépend des entreprises et des régions. À Bruxelles, la plupart sont bilingues FR/NL. En Wallonie, principalement français. En Flandre, principalement néerlandais. Précisez votre préférence linguistique dans votre demande de devis pour être mis en relation avec les bonnes entreprises.'
        ]
    ],
    'Services Additionnels' => [
        [
            'question' => 'Proposez-vous du stockage temporaire ?',
            'answer' => 'Oui, de nombreux déménageurs partenaires offrent des solutions de stockage : box sécurisés de différentes tailles, surveillance 24/7, accès flexible, courte ou longue durée. Tarifs : 50-200€/mois selon le volume. Idéal en cas de décalage entre deux logements.'
        ],
        [
            'question' => 'Puis-je demander un nettoyage de fin de bail ?',
            'answer' => 'Oui, c\'est un service très demandé ! Le nettoyage professionnel de fin de bail (150-400€ selon la taille) augmente vos chances de récupérer votre garantie locative. Certains déménageurs le proposent en option. Vous pouvez le commander avec votre déménagement.'
        ],
        [
            'question' => 'Les déménageurs montent et démontent les meubles ?',
            'answer' => 'Oui, le montage/démontage est généralement inclus pour les meubles standards (lits, armoires, tables). Pour les meubles complexes ou le mobilier de cuisine, il peut y avoir un supplément (100-300€). Précisez-le dans votre demande de devis.'
        ],
        [
            'question' => 'Puis-je déménager un piano ou un coffre-fort ?',
            'answer' => 'Oui, mais cela nécessite un équipement spécial et de l\'expertise. Supplément de 100-300€ selon le poids et la difficulté. Mentionnez TOUJOURS ces objets dans votre demande de devis, car tous les déménageurs ne sont pas équipés pour les transporter.'
        ]
    ]
];

// Build FAQ Schema
foreach ($faqCategories as $category => $faqs) {
    foreach ($faqs as $faq) {
        $faqSchema['mainEntity'][] = [
            '@type' => 'Question',
            'name' => $faq['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['answer']
            ]
        ];
    }
}
?>

<!-- Schema.org FAQ Structured Data -->
<script type="application/ld+json">
<?php echo json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
</script>

<style>
    .faq-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .faq-category {
        margin-bottom: 3rem;
    }

    .faq-category-title {
        font-size: 1.75rem;
        color: #1f2937;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 3px solid #2563eb;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .faq-item {
        background: white;
        border-radius: 0.75rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-item:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
    }

    .faq-question {
        padding: 1.5rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        background: white;
        transition: background 0.3s ease;
    }

    .faq-question:hover {
        background: #f9fafb;
    }

    .faq-question-text {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1f2937;
        flex: 1;
    }

    .faq-icon {
        flex-shrink: 0;
        width: 32px;
        height: 32px;
        background: #2563eb;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }

    .faq-item.active .faq-icon {
        transform: rotate(180deg);
        background: #1e40af;
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease;
    }

    .faq-answer-content {
        padding: 0 1.5rem 1.5rem;
        color: #6b7280;
        line-height: 1.8;
        font-size: 1rem;
    }

    .faq-stats {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        color: white;
        padding: 3rem 2rem;
        border-radius: 1rem;
        text-align: center;
        margin: 3rem 0;
    }

    .faq-stats h3 {
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .faq-cta {
        background: #eff6ff;
        border-left: 4px solid #2563eb;
        padding: 2rem;
        border-radius: 0.5rem;
        margin: 3rem 0;
    }

    .search-faq {
        margin-bottom: 2rem;
        position: relative;
    }

    .search-faq input {
        width: 100%;
        padding: 1rem 1rem 1rem 3rem;
        border: 2px solid #e5e7eb;
        border-radius: 0.75rem;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .search-faq input:focus {
        outline: none;
        border-color: #2563eb;
    }

    .search-faq i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 1.25rem;
    }

    .category-icon {
        font-size: 1.5rem;
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">❓ Questions Fréquentes</h1>
            <p style="font-size: 1.25rem;">Toutes les réponses à vos questions sur le déménagement en Belgique</p>
        </div>
    </div>
</section>

<div class="faq-container">
    <!-- Search Box -->
    <div class="search-faq">
        <i class="fas fa-search"></i>
        <input type="text" id="faqSearch" placeholder="Rechercher une question... (ex: prix, assurance, cartons)">
    </div>

    <!-- Quick Stats -->
    <div class="faq-stats">
        <h3>🎯 <?php echo array_sum(array_map('count', $faqCategories)); ?> Questions Répondues</h3>
        <p style="font-size: 1.125rem; opacity: 0.95;">Tout ce que vous devez savoir pour un déménagement réussi</p>
    </div>

    <!-- FAQ Categories -->
    <?php
    $categoryIcons = [
        'Général' => 'fa-info-circle',
        'Tarifs et Paiement' => 'fa-euro-sign',
        'Préparation du Déménagement' => 'fa-boxes',
        'Assurance et Responsabilité' => 'fa-shield-alt',
        'Spécificités Belgique' => 'fa-map-marked-alt',
        'Services Additionnels' => 'fa-plus-circle'
    ];

    foreach ($faqCategories as $category => $faqs):
    ?>
        <div class="faq-category">
            <h2 class="faq-category-title">
                <i class="fas <?php echo $categoryIcons[$category] ?? 'fa-question-circle'; ?> category-icon"></i>
                <?php echo $category; ?>
            </h2>

            <?php foreach ($faqs as $index => $faq): ?>
                <div class="faq-item" data-category="<?php echo strtolower($category); ?>">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <div class="faq-question-text"><?php echo $faq['question']; ?></div>
                        <div class="faq-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <?php echo $faq['answer']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    <!-- CTA -->
    <div class="faq-cta">
        <h3 style="color: #1e40af; margin-bottom: 1rem; font-size: 1.5rem;">
            <i class="fas fa-question-circle"></i> Vous ne trouvez pas la réponse ?
        </h3>
        <p style="color: #6b7280; margin-bottom: 1.5rem; line-height: 1.6;">
            Notre équipe est là pour vous aider ! Contactez-nous par téléphone, email ou via notre formulaire de contact.
        </p>
        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="/contact.php" class="btn btn-primary">
                <i class="fas fa-envelope"></i> Nous contacter
            </a>
            <a href="/devis.php" class="btn btn-secondary">
                <i class="fas fa-file-invoice"></i> Demander un devis
            </a>
        </div>
    </div>
</div>

<script>
// Toggle FAQ accordion
function toggleFAQ(element) {
    const faqItem = element.parentElement;
    const answer = faqItem.querySelector('.faq-answer');
    const isActive = faqItem.classList.contains('active');

    // Close all other FAQs
    document.querySelectorAll('.faq-item.active').forEach(item => {
        if (item !== faqItem) {
            item.classList.remove('active');
            item.querySelector('.faq-answer').style.maxHeight = null;
        }
    });

    // Toggle current FAQ
    if (isActive) {
        faqItem.classList.remove('active');
        answer.style.maxHeight = null;
    } else {
        faqItem.classList.add('active');
        answer.style.maxHeight = answer.scrollHeight + 'px';
    }
}

// Search functionality
document.getElementById('faqSearch').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const faqItems = document.querySelectorAll('.faq-item');
    let visibleCount = 0;

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question-text').textContent.toLowerCase();
        const answer = item.querySelector('.faq-answer-content').textContent.toLowerCase();

        if (question.includes(searchTerm) || answer.includes(searchTerm)) {
            item.style.display = 'block';
            visibleCount++;

            // Highlight search term
            if (searchTerm.length > 2) {
                const questionEl = item.querySelector('.faq-question-text');
                const originalText = questionEl.textContent;
                const highlightedText = originalText.replace(
                    new RegExp(searchTerm, 'gi'),
                    match => `<mark style="background: #fef3c7; padding: 0.125rem 0.25rem; border-radius: 0.25rem;">${match}</mark>`
                );
                questionEl.innerHTML = highlightedText;
            }
        } else {
            item.style.display = 'none';
        }
    });

    // Show categories based on visible items
    document.querySelectorAll('.faq-category').forEach(category => {
        const visibleItems = category.querySelectorAll('.faq-item[style="display: block"]').length;
        category.style.display = visibleItems > 0 ? 'block' : 'none';
    });

    // If search is cleared, reset highlights
    if (searchTerm === '') {
        faqItems.forEach(item => {
            const questionEl = item.querySelector('.faq-question-text');
            questionEl.textContent = questionEl.textContent; // Remove HTML
        });
    }
});

// Auto-open FAQ from URL hash
window.addEventListener('load', function() {
    if (window.location.hash) {
        const hash = window.location.hash.substring(1);
        const targetFaq = document.querySelector(`[data-faq-id="${hash}"]`);
        if (targetFaq) {
            targetFaq.scrollIntoView({ behavior: 'smooth', block: 'center' });
            setTimeout(() => {
                targetFaq.querySelector('.faq-question').click();
            }, 500);
        }
    }
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
