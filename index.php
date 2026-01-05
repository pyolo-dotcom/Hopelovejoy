<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hope Account Specialist</title>
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

        /* Brand Name (Left) */
        .brand-name {
            color: #eeb82e;
            font-weight: 900;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            z-index: 11;
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

        .nav-links a:hover {
            color: #fff;
        }

        /* Center Logo "Dip" Effect */
        .logo-container {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
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
        }

        .logo-circle img {
            width: 120px;
            height: auto;
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

        /* Main content styling */
        .main-content {
            padding: 100px 20px 20px;
            max-width: 1200px;
            margin: 0 auto;
            flex: 1;
            width: 100%;
        }

        /* Hero Carousel Section */
        .hero-carousel-section {
            padding: 0;
            margin-bottom: 30px;
            position: relative;
            min-height: 80vh;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
        }

        .hero-carousel-container {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .hero-carousel-track {
            display: flex;
            height: 100%;
            transition: transform 0.8s ease-in-out;
        }

        .hero-carousel-slide {
            min-width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 50px;
            gap: 50px;
            flex-wrap: wrap;
        }

        .hero-text-content {
            flex: 1;
            min-width: 300px;
        }

        .hero-text-content h1 {
            color: #2c2b29;
            margin-bottom: 15px;
            font-size: 5rem;
            font-family: 'Roboto Serif', serif;
            font-weight: 700;
            line-height: 1.2;
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .hero-text-content p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
            font-family: 'WindSong', cursive;
            font-size: 3.2rem;
            font-weight: 500;
            color: #eeb82e;
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease 0.2s, transform 0.8s ease 0.2s;
        }

        .hero-carousel-slide.active .hero-text-content h1,
        .hero-carousel-slide.active .hero-text-content p {
            opacity: 1;
            transform: translateY(0);
        }

        .hero-carousel-slide img {
            width: 400px;
            height: auto;
            border-radius: 10px;
            flex: 1;
            max-width: 500px;
            opacity: 0;
            transform: translateX(30px);
            transition: opacity 0.8s ease 0.4s, transform 0.8s ease 0.4s;
        }

        .hero-carousel-slide.active img {
            opacity: 1;
            transform: translateX(0);
        }

        /* Hero Carousel Navigation */
        .hero-carousel-nav {
            position: absolute;
            bottom: 30px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            z-index: 100;
        }

        .hero-carousel-btn {
            background: #2c2b29;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 1.2rem;
            color: #eeb82e;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .hero-carousel-btn:hover {
            background: #eeb82e;
            color: #2c2b29;
            transform: scale(1.1);
        }

        .hero-carousel-dots {
            display: flex;
            gap: 15px;
        }

        .hero-carousel-dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #ddd;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .hero-carousel-dot.active {
            background: #eeb82e;
            transform: scale(1.2);
        }

        .hero-carousel-dot.active::after {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border: 2px solid #eeb82e;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.7;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* About Us Section - Simple white design */
        .about-us-section {
            padding: 80px 20px;
            background-color: white;
            text-align: center;
        }

        .about-us-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3rem;
            margin-bottom: 50px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .about-us-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 50px;
            flex-wrap: wrap;
        }

        .about-us-text {
            flex: 1;
            min-width: 300px;
            text-align: left;
        }

        .about-us-text p {
            font-family: 'Roboto Serif', serif;
            font-size: 1.1rem;
            line-height: 1.8;
            color: #444;
            margin-bottom: 20px;
        }

        .about-us-map {
            flex: 1;
            min-width: 300px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .about-us-map h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
            text-align: left;
        }

        .about-us-map img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* SALES Section - CAROUSEL */
        .sales-section {
            padding: 80px 20px;
            background-color: white;
            text-align: center;
            position: relative;
        }

        .sales-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3rem;
            margin-bottom: 50px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sale-details {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .sale-details p {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sale-details i {
            color: #eeb82e;
            width: 16px;
        }

        /* Carousel Container */
        .carousel-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
            padding: 0 60px;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
            gap: 30px;
        }

        .carousel-slide {
            min-width: calc(33.333% - 20px);
            flex: 0 0 auto;
            transition: transform 0.3s ease;
        }

        .carousel-slide:hover {
            transform: translateY(-5px);
        }

        .sales-item {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            height: 100%;
            position: relative;
        }

        /* Sale Badge */
        .sale-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #e74c3c;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }

        .item-img {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-info {
            padding: 25px;
            text-align: left;
        }

        .item-info h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.3rem;
            color: #2c2b29;
            margin-bottom: 10px;
        }

        .item-info p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .item-price {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .current-price {
            color: #eeb82e;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .original-price {
            color: #999;
            font-size: 1rem;
            text-decoration: line-through;
        }

        .discount {
            color: #e74c3c;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .buy-btn {
            background: #2c2b29;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 1rem;
        }

        .buy-btn:hover {
            background: #eeb82e;
            color: #2c2b29;
        }

        /* Carousel Navigation Buttons */
        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: #2c2b29;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 1.2rem;
            color: #eeb82e;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .carousel-btn:hover {
            background: #eeb82e;
            color: #2c2b29;
        }

        .carousel-btn.prev {
            left: 0;
        }

        .carousel-btn.next {
            right: 0;
        }

        /* Carousel Dots */
        .carousel-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 40px;
        }

        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #ddd;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .carousel-dot.active {
            background: #eeb82e;
            transform: scale(1.2);
        }

        /* Awards & Recognition Section */
        .awards-section {
            padding: 80px 20px;
            background-color: white;
            text-align: center;
        }

        .awards-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3rem;
            margin-bottom: 50px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .awards-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            padding: 20px;
        }

        .award-card {
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

        .award-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(238, 184, 46, 0.15);
            border-color: #eeb82e;
        }

        .award-header {
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            padding: 25px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .award-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: #eeb82e;
        }

        .award-icon {
            font-size: 3.5rem;
            color: #eeb82e;
            margin-bottom: 15px;
        }

        .award-header h3 {
            color: white;
            font-family: 'Roboto Serif', serif;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .award-year {
            display: inline-block;
            background: #eeb82e;
            color: #2c2b29;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 5px;
        }

        .award-body {
            padding: 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .award-body p {
            color: #555;
            line-height: 1.7;
            margin-bottom: 20px;
            font-size: 1rem;
            flex-grow: 1;
        }

        .award-issuer {
            display: flex;
            align-items: center;
            gap: 15px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .issuer-icon {
            width: 50px;
            height: 50px;
            background: #f8f8f8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #eeb82e;
        }

        .issuer-info h4 {
            color: #2c2b29;
            font-family: 'Roboto Serif', serif;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .issuer-info p {
            color: #777;
            font-size: 0.9rem;
            margin: 0;
        }

        /* Footer General Styling */
        .site-footer {
            background-color: #302f2d;
            color: #cccccc;
            padding: 50px 0;
            font-family: Arial, sans-serif;
            margin-top: auto;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            flex-wrap: wrap;
        }

        /* Column Styling */
        .footer-col {
            flex: 1;
            text-align: center;
            min-width: 200px;
            padding: 0 15px;
            margin-bottom: 20px;
        }

        /* Headings (Address, Social, Contact) */
        .footer-col h4 {
            color: #eeb82e;
            font-size: 1.2rem;
            margin-bottom: 15px;
            font-weight: normal;
        }

        /* Paragraph Text */
        .footer-col p {
            font-size: 0.9rem;
            line-height: 1.5;
            color: #cfcfcf;
        }

        /* Specific Styling for Logo Section (Leftmost) */
        .logo-section img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
            border-radius: 50%;
        }

        .logo-section h3 {
            color: #eeb82e;
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .logo-section .tagline {
            font-size: 0.7rem;
            color: #888;
            font-style: italic;
        }

        .partners-section {
            padding: 80px 20px;
            background-color: white;
            text-align: center;
        }

        .partners-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3rem;
            margin-bottom: 50px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .partners-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .partner-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            border: 1px solid #f0f0f0;
            padding: 30px;
        }

        .partner-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(238, 184, 46, 0.15);
            border-color: #eeb82e;
        }

        .partner-logo {
            width: 120px;
            height: 120px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f8f8;
            border-radius: 50%;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .partner-card:hover .partner-logo {
            background: #fff9e6;
            transform: scale(1.05);
        }

        .partner-logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .partner-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .partner-content h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.5rem;
            color: #2c2b29;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .partner-category {
            display: inline-block;
            background: #eeb82e;
            color: #2c2b29;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .partner-content p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 0.95rem;
            flex-grow: 1;
        }

        .partner-years {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #777;
            font-size: 0.9rem;
        }

        .partner-years i {
            color: #eeb82e;
        }

        /* Mission & Vision Section */
        .mission-vision-section {
            padding: 80px 20px;
            background-color: transparent;
            text-align: center;
        }

        .mission-vision-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3rem;
            margin-bottom: 50px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .mission-vision-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }

        .mission-card, .vision-card {
            flex: 1;
            min-width: 300px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .mission-card:hover, .vision-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(238, 184, 46, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: #eeb82e;
        }

        .mission-card .card-header {
            border-bottom: 4px solid #e74c3c;
        }

        .vision-card .card-header {
            border-bottom: 4px solid #3498db;
        }

        .card-icon {
            font-size: 3rem;
            color: #eeb82e;
            margin-bottom: 15px;
        }

        .card-header h3 {
            color: white;
            font-family: 'Roboto Serif', serif;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .card-subtitle {
            display: inline-block;
            background: rgba(238, 184, 46, 0.2);
            color: #eeb82e;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 5px;
            border: 1px solid #eeb82e;
        }

        .card-body {
            padding: 35px;
            text-align: left;
        }

        .card-body p {
            color: #555;
            line-height: 1.8;
            margin-bottom: 20px;
            font-size: 1.05rem;
        }

        .highlight {
            background: linear-gradient(120deg, rgba(238, 184, 46, 0.1) 0%, rgba(238, 184, 46, 0.05) 100%);
            border-left: 4px solid #eeb82e;
            padding: 20px;
            margin: 25px 0;
            border-radius: 0 8px 8px 0;
        }

        .highlight p {
            color: #2c2b29;
            font-weight: 600;
            font-style: italic;
            margin: 0;
        }

        .core-values {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #eee;
        }

        .core-values h4 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.2rem;
            color: #2c2b29;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .core-values h4 i {
            color: #eeb82e;
        }

        .core-values ul {
            list-style: none;
            padding: 0;
        }

        .core-values li {
            color: #666;
            margin-bottom: 10px;
            padding-left: 25px;
            position: relative;
            line-height: 1.6;
        }

        .core-values li:before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #eeb82e;
            font-weight: bold;
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

            /* Footer mobile adjustments */
            .footer-container {
                justify-content: center;
            }

            .footer-col {
                flex: 0 0 50%;
                min-width: 250px;
            }

            /* Hero Carousel mobile adjustments */
            .hero-carousel-section {
                min-height: 70vh;
            }

            .hero-carousel-slide {
                padding: 40px 20px;
                flex-direction: column;
                text-align: center;
                gap: 30px;
            }

            .hero-text-content h1 {
                font-size: 3rem;
            }

            .hero-text-content p {
                font-size: 2.2rem;
            }

            .hero-carousel-slide img {
                width: 100%;
                max-width: 400px;
                margin: 0 auto;
            }

            .hero-carousel-nav {
                bottom: 20px;
                gap: 20px;
            }

            .hero-carousel-btn {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .about-us-title,
            .sales-title,
            .awards-title {
                font-size: 2.2rem;
            }

            /* Carousel adjustments for mobile */
            .carousel-slide {
                min-width: calc(50% - 15px);
            }
            
            .carousel-container {
                padding: 0 50px;
            }
            
            .carousel-btn {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            /* Awards section mobile adjustments */
            .awards-container {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 10px;
            }

            .award-card {
                margin: 0 10px;
            }

            .partners-title {
                font-size: 2.2rem;
            }
            
            .partners-container {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
                padding: 10px;
            }
            
            .partner-card {
                padding: 20px;
            }
            
            .partner-logo {
                width: 100px;
                height: 100px;
                margin-bottom: 20px;
            }
            
            .partner-content h3 {
                font-size: 1.3rem;
            }

            .mission-vision-title {
                font-size: 2.2rem;
            }
            
            .mission-vision-container {
                flex-direction: column;
                gap: 30px;
            }
            
            .card-body {
                padding: 25px;
            }
            
            .card-header {
                padding: 25px;
            }
            
            .card-header h3 {
                font-size: 1.5rem;
            }
            
            .card-body p {
                font-size: 1rem;
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

            /* Footer mobile adjustments for very small screens */
            .footer-col {
                flex: 0 0 100%;
                min-width: 100%;
            }

            .site-footer {
                padding: 30px 0;
            }

            /* Hero Carousel very small screens */
            .hero-carousel-section {
                min-height: 60vh;
            }

            .hero-text-content h1 {
                font-size: 2.5rem;
            }

            .hero-text-content p {
                font-size: 1.8rem;
            }

            .hero-carousel-nav {
                bottom: 15px;
                gap: 15px;
            }

            .hero-carousel-btn {
                width: 35px;
                height: 35px;
            }

            /* Carousel adjustments for very small screens */
            .carousel-slide {
                min-width: 100%;
            }
            
            .carousel-container {
                padding: 0 40px;
            }

            /* Awards section very small screens */
            .award-header {
                padding: 20px;
            }

            .award-body {
                padding: 20px;
            }

            .award-header h3 {
                font-size: 1.3rem;
            }

            .partners-title {
                font-size: 1.8rem;
            }
            
            .partners-container {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .partner-card {
                margin: 0 10px;
            }

            .mission-vision-title {
                font-size: 1.8rem;
            }
            
            .card-body {
                padding: 20px;
            }
            
            .card-header {
                padding: 20px;
            }
            
            .highlight {
                padding: 15px;
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
    <nav class="navbar">
        <div class="brand-name">HOPE ACCOUNT SPECIALIST</div>

        <div class="logo-container">
            <div class="logo-circle">
                <img src="img/logo.png" alt="Logo">
            </div>
        </div>
        
        <div class="nav-links" id="navLinks">
            <a href="index.php">Home</a>
            
            <div class="dropdown">
                <a href="team.php" class="dropbtn">Meet Our Team <i class="fas fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="team.php#leadership">Leadership</a>
                    <a href="team.php#specialists">Account Specialists</a>
                    <a href="team.php#support">Support Staff</a>
                </div>
            </div>
            
            <div class="dropdown active">
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
            
            <a href="contact.php">Contact</a>
        </div>

        <div class="burger" id="burgerMenu">
            <div class="burger-line"></div>
            <div class="burger-line"></div>
            <div class="burger-line"></div>
        </div>
    </nav>

    <div class="main-content">
        <!-- Hero Carousel Section -->
        <div class="hero-carousel-section">
            <div class="hero-carousel-container">
                <div class="hero-carousel-track" id="heroCarouselTrack">
                    <!-- Slide 1 -->
                    <div class="hero-carousel-slide active">
                        <div class="hero-text-content">
                            <h1>Making Your Dreams</h1>
                            <p>Turn Into Reality</p>
                        </div>
                        <img src="img/logo.png" alt="Hope Account Specialist">
                    </div>

                    <!-- Slide 2 -->
                    <div class="hero-carousel-slide">
                        <div class="hero-text-content">
                            <h1>Expert Financial</h1>
                            <p>Solutions For You</p>
                        </div>
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Financial Planning">
                    </div>

                    <!-- Slide 3 -->
                    <div class="hero-carousel-slide">
                        <div class="hero-text-content">
                            <h1>Trusted Accounting</h1>
                            <p>Partners Since 2010</p>
                        </div>
                        <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Team Collaboration">
                    </div>

                    <!-- Slide 4 -->
                    <div class="hero-carousel-slide">
                        <div class="hero-text-content">
                            <h1>Your Success</h1>
                            <p>Is Our Priority</p>
                        </div>
                        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Business Growth">
                    </div>
                </div>
            </div>

            <div class="hero-carousel-nav">
                <button class="hero-carousel-btn" id="heroPrevBtn">&#10094;</button>
                <div class="hero-carousel-dots" id="heroCarouselDots"></div>
                <button class="hero-carousel-btn" id="heroNextBtn">&#10095;</button>
            </div>
        </div>

        <!-- About Us Section - Simple white design -->
        <div class="about-us-section">
            <h2 class="about-us-title">ABOUT US</h2>
            <div class="about-us-container">
                <div class="about-us-text">
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
                </div>
                <div class="about-us-map">
                    <h3>Get in Touch</h3>
                    <img src="img/maps.png" alt="Location Map">
                </div>
            </div>
        </div>

        <!-- Mission & Vision Section -->
        <div class="mission-vision-section">
            <h2 class="mission-vision-title">MISSION & VISION</h2>
            
            <div class="mission-vision-container">
                <!-- Mission Card -->
                <div class="mission-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Our Mission</h3>
                        <span class="card-subtitle">Driving Excellence</span>
                    </div>
                    <div class="card-body">
                        <p>To provide good and quality services to our clients and exceed their expectations, maintaining their loyalty for a lifetime.</p>
                        
                        <p>We aim to form partnerships with any bank and dealer to ensure long-term market leadership and profitability through teamwork, integrity, and excellence.</p>
                        
                        <div class="highlight">
                            <p>Our ultimate goal is to become the preferred choice for our clients, ensuring their satisfaction and trust for a lifetime.</p>
                        </div>
                        
                        <div class="core-values">
                            <h4><i class="fas fa-star"></i> Core Values</h4>
                            <ul>
                                <li><strong>Integrity:</strong> Upholding the highest ethical standards in all our dealings</li>
                                <li><strong>Excellence:</strong> Delivering superior quality in every service we provide</li>
                                <li><strong>Teamwork:</strong> Collaborating effectively to achieve common goals</li>
                                <li><strong>Client Focus:</strong> Prioritizing client needs and building lasting relationships</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Vision Card -->
                <div class="vision-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3>Our Vision</h3>
                        <span class="card-subtitle">Shaping the Future</span>
                    </div>
                    <div class="card-body">
                        <p>To be recognized as a leading marketing arm—an agency that continuously raises the bar for operations, sales, and service.</p>
                        
                        <p>Our goal is to help our partners, clients, and agents achieve better futures, guaranteeing market dealership longevity, profitability, and lasting customer loyalty.</p>
                        
                        <div class="highlight">
                            <p>We envision a future where every partnership we forge and every service we deliver contributes to sustainable growth and mutual success.</p>
                        </div>
                        
                        <div class="core-values">
                            <h4><i class="fas fa-chart-line"></i> Strategic Goals</h4>
                            <ul>
                                <li><strong>Market Leadership:</strong> Becoming the top choice in our industry</li>
                                <li><strong>Innovation:</strong> Continuously improving our processes and services</li>
                                <li><strong>Sustainability:</strong> Building lasting relationships and sustainable growth</li>
                                <li><strong>Community Impact:</strong> Contributing positively to our business community</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SALES Section - PAST SALES HISTORY -->
        <div class="sales-section">
            <h2 class="sales-title">PAST SALES HISTORY</h2>
            
            <div class="carousel-container">
                <div class="carousel-track" id="carouselTrack">
                    <!-- Vehicle Sale 1 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="sale-badge">SOLD</div>
                            <div class="item-img">
                                <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Toyota Fortuner">
                            </div>
                            <div class="item-info">
                                <h3>Toyota Fortuner 2022</h3>
                                <p>Premium SUV with only 15,000 km mileage. Fully loaded with leather seats, sunroof, and advanced safety features.</p>
                                <div class="item-price">
                                    <span class="current-price">₱1,850,000</span>
                                    <span class="original-price">₱2,100,000</span>
                                    <span class="discount">Sold in Dec 2023</span>
                                </div>
                                <div class="sale-details">
                                    <p><i class="fas fa-user"></i> Buyer: Juan Dela Cruz</p>
                                    <p><i class="fas fa-calendar"></i> Date Sold: December 15, 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vehicle Sale 2 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="sale-badge">SOLD</div>
                            <div class="item-img">
                                <img src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Honda Civic">
                            </div>
                            <div class="item-info">
                                <h3>Honda Civic RS 2021</h3>
                                <p>Turbocharged sedan with 10,000 km mileage. Excellent condition, maintained with Honda PMS records.</p>
                                <div class="item-price">
                                    <span class="current-price">₱1,150,000</span>
                                    <span class="original-price">₱1,350,000</span>
                                    <span class="discount">Sold in Nov 2023</span>
                                </div>
                                <div class="sale-details">
                                    <p><i class="fas fa-user"></i> Buyer: Maria Santos</p>
                                    <p><i class="fas fa-calendar"></i> Date Sold: November 8, 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Land Sale 1 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="sale-badge">SOLD</div>
                            <div class="item-img">
                                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Residential Lot">
                            </div>
                            <div class="item-info">
                                <h3>Residential Lot - Quezon City</h3>
                                <p>250 sqm prime residential lot in a gated community. With ROW, electricity, and water connections.</p>
                                <div class="item-price">
                                    <span class="current-price">₱3,500,000</span>
                                    <span class="original-price">₱3,800,000</span>
                                    <span class="discount">Sold in Oct 2023</span>
                                </div>
                                <div class="sale-details">
                                    <p><i class="fas fa-user"></i> Buyer: The Garcia Family</p>
                                    <p><i class="fas fa-calendar"></i> Date Sold: October 20, 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vehicle Sale 3 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="sale-badge">SOLD</div>
                            <div class="item-img">
                                <img src="https://images.unsplash.com/photo-1553440569-bcc63803a83d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Ford Ranger">
                            </div>
                            <div class="item-info">
                                <h3>Ford Ranger Raptor 2020</h3>
                                <p>High-performance pickup with off-road capabilities. Only 25,000 km, complete with service history.</p>
                                <div class="item-price">
                                    <span class="current-price">₱1,650,000</span>
                                    <span class="original-price">₱1,950,000</span>
                                    <span class="discount">Sold in Sep 2023</span>
                                </div>
                                <div class="sale-details">
                                    <p><i class="fas fa-user"></i> Buyer: Robert Lim</p>
                                    <p><i class="fas fa-calendar"></i> Date Sold: September 5, 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Land Sale 2 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="sale-badge">SOLD</div>
                            <div class="item-img">
                                <img src="https://images.unsplash.com/photo-1542744095-fcf48d80b0fd?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Agricultural Land">
                            </div>
                            <div class="item-info">
                                <h3>Agricultural Land - Bulacan</h3>
                                <p>1-hectare farm land with irrigation system. Suitable for rice, vegetable farming, or livestock.</p>
                                <div class="item-price">
                                    <span class="current-price">₱2,800,000</span>
                                    <span class="original-price">₱3,200,000</span>
                                    <span class="discount">Sold in Aug 2023</span>
                                </div>
                                <div class="sale-details">
                                    <p><i class="fas fa-user"></i> Buyer: Farmer's Cooperative</p>
                                    <p><i class="fas fa-calendar"></i> Date Sold: August 12, 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vehicle Sale 4 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="sale-badge">SOLD</div>
                            <div class="item-img">
                                <img src="https://images.unsplash.com/photo-1563720223486-3294265d5a5d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Mitsubishi Montero">
                            </div>
                            <div class="item-info">
                                <h3>Mitsubishi Montero Sport 2019</h3>
                                <p>Premium 4x4 SUV with 30,000 km mileage. Well-maintained with complete papers and records.</p>
                                <div class="item-price">
                                    <span class="current-price">₱1,250,000</span>
                                    <span class="original-price">₱1,500,000</span>
                                    <span class="discount">Sold in Jul 2023</span>
                                </div>
                                <div class="sale-details">
                                    <p><i class="fas fa-user"></i> Buyer: Anna Reyes</p>
                                    <p><i class="fas fa-calendar"></i> Date Sold: July 18, 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button class="carousel-btn prev" id="prevBtn">&#10094;</button>
                <button class="carousel-btn next" id="nextBtn">&#10095;</button>
            </div>
            
            <div class="carousel-dots" id="carouselDots"></div>
        </div>

        <!-- Awards & Recognition Section -->
        <div class="awards-section" id="awards">
            <h2 class="awards-title">AWARDS & RECOGNITION</h2>
            
            <div class="awards-container">
                <!-- Award 1 -->
                <div class="award-card">
                    <div class="award-header">
                        <div class="award-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3>Excellence in Accounting</h3>
                        <span class="award-year">2023</span>
                    </div>
                    <div class="award-body">
                        <p>Recognized for outstanding accounting services and client satisfaction. Awarded for innovation in financial management solutions and exceptional client retention rates.</p>
                        <div class="award-issuer">
                            <div class="issuer-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="issuer-info">
                                <h4>National Accounting Association</h4>
                                <p>Professional Excellence Division</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Award 2 -->
                <div class="award-card">
                    <div class="award-header">
                        <div class="award-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <h3>Best Small Business Support</h3>
                        <span class="award-year">2022</span>
                    </div>
                    <div class="award-body">
                        <p>Awarded for exceptional support services to small and medium-sized businesses, helping them achieve financial stability and growth during challenging economic times.</p>
                        <div class="award-issuer">
                            <div class="issuer-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="issuer-info">
                                <h4>Business Excellence Council</h4>
                                <p>Small Business Division</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Award 3 -->
                <div class="award-card">
                    <div class="award-header">
                        <div class="award-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Client Service Excellence</h3>
                        <span class="award-year">2023</span>
                    </div>
                    <div class="award-body">
                        <p>Recognized for exceptional client service with a 98% satisfaction rating. Commended for personalized approach and timely response to client needs and inquiries.</p>
                        <div class="award-issuer">
                            <div class="issuer-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="issuer-info">
                                <h4>Customer Service Institute</h4>
                                <p>Professional Services Category</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Award 4 -->
                <div class="award-card">
                    <div class="award-header">
                        <div class="award-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h3>Innovation in Financial Tech</h3>
                        <span class="award-year">2021</span>
                    </div>
                    <div class="award-body">
                        <p>Awarded for innovative implementation of financial technology solutions, streamlining accounting processes and providing clients with cutting-edge digital tools.</p>
                        <div class="award-issuer">
                            <div class="issuer-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <div class="issuer-info">
                                <h4>Tech Innovation Awards</h4>
                                <p>FinTech Solutions Category</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Award 5 -->
                <div class="award-card">
                    <div class="award-header">
                        <div class="award-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Ethics & Compliance Award</h3>
                        <span class="award-year">2022</span>
                    </div>
                    <div class="award-body">
                        <p>Recognized for maintaining the highest ethical standards and compliance with financial regulations. Zero compliance violations over 5 consecutive years.</p>
                        <div class="award-issuer">
                            <div class="issuer-icon">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                            <div class="issuer-info">
                                <h4>Financial Ethics Board</h4>
                                <p>Compliance Excellence</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Award 6 -->
                <div class="award-card">
                    <div class="award-header">
                        <div class="award-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>Community Service Recognition</h3>
                        <span class="award-year">2023</span>
                    </div>
                    <div class="award-body">
                        <p>Awarded for outstanding contributions to the community, including pro bono services for non-profits and financial literacy programs for underserved communities.</p>
                        <div class="award-issuer">
                            <div class="issuer-icon">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                            <div class="issuer-info">
                                <h4>Community Excellence Foundation</h4>
                                <p>Corporate Citizenship</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Partners Section -->
        <div class="partners-section" id="partners">
            <h2 class="partners-title">OUR TRUSTED PARTNERS</h2>
            
            <div class="partners-container">
                <!-- Toyota Partner -->
                <div class="partner-card">
                    <div class="partner-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Toyota_carlogo.svg/800px-Toyota_carlogo.svg.png" alt="Toyota Logo">
                    </div>
                    <div class="partner-content">
                        <h3>Toyota Motor Corporation</h3>
                        <span class="partner-category">Automotive</span>
                        <p>World's largest automobile manufacturer. We provide comprehensive accounting and financial services for Toyota dealerships across the region.</p>
                        <div class="partner-years">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Partner since 2012</span>
                        </div>
                    </div>
                </div>

                <!-- Honda Partner -->
                <div class="partner-card">
                    <div class="partner-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/Honda.svg/800px-Honda.svg.png" alt="Honda Logo">
                    </div>
                    <div class="partner-content">
                        <h3>Honda Motor Company</h3>
                        <span class="partner-category">Automotive</span>
                        <p>Global leader in motorcycle manufacturing and automobile industry. We manage financial operations for multiple Honda dealerships and service centers.</p>
                        <div class="partner-years">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Partner since 2014</span>
                        </div>
                    </div>
                </div>

                <!-- Ford Partner -->
                <div class="partner-card">
                    <div class="partner-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Ford_logo_flat.svg/800px-Ford_logo_flat.svg.png" alt="Ford Logo">
                    </div>
                    <div class="partner-content">
                        <h3>Ford Motor Company</h3>
                        <span class="partner-category">Automotive</span>
                        <p>American multinational automaker. We provide specialized accounting services for Ford's regional operations and dealership network.</p>
                        <div class="partner-years">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Partner since 2015</span>
                        </div>
                    </div>
                </div>

                <!-- Mercedes-Benz Partner -->
                <div class="partner-card">
                    <div class="partner-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Mercedes-Logo.svg/800px-Mercedes-Logo.svg.png" alt="Mercedes-Benz Logo">
                    </div>
                    <div class="partner-content">
                        <h3>Mercedes-Benz</h3>
                        <span class="partner-category">Luxury Automotive</span>
                        <p>German luxury automobile manufacturer. We handle complex financial management for Mercedes-Benz dealerships and corporate accounts.</p>
                        <div class="partner-years">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Partner since 2016</span>
                        </div>
                    </div>
                </div>

                <!-- BMW Partner -->
                <div class="partner-card">
                    <div class="partner-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/BMW.svg/800px-BMW.svg.png" alt="BMW Logo">
                    </div>
                    <div class="partner-content">
                        <h3>BMW Group</h3>
                        <span class="partner-category">Luxury Automotive</span>
                        <p>German multinational company producing luxury vehicles and motorcycles. Our accounting specialists manage BMW's regional financial operations.</p>
                        <div class="partner-years">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Partner since 2017</span>
                        </div>
                    </div>
                </div>

                <!-- Nissan Partner -->
                <div class="partner-card">
                    <div class="partner-logo">
                        <img src="https://e7.pngegg.com/pngimages/58/113/png-clipart-nissan-car-logo-nissan-emblem-trademark.png" alt="Nissan Logo">
                    </div>
                    <div class="partner-content">
                        <h3>Nissan Motor Corporation</h3>
                        <span class="partner-category">Automotive</span>
                        <p>Japanese multinational automobile manufacturer. We provide comprehensive financial services for Nissan's dealership network and regional offices.</p>
                        <div class="partner-years">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Partner since 2013</span>
                        </div>
                    </div>
                </div>

                <!-- Mitsubishi Partner -->
                <div class="partner-card">
                    <div class="partner-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Mitsubishi_logo.svg/800px-Mitsubishi_logo.svg.png" alt="Mitsubishi Logo">
                    </div>
                    <div class="partner-content">
                        <h3>Mitsubishi Motors</h3>
                        <span class="partner-category">Automotive</span>
                        <p>Japanese multinational automotive manufacturer. We manage financial operations and accounting for Mitsubishi dealerships and service centers.</p>
                        <div class="partner-years">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Partner since 2018</span>
                        </div>
                    </div>
                </div>

                <!-- Hyundai Partner -->
                <div class="partner-card">
                    <div class="partner-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Hyundai_Motor_Company_logo.svg/800px-Hyundai_Motor_Company_logo.svg.png" alt="Hyundai Logo">
                    </div>
                    <div class="partner-content">
                        <h3>Hyundai Motor Company</h3>
                        <span class="partner-category">Automotive</span>
                        <p>South Korean multinational automotive manufacturer. We provide specialized accounting services for Hyundai's growing dealership network.</p>
                        <div class="partner-years">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Partner since 2019</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <div class="footer-container">
            
            <div class="footer-col logo-section">
                <div class="footer-logo">
                    <img src="img/logo.png" alt="Hope Account Specialist Logo">
                </div>
                <h3>Hope Account Specialist</h3>
                <p class="tagline">Making your dreams turn into reality.</p>
            </div>

            <div class="footer-col">
                <h4>Address</h4>
                <p>123 Financial District, Business City, BC 1000 Philippines</p>
            </div>

            <div class="footer-col">
                <h4>Social</h4>
                <p>Follow us on social media for updates and financial tips.</p>
            </div>

            <div class="footer-col">
                <h4>Contact</h4>
                <p>Phone: (02) 8123-4567<br>Email: info@hopeaccountspecialist.com</p>
            </div>

        </div>
    </footer>

    <script>
        // Mobile menu toggle functionality
        const burgerMenu = document.getElementById('burgerMenu');
        const navLinks = document.getElementById('navLinks');
        
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

        // Hero Carousel Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Hero Carousel
            const heroTrack = document.getElementById('heroCarouselTrack');
            const heroPrevBtn = document.getElementById('heroPrevBtn');
            const heroNextBtn = document.getElementById('heroNextBtn');
            const heroDotsContainer = document.getElementById('heroCarouselDots');
            
            if (!heroTrack) return;
            
            const heroSlides = Array.from(heroTrack.children);
            let heroCurrentIndex = 0;
            let heroAutoPlayInterval;
            
            // Create dots for hero carousel
            function createHeroDots() {
                heroDotsContainer.innerHTML = '';
                
                for (let i = 0; i < heroSlides.length; i++) {
                    const dot = document.createElement('button');
                    dot.classList.add('hero-carousel-dot');
                    if (i === 0) dot.classList.add('active');
                    dot.addEventListener('click', () => goToHeroSlide(i));
                    heroDotsContainer.appendChild(dot);
                }
            }
            
            // Update hero carousel position
            function updateHeroCarousel() {
                // Remove active class from all slides
                heroSlides.forEach(slide => {
                    slide.classList.remove('active');
                });
                
                // Add active class to current slide
                heroSlides[heroCurrentIndex].classList.add('active');
                
                // Move track
                const slideWidth = heroSlides[0].offsetWidth;
                const offset = -heroCurrentIndex * slideWidth;
                heroTrack.style.transform = `translateX(${offset}px)`;
                
                // Update dots
                const heroDots = Array.from(heroDotsContainer.children);
                heroDots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === heroCurrentIndex);
                });
            }
            
            function goToHeroSlide(index) {
                heroCurrentIndex = index;
                updateHeroCarousel();
                resetHeroAutoPlay();
            }
            
            function nextHeroSlide() {
                heroCurrentIndex = (heroCurrentIndex + 1) % heroSlides.length;
                updateHeroCarousel();
            }
            
            function prevHeroSlide() {
                heroCurrentIndex = (heroCurrentIndex - 1 + heroSlides.length) % heroSlides.length;
                updateHeroCarousel();
            }
            
            function startHeroAutoPlay() {
                heroAutoPlayInterval = setInterval(nextHeroSlide, 5000);
            }
            
            function resetHeroAutoPlay() {
                clearInterval(heroAutoPlayInterval);
                startHeroAutoPlay();
            }
            
            // Event listeners for hero carousel
            heroNextBtn.addEventListener('click', () => {
                nextHeroSlide();
                resetHeroAutoPlay();
            });
            
            heroPrevBtn.addEventListener('click', () => {
                prevHeroSlide();
                resetHeroAutoPlay();
            });
            
            // Pause auto-play on hover
            heroTrack.addEventListener('mouseenter', () => clearInterval(heroAutoPlayInterval));
            heroTrack.addEventListener('mouseleave', startHeroAutoPlay);
            
            // Handle window resize
            window.addEventListener('resize', updateHeroCarousel);
            
            // Initialize hero carousel
            createHeroDots();
            startHeroAutoPlay();

            // Sales Carousel Functionality
            const track = document.getElementById('carouselTrack');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const dotsContainer = document.getElementById('carouselDots');
            
            if (!track) return;
            
            const slides = Array.from(track.children);
            let currentIndex = 0;
            let slidesPerView = 3; // Default for desktop
            
            // Update slides per view based on screen size
            function updateSlidesPerView() {
                if (window.innerWidth <= 480) {
                    slidesPerView = 1;
                } else if (window.innerWidth <= 768) {
                    slidesPerView = 2;
                } else {
                    slidesPerView = 3;
                }
            }
            
            // Create dots
            function createDots() {
                dotsContainer.innerHTML = '';
                const totalDots = Math.ceil(slides.length / slidesPerView);
                
                for (let i = 0; i < totalDots; i++) {
                    const dot = document.createElement('button');
                    dot.classList.add('carousel-dot');
                    if (i === 0) dot.classList.add('active');
                    dot.addEventListener('click', () => goToSlide(i));
                    dotsContainer.appendChild(dot);
                }
            }
            
            // Update carousel position
            function updateCarousel() {
                const slideWidth = slides[0].offsetWidth;
                const offset = -currentIndex * (slideWidth + 30); // 30px is the gap
                track.style.transform = `translateX(${offset}px)`;
                
                // Update dots
                const dots = Array.from(dotsContainer.children);
                const activeDotIndex = Math.floor(currentIndex / slidesPerView);
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === activeDotIndex);
                });
            }
            
            function goToSlide(index) {
                const totalSlides = slides.length;
                const maxIndex = totalSlides - slidesPerView;
                
                // Calculate the actual slide index
                currentIndex = index * slidesPerView;
                
                // Make sure we don't go beyond the last slide
                if (currentIndex > maxIndex) {
                    currentIndex = maxIndex;
                }
                
                updateCarousel();
            }
            
            function nextSlide() {
                const totalSlides = slides.length;
                const maxIndex = totalSlides - slidesPerView;
                
                if (currentIndex < maxIndex) {
                    currentIndex += 1;
                } else {
                    currentIndex = 0; // Loop back to start
                }
                updateCarousel();
            }
            
            function prevSlide() {
                const totalSlides = slides.length;
                
                if (currentIndex > 0) {
                    currentIndex -= 1;
                } else {
                    const maxIndex = totalSlides - slidesPerView;
                    currentIndex = maxIndex; // Loop to end
                }
                updateCarousel();
            }
            
            // Event listeners
            nextBtn.addEventListener('click', nextSlide);
            prevBtn.addEventListener('click', prevSlide);
            
            // Auto-play functionality
            let autoPlayInterval = setInterval(nextSlide, 4000);
            
            // Pause auto-play on hover
            track.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
            track.addEventListener('mouseleave', () => {
                autoPlayInterval = setInterval(nextSlide, 4000);
            });
            
            // Handle window resize
            window.addEventListener('resize', () => {
                updateSlidesPerView();
                createDots();
                updateCarousel();
                updateHeroCarousel();
            });
            
            // Buy Now button functionality
            document.querySelectorAll('.buy-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const itemName = this.closest('.sales-item').querySelector('h3').textContent;
                    const itemPrice = this.closest('.sales-item').querySelector('.current-price').textContent;
                    alert(`Thank you for your interest in purchasing "${itemName}" for ${itemPrice}! Our team will contact you shortly to complete the transaction.`);
                });
            });
            
            // Initialize sales carousel
            updateSlidesPerView();
            createDots();
            updateCarousel();

            document.querySelectorAll('.partner-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const logo = this.querySelector('.partner-logo');
                    logo.style.transform = 'scale(1.05)';
                });
                
                card.addEventListener('mouseleave', function() {
                    const logo = this.querySelector('.partner-logo');
                    logo.style.transform = 'scale(1)';
                });
            });
        });
    </script>
</body>
</html>