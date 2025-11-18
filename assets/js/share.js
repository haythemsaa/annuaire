/**
 * Social Media Sharing Functionality
 */

// Share on Facebook
function shareOnFacebook(url, title) {
    const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}&quote=${encodeURIComponent(title)}`;
    openShareWindow(shareUrl, 'Facebook');
}

// Share on Twitter
function shareOnTwitter(url, title) {
    const shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`;
    openShareWindow(shareUrl, 'Twitter');
}

// Share on LinkedIn
function shareOnLinkedIn(url, title) {
    const shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`;
    openShareWindow(shareUrl, 'LinkedIn');
}

// Share on WhatsApp
function shareOnWhatsApp(url, title) {
    const text = `${title} - ${url}`;
    const shareUrl = `https://wa.me/?text=${encodeURIComponent(text)}`;
    openShareWindow(shareUrl, 'WhatsApp');
}

// Share via Email
function shareViaEmail(url, title, body) {
    const subject = encodeURIComponent(title);
    const emailBody = encodeURIComponent(`${body}\n\n${url}`);
    window.location.href = `mailto:?subject=${subject}&body=${emailBody}`;
}

// Copy link to clipboard
function copyToClipboard(url) {
    // Create temporary input
    const tempInput = document.createElement('input');
    tempInput.value = url;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); // For mobile devices

    try {
        document.execCommand('copy');
        showShareNotification('Lien copié dans le presse-papiers !', 'success');
    } catch (err) {
        showShareNotification('Erreur lors de la copie', 'error');
    }

    document.body.removeChild(tempInput);
}

// Open share window
function openShareWindow(url, platform) {
    const width = 600;
    const height = 400;
    const left = (screen.width / 2) - (width / 2);
    const top = (screen.height / 2) - (height / 2);

    window.open(
        url,
        `share-${platform}`,
        `width=${width},height=${height},left=${left},top=${top},toolbar=0,status=0,resizable=1`
    );
}

// Show notification
function showShareNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `share-notification share-notification-${type}`;
    notification.innerHTML = `
        <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-info-circle'}"></i>
        <span>${message}</span>
    `;

    notification.style.cssText = `
        position: fixed;
        bottom: 80px;
        right: 20px;
        background: ${type === 'success' ? '#d1fae5' : '#fee2e2'};
        color: ${type === 'success' ? '#065f46' : '#991b1b'};
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        z-index: 10000;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        animation: slideInUp 0.3s ease-out;
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.animation = 'slideOutDown 0.3s ease-out';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Add CSS animations
const shareStyle = document.createElement('style');
shareStyle.textContent = `
    @keyframes slideInUp {
        from {
            transform: translateY(100px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    @keyframes slideOutDown {
        from {
            transform: translateY(0);
            opacity: 1;
        }
        to {
            transform: translateY(100px);
            opacity: 0;
        }
    }

    .share-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        align-items: center;
    }

    .share-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1rem;
        color: white;
    }

    .share-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .share-btn-facebook {
        background: #1877f2;
    }

    .share-btn-twitter {
        background: #1da1f2;
    }

    .share-btn-linkedin {
        background: #0a66c2;
    }

    .share-btn-whatsapp {
        background: #25d366;
    }

    .share-btn-email {
        background: #6b7280;
    }

    .share-btn-copy {
        background: #8b5cf6;
    }

    .share-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #6b7280;
        margin-right: 0.5rem;
    }
`;
document.head.appendChild(shareStyle);

// Export functions for global use
window.shareSystem = {
    facebook: shareOnFacebook,
    twitter: shareOnTwitter,
    linkedin: shareOnLinkedIn,
    whatsapp: shareOnWhatsApp,
    email: shareViaEmail,
    copy: copyToClipboard
};
