<?php
/**
 * Analytics et Tracking
 * Inclut Google Analytics, Facebook Pixel et tracking interne
 */
?>

<!-- Google Analytics 4 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  // Configuration Google Analytics
  gtag('config', 'G-XXXXXXXXXX', {
    'anonymize_ip': true,
    'cookie_flags': 'SameSite=None;Secure'
  });

  // Configuration optimisée pour les conversions
  gtag('config', 'AW-XXXXXXXXX'); // Google Ads Conversion Tracking
</script>

<!-- Facebook Pixel -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', 'XXXXXXXXXXXXXXX'); // Remplacer par votre Pixel ID
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=XXXXXXXXXXXXXXX&ev=PageView&noscript=1"/>
</noscript>

<!-- Hotjar Tracking (Heatmaps et enregistrements) -->
<script>
(function(h,o,t,j,a,r){
    h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
    h._hjSettings={hjid:XXXXXXX,hjsv:6}; // Remplacer par votre Hotjar ID
    a=o.getElementsByTagName('head')[0];
    r=o.createElement('script');r.async=1;
    r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
    a.appendChild(r);
})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<!-- Tracking Interne des Événements -->
<script>
// Système de tracking interne pour analytics avancées
const InternalTracking = {

    // Track des clics sur boutons importants
    trackButton: function(category, action, label) {
        // Google Analytics
        if (typeof gtag !== 'undefined') {
            gtag('event', action, {
                'event_category': category,
                'event_label': label
            });
        }

        // Facebook Pixel
        if (typeof fbq !== 'undefined') {
            fbq('track', action, {category: category, label: label});
        }

        // Tracking API interne
        this.sendToAPI(category, action, label);
    },

    // Envoyer à l'API interne pour base de données
    sendToAPI: function(category, action, label) {
        fetch('/api/track-event.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                category: category,
                action: action,
                label: label,
                page: window.location.pathname,
                referrer: document.referrer,
                timestamp: new Date().toISOString()
            })
        }).catch(err => console.log('Tracking error:', err));
    },

    // Track des formulaires soumis
    trackFormSubmit: function(formName) {
        this.trackButton('Form', 'Submit', formName);
    },

    // Track des liens externes
    trackExternalLink: function(url) {
        this.trackButton('External Link', 'Click', url);
    },

    // Track du scroll profond (engagement)
    trackDeepScroll: function() {
        let deepScrollTracked = false;
        window.addEventListener('scroll', function() {
            const scrollPercentage = (window.scrollY + window.innerHeight) / document.body.scrollHeight * 100;
            if (scrollPercentage > 75 && !deepScrollTracked) {
                InternalTracking.trackButton('Engagement', 'Deep Scroll', '75%');
                deepScrollTracked = true;
            }
        });
    },

    // Track du temps passé sur la page
    trackTimeOnPage: function() {
        const startTime = Date.now();
        window.addEventListener('beforeunload', function() {
            const timeSpent = Math.round((Date.now() - startTime) / 1000); // En secondes
            if (timeSpent > 10) { // Ne track que si > 10 secondes
                InternalTracking.trackButton('Engagement', 'Time on Page', timeSpent + 's');
            }
        });
    }
};

// Initialisation automatique
document.addEventListener('DOMContentLoaded', function() {

    // Track du scroll profond
    InternalTracking.trackDeepScroll();

    // Track du temps passé
    InternalTracking.trackTimeOnPage();

    // Track des clics sur les boutons de devis
    document.querySelectorAll('a[href*="devis"], button[type="submit"]').forEach(btn => {
        btn.addEventListener('click', function() {
            const text = this.textContent.trim();
            InternalTracking.trackButton('CTA', 'Click', text);
        });
    });

    // Track des clics sur numéros de téléphone
    document.querySelectorAll('a[href^="tel:"]').forEach(tel => {
        tel.addEventListener('click', function() {
            InternalTracking.trackButton('Contact', 'Phone Click', this.href);

            // Conversion Google Ads
            if (typeof gtag !== 'undefined') {
                gtag('event', 'conversion', {
                    'send_to': 'AW-XXXXXXXXX/XXXXXXXXXXXXX', // Remplacer
                    'value': 1.0,
                    'currency': 'EUR'
                });
            }
        });
    });

    // Track des clics sur emails
    document.querySelectorAll('a[href^="mailto:"]').forEach(email => {
        email.addEventListener('click', function() {
            InternalTracking.trackButton('Contact', 'Email Click', this.href);
        });
    });

    // Track des téléchargements de PDF
    document.querySelectorAll('a[href$=".pdf"]').forEach(pdf => {
        pdf.addEventListener('click', function() {
            InternalTracking.trackButton('Download', 'PDF', this.href);
        });
    });

    // Track des liens externes
    document.querySelectorAll('a[href^="http"]').forEach(link => {
        if (!link.href.includes(window.location.hostname)) {
            link.addEventListener('click', function() {
                InternalTracking.trackExternalLink(this.href);
            });
        }
    });

    // Track des favoris
    if (typeof window.favoriteSystem !== 'undefined') {
        const originalAddFavorite = window.favoriteSystem.addFavorite;
        window.favoriteSystem.addFavorite = function(companyId) {
            InternalTracking.trackButton('Favorites', 'Add', 'Company ' + companyId);
            return originalAddFavorite.call(this, companyId);
        };
    }

    // Track de la recherche
    document.querySelectorAll('form[action*="search"], form#searchForm').forEach(form => {
        form.addEventListener('submit', function() {
            const query = this.querySelector('input[type="search"], input[name="q"], input[name="search"]')?.value;
            if (query) {
                InternalTracking.trackButton('Search', 'Query', query);
            }
        });
    });

});

// Fonction globale pour tracker manuellement des événements custom
window.trackEvent = function(category, action, label) {
    InternalTracking.trackButton(category, action, label);
};

// Track des erreurs JavaScript (pour debugging)
window.addEventListener('error', function(e) {
    if (typeof gtag !== 'undefined') {
        gtag('event', 'exception', {
            'description': e.message,
            'fatal': false
        });
    }
});
</script>

<!-- Cookie Consent (RGPD) -->
<style>
#cookieConsent {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
    color: white;
    padding: 20px;
    z-index: 9999;
    box-shadow: 0 -4px 12px rgba(0,0,0,0.3);
    display: none;
}

#cookieConsent.show {
    display: block;
    animation: slideUp 0.5s ease;
}

@keyframes slideUp {
    from { transform: translateY(100%); }
    to { transform: translateY(0); }
}

#cookieConsent .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    gap: 20px;
    flex-wrap: wrap;
}

#cookieConsent p {
    margin: 0;
    flex: 1;
    min-width: 300px;
}

#cookieConsent .buttons {
    display: flex;
    gap: 10px;
}

#cookieConsent button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 600;
    transition: opacity 0.3s ease;
}

#cookieConsent button:hover {
    opacity: 0.9;
}

#cookieConsent .btn-accept {
    background: #10b981;
    color: white;
}

#cookieConsent .btn-refuse {
    background: #6b7280;
    color: white;
}
</style>

<div id="cookieConsent">
    <div class="container">
        <p>
            <i class="fas fa-cookie-bite"></i>
            Nous utilisons des cookies pour améliorer votre expérience, analyser notre trafic et personnaliser le contenu.
            En continuant à utiliser ce site, vous acceptez notre utilisation des cookies.
            <a href="/politique-confidentialite.php" style="color: #60a5fa; text-decoration: underline;">En savoir plus</a>
        </p>
        <div class="buttons">
            <button class="btn-accept" onclick="acceptCookies()">
                <i class="fas fa-check"></i> J'accepte
            </button>
            <button class="btn-refuse" onclick="refuseCookies()">
                <i class="fas fa-times"></i> Refuser
            </button>
        </div>
    </div>
</div>

<script>
// Gestion du consentement cookies
function acceptCookies() {
    localStorage.setItem('cookieConsent', 'accepted');
    document.getElementById('cookieConsent').classList.remove('show');

    // Activer les scripts de tracking (si désactivés par défaut)
    enableTracking();

    // Track l'acceptation
    trackEvent('Cookie Consent', 'Accept', 'User accepted cookies');
}

function refuseCookies() {
    localStorage.setItem('cookieConsent', 'refused');
    document.getElementById('cookieConsent').classList.remove('show');

    // Track le refus
    trackEvent('Cookie Consent', 'Refuse', 'User refused cookies');

    // Désactiver le tracking
    disableTracking();
}

function enableTracking() {
    // Activer Google Analytics
    window['ga-disable-G-XXXXXXXXXX'] = false;
}

function disableTracking() {
    // Désactiver Google Analytics
    window['ga-disable-G-XXXXXXXXXX'] = true;
}

// Vérifier le consentement au chargement
window.addEventListener('load', function() {
    const consent = localStorage.getItem('cookieConsent');
    if (!consent) {
        // Afficher le bandeau après 2 secondes
        setTimeout(function() {
            document.getElementById('cookieConsent').classList.add('show');
        }, 2000);
    } else if (consent === 'refused') {
        disableTracking();
    }
});
</script>

<!-- Schema.org Organization (SEO) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "<?= SITE_NAME ?>",
  "url": "https://<?= $_SERVER['HTTP_HOST'] ?>",
  "logo": "https://<?= $_SERVER['HTTP_HOST'] ?>/assets/images/logo.png",
  "description": "Comparateur de déménageurs en Belgique - Trouvez les meilleurs professionnels",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Rue de la Loi 123",
    "addressLocality": "Bruxelles",
    "postalCode": "1000",
    "addressCountry": "BE"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "<?= SITE_PHONE ?>",
    "contactType": "Customer Service",
    "areaServed": "BE",
    "availableLanguage": ["French", "Dutch", "English"]
  },
  "sameAs": [
    "https://www.facebook.com/votreprofil",
    "https://www.linkedin.com/company/votreprofil",
    "https://twitter.com/votreprofil"
  ]
}
</script>
