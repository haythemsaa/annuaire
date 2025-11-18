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
                        <li><a href="/conseils.php">Conseils</a></li>
                        <li><a href="/admin/">Administration</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Outils</h4>
                    <ul>
                        <li><a href="/calculateur.php">Calculateur de prix</a></li>
                        <li><a href="/compare.php">Comparateur d'entreprises</a></li>
                        <li><a href="/checklist.php">Checklist interactive</a></li>
                        <li><a href="/index.php?service=demenagement">Déménagement</a></li>
                        <li><a href="/index.php?service=stockage">Stockage</a></li>
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

    <!-- Widget de contact rapide -->
    <div id="contactWidget" class="contact-widget">
        <button class="contact-widget-button" onclick="toggleContactWidget()">
            <i class="fas fa-comments"></i>
        </button>
        <div class="contact-widget-panel" id="widgetPanel">
            <div class="widget-header">
                <h4><i class="fas fa-headset"></i> Besoin d'aide ?</h4>
                <button onclick="toggleContactWidget()" style="background: none; border: none; color: white; font-size: 1.5rem; cursor: pointer;">×</button>
            </div>
            <div class="widget-content">
                <p style="margin-bottom: 1rem; color: #6b7280;">Nous sommes là pour vous aider !</p>
                <a href="/devis.php" class="btn btn-primary btn-full" style="margin-bottom: 0.5rem;">
                    <i class="fas fa-file-invoice"></i> Demander un devis
                </a>
                <a href="/contact.php" class="btn btn-secondary btn-full" style="margin-bottom: 0.5rem;">
                    <i class="fas fa-envelope"></i> Nous contacter
                </a>
                <a href="tel:<?php echo str_replace(' ', '', SITE_PHONE); ?>" class="btn btn-full" style="background: #10b981; color: white;">
                    <i class="fas fa-phone"></i> <?php echo SITE_PHONE; ?>
                </a>
                <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                    <p style="font-size: 0.875rem; color: #6b7280; margin-bottom: 0.5rem;"><strong>Outils utiles :</strong></p>
                    <a href="/calculateur.php" style="color: #2563eb; font-size: 0.875rem; display: block; margin-bottom: 0.25rem;">
                        <i class="fas fa-calculator"></i> Calculateur de prix
                    </a>
                    <a href="/checklist.php" style="color: #2563eb; font-size: 0.875rem; display: block;">
                        <i class="fas fa-tasks"></i> Checklist interactive
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .contact-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }
        .contact-widget-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
            transition: all 0.3s;
        }
        .contact-widget-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.6);
        }
        .contact-widget-panel {
            position: absolute;
            bottom: 80px;
            right: 0;
            width: 320px;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            display: none;
            flex-direction: column;
            overflow: hidden;
        }
        .contact-widget-panel.active {
            display: flex;
            animation: slideUp 0.3s ease-out;
        }
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .widget-header {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .widget-header h4 {
            margin: 0;
            font-size: 1.125rem;
        }
        .widget-content {
            padding: 1.5rem;
        }
        @media (max-width: 768px) {
            .contact-widget-panel {
                width: 90vw;
                max-width: 320px;
            }
        }
    </style>

    <script>
        function toggleContactWidget() {
            const panel = document.getElementById('widgetPanel');
            panel.classList.toggle('active');
        }

        // Close widget when clicking outside
        document.addEventListener('click', function(event) {
            const widget = document.getElementById('contactWidget');
            const panel = document.getElementById('widgetPanel');
            if (widget && !widget.contains(event.target) && panel.classList.contains('active')) {
                panel.classList.remove('active');
            }
        });
    </script>

    <script src="<?php echo ASSETS_PATH; ?>/js/main.js"></script>
    <script src="<?php echo ASSETS_PATH; ?>/js/favorites.js"></script>
</body>
</html>
