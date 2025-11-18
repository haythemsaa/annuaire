<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? escape($pageTitle) . ' - ' . SITE_NAME : SITE_NAME; ?></title>
    <meta name="description" content="<?php echo isset($pageDescription) ? escape($pageDescription) : 'Trouvez les meilleurs déménageurs professionnels. Comparez les prix et services.'; ?>">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
