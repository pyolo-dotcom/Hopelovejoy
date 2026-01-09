<footer class="site-footer">
    <div class="footer-container">
        <!-- Main Footer Content -->
        <div class="footer-content">
            <!-- Logo Section -->
            <div class="footer-col logo-section">
                <div class="footer-logo-wrapper">
                    <div class="footer-logo">
                        <img src="img/logo.png" alt="Hope Account Specialist Logo">
                    </div>
                </div>
                <h3 class="company-name">Hope Account Specialist</h3>
                <p class="tagline">Making your dreams turn into reality.</p>
                <p class="company-mission">Your trusted partner in financial solutions and dream realization.</p>
            </div>

            <!-- Quick Links -->
            <div class="footer-col">
                <h4 class="footer-title">
                    <i class="fas fa-link"></i>
                    <span>Quick Links</span>
                </h4>
                <ul class="footer-links">
                    <li><a href="index.php"><i class="fas fa-chevron-right"></i> Home</a></li>
                    <li><a href="team.php"><i class="fas fa-chevron-right"></i> Our Team</a></li>
                    <li><a href="services.php"><i class="fas fa-chevron-right"></i> Services</a></li>
                    <li><a href="contact.php"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-col">
                <h4 class="footer-title">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Contact Info</span>
                </h4>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <strong>Address:</strong>
                            <p>Brgy. Concepcion, Maharlika Hi-way<br>Cabanatuan City, Nueva Ecija</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <strong>Phone:</strong>
                            <p>(02) 8123-4567</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-mobile-alt"></i>
                        <div>
                            <strong>Mobile:</strong>
                            <p>(+63) 917-123-4567</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email:</strong>
                            <p>hopeacct2022@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <strong>Business Hours:</strong>
                            <p>Mon-Fri: 9:00 AM - 6:00 PM<br>Sat: 9:00 AM - 1:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter & Social -->
            <div class="footer-col">
                <h4 class="footer-title">
                    <i class="fas fa-newspaper"></i>
                    <span>Stay Updated</span>
                </h4>
                <p class="newsletter-desc">Subscribe to our newsletter for financial tips and updates.</p>
                
                <form class="newsletter-form">
                    <div class="input-group">
                        <input type="email" placeholder="Enter your email" required>
                        <button type="submit" class="subscribe-btn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <div class="form-notice">
                        <i class="fas fa-info-circle"></i>
                        <small>We respect your privacy. Unsubscribe anytime.</small>
                    </div>
                </form>

                <div class="social-section">
                    <h5>Follow Us</h5>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/HopeAccountSpecialist2022" target="_blank" rel="noopener noreferrer" 
                           class="social-icon facebook" aria-label="Facebook">
                           <i class="fab fa-facebook-f"></i>
                           <span class="tooltip">Facebook</span>
                        </a>
                        <a href="https://twitter.com/hopeaccountspec" target="_blank" rel="noopener noreferrer" 
                           class="social-icon twitter" aria-label="Twitter">
                           <i class="fab fa-twitter"></i>
                           <span class="tooltip">Twitter</span>
                        </a>
                        <a href="https://linkedin.com/company/hope-account-specialist" target="_blank" rel="noopener noreferrer" 
                           class="social-icon linkedin" aria-label="LinkedIn">
                           <i class="fab fa-linkedin-in"></i>
                           <span class="tooltip">LinkedIn</span>
                        </a>
                        <a href="https://instagram.com/hopeaccountspecialist" target="_blank" rel="noopener noreferrer" 
                           class="social-icon instagram" aria-label="Instagram">
                           <i class="fab fa-instagram"></i>
                           <span class="tooltip">Instagram</span>
                        </a>
                        <a href="https://youtube.com/c/HopeAccountSpecialist" target="_blank" rel="noopener noreferrer" 
                           class="social-icon youtube" aria-label="YouTube">
                           <i class="fab fa-youtube"></i>
                           <span class="tooltip">YouTube</span>
                        </a>
                        <a href="mailto:hopeacct2022@gmail.com" class="social-icon email" aria-label="Email">
                           <i class="fas fa-envelope"></i>
                           <span class="tooltip">Email</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <p class="copyright">
                    &copy; <span id="current-year"><?php echo date('Y'); ?></span> Hope Account Specialist. All rights reserved.
                </p>
                <div class="back-to-top">
                    <a href="#top" class="back-to-top-btn" aria-label="Back to top">
                        <i class="fas fa-chevron-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Import Font Awesome */
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    
    /* Root Variables */
    :root {
        --primary-color: #eeb82e;
        --secondary-color: #2c2b29;
        --dark-bg: #1a1a1a;
        --light-bg: #302f2d;
        --text-light: #ffffff;
        --text-gray: #cccccc;
        --text-dark: #666666;
        --accent-color: #3a3835;
        --shadow: 0 4px 20px rgba(0,0,0,0.2);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --border-radius: 8px;
    }

    /* Footer Styling */
    .site-footer {
        background: linear-gradient(135deg, var(--dark-bg) 0%, var(--light-bg) 100%);
        color: var(--text-gray);
        padding: 70px 0 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-top: auto;
        position: relative;
        overflow: hidden;
    }

    .site-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color) 0%, transparent 100%);
    }

    .footer-container {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 30px;
    }

    /* Footer Content Layout */
    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 40px;
        margin-bottom: 60px;
    }

    /* Footer Columns */
    .footer-col {
        padding: 0 15px;
    }

    /* Logo Section */
    .logo-section {
        text-align: center;
    }

    .footer-logo-wrapper {
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
    }

    .footer-logo {
        width: 120px;
        height: 120px;
        background: var(--light-bg);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        border: 3px solid var(--primary-color);
        box-shadow: var(--shadow);
        overflow: hidden;
        position: relative;
    }

    .footer-logo::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(238,184,46,0.1) 0%, transparent 70%);
    }

    .footer-logo img {
        width: 80px;
        height: auto;
        position: relative;
        z-index: 1;
    }

    .company-name {
        color: var(--text-light);
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .tagline {
        color: var(--primary-color);
        font-size: 1rem;
        font-weight: 500;
        margin-bottom: 10px;
        font-style: italic;
    }

    .company-mission {
        color: var(--text-gray);
        font-size: 0.9rem;
        line-height: 1.6;
        margin-top: 15px;
    }

    /* Footer Titles */
    .footer-title {
        color: var(--text-light);
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 25px;
        padding-bottom: 10px;
        position: relative;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .footer-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 2px;
        background: var(--primary-color);
    }

    .footer-title i {
        color: var(--primary-color);
        font-size: 1rem;
    }

    /* Quick Links */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 12px;
    }

    .footer-links a {
        color: var(--text-gray);
        text-decoration: none;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 0;
        transition: var(--transition);
        border-radius: 4px;
    }

    .footer-links a i {
        color: var(--primary-color);
        font-size: 0.8rem;
        transition: var(--transition);
    }

    .footer-links a:hover {
        color: var(--text-light);
        background: rgba(238,184,46,0.1);
        padding-left: 10px;
    }

    .footer-links a:hover i {
        transform: translateX(5px);
    }

    /* Contact Info */
    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
    }

    .contact-item i {
        color: var(--primary-color);
        font-size: 1.1rem;
        margin-top: 3px;
        min-width: 20px;
    }

    .contact-item div {
        flex: 1;
    }

    .contact-item strong {
        color: var(--text-light);
        font-weight: 600;
        display: block;
        margin-bottom: 5px;
        font-size: 0.95rem;
    }

    .contact-item p {
        color: var(--text-gray);
        font-size: 0.9rem;
        line-height: 1.6;
        margin: 0;
    }

    /* Newsletter */
    .newsletter-desc {
        color: var(--text-gray);
        font-size: 0.9rem;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .newsletter-form {
        margin-bottom: 30px;
    }

    .input-group {
        display: flex;
        background: var(--accent-color);
        border-radius: var(--border-radius);
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.1);
    }

    .input-group input {
        flex: 1;
        padding: 12px 15px;
        background: transparent;
        border: none;
        color: var(--text-light);
        font-size: 0.95rem;
    }

    .input-group input:focus {
        outline: none;
    }

    .input-group input::placeholder {
        color: var(--text-gray);
    }

    .subscribe-btn {
        background: var(--primary-color);
        color: var(--secondary-color);
        border: none;
        padding: 0 20px;
        cursor: pointer;
        transition: var(--transition);
        font-weight: 600;
    }

    .subscribe-btn:hover {
        background: #ffcc33;
    }

    .form-notice {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 10px;
        color: var(--text-dark);
        font-size: 0.8rem;
    }

    .form-notice i {
        color: var(--primary-color);
    }

    /* Social Section */
    .social-section h5 {
        color: var(--text-light);
        font-size: 1rem;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .social-icons {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .social-icon {
        position: relative;
        width: 40px;
        height: 40px;
        background: var(--accent-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-light);
        text-decoration: none;
        transition: var(--transition);
        font-size: 1.1rem;
    }

    .social-icon:hover {
        transform: translateY(-5px);
    }

    .social-icon .tooltip {
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: var(--primary-color);
        color: var(--secondary-color);
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 0.8rem;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: var(--transition);
        margin-bottom: 10px;
        font-weight: 600;
    }

    .social-icon:hover .tooltip {
        opacity: 1;
        visibility: visible;
    }

    .social-icon.facebook:hover { background: #1877f2; }
    .social-icon.twitter:hover { background: #1da1f2; }
    .social-icon.linkedin:hover { background: #0077b5; }
    .social-icon.instagram:hover { background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d); }
    .social-icon.youtube:hover { background: #ff0000; }
    .social-icon.email:hover { background: #ea4335; }

    /* Footer Bottom */
    .footer-bottom {
        background: rgba(0,0,0,0.3);
        padding: 20px 0;
        border-top: 1px solid rgba(255,255,255,0.1);
    }

    .footer-bottom-content {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .copyright {
        color: var(--text-gray);
        font-size: 0.9rem;
    }

    #current-year {
        color: var(--primary-color);
        font-weight: 600;
    }

    /* Payment Methods */
    .payment-methods {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .payment-methods span {
        color: var(--text-gray);
        font-size: 0.9rem;
    }

    .payment-icons {
        display: flex;
        gap: 10px;
    }

    .payment-icons i {
        color: var(--text-gray);
        font-size: 1.5rem;
        transition: var(--transition);
        cursor: pointer;
    }

    .payment-icons i:hover {
        color: var(--primary-color);
        transform: translateY(-2px);
    }

    /* Back to Top */
    .back-to-top-btn {
        width: 45px;
        height: 45px;
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--secondary-color);
        text-decoration: none;
        transition: var(--transition);
        box-shadow: var(--shadow);
    }

    .back-to-top-btn:hover {
        background: #ffcc33;
        transform: translateY(-3px);
    }

    /* Mobile Responsive */
    @media screen and (max-width: 1024px) {
        .footer-content {
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }
        
        .footer-bottom-content {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
    }

    @media screen and (max-width: 768px) {
        .site-footer {
            padding: 50px 0 0;
        }
        
        .footer-container {
            padding: 0 20px;
        }
        
        .footer-content {
            grid-template-columns: 1fr;
            gap: 40px;
        }
        
        .footer-col {
            padding: 0;
        }
        
        .footer-logo {
            width: 100px;
            height: 100px;
        }
        
        .footer-logo img {
            width: 65px;
        }
        
        .company-name {
            font-size: 1.2rem;
        }
    }

    @media screen and (max-width: 480px) {
        .site-footer {
            padding: 40px 0 0;
        }
        
        .footer-container {
            padding: 0 15px;
        }
        
        .contact-item {
            flex-direction: column;
            gap: 5px;
        }
        
        .contact-item i {
            margin-top: 0;
        }
        
        .social-icons {
            justify-content: center;
        }
        
        .payment-methods {
            flex-direction: column;
            gap: 10px;
        }
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .footer-col {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .footer-col:nth-child(1) { animation-delay: 0.1s; }
    .footer-col:nth-child(2) { animation-delay: 0.2s; }
    .footer-col:nth-child(3) { animation-delay: 0.3s; }
    .footer-col:nth-child(4) { animation-delay: 0.4s; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update current year
        const yearElement = document.getElementById('current-year');
        if (yearElement) {
            yearElement.textContent = new Date().getFullYear();
        }

        // Newsletter form submission
        const newsletterForm = document.querySelector('.newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const emailInput = this.querySelector('input[type="email"]');
                const email = emailInput.value.trim();
                
                if (email) {
                    // Simple validation
                    if (validateEmail(email)) {
                        // Show success message (in real implementation, this would send to server)
                        emailInput.value = '';
                        showNotification('Thank you for subscribing!', 'success');
                    } else {
                        showNotification('Please enter a valid email address.', 'error');
                    }
                }
            });
        }

        // Back to top button
        const backToTopBtn = document.querySelector('.back-to-top-btn');
        if (backToTopBtn) {
            backToTopBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        // Email validation function
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Notification function
        function showNotification(message, type) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                <span>${message}</span>
            `;
            
            // Style the notification
            Object.assign(notification.style, {
                position: 'fixed',
                bottom: '20px',
                right: '20px',
                background: type === 'success' ? '#4CAF50' : '#f44336',
                color: 'white',
                padding: '15px 20px',
                borderRadius: '4px',
                display: 'flex',
                alignItems: 'center',
                gap: '10px',
                zIndex: '9999',
                animation: 'slideInRight 0.3s ease-out'
            });
            
            // Add to document
            document.body.appendChild(notification);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.style.animation = 'slideOutRight 0.3s ease-out forwards';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Add CSS for notification animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOutRight {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    });
</script>