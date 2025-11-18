<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'blog';
$pageTitle = 'Blog Déménagement';
$pageDescription = 'Conseils, guides et astuces pour réussir votre déménagement en Belgique. Articles experts par nos professionnels.';

include __DIR__ . '/includes/header.php';

// Blog articles (in real app, would come from database)
$articles = [
    [
        'id' => 1,
        'title' => 'Comment préparer son déménagement 3 mois à l\'avance',
        'slug' => 'preparer-demenagement-3-mois-avance',
        'excerpt' => 'Un déménagement réussi se prépare bien en avance. Découvrez notre planning détaillé pour ne rien oublier et éviter le stress de dernière minute.',
        'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800',
        'category' => 'Préparation',
        'date' => '2024-11-15',
        'read_time' => '8 min',
        'author' => 'Marie Dubois'
    ],
    [
        'id' => 2,
        'title' => 'Budget déménagement : comment économiser jusqu\'à 40%',
        'slug' => 'budget-demenagement-economiser-40-pourcent',
        'excerpt' => 'Découvrez toutes nos astuces pour réduire considérablement le coût de votre déménagement sans sacrifier la qualité du service.',
        'image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=800',
        'category' => 'Budget',
        'date' => '2024-11-12',
        'read_time' => '6 min',
        'author' => 'Pierre Martin'
    ],
    [
        'id' => 3,
        'title' => 'Les 10 erreurs à éviter lors d\'un déménagement',
        'slug' => '10-erreurs-eviter-demenagement',
        'excerpt' => 'Évitez les pièges courants ! Notre guide des erreurs les plus fréquentes et comment les anticiper pour un déménagement sans accroc.',
        'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800',
        'category' => 'Conseils',
        'date' => '2024-11-10',
        'read_time' => '7 min',
        'author' => 'Sophie Lambert'
    ],
    [
        'id' => 4,
        'title' => 'Déménager avec des enfants : guide complet',
        'slug' => 'demenager-avec-enfants-guide-complet',
        'excerpt' => 'Comment gérer un déménagement en famille ? Tous nos conseils pour impliquer les enfants et rendre cette transition plus facile pour eux.',
        'image' => 'https://images.unsplash.com/photo-1527689368864-3a821dbccc34?w=800',
        'category' => 'Famille',
        'date' => '2024-11-08',
        'read_time' => '9 min',
        'author' => 'Jean Leroy'
    ],
    [
        'id' => 5,
        'title' => 'Checklist du carton parfait : emballer comme un pro',
        'slug' => 'checklist-carton-parfait-emballer-pro',
        'excerpt' => 'Apprenez les techniques professionnelles d\'emballage. Protégez vos objets fragiles et optimisez l\'espace dans vos cartons.',
        'image' => 'https://images.unsplash.com/photo-1600518464441-9154a4dea21b?w=800',
        'category' => 'Emballage',
        'date' => '2024-11-05',
        'read_time' => '5 min',
        'author' => 'Marie Dubois'
    ],
    [
        'id' => 6,
        'title' => 'Déménagement international : tout ce qu\'il faut savoir',
        'slug' => 'demenagement-international-guide',
        'excerpt' => 'Partir à l\'étranger ? Formalités douanières, transport, assurance... tout ce que vous devez savoir pour un déménagement international réussi.',
        'image' => 'https://images.unsplash.com/photo-1607827448387-a67db1383b59?w=800',
        'category' => 'International',
        'date' => '2024-11-03',
        'read_time' => '12 min',
        'author' => 'Pierre Martin'
    ]
];

$categories = array_unique(array_column($articles, 'category'));
?>

<style>
    .blog-hero {
        background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
        color: white;
        padding: 4rem 0;
        text-align: center;
    }

    .blog-hero h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .blog-hero p {
        font-size: 1.25rem;
        opacity: 0.95;
    }

    .blog-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 4rem 1rem;
    }

    .blog-filters {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 3rem;
    }

    .filter-btn {
        padding: 0.75rem 1.5rem;
        border: 2px solid #e5e7eb;
        background: white;
        border-radius: 2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
        color: #6b7280;
    }

    .filter-btn:hover,
    .filter-btn.active {
        border-color: #2563eb;
        background: #2563eb;
        color: white;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
    }

    .blog-card {
        background: white;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }

    .blog-card-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .blog-card-content {
        padding: 1.5rem;
    }

    .blog-card-meta {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
        font-size: 0.875rem;
        color: #6b7280;
    }

    .blog-card-category {
        background: #eff6ff;
        color: #2563eb;
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-weight: 600;
    }

    .blog-card-title {
        font-size: 1.5rem;
        color: #1f2937;
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }

    .blog-card-excerpt {
        color: #6b7280;
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .blog-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid #e5e7eb;
    }

    .blog-card-author {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        color: #6b7280;
    }

    .blog-card-read-more {
        color: #2563eb;
        font-weight: 600;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: gap 0.3s ease;
    }

    .blog-card-read-more:hover {
        gap: 0.75rem;
    }

    .blog-newsletter {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        border-radius: 1rem;
        padding: 3rem 2rem;
        text-align: center;
        margin: 4rem 0;
    }

    .blog-newsletter h3 {
        font-size: 2rem;
        color: #1e40af;
        margin-bottom: 1rem;
    }

    .blog-newsletter p {
        color: #6b7280;
        margin-bottom: 2rem;
        font-size: 1.125rem;
    }

    .newsletter-form {
        display: flex;
        gap: 1rem;
        max-width: 500px;
        margin: 0 auto;
    }

    .newsletter-form input {
        flex: 1;
        padding: 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 0.5rem;
        font-size: 1rem;
    }

    .newsletter-form button {
        padding: 1rem 2rem;
        background: #2563eb;
        color: white;
        border: none;
        border-radius: 0.5rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .newsletter-form button:hover {
        background: #1e40af;
    }
</style>

<!-- Hero -->
<div class="blog-hero">
    <div class="container">
        <h1>📚 Blog Déménagement</h1>
        <p>Conseils d'experts, guides pratiques et astuces pour un déménagement réussi</p>
    </div>
</div>

<div class="blog-container">
    <!-- Filters -->
    <div class="blog-filters">
        <button class="filter-btn active" data-category="all">
            <i class="fas fa-th"></i> Tous les articles
        </button>
        <?php foreach ($categories as $category): ?>
            <button class="filter-btn" data-category="<?php echo strtolower($category); ?>">
                <i class="fas fa-tag"></i> <?php echo $category; ?>
            </button>
        <?php endforeach; ?>
    </div>

    <!-- Blog Grid -->
    <div class="blog-grid" id="blogGrid">
        <?php foreach ($articles as $article): ?>
            <article class="blog-card" data-category="<?php echo strtolower($article['category']); ?>" onclick="window.location.href='/blog/<?php echo $article['slug']; ?>.php'">
                <img src="<?php echo $article['image']; ?>" alt="<?php echo escape($article['title']); ?>" class="blog-card-image">
                <div class="blog-card-content">
                    <div class="blog-card-meta">
                        <span class="blog-card-category"><?php echo $article['category']; ?></span>
                        <span><i class="far fa-clock"></i> <?php echo $article['read_time']; ?></span>
                        <span><i class="far fa-calendar"></i> <?php echo date('d/m/Y', strtotime($article['date'])); ?></span>
                    </div>
                    <h2 class="blog-card-title"><?php echo $article['title']; ?></h2>
                    <p class="blog-card-excerpt"><?php echo $article['excerpt']; ?></p>
                    <div class="blog-card-footer">
                        <div class="blog-card-author">
                            <i class="fas fa-user-circle"></i>
                            <?php echo $article['author']; ?>
                        </div>
                        <a href="/blog/<?php echo $article['slug']; ?>.php" class="blog-card-read-more" onclick="event.stopPropagation()">
                            Lire l'article <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <!-- Newsletter Signup -->
    <div class="blog-newsletter">
        <h3>📬 Ne manquez aucun conseil !</h3>
        <p>Inscrivez-vous à notre newsletter et recevez nos meilleurs articles directement dans votre boîte mail</p>
        <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Merci ! Vous êtes inscrit à notre newsletter.');">
            <input type="email" placeholder="Votre adresse email" required>
            <button type="submit">
                <i class="fas fa-envelope"></i> S'inscrire
            </button>
        </form>
    </div>

    <!-- CTA -->
    <div style="background: #eff6ff; border-left: 4px solid #2563eb; padding: 2rem; border-radius: 0.5rem; text-align: center;">
        <h3 style="color: #1e40af; margin-bottom: 1rem; font-size: 1.75rem;">
            <i class="fas fa-truck-moving"></i> Prêt à déménager ?
        </h3>
        <p style="color: #6b7280; margin-bottom: 1.5rem; font-size: 1.125rem;">
            Obtenez jusqu'à 5 devis gratuits de déménageurs professionnels
        </p>
        <a href="/devis.php" class="btn btn-primary btn-large">
            <i class="fas fa-file-invoice"></i> Demander un devis gratuit
        </a>
    </div>
</div>

<script>
// Filter functionality
const filterBtns = document.querySelectorAll('.filter-btn');
const articles = document.querySelectorAll('.blog-card');

filterBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        const category = this.dataset.category;

        // Update active state
        filterBtns.forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        // Filter articles
        articles.forEach(article => {
            if (category === 'all' || article.dataset.category === category) {
                article.style.display = 'block';
                article.style.animation = 'fadeIn 0.5s ease';
            } else {
                article.style.display = 'none';
            }
        });
    });
});

// Add fadeIn animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
