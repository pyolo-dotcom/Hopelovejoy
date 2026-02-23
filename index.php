<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
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

        /* Hero Carousel Navigation - LINE STYLE DOTS */
        .hero-carousel-nav {
            position: absolute;
            bottom: 30px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 100;
        }

        /* Line style dots container */
        .hero-carousel-dots {
            display: flex;
            gap: 12px;
            padding: 10px 20px;
            background: rgba(44, 43, 41, 0.85);
            border-radius: 25px;
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        /* Line style dots (pahabang rectangles) */
        .hero-carousel-dot {
            width: 40px;
            height: 6px;
            border-radius: 3px;
            background: rgba(255, 255, 255, 0.4);
            border: none;
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            padding: 0;
            margin: 0;
            overflow: hidden;
        }

        /* Hover effect para sa lines */
        .hero-carousel-dot:hover {
            background: rgba(238, 184, 46, 0.7);
            transform: scaleX(1.2);
        }

        /* Active line - mas maliwanag at mas mahaba */
        .hero-carousel-dot.active {
            background: #eeb82e;
            transform: scaleX(1.3);
            box-shadow: 0 0 10px rgba(238, 184, 46, 0.6);
        }

        /* Optional: Add a subtle animation to the active line */
        .hero-carousel-dot.active::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(255, 255, 255, 0.3) 50%, 
                transparent 100%);
            animation: shine 2s infinite;
            border-radius: 3px;
        }

        @keyframes shine {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        /* Mobile adjustments */
        @media screen and (max-width: 768px) {
            .hero-carousel-nav {
                bottom: 20px;
            }
            
            .hero-carousel-dots {
                padding: 8px 15px;
                gap: 10px;
            }
            
            .hero-carousel-dot {
                width: 30px;
                height: 5px;
                border-radius: 2.5px;
            }
            
            .hero-carousel-dot:hover {
                transform: scaleX(1.1);
            }
            
            .hero-carousel-dot.active {
                transform: scaleX(1.2);
            }
        }

        @media screen and (max-width: 480px) {
            .hero-carousel-nav {
                bottom: 15px;
            }
            
            .hero-carousel-dots {
                padding: 6px 12px;
                gap: 8px;
            }
            
            .hero-carousel-dot {
                width: 25px;
                height: 4px;
                border-radius: 2px;
            }
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
            transition: transform 0.5s ease;
        }

        .about-us-map:hover img {
            transform: scale(1.05);
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

        /* MALAKING IMAGE - PINALAKI KO DITO */
        .item-img {
            width: 100%;
            height: 350px; /* Pinalaki mula 200px */
            overflow: hidden;
        }

        .item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        /* Hover effect para mas lalong lumaki ang image */
        .item-img:hover img {
            transform: scale(1.05);
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
            cursor: pointer; /* Add this line */
        }

        .award-image-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 1.15;
            filter: brightness(0.8);
            transition: transform 0.5s ease;
        }

        .award-image-container:hover .award-image-bg {
            transform: scale(1.1);
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

        .item-info {
            padding: 20px;
            text-align: center;
        }

        .item-info h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.2rem;
            color: #2c2b29;
            margin-bottom: 5px;
        }

        .item-category {
            display: inline-block;
            background: #eeb82e;
            color: #2c2b29;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .item-description {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 10px;
            text-align: left;
        }

        .item-price {
            font-weight: 700;
            color: #2c2b29;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .item-date {
            color: #999;
            font-size: 0.85rem;
            font-style: italic;
        }

        /* MODAL STYLES - UPDATED FOR 6.3 INCH SCREEN */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.98);
            overflow: hidden;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            margin: 0;
            display: flex;
            flex-direction: column;
            width: 100vw;
            height: 100vh;
            position: relative;
            background: transparent;
            border: none;
            padding: 0;
            animation: zoomIn 0.3s ease;
        }

        @keyframes zoomIn {
            from { transform: scale(0.95); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .modal-image-container {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-image {
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.5);
            margin: 0 auto;
        }

        .close-modal {
            position: fixed;
            top: 20px;
            right: 20px;
            color: white;
            font-size: 45px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10000;
            background: rgba(44, 43, 41, 0.95);
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: 3px solid #eeb82e;
            box-shadow: 0 4px 20px rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
        }

        .close-modal:hover {
            color: #eeb82e;
            transform: scale(1.1) rotate(90deg);
            background: rgba(44, 43, 41, 1);
        }

        .modal-caption {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            color: white;
            padding: 18px 30px;
            background: rgba(44, 43, 41, 0.95);
            width: fit-content;
            max-width: 90%;
            border-radius: 60px;
            font-family: 'Roboto Serif', serif;
            border: 3px solid #eeb82e;
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
            backdrop-filter: blur(5px);
            z-index: 10001;
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from { transform: translate(-50%, 20px); opacity: 0; }
            to { transform: translate(-50%, 0); opacity: 1; }
        }

        .modal-caption h3 {
            margin-bottom: 8px;
            color: #eeb82e;
            font-size: 1.4rem;
            font-weight: 600;
        }

        .modal-caption p {
            margin: 0;
            font-size: 1.2rem;
            color: #fff;
            opacity: 0.9;
        }

        /* Mobile Responsive Modal Styles - 6.3 inch screen specific */
        @media screen and (max-width: 768px) {
            .modal-image {
                max-width: 98%;
                max-height: 80vh;
            }

            .close-modal {
                top: 15px;
                right: 15px;
                font-size: 40px;
                width: 55px;
                height: 55px;
                border-width: 3px;
            }

            .modal-caption {
                bottom: 25px;
                padding: 15px 25px;
                border-radius: 50px;
                border-width: 2px;
            }

            .modal-caption h3 {
                font-size: 1.3rem;
                margin-bottom: 5px;
            }

            .modal-caption p {
                font-size: 1.1rem;
            }
        }

        @media screen and (max-width: 480px) {
            .modal-image {
                max-width: 100%;
                max-height: 75vh;
                border-radius: 12px;
            }

            .close-modal {
                top: 12px;
                right: 12px;
                font-size: 35px;
                width: 50px;
                height: 50px;
                border-width: 2px;
            }

            .modal-caption {
                bottom: 20px;
                padding: 12px 20px;
                border-radius: 40px;
                border-width: 2px;
            }

            .modal-caption h3 {
                font-size: 1.2rem;
                margin-bottom: 4px;
            }

            .modal-caption p {
                font-size: 1rem;
            }
        }

        /* Landscape Mode Support */
        @media screen and (max-height: 500px) and (orientation: landscape) {
            .modal-image {
                max-height: 70vh;
            }

            .modal-caption {
                bottom: 15px;
                padding: 10px 20px;
            }

            .modal-caption h3 {
                font-size: 1rem;
            }

            .modal-caption p {
                font-size: 0.9rem;
            }

            .close-modal {
                top: 10px;
                right: 10px;
                width: 45px;
                height: 45px;
                font-size: 30px;
            }
        }

        /* Award Image Container - ADD CLICK CURSOR */
        .award-image-container {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            cursor: pointer; /* Add this line */
        }

        .award-image-container:hover .award-image-bg {
            transform: scale(1.05);
        }

        .award-image-container:hover::after {
            content: 'Click to view full image';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(44, 43, 41, 0.85);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            z-index: 10;
            border: 2px solid #eeb82e;
        }

        /* Mobile Responsive Styles */
        @media screen and (max-width: 768px) {

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
            }

            .hero-carousel-dots {
                padding: 8px 15px;
                gap: 10px;
            }

            .hero-carousel-dot {
                width: 30px;
                height: 5px;
                border-radius: 2.5px;
            }

            .hero-carousel-dot:hover {
                transform: scaleX(1.1);
            }

            .hero-carousel-dot.active {
                transform: scaleX(1.2);
            }

            .about-us-title,
            .sales-title,
            .awards-title,
            .bank-partners-title,
            .affiliated-title {
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

            .awards-title {
                font-size: 2.2rem;
            }

            .awards-container {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 10px;
            }

            .award-card {
                margin: 0 10px;
            }

            .award-header {
                min-height: 160px;
            }

            .award-main-image {
                max-width: 120px;
                max-height: 120px;
            }

            .award-header h3 {
                font-size: 1.3rem;
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

            .affiliated-title {
                font-size: 2.2rem;
            }
            
            .affiliated-container {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 20px;
                padding: 10px;
            }
            
            .affiliated-card {
                padding: 20px;
            }
            
            .affiliated-logo {
                width: 100px;
                height: 100px;
                margin-bottom: 20px;
            }
            
            .logo-placeholder {
                width: 60px;
                height: 60px;
                font-size: 2rem;
            }
            
            .affiliated-content h3 {
                font-size: 1.3rem;
            }

            /* Adjust image height for tablet */
            .item-img {
                height: 300px; /* Bahagyang mas mababa para sa tablet */
            }
            
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

            /* Bank partners mobile adjustments */
            .bank-partners-container {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
                gap: 20px;
                padding: 10px;
            }
            
            .bank-logo {
                height: 100px;
                padding: 15px;
            }

            .modal-content {
                max-width: 95%;
                max-height: 95%;
            }
            
            .close-modal {
                top: 10px;
                right: 15px;
                font-size: 30px;
                width: 40px;
                height: 40px;
            }
            
            .modal-caption {
                bottom: 10px;
                padding: 8px 15px;
                font-size: 0.9rem;
            }
            
            .award-image-container:hover::after {
                font-size: 0.7rem;
                padding: 6px 12px;
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
            }

            .hero-carousel-dots {
                padding: 6px 12px;
                gap: 8px;
            }

            .hero-carousel-dot {
                width: 25px;
                height: 4px;
                border-radius: 2px;
            }

            /* Carousel adjustments for very small screens */
            .carousel-slide {
                min-width: 100%;
            }
            
            .item-img {
                height: 250px; /* Slightly smaller for mobile but still larger than original */
            }
            
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

            .awards-title {
                font-size: 1.8rem;
            }

            .award-header {
                min-height: 140px;
            }

            .award-main-image {
                max-width: 100px;
                max-height: 100px;
            }

            .award-header h3 {
                font-size: 1.2rem;
            }

            .award-body {
                padding: 20px;
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

            .affiliated-title {
                font-size: 1.8rem;
            }
            
            .affiliated-container {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .affiliated-card {
                margin: 0 10px;
            }

            /* Bank partners very small screens */
            .bank-partners-title {
                font-size: 1.8rem;
                margin-bottom: 30px;
            }
            
            .bank-partners-container {
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }
            
            .bank-logo {
                height: 80px;
                padding: 10px;
            }

            .close-modal {
                top: 5px;
                right: 10px;
                font-size: 25px;
                width: 35px;
                height: 35px;
            }
            
            .modal-caption {
                bottom: 5px;
                padding: 5px 10px;
                font-size: 0.8rem;
            }
            
            .modal-caption h3 {
                font-size: 0.9rem;
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
    <?php include 'navbar.php'; ?>

    <div class="main-content">
        <!-- Hero Carousel Section -->
        <div class="hero-carousel-section fade-in">
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

            <!-- Navigation Dots Only - LINE STYLE -->
            <div class="hero-carousel-nav">
                <div class="hero-carousel-dots" id="heroCarouselDots"></div>
            </div>
        </div>

        <!-- About Us Section - Simple white design -->
        <div class="about-us-section fade-in">
            <h2 class="about-us-title slide-up">ABOUT US</h2>
            <div class="about-us-container">
                <div class="about-us-text fade-in-left">
                    <p>Hope Specialist is a trusted financial services company established in 2022, dedicated to helping individuals and families turn their goals into reality. We specialize in assisting clients with car acquisition and financing, while also offering a wide range of services related to housing, real estate, and insurance solutions.</p>
                    <p>Located at Brgy. Concepcion, Maharlika Hi-way, Cabanatuan City, Nueva Ecija, Hope Specialist has built a strong reputation by delivering reliable, transparent, and client-focused services. Through our growing network of partnerships with banks, car dealers, real estate developers, and housing providers, we make the process of owning a car, home, or property more accessible and stress-free.</p>
                </div>
                <div class="about-us-map fade-in-right">
                    <img src="img/indexpics.jpg" alt="Location Map">
                </div>
            </div>
        </div>

        <!-- Mission & Vision Section -->
        <div class="mission-vision-section fade-in">
            <h2 class="mission-vision-title slide-up">MISSION & VISION</h2>
            
            <div class="mission-vision-container stagger-children">
                <!-- Mission Card -->
                <div class="mission-card zoom-in">
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
                <div class="vision-card zoom-in">
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
        <div class="sales-section fade-in">
            <h2 class="sales-title slide-up">PAST SALES HISTORY</h2>
            
            <div class="carousel-container">
                <div class="carousel-track" id="carouselTrack">
                    <?php
                    // Include database connection
                    require_once 'config.php';
                    
                    // Query to fetch active past sales
                    $sql = "SELECT * FROM past_sales WHERE is_active = 1 ORDER BY sale_date DESC";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $image_path = $row['image_path'];
                            $title = htmlspecialchars($row['title']);
                            $description = htmlspecialchars($row['description']);
                            $price = $row['price'] ? '₱' . number_format($row['price'], 2) : '';
                            $category = $row['category'];
                            
                            echo '
                            <!-- Vehicle Sale -->
                            <div class="carousel-slide">
                                <div class="sales-item">
                                    <div class="item-img">
                                        <img src="' . $image_path . '" alt="' . $title . '" 
                                            onerror="this.src=\'https://via.placeholder.com/400x350?text=No+Image\'">
                                    </div>
                                    <div class="item-info">
                                        <h3>' . $title . '</h3>
                                        <div class="item-category">' . ucfirst($category) . '</div>';
                            
                            if (!empty($description)) {
                                echo '<p class="item-description">' . $description . '</p>';
                            }
                            
                            if (!empty($price)) {
                                echo '<div class="item-price">' . $price . '</div>';
                            }
                            
                            echo '
                                        <div class="item-date">' . date('M d, Y', strtotime($row['sale_date'])) . '</div>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {                        
                        foreach ($default_images as $image) {
                            echo '
                            <div class="carousel-slide">
                                <div class="sales-item">
                                    <div class="item-img">
                                        <img src="' . $image . '" alt="Past Sale">
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                    
                    ?>
                </div>
                
                <button class="carousel-btn prev" id="prevBtn">&#10094;</button>
                <button class="carousel-btn next" id="nextBtn">&#10095;</button>
            </div>
            
            <div class="carousel-dots" id="carouselDots"></div>
        </div>

        <!-- Awards & Recognition Section - UPDATED WITH DYNAMIC DATA -->
        <div class="awards-section fade-in" id="awards">
            <h2 class="awards-title slide-up">AWARDS & RECOGNITION</h2>
            
            <div class="awards-container stagger-children">
                <?php
                // Fetch active awards from database
                require_once 'config.php';
                $awards_sql = "SELECT * FROM awards WHERE is_active = 1 ORDER BY display_order ASC, award_year DESC";
                $awards_result = mysqli_query($conn, $awards_sql);
                
                if (mysqli_num_rows($awards_result) > 0) {
                    while ($award = mysqli_fetch_assoc($awards_result)) {
                        $title = htmlspecialchars($award['title']);
                        $description = htmlspecialchars($award['description']);
                        $year = htmlspecialchars($award['award_year']);
                        $issuer = htmlspecialchars($award['issuer']);
                        $issuer_category = htmlspecialchars($award['issuer_category']);
                        $bg_image = $award['background_image_path'];
                        $award_image = !empty($award['image_path']) ? $award['image_path'] : '';
                        
                        echo '
                        <div class="award-card zoom-in">
                            <div class="award-header">
                                <div class="award-image-container" 
                                    onclick="openModal(\'' . $bg_image . '\', \'' . addslashes($title) . '\', \'' . $year . '\')">
                                    <!-- Background Image -->
                                    <img src="' . $bg_image . '" alt="' . $title . ' Background" class="award-image-bg">
                                    ' . (!empty($award_image) ? '<img src="' . $award_image . '" alt="' . $title . '" class="award-main-image">' : '') . '
                                    <div class="award-header-content">
                                        <h3>' . $title . '</h3>
                                        <span class="award-year">' . $year . '</span>
                                    </div>
                                </div>
                            </div>
                            <div class="award-body">
                                <p>' . $description . '</p>
                                <div class="award-issuer" style="justify-content: center;">
                                    <div class="issuer-info" style="text-align: center;">
                                        <h4>' . $issuer . '</h4>
                                        ' . (!empty($issuer_category) ? '<p>' . $issuer_category . '</p>' : '') . '
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }   
                ?>
            </div>
        </div>

        <!-- AFFILIATED BANKS Section -->
        <div class="bank-partners-section fade-in">
            <h2 class="bank-partners-title slide-up">AFFILIATED BANKS</h2>

            <?php
            // Include database connection
            require_once 'config.php';
            
            // Query to fetch active banks
            $banks_sql = "SELECT * FROM affiliated_banks WHERE is_active = 1 ORDER BY display_order ASC, name ASC";
            $banks_result = mysqli_query($conn, $banks_sql);
            ?>
            
            <div class="bank-partners-container stagger-children">
                <?php if (mysqli_num_rows($banks_result) > 0): ?>
                    <?php while ($bank = mysqli_fetch_assoc($banks_result)): ?>
                        <div class="bank-logo zoom-in">
                            <img src="<?php echo $bank['logo_path']; ?>" 
                                alt="<?php echo htmlspecialchars($bank['name']); ?>"
                                onerror="this.src='https://via.placeholder.com/150x100?text=Bank+Logo'">
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- AFFILIATED CAR COMPANIES Section -->
        <div class="bank-partners-section fade-in">
            <h2 class="bank-partners-title slide-up">AFFILIATED CAR COMPANIES</h2>

            <?php
            // Query to fetch active car companies
            $cars_sql = "SELECT * FROM affiliated_cars WHERE is_active = 1 ORDER BY display_order ASC, name ASC";
            $cars_result = mysqli_query($conn, $cars_sql);
            ?>
            
            <div class="bank-partners-container stagger-children">
                <?php if (mysqli_num_rows($cars_result) > 0): ?>
                    <?php while ($car = mysqli_fetch_assoc($cars_result)): ?>
                        <div class="bank-logo zoom-in">
                            <img src="<?php echo $car['logo_path']; ?>" 
                                alt="<?php echo htmlspecialchars($car['name']); ?>"
                                onerror="this.src='https://via.placeholder.com/150x100?text=Car+Logo'">
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Affiliated Houses Section -->
        <div class="affiliated-section fade-in" id="affiliated">
            <h2 class="affiliated-title slide-up">AFFILIATED HOUSES</h2>
            
            <div class="affiliated-container stagger-children">
                <?php
                // Include database connection
                require_once 'config.php';
                
                // Query to fetch active affiliated houses
                $affiliated_sql = "SELECT * FROM affiliated_houses WHERE is_active = 1 ORDER BY display_order ASC, name ASC";
                $affiliated_result = mysqli_query($conn, $affiliated_sql);
                
                if (mysqli_num_rows($affiliated_result) > 0) {
                    while ($affiliated = mysqli_fetch_assoc($affiliated_result)) {
                        $name = htmlspecialchars($affiliated['name']);
                        $category = htmlspecialchars($affiliated['category']);
                        $description = htmlspecialchars($affiliated['description']);
                        $image_path = $affiliated['image_path'];
                        $years = htmlspecialchars($affiliated['years_affiliated']);
                        
                        echo '
                        <div class="affiliated-card zoom-in">
                            <div class="affiliated-logo">
                                <img src="' . $image_path . '" alt="' . $name . ' Logo" class="affiliated-logo-img"
                                    onerror="this.src=\'https://via.placeholder.com/100x100?text=' . urlencode($name) . '\'">
                            </div>
                            <div class="affiliated-content">
                                <h3>' . $name . '</h3>
                                <span class="affiliated-category">' . $category . '</span>
                                <p>' . $description . '</p>
                                <div class="affiliated-years">
                                    <i class="fas fa-handshake"></i>
                                    <span>' . $years . '</span>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    foreach ($default_houses as $house) {
                        echo '
                        <div class="affiliated-card">
                            <div class="affiliated-logo">
                                <img src="' . $house['image'] . '" alt="' . $house['name'] . ' Logo" class="affiliated-logo-img">
                            </div>
                            <div class="affiliated-content">
                                <h3>' . $house['name'] . '</h3>
                                <span class="affiliated-category">' . $house['category'] . '</span>
                                <p>' . $house['description'] . '</p>
                                <div class="affiliated-years">
                                    <i class="fas fa-handshake"></i>
                                    <span>' . $house['years'] . '</span>
                                </div>
                            </div>
                        </div>';
                    }
                }
                ?>
            </div>
        </div>

    </div>

    <?php include 'footer.php'; ?>

    <script>
        // Hero Carousel Functionality - LINE STYLE DOTS
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Hero Carousel
            const heroTrack = document.getElementById('heroCarouselTrack');
            const heroDotsContainer = document.getElementById('heroCarouselDots');
            
            if (!heroTrack) return;
            
            const heroSlides = Array.from(heroTrack.children);
            let heroCurrentIndex = 0;
            let heroAutoPlayInterval;
            const autoPlayIntervalTime = 5000; // 5 seconds
            
            // Create line dots for hero carousel
            function createHeroDots() {
                heroDotsContainer.innerHTML = '';
                
                for (let i = 0; i < heroSlides.length; i++) {
                    const line = document.createElement('button');
                    line.classList.add('hero-carousel-dot');
                    if (i === 0) line.classList.add('active');
                    line.setAttribute('data-index', i);
                    line.setAttribute('aria-label', `Go to slide ${i + 1}`);
                    line.addEventListener('click', () => goToHeroSlide(i));
                    heroDotsContainer.appendChild(line);
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
                
                // Update line dots
                const heroDots = Array.from(heroDotsContainer.children);
                heroDots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === heroCurrentIndex);
                });
            }
            
            function goToHeroSlide(index) {
                heroCurrentIndex = index;
                updateHeroCarousel();
                resetHeroAutoPlay(); // Reset timer when user clicks a line
            }
            
            function nextHeroSlide() {
                heroCurrentIndex = (heroCurrentIndex + 1) % heroSlides.length;
                updateHeroCarousel();
            }
            
            function startHeroAutoPlay() {
                heroAutoPlayInterval = setInterval(nextHeroSlide, autoPlayIntervalTime);
            }
            
            function stopHeroAutoPlay() {
                clearInterval(heroAutoPlayInterval);
            }
            
            function resetHeroAutoPlay() {
                stopHeroAutoPlay();
                startHeroAutoPlay();
            }
            
            // Keyboard navigation (optional)
            document.addEventListener('keydown', (e) => {
                if(e.key === 'ArrowLeft') {
                    heroCurrentIndex = (heroCurrentIndex - 1 + heroSlides.length) % heroSlides.length;
                    updateHeroCarousel();
                    resetHeroAutoPlay();
                } else if(e.key === 'ArrowRight') {
                    heroCurrentIndex = (heroCurrentIndex + 1) % heroSlides.length;
                    updateHeroCarousel();
                    resetHeroAutoPlay();
                }
            });
            
            // Touch/swipe support for mobile
            let touchStartX = 0;
            let touchEndX = 0;
            
            heroTrack.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
                stopHeroAutoPlay();
            });
            
            heroTrack.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startHeroAutoPlay();
            });
            
            function handleSwipe() {
                const swipeThreshold = 50;
                
                if(touchStartX - touchEndX > swipeThreshold) {
                    // Swipe left - next slide
                    heroCurrentIndex = (heroCurrentIndex + 1) % heroSlides.length;
                    updateHeroCarousel();
                } else if(touchEndX - touchStartX > swipeThreshold) {
                    // Swipe right - previous slide
                    heroCurrentIndex = (heroCurrentIndex - 1 + heroSlides.length) % heroSlides.length;
                    updateHeroCarousel();
                }
            }
            
            // Pause auto-play on hover
            const heroSection = document.querySelector('.hero-carousel-section');
            heroSection.addEventListener('mouseenter', stopHeroAutoPlay);
            heroSection.addEventListener('mouseleave', startHeroAutoPlay);
            
            // Pause auto-play when user interacts with line dots
            heroDotsContainer.addEventListener('mouseenter', stopHeroAutoPlay);
            heroDotsContainer.addEventListener('mouseleave', startHeroAutoPlay);
            
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

            // SCROLL ANIMATION FUNCTIONALITY
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
            
            // Check on scroll
            window.addEventListener('scroll', checkScroll);
        });

        // MODAL FUNCTIONALITY - UPDATED FOR 6.3 INCH SCREEN
        function openModal(imageSrc, title, year) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const modalYear = document.getElementById('modalYear');
            
            modal.style.display = "block";
            modalImg.src = imageSrc;
            modalTitle.textContent = title;
            modalYear.textContent = year + ' Award';
            
            // Prevent body scroll when modal is open
            document.body.style.overflow = 'hidden';
            
            // Add keyboard support
            document.addEventListener('keydown', handleKeyPress);
            
            // Force image to use full screen
            setTimeout(() => {
                modalImg.style.maxHeight = window.innerHeight * 0.85 + 'px';
                modalImg.style.maxWidth = '100%';
            }, 100);
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = "none";
            
            // Restore body scroll
            document.body.style.overflow = 'auto';
            
            // Remove keyboard event listener
            document.removeEventListener('keydown', handleKeyPress);
        }

        function handleKeyPress(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        }

        // Add click events for modal
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('imageModal');
            const closeBtn = document.querySelector('.close-modal');
            
            // Close modal when clicking X
            closeBtn.addEventListener('click', closeModal);
            
            // Close modal when clicking outside the image
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    closeModal();
                }
            });
            
            // Add touch support for mobile
            modal.addEventListener('touchstart', function(event) {
                if (event.target === modal) {
                    closeModal();
                }
            });
            
            // Prevent zooming issues on mobile
            modal.addEventListener('touchmove', function(event) {
                if (event.target === modal || event.target.classList.contains('modal-image')) {
                    event.preventDefault();
                }
            }, { passive: false });
            
            // Handle orientation change
            window.addEventListener('resize', function() {
                if (modal.style.display === 'block') {
                    const modalImg = document.getElementById('modalImage');
                    modalImg.style.maxHeight = window.innerHeight * 0.85 + 'px';
                }
            });
        });
    </script>

    <!-- Modal for Fullscreen Image - UPDATED STRUCTURE FOR 6.3 INCH SCREEN -->
    <div id="imageModal" class="modal">
        <span class="close-modal">&times;</span>
        <div class="modal-content">
            <div class="modal-image-container">
                <img class="modal-image" id="modalImage" src="" alt="Fullscreen View">
            </div>
            <div class="modal-caption">
                <h3 id="modalTitle"></h3>
                <p id="modalYear"></p>
            </div>
        </div>
    </div>
</body>
</html>