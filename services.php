<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Hope Account Specialist</title>
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

        :root {
            --bank-logo-width: 140px; /* adjust if needed to exactly match BDO */
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

        /* Services Hero Section */
        .services-hero-section {
            padding: 80px 20px;
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            text-align: center;
            color: white;
            border-radius: 15px;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }

        .services-hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80') center/cover;
            opacity: 0.1;
        }

        .services-hero-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3.5rem;
            margin-bottom: 20px;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }

        .services-hero-subtitle {
            font-family: 'WindSong', cursive;
            font-size: 2.5rem;
            color: #eeb82e;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .services-hero-description {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.2rem;
            line-height: 1.8;
            color: #f0f0f0;
            position: relative;
            z-index: 1;
        }

        /* Services Grid Section */
        .services-section {
            padding: 80px 20px;
            background-color: white;
            text-align: center;
        }

        .services-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3rem;
            margin-bottom: 50px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .services-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            padding: 20px;
        }

        .service-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            border: 1px solid #f0f0f0;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(238, 184, 46, 0.15);
            border-color: #eeb82e;
        }

        .service-header {
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .service-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: #eeb82e;
        }

        .service-icon {
            font-size: 3.5rem;
            color: #eeb82e;
            margin-bottom: 20px;
        }

        .service-header h3 {
            color: white;
            font-family: 'Roboto Serif', serif;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .service-tag {
            display: inline-block;
            background: #eeb82e;
            color: #2c2b29;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 5px;
        }

        .service-body {
            padding: 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .service-body p {
            color: #555;
            line-height: 1.7;
            margin-bottom: 20px;
            font-size: 1rem;
            flex-grow: 1;
        }

        .service-features {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .service-features h4 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.1rem;
            color: #2c2b29;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .service-features h4 i {
            color: #eeb82e;
        }

        .service-features ul {
            list-style: none;
            padding: 0;
        }

        .service-features li {
            color: #666;
            margin-bottom: 10px;
            padding-left: 25px;
            position: relative;
            line-height: 1.6;
            text-align: left;
        }

        .service-features li:before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #eeb82e;
            font-weight: bold;
        }

        .service-cta {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .service-btn {
            background: #2c2b29;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .service-btn:hover {
            background: #eeb82e;
            color: #2c2b29;
            transform: scale(1.05);
        }

        /* Process Section */
        .process-section {
            padding: 80px 20px;
            background: linear-gradient(135deg, #f8f8f8 0%, #ffffff 100%);
            text-align: center;
            border-radius: 15px;
            margin: 50px 0;
        }

        .process-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3rem;
            margin-bottom: 50px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .process-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }

        .process-step {
            flex: 1;
            min-width: 200px;
            text-align: center;
            position: relative;
        }

        .process-step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 60px;
            right: -40px;
            width: 40px;
            height: 2px;
            background: #eeb82e;
        }

        .step-number {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            color: #eeb82e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0 auto 20px;
            border: 4px solid #eeb82e;
        }

        .step-content h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.3rem;
            color: #2c2b29;
            margin-bottom: 15px;
        }

        .step-content p {
            color: #666;
            line-height: 1.6;
        }

        /* FAQ Section */
        .faq-section {
            padding: 80px 20px;
            background-color: white;
            text-align: center;
        }

        .faq-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3rem;
            margin-bottom: 50px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: white;
            border-radius: 10px;
            margin-bottom: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border: 1px solid #eee;
        }

        .faq-question {
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            background: white;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: #f9f9f9;
        }

        .faq-question h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.2rem;
            color: #2c2b29;
            text-align: left;
        }

        .faq-icon {
            color: #eeb82e;
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .faq-answer {
            padding: 0 30px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            background: white;
        }

        .faq-item.active .faq-answer {
            padding: 20px 30px;
            max-height: 500px;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq-answer p {
            color: #666;
            line-height: 1.7;
            text-align: left;
        }

        /* CTA Section */
        .cta-section {
            padding: 80px 20px;
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            text-align: center;
            color: white;
            border-radius: 15px;
            margin: 50px 0;
        }

        .cta-title {
            font-family: 'Roboto Serif', serif;
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .cta-description {
            max-width: 600px;
            margin: 0 auto 30px;
            font-size: 1.1rem;
            line-height: 1.7;
            color: #f0f0f0;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .cta-btn {
            background: #eeb82e;
            color: #2c2b29;
            border: none;
            padding: 15px 40px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .cta-btn:hover {
            background: white;
            transform: scale(1.05);
        }

        .cta-btn.secondary {
            background: transparent;
            color: #eeb82e;
            border: 2px solid #eeb82e;
        }

        .cta-btn.secondary:hover {
            background: #eeb82e;
            color: #2c2b29;
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

        .benefits-section {
            padding: 80px 20px;
            background: linear-gradient(135deg, #f8f8f8 0%, #ffffff 100%);
            text-align: center;
            border-radius: 15px;
            margin: 50px 0;
        }

        .benefits-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3rem;
            margin-bottom: 50px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .benefits-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .benefit-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
        }

        .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(238, 184, 46, 0.15);
            border-color: #eeb82e;
        }

        .benefit-icon {
            width: 70px;
            height: 70px;
            background: #2c2b29;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: #eeb82e;
            font-size: 1.8rem;
        }

        .benefit-card h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.3rem;
            color: #2c2b29;
            margin-bottom: 15px;
        }

        .benefit-card p {
            color: #666;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Bank Partners Section */
        .bank-partners-section {
            padding: 80px 20px;
            background-color: white;
            text-align: center;
        }

        .bank-partners-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3rem;
            margin-bottom: 50px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .bank-partners-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 40px;
            padding: 20px;
        }

        .bank-logo {
            background: white;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid #eee;
        }

        .bank-logo:hover {
            transform: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-color: #eee;
        }

        .bank-logo img {
            width: var(--bank-logo-width);
            height: auto;
            max-width: 100%;
            transition: none;
        }


        .bank-logo-group {
            grid-column: 1 / -1;
            display: flex;
            justify-content: center;
            gap: 40px;
            padding: 0 20px;
            align-items: center;
        }

        .bank-logo-group .bank-logo {
            flex: 0 0 auto;
            width: auto;
        }

        .bank-logo-group .bank-logo img {
            width: var(--bank-logo-width);
            height: auto;
            display: block;
            object-fit: contain;
        }

        /* Requirements Section */
        .requirements-section {
            padding: 80px 20px;
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            text-align: center;
            color: white;
            border-radius: 15px;
            margin: 50px 0;
        }

        .requirements-title {
            font-family: 'Roboto Serif', serif;
            font-size: 2.5rem;
            margin-bottom: 40px;
            font-weight: 700;
        }

        .requirements-container {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .requirement-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 25px;
            text-align: left;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(238, 184, 46, 0.2);
        }

        .requirement-card h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.3rem;
            color: #eeb82e;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .requirement-card h3 i {
            font-size: 1.2rem;
        }

        .requirement-list {
            list-style: none;
            padding: 0;
        }

        .requirement-list li {
            color: #f0f0f0;
            margin-bottom: 8px;
            padding-left: 25px;
            position: relative;
            line-height: 1.6;
        }

        .requirement-list li:before {
            content: '•';
            position: absolute;
            left: 10px;
            color: #eeb82e;
            font-size: 1.2rem;
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

            /* Services responsive adjustments */
            .services-hero-title {
                font-size: 2.5rem;
            }

            .services-hero-subtitle {
                font-size: 2rem;
            }

            .services-title,
            .process-title,
            .faq-title,
            .cta-title {
                font-size: 2.2rem;
            }

            .services-container {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 10px;
            }

            .service-card {
                margin: 0 10px;
            }

            .process-container {
                flex-direction: column;
                gap: 40px;
            }

            .process-step:not(:last-child)::after {
                display: none;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .cta-btn {
                width: 100%;
                max-width: 300px;
            }

            .benefits-title,
            .bank-partners-title,
            .requirements-title,
            .testimonials-title {
                font-size: 2.2rem;
            }
            
            .benefits-container,
            .testimonials-container {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 10px;
            }
            
            .bank-partners-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
            
            .requirements-container {
                grid-template-columns: 1fr;
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

            /* Services mobile adjustments */
            .services-hero-title {
                font-size: 2rem;
            }

            .services-hero-subtitle {
                font-size: 1.6rem;
            }

            .services-hero-description {
                font-size: 1rem;
            }

            .services-title,
            .process-title,
            .faq-title,
            .cta-title {
                font-size: 1.8rem;
            }

            .service-header {
                padding: 25px;
            }

            .service-body {
                padding: 20px;
            }

            .step-number {
                width: 100px;
                height: 100px;
                font-size: 2rem;
            }

            .faq-question {
                padding: 15px 20px;
            }

            .faq-question h3 {
                font-size: 1.1rem;
            }

            .benefits-title,
            .bank-partners-title,
            .requirements-title,
            .testimonials-title {
                font-size: 1.8rem;
            }
            
            .benefit-card,
            .testimonial-card,
            .requirement-card {
                padding: 20px;
            }
            
            .bank-partners-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
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
        <!-- Services Hero Section -->
        <div class="services-hero-section">
            <h1 class="services-hero-title">Our Services</h1>
            <p class="services-hero-subtitle">Making your dreams turn into reality</p>
            <p class="services-hero-description">
                At Hope Account Specialist, we provide comprehensive financial solutions tailored to your needs. 
                From auto and housing acquisitions to insurance and loan assistance, we're here to guide you 
                through every step of your financial journey.
            </p>
        </div>

        <!-- Services Grid Section -->
        <div class="services-section">
            <h2 class="services-title">OUR SERVICES</h2>
            
            <div class="services-container">
                <!-- Service 1: Auto Acquisition -->
                <div class="service-card" id="auto-acquisition">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <h3>Auto Acquisition & Loan Assistance</h3>
                        <span class="service-tag">Vehicles</span>
                    </div>
                    <div class="service-body">
                        <p>Comprehensive assistance in acquiring new vehicles with flexible financing options. We help you navigate through loan applications, documentation, and approval processes with our network of banking partners.</p>
                        
                        <div class="service-features">
                            <h4><i class="fas fa-check-circle"></i> What We Offer:</h4>
                            <ul>
                                <li>New car acquisition assistance</li>
                                <li>Loan application processing</li>
                                <li>Bank financing coordination</li>
                                <li>Documentation assistance</li>
                                <li>Insurance package bundling</li>
                                <li>Free consultation and assessment</li>
                                <li>Multiple bank options comparison</li>
                                <li>Special dealer discounts</li>
                            </ul>
                        </div>
                        
                        <div class="service-cta">
                            <button class="service-btn" onclick="scrollToContact()">
                                <i class="fas fa-phone-alt"></i> Inquire Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Service 2: Housing Acquisition -->
                <div class="service-card" id="housing">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3>House & Lot Acquisition & Loan Assistance</h3>
                        <span class="service-tag">Real Estate</span>
                    </div>
                    <div class="service-body">
                        <p>Complete support for your dream home acquisition. From property selection to mortgage processing, we ensure a smooth transaction with our extensive network of real estate developers and financial institutions.</p>
                        
                        <div class="service-features">
                            <h4><i class="fas fa-check-circle"></i> What We Offer:</h4>
                            <ul>
                                <li>Property selection assistance</li>
                                <li>Mortgage loan processing</li>
                                <li>Developer coordination</li>
                                <li>Document preparation</li>
                                <li>Transfer of title assistance</li>
                                <li>Legal documentation support</li>
                                <li>Property appraisal coordination</li>
                                <li>Home loan pre-approval</li>
                            </ul>
                        </div>
                        
                        <div class="service-cta">
                            <button class="service-btn" onclick="scrollToContact()">
                                <i class="fas fa-phone-alt"></i> Inquire Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Service 3: Car Insurance -->
                <div class="service-card" id="car-insurance">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Car Insurance</h3>
                        <span class="service-tag">Insurance</span>
                    </div>
                    <div class="service-body">
                        <p>Comprehensive car insurance solutions from top providers. We offer various coverage options including comprehensive, third-party liability, and personal accident benefits tailored to your needs and budget.</p>
                        
                        <div class="service-features">
                            <h4><i class="fas fa-check-circle"></i> Coverage Options:</h4>
                            <ul>
                                <li>Comprehensive coverage</li>
                                <li>Third-party liability</li>
                                <li>Acts of nature protection</li>
                                <li>Personal accident benefits</li>
                                <li>24/7 Roadside assistance</li>
                                <li>Theft and fire protection</li>
                                <li>Medical expenses coverage</li>
                                <li>Excess waiver options</li>
                            </ul>
                        </div>
                        
                        <div class="service-cta">
                            <button class="service-btn" onclick="scrollToContact()">
                                <i class="fas fa-phone-alt"></i> Get Quote
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Service 4: Housing Insurance -->
                <div class="service-card" id="housing-insurance">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3>Housing Insurance</h3>
                        <span class="service-tag">Insurance</span>
                    </div>
                    <div class="service-body">
                        <p>Protect your home investment with comprehensive housing insurance. We provide coverage for fire, natural disasters, theft, and liability, ensuring your property is protected against unforeseen events.</p>
                        
                        <div class="service-features">
                            <h4><i class="fas fa-check-circle"></i> Coverage Options:</h4>
                            <ul>
                                <li>Fire and lightning protection</li>
                                <li>Natural disaster coverage</li>
                                <li>Theft and burglary protection</li>
                                <li>Liability coverage</li>
                                <li>Additional living expenses</li>
                                <li>Personal property coverage</li>
                                <li>Building structure protection</li>
                                <li>Emergency repair coverage</li>
                            </ul>
                        </div>
                        
                        <div class="service-cta">
                            <button class="service-btn" onclick="scrollToContact()">
                                <i class="fas fa-phone-alt"></i> Get Quote
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Service 5: Life Insurance -->
                <div class="service-card" id="life-insurance">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>Life Insurance</h3>
                        <span class="service-tag">Insurance</span>
                    </div>
                    <div class="service-body">
                        <p>Secure your family's future with our life insurance solutions. We offer term life, whole life, and investment-linked insurance policies that provide financial protection and peace of mind for your loved ones.</p>
                        
                        <div class="service-features">
                            <h4><i class="fas fa-check-circle"></i> Policy Types:</h4>
                            <ul>
                                <li>Term life insurance</li>
                                <li>Whole life insurance</li>
                                <li>Investment-linked policies</li>
                                <li>Critical illness coverage</li>
                                <li>Accidental death benefits</li>
                                <li>Retirement planning</li>
                                <li>Education fund plans</li>
                                <li>Health and hospitalization</li>
                            </ul>
                        </div>
                        
                        <div class="service-cta">
                            <button class="service-btn" onclick="scrollToContact()">
                                <i class="fas fa-phone-alt"></i> Get Protected
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Service 6: Second Hand Car Loans -->
                <div class="service-card" id="second-hand">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-car-side"></i>
                        </div>
                        <h3>Second Hand Car Loan Assistance</h3>
                        <span class="service-tag">Used Vehicles</span>
                    </div>
                    <div class="service-body">
                        <p>Specialized assistance for pre-owned vehicle financing. We help you find the best loan options for used cars, with competitive rates and flexible terms from our partner banks and financing companies.</p>
                        
                        <div class="service-features">
                            <h4><i class="fas fa-check-circle"></i> What We Offer:</h4>
                            <ul>
                                <li>Used car loan processing</li>
                                <li>Vehicle inspection coordination</li>
                                <li>Bank financing for pre-owned cars</li>
                                <li>Document verification assistance</li>
                                <li>Transfer of ownership support</li>
                                <li>Vehicle history check</li>
                                <li>Mechanical inspection arrangement</li>
                                <li>Price negotiation assistance</li>
                            </ul>
                        </div>
                        
                        <div class="service-cta">
                            <button class="service-btn" onclick="scrollToContact()">
                                <i class="fas fa-phone-alt"></i> Apply Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Service 7: Sangla Title & OR/CR -->
                <div class="service-card" id="sangla">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <h3>Sangla Title & OR/CR</h3>
                        <span class="service-tag">Documentation</span>
                    </div>
                    <div class="service-body">
                        <p>Assistance with title and registration document collateralization. We help facilitate legitimate and secure transactions involving vehicle documents as loan collateral with proper legal documentation.</p>
                        
                        <div class="service-features">
                            <h4><i class="fas fa-check-circle"></i> Services Include:</h4>
                            <ul>
                                <li>Document verification</li>
                                <li>Legal documentation assistance</li>
                                <li>Collateral agreement processing</li>
                                <li>Registration renewal reminders</li>
                                <li>Secure storage options</li>
                                <li>Loan amount assessment</li>
                                <li>Interest rate negotiation</li>
                                <li>Document safekeeping services</li>
                            </ul>
                        </div>
                        
                        <div class="service-cta">
                            <button class="service-btn" onclick="scrollToContact()">
                                <i class="fas fa-phone-alt"></i> Learn More
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Service 8: Trade In -->
                <div class="service-card" id="trade-in">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <h3>Trade In</h3>
                        <span class="service-tag">Vehicle Exchange</span>
                    </div>
                    <div class="service-body">
                        <p>Upgrade your vehicle through our trade-in program. We offer fair market valuation, seamless transaction processing, and convenient arrangements for trading in your old vehicle for a new one.</p>
                        
                        <div class="service-features">
                            <h4><i class="fas fa-check-circle"></i> Trade-In Process:</h4>
                            <ul>
                                <li>Vehicle appraisal and valuation</li>
                                <li>Paperwork processing</li>
                                <li>Balance financing assistance</li>
                                <li>New vehicle selection support</li>
                                <li>Seamless ownership transfer</li>
                                <li>Free vehicle inspection</li>
                                <li>Best value guarantee</li>
                                <li>Quick transaction processing</li>
                            </ul>
                        </div>
                        
                        <div class="service-cta">
                            <button class="service-btn" onclick="scrollToContact()">
                                <i class="fas fa-phone-alt"></i> Trade Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Process Section -->
        <div class="process-section">
            <h2 class="process-title">HOW IT WORKS</h2>
            
            <div class="process-container">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Consultation</h3>
                        <p>Free initial consultation to understand your needs and financial capabilities.</p>
                    </div>
                </div>
                
                <div class="process-step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Documentation</h3>
                        <p>Assistance in preparing and submitting all required documents.</p>
                    </div>
                </div>
                
                <div class="process-step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Processing</h3>
                        <p>Efficient processing of applications with our banking and insurance partners.</p>
                    </div>
                </div>
                
                <div class="process-step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Approval</h3>
                        <p>Coordination until approval and completion of your transaction.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="benefits-section">
            <h2 class="benefits-title">WHY CHOOSE US</h2>
            
            <div class="benefits-container">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Expert Guidance</h3>
                    <p>Our experienced specialists provide personalized advice to help you make informed decisions.</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Wide Network</h3>
                    <p>Strong relationships with major banks, insurance companies, and dealerships nationwide.</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Fast Processing</h3>
                    <p>Streamlined processes ensure quick approval and completion of your transactions.</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Secure Transactions</h3>
                    <p>Your data and transactions are protected with the highest security standards.</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Excellent Service</h3>
                    <p>Dedicated support from consultation to completion of your financial needs.</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <h3>Competitive Rates</h3>
                    <p>Access to the best loan and insurance rates through our partner networks.</p>
                </div>
            </div>
        </div>

        <!-- Bank Partners Section -->
        <div class="bank-partners-section">
    <h2 class="bank-partners-title">OUR BANKING PARTNERS</h2>

            <div class="bank-partners-container">
                <div class="bank-logo">
                    <a href="https://www.bdo.com.ph" target="_blank" rel="noopener noreferrer">
                        <img src="img/bdo.jpg.webp" alt="BDO">
                    </a>
                </div>

                <div class="bank-logo">
                    <a href="https://www.bpi.com.ph" target="_blank" rel="noopener noreferrer">
                        <img src="img/bpi.jpg" alt="BPI">
                    </a>
                </div>

                <div class="bank-logo">
                    <a href="https://www.cbs.com.ph" target="_blank" rel="noopener noreferrer">
                        <img src="img/cbs.jpg" alt="CBS">
                    </a>
                </div>

                <div class="bank-logo">
                    <a href="https://www.chinabank.ph" target="_blank" rel="noopener noreferrer">
                        <img src="img/chinabank.jpg" alt="China Bank">
                    </a>
                </div>

                <div class="bank-logo">
                    <a href="https://www.eastwestbanker.com" target="_blank" rel="noopener noreferrer">
                        <img src="img/eastwest.jpg" alt="EastWest Bank">
                    </a>
                </div>

                <div class="bank-logo">
                    <a href="https://www.ldb.com.ph" target="_blank" rel="noopener noreferrer">
                        <img src="img/ldb.png" alt="LDB">
                    </a>
                </div>

                <div class="bank-logo">
                    <a href="https://www.maybank.com.ph" target="_blank" rel="noopener noreferrer">
                        <img src="img/Maybank-logo.svg" alt="Maybank">
                    </a>
                </div>

                <div class="bank-logo">
                    <a href="https://www.metrobank.com.ph" target="_blank" rel="noopener noreferrer">
                        <img src="img/metrobank.png" alt="Metrobank">
                    </a>
                </div>

                <div class="bank-logo">
                    <a href="https://www.pbcom.com.ph" target="_blank" rel="noopener noreferrer">
                        <img src="img/pbcom.png" alt="PBCOM">
                    </a>
                </div>

                <div class="bank-logo">
                    <a href="https://www.psbank.com.ph" target="_blank" rel="noopener noreferrer">
                        <img src="img/psbank.png" alt="PSBank">
                    </a>
                </div>

                <div class="bank-logo-group">
                    <div class="bank-logo">
                        <a href="https://www.rcbc.com" target="_blank" rel="noopener noreferrer">
                            <img src="img/rcbc.png" alt="RCBC">
                        </a>
                    </div>

                    <div class="bank-logo">
                        <a href="https://www.securitybank.com" target="_blank" rel="noopener noreferrer">
                            <img src="img/securitybank.png" alt="Security Bank">
                        </a>
                    </div>

                    <div class="bank-logo">
                        <a href="https://www.unionbankph.com" target="_blank" rel="noopener noreferrer">
                            <img src="img/unionbank.png" alt="UnionBank">
                        </a>
                    </div>
                </div>
            </div>
        </div>

            </div>
        </div>
            </div>
        </div>

        <!-- Requirements Section -->
        <div class="requirements-section">
            <h2 class="requirements-title">GENERAL REQUIREMENTS</h2>
            
            <div class="requirements-container">
                <div class="requirement-card">
                    <h3><i class="fas fa-id-card"></i> Basic Requirements</h3>
                    <ul class="requirement-list">
                        <li>2 Valid IDs (Government Issued)</li>
                        <li>Proof of Billing Address</li>
                        <li>Proof of Income/Employment</li>
                        <li>Latest 3 months Bank Statements</li>
                        <li>ITR (For self-employed)</li>
                        <li>Certificate of Employment</li>
                    </ul>
                </div>
                
                <div class="requirement-card">
                    <h3><i class="fas fa-car"></i> For Vehicle Loans</h3>
                    <ul class="requirement-list">
                        <li>Valid Driver's License</li>
                        <li>Vehicle Specifications</li>
                        <li>Proof of Downpayment</li>
                        <li>Insurance Requirements</li>
                        <li>Dealer Quotation</li>
                        <li>Vehicle Inspection Report</li>
                    </ul>
                </div>
                
                <div class="requirement-card">
                    <h3><i class="fas fa-home"></i> For Housing Loans</h3>
                    <ul class="requirement-list">
                        <li>Property Documents</li>
                        <li>Tax Declaration</li>
                        <li>Tax Receipts</li>
                        <li>Title of Property</li>
                        <li>Location Plan</li>
                        <li>Appraisal Documents</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <h2 class="faq-title">FREQUENTLY ASKED QUESTIONS</h2>
            
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <h3>How long does the loan approval process take?</h3>
                        <div class="faq-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>The loan approval process typically takes 3-5 working days for complete documentation. However, this may vary depending on the bank's requirements and your credit profile. We work to expedite the process through our established relationships with banking partners.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <h3>What documents are needed for auto loan applications?</h3>
                        <div class="faq-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Typically required documents include: valid IDs, proof of income (latest payslip, ITR, or COE), proof of billing, and bank statements. For self-employed individuals, additional business documents may be required. We provide a complete checklist during consultation.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <h3>Can I get insurance without purchasing a vehicle or property?</h3>
                        <div class="faq-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, you can purchase standalone insurance policies for existing vehicles or properties. We offer various insurance products that can be purchased separately from acquisition services.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <h3>Do you offer services for business/commercial vehicles?</h3>
                        <div class="faq-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we provide services for both personal and commercial vehicles. We have specialized programs for fleet acquisition, commercial vehicle loans, and business insurance packages.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <h3>What makes your services different from going directly to banks?</h3>
                        <div class="faq-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>We offer multiple bank options, comparative rate analysis, personalized guidance, and handle all documentation and coordination. Our expertise helps you get the best deals and avoids common pitfalls in the application process.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <h3>What if I have a low credit score?</h3>
                        <div class="faq-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>We work with various banks and financing institutions that have different credit requirements. We can help you explore options and provide guidance on improving your credit profile for better loan terms.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-section">
            <h2 class="cta-title">Ready to Get Started?</h2>
            <p class="cta-description">
                Let us help you make your dreams a reality. Contact us today for a free consultation 
                and discover how we can assist you with your financial needs.
            </p>
            <div class="cta-buttons">
                <button class="cta-btn" onclick="scrollToContact()">
                    <i class="fas fa-phone-alt"></i> Contact Us Now
                </button>
                <button class="cta-btn secondary" onclick="window.location.href='index.php#contact'">
                    <i class="fas fa-envelope"></i> Send Message
                </button>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        // FAQ toggle functionality
        function toggleFAQ(element) {
            const faqItem = element.closest('.faq-item');
            faqItem.classList.toggle('active');
        }

        // Scroll to contact function
        function scrollToContact() {
            window.location.href = 'contact.php';
        }

        // Service card hover effect
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Service button click handlers
        document.querySelectorAll('.service-btn').forEach(button => {
            button.addEventListener('click', function() {
                const serviceTitle = this.closest('.service-card').querySelector('h3').textContent;
                alert(`Thank you for your interest in our "${serviceTitle}" service! We will contact you shortly to discuss your requirements.`);
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>