# 🏠 Annuaire de Déménageurs Belgique

> **Plateforme complète de comparaison et mise en relation avec des déménageurs professionnels en Belgique**

---

## 📋 Présentation

**Annuaire de Déménageurs Belgique** est une plateforme web complète permettant aux particuliers et entreprises de comparer les déménageurs professionnels, obtenir jusqu'à 5 devis gratuits, et accéder à des outils interactifs et guides experts.

### 🏆 Chiffres Clés

- **60+ entreprises** de déménagement répertoriées
- **6 articles de blog** de 2500+ mots chacun
- **19 fonctionnalités** majeures
- **25+ pages** complètes
- **Analytics complet** Google Analytics + Facebook Pixel + Hotjar + tracking interne
- **RGPD conforme** avec politique confidentialité complète

---

## ✨ Fonctionnalités Principales

### 🔧 Outils Interactifs

1. **Calculateur de Volume** - Estimation précise du volume à déménager
2. **Comparateur d'Entreprises** - Comparaison jusqu'à 3 déménageurs
3. **Checklist Interactive** - 150+ tâches avec sauvegarde localStorage
4. **Guide des Tarifs** - Grilles tarifaires + simulateur
5. **Carte Interactive Leaflet** - Visualisation géographique des déménageurs

### 📚 Blog SEO (6 Articles de 2500+ Mots)

- Comment préparer son déménagement 3 mois à l'avance
- Budget réaliste pour un déménagement en Belgique 2024
- Changement d'adresse en Belgique : Guide complet 2024
- Déménager avec des enfants : 15 conseils d'experts
- Emballer vos objets fragiles comme un pro
- Déménagement international depuis la Belgique

### 📧 Newsletter + 💬 Témoignages + ⚖️ RGPD

- Système double opt-in
- 12 témoignages vérifiés
- Politique confidentialité complète
- Mentions légales

---

## 🛠 Technologies

- **Backend:** PHP 7.4+, SQLite/MySQL, PDO
- **Frontend:** HTML5, CSS3, JavaScript ES6+, Leaflet.js
- **Analytics:** Google Analytics 4, Facebook Pixel, Hotjar
- **SEO:** Schema.org (6 types), Sitemap.xml, Robots.txt

---

## 📥 Installation Rapide

```bash
# 1. Cloner
git clone https://github.com/votre-username/annuaire.git
cd annuaire

# 2. Créer dossier données
mkdir -p data && chmod 755 data

# 3. Configuration
cp config/config.example.php config/config.php
nano config/config.php

# 4. Initialiser BDD
php init_db.php

# 5. Remplir avec données test
php populate_database.php

# 6. Lancer serveur
php -S localhost:8000
```

Puis ouvrir `http://localhost:8000`

---

## 📁 Structure

```
annuaire/
├── api/                    # APIs (newsletter, tracking)
├── blog/                   # 6 articles complets
├── config/                 # Configuration
├── data/                   # Base SQLite
├── includes/               # Header, footer, analytics
├── assets/                 # CSS, JS, images
├── *.php                   # 25+ pages
├── sitemap.xml            # SEO
├── robots.txt             # Crawlers
└── README.md              # Documentation
```

---

## 🗄️ Base de Données

**Tables principales:**

- `companies` - Entreprises de déménagement (60+)
- `newsletter_subscribers` - Abonnés newsletter
- `analytics_events` - Tracking interne
- `quote_requests` - Demandes de devis

---

## 📊 Analytics

**Tracking automatique:**

- Clics boutons/CTA
- Soumissions formulaires
- Clics téléphone (conversions)
- Téléchargements PDF
- Scroll profond
- Temps sur page
- Favoris
- Recherches

---

## 🔍 SEO

- ✅ Schema.org (WebSite, Organization, ItemList, LocalBusiness, BlogPosting, FAQPage)
- ✅ Sitemap.xml complet
- ✅ Robots.txt optimisé
- ✅ Meta tags
- ✅ Rich snippets
- ✅ 6 articles blog optimisés

---

## ⚖️ RGPD

- ✅ Politique de confidentialité
- ✅ Mentions légales
- ✅ Cookie consent
- ✅ Droits utilisateurs
- ✅ Conformité totale

---

## 📞 Support

- **Email:** support@votresite.be
- **GitHub Issues:** [Issues](https://github.com/votre-repo/issues)

---

## 📜 License

MIT License - Voir [LICENSE](LICENSE)

---

**Fait avec ❤️ en Belgique 🇧🇪**
