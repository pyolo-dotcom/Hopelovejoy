<nav class="navbar">
    <!-- Logo and Brand Name on Left Side -->
    <div class="nav-brand">
        <a href="index.php" class="logo-link" id="secretLogo">
            <img src="img/logo.png" alt="HOPE Logo" class="navbar-logo">
        </a>
        <a href="index.php" class="brand-name">HOPE ACCOUNT SPECIALIST</a>
    </div>
    
    <!-- Navigation Links -->
    <div class="nav-links" id="navLinks">
        <a href="index.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="active"' : ''; ?>>
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
        
        <div class="dropdown">
            <a href="javascript:void(0);" class="dropbtn">
                <i class="fas fa-users"></i>
                <span>Meet Our Team</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
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
        
        <div class="dropdown">
            <a href="javascript:void(0);" class="dropbtn">
                <i class="fas fa-handshake"></i>
                <span>Services</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <div class="dropdown-content services-dropdown">
                <div class="dropdown-grid">
                    <a href="services.php#auto-acquisition" class="dropdown-item">
                        <i class="fas fa-car"></i>
                        <span>Auto Acquisition</span>
                    </a>
                    <a href="services.php#housing" class="dropdown-item">
                        <i class="fas fa-home"></i>
                        <span>House & Lot</span>
                    </a>
                    <a href="services.php#car-insurance" class="dropdown-item">
                        <i class="fas fa-car-crash"></i>
                        <span>Car Insurance</span>
                    </a>
                    <a href="services.php#housing-insurance" class="dropdown-item">
                        <i class="fas fa-house-damage"></i>
                        <span>Housing Insurance</span>
                    </a>
                    <a href="services.php#life-insurance" class="dropdown-item">
                        <i class="fas fa-heartbeat"></i>
                        <span>Life Insurance</span>
                    </a>
                    <a href="services.php#second-hand" class="dropdown-item">
                        <i class="fas fa-car-side"></i>
                        <span>Second Hand Car</span>
                    </a>
                    <a href="services.php#sangla" class="dropdown-item">
                        <i class="fas fa-file-contract"></i>
                        <span>Sangla Title/ORCR</span>
                    </a>
                    <a href="services.php#trade-in" class="dropdown-item">
                        <i class="fas fa-exchange-alt"></i>
                        <span>Trade In</span>
                    </a>
                </div>
            </div>
        </div>
        
        <a href="contact.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'class="active"' : ''; ?>>
            <i class="fas fa-phone-alt"></i>
            <span>Contact</span>
        </a>
    </div>

    <!-- Burger Menu -->
    <div class="burger" id="burgerMenu">
        <span class="burger-line"></span>
        <span class="burger-line"></span>
        <span class="burger-line"></span>
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
        --text-light: #ffffff;
        --text-gray: #cccccc;
        --hover-bg: rgba(238, 184, 46, 0.1);
        --transition: all 0.3s ease;
        --border-radius: 8px;
        --nav-height: 70px;
    }

    /* Navbar Base Styles */
    .navbar {
        background-color: var(--secondary-color);
        height: var(--nav-height);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar.scrolled {
        background-color: rgba(44, 43, 41, 0.98);
        backdrop-filter: blur(10px);
    }

    /* Nav Brand */
    .nav-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        z-index: 1002;
    }

    .logo-link {
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    .navbar-logo {
        width: 40px;
        height: 40px;
        object-fit: contain;
        transition: var(--transition);
    }

    .logo-link:hover .navbar-logo {
        transform: scale(1.05);
    }

    .brand-name {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-decoration: none;
        transition: var(--transition);
        line-height: 1.2;
        white-space: nowrap;
    }

    .brand-name:hover {
        color: var(--text-light);
    }

    /* Navigation Links - Mobile First */
    .nav-links {
        position: fixed;
        top: var(--nav-height);
        left: -100%;
        width: 85%;
        max-width: 400px;
        height: calc(100vh - var(--nav-height));
        background: var(--secondary-color);
        flex-direction: column;
        align-items: stretch;
        padding: 30px 25px;
        transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1001;
        overflow-y: auto;
        box-shadow: 5px 0 25px rgba(0, 0, 0, 0.3);
        display: flex;
    }

    .nav-links.active {
        left: 0;
    }

    .nav-links > a,
    .dropbtn {
        color: var(--text-gray);
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: 500;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 16px 20px;
        border-radius: var(--border-radius);
        margin: 5px 0;
        border-left: 3px solid transparent;
        cursor: pointer;
        width: 100%;
        box-sizing: border-box;
    }

    .nav-links > a i,
    .dropbtn i:not(.dropdown-icon) {
        font-size: 1.3rem;
        width: 25px;
        text-align: center;
    }

    .nav-links > a:hover,
    .nav-links > a.active,
    .dropbtn:hover {
        color: var(--text-light);
        background: var(--hover-bg);
        border-left-color: var(--primary-color);
    }

    .dropdown-icon {
        margin-left: auto;
        transition: transform 0.3s ease;
    }

    .dropdown.active .dropdown-icon {
        transform: rotate(180deg);
    }

    /* Dropdown Styles for Mobile */
    .dropdown-content {
        display: none;
        width: 100%;
        margin-top: 5px;
        margin-bottom: 5px;
        padding-left: 30px;
        animation: slideDown 0.3s ease;
    }

    .dropdown.active .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        color: var(--text-gray) !important;
        padding: 14px 20px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 1rem;
        border-radius: var(--border-radius);
        margin: 5px 0;
        border-left: 2px solid transparent;
    }

    .dropdown-content a:hover {
        background: var(--hover-bg);
        color: var(--text-light) !important;
        border-left-color: var(--primary-color);
        padding-left: 25px;
    }

    .dropdown-content a i {
        color: var(--primary-color);
        width: 20px;
        text-align: center;
    }

    /* Services Dropdown Grid */
    .services-dropdown {
        padding-left: 20px;
    }

    .dropdown-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 8px;
    }

    .dropdown-item {
        padding: 12px 15px !important;
        display: flex;
        align-items: center;
        gap: 12px;
        border-radius: 6px;
    }

    /* Burger Menu */
    .burger {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 30px;
        height: 22px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
        z-index: 1002;
        position: relative;
    }

    .burger-line {
        display: block;
        width: 100%;
        height: 3px;
        background-color: var(--primary-color);
        transition: var(--transition);
        border-radius: 3px;
    }

    .burger.active .burger-line:nth-child(1) {
        transform: rotate(45deg) translate(6px, 6px);
    }

    .burger.active .burger-line:nth-child(2) {
        opacity: 0;
    }

    .burger.active .burger-line:nth-child(3) {
        transform: rotate(-45deg) translate(6px, -6px);
    }

    /* Mobile Overlay */
    .mobile-overlay {
        position: fixed;
        top: var(--nav-height);
        left: 0;
        width: 100%;
        height: calc(100vh - var(--nav-height));
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .mobile-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    /* ==================== */
    /* DESKTOP STYLES (768px and up) */
    /* ==================== */
    @media screen and (min-width: 768px) {
        .navbar {
            padding: 0 30px;
            height: 80px;
            position: sticky;
        }
        
        .nav-brand {
            gap: 15px;
        }
        
        .navbar-logo {
            width: 45px;
            height: 45px;
        }
        
        .brand-name {
            font-size: 1.2rem;
            white-space: nowrap;
        }
        
        .nav-links {
            position: static;
            width: auto;
            max-width: none;
            height: auto;
            flex-direction: row;
            background: transparent;
            padding: 0;
            box-shadow: none;
            overflow: visible;
            display: flex;
            align-items: center;
        }
        
        .nav-links > a,
        .dropbtn {
            font-size: 0.95rem;
            padding: 10px 15px;
            gap: 8px;
            border-left: none;
            margin: 0 2px;
            position: relative;
            white-space: nowrap;
        }
        
        .nav-links > a i,
        .dropbtn i:not(.dropdown-icon) {
            font-size: 1.1rem;
            width: auto;
        }
        
        .nav-links > a.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 2px;
        }
        
        /* Dropdown Styles for Desktop */
        .dropdown {
            position: relative;
        }
        
        .dropdown-content {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 250px;
            background: var(--secondary-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border-radius: var(--border-radius);
            padding: 10px 0;
            display: block;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
            z-index: 1000;
            pointer-events: none;
            margin-top: 10px;
        }
        
        /* Add a transparent bridge between dropdown button and content */
        .dropdown::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            height: 20px;
            background: transparent;
        }
        
        /* Show dropdown on hover with bridge */
        .dropdown:hover .dropdown-content,
        .dropdown-content:hover {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            pointer-events: auto;
        }
        
        /* Services dropdown specific */
        .services-dropdown {
            width: 600px !important;
            left: -250px;
            padding: 20px;
        }
        
        .dropdown-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        
        .dropdown-item {
            padding: 12px 15px !important;
            font-size: 0.9rem;
            border-left: none;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            transform: translateX(5px);
        }
        
        .dropdown-content a {
            padding: 10px 20px;
            font-size: 0.9rem;
            border-left: none;
            transition: all 0.3s ease;
        }
        
        .dropdown-content a:hover {
            padding-left: 25px;
            background: var(--hover-bg);
        }
        
        .burger {
            display: none;
        }
        
        .mobile-overlay {
            display: none;
        }
    }

    /* ==================== */
    /* LARGE DESKTOP STYLES (1024px and up) */
    /* ==================== */
    @media screen and (min-width: 1024px) {
        .navbar {
            padding: 0 40px;
            height: 85px;
        }
        
        .nav-brand {
            gap: 20px;
        }
        
        .navbar-logo {
            width: 50px;
            height: 50px;
        }
        
        .brand-name {
            font-size: 1.4rem;
        }
        
        .nav-links {
            gap: 5px;
        }
        
        .nav-links > a,
        .dropbtn {
            padding: 12px 20px;
            font-size: 1rem;
        }
        
        .services-dropdown {
            width: 650px !important;
            left: -300px;
        }
        
        .dropdown-grid {
            gap: 12px;
        }
    }

    /* Animations */
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .nav-links.active > * {
        animation: slideInLeft 0.3s ease forwards;
        opacity: 0;
    }

    .nav-links.active > *:nth-child(1) { animation-delay: 0.1s; }
    .nav-links.active > *:nth-child(2) { animation-delay: 0.15s; }
    .nav-links.active > *:nth-child(3) { animation-delay: 0.2s; }
    .nav-links.active > *:nth-child(4) { animation-delay: 0.25s; }

    /* Touch-friendly targets for mobile */
    @media (max-width: 767px) {
        .nav-links > a,
        .dropbtn,
        .dropdown-content a {
            min-height: 56px;
            padding: 16px 20px !important;
        }
        
        .dropdown-content a {
            padding: 14px 25px !important;
        }
        
        .burger {
            width: 44px;
            height: 44px;
            padding: 11px;
        }
    }

    /* Prevent body scroll when mobile menu is open */
    body.menu-open {
        overflow: hidden;
        height: 100vh;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const burgerMenu = document.getElementById('burgerMenu');
    const navLinks = document.getElementById('navLinks');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const navbar = document.querySelector('.navbar');
    const logoLink = document.getElementById('secretLogo');
    let isMenuOpen = false;
    
    // Scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    
    // Mobile menu functions
    function openMobileMenu() {
        navLinks.classList.add('active');
        mobileOverlay.classList.add('active');
        burgerMenu.classList.add('active');
        document.body.classList.add('menu-open');
        isMenuOpen = true;
    }
    
    function closeMobileMenu() {
        navLinks.classList.remove('active');
        mobileOverlay.classList.remove('active');
        burgerMenu.classList.remove('active');
        document.body.classList.remove('menu-open');
        isMenuOpen = false;
        
        // Close all dropdowns when closing mobile menu
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
    }
    
    // Burger menu click
    if (burgerMenu) {
        burgerMenu.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            if (isMenuOpen) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
        
        // Close menu when clicking overlay
        mobileOverlay.addEventListener('click', function() {
            closeMobileMenu();
        });
        
        // Mobile dropdown toggle - FIXED VERSION
        document.querySelectorAll('.dropbtn').forEach(function(dropdown) {
            dropdown.addEventListener('click', function(e) {
                if (window.innerWidth <= 767) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const dropdownParent = this.closest('.dropdown');
                    const isActive = dropdownParent.classList.contains('active');
                    
                    // Toggle current dropdown
                    if (isActive) {
                        // If it's active, close it
                        dropdownParent.classList.remove('active');
                    } else {
                        // Close all other dropdowns first
                        document.querySelectorAll('.dropdown').forEach(function(d) {
                            d.classList.remove('active');
                        });
                        
                        // Open this dropdown
                        dropdownParent.classList.add('active');
                        
                        // Smooth scroll to dropdown if needed
                        setTimeout(function() {
                            dropdownParent.scrollIntoView({ 
                                behavior: 'smooth', 
                                block: 'nearest'
                            });
                        }, 100);
                    }
                }
            });
        });
        
        // Close dropdowns when clicking anywhere else in mobile view
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 767) {
                // Check if click is outside any dropdown
                if (!e.target.closest('.dropdown')) {
                    document.querySelectorAll('.dropdown').forEach(function(dropdown) {
                        dropdown.classList.remove('active');
                    });
                }
            }
        });
        
        // Close menu when clicking regular links (not dropdown toggles)
        document.querySelectorAll('.nav-links a:not(.dropbtn)').forEach(function(item) {
            item.addEventListener('click', function(e) {
                if (window.innerWidth <= 767) {
                    // Don't close if it's an anchor link within the same page
                    const href = this.getAttribute('href');
                    if (!href.startsWith('#')) {
                        closeMobileMenu();
                    } else {
                        // For anchor links, close the dropdowns but keep menu open
                        document.querySelectorAll('.dropdown').forEach(function(d) {
                            d.classList.remove('active');
                        });
                    }
                }
            });
        });
        
        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isMenuOpen) {
                closeMobileMenu();
            }
        });
        
        // Close menu when window is resized to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 767 && isMenuOpen) {
                closeMobileMenu();
            }
        });
    }
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    
                    // Close mobile menu if open
                    if (window.innerWidth <= 767 && isMenuOpen) {
                        closeMobileMenu();
                    }
                }
            }
        });
    });
    
    // ============================================
    // SECRET ADMIN ACCESS FEATURES - SAME AS YOURS
    // ============================================
    
    // Logo click handler
    logoLink.addEventListener('click', function(e) {
        // Prevent default for special key combinations
        if (e.ctrlKey || e.altKey || e.metaKey) {
            e.preventDefault();
        }
        
        // Method 1: Alt + Click (Show modal confirmation)
        if (e.altKey) {
            e.preventDefault();
            showAltClickModal();
            return;
        }
        
        // Method 2: Ctrl + Click (Show modal confirmation)
        if (e.ctrlKey || e.metaKey) {
            e.preventDefault();
            showCtrlClickModal();
            return;
        }
        
        // Regular click - normal navigation (allow default)
    });
    
    // Prevent right-click context menu on logo
    logoLink.addEventListener('contextmenu', function(e) {
        e.preventDefault();
        return false;
    });
    
    // Keyboard secret pattern detection (hopeadmin)
    let keySequence = [];
    const secretPattern = ['h', 'o', 'p', 'e', 'a', 'd', 'm', 'i', 'n'];
    
    document.addEventListener('keydown', function(e) {
        // Add key to sequence
        keySequence.push(e.key.toLowerCase());
        
        // Keep only last 9 keys
        if (keySequence.length > secretPattern.length) {
            keySequence.shift();
        }
        
        // Check if sequence matches secret pattern
        if (arraysEqual(keySequence, secretPattern)) {
            showPatternDetectedModal();
            keySequence = [];
        }
    });
    
    // Helper function to compare arrays
    function arraysEqual(arr1, arr2) {
        if (arr1.length !== arr2.length) return false;
        for (let i = 0; i < arr1.length; i++) {
            if (arr1[i] !== arr2[i]) return false;
        }
        return true;
    }
    
    // ============================================
    // MODAL FUNCTIONS - SAME AS YOURS
    // ============================================
    
    // Alt+Click Modal
    function showAltClickModal() {
        createModal({
            title: 'Admin Access (Alt+Click)',
            icon: 'fa-user-lock',
            iconColor: '#eeb82e',
            message: 'Alt+Click detected. Direct admin access. Proceed to admin panel?',
            showPassword: false,
            buttons: [
                {
                    text: 'Go to Admin',
                    icon: 'fa-sign-in-alt',
                    color: '#2c2b29',
                    bgColor: '#eeb82e',
                    action: function() {
                        window.location.href = 'admin_login.php';
                    }
                },
                {
                    text: 'Cancel',
                    icon: 'fa-times',
                    color: 'white',
                    bgColor: '#6c757d',
                    action: function() {
                        const modal = document.querySelector('.secret-admin-modal');
                        if (modal) {
                            document.body.removeChild(modal);
                        }
                    }
                }
            ]
        });
    }
    
    // Ctrl+Click Modal
    function showCtrlClickModal() {
        createModal({
            title: 'Admin Access (Ctrl+Click)',
            icon: 'fa-user-secret',
            iconColor: '#eeb82e',
            message: 'Ctrl+Click detected. Proceed to admin panel?',
            showPassword: false,
            buttons: [
                {
                    text: 'Continue',
                    icon: 'fa-rocket',
                    color: '#2c2b29',
                    bgColor: '#eeb82e',
                    action: function() {
                        window.location.href = 'admin_login.php';
                    }
                },
                {
                    text: 'Close',
                    icon: 'fa-times',
                    color: 'white',
                    bgColor: '#6c757d',
                    action: function() {
                        const modal = document.querySelector('.secret-admin-modal');
                        if (modal) {
                            document.body.removeChild(modal);
                        }
                    }
                }
            ]
        });
    }
    
    // Pattern Detected Modal
    function showPatternDetectedModal() {
        createModal({
            title: 'Secret Pattern Unlocked!',
            icon: 'fa-key',
            iconColor: '#eeb82e',
            message: 'You typed the secret pattern "hopeadmin"! Access granted.',
            showPassword: false,
            buttons: [
                {
                    text: 'Go to Admin Panel',
                    icon: 'fa-rocket',
                    color: '#2c2b29',
                    bgColor: '#eeb82e',
                    action: function() {
                        window.location.href = 'admin_login.php';
                    }
                },
                {
                    text: 'Close',
                    icon: 'fa-times',
                    color: 'white',
                    bgColor: '#6c757d',
                    action: function() {
                        const modal = document.querySelector('.secret-admin-modal');
                        if (modal) {
                            document.body.removeChild(modal);
                        }
                    }
                }
            ]
        });
    }
    
    // Generic Modal Creator
    function createModal(config) {
        // Remove any existing modal
        const existingModal = document.querySelector('.secret-admin-modal');
        if (existingModal) {
            document.body.removeChild(existingModal);
        }
        
        // Create modal container
        const modal = document.createElement('div');
        modal.className = 'secret-admin-modal';
        modal.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.85);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999;
            backdrop-filter: blur(10px);
            animation: modalFadeIn 0.3s ease-out;
        `;
        
        // Create modal content
        modal.innerHTML = `
            <div class="secret-modal-content" style="
                background: linear-gradient(135deg, #1a1a1a 0%, #2c2b29 100%);
                padding: 40px;
                border-radius: 20px;
                box-shadow: 0 20px 60px rgba(0,0,0,0.6);
                max-width: 450px;
                width: 90%;
                text-align: center;
                color: white;
                border: 4px solid ${config.iconColor};
                position: relative;
                overflow: hidden;
                animation: contentSlideIn 0.4s ease-out;
            ">
                <!-- Decorative elements -->
                <div style="
                    position: absolute;
                    top: -50px;
                    right: -50px;
                    width: 150px;
                    height: 150px;
                    background: ${config.iconColor}15;
                    border-radius: 50%;
                "></div>
                
                <div style="
                    position: absolute;
                    bottom: -50px;
                    left: -50px;
                    width: 150px;
                    height: 150px;
                    background: ${config.iconColor}08;
                    border-radius: 50%;
                "></div>
                
                <!-- Content -->
                <div style="position: relative; z-index: 2;">
                    <div style="
                        background: ${config.iconColor}20;
                        width: 80px;
                        height: 80px;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 25px;
                        font-size: 2.2rem;
                        color: ${config.iconColor};
                        border: 3px solid ${config.iconColor};
                        animation: iconPulse 2s infinite;
                    ">
                        <i class="fas ${config.icon}"></i>
                    </div>
                    
                    <h2 style="
                        margin-bottom: 15px;
                        font-size: 1.8rem;
                        background: linear-gradient(90deg, ${config.iconColor}, #ffd95e);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                    ">
                        ${config.title}
                    </h2>
                    
                    <p style="
                        color: #ccc;
                        margin-bottom: ${config.showPassword ? '10px' : '30px'};
                        font-size: 1rem;
                        line-height: 1.6;
                    ">
                        ${config.message}
                    </p>
                    
                    ${config.showPassword ? `
                    <div style="margin-bottom: 25px;">
                        <input type="password" id="adminPasswordInput" 
                               placeholder="Enter admin password..." 
                               style="
                                   width: 100%;
                                   padding: 15px 20px;
                                   border: 2px solid rgba(255,255,255,0.2);
                                   border-radius: 10px;
                                   font-size: 1rem;
                                   background: rgba(255,255,255,0.1);
                                   color: white;
                                   transition: all 0.3s ease;
                               "
                               onfocus="this.style.borderColor='${config.iconColor}'; this.style.boxShadow='0 0 0 3px ${config.iconColor}20'"
                               onblur="this.style.borderColor='rgba(255,255,255,0.2)'; this.style.boxShadow='none'">
                        <div id="passwordError" style="
                            color: #ff6b6b;
                            margin-top: 10px;
                            font-size: 0.9rem;
                            display: none;
                        ">
                            <i class="fas fa-exclamation-circle"></i> 
                            <span id="errorText"></span>
                        </div>
                    </div>
                    ` : ''}
                    
                    <div style="display: flex; gap: 15px; flex-wrap: wrap; justify-content: center;">
                        ${config.buttons.map((btn, index) => `
                        <button id="modalBtn${index}" class="modal-action-btn" style="
                            min-width: 180px;
                            background: ${btn.bgColor};
                            color: ${btn.color};
                            border: none;
                            padding: 15px 25px;
                            border-radius: 10px;
                            font-size: 1rem;
                            font-weight: 600;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            gap: 10px;
                            flex: 1;
                        ">
                            <i class="fas ${btn.icon}"></i> ${btn.text}
                        </button>
                        `).join('')}
                    </div>
                    
                    <p style="
                        margin-top: 20px;
                        font-size: 0.8rem;
                        color: #999;
                        font-style: italic;
                    ">
                        <i class="fas fa-info-circle"></i> Restricted access only
                    </p>
                </div>
            </div>
        `;
        
        // Add to document
        document.body.appendChild(modal);
        
        // Add CSS animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes modalFadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            
            @keyframes contentSlideIn {
                0% { opacity: 0; transform: translateY(-30px) scale(0.95); }
                100% { opacity: 1; transform: translateY(0) scale(1); }
            }
            
            @keyframes iconPulse {
                0% { box-shadow: 0 0 0 0 ${config.iconColor}40; }
                70% { box-shadow: 0 0 0 20px ${config.iconColor}00; }
                100% { box-shadow: 0 0 0 0 ${config.iconColor}00; }
            }
            
            .secret-admin-modal button:hover {
                transform: translateY(-3px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            }
        `;
        document.head.appendChild(style);
        
        // Focus on password input if shown
        if (config.showPassword) {
            setTimeout(() => {
                const passwordInput = document.getElementById('adminPasswordInput');
                if (passwordInput) passwordInput.focus();
            }, 100);
        }
        
        // Add button event listeners
        config.buttons.forEach((btn, index) => {
            const buttonElement = document.getElementById(`modalBtn${index}`);
            buttonElement.addEventListener('click', function() {
                if (config.showPassword) {
                    const password = document.getElementById('adminPasswordInput').value;
                    const result = btn.action(password);
                    
                    if (result && typeof result === 'string') {
                        // Show error
                        const errorDiv = document.getElementById('passwordError');
                        const errorText = document.getElementById('errorText');
                        errorText.textContent = result;
                        errorDiv.style.display = 'block';
                        
                        // Shake animation
                        const passwordInput = document.getElementById('adminPasswordInput');
                        passwordInput.style.animation = 'shake 0.5s';
                        setTimeout(() => {
                            passwordInput.style.animation = '';
                            passwordInput.value = '';
                            passwordInput.focus();
                        }, 500);
                        
                        // Add shake animation
                        if (!document.querySelector('#shakeAnimation')) {
                            const shakeStyle = document.createElement('style');
                            shakeStyle.id = 'shakeAnimation';
                            shakeStyle.textContent = `
                                @keyframes shake {
                                    0%, 100% { transform: translateX(0); }
                                    10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                                    20%, 40%, 60%, 80% { transform: translateX(5px); }
                                }
                            `;
                            document.head.appendChild(shakeStyle);
                        }
                    }
                } else {
                    // Execute the button action
                    btn.action();
                }
            });
        });
        
        // Handle Enter key for password input
        if (config.showPassword) {
            document.getElementById('adminPasswordInput').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    document.getElementById('modalBtn0').click();
                }
            });
        }
        
        // Close on click outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
        
        // Escape key to close
        const closeOnEscape = function(e) {
            if (e.key === 'Escape') {
                closeModal();
                document.removeEventListener('keydown', closeOnEscape);
            }
        };
        document.addEventListener('keydown', closeOnEscape);
        
        function closeModal() {
            document.body.removeChild(modal);
            document.head.removeChild(style);
            document.removeEventListener('keydown', closeOnEscape);
        }
    }
});
</script>