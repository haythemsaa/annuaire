<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? escape($pageTitle) . ' - ' . SITE_NAME : SITE_NAME; ?></title>
    <meta name="description" content="<?php echo isset($pageDescription) ? escape($pageDescription) : 'Trouvez les meilleurs déménageurs professionnels. Comparez les prix et services.'; ?>">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <h1><a href="/index.php" style="color: inherit; text-decoration: none;"><i class="fas fa-truck-moving"></i> <?php echo SITE_NAME; ?></a></h1>
                </div>
                <nav class="nav">
                    <ul>
                        <li><a href="/index.php" class="<?php echo ($currentPage ?? '') === 'index' ? 'active' : ''; ?>">Accueil</a></li>
                        <li class="nav-dropdown">
                            <a href="#" class="<?php echo in_array($currentPage ?? '', ['calculateur', 'compare', 'conseils', 'checklist']) ? 'active' : ''; ?>">
                                Outils <i class="fas fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/calculateur.php"><i class="fas fa-calculator"></i> Calculateur de prix</a></li>
                                <li><a href="/compare.php"><i class="fas fa-balance-scale"></i> Comparateur</a></li>
                                <li><a href="/checklist.php"><i class="fas fa-tasks"></i> Checklist</a></li>
                                <li><a href="/tarifs.php"><i class="fas fa-euro-sign"></i> Guide des tarifs</a></li>
                                <li><a href="/conseils.php"><i class="fas fa-lightbulb"></i> Conseils</a></li>
                            </ul>
                        </li>
                        <li><a href="/comment-ca-marche.php" class="<?php echo ($currentPage ?? '') === 'comment-ca-marche' ? 'active' : ''; ?>">Comment ça marche</a></li>
                        <li><a href="/carte.php" class="<?php echo ($currentPage ?? '') === 'carte' ? 'active' : ''; ?>"><i class="fas fa-map-marked-alt"></i> Carte</a></li>
                        <li><a href="/mes-favoris.php" class="<?php echo ($currentPage ?? '') === 'favoris' ? 'active' : ''; ?>"><i class="fas fa-heart"></i> Favoris</a></li>
                        <li><a href="/faq.php" class="<?php echo ($currentPage ?? '') === 'faq' ? 'active' : ''; ?>">FAQ</a></li>
                        <li><a href="/devis.php" class="<?php echo ($currentPage ?? '') === 'devis' ? 'active' : ''; ?>">Demander un devis</a></li>
                        <li><a href="/contact.php" class="<?php echo ($currentPage ?? '') === 'contact' ? 'active' : ''; ?>">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <?php
    // Afficher les messages flash
    $flash = getFlashMessage();
    if ($flash):
    ?>
    <div class="flash-message flash-<?php echo $flash['type']; ?>" style="background-color: <?php echo $flash['type'] === 'success' ? '#d1fae5' : '#fee2e2'; ?>; color: <?php echo $flash['type'] === 'success' ? '#065f46' : '#991b1b'; ?>; padding: 1rem; text-align: center;">
        <?php echo escape($flash['message']); ?>
    </div>
    <?php endif; ?>
