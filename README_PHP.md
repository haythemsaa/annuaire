# Annuaire de Déménageurs - Version PHP Complète

Site d'annuaire professionnel pour entreprises de déménagement avec backend PHP et base de données.

## 🎯 Fonctionnalités

### Frontend (Public)
- **Page d'accueil** avec liste des entreprises
- **Recherche et filtres** (service, zone, prix, mots-clés)
- **Formulaire de devis** avec validation et envoi d'emails
- **Page de contact** avec FAQ
- **Pages détaillées** pour chaque entreprise
- **Design responsive** (mobile, tablette, desktop)

### Backend (Administration)
- **Tableau de bord** avec statistiques
- **Gestion des entreprises** (CRUD complet)
- **Gestion des demandes de devis**
- **Gestion des messages de contact**
- **Gestion des avis clients**
- **Système d'authentification sécurisé**

### Fonctionnalités techniques
- Base de données SQLite (pas besoin de MySQL)
- PDO pour les requêtes sécurisées
- Protection XSS et injection SQL
- Sessions sécurisées
- Envoi d'emails automatiques
- Validation côté serveur
- Messages flash

## 🗂️ Structure du projet

```
annuaire/
├── config/
│   ├── config.php          # Configuration générale
│   └── database.php        # Connexion et config DB
├── includes/
│   ├── functions.php       # Fonctions utilitaires
│   ├── header.php          # Header commun
│   └── footer.php          # Footer commun
├── admin/
│   ├── login.php           # Page de connexion
│   ├── logout.php          # Déconnexion
│   ├── index.php           # Tableau de bord
│   ├── companies.php       # Gestion entreprises
│   ├── quotes.php          # Gestion devis
│   ├── messages.php        # Gestion messages
│   └── reviews.php         # Gestion avis
├── assets/
│   ├── css/
│   │   └── style.css       # Styles principaux
│   └── js/
│       └── main.js         # JavaScript
├── data/
│   └── annuaire.db         # Base de données SQLite (créée automatiquement)
├── index.php               # Page d'accueil
├── devis.php               # Formulaire de devis
├── contact.php             # Page de contact
├── company-detail.php      # Détails entreprise
├── database.sql            # Schéma de la base de données
├── init_db.php             # Script d'initialisation
└── README_PHP.md           # Ce fichier
```

## 🚀 Installation

### Prérequis
- PHP 7.4 ou supérieur
- Extension PDO_SQLITE activée (généralement activée par défaut)
- Un serveur web (Apache, Nginx) ou serveur intégré PHP

### Étapes d'installation

1. **Cloner ou télécharger le projet**
   ```bash
   git clone <votre-repo>
   cd annuaire
   ```

2. **Initialiser la base de données**
   - Accédez à `http://localhost:8000/init_db.php` dans votre navigateur
   - OU exécutez depuis la ligne de commande:
     ```bash
     php init_db.php
     ```
   - Cela va créer la base de données avec 10 entreprises d'exemple

3. **Supprimer le script d'initialisation** (important pour la sécurité)
   ```bash
   rm init_db.php
   ```

4. **Démarrer le serveur**

   Avec le serveur intégré PHP:
   ```bash
   php -S localhost:8000
   ```

   Avec Apache/Nginx, pointez le document root vers le dossier du projet.

5. **Accéder au site**
   - Site public: `http://localhost:8000`
   - Administration: `http://localhost:8000/admin/`
     - Username: `admin`
     - Password: `admin123`

## 🔐 Administration

### Accès
- URL: `/admin/`
- Identifiants par défaut:
  - Username: `admin`
  - Password: `admin123`

**IMPORTANT:** Changez le mot de passe par défaut après l'installation !

### Fonctionnalités admin
- **Tableau de bord:** Vue d'ensemble avec statistiques
- **Entreprises:** Ajouter, modifier, supprimer des entreprises
- **Devis:** Voir toutes les demandes de devis
- **Messages:** Gérer les messages de contact
- **Avis:** Modérer les avis clients

## 🗃️ Base de données

### Tables principales

- **companies:** Entreprises de déménagement
- **services:** Services disponibles (déménagement, emballage, lift, etc.)
- **company_services:** Relation many-to-many entreprises ↔ services
- **quote_requests:** Demandes de devis
- **contact_messages:** Messages de contact
- **reviews:** Avis clients
- **admin_users:** Utilisateurs administrateurs

### Type de base de données

Le projet utilise **SQLite** par défaut car :
- Pas besoin d'installer MySQL
- Fichier unique portable
- Parfait pour des petits/moyens projets
- Facile à sauvegarder (copier le fichier .db)

**Pour utiliser MySQL à la place:**
1. Éditez `config/database.php`
2. Changez `DB_TYPE` à `'mysql'`
3. Configurez les paramètres MySQL
4. Importez `database.sql` dans votre base MySQL

## 📧 Configuration des emails

Par défaut, le système utilise la fonction `mail()` de PHP.

### Pour utiliser SMTP (Gmail, etc.)

1. Éditez `config/config.php`:
   ```php
   define('SMTP_ENABLED', true);
   define('SMTP_HOST', 'smtp.gmail.com');
   define('SMTP_PORT', 587);
   define('SMTP_USERNAME', 'votre@email.com');
   define('SMTP_PASSWORD', 'votre_mot_de_passe');
   ```

2. Installez PHPMailer (recommandé):
   ```bash
   composer require phpmailer/phpmailer
   ```

3. Modifiez la fonction `sendEmail()` dans `includes/functions.php`

## 🎨 Personnalisation

### Modifier les couleurs
Éditez `assets/css/style.css`:
```css
:root {
    --primary-color: #2563eb;      /* Couleur principale */
    --secondary-color: #1e40af;    /* Couleur secondaire */
    --accent-color: #f59e0b;       /* Couleur accent */
}
```

### Ajouter des entreprises

Via l'interface admin: `/admin/companies.php`

OU directement en base de données:
```sql
INSERT INTO companies (name, location, zone, ...) VALUES (...);
```

### Modifier les services disponibles

Éditez la table `services` ou modifiez `database.sql` avant l'initialisation.

## 🔒 Sécurité

### Bonnes pratiques implémentées
- ✅ Requêtes préparées (PDO) contre l'injection SQL
- ✅ Échappement HTML contre XSS
- ✅ Validation des données côté serveur
- ✅ Mots de passe hashés (bcrypt)
- ✅ Protection CSRF (à améliorer)
- ✅ Sessions sécurisées

### Recommandations pour la production

1. **Désactivez le mode debug** dans `config/config.php`:
   ```php
   define('DEBUG_MODE', false);
   ```

2. **Changez les mots de passe par défaut**

3. **Configurez HTTPS** (obligatoire)

4. **Restreignez les permissions** du dossier `data/`:
   ```bash
   chmod 750 data/
   chmod 640 data/annuaire.db
   ```

5. **Sauvegardez régulièrement** `data/annuaire.db`

6. **Ajoutez un fichier `.htaccess`** pour protéger les fichiers sensibles:
   ```apache
   <FilesMatch "\.(db|sql|log)$">
       Order allow,deny
       Deny from all
   </FilesMatch>
   ```

## 📝 API / Extensions futures

Le code est structuré pour faciliter l'ajout de:
- API REST pour applications mobiles
- Système de réservation en ligne
- Paiement en ligne
- Chat en direct
- Notifications push
- Export PDF des devis
- Système de notation détaillé
- Galerie photos pour les entreprises

## 🐛 Dépannage

### Erreur de connexion à la base de données
- Vérifiez que le dossier `data/` existe et est accessible en écriture
- Vérifiez les permissions: `chmod 755 data/`

### Les emails ne sont pas envoyés
- Vérifiez que la fonction `mail()` est activée sur votre serveur
- Consultez les logs PHP pour les erreurs
- Testez avec SMTP si `mail()` ne fonctionne pas

### Erreur 500
- Activez `DEBUG_MODE` dans `config/config.php`
- Consultez les logs d'erreurs PHP
- Vérifiez les permissions des fichiers

### Les images/CSS ne se chargent pas
- Vérifiez le chemin `SITE_URL` dans `config/config.php`
- Assurez-vous que le dossier `assets/` est accessible

## 📊 Technologies utilisées

- **Backend:** PHP 7.4+
- **Base de données:** SQLite (ou MySQL)
- **Frontend:** HTML5, CSS3, JavaScript
- **Sécurité:** PDO, password_hash
- **Icons:** Font Awesome 6.4.0

## 📄 Licence

Projet créé pour usage personnel/commercial.

## 🤝 Support

Pour toute question:
- Consultez la documentation
- Vérifiez les issues GitHub
- Contactez via la page de contact du site

## 🎉 Fonctionnalités bonus

- Système de recherche en temps réel
- Filtres multiples combinables
- Affichage du temps relatif pour les avis
- Messages flash pour le feedback utilisateur
- Interface admin responsive
- Statistiques en temps réel
- Validation des formulaires côté client et serveur
