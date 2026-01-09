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

        /* Main content styling */
        .main-content {
            padding: 100px 20px 20px;
            max-width: 1200px;
            margin: 0 auto;
            flex: 1;
            width: 100%;
        }

        /* ENHANCED: Hero Carousel Section - New Modern Design */
        .hero-carousel-section {
            padding: 0;
            margin-bottom: 50px;
            position: relative;
            min-height: 85vh;
            background: linear-gradient(135deg, #2c2b29 0%, #1a1a1a 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        }

        .hero-carousel-container {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
        }

        .hero-carousel-track {
            display: flex;
            height: 100%;
            transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform;
        }

        .hero-carousel-slide {
            min-width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 80px;
            gap: 60px;
            flex-wrap: wrap;
            position: relative;
        }

        /* New: Gradient overlay for better text readability */
        .hero-carousel-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, rgba(44,43,41,0.9) 0%, rgba(44,43,41,0.7) 50%, rgba(44,43,41,0.3) 100%);
            z-index: 1;
        }

        .hero-text-content {
            flex: 1;
            min-width: 300px;
            position: relative;
            z-index: 2;
            animation: textSlideIn 1s ease-out;
        }

        @keyframes textSlideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-text-content h1 {
            color: #ffffff;
            margin-bottom: 20px;
            font-size: 4.5rem;
            font-family: 'Roboto Serif', serif;
            font-weight: 700;
            line-height: 1.1;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
            position: relative;
            display: inline-block;
        }

        /* New: Underline effect for headings */
        .hero-text-content h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100px;
            height: 4px;
            background: #eeb82e;
            border-radius: 2px;
        }

        .hero-text-content p {
            color: #eeb82e;
            line-height: 1.3;
            margin: 30px 0;
            font-family: 'WindSong', cursive;
            font-size: 3.5rem;
            font-weight: 500;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.3);
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* New: CTA Button */
        .hero-cta-button {
            display: inline-block;
            padding: 15px 35px;
            background: #eeb82e;
            color: #2c2b29;
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(238, 184, 46, 0.3);
            margin-top: 20px;
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        .hero-cta-button:hover {
            background: #ffd95a;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(238, 184, 46, 0.4);
        }

        .hero-carousel-slide img {
            width: 450px;
            height: 450px;
            border-radius: 20px;
            object-fit: cover;
            position: relative;
            z-index: 2;
            box-shadow: 0 15px 35px rgba(0,0,0,0.4);
            border: 5px solid rgba(255,255,255,0.1);
            animation: floatAnimation 3s ease-in-out infinite;
        }

        @keyframes floatAnimation {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        /* ENHANCED: Hero Carousel Navigation */
        .hero-carousel-nav {
            position: absolute;
            bottom: 40px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 80px;
            z-index: 100;
        }

        .hero-carousel-btn {
            background: rgba(255,255,255,0.1);
            border: 2px solid rgba(238, 184, 46, 0.3);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            font-size: 1.5rem;
            color: #eeb82e;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .hero-carousel-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(238, 184, 46, 0.2), transparent);
            transition: left 0.7s ease;
        }

        .hero-carousel-btn:hover {
            background: #eeb82e;
            color: #2c2b29;
            transform: scale(1.1);
            border-color: #eeb82e;
        }

        .hero-carousel-btn:hover::before {
            left: 100%;
        }

        .hero-carousel-dots {
            display: flex;
            gap: 15px;
            background: rgba(0,0,0,0.3);
            padding: 15px 25px;
            border-radius: 30px;
            backdrop-filter: blur(10px);
        }

        .hero-carousel-dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            border: 2px solid rgba(255,255,255,0.2);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .hero-carousel-dot.active {
            background: #eeb82e;
            transform: scale(1.2);
            border-color: #eeb82e;
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
                opacity: 0.5;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* New: Slide Progress Bar */
        .slide-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: rgba(255,255,255,0.1);
            z-index: 101;
        }

        .progress-bar {
            height: 100%;
            background: #eeb82e;
            width: 0%;
            transition: width 5s linear;
        }

        .hero-carousel-slide.active .progress-bar {
            width: 100%;
        }

        /* ENHANCED: SALES Section - Modern Carousel */
        .sales-section {
            padding: 80px 0;
            background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
            text-align: center;
            position: relative;
        }

        .sales-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3.2rem;
            margin-bottom: 60px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
            display: inline-block;
        }

        .sales-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: #eeb82e;
            border-radius: 2px;
        }

        /* Enhanced Carousel Container */
        .carousel-container {
            position: relative;
            max-width: 1400px;
            margin: 0 auto;
            overflow: hidden;
            padding: 40px 80px;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform;
            gap: 30px;
        }

        .carousel-slide {
            min-width: calc(33.333% - 20px);
            flex: 0 0 auto;
            transition: all 0.4s ease;
            perspective: 1000px;
        }

        .carousel-slide:hover {
            transform: translateY(-15px) scale(1.02);
        }

        .sales-item {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            height: 100%;
            position: relative;
            transition: all 0.4s ease;
        }

        .sales-item:hover {
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        /* Enhanced Image Container */
        .item-img {
            width: 100%;
            height: 380px;
            overflow: hidden;
            position: relative;
        }

        .item-img::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 70%, rgba(0,0,0,0.5) 100%);
            z-index: 1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sales-item:hover .item-img::before {
            opacity: 1;
        }

        .item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        /* Hover effect with zoom and overlay */
        .sales-item:hover .item-img img {
            transform: scale(1.1);
        }

        /* New: Sale Info Overlay */
        .sale-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(44, 43, 41, 0.9);
            color: white;
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.4s ease;
            z-index: 2;
            backdrop-filter: blur(10px);
        }

        .sales-item:hover .sale-info {
            transform: translateY(0);
        }

        .sale-info h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.3rem;
            margin-bottom: 5px;
            color: #eeb82e;
        }

        .sale-info p {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 10px;
        }

        .sale-price {
            display: inline-block;
            background: #eeb82e;
            color: #2c2b29;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* Enhanced Carousel Navigation Buttons */
        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(44, 43, 41, 0.9);
            border: 2px solid rgba(238, 184, 46, 0.3);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            font-size: 1.5rem;
            color: #eeb82e;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
        }

        .carousel-btn:hover {
            background: #eeb82e;
            color: #2c2b29;
            transform: translateY(-50%) scale(1.1);
            border-color: #eeb82e;
        }

        .carousel-btn.prev {
            left: 10px;
        }

        .carousel-btn.next {
            right: 10px;
        }

        /* Enhanced Carousel Dots */
        .carousel-dots {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 50px;
        }

        .carousel-dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #ddd;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .carousel-dot.active {
            background: #eeb82e;
            transform: scale(1.3);
            border-color: #eeb82e;
        }

        .carousel-dot::after {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border: 2px solid #eeb82e;
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .carousel-dot.active::after {
            opacity: 1;
            animation: dotPulse 1.5s infinite;
        }

        @keyframes dotPulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.5;
            }
        }

        /* New: Carousel Counter */
        .carousel-counter {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(44, 43, 41, 0.9);
            color: #eeb82e;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
            z-index: 11;
        }

        /* New: Loading Animation */
        .carousel-loader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: rgba(238, 184, 46, 0.2);
            z-index: 12;
            display: none;
        }

        .carousel-loader::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            background: #eeb82e;
            animation: loading 3s linear;
        }

        @keyframes loading {
            to {
                width: 100%;
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
            padding: 0;
            text-align: center;
            position: relative;
            overflow: hidden;
            min-height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
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

        /* NEW: Award Image Container */
        .award-image-container {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .award-image-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.15;
            filter: brightness(0.8);
        }

        .award-main-image {
            position: relative;
            z-index: 2;
            max-width: 150px;
            max-height: 150px;
            object-fit: contain;
            transition: all 0.3s ease;
        }

        .award-card:hover .award-main-image {
            transform: scale(1.1);
        }

        .award-header-content {
            position: relative;
            z-index: 3;
            padding: 20px;
            width: 100%;
            background: rgba(44, 43, 41, 0.8);
        }

        .award-header h3 {
            color: white;
            font-family: 'Roboto Serif', serif;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
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
            border: 2px solid #2c2b29;
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

        /* Affiliated Houses Section */
        .affiliated-section {
            padding: 80px 20px;
            text-align: center;
        }

        .affiliated-title {
            font-family: 'Roboto Serif', serif;
            font-size: 3rem;
            margin-bottom: 50px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .affiliated-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .affiliated-card {
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

        .affiliated-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(238, 184, 46, 0.15);
            border-color: #eeb82e;
        }

        .affiliated-logo {
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

        .affiliated-card:hover .affiliated-logo {
            background: #fff9e6;
            transform: scale(1.05);
        }

        .logo-placeholder {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eeb82e;
            border-radius: 50%;
            color: #2c2b29;
            font-size: 2.5rem;
        }

        .affiliated-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .affiliated-content h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.5rem;
            color: #2c2b29;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .affiliated-category {
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

        .affiliated-content p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 0.95rem;
            flex-grow: 1;
        }

        .affiliated-years {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #777;
            font-size: 0.9rem;
        }

        .affiliated-years i {
            color: #eeb82e;
        }

        .affiliated-logo-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .affiliated-card:hover .affiliated-logo-img {
            transform: scale(1.05);
        }

        /* Puwede mong i-update ang .affiliated-logo para mas maayos ang presentasyon */
        .affiliated-logo {
            width: 120px;
            height: 120px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 10px;
            padding: 15px;
            transition: all 0.3s ease;
            border: 2px solid #f0f0f0;
        }

        .affiliated-card:hover .affiliated-logo {
            background: #fff9e6;
            transform: scale(1.05);
            border-color: #eeb82e;
        }

        /* Bank & Car Partners Sections */
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
            height: 120px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
            cursor: default;
        }

        .bank-logo::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(238, 184, 46, 0.1) 0%, rgba(44, 43, 41, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .bank-logo::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s ease;
        }

        .bank-logo:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 15px 30px rgba(238, 184, 46, 0.2);
            border-color: #eeb82e;
        }

        .bank-logo:hover::before {
            opacity: 1;
        }

        .bank-logo:hover::after {
            left: 100%;
        }

        .bank-logo img {
            max-width: 100%;
            max-height: 80px;
            object-fit: contain;
            transition: all 0.3s ease;
            filter: grayscale(20%);
            position: relative;
            z-index: 2;
        }

        .bank-logo:hover img {
            transform: scale(1.1);
            filter: grayscale(0%);
        }

        /* Mobile Responsive Styles */
        @media screen and (max-width: 1200px) {
            .hero-carousel-slide {
                padding: 0 40px;
                gap: 40px;
            }
            
            .hero-text-content h1 {
                font-size: 3.5rem;
            }
            
            .hero-text-content p {
                font-size: 2.8rem;
            }
            
            .hero-carousel-slide img {
                width: 400px;
                height: 400px;
            }
            
            .carousel-slide {
                min-width: calc(50% - 15px);
            }
            
            .carousel-container {
                padding: 40px 60px;
            }
        }

        @media screen and (max-width: 768px) {
            .hero-carousel-section {
                min-height: 70vh;
                border-radius: 15px;
            }
            
            .hero-carousel-slide {
                padding: 40px 20px;
                flex-direction: column;
                text-align: center;
                gap: 40px;
            }
            
            .hero-text-content h1 {
                font-size: 2.8rem;
            }
            
            .hero-text-content h1::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .hero-text-content p {
                font-size: 2.2rem;
            }
            
            .hero-carousel-slide img {
                width: 300px;
                height: 300px;
            }
            
            .hero-carousel-nav {
                padding: 0 20px;
                bottom: 20px;
            }
            
            .hero-carousel-btn {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
            
            .about-us-title,
            .sales-title,
            .awards-title,
            .bank-partners-title,
            .affiliated-title {
                font-size: 2.2rem;
            }
            
            .carousel-container {
                padding: 40px 50px;
            }
            
            .carousel-btn {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
            
            .item-img {
                height: 300px;
            }
            
            .sale-info {
                transform: translateY(0);
                position: relative;
                background: #2c2b29;
            }
            
            .carousel-slide {
                min-width: calc(50% - 15px);
            }
            
            .awards-container {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 10px;
            }
            
            .award-card {
                margin: 0 10px;
            }
            
            .mission-vision-container {
                flex-direction: column;
                gap: 30px;
            }
            
            .affiliated-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .bank-partners-container {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
                gap: 20px;
            }
        }

        @media screen and (max-width: 480px) {
            .hero-carousel-section {
                min-height: 60vh;
            }
            
            .hero-text-content h1 {
                font-size: 2.2rem;
            }
            
            .hero-text-content p {
                font-size: 1.8rem;
            }
            
            .hero-carousel-slide img {
                width: 250px;
                height: 250px;
            }
            
            .hero-carousel-nav {
                flex-direction: column;
                gap: 20px;
                bottom: 10px;
            }
            
            .sales-title {
                font-size: 2.2rem;
            }
            
            .carousel-container {
                padding: 40px;
            }
            
            .carousel-slide {
                min-width: 100%;
            }
            
            .item-img {
                height: 250px;
            }
            
            .awards-title {
                font-size: 1.8rem;
            }
            
            .mission-vision-title {
                font-size: 1.8rem;
            }
            
            .affiliated-title {
                font-size: 1.8rem;
            }
            
            .bank-partners-title {
                font-size: 1.8rem;
            }
            
            .bank-partners-container {
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }
            
            .bank-logo {
                height: 80px;
                padding: 10px;
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
        <!-- ENHANCED Hero Carousel Section -->
        <div class="hero-carousel-section">
            <div class="hero-carousel-container">
                <div class="slide-progress">
                    <div class="progress-bar"></div>
                </div>
                <div class="carousel-loader" id="heroLoader"></div>
                <div class="hero-carousel-track" id="heroCarouselTrack">
                    <!-- Slide 1 -->
                    <div class="hero-carousel-slide active">
                        <div class="hero-text-content">
                            <h1>Making Your Dreams</h1>
                            <p>Turn Into Reality</p>
                            <a href="#contact" class="hero-cta-button">Start Your Journey <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <img src="img/logo.png" alt="Hope Account Specialist">
                    </div>

                    <!-- Slide 2 -->
                    <div class="hero-carousel-slide">
                        <div class="hero-text-content">
                            <h1>Expert Financial</h1>
                            <p>Solutions For You</p>
                            <a href="#services" class="hero-cta-button">Our Services <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Financial Planning">
                    </div>

                    <!-- Slide 3 -->
                    <div class="hero-carousel-slide">
                        <div class="hero-text-content">
                            <h1>Trusted Accounting</h1>
                            <p>Partners Since 2010</p>
                            <a href="#about" class="hero-cta-button">About Us <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Team Collaboration">
                    </div>

                    <!-- Slide 4 -->
                    <div class="hero-carousel-slide">
                        <div class="hero-text-content">
                            <h1>Your Success</h1>
                            <p>Is Our Priority</p>
                            <a href="#contact" class="hero-cta-button">Contact Us <i class="fas fa-arrow-right"></i></a>
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
                    <img src="img/indexpics.jpg" alt="Location Map">
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

        <!-- ENHANCED SALES Section - PAST SALES HISTORY -->
        <div class="sales-section">
            <h2 class="sales-title">PAST SALES HISTORY</h2>
            <div class="carousel-counter" id="carouselCounter">1/7</div>
            
            <div class="carousel-container">
                <div class="carousel-loader" id="salesLoader"></div>
                <div class="carousel-track" id="carouselTrack">
                    <!-- Vehicle Sale 1 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="item-img">
                                <img src="img/pastsales.jpg" alt="Toyota Fortuner">
                            </div>
                            <div class="sale-info">
                                <h3>Toyota Fortuner</h3>
                                <p>2023 Model • Luxury SUV</p>
                                <span class="sale-price">₱2,150,000</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vehicle Sale 2 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="item-img">
                                <img src="img/pastsales1.jpg" alt="Honda Civic">
                            </div>
                            <div class="sale-info">
                                <h3>Honda Civic</h3>
                                <p>2022 Model • Executive Sedan</p>
                                <span class="sale-price">₱1,450,000</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Land Sale 1 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="item-img">
                                <img src="img/pastsales2.jpg" alt="Residential Lot">
                            </div>
                            <div class="sale-info">
                                <h3>Residential Lot</h3>
                                <p>200 sqm • Prime Location</p>
                                <span class="sale-price">₱3,800,000</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vehicle Sale 3 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="item-img">
                                <img src="img/pastsales3.jpg" alt="Ford Ranger">
                            </div>
                            <div class="sale-info">
                                <h3>Ford Ranger</h3>
                                <p>2023 Model • Pickup Truck</p>
                                <span class="sale-price">₱1,850,000</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Land Sale 2 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="item-img">
                                <img src="img/pastsales4.jpg" alt="Agricultural Land">
                            </div>
                            <div class="sale-info">
                                <h3>Agricultural Land</h3>
                                <p>5 hectares • Fertile Soil</p>
                                <span class="sale-price">₱8,500,000</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vehicle Sale 4 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="item-img">
                                <img src="img/pastsales5.jpg" alt="Mitsubishi Montero">
                            </div>
                            <div class="sale-info">
                                <h3>Mitsubishi Montero</h3>
                                <p>2023 Model • Premium SUV</p>
                                <span class="sale-price">₱2,050,000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Vehicle Sale 5 -->
                    <div class="carousel-slide">
                        <div class="sales-item">
                            <div class="item-img">
                                <img src="img/pastsales6.jpg" alt="Hyundai Tucson">
                            </div>
                            <div class="sale-info">
                                <h3>Hyundai Tucson</h3>
                                <p>2023 Model • Crossover SUV</p>
                                <span class="sale-price">₱1,650,000</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button class="carousel-btn prev" id="prevBtn">&#10094;</button>
                <button class="carousel-btn next" id="nextBtn">&#10095;</button>
            </div>
            
            <div class="carousel-dots" id="carouselDots"></div>
        </div>

        <!-- Awards & Recognition Section - UPDATED WITH IMAGES -->
        <div class="awards-section" id="awards">
            <h2 class="awards-title">AWARDS & RECOGNITION</h2>
            
            <div class="awards-container">
                <!-- Award 1 - Excellence in Accounting -->
                <div class="award-card">
                    <div class="award-header">
                        <div class="award-image-container">
                            <!-- Background Image -->
                            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Accounting Background" class="award-image-bg">
                            <!-- Main Award Image -->
                            <img src="img/awards/trophy.png" alt="Trophy Award" class="award-main-image">
                            <div class="award-header-content">
                                <h3>Excellence in Accounting</h3>
                                <span class="award-year">2023</span>
                            </div>
                        </div>
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

                <!-- Award 2 - Best Small Business Support -->
                <div class="award-card">
                    <div class="award-header">
                        <div class="award-image-container">
                            <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Business Support Background" class="award-image-bg">
                            <img src="img/awards/medal.png" alt="Medal Award" class="award-main-image">
                            <div class="award-header-content">
                                <h3>Best Small Business Support</h3>
                                <span class="award-year">2022</span>
                            </div>
                        </div>
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

                <!-- Award 3 - Client Service Excellence -->
                <div class="award-card">
                    <div class="award-header">
                        <div class="award-image-container">
                            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Customer Service Background" class="award-image-bg">
                            <img src="img/awards/star.png" alt="Star Award" class="award-main-image">
                            <div class="award-header-content">
                                <h3>Client Service Excellence</h3>
                                <span class="award-year">2023</span>
                            </div>
                        </div>
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

                <!-- Award 4 - Innovation in Financial Tech -->
                <div class="award-card">
                    <div class="award-header">
                        <div class="award-image-container">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Technology Background" class="award-image-bg">
                            <img src="img/awards/gem.png" alt="Gem Award" class="award-main-image">
                            <div class="award-header-content">
                                <h3>Innovation in Financial Tech</h3>
                                <span class="award-year">2021</span>
                            </div>
                        </div>
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

                <!-- Award 5 - Ethics & Compliance Award -->
                <div class="award-card">
                    <div class="award-header">
                        <div class="award-image-container">
                            <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Compliance Background" class="award-image-bg">
                            <img src="img/awards/shield.png" alt="Shield Award" class="award-main-image">
                            <div class="award-header-content">
                                <h3>Ethics & Compliance Award</h3>
                                <span class="award-year">2022</span>
                            </div>
                        </div>
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

                <!-- Award 6 - Community Service Recognition -->
                <div class="award-card">
                    <div class="award-header">
                        <div class="award-image-container">
                            <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Community Background" class="award-image-bg">
                            <img src="img/awards/heart.png" alt="Heart Award" class="award-main-image">
                            <div class="award-header-content">
                                <h3>Community Service Recognition</h3>
                                <span class="award-year">2023</span>
                            </div>
                        </div>
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

        <!-- AFFILIATED BANKS Section -->
        <div class="bank-partners-section">
            <h2 class="bank-partners-title">AFFILIATED BANKS</h2>

            <div class="bank-partners-container">
                <div class="bank-logo">
                    <img src="img/bdo.jpg.webp" alt="BDO">
                </div>

                <div class="bank-logo">
                    <img src="img/bpi.jpg" alt="BPI">
                </div>

                <div class="bank-logo">
                    <img src="img/cbs.jpg" alt="CBS">
                </div>

                <div class="bank-logo">
                    <img src="img/chinabank.jpg" alt="China Bank">
                </div>

                <div class="bank-logo">
                    <img src="img/eastwest.jpg" alt="EastWest Bank">
                </div>

                <div class="bank-logo">
                    <img src="img/ldb.png" alt="LDB">
                </div>

                <div class="bank-logo">
                    <img src="img/maybank-logo.svg" alt="Maybank">
                </div>

                <div class="bank-logo">
                    <img src="img/metrobank.png" alt="Metrobank">
                </div>

                <div class="bank-logo">
                    <img src="img/pbcom.png" alt="PBCOM">
                </div>

                <div class="bank-logo">
                    <img src="img/psbank.png" alt="PSBank">
                </div>
                
                <div class="bank-logo">
                    <img src="img/rcbc.png" alt="RCBC">
                </div>

                <div class="bank-logo">
                    <img src="img/securitybank.png" alt="Security Bank">
                </div>

                <div class="bank-logo">
                    <img src="img/unionbank.png" alt="UnionBank">
                </div>
            </div>
        </div>

        <!-- AFFILIATED CAR COMPANIES Section -->
        <div class="bank-partners-section">
            <h2 class="bank-partners-title">AFFILIATED CAR COMPANIES</h2>

            <div class="bank-partners-container">
                <div class="bank-logo">
                    <img src="img/byd.svg" alt="BYD">
                </div>
                <div class="bank-logo">
                    <img src="img/Chevrolet.jpg" alt="Chevrolet">
                </div>

                <div class="bank-logo">
                    <img src="img/Ford.png" alt="Ford">
                </div>

                <div class="bank-logo">
                    <img src="img/Geely.webp" alt="Geely">
                </div>

                <div class="bank-logo">
                    <img src="img/honda.webp" alt="Honda">
                </div>

                <div class="bank-logo">
                    <img src="img/hyundai.png" alt="Hyundai">
                </div>

                <div class="bank-logo">
                    <img src="img/isuzu.svg" alt="Isuzu">
                </div>

                <div class="bank-logo">
                    <img src="img/kia.png" alt="Kia">
                </div>

                <div class="bank-logo">
                    <img src="img/mg.png" alt="MG">
                </div>

                <div class="bank-logo">
                    <img src="img/nissan.jpg" alt="Nissan">
                </div>

                <div class="bank-logo">
                    <img src="img/subaru.png" alt="Subaru">
                </div>
                
                <div class="bank-logo">
                    <img src="img/susuki.svg" alt="Suzuki">
                </div>

                <div class="bank-logo">
                    <img src="img/toyota.png" alt="Toyota">
                </div>
            </div>
        </div>

        <!-- Affiliated Houses Section -->
        <div class="affiliated-section" id="affiliated">
            <h2 class="affiliated-title">AFFILIATED HOUSES</h2>
            
            <div class="affiliated-container">
                <!-- Grand Victoria -->
                <div class="affiliated-card">
                    <div class="affiliated-logo">
                        <!-- PALITAN ANG ICON NG PICTURE -->
                        <img src="img/gv.webp" alt="Grand Victoria Logo" class="affiliated-logo-img">
                    </div>
                    <div class="affiliated-content">
                        <h3>Grand Victoria</h3>
                        <span class="affiliated-category">Luxury Residential</span>
                        <p>Premium luxury residential development offering world-class amenities and sophisticated living spaces for discerning homeowners.</p>
                        <div class="affiliated-years">
                            <i class="fas fa-handshake"></i>
                            <span>Affiliated since 2018</span>
                        </div>
                    </div>
                </div>

                <!-- Bella Vita -->
                <div class="affiliated-card">
                    <div class="affiliated-logo">
                        <!-- PALITAN ANG ICON NG PICTURE -->
                        <img src="img/bv.jpg" alt="Bella Vita Logo" class="affiliated-logo-img">
                    </div>
                    <div class="affiliated-content">
                        <h3>Bella Vita</h3>
                        <span class="affiliated-category">Condominium</span>
                        <p>Modern condominium living with Italian-inspired architecture, offering comfort and convenience in prime locations.</p>
                        <div class="affiliated-years">
                            <i class="fas fa-handshake"></i>
                            <span>Affiliated since 2019</span>
                        </div>
                    </div>
                </div>

                <!-- Borland -->
                <div class="affiliated-card">
                    <div class="affiliated-logo">
                        <!-- PALITAN ANG ICON NG PICTURE -->
                        <img src="img/bl.jpg" alt="Borland Logo" class="affiliated-logo-img">
                    </div>
                    <div class="affiliated-content">
                        <h3>Borland</h3>
                        <span class="affiliated-category">Commercial & Residential</span>
                        <p>Diversified property developer specializing in both commercial spaces and residential communities with innovative designs.</p>
                        <div class="affiliated-years">
                            <i class="fas fa-handshake"></i>
                            <span>Affiliated since 2020</span>
                        </div>
                    </div>
                </div>

                <!-- Camella -->
                <div class="affiliated-card">
                    <div class="affiliated-logo">
                        <!-- PALITAN ANG ICON NG PICTURE -->
                        <img src="img/camella.png" alt="Camella Logo" class="affiliated-logo-img">
                    </div>
                    <div class="affiliated-content">
                        <h3>Camella</h3>
                        <span class="affiliated-category">Township Development</span>
                        <p>One of the country's leading township developers, creating complete communities with homes, amenities, and facilities.</p>
                        <div class="affiliated-years">
                            <i class="fas fa-handshake"></i>
                            <span>Affiliated since 2015</span>
                        </div>
                    </div>
                </div>

                <!-- Ajoya -->
                <div class="affiliated-card">
                    <div class="affiliated-logo">
                        <!-- PALITAN ANG ICON NG PICTURE -->
                        <img src="img/ajoya.jpg" alt="Ajoya Logo" class="affiliated-logo-img">
                    </div>
                    <div class="affiliated-content">
                        <h3>Ajoya</h3>
                        <span class="affiliated-category">Eco-Friendly Homes</span>
                        <p>Sustainable and eco-friendly residential communities that promote green living and environmental consciousness.</p>
                        <div class="affiliated-years">
                            <i class="fas fa-handshake"></i>
                            <span>Affiliated since 2021</span>
                        </div>
                    </div>
                </div>

                <!-- Deca Homes -->
                <div class="affiliated-card">
                    <div class="affiliated-logo">
                        <!-- PALITAN ANG ICON NG PICTURE -->
                        <img src="img/dh.jpg" alt="Deca Homes Logo" class="affiliated-logo-img">
                    </div>
                    <div class="affiliated-content">
                        <h3>Deca Homes</h3>
                        <span class="affiliated-category">Affordable Housing</span>
                        <p>Providing quality affordable housing solutions for Filipino families, making home ownership accessible to more people.</p>
                        <div class="affiliated-years">
                            <i class="fas fa-handshake"></i>
                            <span>Affiliated since 2017</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include 'footer.php'; ?>

    <script>
        // Enhanced Hero Carousel Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Hero Carousel
            const heroTrack = document.getElementById('heroCarouselTrack');
            const heroPrevBtn = document.getElementById('heroPrevBtn');
            const heroNextBtn = document.getElementById('heroNextBtn');
            const heroDotsContainer = document.getElementById('heroCarouselDots');
            const heroLoader = document.getElementById('heroLoader');
            
            if (!heroTrack) return;
            
            const heroSlides = Array.from(heroTrack.children);
            let heroCurrentIndex = 0;
            let heroAutoPlayInterval;
            let heroProgressInterval;
            
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
            
            // Show loading animation
            function showHeroLoader() {
                heroLoader.style.display = 'block';
                // Reset animation
                const afterElement = document.createElement('div');
                heroLoader.innerHTML = '';
                heroLoader.appendChild(afterElement);
                afterElement.style.animation = 'loading 3s linear';
                setTimeout(() => {
                    heroLoader.style.display = 'none';
                }, 3000);
            }
            
            // Update hero carousel position
            function updateHeroCarousel() {
                showHeroLoader();
                
                // Remove active class from all slides
                heroSlides.forEach(slide => {
                    slide.classList.remove('active');
                });
                
                // Add active class to current slide
                heroSlides[heroCurrentIndex].classList.add('active');
                
                // Reset progress bar
                const progressBar = document.querySelector('.progress-bar');
                if (progressBar) {
                    progressBar.style.width = '0%';
                    void progressBar.offsetWidth;
                    progressBar.style.width = '100%';
                    progressBar.style.transition = 'width 5s linear';
                }
                
                // Move track with smooth animation
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
                clearInterval(heroProgressInterval);
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
            
            // Touch/swipe support for hero carousel
            let touchStartX = 0;
            let touchEndX = 0;
            
            heroTrack.addEventListener('touchstart', e => {
                touchStartX = e.changedTouches[0].screenX;
            });
            
            heroTrack.addEventListener('touchend', e => {
                touchEndX = e.changedTouches[0].screenX;
                handleHeroSwipe();
            });
            
            function handleHeroSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;
                
                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        nextHeroSlide();
                    } else {
                        prevHeroSlide();
                    }
                    resetHeroAutoPlay();
                }
            }
            
            // Pause auto-play on hover
            heroTrack.addEventListener('mouseenter', () => {
                clearInterval(heroAutoPlayInterval);
                clearInterval(heroProgressInterval);
                const progressBar = document.querySelector('.progress-bar');
                if (progressBar) {
                    progressBar.style.transition = 'none';
                    const computedStyle = window.getComputedStyle(progressBar);
                    progressBar.style.width = computedStyle.width;
                }
            });
            
            heroTrack.addEventListener('mouseleave', () => {
                startHeroAutoPlay();
                const progressBar = document.querySelector('.progress-bar');
                if (progressBar) {
                    progressBar.style.transition = 'width 5s linear';
                    void progressBar.offsetWidth;
                    progressBar.style.width = '100%';
                }
            });
            
            // Handle window resize
            let resizeTimeout;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    updateHeroCarousel();
                }, 250);
            });
            
            // Initialize hero carousel
            createHeroDots();
            updateHeroCarousel();
            startHeroAutoPlay();

            // ENHANCED Sales Carousel Functionality
            const track = document.getElementById('carouselTrack');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const dotsContainer = document.getElementById('carouselDots');
            const counter = document.getElementById('carouselCounter');
            const salesLoader = document.getElementById('salesLoader');
            
            if (!track) return;
            
            const slides = Array.from(track.children);
            let currentIndex = 0;
            let slidesPerView = 3;
            let isTransitioning = false;
            
            // Show loading animation for sales carousel
            function showSalesLoader() {
                salesLoader.style.display = 'block';
                // Reset animation
                const afterElement = document.createElement('div');
                salesLoader.innerHTML = '';
                salesLoader.appendChild(afterElement);
                afterElement.style.animation = 'loading 0.6s linear';
                setTimeout(() => {
                    salesLoader.style.display = 'none';
                }, 600);
            }
            
            // Update slides per view based on screen size
            function updateSlidesPerView() {
                if (window.innerWidth <= 480) {
                    slidesPerView = 1;
                } else if (window.innerWidth <= 768) {
                    slidesPerView = 2;
                } else if (window.innerWidth <= 1200) {
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
            
            // Update counter
            function updateCounter() {
                const currentSlide = Math.floor(currentIndex / slidesPerView) + 1;
                const totalSlides = Math.ceil(slides.length / slidesPerView);
                counter.textContent = `${currentSlide}/${totalSlides}`;
            }
            
            // Update carousel position with smooth transition
            function updateCarousel() {
                if (isTransitioning) return;
                
                isTransitioning = true;
                showSalesLoader();
                
                const slideWidth = slides[0].offsetWidth;
                const gap = 30;
                const offset = -currentIndex * (slideWidth + gap);
                
                track.style.transition = 'transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                track.style.transform = `translateX(${offset}px)`;
                
                // Update dots
                const dots = Array.from(dotsContainer.children);
                const activeDotIndex = Math.floor(currentIndex / slidesPerView);
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === activeDotIndex);
                });
                
                updateCounter();
                
                // Reset transitioning state
                setTimeout(() => {
                    isTransitioning = false;
                }, 600);
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
                    // Add bounce effect when reaching the end
                    track.style.transition = 'transform 0.3s ease';
                    track.style.transform = `translateX(-${currentIndex * (slides[0].offsetWidth + 30)}px) scale(0.98)`;
                    setTimeout(() => {
                        track.style.transition = 'transform 0.3s ease';
                        track.style.transform = `translateX(-${currentIndex * (slides[0].offsetWidth + 30)}px) scale(1)`;
                        currentIndex = 0;
                        setTimeout(updateCarousel, 300);
                    }, 300);
                    return;
                }
                updateCarousel();
            }
            
            function prevSlide() {
                const totalSlides = slides.length;
                
                if (currentIndex > 0) {
                    currentIndex -= 1;
                } else {
                    // Add bounce effect when reaching the start
                    track.style.transition = 'transform 0.3s ease';
                    track.style.transform = 'translateX(0px) scale(0.98)';
                    setTimeout(() => {
                        track.style.transition = 'transform 0.3s ease';
                        track.style.transform = 'translateX(0px) scale(1)';
                        currentIndex = totalSlides - slidesPerView;
                        setTimeout(updateCarousel, 300);
                    }, 300);
                    return;
                }
                updateCarousel();
            }
            
            // Event listeners
            nextBtn.addEventListener('click', () => {
                if (!isTransitioning) nextSlide();
            });
            
            prevBtn.addEventListener('click', () => {
                if (!isTransitioning) prevSlide();
            });
            
            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    if (!isTransitioning) prevSlide();
                } else if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    if (!isTransitioning) nextSlide();
                }
            });
            
            // Touch/swipe support for sales carousel
            let salesTouchStartX = 0;
            
            track.addEventListener('touchstart', e => {
                salesTouchStartX = e.changedTouches[0].screenX;
            });
            
            track.addEventListener('touchend', e => {
                if (isTransitioning) return;
                
                const salesTouchEndX = e.changedTouches[0].screenX;
                const salesDiff = salesTouchStartX - salesTouchEndX;
                const swipeThreshold = 50;
                
                if (Math.abs(salesDiff) > swipeThreshold) {
                    if (salesDiff > 0) {
                        nextSlide();
                    } else {
                        prevSlide();
                    }
                }
            });
            
            // Auto-play functionality
            let autoPlayInterval = setInterval(() => {
                if (!isTransitioning && !track.matches(':hover')) {
                    nextSlide();
                }
            }, 5000);
            
            // Pause auto-play on hover
            track.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
            track.addEventListener('mouseleave', () => {
                autoPlayInterval = setInterval(() => {
                    if (!isTransitioning) {
                        nextSlide();
                    }
                }, 5000);
            });
            
            // Handle window resize
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    updateSlidesPerView();
                    createDots();
                    updateCarousel();
                    updateHeroCarousel();
                }, 250);
            });
            
            // Initialize sales carousel
            updateSlidesPerView();
            createDots();
            updateCounter();
            updateCarousel();

            // Add hover effect to sales items
            document.querySelectorAll('.sales-item').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    if (!isTransitioning) {
                        this.style.transform = 'translateY(-15px) scale(1.02)';
                    }
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                });
            });

            // Add intersection observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);
            
            // Observe carousel slides
            slides.forEach(slide => {
                slide.style.opacity = '0';
                slide.style.transform = 'translateY(30px)';
                slide.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(slide);
            });

            // Observe hero slides
            heroSlides.forEach(slide => {
                slide.style.opacity = '0';
                slide.style.transform = 'translateX(50px)';
                slide.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                observer.observe(slide);
            });
        });
    </script>
</body>
</html>