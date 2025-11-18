<?php
/**
 * Fonctions utilitaires pour l'application
 */

/**
 * Récupère toutes les entreprises avec leurs services
 */
function getAllCompanies($filters = []) {
    $pdo = getDatabase();

    $sql = "SELECT DISTINCT c.* FROM companies c";
    $joins = [];
    $where = [];
    $params = [];

    // Filtre par service
    if (!empty($filters['service'])) {
        $joins[] = "INNER JOIN company_services cs ON c.id = cs.company_id";
        $joins[] = "INNER JOIN services s ON cs.service_id = s.id";
        $where[] = "s.slug = :service";
        $params[':service'] = $filters['service'];
    }

    // Filtre par zone
    if (!empty($filters['zone'])) {
        $where[] = "c.zone = :zone";
        $params[':zone'] = $filters['zone'];
    }

    // Filtre par prix
    if (!empty($filters['price'])) {
        $where[] = "c.price_range = :price";
        $params[':price'] = $filters['price'];
    }

    // Filtre par recherche textuelle
    if (!empty($filters['search'])) {
        $where[] = "(c.name LIKE :search OR c.description LIKE :search OR c.location LIKE :search)";
        $params[':search'] = '%' . $filters['search'] . '%';
    }

    // Construire la requête
    if (!empty($joins)) {
        $sql .= " " . implode(" ", $joins);
    }
    if (!empty($where)) {
        $sql .= " WHERE " . implode(" AND ", $where);
    }

    $sql .= " ORDER BY c.rating DESC, c.reviews DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $companies = $stmt->fetchAll();

    // Récupérer les services pour chaque entreprise
    foreach ($companies as &$company) {
        $company['services'] = getCompanyServices($company['id']);
    }

    return $companies;
}

/**
 * Récupère une entreprise par son ID
 */
function getCompanyById($id) {
    $pdo = getDatabase();

    $stmt = $pdo->prepare("SELECT * FROM companies WHERE id = :id");
    $stmt->execute([':id' => $id]);

    $company = $stmt->fetch();

    if ($company) {
        $company['services'] = getCompanyServices($company['id']);
        $company['reviews'] = getCompanyReviews($company['id']);
    }

    return $company;
}

/**
 * Récupère les services d'une entreprise
 */
function getCompanyServices($companyId) {
    $pdo = getDatabase();

    $stmt = $pdo->prepare("
        SELECT s.*
        FROM services s
        INNER JOIN company_services cs ON s.id = cs.service_id
        WHERE cs.company_id = :company_id
    ");
    $stmt->execute([':company_id' => $companyId]);

    return $stmt->fetchAll();
}

/**
 * Récupère les avis approuvés d'une entreprise
 */
function getCompanyReviews($companyId) {
    $pdo = getDatabase();

    $stmt = $pdo->prepare("
        SELECT * FROM reviews
        WHERE company_id = :company_id AND approved = 1
        ORDER BY created_at DESC
        LIMIT 10
    ");
    $stmt->execute([':company_id' => $companyId]);

    return $stmt->fetchAll();
}

/**
 * Récupère tous les services disponibles
 */
function getAllServices() {
    $pdo = getDatabase();
    $stmt = $pdo->query("SELECT * FROM services ORDER BY name");
    return $stmt->fetchAll();
}

/**
 * Enregistre une demande de devis
 */
function saveQuoteRequest($data) {
    $pdo = getDatabase();

    $sql = "INSERT INTO quote_requests (
        type_move, from_address, to_address, from_floor, to_floor,
        from_elevator, to_elevator, rooms, surface, volume,
        service_packing, service_assembly, service_lift, service_storage, service_cleaning,
        move_date, flexibility, first_name, last_name, email, phone, message
    ) VALUES (
        :type_move, :from_address, :to_address, :from_floor, :to_floor,
        :from_elevator, :to_elevator, :rooms, :surface, :volume,
        :service_packing, :service_assembly, :service_lift, :service_storage, :service_cleaning,
        :move_date, :flexibility, :first_name, :last_name, :email, :phone, :message
    )";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':type_move' => $data['typeMove'],
        ':from_address' => $data['fromAddress'],
        ':to_address' => $data['toAddress'],
        ':from_floor' => $data['fromFloor'] ?? 0,
        ':to_floor' => $data['toFloor'] ?? 0,
        ':from_elevator' => isset($data['fromElevator']) ? 1 : 0,
        ':to_elevator' => isset($data['toElevator']) ? 1 : 0,
        ':rooms' => $data['rooms'],
        ':surface' => $data['surface'] ?? null,
        ':volume' => $data['volume'] ?? null,
        ':service_packing' => isset($data['servicePacking']) ? 1 : 0,
        ':service_assembly' => isset($data['serviceAssembly']) ? 1 : 0,
        ':service_lift' => isset($data['serviceLift']) ? 1 : 0,
        ':service_storage' => isset($data['serviceStorage']) ? 1 : 0,
        ':service_cleaning' => isset($data['serviceCleaning']) ? 1 : 0,
        ':move_date' => $data['moveDate'],
        ':flexibility' => $data['flexibility'] ?? 'fixed',
        ':first_name' => $data['firstName'],
        ':last_name' => $data['lastName'],
        ':email' => $data['email'],
        ':phone' => $data['phone'],
        ':message' => $data['message'] ?? ''
    ]);
}

/**
 * Enregistre un message de contact
 */
function saveContactMessage($data) {
    $pdo = getDatabase();

    $sql = "INSERT INTO contact_messages (name, email, phone, subject, message)
            VALUES (:name, :email, :phone, :subject, :message)";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':name' => $data['name'],
        ':email' => $data['email'],
        ':phone' => $data['phone'] ?? '',
        ':subject' => $data['subject'],
        ':message' => $data['message']
    ]);
}

/**
 * Génère les étoiles HTML pour une note
 */
function generateStars($rating) {
    $fullStars = floor($rating);
    $hasHalfStar = ($rating - $fullStars) >= 0.5;
    $stars = '';

    for ($i = 0; $i < $fullStars; $i++) {
        $stars .= '★';
    }

    if ($hasHalfStar) {
        $stars .= '★';
    }

    $emptyStars = 5 - ceil($rating);
    for ($i = 0; $i < $emptyStars; $i++) {
        $stars .= '☆';
    }

    return $stars;
}

/**
 * Envoie un email
 */
function sendEmail($to, $subject, $message, $headers = []) {
    if (SMTP_ENABLED) {
        // TODO: Implémenter l'envoi via SMTP avec PHPMailer
        // Pour l'instant, on utilise la fonction mail() de PHP
    }

    $defaultHeaders = [
        'From' => SITE_EMAIL,
        'Reply-To' => SITE_EMAIL,
        'X-Mailer' => 'PHP/' . phpversion(),
        'Content-Type' => 'text/html; charset=UTF-8'
    ];

    $headers = array_merge($defaultHeaders, $headers);

    $headerString = '';
    foreach ($headers as $key => $value) {
        $headerString .= "$key: $value\r\n";
    }

    return mail($to, $subject, $message, $headerString);
}

/**
 * Envoie un email de notification pour une demande de devis
 */
function sendQuoteNotification($quoteData) {
    $subject = "Nouvelle demande de devis - " . SITE_NAME;

    $message = "<html><body>";
    $message .= "<h2>Nouvelle demande de devis</h2>";
    $message .= "<p><strong>Client:</strong> " . escape($quoteData['firstName']) . " " . escape($quoteData['lastName']) . "</p>";
    $message .= "<p><strong>Email:</strong> " . escape($quoteData['email']) . "</p>";
    $message .= "<p><strong>Téléphone:</strong> " . escape($quoteData['phone']) . "</p>";
    $message .= "<p><strong>Type:</strong> " . escape($quoteData['typeMove']) . "</p>";
    $message .= "<p><strong>De:</strong> " . escape($quoteData['fromAddress']) . "</p>";
    $message .= "<p><strong>Vers:</strong> " . escape($quoteData['toAddress']) . "</p>";
    $message .= "<p><strong>Date:</strong> " . escape($quoteData['moveDate']) . "</p>";
    $message .= "</body></html>";

    return sendEmail(SITE_EMAIL, $subject, $message);
}

/**
 * Envoie un email de confirmation au client
 */
function sendQuoteConfirmation($quoteData) {
    $subject = "Votre demande de devis - " . SITE_NAME;

    $message = "<html><body>";
    $message .= "<h2>Merci pour votre demande de devis</h2>";
    $message .= "<p>Bonjour " . escape($quoteData['firstName']) . ",</p>";
    $message .= "<p>Nous avons bien reçu votre demande de devis pour votre déménagement.</p>";
    $message .= "<p>Nos partenaires vont étudier votre demande et vous contacteront dans les prochaines 24-48 heures.</p>";
    $message .= "<p><strong>Récapitulatif de votre demande:</strong></p>";
    $message .= "<ul>";
    $message .= "<li>De: " . escape($quoteData['fromAddress']) . "</li>";
    $message .= "<li>Vers: " . escape($quoteData['toAddress']) . "</li>";
    $message .= "<li>Date souhaitée: " . escape($quoteData['moveDate']) . "</li>";
    $message .= "</ul>";
    $message .= "<p>Cordialement,<br>L'équipe " . SITE_NAME . "</p>";
    $message .= "</body></html>";

    return sendEmail($quoteData['email'], $subject, $message);
}

/**
 * Valide une adresse email
 */
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Valide un numéro de téléphone
 */
function isValidPhone($phone) {
    return preg_match('/^[\d\s\+\-\(\)]{8,}$/', $phone);
}

/**
 * Formatte une date relative
 */
function timeAgo($datetime) {
    $timestamp = strtotime($datetime);
    $diff = time() - $timestamp;

    if ($diff < 60) {
        return "À l'instant";
    } elseif ($diff < 3600) {
        $minutes = floor($diff / 60);
        return "Il y a " . $minutes . " minute" . ($minutes > 1 ? 's' : '');
    } elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        return "Il y a " . $hours . " heure" . ($hours > 1 ? 's' : '');
    } elseif ($diff < 604800) {
        $days = floor($diff / 86400);
        return "Il y a " . $days . " jour" . ($days > 1 ? 's' : '');
    } elseif ($diff < 2592000) {
        $weeks = floor($diff / 604800);
        return "Il y a " . $weeks . " semaine" . ($weeks > 1 ? 's' : '');
    } elseif ($diff < 31536000) {
        $months = floor($diff / 2592000);
        return "Il y a " . $months . " mois";
    } else {
        $years = floor($diff / 31536000);
        return "Il y a " . $years . " an" . ($years > 1 ? 's' : '');
    }
}

/**
 * Récupère les statistiques pour la page d'accueil
 */
function getHomepageStats() {
    $pdo = getDatabase();

    // Nombre total d'entreprises
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM companies WHERE verified = 1");
    $totalCompanies = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    // Nombre total d'avis
    $stmt = $pdo->query("SELECT SUM(reviews) as total FROM companies");
    $totalReviews = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

    // Note moyenne
    $stmt = $pdo->query("SELECT AVG(rating) as average FROM companies WHERE verified = 1");
    $averageRating = round($stmt->fetch(PDO::FETCH_ASSOC)['average'], 1);

    // Nombre de devis cette semaine
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM quote_requests WHERE created_at >= datetime('now', '-7 days')");
    $weeklyQuotes = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    // Taux de satisfaction (basé sur les notes >= 4)
    $stmt = $pdo->query("SELECT COUNT(*) * 100.0 / (SELECT COUNT(*) FROM companies WHERE verified = 1) as satisfaction FROM companies WHERE verified = 1 AND rating >= 4.0");
    $satisfaction = round($stmt->fetch(PDO::FETCH_ASSOC)['satisfaction'], 0);

    return [
        'total_companies' => $totalCompanies,
        'total_reviews' => $totalReviews,
        'average_rating' => $averageRating,
        'weekly_quotes' => $weeklyQuotes,
        'satisfaction' => $satisfaction
    ];
}
