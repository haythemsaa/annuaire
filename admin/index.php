<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/functions.php';

requireLogin();

$pdo = getDatabase();

// Statistiques
$stats = [];

$stmt = $pdo->query("SELECT COUNT(*) as count FROM companies");
$stats['companies'] = $stmt->fetch()['count'];

$stmt = $pdo->query("SELECT COUNT(*) as count FROM quote_requests");
$stats['quotes'] = $stmt->fetch()['count'];

$stmt = $pdo->query("SELECT COUNT(*) as count FROM contact_messages WHERE status = 'unread'");
$stats['unread_messages'] = $stmt->fetch()['count'];

$stmt = $pdo->query("SELECT COUNT(*) as count FROM reviews WHERE approved = 0");
$stats['pending_reviews'] = $stmt->fetch()['count'];

// Récentes demandes de devis
$stmt = $pdo->query("SELECT * FROM quote_requests ORDER BY created_at DESC LIMIT 5");
$recentQuotes = $stmt->fetchAll();

// Récents messages
$stmt = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT 5");
$recentMessages = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Administration</title>
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .admin-layout {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }
        .admin-sidebar {
            background: #1f2937;
            color: white;
            padding: 2rem 0;
        }
        .admin-sidebar h2 {
            padding: 0 1.5rem;
            margin-bottom: 2rem;
            font-size: 1.5rem;
        }
        .admin-nav a {
            display: block;
            padding: 0.75rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
        }
        .admin-nav a:hover,
        .admin-nav a.active {
            background: #374151;
            color: white;
        }
        .admin-main {
            padding: 2rem;
            background: #f9fafb;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .stat-card i {
            font-size: 2rem;
            color: #2563eb;
            margin-bottom: 0.5rem;
        }
        .stat-card h3 {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }
        .stat-card .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: #1f2937;
        }
        .admin-table {
            width: 100%;
            background: white;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .admin-table thead {
            background: #f9fafb;
        }
        .admin-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #1f2937;
            border-bottom: 1px solid #e5e7eb;
        }
        .admin-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }
        .admin-table tr:last-child td {
            border-bottom: none;
        }
        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-success {
            background: #d1fae5;
            color: #065f46;
        }
        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }
        .badge-danger {
            background: #fee2e2;
            color: #991b1b;
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <h2><i class="fas fa-cog"></i> Admin</h2>
            <nav class="admin-nav">
                <a href="/admin/index.php" class="active"><i class="fas fa-home"></i> Tableau de bord</a>
                <a href="/admin/companies.php"><i class="fas fa-building"></i> Entreprises</a>
                <a href="/admin/quotes.php"><i class="fas fa-file-invoice"></i> Demandes de devis</a>
                <a href="/admin/messages.php"><i class="fas fa-envelope"></i> Messages</a>
                <a href="/admin/reviews.php"><i class="fas fa-star"></i> Avis clients</a>
                <a href="/index.php"><i class="fas fa-globe"></i> Voir le site</a>
                <a href="/admin/logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <h1 style="margin-bottom: 2rem;">Tableau de bord</h1>

            <!-- Stats -->
            <div class="stats-grid">
                <div class="stat-card">
                    <i class="fas fa-building"></i>
                    <h3>Entreprises</h3>
                    <div class="stat-value"><?php echo $stats['companies']; ?></div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-file-invoice"></i>
                    <h3>Demandes de devis</h3>
                    <div class="stat-value"><?php echo $stats['quotes']; ?></div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-envelope"></i>
                    <h3>Messages non lus</h3>
                    <div class="stat-value"><?php echo $stats['unread_messages']; ?></div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-star"></i>
                    <h3>Avis en attente</h3>
                    <div class="stat-value"><?php echo $stats['pending_reviews']; ?></div>
                </div>
            </div>

            <!-- Recent Quotes -->
            <div style="margin-bottom: 2rem;">
                <h2 style="margin-bottom: 1rem;">Dernières demandes de devis</h2>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Type</th>
                            <th>De → Vers</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recentQuotes as $quote): ?>
                        <tr>
                            <td><?php echo escape($quote['first_name'] . ' ' . $quote['last_name']); ?></td>
                            <td><?php echo escape($quote['type_move']); ?></td>
                            <td><?php echo escape(substr($quote['from_address'], 0, 30)) . '... → ' . escape(substr($quote['to_address'], 0, 30)) . '...'; ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($quote['created_at'])); ?></td>
                            <td><span class="badge badge-warning"><?php echo escape($quote['status']); ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Recent Messages -->
            <div>
                <h2 style="margin-bottom: 1rem;">Derniers messages</h2>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Sujet</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recentMessages as $message): ?>
                        <tr>
                            <td><?php echo escape($message['name']); ?></td>
                            <td><?php echo escape($message['email']); ?></td>
                            <td><?php echo escape($message['subject']); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($message['created_at'])); ?></td>
                            <td>
                                <span class="badge <?php echo $message['status'] === 'unread' ? 'badge-warning' : 'badge-success'; ?>">
                                    <?php echo escape($message['status']); ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
