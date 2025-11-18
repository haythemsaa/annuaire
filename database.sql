-- Structure de la base de données pour l'annuaire de déménageurs

-- Table des entreprises
CREATE TABLE IF NOT EXISTS companies (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    zone VARCHAR(50) NOT NULL,
    rating DECIMAL(2,1) DEFAULT 0,
    reviews INTEGER DEFAULT 0,
    description TEXT,
    price_range VARCHAR(20),
    price_label VARCHAR(10),
    phone VARCHAR(50),
    email VARCHAR(255),
    website VARCHAR(255),
    address TEXT,
    zones TEXT,
    verified BOOLEAN DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table des services
CREATE TABLE IF NOT EXISTS services (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    icon VARCHAR(50)
);

-- Table de liaison entreprises-services (many-to-many)
CREATE TABLE IF NOT EXISTS company_services (
    company_id INTEGER,
    service_id INTEGER,
    PRIMARY KEY (company_id, service_id),
    FOREIGN KEY (company_id) REFERENCES companies(id) ON DELETE CASCADE,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE CASCADE
);

-- Table des demandes de devis
CREATE TABLE IF NOT EXISTS quote_requests (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    type_move VARCHAR(50),
    from_address TEXT,
    to_address TEXT,
    from_floor INTEGER,
    to_floor INTEGER,
    from_elevator BOOLEAN DEFAULT 0,
    to_elevator BOOLEAN DEFAULT 0,
    rooms VARCHAR(50),
    surface INTEGER,
    volume INTEGER,
    service_packing BOOLEAN DEFAULT 0,
    service_assembly BOOLEAN DEFAULT 0,
    service_lift BOOLEAN DEFAULT 0,
    service_storage BOOLEAN DEFAULT 0,
    service_cleaning BOOLEAN DEFAULT 0,
    move_date DATE,
    flexibility VARCHAR(50),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    email VARCHAR(255),
    phone VARCHAR(50),
    message TEXT,
    status VARCHAR(50) DEFAULT 'pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table des messages de contact
CREATE TABLE IF NOT EXISTS contact_messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    subject VARCHAR(255),
    message TEXT NOT NULL,
    status VARCHAR(50) DEFAULT 'unread',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table des avis clients
CREATE TABLE IF NOT EXISTS reviews (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    company_id INTEGER,
    customer_name VARCHAR(255),
    rating INTEGER CHECK(rating >= 1 AND rating <= 5),
    comment TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    approved BOOLEAN DEFAULT 0,
    FOREIGN KEY (company_id) REFERENCES companies(id) ON DELETE CASCADE
);

-- Table des utilisateurs admin
CREATE TABLE IF NOT EXISTS admin_users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    role VARCHAR(50) DEFAULT 'admin',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insertion des services par défaut
INSERT INTO services (name, slug, description, icon) VALUES
('Déménagement complet', 'demenagement', 'Service de déménagement complet avec équipe', 'fa-truck-moving'),
('Emballage', 'emballage', 'Service d''emballage et de protection des biens', 'fa-box'),
('Location de lift', 'lift', 'Location de monte-meubles pour étages élevés', 'fa-elevator'),
('Stockage', 'stockage', 'Service de garde-meubles et stockage', 'fa-warehouse'),
('Montage/Démontage', 'montage', 'Montage et démontage de meubles', 'fa-screwdriver');

-- Insertion d'un utilisateur admin par défaut (mot de passe: admin123)
-- Hash: password_hash('admin123', PASSWORD_DEFAULT)
INSERT INTO admin_users (username, password, email) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@annuaire.be');

-- Insertion des entreprises d'exemple
INSERT INTO companies (name, location, zone, rating, reviews, description, price_range, price_label, phone, email, website, address, zones, verified) VALUES
('Brussels Move Express', 'Bruxelles', 'bruxelles', 4.8, 127, 'Spécialistes du déménagement à Bruxelles depuis plus de 15 ans. Nous offrons un service complet et personnalisé pour tous vos besoins de déménagement.', 'medium', '€€', '+32 2 345 67 89', 'contact@brusselsmove.be', 'www.brusselsmove.be', 'Avenue Louise 234, 1050 Bruxelles', 'Bruxelles-Capitale, Brabant Wallon, Brabant Flamand', 1),
('Déménagement Pro Services', 'Ixelles', 'bruxelles', 4.6, 89, 'Entreprise familiale spécialisée dans les déménagements résidentiels et professionnels. Service rapide, fiable et à prix compétitif.', 'low', '€', '+32 2 456 78 90', 'info@demenagementpro.be', 'www.demenagementpro.be', 'Chaussée d''Ixelles 145, 1050 Ixelles', 'Région de Bruxelles-Capitale', 1),
('Elite Moving Solutions', 'Bruxelles', 'bruxelles', 4.9, 203, 'Service premium de déménagement avec équipe hautement qualifiée. Nous prenons soin de vos biens comme si c''étaient les nôtres.', 'high', '€€€', '+32 2 567 89 01', 'contact@elitemoving.be', 'www.elitemoving.be', 'Boulevard du Souverain 89, 1170 Bruxelles', 'Belgique et pays limitrophes', 1),
('Quick Move Bruxelles', 'Schaerbeek', 'bruxelles', 4.5, 76, 'Déménagements rapides et efficaces à prix abordable. Parfait pour les petits déménagements et les étudiants.', 'low', '€', '+32 2 678 90 12', 'info@quickmove.be', 'www.quickmove.be', 'Rue de Brabant 56, 1030 Schaerbeek', 'Bruxelles et environs (50km)', 1),
('Lift & Move Services', 'Anderlecht', 'bruxelles', 4.7, 134, 'Experts en location de lift et déménagements en hauteur. Équipement professionnel de dernière génération.', 'medium', '€€', '+32 2 789 01 23', 'contact@liftmove.be', 'www.liftmove.be', 'Rue de la Loi 78, 1070 Anderlecht', 'Bruxelles-Capitale, Brabant Wallon', 1),
('Wallonie Déménagement', 'Namur', 'wallonie', 4.6, 98, 'Premier déménageur en Wallonie. Service complet avec stockage longue durée disponible.', 'medium', '€€', '+32 81 234 567', 'info@walloniedemenagement.be', 'www.walloniedemenagement.be', 'Rue de Fer 45, 5000 Namur', 'Wallonie, Bruxelles', 1),
('Flandre Moving Company', 'Gand', 'flandre', 4.8, 156, 'Service de déménagement professionnel en Flandre. Équipe multilingue et service client excellent.', 'medium', '€€', '+32 9 345 678', 'contact@flandremove.be', 'www.flandremove.be', 'Korenmarkt 23, 9000 Gent', 'Flandre, Bruxelles, Belgique', 1),
('Storage & Move Plus', 'Bruxelles', 'bruxelles', 4.4, 67, 'Spécialistes du stockage et du déménagement. Solutions de garde-meubles sécurisées et flexibles.', 'low', '€', '+32 2 890 12 34', 'info@storagemove.be', 'www.storagemove.be', 'Avenue de Tervueren 123, 1040 Bruxelles', 'Bruxelles-Capitale', 1),
('Premium Déménagement International', 'Bruxelles', 'bruxelles', 4.9, 245, 'Déménagements nationaux et internationaux haut de gamme. Service clé en main avec coordinateur dédié.', 'high', '€€€', '+32 2 901 23 45', 'contact@premiumdemenagement.be', 'www.premiumdemenagement.be', 'Rue Royale 178, 1000 Bruxelles', 'International, Europe, Belgique', 1),
('Éco-Move Bruxelles', 'Uccle', 'bruxelles', 4.7, 112, 'Déménagement écologique et responsable. Véhicules électriques et matériaux recyclables. Engagés pour l''environnement.', 'medium', '€€', '+32 2 012 34 56', 'info@ecomove.be', 'www.ecomove.be', 'Avenue Brugmann 234, 1180 Uccle', 'Bruxelles et environs', 1);

-- Liaison des services aux entreprises
-- Brussels Move Express (id: 1) - tous les services
INSERT INTO company_services (company_id, service_id) VALUES (1, 1), (1, 2), (1, 3), (1, 4), (1, 5);

-- Déménagement Pro Services (id: 2)
INSERT INTO company_services (company_id, service_id) VALUES (2, 1), (2, 2), (2, 5);

-- Elite Moving Solutions (id: 3) - tous les services
INSERT INTO company_services (company_id, service_id) VALUES (3, 1), (3, 2), (3, 3), (3, 4), (3, 5);

-- Quick Move Bruxelles (id: 4)
INSERT INTO company_services (company_id, service_id) VALUES (4, 1), (4, 5);

-- Lift & Move Services (id: 5)
INSERT INTO company_services (company_id, service_id) VALUES (5, 1), (5, 2), (5, 3), (5, 5);

-- Wallonie Déménagement (id: 6)
INSERT INTO company_services (company_id, service_id) VALUES (6, 1), (6, 2), (6, 4), (6, 5);

-- Flandre Moving Company (id: 7) - tous les services
INSERT INTO company_services (company_id, service_id) VALUES (7, 1), (7, 2), (7, 3), (7, 4), (7, 5);

-- Storage & Move Plus (id: 8)
INSERT INTO company_services (company_id, service_id) VALUES (8, 1), (8, 2), (8, 4);

-- Premium Déménagement International (id: 9) - tous les services
INSERT INTO company_services (company_id, service_id) VALUES (9, 1), (9, 2), (9, 3), (9, 4), (9, 5);

-- Éco-Move Bruxelles (id: 10)
INSERT INTO company_services (company_id, service_id) VALUES (10, 1), (10, 2), (10, 5);

-- Insertion d'avis clients d'exemple
INSERT INTO reviews (company_id, customer_name, rating, comment, approved) VALUES
(1, 'Marie L.', 5, 'Excellent service, équipe professionnelle et rapide. Très satisfaite du déménagement.', 1),
(1, 'Thomas D.', 4, 'Bon rapport qualité/prix. Le déménagement s''est bien passé, quelques petits retards mais rien de grave.', 1),
(1, 'Sophie B.', 5, 'Je recommande vivement ! L''équipe a pris soin de tous mes meubles et objets fragiles.', 1),
(3, 'Jean P.', 5, 'Service impeccable du début à la fin. Vraiment professionnel.', 1),
(3, 'Claire M.', 5, 'Prix élevé mais qualité au rendez-vous. Aucun dommage, tout parfait.', 1),
(5, 'Marc V.', 5, 'Excellente location de lift. Personnel compétent.', 1),
(7, 'Anne D.', 4, 'Bon service, équipe sympathique et efficace.', 1);
