<nav class="navbar">
    <a href="index.php" class="brand-name">HOPE ACCOUNT SPECIALIST</a>

    <a href="index.php" class="logo-container">
        <div class="logo-circle">
            <img src="img/logo.png" alt="Logo">
        </div>
    </a>
    
    <div class="nav-links" id="navLinks">
        <a href="index.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="active"' : ''; ?>>
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
        
        <div class="dropdown <?php echo (basename($_SERVER['PHP_SELF']) == 'team.php') ? 'active' : ''; ?>">
            <a href="team.php" class="dropbtn">
                <i class="fas fa-users"></i>
                <span>Meet Our Team</span>
                <i class="fas fa-caret-down dropdown-icon"></i>
            </a>
            <div class="dropdown-content">
                <a href="team.php#ceo">
                    <i class="fas fa-crown"></i>
                    <span>CEO</span>
                </a>
                <a href="team.php#leadership">
                    <i class="fas fa-user-tie"></i>
                    <span>Leadership</span>
                </a>
                <a href="team.php#specialists">
                    <i class="fas fa-user-check"></i>
                    <span>Account Specialists</span>
                </a>
            </div>
        </div>
        
        <div class="dropdown <?php echo (basename($_SERVER['PHP_SELF']) == 'services.php') ? 'active' : ''; ?>">
            <a href="services.php" class="dropbtn">
                <i class="fas fa-handshake"></i>
                <span>Services</span>
                <i class="fas fa-caret-down dropdown-icon"></i>
            </a>
            <div class="dropdown-content">
                <a href="services.php#auto-acquisition">
                    <i class="fas fa-car"></i>
                    <span>Auto acquisition and loan assistance</span>
                </a>
                <a href="services.php#housing">
                    <i class="fas fa-home"></i>
                    <span>House and lot acquisition and loan assistance</span>
                </a>
                <a href="services.php#car-insurance">
                    <i class="fas fa-car-crash"></i>
                    <span>Car Insurance</span>
                </a>
                <a href="services.php#housing-insurance">
                    <i class="fas fa-house-damage"></i>
                    <span>Housing Insurance</span>
                </a>
                <a href="services.php#life-insurance">
                    <i class="fas fa-heartbeat"></i>
                    <span>Life Insurance</span>
                </a>
                <a href="services.php#second-hand">
                    <i class="fas fa-car-side"></i>
                    <span>Second hand car loan assistance</span>
                </a>
                <a href="services.php#sangla">
                    <i class="fas fa-file-contract"></i>
                    <span>Sangla title and OR/CR</span>
                </a>
                <a href="services.php#trade-in">
                    <i class="fas fa-exchange-alt"></i>
                    <span>Trade In</span>
                </a>
            </div>
        </div>
        
        <a href="contact.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'class="active"' : ''; ?>>
            <i class="fas fa-phone-alt"></i>
            <span>Contact</span>
        </a>
    </div>

    <div class="burger" id="burgerMenu">
        <div class="burger-line"></div>
        <div class="burger-line"></div>
        <div class="burger-line"></div>
    </div>
    
    <!-- Mobile Menu Overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>
</nav>

<style>
    /* Import Font Awesome */
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    
    /* Root Variables */
    :root {
        --primary-color: #eeb82e;
        --secondary-color: #2c2b29;
        --accent-color: #1a1a1a;
        --text-light: #ffffff;
        --text-gray: #cccccc;
        --shadow: 0 4px 12px rgba(0,0,0,0.15);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --border-radius: 8px;
    }

    /* Navbar Styling */
    .navbar {
        background-color: var(--secondary-color);
        height: 80px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 40px;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: var(--shadow);
    }

    .navbar.scrolled {
        height: 70px;
        background-color: rgba(44, 43, 41, 0.95);
        backdrop-filter: blur(10px);
    }

    /* Brand Name */
    .brand-name {
        color: var(--primary-color);
        font-weight: 900;
        font-size: 1.3rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        z-index: 11;
        text-decoration: none;
        cursor: pointer;
        position: relative;
        padding: 5px 0;
    }

    .brand-name::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: var(--primary-color);
        transition: width 0.3s ease;
    }

    .brand-name:hover::after {
        width: 100%;
    }

    .brand-name:hover {
        color: var(--text-light);
    }

    /* Logo Container - WITHOUT ANIMATIONS */
    .logo-container {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        text-decoration: none;
        cursor: pointer;
    }

    .logo-circle {
        background-color: var(--secondary-color);
        width: 160px;
        height: 160px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: -15px;
        border: 5px solid var(--secondary-color);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }

    .logo-circle img {
        width: 130px;
        height: auto;
    }

    /* Navigation Links */
    .nav-links {
        display: flex;
        gap: 25px;
        z-index: 11;
        align-items: center;
    }

    .nav-links > a,
    .dropbtn {
        color: var(--text-gray);
        text-decoration: none;
        font-size: 1rem;
        font-weight: 500;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 15px;
        border-radius: var(--border-radius);
        position: relative;
    }

    .nav-links > a i,
    .dropbtn i {
        font-size: 1.1rem;
        transition: var(--transition);
    }

    .nav-links > a:hover,
    .nav-links > a.active,
    .dropbtn:hover,
    .dropdown.active .dropbtn {
        color: var(--text-light);
        background: rgba(238,184,46,0.1);
    }

    .nav-links > a:hover i,
    .nav-links > a.active i {
        color: var(--primary-color);
        transform: scale(1.1);
    }

    .nav-links > a::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 3px;
        background-color: var(--primary-color);
        transition: width 0.3s ease;
        border-radius: 3px 3px 0 0;
    }

    .nav-links > a:hover::before,
    .nav-links > a.active::before {
        width: 80%;
    }

    /* Dropdown Styles */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-icon {
        font-size: 0.9rem !important;
        transition: transform 0.3s ease;
    }

    .dropdown:hover .dropdown-icon {
        transform: rotate(180deg);
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: var(--text-light);
        min-width: 280px;
        box-shadow: var(--shadow);
        z-index: 1000;
        border-radius: var(--border-radius);
        overflow: hidden;
        top: 100%;
        left: 0;
        animation: dropdownFadeIn 0.3s ease;
        border-top: 3px solid var(--primary-color);
    }

    @keyframes dropdownFadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-content a {
        color: var(--secondary-color) !important;
        padding: 12px 20px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 0.95rem;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        transition: var(--transition);
    }

    .dropdown-content a i {
        color: var(--primary-color);
        width: 20px;
        text-align: center;
        font-size: 1rem;
    }

    .dropdown-content a:hover {
        background-color: rgba(238,184,46,0.1);
        color: var(--secondary-color) !important;
        padding-left: 25px;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Burger Menu */
    .burger {
        display: none;
        flex-direction: column;
        cursor: pointer;
        z-index: 11;
        padding: 8px;
        border-radius: 4px;
        transition: var(--transition);
    }

    .burger:hover {
        background: rgba(238,184,46,0.1);
    }

    .burger-line {
        width: 30px;
        height: 3px;
        background-color: var(--primary-color);
        margin: 3px 0;
        transition: var(--transition);
        border-radius: 3px;
    }

    /* Mobile Overlay */
    .mobile-overlay {
        display: none;
        position: fixed;
        top: 80px;
        left: 0;
        width: 100%;
        height: calc(100vh - 80px);
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(5px);
        z-index: 9;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    /* Mobile Responsive Styles */
    @media screen and (max-width: 1200px) {
        .navbar {
            padding: 0 30px;
        }
        
        .nav-links {
            gap: 15px;
        }
        
        .logo-circle {
            width: 140px;
            height: 140px;
        }
        
        .logo-circle img {
            width: 110px;
        }
    }

    @media screen and (max-width: 992px) {
        .brand-name {
            font-size: 1.1rem;
        }
        
        .logo-circle {
            width: 130px;
            height: 130px;
        }
        
        .logo-circle img {
            width: 100px;
        }
    }

    @media screen and (max-width: 768px) {
        .navbar {
            height: 70px;
            padding: 0 20px;
        }

        /* Hide regular nav links */
        .nav-links {
            position: fixed;
            top: 70px;
            right: -100%;
            width: 300px;
            height: calc(100vh - 70px);
            background-color: var(--secondary-color);
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            padding: 30px;
            transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: -5px 0 30px rgba(0,0,0,0.3);
            z-index: 10;
            overflow-y: auto;
        }

        .nav-links.active {
            right: 0;
        }

        .nav-links > a,
        .dropbtn {
            width: 100%;
            padding: 15px;
            font-size: 1.1rem;
            justify-content: flex-start;
            border-radius: 8px;
            margin: 5px 0;
        }

        .nav-links > a::before {
            display: none;
        }

        .nav-links > a i,
        .dropbtn i:not(.dropdown-icon) {
            width: 25px;
        }

        /* Show burger menu */
        .burger {
            display: flex;
        }

        /* Mobile overlay */
        .mobile-overlay.active {
            display: block;
            opacity: 1;
        }

        /* Adjust logo */
        .logo-circle {
            width: 110px;
            height: 110px;
            margin-top: -10px;
        }

        .logo-circle img {
            width: 85px;
        }

        .brand-name {
            font-size: 1rem;
            max-width: 140px;
        }

        /* Mobile dropdown */
        .dropdown-content {
            position: static;
            box-shadow: none;
            background-color: transparent;
            border: none;
            display: none;
            width: 100%;
            min-width: auto;
            margin-top: 10px;
            padding-left: 20px;
            animation: none;
        }
        
        .dropdown.active .dropdown-content {
            display: block;
        }
        
        .dropdown-content a {
            color: var(--text-gray) !important;
            padding: 12px 15px;
            font-size: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .dropdown-content a:hover {
            background-color: rgba(238,184,46,0.1);
            padding-left: 20px;
        }
        
        .dropdown-icon {
            margin-left: auto;
        }
        
        .dropbtn .dropdown-icon {
            transition: transform 0.3s ease;
        }
        
        .dropdown.active .dropbtn .dropdown-icon {
            transform: rotate(180deg);
        }
    }

    @media screen and (max-width: 480px) {
        .navbar {
            padding: 0 15px;
        }
        
        .logo-circle {
            width: 90px;
            height: 90px;
            margin-top: -5px;
            border-width: 3px;
        }

        .logo-circle img {
            width: 70px;
        }

        .brand-name {
            font-size: 0.85rem;
            max-width: 110px;
        }
        
        .nav-links {
            width: 280px;
        }
    }

    /* Animation for menu items on mobile */
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .nav-links.active a {
        animation: slideInRight 0.3s ease forwards;
    }

    .nav-links.active a:nth-child(1) { animation-delay: 0.1s; }
    .nav-links.active a:nth-child(2) { animation-delay: 0.2s; }
    .nav-links.active a:nth-child(3) { animation-delay: 0.3s; }
    .nav-links.active a:nth-child(4) { animation-delay: 0.4s; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const burgerMenu = document.getElementById('burgerMenu');
        const navLinks = document.getElementById('navLinks');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const navbar = document.querySelector('.navbar');
        const logoContainer = document.querySelector('.logo-container');
        
        // Scroll effect
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Mobile menu toggle
        if (burgerMenu) {
            burgerMenu.addEventListener('click', (e) => {
                e.stopPropagation();
                navLinks.classList.toggle('active');
                mobileOverlay.classList.toggle('active');
                
                // Burger animation
                const burgerLines = document.querySelectorAll('.burger-line');
                if (navLinks.classList.contains('active')) {
                    burgerLines[0].style.transform = 'rotate(45deg) translate(6px, 7px)';
                    burgerLines[1].style.opacity = '0';
                    burgerLines[2].style.transform = 'rotate(-45deg) translate(6px, -7px)';
                } else {
                    burgerLines[0].style.transform = 'rotate(0) translate(0, 0)';
                    burgerLines[1].style.opacity = '1';
                    burgerLines[2].style.transform = 'rotate(0) translate(0, 0)';
                }
            });
            
            // Close menu when clicking overlay
            mobileOverlay.addEventListener('click', () => {
                navLinks.classList.remove('active');
                mobileOverlay.classList.remove('active');
                resetBurger();
            });
            
            // Close menu when clicking logo on mobile
            logoContainer.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    navLinks.classList.remove('active');
                    mobileOverlay.classList.remove('active');
                    resetBurger();
                }
            });
            
            // Close menu when clicking nav items
            document.querySelectorAll('.nav-links a').forEach(item => {
                item.addEventListener('click', () => {
                    if (window.innerWidth <= 768) {
                        navLinks.classList.remove('active');
                        mobileOverlay.classList.remove('active');
                        resetBurger();
                    }
                });
            });
            
            // Mobile dropdown functionality
            document.querySelectorAll('.dropbtn').forEach(dropdown => {
                dropdown.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        e.stopPropagation();
                        const dropdown = this.closest('.dropdown');
                        const isActive = dropdown.classList.contains('active');
                        
                        // Close all other dropdowns
                        document.querySelectorAll('.dropdown').forEach(d => {
                            if (d !== dropdown) d.classList.remove('active');
                        });
                        
                        // Toggle current dropdown
                        dropdown.classList.toggle('active');
                        
                        // Scroll to dropdown if needed
                        if (!isActive && dropdown.classList.contains('active')) {
                            dropdown.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }
                    }
                });
            });
            
            // Close dropdowns when clicking outside
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.dropdown') && window.innerWidth <= 768) {
                    document.querySelectorAll('.dropdown').forEach(dropdown => {
                        dropdown.classList.remove('active');
                    });
                }
            });
            
            // Close menu on escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    navLinks.classList.remove('active');
                    mobileOverlay.classList.remove('active');
                    resetBurger();
                }
            });
            
            function resetBurger() {
                const burgerLines = document.querySelectorAll('.burger-line');
                burgerLines[0].style.transform = 'rotate(0) translate(0, 0)';
                burgerLines[1].style.opacity = '1';
                burgerLines[2].style.transform = 'rotate(0) translate(0, 0)';
            }
        }
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href.startsWith('#') && href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    });
</script>