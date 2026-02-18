<footer class="site-footer">
    <div class="footer-container">
        <!-- Main Footer Content -->
        <div class="footer-content">
            <!-- Logo Section -->
            <div class="footer-col logo-section fade-in">
                <div class="footer-logo-wrapper">
                    <div class="footer-logo">
                        <img src="img/logo.png" alt="Hope Account Specialist Logo">
                    </div>
                </div>
                <h3 class="company-name slide-up">Hope Account Specialist</h3>
                <p class="tagline slide-up">Making your dreams turn into reality.</p>
                <p class="company-mission slide-up">Your trusted partner in financial solutions and dream realization.</p>
            </div>

            <!-- Quick Links -->
            <div class="footer-col fade-in-left">
                <h4 class="footer-title">
                    <i class="fas fa-link"></i>
                    <span>Quick Links</span>
                </h4>
                <ul class="footer-links stagger-children">
                    <li><a href="index.php"><i class="fas fa-chevron-right"></i> Home</a></li>
                    <li><a href="team.php"><i class="fas fa-chevron-right"></i> Our Team</a></li>
                    <li><a href="services.php"><i class="fas fa-chevron-right"></i> Services</a></li>
                    <li><a href="contact.php"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-col fade-in">
                <h4 class="footer-title">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Contact Info</span>
                </h4>
                <div class="contact-info-footer stagger-children">
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
                            <p>Hopeacct2022@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <strong>Business Hours:</strong>
                            <p>Mon-Fri: 8:00 AM - 5:00 PM<br>Sat: TBA</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter & Social -->
            <div class="footer-col fade-in-right">
                <div class="social-section zoom-in">
                    <h5>Follow Us</h5>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/HopeAccountSpecialist2022" target="_blank" rel="noopener noreferrer" 
                           class="social-icon facebook" aria-label="Facebook">
                           <i class="fab fa-facebook-f"></i>
                           <span class="tooltip">Facebook</span>
                        </a>
                        <a href="mailto:Hopeacct2022@gmail.com" class="social-icon email" aria-label="Email">
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
                    <a href="#" id="back-to-top-btn" class="back-to-top-btn pulse" aria-label="Back to top">
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
        width: 100%;
        clear: both;
    }

    .site-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color) 0%, transparent 100%);
        animation: slideInLine 1s ease-out;
    }

    @keyframes slideInLine {
        from {
            transform: translateX(-100%);
        }
        to {
            transform: translateX(0);
        }
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
        transition: var(--transition);
        animation: rotateIn 0.8s ease-out;
    }

    .footer-logo:hover {
        transform: scale(1.05) rotate(5deg);
        border-color: #ffd966;
        box-shadow: 0 0 30px rgba(238, 184, 46, 0.5);
    }

    @keyframes rotateIn {
        from {
            opacity: 0;
            transform: rotate(-180deg) scale(0.5);
        }
        to {
            opacity: 1;
            transform: rotate(0) scale(1);
        }
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
        animation: pulseGlow 2s infinite;
    }

    @keyframes pulseGlow {
        0%, 100% {
            opacity: 0.5;
        }
        50% {
            opacity: 1;
        }
    }

    .footer-logo img {
        width: 80px;
        height: auto;
        position: relative;
        z-index: 1;
        transition: var(--transition);
    }

    .footer-logo:hover img {
        transform: scale(1.1);
    }

    .company-name {
        color: var(--text-light);
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        display: inline-block;
    }

    .company-name::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background: var(--primary-color);
        transition: width 0.3s ease;
    }

    .logo-section:hover .company-name::after {
        width: 80%;
    }

    .tagline {
        color: var(--primary-color);
        font-size: 1rem;
        font-weight: 500;
        margin-bottom: 10px;
        font-style: italic;
        transition: var(--transition);
    }

    .logo-section:hover .tagline {
        transform: scale(1.05);
        color: #ffd966;
    }

    .company-mission {
        color: var(--text-gray);
        font-size: 0.9rem;
        line-height: 1.6;
        margin-top: 15px;
        transition: var(--transition);
    }

    .logo-section:hover .company-mission {
        color: var(--text-light);
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
        transition: var(--transition);
    }

    .footer-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 2px;
        background: var(--primary-color);
        transition: width 0.3s ease;
    }

    .footer-col:hover .footer-title::after {
        width: 60px;
    }

    .footer-title i {
        color: var(--primary-color);
        font-size: 1rem;
        transition: var(--transition);
    }

    .footer-col:hover .footer-title i {
        transform: rotate(360deg);
    }

    /* Quick Links */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 12px;
        transition: var(--transition);
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
        padding-left: 15px;
        transform: translateX(5px);
    }

    .footer-links a:hover i {
        transform: translateX(8px) scale(1.2);
    }

    /* Contact Info */
    .contact-info-footer {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        transition: var(--transition);
        padding: 5px;
        border-radius: var(--border-radius);
    }

    .contact-item:hover {
        background: rgba(238,184,46,0.1);
        transform: translateX(10px);
    }

    .contact-item i {
        color: var(--primary-color);
        font-size: 1.1rem;
        margin-top: 3px;
        min-width: 20px;
        transition: var(--transition);
    }

    .contact-item:hover i {
        transform: scale(1.2) rotate(360deg);
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
        transition: var(--transition);
    }

    .contact-item:hover p {
        color: var(--text-light);
    }

    /* Social Section */
    .social-section h5 {
        color: var(--text-light);
        font-size: 1rem;
        margin-bottom: 15px;
        font-weight: 600;
        position: relative;
        display: inline-block;
    }

    .social-section h5::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary-color);
        transition: width 0.3s ease;
    }

    .social-section:hover h5::after {
        width: 100%;
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
        animation: bounceIn 0.5s ease-out;
    }

    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }
        50% {
            transform: scale(1.05);
        }
        70% {
            transform: scale(0.9);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .social-icon:hover {
        transform: translateY(-5px) scale(1.1);
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
        transform: translateX(-50%) translateY(-5px);
    }

    .social-icon.facebook:hover { background: #1877f2; }
    .social-icon.email:hover { background: #ea4335; }

    /* ========== FIXED BACK TO TOP BUTTON WITH PERFECT ARROW ALIGNMENT ========== */
    .footer-bottom {
        background: rgba(0,0,0,0.3);
        padding: 20px 0;
        border-top: 1px solid rgba(255,255,255,0.1);
        position: relative;
        overflow: hidden;
        width: 100%;
        clear: both;
        z-index: 10;
    }

    .footer-bottom::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(238,184,46,0.1), transparent);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        100% {
            left: 100%;
        }
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
        position: relative;
        z-index: 15;
    }

    .copyright {
        color: var(--text-gray);
        font-size: 0.9rem;
        transition: var(--transition);
        margin: 0;
        line-height: 1.5;
    }

    .copyright:hover {
        color: var(--text-light);
        transform: translateX(5px);
    }

    #current-year {
        color: var(--primary-color);
        font-weight: 600;
        transition: var(--transition);
    }

    .copyright:hover #current-year {
        transform: scale(1.1);
        display: inline-block;
    }

    /* BACK TO TOP BUTTON - PERFECTLY ALIGNED ARROW */
    .back-to-top {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        position: relative !important;
        z-index: 1000 !important;
        margin: 0 !important;
        padding: 0 !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    .back-to-top-btn {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 45px !important;
        height: 45px !important;
        background-color: #eeb82e !important;
        border-radius: 50% !important;
        color: #2c2b29 !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2) !important;
        opacity: 1 !important;
        visibility: visible !important;
        cursor: pointer !important;
        border: 2px solid rgba(255,255,255,0.2) !important;
        /* Remove any default padding/margin that might affect alignment */
        padding: 0 !important;
        margin: 0 !important;
        /* Ensure perfect centering */
        text-align: center !important;
        line-height: 1 !important;
    }

    .back-to-top-btn i {
        display: inline-block !important;
        font-size: 22px !important;
        color: #2c2b29 !important;
        transition: transform 0.3s ease !important;
        /* Perfectly center the arrow */
        line-height: 1 !important;
        vertical-align: middle !important;
        /* Remove any inherited styles */
        margin: 0 !important;
        padding: 0 !important;
        /* Ensure arrow points up correctly */
        transform: rotate(0deg) !important;
        /* Fix for Font Awesome alignment */
        position: relative !important;
        top: -1px !important; /* Fine-tune vertical alignment */
    }

    .back-to-top-btn:hover {
        background-color: #ffcc33 !important;
        transform: translateY(-8px) scale(1.1) !important;
        box-shadow: 0 8px 25px rgba(238,184,46,0.4) !important;
        border-color: rgba(255,255,255,0.4) !important;
    }

    .back-to-top-btn:hover i {
        transform: translateY(-3px) !important;
    }

    /* Pulse animation */
    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 4px 20px rgba(238,184,46,0.2);
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 8px 30px rgba(238,184,46,0.4);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 4px 20px rgba(238,184,46,0.2);
        }
    }

    .pulse {
        animation: pulse 2s infinite !important;
    }

    /* SCROLL ANIMATION CLASSES */
    .fade-in {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .fade-in.active {
        opacity: 1;
        transform: translateY(0);
    }

    .fade-in-left {
        opacity: 0;
        transform: translateX(-50px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .fade-in-left.active {
        opacity: 1;
        transform: translateX(0);
    }

    .fade-in-right {
        opacity: 0;
        transform: translateX(50px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .fade-in-right.active {
        opacity: 1;
        transform: translateX(0);
    }

    .zoom-in {
        opacity: 0;
        transform: scale(0.9);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .zoom-in.active {
        opacity: 1;
        transform: scale(1);
    }

    .rotate-in {
        opacity: 0;
        transform: rotate(-5deg) scale(0.9);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .rotate-in.active {
        opacity: 1;
        transform: rotate(0) scale(1);
    }

    .slide-up {
        opacity: 0;
        transform: translateY(60px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .slide-up.active {
        opacity: 1;
        transform: translateY(0);
    }

    /* Stagger animations for children */
    .stagger-children > * {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .stagger-children.active > *:nth-child(1) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.1s;
    }

    .stagger-children.active > *:nth-child(2) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.2s;
    }

    .stagger-children.active > *:nth-child(3) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.3s;
    }

    .stagger-children.active > *:nth-child(4) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.4s;
    }

    .stagger-children.active > *:nth-child(5) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.5s;
    }

    .stagger-children.active > *:nth-child(6) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.6s;
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
        
        .footer-logo-wrapper {
            animation: none;
        }
        
        .contact-item:hover {
            transform: none;
        }

        /* Back to top mobile adjustments */
        .back-to-top-btn {
            width: 40px !important;
            height: 40px !important;
        }
        
        .back-to-top-btn i {
            font-size: 20px !important;
            top: 0px !important; /* Adjust for mobile */
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
        
        .footer-logo {
            width: 90px;
            height: 90px;
        }
        
        .footer-logo img {
            width: 55px;
        }
        
        .back-to-top-btn {
            width: 35px !important;
            height: 35px !important;
        }
        
        .back-to-top-btn i {
            font-size: 18px !important;
            top: 0px !important;
        }
    }

    /* Emergency fix para siguradong perfect ang alignment */
    .back-to-top,
    .back-to-top-btn,
    .back-to-top-btn i {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        opacity: 1 !important;
        visibility: visible !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update current year
        const yearElement = document.getElementById('current-year');
        if (yearElement) {
            yearElement.textContent = new Date().getFullYear();
        }

        // BACK TO TOP FUNCTIONALITY - WITH PERFECT ARROW
        const backToTopBtn = document.getElementById('back-to-top-btn');
        
        if (backToTopBtn) {
            // Remove href attribute to prevent page jump
            backToTopBtn.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Smooth scroll to top
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Optional: Add a little visual feedback on scroll
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopBtn.style.opacity = '1';
                } else {
                    // Keep it visible always, but you can adjust opacity if desired
                    // backToTopBtn.style.opacity = '0.8';
                }
            });
        }

        // SCROLL ANIMATION FUNCTIONALITY
        const animatedElements = document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right, .zoom-in, .rotate-in, .slide-up, .stagger-children');
        
        function checkScroll() {
            const windowHeight = window.innerHeight;
            const triggerPoint = windowHeight * 0.8;
            
            animatedElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                
                if (elementTop < triggerPoint) {
                    element.classList.add('active');
                }
            });
        }
        
        // Initial check
        checkScroll();
        
        // Check on scroll
        window.addEventListener('scroll', checkScroll);

        // Add hover animation for footer links
        const footerLinks = document.querySelectorAll('.footer-links a');
        footerLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.3s ease';
            });
        });

        // Add smooth reveal for contact items
        const contactItems = document.querySelectorAll('.contact-item');
        contactItems.forEach((item, index) => {
            item.style.transitionDelay = (index * 0.1) + 's';
        });

        // Add animation for social icons
        const socialIcons = document.querySelectorAll('.social-icon');
        socialIcons.forEach((icon, index) => {
            icon.style.animationDelay = (index * 0.1) + 's';
        });

        // Parallax effect
        window.addEventListener('scroll', function() {
            const footer = document.querySelector('.site-footer');
            const scrolled = window.pageYOffset;
            const rate = scrolled * 0.3;
            
            if (footer && footer.getBoundingClientRect().top < window.innerHeight) {
                footer.style.backgroundPositionY = rate + 'px';
            }
        });

        // Add ripple effect
        if (backToTopBtn) {
            backToTopBtn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                this.appendChild(ripple);
                
                const x = e.clientX - e.target.offsetLeft;
                const y = e.clientY - e.target.offsetTop;
                
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        }
    });

    // Add ripple effect style
    const style = document.createElement('style');
    style.textContent = `
        .back-to-top-btn {
            position: relative;
            overflow: hidden;
        }
        
        .ripple {
            position: absolute;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
            width: 100px;
            height: 100px;
            z-index: 10;
        }
        
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
</script>