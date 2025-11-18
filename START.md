# 🚀 DÉMARRAGE RAPIDE - Annuaire de Déménageurs

## Installation en 3 étapes

### 1️⃣ Initialiser la base de données
```bash
# Démarrer le serveur PHP
php -S localhost:8000

# Ouvrir le navigateur et accéder à :
http://localhost:8000/init_db.php
```

### 2️⃣ Supprimer le script d'initialisation (sécurité)
```bash
rm init_db.php
```

### 3️⃣ Accéder au site
- **Site public:** http://localhost:8000
- **Administration:** http://localhost:8000/admin/
  - Username: `admin`
  - Password: `admin123`

---

## 📁 Structure du projet

```
annuaire/
├── 📄 index.php              # Page d'accueil
├── 📄 devis.php              # Formulaire de devis
├── 📄 contact.php            # Contact
├── 📄 company-detail.php     # Détails entreprise
├── 📄 init_db.php            # Script d'initialisation (à supprimer après usage)
│
├── ⚙️ config/
│   ├── config.php            # Configuration générale
│   └── database.php          # Connexion DB
│
├── 📦 includes/
│   ├── functions.php         # Fonctions utilitaires
│   ├── header.php            # Header
│   └── footer.php            # Footer
│
├── 🎨 assets/
│   ├── css/style.css         # Styles
│   └── js/main.js            # JavaScript
│
├── 🔐 admin/
│   ├── login.php             # Connexion admin
│   ├── index.php             # Dashboard
│   └── ...                   # Autres pages admin
│
└── 📊 data/
    └── annuaire.db           # Base de données SQLite (créée auto)
```

---

## ✨ Fonctionnalités

### Frontend (Public)
- ✅ Liste des entreprises avec filtres (service, zone, prix, recherche)
- ✅ Pages détaillées des entreprises avec avis
- ✅ Formulaire de demande de devis complet
- ✅ Formulaire de contact
- ✅ Design responsive (mobile/tablette/desktop)

### Backend (Administration)
- ✅ Tableau de bord avec statistiques
- ✅ Gestion des entreprises (CRUD)
- ✅ Gestion des demandes de devis
- ✅ Gestion des messages de contact
- ✅ Gestion des avis clients
- ✅ Authentification sécurisée

---

## 🗃️ Base de données

### Contenu initial
- **10 entreprises** d'exemple
- **5 services** (déménagement, emballage, lift, stockage, montage)
- **7 avis clients** approuvés
- **1 utilisateur admin** (admin/admin123)

### Tables
- `companies` - Entreprises
- `services` - Services disponibles
- `company_services` - Relation entreprises ↔ services
- `quote_requests` - Demandes de devis
- `contact_messages` - Messages de contact
- `reviews` - Avis clients
- `admin_users` - Administrateurs

---

## 🔒 Sécurité

✅ Requêtes préparées PDO (anti-injection SQL)
✅ Échappement HTML (anti-XSS)
✅ Mots de passe hashés (bcrypt)
✅ Sessions sécurisées
✅ Protection .htaccess

⚠️ **IMPORTANT en production:**
1. Changez le mot de passe admin
2. Désactivez le mode DEBUG
3. Configurez HTTPS
4. Protégez le dossier `data/`

---

## 📧 Configuration emails

Par défaut, utilise la fonction `mail()` de PHP.

Pour SMTP (Gmail, etc.), éditez `config/config.php`:
```php
define('SMTP_ENABLED', true);
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USERNAME', 'votre@email.com');
define('SMTP_PASSWORD', 'votre_mot_de_passe');
```

---

## 🎨 Personnalisation

### Couleurs
Éditez `assets/css/style.css`:
```css
:root {
    --primary-color: #2563eb;
    --accent-color: #f59e0b;
}
```

### Ajouter des entreprises
Via l'admin: `/admin/companies.php`

---

## 📝 Commandes utiles

```bash
# Démarrer le serveur PHP
php -S localhost:8000

# Initialiser la base de données
php init_db.php

# Voir les logs PHP
tail -f /var/log/php/error.log
```

---

## 🐛 Dépannage

### Base de données vide
```bash
rm -rf data/annuaire.db
php init_db.php
```

### Erreur de permissions
```bash
chmod 755 data/
chmod 644 data/annuaire.db
```

### CSS/JS ne se chargent pas
Vérifiez `SITE_URL` dans `config/config.php`

---

## 📚 Documentation complète

Consultez `README_PHP.md` pour la documentation détaillée.

---

## 🎉 Bon développement !

Le site est prêt à l'emploi avec 10 entreprises d'exemple.
Pour toute question, consultez la documentation ou le code source commenté.
