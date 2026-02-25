<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>Contact Us - Hope Account Specialist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&family=WindSong:wght@400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/logo.png">
    
    <style>
        /* === FIXED: Para iisa lang ang scrollbar (default browser scroll lang) === */
        html {
            overflow-x: hidden;
            overflow-y: auto; /* Default browser scroll */
            width: 100%;
            height: 100%;
        }

        body {
            background-color: white;
            min-height: 100%;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            overflow-y: visible; /* Huwag gumawa ng sariling scroll */
            width: 100%;
            position: relative;
        }

        /* ADD THESE STYLES AT THE TOP OF YOUR STYLE SECTION */
        .alert-message {
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 5px;
            z-index: 9999;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.3s ease-out;
            max-width: 400px;
        }
        
        .alert-success {
            background: #28a745;
            color: white;
            border-left: 4px solid #1e7e34;
        }
        
        .alert-error {
            background: #dc3545;
            color: white;
            border-left: 4px solid #c82333;
        }
        
        .alert-warning {
            background: #ffc107;
            color: #212529;
            border-left: 4px solid #e0a800;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        .alert-message.fade-out {
            animation: slideOut 0.5s ease-out forwards;
        }
        
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
        
        .alert-close {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            margin-left: 10px;
            font-size: 18px;
            opacity: 0.8;
        }
        
        .alert-close:hover {
            opacity: 1;
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
        .stagger-children {
            opacity: 1 !important;
            transform: none !important;
        }

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

        .stagger-children.active > *:nth-child(7) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.7s;
        }

        .stagger-children.active > *:nth-child(8) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.8s;
        }

        .stagger-children.active > *:nth-child(9) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.9s;
        }

        .stagger-children.active > *:nth-child(10) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 1s;
        }

        /* Pulse animation */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* REST OF YOUR EXISTING STYLES... */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Main content styling */
        .main-content {
            padding: 100px 20px 20px;
            max-width: 1200px;
            margin: 0 auto;
            flex: 1;
            width: 100%;
            overflow: visible; /* IMPORTANT: Huwag magkaroon ng scroll */
        }

        /* === FIXED: Para hindi matabunan ng navbar ang content === */
        body {
            padding-top: var(--nav-height, 70px);
        }

        /* Contact Page Header */
        .contact-page-header {
            text-align: center;
            padding: 40px 20px 60px;
            background-color: white;
            width: 100%;
            overflow: visible;
        }

        .contact-page-title {
            font-family: 'Roboto Serif', serif;
            font-size: 4rem;
            margin-bottom: 20px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .contact-page-subtitle {
            font-family: 'Roboto Serif', serif;
            font-size: 1.5rem;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Contact Container */
        .contact-container {
            display: flex;
            flex-wrap: wrap;
            gap: 50px;
            margin-bottom: 80px;
            width: 100%;
            overflow: visible;
        }

        /* Contact Form */
        .contact-form-section {
            flex: 1;
            min-width: 300px;
            overflow: visible;
        }

        .contact-form-section h2 {
            font-family: 'Roboto Serif', serif;
            font-size: 2.2rem;
            color: #2c2b29;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid #eeb82e;
        }

        .contact-form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            width: 100%;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c2b29;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #eeb82e;
            outline: none;
            box-shadow: 0 0 0 2px rgba(238, 184, 46, 0.2);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: #2c2b29;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .submit-btn:hover {
            background: #eeb82e;
            color: #2c2b29;
            transform: translateY(-2px);
        }

        /* Contact Information */
        .contact-info-section {
            flex: 1;
            min-width: 300px;
            overflow: visible;
        }

        .contact-info-section h2 {
            font-family: 'Roboto Serif', serif;
            font-size: 2.2rem;
            color: #2c2b29;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid #eeb82e;
        }

        .contact-info {
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            height: auto;
            width: 100%;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .info-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background: #f8f8f8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: #eeb82e;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .info-content h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.3rem;
            color: #2c2b29;
            margin-bottom: 8px;
        }

        .info-content p {
            color: #555;
            line-height: 1.6;
            font-size: 1rem;
        }

        .info-content a {
            color: #2c2b29;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .info-content a:hover {
            color: #eeb82e;
        }

        /* Social Media Links */
        .social-media {
            margin-top: 30px;
        }

        .social-media h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.3rem;
            color: #2c2b29;
            margin-bottom: 20px;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .social-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #f8f8f8;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c2b29;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: #eeb82e;
            color: white;
            transform: translateY(-3px);
        }

        /* Map Section */
        .map-section {
            margin-bottom: 80px;
            width: 100%;
            overflow: visible;
        }

        .map-section h2 {
            font-family: 'Roboto Serif', serif;
            font-size: 2.5rem;
            color: #2c2b29;
            margin-bottom: 30px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .map-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            height: 400px;
            width: 100%;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* FAQ Section */
        .faq-section {
            margin-bottom: 80px;
            width: 100%;
            overflow: visible;
        }

        .faq-section h2 {
            font-family: 'Roboto Serif', serif;
            font-size: 2.5rem;
            color: #2c2b29;
            margin-bottom: 40px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
            width: 100%;
        }

        .faq-item {
            background: white;
            margin-bottom: 15px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.05);
        }

        .faq-question {
            padding: 20px 30px;
            background: #f8f8f8;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: #2c2b29;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        .faq-question:hover {
            background: #f0f0f0;
        }

        .faq-question.active {
            background: #eeb82e;
            color: #2c2b29;
        }

        .faq-question i {
            transition: transform 0.3s ease;
        }

        .faq-question.active i {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0 30px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .faq-answer.active {
            padding: 20px 30px;
            max-height: 500px;
        }

        .faq-answer p {
            color: #555;
            line-height: 1.7;
            font-size: 1rem;
        }

        /* Mobile Responsive Styles */
        @media screen and (max-width: 768px) {
            .main-content {
                padding: 80px 15px 15px;
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

            /* Contact Page mobile adjustments */
            .contact-page-title {
                font-size: 2.8rem;
            }

            .contact-page-subtitle {
                font-size: 1.2rem;
                padding: 0 10px;
            }

            .contact-container {
                gap: 30px;
            }

            .contact-form-section h2,
            .contact-info-section h2 {
                font-size: 1.8rem;
            }

            .map-section h2,
            .faq-section h2 {
                font-size: 2rem;
            }

            .map-container {
                height: 300px;
            }
            
            /* Alert message mobile adjustment */
            .alert-message {
                top: 80px;
                left: 20px;
                right: 20px;
                max-width: none;
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

            /* Contact Page very small screens */
            .contact-page-title {
                font-size: 2.2rem;
            }

            .contact-page-subtitle {
                font-size: 1rem;
            }

            .contact-form,
            .contact-info {
                padding: 20px;
            }

            .info-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-icon {
                margin-bottom: 15px;
            }

            .social-icons {
                justify-content: center;
            }
        }

        /* Dropdown Styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            cursor: pointer;
        }

        .dropbtn .fa-caret-down {
            font-size: 0.8em;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <?php 
    include 'navbar.php'; 
    
    // Check for messages from contact_process.php
    $alert_type = '';
    $alert_message = '';
    
    if (isset($_SESSION['contact_success'])) {
        $alert_type = 'success';
        $alert_message = $_SESSION['contact_success'];
        unset($_SESSION['contact_success']);
    } elseif (isset($_SESSION['contact_error'])) {
        $alert_type = 'error';
        $alert_message = $_SESSION['contact_error'];
        unset($_SESSION['contact_error']);
    }
    ?>

    <!-- Alert Message Container -->
    <?php if ($alert_message): ?>
    <div id="alert-message" class="alert-message alert-<?php echo $alert_type; ?>">
        <i class="fas <?php echo $alert_type == 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'; ?>"></i>
        <span><?php echo htmlspecialchars($alert_message); ?></span>
        <button class="alert-close" onclick="closeAlert()">&times;</button>
    </div>
    <?php endif; ?>

    <div class="main-content">
        <!-- Contact Page Header -->
        <div class="contact-page-header fade-in">
            <h1 class="contact-page-title slide-up">CONTACT US</h1>
            <p class="contact-page-subtitle fade-in">We're here to help you with all your accounting and financial needs. Get in touch with us today for a consultation.</p>
        </div>

        <!-- Contact Container -->
        <div class="contact-container">
            <!-- Contact Form -->
            <div class="contact-form-section fade-in-left">
                <h2 class="slide-up">Send Us a Message</h2>
                <form class="contact-form zoom-in" method="POST" action="contact_process.php">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required 
                               value="<?php echo isset($_SESSION['form_data']['name']) ? htmlspecialchars($_SESSION['form_data']['name']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required
                               value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone"
                               value="<?php echo isset($_SESSION['form_data']['phone']) ? htmlspecialchars($_SESSION['form_data']['phone']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="service">Service Interested In</label>
                        <select id="service" name="service">
                            <option value="">Select a service</option>
                            <option value="Auto acquisition and loan assistance" <?php echo (isset($_SESSION['form_data']['service']) && $_SESSION['form_data']['service'] == 'Auto acquisition and loan assistance') ? 'selected' : ''; ?>>Auto acquisition and loan assistance</option>
                            <option value="House and lot acquisition and loan assistance" <?php echo (isset($_SESSION['form_data']['service']) && $_SESSION['form_data']['service'] == 'House and lot acquisition and loan assistance') ? 'selected' : ''; ?>>House and lot acquisition and loan assistance</option>
                            <option value="Car Insurance" <?php echo (isset($_SESSION['form_data']['service']) && $_SESSION['form_data']['service'] == 'Car Insurance') ? 'selected' : ''; ?>>Car Insurance</option>
                            <option value="Housing Insurance" <?php echo (isset($_SESSION['form_data']['service']) && $_SESSION['form_data']['service'] == 'Housing Insurance') ? 'selected' : ''; ?>>Housing Insurance</option>
                            <option value="Life Insurance" <?php echo (isset($_SESSION['form_data']['service']) && $_SESSION['form_data']['service'] == 'Life Insurance') ? 'selected' : ''; ?>>Life Insurance</option>
                            <option value="Second hand car loan assistance" <?php echo (isset($_SESSION['form_data']['service']) && $_SESSION['form_data']['service'] == 'Second hand car loan assistance') ? 'selected' : ''; ?>>Second hand car loan assistance</option>
                            <option value="Sangla title and OR/CR" <?php echo (isset($_SESSION['form_data']['service']) && $_SESSION['form_data']['service'] == 'Sangla title and OR/CR') ? 'selected' : ''; ?>>Sangla title and OR/CR</option>
                            <option value="Trade In" <?php echo (isset($_SESSION['form_data']['service']) && $_SESSION['form_data']['service'] == 'Trade In') ? 'selected' : ''; ?>>Trade In</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" required><?php echo isset($_SESSION['form_data']['message']) ? htmlspecialchars($_SESSION['form_data']['message']) : ''; ?></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="contact-info-section fade-in-right">
                <h2 class="slide-up">Get In Touch</h2>
                <div class="contact-info">
                    <div class="info-item zoom-in">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Our Address</h3>
                            <p>Brgy. Concepcion, Maharlika Hi-way Cabanatuan City<br>Philippines</p>
                        </div>
                    </div>
                    
                    <div class="info-item zoom-in">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h3>Phone Number</h3>
                            <p>
                                <a href="tel:+63281234567">(02) 8123-4567</a><br>
                                <a href="tel:+639171234567">(+63) 917-123-4567</a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="info-item zoom-in">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h3>Email Address</h3>
                            <p>
                                <a href="mailto:hopeacct2022@gmail.com">Hopeacct2022@gmail.com</a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="info-item zoom-in">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h3>Office Hours</h3>
                            <p>
                                Monday - Friday: 8:00 AM - 5:00 PM<br>
                                Saturday: TBA<br>
                                Sunday: Closed
                            </p>
                        </div>
                    </div>
                    
                    <div class="social-media">
                        <h3 class="slide-up">Follow Us</h3>
                        <div class="social-icons stagger-children">
                            <a href="#" class="social-icon zoom-in"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon zoom-in"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon zoom-in"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-icon zoom-in"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-section fade-in">
            <h2 class="slide-up">Our Location</h2>
            <div class="map-container zoom-in">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3695.2115238100278!2d120.94901047494177!3d15.461642785133227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397292538bd747f%3A0x1467ee17429693ed!2sAutoloan%20Pro%20by%20Hope%20Account%20Specialist!5e1!3m2!1sen!2sph!4v1766729310091!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section fade-in">
            <h2 class="slide-up">Frequently Asked Questions</h2>
            <div class="faq-container stagger-children">
                <!-- FAQ Item 1 -->
                <div class="faq-item zoom-in">
                    <div class="faq-question">
                        <span>How quickly can you respond to my inquiry?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We strive to respond to all inquiries within 24 hours during business days. For urgent matters, please call us directly at our phone numbers listed above.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="faq-item zoom-in">
                    <div class="faq-question">
                        <span>Do you offer free initial consultations?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we offer a free 30-minute consultation for new clients to discuss your accounting needs and how we can help your business.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="faq-item zoom-in">
                    <div class="faq-question">
                        <span>What are your service fees?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our fees vary based on the services required and the complexity of your financial situation. We provide customized quotes after our initial consultation.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="faq-item zoom-in">
                    <div class="faq-question">
                        <span>Do you work with businesses outside of your local area?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we serve clients nationwide and can work remotely using secure online tools for document sharing and communication.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 5 -->
                <div class="faq-item zoom-in">
                    <div class="faq-question">
                        <span>What documents should I prepare for our first meeting?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>For our initial consultation, please bring any recent financial statements, tax returns, and a list of your current accounting challenges or goals.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
    // Clear form data from session
    if (isset($_SESSION['form_data'])) {
        unset($_SESSION['form_data']);
    }
    ?>
    
    <?php include 'footer.php'; ?>

    <script>
        // Alert message functions
        function closeAlert() {
            const alert = document.getElementById('alert-message');
            if (alert) {
                alert.classList.add('fade-out');
                setTimeout(() => {
                    alert.remove();
                }, 500);
            }
        }
        
        // Auto-hide alert after 5 seconds
        setTimeout(() => {
            closeAlert();
        }, 5000);
        
        // Close alert when clicking outside
        document.addEventListener('click', function(e) {
            const alert = document.getElementById('alert-message');
            if (alert && !alert.contains(e.target)) {
                closeAlert();
            }
        });

        // FAQ Accordion Functionality
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const isActive = question.classList.contains('active');
                
                // Close all other FAQ items
                document.querySelectorAll('.faq-question').forEach(q => {
                    q.classList.remove('active');
                    q.nextElementSibling.classList.remove('active');
                });
                
                // Open current FAQ item if it wasn't active
                if (!isActive) {
                    question.classList.add('active');
                    answer.classList.add('active');
                }
            });
        });

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

        // SCROLL ANIMATION FUNCTIONALITY
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right, .zoom-in, .rotate-in, .slide-up, .stagger-children');
            
            function checkScroll() {
                const windowHeight = window.innerHeight;
                const triggerPoint = windowHeight * 0.8; // 80% ng window height
                
                animatedElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    
                    if (elementTop < triggerPoint) {
                        element.classList.add('active');
                    }
                });
            }
            
            // Initial check
            checkScroll();
            
            // Check on scroll with throttling for performance
            let isScrolling = false;
            window.addEventListener('scroll', function() {
                if (!isScrolling) {
                    window.requestAnimationFrame(function() {
                        checkScroll();
                        isScrolling = false;
                    });
                    isScrolling = true;
                }
            });
        });
    </script>
</body>
</html>