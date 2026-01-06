<nav class="navbar">
    <a href="index.php" class="brand-name">HOPE ACCOUNT SPECIALIST</a>

    <a href="index.php" class="logo-container">
        <div class="logo-circle">
            <img src="img/logo.png" alt="Logo">
        </div>
    </a>
    
    <div class="nav-links" id="navLinks">
        <a href="index.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="active"' : ''; ?>>Home</a>
        
        <div class="dropdown <?php echo (basename($_SERVER['PHP_SELF']) == 'team.php') ? 'active' : ''; ?>">
            <a href="team.php" class="dropbtn">Meet Our Team <i class="fas fa-caret-down"></i></a>
            <div class="dropdown-content">
                <a href="team.php#leadership">Leadership</a>
                <a href="team.php#specialists">Account Specialists</a>
                <a href="team.php#support">Support Staff</a>
            </div>
        </div>
        
        <div class="dropdown <?php echo (basename($_SERVER['PHP_SELF']) == 'services.php') ? 'active' : ''; ?>">
            <a href="services.php" class="dropbtn">Services <i class="fas fa-caret-down"></i></a>
            <div class="dropdown-content">
                <a href="services.php#auto-acquisition">Auto acquisition and loan assistance</a>
                <a href="services.php#housing">House and lot acquisition and loan assistance</a>
                <a href="services.php#car-insurance">Car Insurance</a>
                <a href="services.php#housing-insurance">Housing Insurance</a>
                <a href="services.php#life-insurance">Life Insurance</a>
                <a href="services.php#second-hand">Second hand car loan assistance</a>
                <a href="services.php#sangla">Sangla title and OR/CR</a>
                <a href="services.php#trade-in">Trade In</a>
            </div>
        </div>
        
        <a href="contact.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'class="active"' : ''; ?>>Contact</a>
    </div>

    <div class="burger" id="burgerMenu">
        <div class="burger-line"></div>
        <div class="burger-line"></div>
        <div class="burger-line"></div>
    </div>
</nav>

<style>
    /* Navbar Styling */
    .navbar {
        background-color: #2c2b29;
        height: 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 50px;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    /* Brand Name (Left) - Now a clickable link */
    .brand-name {
        color: #eeb82e;
        font-weight: 900;
        font-size: 1.2rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        z-index: 11;
        text-decoration: none;
        cursor: pointer;
        transition: color 0.3s;
    }

    .brand-name:hover {
        color: #fff;
    }

    /* Logo Container - Now a clickable link */
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
        background-color: #2c2b29;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: -15px;
        border: 4px solid #2c2b29;
        transition: transform 0.3s ease;
    }

    .logo-container:hover .logo-circle {
        transform: scale(1.05);
    }

    .logo-circle img {
        width: 120px;
        height: auto;
        transition: transform 0.3s ease;
    }

    .logo-container:hover .logo-circle img {
        transform: scale(1.05);
    }

    /* Navigation Links (Right) */
    .nav-links {
        display: flex;
        gap: 20px;
        z-index: 11;
    }

    .nav-links a {
        color: #eeb82e;
        text-decoration: none;
        font-size: 1rem;
        font-weight: 500;
        transition: color 0.3s;
    }

    .nav-links a:hover,
    .nav-links a.active {
        color: #fff;
    }

    /* Burger Menu (Hidden by default on desktop) */
    .burger {
        display: none;
        flex-direction: column;
        cursor: pointer;
        z-index: 11;
        padding: 5px;
    }

    .burger-line {
        width: 25px;
        height: 3px;
        background-color: #eeb82e;
        margin: 3px 0;
        transition: 0.3s;
    }

    /* Dropdown Styles */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1000;
        border-top: 3px solid #eeb82e;
        border-radius: 0 0 5px 5px;
        overflow: hidden;
    }

    .dropdown-content a {
        color: #2c2b29 !important;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        font-size: 0.95rem;
        border-bottom: 1px solid #eee;
        transition: all 0.3s ease;
    }

    .dropdown-content a:hover {
        background-color: #eeb82e;
        color: #2c2b29 !important;
        padding-left: 20px;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        color: #fff;
    }

    .dropdown.active .dropbtn {
        color: #fff;
    }

    .dropbtn {
        cursor: pointer;
    }

    .dropbtn .fa-caret-down {
        font-size: 0.8em;
        margin-left: 5px;
    }

    /* Mobile Responsive Styles */
    @media screen and (max-width: 768px) {
        .navbar {
            padding: 0 20px;
        }

        /* Show burger menu on mobile */
        .burger {
            display: flex;
        }

        /* Hide regular nav links on mobile */
        .nav-links {
            position: fixed;
            top: 60px;
            right: 0;
            height: 0;
            width: 100%;
            background-color: #2c2b29;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 0;
            overflow: hidden;
            transition: height 0.5s ease, padding-top 0.5s ease;
            box-shadow: 0 5px 10px rgba(0,0,0,0.2);
            z-index: 100;
        }

        /* When menu is active */
        .nav-links.active {
            height: calc(100vh - 60px);
            padding-top: 40px;
        }

        .nav-links a {
            margin: 15px 0;
            font-size: 1.2rem;
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .nav-links.active a {
            opacity: 1;
            transform: translateY(0);
        }

        /* Adjust logo size on mobile */
        .logo-circle {
            width: 120px;
            height: 120px;
        }

        .logo-circle img {
            width: 90px;
        }

        /* Adjust brand name font size on smaller screens */
        .brand-name {
            font-size: 1rem;
        }

        .dropdown-content {
            position: static;
            box-shadow: none;
            background-color: transparent;
            border: none;
            display: none;
        }
        
        .dropdown.active .dropdown-content {
            display: block;
        }
        
        .dropbtn .fa-caret-down {
            display: none;
        }
        
        /* Ensure logo is clickable on mobile */
        .logo-container {
            cursor: pointer;
            z-index: 12;
        }
    }

    @media screen and (max-width: 480px) {
        .logo-circle {
            width: 100px;
            height: 100px;
            margin-top: -10px;
        }

        .logo-circle img {
            width: 70px;
        }

        .brand-name {
            font-size: 0.8rem;
            max-width: 120px;
            line-height: 1.1;
        }
    }
</style>

<script>
    // Mobile menu toggle functionality
    const burgerMenu = document.getElementById('burgerMenu');
    const navLinks = document.getElementById('navLinks');
    
    if (burgerMenu) {
        burgerMenu.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            
            const burgerLines = document.querySelectorAll('.burger-line');
            if (navLinks.classList.contains('active')) {
                burgerLines[0].style.transform = 'rotate(45deg) translate(5px, 6px)';
                burgerLines[1].style.opacity = '0';
                burgerLines[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
            } else {
                burgerLines[0].style.transform = 'rotate(0) translate(0, 0)';
                burgerLines[1].style.opacity = '1';
                burgerLines[2].style.transform = 'rotate(0) translate(0, 0)';
            }
        });
        
        const navItems = document.querySelectorAll('.nav-links a');
        navItems.forEach(item => {
            item.addEventListener('click', () => {
                navLinks.classList.remove('active');
                const burgerLines = document.querySelectorAll('.burger-line');
                burgerLines[0].style.transform = 'rotate(0) translate(0, 0)';
                burgerLines[1].style.opacity = '1';
                burgerLines[2].style.transform = 'rotate(0) translate(0, 0)';
            });
        });
        
        document.addEventListener('click', (event) => {
            const isClickInsideNav = navLinks.contains(event.target) || burgerMenu.contains(event.target);
            
            if (!isClickInsideNav && navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                const burgerLines = document.querySelectorAll('.burger-line');
                burgerLines[0].style.transform = 'rotate(0) translate(0, 0)';
                burgerLines[1].style.opacity = '1';
                burgerLines[2].style.transform = 'rotate(0) translate(0, 0)';
            }
        });

        // Simple dropdown functionality for mobile
        document.querySelectorAll('.dropbtn').forEach(dropdown => {
            dropdown.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    const dropdown = this.closest('.dropdown');
                    dropdown.classList.toggle('active');
                }
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', (event) => {
            if (!event.target.closest('.dropdown') && window.innerWidth <= 768) {
                document.querySelectorAll('.dropdown').forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            }
        });
        
        // Prevent logo click from interfering with mobile menu
        document.querySelector('.logo-container').addEventListener('click', (e) => {
            if (window.innerWidth <= 768 && navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                const burgerLines = document.querySelectorAll('.burger-line');
                burgerLines[0].style.transform = 'rotate(0) translate(0, 0)';
                burgerLines[1].style.opacity = '1';
                burgerLines[2].style.transform = 'rotate(0) translate(0, 0)';
            }
        });
    }
</script>