<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Hope Account Specialist</title>
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

        /* Contact Page Header */
        .contact-page-header {
            text-align: center;
            padding: 40px 20px 60px;
            background-color: white;
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
        }

        /* Contact Form */
        .contact-form-section {
            flex: 1;
            min-width: 300px;
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
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            height: 100%;
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
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* FAQ Section */
        .faq-section {
            margin-bottom: 80px;
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
        <!-- Contact Page Header -->
        <div class="contact-page-header">
            <h1 class="contact-page-title">CONTACT US</h1>
            <p class="contact-page-subtitle">We're here to help you with all your accounting and financial needs. Get in touch with us today for a consultation.</p>
        </div>

        <!-- Contact Container -->
        <div class="contact-container">
            <!-- Contact Form -->
            <div class="contact-form-section">
                <h2>Send Us a Message</h2>
                <form class="contact-form" id="contactForm">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    
                    <div class="form-group">
                        <label for="service">Service Interested In</label>
                        <select id="service" name="service">
                            <option value="">Select a service</option>
                            <option value="loanassistance">Auto acquisition and loan assistance</option>
                            <option value="houseandlotloan">House and lot acquisition and loan assistance</option>
                            <option value="carinsurance">Car Insurance</option>
                            <option value="houseinsurance">Housing Insurance</option>
                            <option value="lifeinsurance">Life Insurance</option>
                            <option value="secondhandcarloan">Second hand car loan assistance</option>
                            <option value="sanglaorcr">Sangla title and OR/CR</option>
                            <option value="tradein">Trade In</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="contact-info-section">
                <h2>Get In Touch</h2>
                <div class="contact-info">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Our Address</h3>
                            <p>Brgy. Concepcion, Maharlika Hi-way Cabanatuan City<br>Philippines</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
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
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h3>Email Address</h3>
                            <p>
                                <a href="mailto:hopeacct2022@gmail.com">hopeacct2022@gmail.com</a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="info-item">
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
                        <h3>Follow Us</h3>
                        <div class="social-icons">
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-section">
            <h2>Our Location</h2>
            <div class="map-container">
                <!-- You can replace this with an actual Google Maps embed code -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3695.2115238100278!2d120.94901047494177!3d15.461642785133227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397292538bd747f%3A0x1467ee17429693ed!2sAutoloan%20Pro%20by%20Hope%20Account%20Specialist!5e1!3m2!1sen!2sph!4v1766729310091!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-container">
                <!-- FAQ Item 1 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How quickly can you respond to my inquiry?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We strive to respond to all inquiries within 24 hours during business days. For urgent matters, please call us directly at our phone numbers listed above.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you offer free initial consultations?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we offer a free 30-minute consultation for new clients to discuss your accounting needs and how we can help your business.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What are your service fees?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our fees vary based on the services required and the complexity of your financial situation. We provide customized quotes after our initial consultation.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you work with businesses outside of your local area?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we serve clients nationwide and can work remotely using secure online tools for document sharing and communication.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 5 -->
                <div class="faq-item">
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

    <?php include 'footer.php'; ?>

    <script>
        // Contact Form Submission
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get form values
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const service = document.getElementById('service').value;
                
                // Show success message
                alert(`Thank you ${name}! Your message has been sent successfully. We will contact you at ${email} regarding your interest in ${service || 'our services'} within 24 hours.`);
                
                // Reset form
                contactForm.reset();
            });
        }

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
    </script>
</body>
</html>