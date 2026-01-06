<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet Our Team - Hope Account Specialist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&family=WindSong:wght@400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/logo.png">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Main content styling */
        .main-content {
            padding: 100px 20px 20px;
            max-width: 1200px;
            margin: 0 auto;
            flex: 1;
            width: 100%;
        }

        /* Team Page Header */
        .team-page-header {
            text-align: center;
            padding: 60px 20px 40px;
            background-color: white;
        }

        .team-page-title {
            font-family: 'Roboto Serif', serif;
            font-size: 4rem;
            margin-bottom: 20px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .team-page-subtitle {
            font-family: 'Roboto Serif', serif;
            font-size: 1.5rem;
            color: #666;
            max-width: 800px;
            margin: 0 auto 30px;
            line-height: 1.6;
        }

        /* CEO Section - SMALLER VERSION */
        .ceo-section {
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            padding: 50px 20px;
            margin: 30px 0;
            border-radius: 15px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .ceo-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #eeb82e 0%, #ffd700 50%, #eeb82e 100%);
        }

        .ceo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .ceo-image-container {
            flex: 0 0 220px;
        }

        .ceo-image {
            width: 220px;
            height: 220px;
            border-radius: 50%;
            overflow: hidden;
            border: 6px solid rgba(238, 184, 46, 0.3);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            position: relative;
        }

        .ceo-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .ceo-image:hover img {
            transform: scale(1.05);
        }

        .ceo-details {
            flex: 1;
            color: white;
        }

        .ceo-badge {
            display: inline-block;
            background: #eeb82e;
            color: #2c2b29;
            padding: 6px 16px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 1px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .ceo-name {
            font-family: 'Roboto Serif', serif;
            font-size: 2.2rem;
            margin-bottom: 10px;
            color: #fff;
        }

        .ceo-position {
            font-size: 1.1rem;
            color: #eeb82e;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .ceo-experience {
            font-size: 1rem;
            color: #ddd;
            margin-bottom: 20px;
            padding-left: 15px;
            border-left: 3px solid #eeb82e;
        }

        .ceo-message {
            font-size: 1rem;
            line-height: 1.6;
            color: #ddd;
            margin-bottom: 25px;
            font-style: italic;
        }

        .ceo-quote {
            font-size: 1.1rem;
            color: #eeb82e;
            font-weight: 600;
            margin-top: 20px;
            padding: 15px;
            background: rgba(238, 184, 46, 0.1);
            border-radius: 8px;
            border-left: 4px solid #eeb82e;
        }

        .ceo-contact {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .ceo-contact-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .ceo-contact-icon:hover {
            background: #eeb82e;
            color: #2c2b29;
            transform: translateY(-3px);
        }

        /* Team Categories */
        .team-category {
            margin-bottom: 80px;
            padding: 20px;
        }

        .category-title {
            font-family: 'Roboto Serif', serif;
            font-size: 2.5rem;
            color: #2c2b29;
            margin-bottom: 40px;
            padding-bottom: 15px;
            border-bottom: 3px solid #eeb82e;
            text-align: center;
        }

        .team-category-description {
            font-family: 'Roboto Serif', serif;
            font-size: 1.1rem;
            color: #555;
            line-height: 1.8;
            max-width: 800px;
            margin: 0 auto 40px;
            text-align: center;
        }

        /* Team Container - ADJUSTED FOR MORE MEMBERS */
        .team-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px; /* Reduced from 40px */
            max-width: 1200px;
            margin: 0 auto;
        }

        /* SMALLER TEAM MEMBER CARD - FOR ACCOUNT SPECIALISTS */
        .team-member-smaller {
            width: 250px; /* Reduced from 280px */
            text-align: center;
            background: white;
            border-radius: 15px;
            padding: 20px; /* Reduced from 25px */
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }

        .team-member-smaller:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(238, 184, 46, 0.15);
        }

        .team-member-img-smaller {
            width: 180px; /* Reduced from 200px */
            height: 180px; /* Reduced from 200px */
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 15px; /* Reduced from 20px */
            border: 4px solid #eeb82e;
            position: relative;
        }

        .team-member-img-smaller img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .team-member-smaller:hover .team-member-img-smaller img {
            transform: scale(1.05);
        }

        .team-member-smaller h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.2rem; /* Reduced from 1.4rem */
            color: #2c2b29;
            margin-bottom: 5px; /* Reduced from 8px */
        }

        .team-member-smaller .position {
            color: #eeb82e;
            font-weight: 600;
            font-size: 0.9rem; /* Reduced from 1rem */
            margin-bottom: 10px; /* Reduced from 15px */
            display: block;
        }

        .team-member-smaller .experience {
            color: #666;
            font-size: 0.8rem; /* Reduced from 0.9rem */
            margin-bottom: 10px; /* Reduced from 15px */
            display: block;
        }

        .team-member-smaller .bio {
            color: #555;
            font-size: 0.85rem; /* Reduced from 0.95rem */
            line-height: 1.5; /* Reduced from 1.6 */
            margin-bottom: 15px; /* Reduced from 20px */
            height: 60px; /* Fixed height for uniform cards */
            overflow: hidden;
        }

        .team-member-contact-smaller {
            display: flex;
            justify-content: center;
            gap: 10px; /* Reduced from 15px */
            margin-top: 15px; /* Reduced from 20px */
        }

        .contact-icon-smaller {
            width: 35px; /* Reduced from 40px */
            height: 35px; /* Reduced from 40px */
            background: #f8f8f8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c2b29;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem; /* Reduced font size */
        }

        .contact-icon-smaller:hover {
            background: #eeb82e;
            color: white;
            transform: scale(1.1);
        }

        /* Original team member style for other sections */
        .team-member {
            width: 280px;
            text-align: center;
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(238, 184, 46, 0.15);
        }

        .team-member-img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
            border: 4px solid #eeb82e;
            position: relative;
        }

        .team-member-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .team-member:hover .team-member-img img {
            transform: scale(1.05);
        }

        .team-member h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.4rem;
            color: #2c2b29;
            margin-bottom: 8px;
        }

        .team-member .position {
            color: #eeb82e;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 15px;
            display: block;
        }

        .team-member .experience {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 15px;
            display: block;
        }

        .team-member .bio {
            color: #555;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .team-member-contact {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background: #f8f8f8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c2b29;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .contact-icon:hover {
            background: #eeb82e;
            color: white;
            transform: scale(1.1);
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

            /* Team Page mobile adjustments */
            .team-page-title {
                font-size: 2.8rem;
            }

            .team-page-subtitle {
                font-size: 1.2rem;
                padding: 0 10px;
                margin-bottom: 20px;
            }

            /* CEO Section mobile */
            .ceo-section {
                padding: 30px 15px;
                margin: 20px 0;
            }

            .ceo-container {
                flex-direction: column;
                gap: 25px;
            }

            .ceo-image-container {
                flex: 0 0 auto;
            }

            .ceo-image {
                width: 180px;
                height: 180px;
                border: 5px solid rgba(238, 184, 46, 0.3);
            }

            .ceo-name {
                font-size: 1.8rem;
                text-align: center;
            }

            .ceo-position {
                text-align: center;
                font-size: 1rem;
            }

            .ceo-experience {
                text-align: center;
                padding-left: 0;
                border-left: none;
                border-top: 2px solid #eeb82e;
                border-bottom: 2px solid #eeb82e;
                padding: 10px 0;
            }

            .ceo-quote {
                font-size: 1rem;
                padding: 12px;
            }

            .ceo-contact {
                justify-content: center;
            }

            .category-title {
                font-size: 2rem;
            }

            .team-member-smaller,
            .team-member {
                width: 100%;
                max-width: 320px;
            }

            /* Mobile adjustments for smaller team member cards */
            .team-member-smaller {
                padding: 15px;
            }

            .team-member-img-smaller {
                width: 150px;
                height: 150px;
            }

            .team-member-smaller h3 {
                font-size: 1.1rem;
            }

            .team-member-smaller .bio {
                height: auto;
                margin-bottom: 10px;
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

            /* Team Page very small screens */
            .team-page-title {
                font-size: 2.2rem;
            }

            .team-page-subtitle {
                font-size: 1rem;
            }

            /* CEO Section very small screens */
            .ceo-image {
                width: 160px;
                height: 160px;
            }

            .ceo-name {
                font-size: 1.6rem;
            }

            .ceo-position {
                font-size: 0.9rem;
            }

            .ceo-contact-icon {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
            }

            .category-title {
                font-size: 1.8rem;
            }

            .team-member-img-smaller {
                width: 140px;
                height: 140px;
            }
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

        .dropbtn {
            cursor: pointer;
        }

        .dropbtn .fa-caret-down {
            font-size: 0.8em;
            margin-left: 5px;
        }

        @media screen and (max-width: 768px) {
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
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="main-content">
        <!-- Team Page Header -->
        <div class="team-page-header">
            <h1 class="team-page-title">MEET OUR TEAM</h1>
            <p class="team-page-subtitle">We're a team of professional people who love what we do. We care about the word quality, discipline and team work. Get to know the experts behind Hope Account Specialist.</p>
        </div>

        <!-- CEO Section - SMALLER VERSION -->
        <div class="ceo-section" id="ceo">
            <div class="ceo-container">
                <div class="ceo-image-container">
                    <div class="ceo-image">
                        <img src="img/paul.jpg" alt="CEO - Mark Dela Cruz">
                    </div>
                </div>
                
                <div class="ceo-details">
                    <span class="ceo-badge">Chief Executive Officer</span>
                    <h2 class="ceo-name">Maritess S. Bauto</h2>
                    <div class="ceo-position">Founder & CEO</div>
                    <div class="ceo-experience">20+ Years in Financial Services</div>
                    <p class="ceo-message">With over two decades of experience in financial management and business development, Mark founded Hope Account Specialist with a vision to revolutionize financial services in the Philippines.</p>
                    
                    <div class="ceo-quote">
                        "Our mission is to provide hope through financial solutions that empower individuals and businesses."
                    </div>
                    
                    <div class="ceo-contact">
                        <a href="mailto:mark.delacruz@hopeaccountspecialist.com" class="ceo-contact-icon">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="#" class="ceo-contact-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="tel:+639171234567" class="ceo-contact-icon">
                            <i class="fas fa-phone"></i>
                        </a>
                        <a href="#" class="ceo-contact-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Leadership Section -->
        <div class="team-category" id="leadership">
            <h2 class="category-title">LEADERSHIP TEAM</h2>
            <p class="team-category-description">Our leadership team brings decades of experience in financial management, strategic planning, and business development.</p>
            
            <div class="team-container">
                <div class="team-member">
                    <div class="team-member-img">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="John Smith">
                    </div>
                    <h3>Atty. Israel Bonite</h3>
                    <span class="position">Legal Consultant</span>
                    <span class="experience">blank</span>
                    <p class="bio">John manages daily operations and ensures smooth workflow across all departments at Hope Account Specialist.</p>
                    <div class="team-member-contact">
                        <a href="#" class="contact-icon"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="team-member-img">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Sarah Johnson">
                    </div>
                    <h3>Richcar Fernandez</h3>
                    <span class="position">Executive Officer</span>
                    <span class="experience">blank</span>
                    <p class="bio">Sarah oversees all financial operations and ensures compliance with accounting standards and regulations.</p>
                    <div class="team-member-contact">
                        <a href="#" class="contact-icon"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="team-member-img">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Robert Williams">
                    </div>
                    <h3>Nelson Fernandez</h3>
                    <span class="position">Engineering Dept.</span>
                    <span class="experience">blank</span>
                    <p class="bio">Robert manages daily operations and ensures smooth workflow across all departments.</p>
                    <div class="team-member-contact">
                        <a href="#" class="contact-icon"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
            </div>

            <!-- Additional Leadership Team Members -->
            <div class="team-container" style="margin-top: 30px;">
                <div class="team-member">
                    <div class="team-member-img">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Jane Doe">
                    </div>
                    <h3>Dyna Layco</h3>
                    <span class="position">Team Head</span>
                    <span class="experience">blank</span>
                    <p class="bio">Jane ensures operational excellence and drives process improvements across all teams.</p>
                    <div class="team-member-contact">
                        <a href="#" class="contact-icon"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="team-member-img">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Alex Smith">
                    </div>
                    <h3>Donnabel Cruz</h3>
                    <span class="position">Team Head</span>
                    <span class="experience">blank</span>
                    <p class="bio">Alex leads strategic initiatives and partnerships to expand our service offerings.</p>
                    <div class="team-member-contact">
                        <a href="#" class="contact-icon"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="team-member-img">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Maria Johnson">
                    </div>
                    <h3>Mariel De Guzman</h3>
                    <span class="position">Team Head</span>
                    <span class="experience">blank</span>
                    <p class="bio">Maria oversees talent acquisition and employee development programs.</p>
                    <div class="team-member-contact">
                        <a href="#" class="contact-icon"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Account Specialists Section -->
        <div class="team-category" id="specialists">
            <h2 class="category-title">ACCOUNT SPECIALISTS</h2>
            <p class="team-category-description">Our account specialists are certified professionals dedicated to providing personalized financial solutions.</p>
            
            <div class="team-container">
                <!-- Using the smaller team member cards for account specialists -->
                <!-- First Row - 4 members -->
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Michael Chen">
                    </div>
                    <h3>Michael Chen</h3>
                    <span class="position">Senior Tax Consultant</span>
                    <span class="experience">8+ Years Experience</span>
                    <p class="bio">Specializes in tax planning and preparation for individuals and corporations.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Emily Rodriguez">
                    </div>
                    <h3>Emily Rodriguez</h3>
                    <span class="position">Bookkeeping Manager</span>
                    <span class="experience">7+ Years Experience</span>
                    <p class="bio">Expert in bookkeeping, financial reporting, and QuickBooks implementation.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="David Kim">
                    </div>
                    <h3>David Kim</h3>
                    <span class="position">Financial Analyst</span>
                    <span class="experience">6+ Years Experience</span>
                    <p class="bio">Provides financial analysis and business consulting for growth-oriented companies.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Lisa Wong">
                    </div>
                    <h3>Lisa Wong</h3>
                    <span class="position">Audit Specialist</span>
                    <span class="experience">9+ Years Experience</span>
                    <p class="bio">CPA certified auditor with expertise in financial compliance and risk management.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>

                <!-- Second Row - 4 members -->
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 5">
                    </div>
                    <h3>Member 5</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">5+ Years Experience</span>
                    <p class="bio">Specializes in financial management and client consulting services.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 6">
                    </div>
                    <h3>Member 6</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">4+ Years Experience</span>
                    <p class="bio">Expert in financial reporting and business strategy development.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 7">
                    </div>
                    <h3>Member 7</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">6+ Years Experience</span>
                    <p class="bio">Provides financial analysis and growth strategies for businesses.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 8">
                    </div>
                    <h3>Member 8</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">3+ Years Experience</span>
                    <p class="bio">CPA certified with expertise in financial compliance and auditing.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>

                <!-- Third Row - 4 members -->
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 9">
                    </div>
                    <h3>Member 9</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">7+ Years Experience</span>
                    <p class="bio">Specializes in tax planning and corporate financial management.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 10">
                    </div>
                    <h3>Member 10</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">5+ Years Experience</span>
                    <p class="bio">Expert in bookkeeping and financial software implementation.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 11">
                    </div>
                    <h3>Member 11</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">4+ Years Experience</span>
                    <p class="bio">Provides business consulting and financial strategy development.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 12">
                    </div>
                    <h3>Member 12</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">8+ Years Experience</span>
                    <p class="bio">Specializes in risk management and financial compliance auditing.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>

                <!-- Fourth Row - 4 members -->
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 13">
                    </div>
                    <h3>Member 13</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">6+ Years Experience</span>
                    <p class="bio">Expert in financial analysis and corporate restructuring.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 14">
                    </div>
                    <h3>Member 14</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">5+ Years Experience</span>
                    <p class="bio">Specializes in investment analysis and portfolio management.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 15">
                    </div>
                    <h3>Member 15</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">7+ Years Experience</span>
                    <p class="bio">Expert in international finance and cross-border transactions.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 16">
                    </div>
                    <h3>Member 16</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">4+ Years Experience</span>
                    <p class="bio">Specializes in small business accounting and financial planning.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>

                <!-- Fifth Row - 2 members -->
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 17">
                    </div>
                    <h3>Member 17</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">3+ Years Experience</span>
                    <p class="bio">Expert in digital accounting and financial technology solutions.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Member 18">
                    </div>
                    <h3>Member 18</h3>
                    <span class="position">Account Specialist</span>
                    <span class="experience">5+ Years Experience</span>
                    <p class="bio">Specializes in audit services and financial risk assessment.</p>
                    <div class="team-member-contact-smaller">
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon-smaller"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Support Staff Section -->
        <div class="team-category" id="support">
            <h2 class="category-title">SUPPORT STAFF</h2>
            <p class="team-category-description">Our support team ensures seamless operations and exceptional client service experience.</p>
            
            <div class="team-container">
                <div class="team-member">
                    <div class="team-member-img">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Jennifer Lee">
                    </div>
                    <h3>Jennifer Lee</h3>
                    <span class="position">Client Relations Manager</span>
                    <span class="experience">5+ Years Experience</span>
                    <p class="bio">Dedicated to ensuring client satisfaction and managing client communications.</p>
                    <div class="team-member-contact">
                        <a href="#" class="contact-icon"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="team-member-img">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Kevin Brown">
                    </div>
                    <h3>Kevin Brown</h3>
                    <span class="position">IT & Systems Administrator</span>
                    <span class="experience">4+ Years Experience</span>
                    <p class="bio">Manages our technology infrastructure and ensures data security and system reliability.</p>
                    <div class="team-member-contact">
                        <a href="#" class="contact-icon"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="team-member-img">
                        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="Maria Garcia">
                    </div>
                    <h3>Maria Garcia</h3>
                    <span class="position">Administrative Coordinator</span>
                    <span class="experience">3+ Years Experience</span>
                    <p class="bio">Coordinates office operations and supports our team with administrative tasks.</p>
                    <div class="team-member-contact">
                        <a href="#" class="contact-icon"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="contact-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="contact-icon"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add CEO to dropdown menu
        document.addEventListener('DOMContentLoaded', function() {
            // Find the dropdown content for Meet Our Team
            const meetOurTeamDropdown = document.querySelector('a[href="team.php"]').closest('.dropdown').querySelector('.dropdown-content');
            
            // Add it as the first item in the dropdown
            if (meetOurTeamDropdown && meetOurTeamDropdown.firstChild) {
                meetOurTeamDropdown.insertBefore(ceoLink, meetOurTeamDropdown.firstChild);
            }
        });
    </script>
</body>
</html>