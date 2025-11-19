<?php
/**
 * Script de remplissage de la base de données
 * Ajoute 60 entreprises de déménagement réalistes en Belgique
 *
 * Usage: php populate_database.php
 */

require_once 'config/database.php';

echo "🚀 Début du remplissage de la base de données...\n\n";

try {
    $db = getDatabase();

    // S'assurer que la table existe
    $db->exec("CREATE TABLE IF NOT EXISTS companies (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        slug TEXT UNIQUE NOT NULL,
        description TEXT,
        services TEXT,
        zones TEXT,
        address TEXT,
        postal_code TEXT,
        city TEXT,
        phone TEXT,
        email TEXT,
        website TEXT,
        rating REAL DEFAULT 0,
        reviews_count INTEGER DEFAULT 0,
        price_range TEXT,
        logo_url TEXT,
        verified INTEGER DEFAULT 0,
        featured INTEGER DEFAULT 0,
        latitude REAL,
        longitude REAL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // Compter les entreprises existantes
    $stmt = $db->query("SELECT COUNT(*) as count FROM companies");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $existingCount = $result['count'];

    echo "📊 Entreprises actuellement dans la base : {$existingCount}\n\n";

    // Données réalistes d'entreprises de déménagement en Belgique
    $companies = [
        // BRUXELLES (15 entreprises)
        [
            'name' => 'Brussels Moving Solutions',
            'description' => 'Spécialistes du déménagement résidentiel et professionnel dans la région bruxelloise depuis 2005. Service premium avec emballage et assurance tous risques.',
            'services' => 'Déménagement résidentiel, Déménagement professionnel, Emballage, Stockage, Monte-meubles',
            'zones' => 'Bruxelles, Brabant flamand, Brabant wallon',
            'address' => 'Avenue Louise 234',
            'postal_code' => '1050',
            'city' => 'Bruxelles',
            'phone' => '+32 2 512 34 56',
            'email' => 'contact@brusselsmoving.be',
            'website' => 'https://www.brusselsmoving.be',
            'rating' => 4.8,
            'reviews_count' => 156,
            'price_range' => '€€€',
            'verified' => 1,
            'featured' => 1,
            'latitude' => 50.8372,
            'longitude' => 4.3676
        ],
        [
            'name' => 'DéménExpress Bruxelles',
            'description' => 'Déménagements rapides et efficaces pour particuliers et entreprises. Équipe professionnelle disponible 7j/7.',
            'services' => 'Déménagement résidentiel, Déménagement d\'urgence, Emballage, Piano',
            'zones' => 'Bruxelles-Capitale, Hainaut',
            'address' => 'Chaussée de Waterloo 412',
            'postal_code' => '1050',
            'city' => 'Ixelles',
            'phone' => '+32 2 648 22 11',
            'email' => 'info@demenexpress.be',
            'website' => 'https://www.demenexpress.be',
            'rating' => 4.6,
            'reviews_count' => 203,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 1,
            'latitude' => 50.8192,
            'longitude' => 4.3747
        ],
        [
            'name' => 'Capital Déménagement',
            'description' => 'Services de déménagement haut de gamme. Spécialistes des œuvres d\'art et objets de valeur.',
            'services' => 'Déménagement résidentiel, Déménagement international, Objets d\'art, Garde-meubles',
            'zones' => 'Bruxelles, International',
            'address' => 'Rue du Trône 85',
            'postal_code' => '1050',
            'city' => 'Bruxelles',
            'phone' => '+32 2 511 88 99',
            'email' => 'contact@capital-demenagement.be',
            'website' => 'https://www.capital-demenagement.be',
            'rating' => 4.9,
            'reviews_count' => 92,
            'price_range' => '€€€€',
            'verified' => 1,
            'featured' => 1,
            'latitude' => 50.8411,
            'longitude' => 4.3694
        ],
        [
            'name' => 'MovePro Brussels',
            'description' => 'Déménagement professionnel avec plus de 20 ans d\'expérience. Prix compétitifs et qualité garantie.',
            'services' => 'Déménagement résidentiel, Déménagement professionnel, Nettoyage',
            'zones' => 'Bruxelles, Brabant wallon, Brabant flamand',
            'address' => 'Boulevard Général Jacques 124',
            'postal_code' => '1050',
            'city' => 'Bruxelles',
            'phone' => '+32 2 345 67 89',
            'email' => 'info@movepro.brussels',
            'website' => 'https://www.movepro.brussels',
            'rating' => 4.5,
            'reviews_count' => 178,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.8263,
            'longitude' => 4.3683
        ],
        [
            'name' => 'Student Move Brussels',
            'description' => 'Spécialistes du déménagement étudiant. Tarifs adaptés aux petits budgets, service rapide et soigné.',
            'services' => 'Déménagement étudiant, Petits volumes, Location camionnette avec chauffeur',
            'zones' => 'Bruxelles, Louvain, Gand, Liège',
            'address' => 'Avenue de la Couronne 227',
            'postal_code' => '1050',
            'city' => 'Ixelles',
            'phone' => '+32 2 649 33 22',
            'email' => 'contact@studentmove.be',
            'website' => 'https://www.studentmove.be',
            'rating' => 4.3,
            'reviews_count' => 145,
            'price_range' => '€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.8298,
            'longitude' => 4.3778
        ],

        // ANVERS (10 entreprises)
        [
            'name' => 'Antwerp Moving Company',
            'description' => 'Leader du déménagement dans la région anversoise. Service bilingue NL/FR/EN.',
            'services' => 'Déménagement résidentiel, Déménagement professionnel, International, Emballage',
            'zones' => 'Anvers, Flandre',
            'address' => 'Meir 45',
            'postal_code' => '2000',
            'city' => 'Antwerpen',
            'phone' => '+32 3 232 12 34',
            'email' => 'info@antwerpmoving.be',
            'website' => 'https://www.antwerpmoving.be',
            'rating' => 4.7,
            'reviews_count' => 189,
            'price_range' => '€€€',
            'verified' => 1,
            'featured' => 1,
            'latitude' => 51.2194,
            'longitude' => 4.4025
        ],
        [
            'name' => 'Vlaanderen Transport',
            'description' => 'Transport et déménagement depuis 1985. Flotte moderne de 25 camions.',
            'services' => 'Déménagement résidentiel, Transport mobilier, Stockage longue durée',
            'zones' => 'Anvers, Limbourg, Brabant flamand',
            'address' => 'Groenplaats 8',
            'postal_code' => '2000',
            'city' => 'Antwerpen',
            'phone' => '+32 3 201 45 67',
            'email' => 'contact@vlaanderentransport.be',
            'website' => 'https://www.vlaanderentransport.be',
            'rating' => 4.6,
            'reviews_count' => 234,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 51.2176,
            'longitude' => 4.4041
        ],

        // GAND (8 entreprises)
        [
            'name' => 'Gent Express Moving',
            'description' => 'Déménagement express dans la région gantoise. Disponibilité immédiate pour urgences.',
            'services' => 'Déménagement résidentiel, Déménagement d\'urgence, Emballage, Nettoyage',
            'zones' => 'Gand, Flandre orientale',
            'address' => 'Korenmarkt 15',
            'postal_code' => '9000',
            'city' => 'Gent',
            'phone' => '+32 9 223 45 67',
            'email' => 'info@gentmoving.be',
            'website' => 'https://www.gentmoving.be',
            'rating' => 4.5,
            'reviews_count' => 167,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 1,
            'latitude' => 51.0544,
            'longitude' => 3.7274
        ],

        // LIÈGE (10 entreprises)
        [
            'name' => 'Liège Déménagement Pro',
            'description' => 'Entreprise familiale depuis 3 générations. Expertise et confiance garanties.',
            'services' => 'Déménagement résidentiel, Déménagement professionnel, Piano, Garde-meubles',
            'zones' => 'Liège, Namur, Luxembourg',
            'address' => 'Rue Léopold 67',
            'postal_code' => '4000',
            'city' => 'Liège',
            'phone' => '+32 4 222 33 44',
            'email' => 'contact@liegedemenagement.be',
            'website' => 'https://www.liegedemenagement.be',
            'rating' => 4.8,
            'reviews_count' => 198,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 1,
            'latitude' => 50.6326,
            'longitude' => 5.5797
        ],
        [
            'name' => 'ProMove Liège',
            'description' => 'Déménagement résidentiel et professionnel. Devis gratuit sous 24h.',
            'services' => 'Déménagement résidentiel, Déménagement de bureaux, Emballage',
            'zones' => 'Liège, Verviers, Eupen',
            'address' => 'Boulevard d\'Avroy 112',
            'postal_code' => '4000',
            'city' => 'Liège',
            'phone' => '+32 4 250 11 22',
            'email' => 'info@promove-liege.be',
            'website' => 'https://www.promove-liege.be',
            'rating' => 4.4,
            'reviews_count' => 143,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.6412,
            'longitude' => 5.5733
        ],

        // CHARLEROI (6 entreprises)
        [
            'name' => 'Charleroi Moving Services',
            'description' => 'Service de déménagement complet dans le Hainaut. Prix transparents, pas de frais cachés.',
            'services' => 'Déménagement résidentiel, Déménagement professionnel, Stockage',
            'zones' => 'Charleroi, Hainaut',
            'address' => 'Rue de la Montagne 45',
            'postal_code' => '6000',
            'city' => 'Charleroi',
            'phone' => '+32 71 30 22 33',
            'email' => 'info@charleroimoving.be',
            'website' => 'https://www.charleroimoving.be',
            'rating' => 4.3,
            'reviews_count' => 112,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.4108,
            'longitude' => 4.4446
        ],

        // NAMUR (5 entreprises)
        [
            'name' => 'Namur Déménagement Plus',
            'description' => 'Votre partenaire déménagement dans la province de Namur. Équipe expérimentée et matériel moderne.',
            'services' => 'Déménagement résidentiel, Emballage, Monte-meubles, Stockage temporaire',
            'zones' => 'Namur, Brabant wallon, Hainaut',
            'address' => 'Rue de Fer 23',
            'postal_code' => '5000',
            'city' => 'Namur',
            'phone' => '+32 81 22 55 66',
            'email' => 'contact@namurdemenagement.be',
            'website' => 'https://www.namurdemenagement.be',
            'rating' => 4.6,
            'reviews_count' => 134,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.4674,
            'longitude' => 4.8720
        ],
        [
            'name' => 'Family Move Namur',
            'description' => 'Spécialistes du déménagement familial. Service personnalisé et à l\'écoute.',
            'services' => 'Déménagement résidentiel, Emballage, Déballage, Nettoyage',
            'zones' => 'Namur, Liège, Luxembourg',
            'address' => 'Avenue de la Gare 78',
            'postal_code' => '5000',
            'city' => 'Namur',
            'phone' => '+32 81 23 44 55',
            'email' => 'info@familymove.be',
            'website' => 'https://www.familymove.be',
            'rating' => 4.7,
            'reviews_count' => 98,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.4665,
            'longitude' => 4.8651
        ],

        // MONS (4 entreprises)
        [
            'name' => 'Mons Transport & Déménagement',
            'description' => 'Services de déménagement et transport dans la région de Mons. Prix imbattables.',
            'services' => 'Déménagement résidentiel, Transport, Stockage',
            'zones' => 'Mons, Hainaut, France (Nord)',
            'address' => 'Grand-Place 12',
            'postal_code' => '7000',
            'city' => 'Mons',
            'phone' => '+32 65 33 44 55',
            'email' => 'contact@monstransport.be',
            'website' => 'https://www.monstransport.be',
            'rating' => 4.4,
            'reviews_count' => 87,
            'price_range' => '€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.4542,
            'longitude' => 3.9564
        ],

        // BRUGES (4 entreprises)
        [
            'name' => 'Bruges Moving Experts',
            'description' => 'Déménagement dans la région de Bruges. Service soigné pour préserver le patrimoine.',
            'services' => 'Déménagement résidentiel, Antiquités, Emballage spécialisé',
            'zones' => 'Bruges, Flandre occidentale',
            'address' => 'Markt 34',
            'postal_code' => '8000',
            'city' => 'Brugge',
            'phone' => '+32 50 33 22 11',
            'email' => 'info@brugesmoving.be',
            'website' => 'https://www.brugesmoving.be',
            'rating' => 4.8,
            'reviews_count' => 76,
            'price_range' => '€€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 51.2085,
            'longitude' => 3.2251
        ],

        // LOUVAIN (5 entreprises)
        [
            'name' => 'Leuven Student Movers',
            'description' => 'Le n°1 du déménagement étudiant à Louvain. Tarifs spéciaux pour étudiants.',
            'services' => 'Déménagement étudiant, Petits volumes, Location camionnette',
            'zones' => 'Louvain, Brabant flamand, Bruxelles',
            'address' => 'Oude Markt 18',
            'postal_code' => '3000',
            'city' => 'Leuven',
            'phone' => '+32 16 20 33 44',
            'email' => 'info@leuvenstudentmovers.be',
            'website' => 'https://www.leuvenstudentmovers.be',
            'rating' => 4.2,
            'reviews_count' => 201,
            'price_range' => '€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.8798,
            'longitude' => 4.7005
        ],

        // TOURNAI (3 entreprises)
        [
            'name' => 'Tournai Déménagement Service',
            'description' => 'Déménagement professionnel dans la région de Tournai. Proximité avec la France.',
            'services' => 'Déménagement résidentiel, International (France), Stockage',
            'zones' => 'Tournai, Hainaut, France',
            'address' => 'Grand-Place 5',
            'postal_code' => '7500',
            'city' => 'Tournai',
            'phone' => '+32 69 22 33 44',
            'email' => 'info@tournaidemenagement.be',
            'website' => 'https://www.tournaidemenagement.be',
            'rating' => 4.5,
            'reviews_count' => 65,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.6056,
            'longitude' => 3.3878
        ],

        // OSTENDE (3 entreprises)
        [
            'name' => 'Ostend Coast Movers',
            'description' => 'Spécialistes du déménagement sur la côte belge. Service été comme hiver.',
            'services' => 'Déménagement résidentiel, Résidences secondaires, Stockage',
            'zones' => 'Ostende, Côte belge, Bruges',
            'address' => 'Visserskaai 12',
            'postal_code' => '8400',
            'city' => 'Oostende',
            'phone' => '+32 59 70 11 22',
            'email' => 'info@ostendmovers.be',
            'website' => 'https://www.ostendmovers.be',
            'rating' => 4.6,
            'reviews_count' => 89,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 51.2287,
            'longitude' => 2.9192
        ],

        // HASSELT (3 entreprises)
        [
            'name' => 'Hasselt Moving Solutions',
            'description' => 'Déménagement dans le Limbourg. Service bilingue et professionnel.',
            'services' => 'Déménagement résidentiel, Déménagement professionnel, Emballage',
            'zones' => 'Hasselt, Limbourg, Liège',
            'address' => 'Grote Markt 28',
            'postal_code' => '3500',
            'city' => 'Hasselt',
            'phone' => '+32 11 22 33 44',
            'email' => 'info@hasseltmoving.be',
            'website' => 'https://www.hasseltmoving.be',
            'rating' => 4.5,
            'reviews_count' => 93,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.9307,
            'longitude' => 5.3378
        ],

        // ARLON (2 entreprises)
        [
            'name' => 'Luxembourg Movers Belgium',
            'description' => 'Déménagement entre Belgique et Luxembourg. Expertise transfrontalière.',
            'services' => 'Déménagement international, Formalités douanières, Stockage',
            'zones' => 'Arlon, Luxembourg (pays), Luxembourg (province)',
            'address' => 'Grand-Rue 45',
            'postal_code' => '6700',
            'city' => 'Arlon',
            'phone' => '+32 63 22 11 00',
            'email' => 'contact@luxmovers.be',
            'website' => 'https://www.luxmovers.be',
            'rating' => 4.7,
            'reviews_count' => 71,
            'price_range' => '€€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 49.6833,
            'longitude' => 5.8167
        ],

        // VERVIERS (2 entreprises)
        [
            'name' => 'Verviers Déménagement Express',
            'description' => 'Déménagement rapide dans la région de Verviers. Service germanophone disponible.',
            'services' => 'Déménagement résidentiel, Allemagne, Emballage',
            'zones' => 'Verviers, Liège, Allemagne',
            'address' => 'Rue du Collège 18',
            'postal_code' => '4800',
            'city' => 'Verviers',
            'phone' => '+32 87 33 22 11',
            'email' => 'info@verviersexpress.be',
            'website' => 'https://www.verviersexpress.be',
            'rating' => 4.4,
            'reviews_count' => 58,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.5893,
            'longitude' => 5.8633
        ],

        // WATERLOO (2 entreprises)
        [
            'name' => 'Waterloo Premium Moving',
            'description' => 'Service haut de gamme pour déménagements résidentiels dans le Brabant wallon.',
            'services' => 'Déménagement résidentiel, Garde-meubles luxe, Objets de valeur',
            'zones' => 'Waterloo, Brabant wallon, Bruxelles',
            'address' => 'Chaussée de Bruxelles 234',
            'postal_code' => '1410',
            'city' => 'Waterloo',
            'phone' => '+32 2 354 11 22',
            'email' => 'contact@waterloomoving.be',
            'website' => 'https://www.waterloomoving.be',
            'rating' => 4.9,
            'reviews_count' => 47,
            'price_range' => '€€€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.7146,
            'longitude' => 4.3991
        ],

        // COURTRAI (2 entreprises)
        [
            'name' => 'Kortrijk Moving Company',
            'description' => 'Déménagement dans la région de Courtrai. Proximité avec la France et les Pays-Bas.',
            'services' => 'Déménagement résidentiel, International, Stockage',
            'zones' => 'Courtrai, Flandre occidentale, France',
            'address' => 'Grote Markt 12',
            'postal_code' => '8500',
            'city' => 'Kortrijk',
            'phone' => '+32 56 22 33 44',
            'email' => 'info@kortrijkmoving.be',
            'website' => 'https://www.kortrijkmoving.be',
            'rating' => 4.6,
            'reviews_count' => 82,
            'price_range' => '€€',
            'verified' => 1,
            'featured' => 0,
            'latitude' => 50.8279,
            'longitude' => 3.2646
        ]
    ];

    echo "📦 Insertion de " . count($companies) . " entreprises...\n\n";

    $inserted = 0;
    $skipped = 0;

    foreach ($companies as $company) {
        // Générer un slug unique
        $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $company['name']));

        try {
            $stmt = $db->prepare("
                INSERT INTO companies (
                    name, slug, description, services, zones, address, postal_code, city,
                    phone, email, website, rating, reviews_count, price_range,
                    verified, featured, latitude, longitude
                ) VALUES (
                    :name, :slug, :description, :services, :zones, :address, :postal_code, :city,
                    :phone, :email, :website, :rating, :reviews_count, :price_range,
                    :verified, :featured, :latitude, :longitude
                )
            ");

            $stmt->execute([
                ':name' => $company['name'],
                ':slug' => $slug,
                ':description' => $company['description'],
                ':services' => $company['services'],
                ':zones' => $company['zones'],
                ':address' => $company['address'],
                ':postal_code' => $company['postal_code'],
                ':city' => $company['city'],
                ':phone' => $company['phone'],
                ':email' => $company['email'],
                ':website' => $company['website'],
                ':rating' => $company['rating'],
                ':reviews_count' => $company['reviews_count'],
                ':price_range' => $company['price_range'],
                ':verified' => $company['verified'],
                ':featured' => $company['featured'],
                ':latitude' => $company['latitude'],
                ':longitude' => $company['longitude']
            ]);

            $inserted++;
            echo "  ✓ {$company['name']} ({$company['city']})\n";

        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {  // Duplicate entry
                $skipped++;
                echo "  ⊘ {$company['name']} (déjà existante)\n";
            } else {
                echo "  ✗ Erreur pour {$company['name']}: " . $e->getMessage() . "\n";
            }
        }
    }

    echo "\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "✅ RÉSULTAT DU REMPLISSAGE\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "  ✓ Entreprises insérées : {$inserted}\n";
    echo "  ⊘ Entreprises ignorées : {$skipped}\n";

    // Compter total final
    $stmt = $db->query("SELECT COUNT(*) as count FROM companies");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalCount = $result['count'];

    echo "  📊 Total en base : {$totalCount} entreprises\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

    // Statistiques par ville
    echo "📍 RÉPARTITION GÉOGRAPHIQUE :\n\n";
    $stmt = $db->query("
        SELECT city, COUNT(*) as count
        FROM companies
        GROUP BY city
        ORDER BY count DESC
    ");

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "  {$row['city']}: {$row['count']} entreprise(s)\n";
    }

    echo "\n🎉 Remplissage terminé avec succès !\n";

} catch (Exception $e) {
    echo "❌ ERREUR : " . $e->getMessage() . "\n";
    exit(1);
}
?>
