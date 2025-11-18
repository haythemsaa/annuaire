<?php
require_once __DIR__ . '/../config/config.php';

// Si déjà connecté, rediriger vers le dashboard
if (isLoggedIn()) {
    redirect('/admin/index.php');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        $pdo = getDatabase();
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user_id'] = $user['id'];
            $_SESSION['admin_username'] = $user['username'];
            redirect('/admin/index.php');
        } else {
            $error = 'Identifiant ou mot de passe incorrect.';
        }
    } else {
        $error = 'Veuillez remplir tous les champs.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Administration</title>
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/style.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 5rem auto;
            padding: 2rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .error-message {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 0.75rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }
    </style>
</head>
<body style="background-color: #f9fafb;">
    <div class="login-container">
        <div class="login-header">
            <h1 style="color: #1f2937; margin-bottom: 0.5rem;">Administration</h1>
            <p style="color: #6b7280;">Connectez-vous pour accéder au panneau d'administration</p>
        </div>

        <?php if ($error): ?>
            <div class="error-message"><?php echo escape($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="/admin/login.php">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-full">Se connecter</button>
        </form>

        <div style="text-align: center; margin-top: 1.5rem;">
            <a href="/index.php" style="color: #6b7280; font-size: 0.875rem;">← Retour au site</a>
        </div>

        <div style="margin-top: 2rem; padding: 1rem; background-color: #eff6ff; border-radius: 0.5rem; font-size: 0.875rem;">
            <strong>Identifiants par défaut:</strong><br>
            Username: <code>admin</code><br>
            Password: <code>admin123</code>
        </div>
    </div>
</body>
</html>
