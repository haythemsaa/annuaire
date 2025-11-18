# Annuaire de Déménageurs

Site d'annuaire professionnel pour entreprises de déménagement, inspiré de demenagementbruxelles.be

## 🎯 Fonctionnalités

### Pages principales
- **Page d'accueil** (index.html) - Liste des entreprises avec système de recherche et filtres
- **Demande de devis** (devis.html) - Formulaire complet pour obtenir des devis gratuits
- **Contact** (contact.html) - Formulaire de contact et FAQ
- **Détails entreprise** (company-detail.html) - Page détaillée pour chaque entreprise

### Fonctionnalités clés

#### ✅ Recherche et filtrage
- Recherche par mots-clés (nom, description, localisation)
- Filtre par service (déménagement, emballage, lift, stockage, montage)
- Filtre par zone géographique (Bruxelles, Wallonie, Flandre)
- Filtre par gamme de prix (€, €€, €€€)

#### 📝 Formulaire de devis
- Type de déménagement (résidentiel, commercial, bureau)
- Adresses de départ et d'arrivée
- Nombre d'étages et disponibilité ascenseur
- Taille du logement (nombre de pièces, surface)
- Services supplémentaires (emballage, montage, lift, stockage, nettoyage)
- Date et flexibilité
- Validation des données

#### 🏢 Profils d'entreprises
- Informations complètes (description, services, zones)
- Système de notation avec étoiles
- Avis clients
- Coordonnées de contact
- Tarifs indicatifs
- Garanties et certifications

#### 📱 Design responsive
- Adapté mobile, tablette et desktop
- Navigation intuitive
- Interface moderne et professionnelle

## 🗂️ Structure du projet

```
annuaire/
├── index.html              # Page d'accueil
├── devis.html              # Formulaire de demande de devis
├── contact.html            # Page de contact
├── company-detail.html     # Page détail entreprise
├── css/
│   └── style.css          # Styles principaux
├── js/
│   ├── data.js            # Données des entreprises
│   ├── app.js             # Logic page d'accueil
│   ├── company-detail.js  # Logic page détail
│   ├── devis.js           # Logic formulaire devis
│   └── contact.js         # Logic formulaire contact
└── images/                # Dossier pour les images
```

## 🚀 Installation et utilisation

### Méthode simple
1. Ouvrir `index.html` directement dans un navigateur web

### Avec serveur local (recommandé)
```bash
# Avec Python 3
python -m http.server 8000

# Avec Node.js (http-server)
npx http-server

# Avec PHP
php -S localhost:8000
```

Puis ouvrir http://localhost:8000 dans votre navigateur.

## 🎨 Personnalisation

### Modifier les couleurs
Éditez les variables CSS dans `css/style.css` :
```css
:root {
    --primary-color: #2563eb;      /* Couleur principale */
    --secondary-color: #1e40af;    /* Couleur secondaire */
    --accent-color: #f59e0b;       /* Couleur accent */
}
```

### Ajouter des entreprises
Éditez le fichier `js/data.js` et ajoutez des entrées dans le tableau `companies` :
```javascript
{
    id: 11,
    name: "Nom de l'entreprise",
    location: "Ville",
    zone: "bruxelles", // bruxelles, wallonie, ou flandre
    rating: 4.5,
    reviews: 50,
    description: "Description de l'entreprise",
    services: ["demenagement", "emballage", "lift"],
    priceRange: "medium", // low, medium, ou high
    priceLabel: "€€",
    phone: "+32 2 XXX XX XX",
    email: "contact@entreprise.be",
    website: "www.entreprise.be",
    address: "Adresse complète",
    zones: "Zones d'intervention",
    verified: true
}
```

### Modifier les services disponibles
Éditez `serviceLabels` dans `js/data.js` pour ajouter ou modifier les services.

## 📋 Fonctionnalités à développer (backend)

Le site actuel fonctionne en front-end uniquement. Pour une version production complète, il faudrait :

1. **Backend API**
   - Enregistrement des demandes de devis
   - Stockage des messages de contact
   - Gestion des entreprises (CRUD)
   - Système d'authentification

2. **Base de données**
   - Entreprises
   - Devis
   - Messages de contact
   - Avis clients

3. **Fonctionnalités supplémentaires**
   - Panneau d'administration
   - Envoi d'emails automatiques
   - Système de paiement
   - Gestion des avis clients
   - Statistiques et analytics

## 🌐 Technologies utilisées

- HTML5
- CSS3 (Flexbox, Grid, Variables CSS)
- JavaScript (ES6+)
- Font Awesome 6.4.0 (icônes)

## 📄 Licence

Projet créé pour usage personnel/commercial.

## 🤝 Support

Pour toute question ou suggestion, utilisez la page de contact du site.
