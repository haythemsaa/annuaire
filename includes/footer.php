    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>À propos</h4>
                    <p>Nous sommes le premier annuaire de déménageurs professionnels. Trouvez rapidement et facilement le déménageur idéal pour votre projet.</p>
                </div>
                <div class="footer-col">
                    <h4>Liens utiles</h4>
                    <ul>
                        <li><a href="/index.php">Accueil</a></li>
                        <li><a href="/devis.php">Demander un devis</a></li>
                        <li><a href="/contact.php">Contact</a></li>
                        <li><a href="/admin/">Administration</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="/index.php?service=demenagement">Déménagement résidentiel</a></li>
                        <li><a href="/index.php?service=demenagement">Déménagement professionnel</a></li>
                        <li><a href="/index.php?service=stockage">Stockage</a></li>
                        <li><a href="/index.php?service=lift">Location de lift</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact</h4>
                    <ul>
                        <li><i class="fas fa-phone"></i> <?php echo SITE_PHONE; ?></li>
                        <li><i class="fas fa-envelope"></i> <?php echo SITE_EMAIL; ?></li>
                        <li><i class="fas fa-map-marker-alt"></i> Bruxelles, Belgique</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="<?php echo ASSETS_PATH; ?>/js/main.js"></script>
</body>
</html>
