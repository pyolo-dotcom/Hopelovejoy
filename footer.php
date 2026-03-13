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

            <!-- Social Media Section - FIXED FOR MOBILE -->
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
    
    /* Root Variables - UPDATED TO BLACK & GOLD THEME */
    :root {
        --primary-color: #eeb82e;
        --primary-dark: #cc9b27;
        --primary-light: #ffd95e;
        --bg-dark: #000000;
        --bg-medium: #0d0d0d;
        --bg-light: #1a1a1a;
        --text-light: #ffffff;
        --text-gray: #cccccc;
        --text-dark: #999999;
        --border-color: rgba(238, 184, 46, 0.2);
        --hover-bg: rgba(238, 184, 46, 0.1);
        --shadow: 0 4px 20px rgba(0,0,0,0.5);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --border-radius: 8px;
    }

    /* Footer Styling - UPDATED GRADIENT */
    .site-footer {
        background: linear-gradient(180deg, 
            var(--bg-dark) 0%, 
            var(--bg-medium) 50%, 
            var(--bg-dark) 100%);
        color: var(--text-gray);
        padding: 70px 0 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-top: auto;
        position: relative;
        overflow: hidden;
        width: 100%;
        clear: both;
        border-top: 2px solid var(--border-color);
    }

    .site-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, 
            transparent 0%, 
            var(--primary-color) 50%, 
            transparent 100%);
        animation: slideInLine 1s ease-out;
    }

    .site-footer::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 50% 0%, rgba(238,184,46,0.05) 0%, transparent 70%);
        pointer-events: none;
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
        position: relative;
        z-index: 2;
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
        background: linear-gradient(135deg, var(--bg-dark) 0%, var(--bg-medium) 100%);
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
        border-color: var(--primary-light);
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
        background: linear-gradient(135deg, rgba(238,184,46,0.2) 0%, transparent 70%);
        animation: pulseGlow 2s infinite;
    }

    @keyframes pulseGlow {
        0%, 100% {
            opacity: 0.3;
        }
        50% {
            opacity: 0.8;
        }
    }

    .footer-logo img {
        width: 80px;
        height: auto;
        position: relative;
        z-index: 1;
        transition: var(--transition);
        filter: drop-shadow(0 2px 5px rgba(238,184,46,0.3));
    }

    .footer-logo:hover img {
        transform: scale(1.1);
        filter: drop-shadow(0 4px 10px rgba(238,184,46,0.5));
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
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
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
        box-shadow: 0 0 10px var(--primary-color);
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
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .logo-section:hover .tagline {
        transform: scale(1.05);
        color: var(--primary-light);
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
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
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
        box-shadow: 0 0 10px var(--primary-color);
    }

    .footer-col:hover .footer-title::after {
        width: 60px;
    }

    .footer-title i {
        color: var(--primary-color);
        font-size: 1rem;
        transition: var(--transition);
        filter: drop-shadow(0 2px 4px rgba(238,184,46,0.3));
    }

    .footer-col:hover .footer-title i {
        transform: rotate(360deg);
        color: var(--primary-light);
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
        position: relative;
        overflow: hidden;
    }

    .footer-links a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, var(--hover-bg), transparent);
        transition: left 0.5s ease;
        z-index: -1;
    }

    .footer-links a:hover::before {
        left: 100%;
    }

    .footer-links a i {
        color: var(--primary-color);
        font-size: 0.8rem;
        transition: var(--transition);
    }

    .footer-links a:hover {
        color: var(--text-light);
        background: var(--hover-bg);
        padding-left: 15px;
        transform: translateX(5px);
    }

    .footer-links a:hover i {
        transform: translateX(8px) scale(1.2);
        color: var(--primary-light);
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
        position: relative;
        overflow: hidden;
    }

    .contact-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, var(--hover-bg), transparent);
        transition: left 0.5s ease;
        z-index: -1;
    }

    .contact-item:hover::before {
        left: 100%;
    }

    .contact-item:hover {
        background: var(--hover-bg);
        transform: translateX(10px);
    }

    .contact-item i {
        color: var(--primary-color);
        font-size: 1.1rem;
        margin-top: 3px;
        min-width: 20px;
        transition: var(--transition);
        filter: drop-shadow(0 2px 4px rgba(238,184,46,0.3));
    }

    .contact-item:hover i {
        transform: scale(1.2) rotate(360deg);
        color: var(--primary-light);
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

    /* Social Section - FIXED FOR MOBILE */
    .social-section {
        text-align: left;
    }

    .social-section h5 {
        color: var(--text-light);
        font-size: 1rem;
        margin-bottom: 15px;
        font-weight: 600;
        position: relative;
        display: inline-block;
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
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
        box-shadow: 0 0 10px var(--primary-color);
    }

    .social-section:hover h5::after {
        width: 100%;
    }

    .social-icons {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: flex-start;
        align-items: center;
    }

    .social-icon {
        position: relative;
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, var(--bg-medium) 0%, var(--bg-dark) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-light);
        text-decoration: none;
        transition: var(--transition);
        font-size: 1.2rem;
        animation: bounceIn 0.5s ease-out;
        border: 2px solid var(--border-color);
        overflow: hidden;
        margin: 0; /* Remove any default margin */
        flex-shrink: 0; /* Prevent icons from shrinking */
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

    .social-icon::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s ease;
    }

    .social-icon:hover::before {
        left: 100%;
    }

    .social-icon:hover {
        transform: translateY(-5px) scale(1.1);
        border-color: var(--primary-color);
        box-shadow: 0 5px 15px rgba(238,184,46,0.3);
    }

    .social-icon .tooltip {
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: var(--primary-color);
        color: var(--bg-dark);
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 0.8rem;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: var(--transition);
        margin-bottom: 10px;
        font-weight: 600;
        border: 2px solid var(--bg-dark);
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        pointer-events: none; /* Para hindi mag-interfere sa click */
        z-index: 10;
    }

    .social-icon:hover .tooltip {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(-5px);
    }

    .social-icon.facebook:hover { 
        background: #1877f2;
        border-color: #1877f2;
    }
    
    .social-icon.email:hover { 
        background: #ea4335;
        border-color: #ea4335;
    }

    .social-icon i {
        transition: var(--transition);
        position: relative;
        z-index: 2;
    }

    .social-icon:hover i {
        transform: scale(1.1);
    }

    /* ========== FIXED BACK TO TOP BUTTON WITH PERFECT ARROW ALIGNMENT ========== */
    .footer-bottom {
        background: linear-gradient(180deg, 
            rgba(0,0,0,0.5) 0%, 
            rgba(13,13,13,0.8) 100%);
        padding: 20px 0;
        border-top: 2px solid var(--border-color);
        position: relative;
        overflow: hidden;
        width: 100%;
        clear: both;
        z-index: 10;
        backdrop-filter: blur(5px);
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
        color: var(--primary-light);
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
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%) !important;
        border-radius: 50% !important;
        color: var(--bg-dark) !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
        box-shadow: 0 4px 20px rgba(238,184,46,0.3) !important;
        opacity: 1 !important;
        visibility: visible !important;
        cursor: pointer !important;
        border: 2px solid rgba(255,255,255,0.2) !important;
        padding: 0 !important;
        margin: 0 !important;
        text-align: center !important;
        line-height: 1 !important;
    }

    .back-to-top-btn i {
        display: inline-block !important;
        font-size: 22px !important;
        color: var(--bg-dark) !important;
        transition: transform 0.3s ease !important;
        line-height: 1 !important;
        vertical-align: middle !important;
        margin: 0 !important;
        padding: 0 !important;
        transform: rotate(0deg) !important;
        position: relative !important;
        top: -1px !important;
    }

    .back-to-top-btn:hover {
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-color) 100%) !important;
        transform: translateY(-8px) scale(1.1) !important;
        box-shadow: 0 8px 25px rgba(238,184,46,0.5) !important;
        border-color: rgba(255,255,255,0.4) !important;
    }

    .back-to-top-btn:hover i {
        transform: translateY(-3px) scale(1.1) !important;
    }

    /* Pulse animation */
    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 4px 20px rgba(238,184,46,0.3);
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 8px 30px rgba(238,184,46,0.5);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 4px 20px rgba(238,184,46,0.3);
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

    /* Mobile Responsive - FIXED SOCIAL ICONS */
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
            width: 100%;
        }
        
        /* Social section mobile fix */
        .social-section {
            text-align: center;
            width: 100%;
        }
        
        .social-icons {
            justify-content: center !important;
            gap: 20px !important;
        }
        
        .social-icon {
            width: 50px !important;
            height: 50px !important;
            font-size: 1.3rem !important;
            margin: 0 !important;
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
            top: 0px !important;
        }
        
        /* Center align contact items on mobile */
        .contact-item {
            flex-direction: row;
            text-align: left;
            justify-content: flex-start;
        }
        
        .footer-title {
            justify-content: flex-start;
        }
        
        .footer-links {
            text-align: left;
        }
    }

    @media screen and (max-width: 480px) {
        .site-footer {
            padding: 40px 0 0;
        }
        
        .footer-container {
            padding: 0 15px;
        }
        
        /* Further social icons optimization for very small screens */
        .social-icons {
            gap: 15px !important;
        }
        
        .social-icon {
            width: 45px !important;
            height: 45px !important;
            font-size: 1.2rem !important;
        }
        
        .contact-item {
            flex-direction: row;
            gap: 10px;
            text-align: left;
        }
        
        .contact-item i {
            margin: 0;
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

    /* Extra small devices */
    @media screen and (max-width: 360px) {
        .social-icons {
            gap: 12px !important;
        }
        
        .social-icon {
            width: 40px !important;
            height: 40px !important;
            font-size: 1.1rem !important;
        }
        
        .contact-item {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .contact-item i {
            margin: 0 0 5px 0;
        }
        
        .contact-item div {
            text-align: center;
        }
        
        .footer-title {
            justify-content: center;
        }
        
        .footer-links {
            text-align: center;
        }
        
        .footer-links a {
            justify-content: center;
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

    /* Scrollbar styling para sa footer (optional) */
    .site-footer ::-webkit-scrollbar {
        width: 5px;
    }

    .site-footer ::-webkit-scrollbar-track {
        background: var(--bg-dark);
    }

    .site-footer ::-webkit-scrollbar-thumb {
        background: var(--primary-color);
        border-radius: 5px;
    }

    .site-footer ::-webkit-scrollbar-thumb:hover {
        background: var(--primary-dark);
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