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

        body {
            background-color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
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
            padding: 60px 20px;
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            text-align: center;
            color: white;
            border-radius: 15px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .services-hero-title {
            font-family: 'Roboto Serif', serif;
            font-size: 2.8rem;
            margin-bottom: 15px;
            font-weight: 700;
            position: relative;
            z-index: 1;
            line-height: 1.2;
        }

        .services-hero-subtitle {
            font-family: 'WindSong', cursive;
            font-size: 2.2rem;
            color: #eeb82e;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
            line-height: 1.2;
        }

        .services-hero-description {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.1rem;
            line-height: 1.7;
            color: #f0f0f0;
            position: relative;
            z-index: 1;
            padding: 0 10px;
        }

        /* Compact Services Grid Section */
        .services-section {
            padding: 60px 15px;
            background-color: white;
            text-align: center;
        }

        .services-title {
            font-family: 'Roboto Serif', serif;
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 1.2;
        }

        .services-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            padding: 15px;
        }

        /* Compact Service Card */
        .service-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            border: 1px solid #f0f0f0;
            cursor: pointer;
            position: relative;
            min-height: 220px;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(238, 184, 46, 0.15);
            border-color: #eeb82e;
        }

        .service-card::after {
            content: 'View Details';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(44, 43, 41, 0.9);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Roboto Serif', serif;
            font-weight: 600;
            font-size: 1rem;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 12px;
            z-index: 2;
            text-align: center;
        }

        .service-card:hover::after {
            opacity: 1;
        }

        .service-header {
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            padding: 20px 15px;
            text-align: center;
            position: relative;
            overflow: hidden;
            min-height: 120px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .service-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: #eeb82e;
        }

        .service-icon {
            font-size: 2.2rem;
            color: #eeb82e;
            margin-bottom: 10px;
        }

        .service-header h3 {
            color: white;
            font-family: 'Roboto Serif', serif;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
            line-height: 1.3;
            max-width: 100%;
        }

        .service-tag {
            display: inline-block;
            background: #eeb82e;
            color: #2c2b29;
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-top: 5px;
        }

        .service-body {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .service-body p {
            color: #555;
            line-height: 1.5;
            margin-bottom: 0;
            font-size: 0.85rem;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-align: center;
        }

        /* "View More" indicator */
        .service-more {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 8px;
            color: #eeb82e;
            font-size: 0.8rem;
            font-weight: 600;
            gap: 5px;
        }

        .service-more i {
            font-size: 0.7rem;
            transition: transform 0.3s ease;
        }

        .service-card:hover .service-more i {
            transform: translateX(3px);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            overflow-y: auto;
            padding: 15px;
        }

        .modal-content {
            background: white;
            margin: 60px auto;
            max-width: 900px;
            width: 95%;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease-out;
            position: relative;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            padding: 30px 20px;
            text-align: center;
            color: white;
            position: relative;
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #eeb82e;
            color: #2c2b29;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            font-size: 1.2rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 1001;
            border: 2px solid white;
        }

        .modal-close:hover {
            background: white;
            transform: rotate(90deg);
        }

        .modal-icon {
            font-size: 3rem;
            color: #eeb82e;
            margin-bottom: 15px;
        }

        .modal-header h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.8rem;
            margin-bottom: 10px;
            font-weight: 600;
            line-height: 1.3;
            padding: 0 10px;
        }

        .modal-tag {
            display: inline-block;
            background: #eeb82e;
            color: #2c2b29;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 8px;
        }

        .modal-body {
            padding: 30px 20px;
        }

        .modal-description {
            color: #555;
            line-height: 1.7;
            font-size: 1rem;
            margin-bottom: 25px;
            text-align: center;
            padding: 0 10px;
        }

        .modal-features {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 2px solid #eee;
        }

        .modal-features h4 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.2rem;
            color: #2c2b29;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-align: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .modal-features h4 i {
            color: #eeb82e;
        }

        .modal-features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .feature-column {
            background: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            border: 1px solid #eee;
            transition: transform 0.3s ease;
        }

        .feature-column:hover {
            transform: translateY(-3px);
        }

        .feature-column h5 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.1rem;
            color: #2c2b29;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .feature-column h5 i {
            color: #eeb82e;
        }

        .feature-column ul {
            list-style: none;
            padding: 0;
        }

        .feature-column li {
            color: #666;
            margin-bottom: 8px;
            padding-left: 22px;
            position: relative;
            line-height: 1.5;
            font-size: 0.9rem;
        }

        .feature-column li:before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #eeb82e;
            font-weight: bold;
        }

        .modal-cta {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 2px solid #eee;
            text-align: center;
        }

        .modal-cta h4 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.3rem;
            color: #2c2b29;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .modal-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .modal-btn {
            background: #2c2b29;
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            min-width: 180px;
            flex: 1;
            max-width: 280px;
        }

        .modal-btn:hover {
            background: #eeb82e;
            color: #2c2b29;
            transform: scale(1.03);
        }

        .modal-btn.secondary {
            background: transparent;
            color: #2c2b29;
            border: 2px solid #2c2b29;
        }

        .modal-btn.secondary:hover {
            background: #2c2b29;
            color: white;
        }

        /* Other sections remain the same as before */
        /* Process Section */
        .process-section {
            padding: 60px 15px;
            background: linear-gradient(135deg, #f8f8f8 0%, #ffffff 100%);
            text-align: center;
            border-radius: 15px;
            margin: 40px 0;
        }

        .process-title {
            font-family: 'Roboto Serif', serif;
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 1.2;
        }

        .process-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
            padding: 15px;
        }

        .process-step {
            text-align: center;
            position: relative;
        }

        .process-step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 40px;
            right: -25px;
            width: 25px;
            height: 2px;
            background: #eeb82e;
        }

        .step-number {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            color: #eeb82e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0 auto 15px;
            border: 3px solid #eeb82e;
        }

        .step-content h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.2rem;
            color: #2c2b29;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .step-content p {
            color: #666;
            line-height: 1.5;
            font-size: 0.9rem;
        }

        /* FAQ Section */
        .faq-section {
            padding: 60px 15px;
            background-color: white;
            text-align: center;
        }

        .faq-title {
            font-family: 'Roboto Serif', serif;
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 1.2;
        }

        .faq-layout {
            display: flex;
            flex-direction: column;
            gap: 40px;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .faq-container {
            width: 100%;
        }

        .faq-image {
            width: 100%;
            max-width: 400px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            order: -1;
        }

        .faq-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .faq-item {
            background: white;
            border-radius: 10px;
            margin-bottom: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            border: 1px solid #eee;
        }

        .faq-question {
            padding: 18px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            background: white;
            transition: all 0.3s ease;
            -webkit-tap-highlight-color: transparent;
        }

        .faq-question:active {
            background: #f9f9f9;
        }

        .faq-question h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.1rem;
            color: #2c2b29;
            text-align: left;
            margin: 0;
            line-height: 1.4;
            flex: 1;
        }

        .faq-icon {
            color: #eeb82e;
            font-size: 1.1rem;
            transition: transform 0.3s ease;
            min-width: 20px;
            margin-left: 10px;
        }

        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            background: white;
        }

        .faq-item.active .faq-answer {
            padding: 18px 20px;
            max-height: 500px;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq-answer p {
            color: #666;
            line-height: 1.6;
            text-align: left;
            margin: 0;
            font-size: 0.95rem;
        }

        /* CTA Section */
        .cta-section {
            padding: 60px 15px;
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            text-align: center;
            color: white;
            border-radius: 15px;
            margin: 40px 0;
        }

        .cta-title {
            font-family: 'Roboto Serif', serif;
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: 700;
            line-height: 1.3;
        }

        .cta-description {
            max-width: 600px;
            margin: 0 auto 25px;
            font-size: 1rem;
            line-height: 1.6;
            color: #f0f0f0;
            padding: 0 10px;
        }

        .cta-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
            justify-content: center;
            align-items: center;
            max-width: 400px;
            margin: 0 auto;
        }

        .cta-btn {
            background: #eeb82e;
            color: #2c2b29;
            border: none;
            padding: 14px 30px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            width: 100%;
            max-width: 300px;
            -webkit-tap-highlight-color: transparent;
        }

        .cta-btn:active {
            transform: scale(0.98);
        }

        .cta-btn:hover {
            background: white;
            transform: scale(1.02);
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

        /* Benefits Section */
        .benefits-section {
            padding: 60px 15px;
            background: linear-gradient(135deg, #f8f8f8 0%, #ffffff 100%);
            text-align: center;
            border-radius: 15px;
            margin: 40px 0;
        }

        .benefits-title {
            font-family: 'Roboto Serif', serif;
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 1.2;
        }

        .benefits-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            padding: 15px;
        }

        .benefit-card {
            background: white;
            border-radius: 10px;
            padding: 25px 20px;
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
            width: 60px;
            height: 60px;
            background: #2c2b29;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: #eeb82e;
            font-size: 1.5rem;
        }

        .benefit-card h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.2rem;
            color: #2c2b29;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .benefit-card p {
            color: #666;
            line-height: 1.5;
            font-size: 0.9rem;
        }

        /* Bank Partners Section */
        .bank-partners-section {
            padding: 60px 15px;
            background-color: white;
            text-align: center;
        }

        .bank-partners-title {
            font-family: 'Roboto Serif', serif;
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: #2c2b29;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 1.2;
        }

        .bank-partners-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 20px;
            padding: 15px;
        }

        .bank-logo {
            background: white;
            border-radius: 8px;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
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
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 10px 25px rgba(238, 184, 46, 0.2);
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
            max-height: 50px;
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

        /* Requirements Section */
        .requirements-section {
            padding: 60px 15px;
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            text-align: center;
            color: white;
            border-radius: 15px;
            margin: 40px 0;
        }

        .requirements-title {
            font-family: 'Roboto Serif', serif;
            font-size: 2rem;
            margin-bottom: 30px;
            font-weight: 700;
            line-height: 1.3;
        }

        .requirements-container {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            padding: 15px;
        }

        .requirement-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            text-align: left;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(238, 184, 46, 0.2);
            transition: all 0.3s ease;
        }

        .requirement-card:hover {
            transform: translateY(-3px);
            border-color: rgba(238, 184, 46, 0.4);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .requirement-card h3 {
            font-family: 'Roboto Serif', serif;
            font-size: 1.2rem;
            color: #eeb82e;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .requirement-card h3 i {
            font-size: 1.1rem;
        }

        .requirement-list {
            list-style: none;
            padding: 0;
        }

        .requirement-list li {
            color: #f0f0f0;
            margin-bottom: 6px;
            padding-left: 22px;
            position: relative;
            line-height: 1.5;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .requirement-list li:active {
            color: #eeb82e;
            transform: translateX(3px);
        }

        .requirement-list li:hover {
            color: #eeb82e;
            transform: translateX(3px);
        }

        .requirement-list li:before {
            content: '•';
            position: absolute;
            left: 10px;
            color: #eeb82e;
            font-size: 1.1rem;
            transition: transform 0.3s ease;
        }

        .requirement-list li:hover:before {
            transform: scale(1.3);
        }

        /* Enhanced Mobile Responsiveness */
        @media (max-width: 768px) {
            .main-content {
                padding: 80px 15px 15px;
            }

            .services-hero-title {
                font-size: 2.2rem;
                margin-bottom: 12px;
            }

            .services-hero-subtitle {
                font-size: 1.8rem;
                margin-bottom: 20px;
            }

            .services-hero-description {
                font-size: 1rem;
            }

            .services-title,
            .process-title,
            .faq-title,
            .benefits-title,
            .bank-partners-title,
            .requirements-title,
            .cta-title {
                font-size: 2rem;
                margin-bottom: 30px;
            }

            .services-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                padding: 10px;
            }

            .service-card {
                margin: 0;
                min-height: 200px;
            }

            .service-card::after {
                font-size: 0.85rem;
                padding: 10px;
            }

            .service-header {
                padding: 15px 10px;
                min-height: 100px;
            }

            .service-header h3 {
                font-size: 1rem;
            }

            .service-icon {
                font-size: 1.8rem;
            }

            .service-body {
                padding: 12px 10px;
            }

            .service-body p {
                font-size: 0.8rem;
                -webkit-line-clamp: 2;
            }

            .service-tag {
                font-size: 0.7rem;
                padding: 2px 8px;
            }

            .service-more {
                font-size: 0.75rem;
                margin-top: 5px;
            }

            .process-step:not(:last-child)::after {
                display: none;
            }

            .process-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .step-number {
                width: 70px;
                height: 70px;
                font-size: 1.6rem;
            }

            .step-content h3 {
                font-size: 1.1rem;
            }

            .step-content p {
                font-size: 0.85rem;
            }

            .benefits-container,
            .requirements-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .benefit-card {
                padding: 20px 15px;
            }

            .bank-partners-container {
                grid-template-columns: repeat(3, 1fr);
                gap: 15px;
            }

            .bank-logo {
                height: 80px;
                padding: 10px;
            }

            .bank-logo img {
                max-height: 45px;
            }

            .modal-content {
                margin: 40px auto;
                width: 95%;
                max-height: 85vh;
                overflow-y: auto;
            }

            .modal-header {
                padding: 25px 15px;
            }

            .modal-header h3 {
                font-size: 1.5rem;
            }

            .modal-icon {
                font-size: 2.5rem;
            }

            .modal-body {
                padding: 25px 15px;
            }

            .modal-features-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .modal-features h4 {
                font-size: 1.1rem;
            }

            .feature-column {
                padding: 15px;
            }

            .modal-buttons {
                flex-direction: column;
                gap: 12px;
            }

            .modal-btn {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                padding: 12px 20px;
            }

            .modal-cta h4 {
                font-size: 1.2rem;
            }

            .faq-layout {
                gap: 30px;
            }

            .faq-question {
                padding: 15px;
            }

            .faq-question h3 {
                font-size: 1rem;
            }

            .faq-item.active .faq-answer {
                padding: 15px;
            }

            .cta-buttons {
                gap: 12px;
            }

            .cta-btn {
                padding: 12px 20px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 70px 10px 10px;
            }

            .services-hero-title {
                font-size: 1.8rem;
            }

            .services-hero-subtitle {
                font-size: 1.5rem;
            }

            .services-hero-description {
                font-size: 0.9rem;
            }

            .services-title,
            .process-title,
            .faq-title,
            .benefits-title,
            .bank-partners-title,
            .requirements-title,
            .cta-title {
                font-size: 1.7rem;
                margin-bottom: 25px;
            }

            .services-container {
                grid-template-columns: 1fr;
                gap: 12px;
                padding: 5px;
            }

            .service-card {
                min-height: 180px;
            }

            .service-header h3 {
                font-size: 0.95rem;
            }

            .service-icon {
                font-size: 1.6rem;
            }

            .service-body p {
                font-size: 0.75rem;
                -webkit-line-clamp: 2;
            }

            .process-step {
                padding: 0 10px;
            }

            .step-number {
                width: 60px;
                height: 60px;
                font-size: 1.4rem;
                border-width: 2px;
            }

            .step-content h3 {
                font-size: 1rem;
            }

            .bank-partners-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .bank-logo {
                height: 70px;
                padding: 8px;
            }

            .bank-logo img {
                max-height: 40px;
            }

            .modal-content {
                margin: 20px auto;
                width: 98%;
                max-height: 90vh;
            }

            .modal-header h3 {
                font-size: 1.3rem;
            }

            .modal-icon {
                font-size: 2.2rem;
            }

            .modal-description {
                font-size: 0.9rem;
            }

            .modal-features h4 {
                font-size: 1rem;
            }

            .feature-column h5 {
                font-size: 1rem;
            }

            .feature-column li {
                font-size: 0.85rem;
            }

            .modal-cta h4 {
                font-size: 1.1rem;
            }

            .modal-btn {
                padding: 10px 15px;
                font-size: 0.85rem;
            }

            .faq-question h3 {
                font-size: 0.95rem;
            }

            .faq-answer p {
                font-size: 0.9rem;
            }

            .benefit-card h3 {
                font-size: 1.1rem;
            }

            .benefit-card p {
                font-size: 0.85rem;
            }

            .requirement-card h3 {
                font-size: 1.1rem;
            }

            .requirement-list li {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 360px) {
            .services-hero-title {
                font-size: 1.6rem;
            }

            .services-hero-subtitle {
                font-size: 1.3rem;
            }

            .services-title,
            .process-title,
            .faq-title,
            .benefits-title,
            .bank-partners-title,
            .requirements-title,
            .cta-title {
                font-size: 1.5rem;
            }

            .service-header h3 {
                font-size: 0.9rem;
            }

            .service-icon {
                font-size: 1.5rem;
            }

            .bank-partners-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 8px;
            }

            .bank-logo {
                height: 65px;
                padding: 6px;
            }

            .bank-logo img {
                max-height: 35px;
            }

            .modal-header h3 {
                font-size: 1.2rem;
            }

            .modal-tag {
                font-size: 0.8rem;
                padding: 5px 12px;
            }

            .faq-question h3 {
                font-size: 0.9rem;
            }
        }

        /* Landscape orientation optimizations */
        @media (max-height: 600px) and (orientation: landscape) {
            .services-container {
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }

            .service-card {
                min-height: 160px;
            }

            .service-header {
                min-height: 80px;
                padding: 10px;
            }

            .service-icon {
                font-size: 1.5rem;
                margin-bottom: 5px;
            }

            .service-header h3 {
                font-size: 0.9rem;
            }

            .service-body p {
                font-size: 0.75rem;
                -webkit-line-clamp: 2;
            }

            .modal-content {
                margin: 10px auto;
                max-height: 90vh;
            }

            .modal-body {
                padding: 15px;
            }

            .modal-features-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .feature-column {
                padding: 10px;
            }
        }

        /* Touch device optimizations */
        @media (hover: none) and (pointer: coarse) {
            .service-card:hover::after {
                opacity: 0; /* Disable hover effects on touch devices */
            }

            .service-card:active::after {
                opacity: 1;
                background: rgba(44, 43, 41, 0.95);
            }

            .service-btn:active,
            .modal-btn:active,
            .cta-btn:active {
                transform: scale(0.98);
            }

            .bank-logo:active {
                transform: translateY(-5px) scale(1.03);
            }

            .benefit-card:active {
                transform: translateY(-3px);
            }

            .requirement-card:active {
                transform: translateY(-3px);
            }

            .faq-question:active {
                background: #f9f9f9;
            }

            /* Larger touch targets */
            .faq-question,
            .service-btn,
            .modal-btn,
            .cta-btn,
            .modal-close {
                min-height: 44px; /* Minimum touch target size */
            }

            .bank-logo {
                min-height: 80px;
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
                <div class="service-card" data-service="auto-acquisition">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <h3>Auto Acquisition & Loan Assistance</h3>
                        <span class="service-tag">Vehicles</span>
                    </div>
                    <div class="service-body">
                        <p>Comprehensive assistance in acquiring new vehicles with flexible financing options...</p>
                        <div class="service-more">
                            View Details <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Service 2: Housing Acquisition -->
                <div class="service-card" data-service="housing">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3>House & Lot Acquisition & Loan Assistance</h3>
                        <span class="service-tag">Real Estate</span>
                    </div>
                    <div class="service-body">
                        <p>Complete support for your dream home acquisition. From property selection...</p>
                        <div class="service-more">
                            View Details <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Service 3: Car Insurance -->
                <div class="service-card" data-service="car-insurance">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Car Insurance</h3>
                        <span class="service-tag">Insurance</span>
                    </div>
                    <div class="service-body">
                        <p>Comprehensive car insurance solutions from top providers. We offer various coverage...</p>
                        <div class="service-more">
                            View Details <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Service 4: Housing Insurance -->
                <div class="service-card" data-service="housing-insurance">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3>Housing Insurance</h3>
                        <span class="service-tag">Insurance</span>
                    </div>
                    <div class="service-body">
                        <p>Protect your home investment with comprehensive housing insurance...</p>
                        <div class="service-more">
                            View Details <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Service 5: Life Insurance -->
                <div class="service-card" data-service="life-insurance">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>Life Insurance</h3>
                        <span class="service-tag">Insurance</span>
                    </div>
                    <div class="service-body">
                        <p>Secure your family's future with our life insurance solutions...</p>
                        <div class="service-more">
                            View Details <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Service 6: Second Hand Car Loans -->
                <div class="service-card" data-service="second-hand">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-car-side"></i>
                        </div>
                        <h3>Second Hand Car Loan Assistance</h3>
                        <span class="service-tag">Used Vehicles</span>
                    </div>
                    <div class="service-body">
                        <p>Specialized assistance for pre-owned vehicle financing...</p>
                        <div class="service-more">
                            View Details <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Service 7: Sangla Title & OR/CR -->
                <div class="service-card" data-service="sangla">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <h3>Sangla Title & OR/CR</h3>
                        <span class="service-tag">Documentation</span>
                    </div>
                    <div class="service-body">
                        <p>Assistance with title and registration document collateralization...</p>
                        <div class="service-more">
                            View Details <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Service 8: Trade In -->
                <div class="service-card" data-service="trade-in">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <h3>Trade In</h3>
                        <span class="service-tag">Vehicle Exchange</span>
                    </div>
                    <div class="service-body">
                        <p>Upgrade your vehicle through our trade-in program...</p>
                        <div class="service-more">
                            View Details <i class="fas fa-arrow-right"></i>
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

        <!-- AFFILIATED BANKS -->
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

        <!-- AFFILIATED CAR COMPANIES -->
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

            <div class="faq-layout">
                <div class="faq-image">
                    <img src="img/faq.png" alt="FAQ Illustration">
                </div>
                
                <div class="faq-container">
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h3>How long does the loan approval process take?</h3>
                            <div class="faq-icon">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="faq-answer">
                            <p>The loan approval process typically takes 3-5 working days for complete documentation.</p>
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
                            <p>Valid IDs, proof of income, proof of billing, and bank statements.</p>
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
                            <p>Yes, standalone insurance policies are available.</p>
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
                            <p>Yes, we support commercial and fleet vehicles.</p>
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
                            <p>We compare banks, manage documents, and secure better deals.</p>
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
                            <p>We help explore flexible financing options.</p>
                        </div>
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

    <!-- Service Modals (The same modals as before, but now appear when clicking small containers) -->
    <!-- Auto Acquisition Modal -->
    <div id="auto-acquisition-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-close" onclick="closeModal()">&times;</button>
                <div class="modal-icon">
                    <i class="fas fa-car"></i>
                </div>
                <h3>Auto Acquisition & Loan Assistance</h3>
                <span class="modal-tag">Vehicles</span>
            </div>
            <div class="modal-body">
                <p class="modal-description">
                    Comprehensive assistance in acquiring new vehicles with flexible financing options. We help you navigate through loan applications, documentation, and approval processes with our extensive network of banking partners. Our experts ensure you get the best deal with competitive rates and terms.
                </p>
                
                <div class="modal-features">
                    <h4><i class="fas fa-check-circle"></i> What We Offer</h4>
                    <div class="modal-features-grid">
                        <div class="feature-column">
                            <h5><i class="fas fa-car"></i> Acquisition Support</h5>
                            <ul>
                                <li>New car acquisition assistance</li>
                                <li>Vehicle selection guidance</li>
                                <li>Dealer negotiation support</li>
                                <li>Special dealer discounts</li>
                                <li>Trade-in valuation</li>
                            </ul>
                        </div>
                        <div class="feature-column">
                            <h5><i class="fas fa-file-invoice-dollar"></i> Loan Processing</h5>
                            <ul>
                                <li>Loan application processing</li>
                                <li>Bank financing coordination</li>
                                <li>Multiple bank options comparison</li>
                                <li>Interest rate negotiation</li>
                                <li>Documentation assistance</li>
                            </ul>
                        </div>
                        <div class="feature-column">
                            <h5><i class="fas fa-shield-alt"></i> Additional Services</h5>
                            <ul>
                                <li>Insurance package bundling</li>
                                <li>Registration assistance</li>
                                <li>Free consultation and assessment</li>
                                <li>Post-approval support</li>
                                <li>Renewal reminders</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="modal-cta">
                    <h4>Ready to Get Your Dream Car?</h4>
                    <div class="modal-buttons">
                        <button class="modal-btn" onclick="scrollToContact()">
                            <i class="fas fa-phone-alt"></i> Call for Consultation
                        </button>
                        <button class="modal-btn secondary" onclick="window.location.href='contact.php'">
                            <i class="fas fa-envelope"></i> Send Inquiry
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Housing Acquisition Modal -->
    <div id="housing-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-close" onclick="closeModal()">&times;</button>
                <div class="modal-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h3>House & Lot Acquisition & Loan Assistance</h3>
                <span class="modal-tag">Real Estate</span>
            </div>
            <div class="modal-body">
                <p class="modal-description">
                    Complete support for your dream home acquisition. From property selection to mortgage processing, we ensure a smooth transaction with our extensive network of real estate developers and financial institutions. Let us help you build your future home.
                </p>
                
                <div class="modal-features">
                    <h4><i class="fas fa-check-circle"></i> What We Offer</h4>
                    <div class="modal-features-grid">
                        <div class="feature-column">
                            <h5><i class="fas fa-search"></i> Property Selection</h5>
                            <ul>
                                <li>Property selection assistance</li>
                                <li>Location assessment</li>
                                <li>Developer coordination</li>
                                <li>Site inspection arrangement</li>
                                <li>Property appraisal coordination</li>
                            </ul>
                        </div>
                        <div class="feature-column">
                            <h5><i class="fas fa-file-contract"></i> Loan Processing</h5>
                            <ul>
                                <li>Mortgage loan processing</li>
                                <li>Document preparation</li>
                                <li>Bank coordination</li>
                                <li>Home loan pre-approval</li>
                                <li>Interest rate comparison</li>
                            </ul>
                        </div>
                        <div class="feature-column">
                            <h5><i class="fas fa-handshake"></i> Legal & Documentation</h5>
                            <ul>
                                <li>Transfer of title assistance</li>
                                <li>Legal documentation support</li>
                                <li>Tax declaration processing</li>
                                <li>Property registration</li>
                                <li>Contract review</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="modal-cta">
                    <h4>Start Your Home Journey Today</h4>
                    <div class="modal-buttons">
                        <button class="modal-btn" onclick="scrollToContact()">
                            <i class="fas fa-phone-alt"></i> Schedule Consultation
                        </button>
                        <button class="modal-btn secondary" onclick="window.location.href='contact.php'">
                            <i class="fas fa-file-alt"></i> Get Requirements List
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Car Insurance Modal -->
    <div id="car-insurance-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-close" onclick="closeModal()">&times;</button>
                <div class="modal-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Car Insurance</h3>
                <span class="modal-tag">Insurance</span>
            </div>
            <div class="modal-body">
                <p class="modal-description">
                    Comprehensive car insurance solutions from top providers. We offer various coverage options including comprehensive, third-party liability, and personal accident benefits tailored to your needs and budget. Protect your vehicle investment with our expert guidance.
                </p>
                
                <div class="modal-features">
                    <h4><i class="fas fa-check-circle"></i> Coverage Options</h4>
                    <div class="modal-features-grid">
                        <div class="feature-column">
                            <h5><i class="fas fa-car-crash"></i> Comprehensive Coverage</h5>
                            <ul>
                                <li>Accident damage protection</li>
                                <li>Theft and fire protection</li>
                                <li>Acts of nature coverage</li>
                                <li>Vandalism protection</li>
                                <li>Total loss coverage</li>
                            </ul>
                        </div>
                        <div class="feature-column">
                            <h5><i class="fas fa-user-shield"></i> Liability Protection</h5>
                            <ul>
                                <li>Third-party liability</li>
                                <li>Bodily injury coverage</li>
                                <li>Property damage coverage</li>
                                <li>Legal defense coverage</li>
                                <li>Medical expenses coverage</li>
                            </ul>
                        </div>
                        <div class="feature-column">
                            <h5><i class="fas fa-plus-circle"></i> Additional Benefits</h5>
                            <ul>
                                <li>24/7 Roadside assistance</li>
                                <li>Personal accident benefits</li>
                                <li>Excess waiver options</li>
                                <li>Rental car coverage</li>
                                <li>Emergency towing</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="modal-cta">
                    <h4>Get Protected Now</h4>
                    <div class="modal-buttons">
                        <button class="modal-btn" onclick="scrollToContact()">
                            <i class="fas fa-file-signature"></i> Get Free Quote
                        </button>
                        <button class="modal-btn secondary" onclick="window.location.href='contact.php'">
                            <i class="fas fa-question-circle"></i> Ask About Coverage
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Note: Other modals (Housing Insurance, Life Insurance, Second Hand Car Loans, Sangla Title & OR/CR, and Trade In) remain the same -->
    <!-- They have the same structure but with their specific content -->

    <script>
        // Enhanced mobile touch functionality
        let touchStartY = 0;
        let touchEndY = 0;

        // Modal functionality with touch support
        function openModal(serviceId) {
            const modal = document.getElementById(serviceId + '-modal');
            if (modal) {
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
                document.body.style.position = 'fixed';
                document.body.style.width = '100%';
                
                // Close any open FAQ items
                document.querySelectorAll('.faq-item.active').forEach(item => {
                    item.classList.remove('active');
                });
            }
        }

        function closeModal() {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                modal.style.display = 'none';
            });
            document.body.style.overflow = 'auto';
            document.body.style.position = 'static';
        }

        // Close modal when clicking outside content
        window.onclick = function(event) {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (event.target === modal) {
                    closeModal();
                }
            });
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });

        // Add touch and click events to service cards
        document.querySelectorAll('.service-card').forEach(card => {
            // Touch events for mobile
            card.addEventListener('touchstart', function(e) {
                touchStartY = e.touches[0].clientY;
                this.style.transform = 'translateY(-3px)';
            }, { passive: true });

            card.addEventListener('touchend', function(e) {
                touchEndY = e.changedTouches[0].clientY;
                const serviceId = this.getAttribute('data-service');
                
                // Only open modal if it's a tap (not a swipe)
                if (Math.abs(touchEndY - touchStartY) < 10) {
                    e.preventDefault();
                    openModal(serviceId);
                }
                
                this.style.transform = 'translateY(0)';
            }, { passive: false });

            // Click for desktop
            card.addEventListener('click', function(e) {
                // Only trigger on non-touch devices
                if (!('ontouchstart' in window)) {
                    const serviceId = this.getAttribute('data-service');
                    openModal(serviceId);
                }
            });
        });

        // Touch-friendly FAQ toggle
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('touchstart', function(e) {
                this.style.backgroundColor = '#f9f9f9';
            }, { passive: true });

            question.addEventListener('touchend', function(e) {
                this.style.backgroundColor = 'white';
                toggleFAQ(this);
            }, { passive: true });

            question.addEventListener('click', function(e) {
                // Only trigger on non-touch devices
                if (!('ontouchstart' in window)) {
                    toggleFAQ(this);
                }
            });
        });

        // FAQ toggle functionality
        function toggleFAQ(element) {
            const faqItem = element.closest('.faq-item');
            const allFaqItems = document.querySelectorAll('.faq-item');
            
            // Close all other FAQ items
            allFaqItems.forEach(item => {
                if (item !== faqItem) {
                    item.classList.remove('active');
                }
            });
            
            // Toggle current FAQ item
            faqItem.classList.toggle('active');
        }

        // Scroll to contact function
        function scrollToContact() {
            closeModal(); // Close any open modal first
            
            // Smooth scroll to contact page
            window.location.href = 'contact.php';
            
            // Add loading state to buttons
            const buttons = document.querySelectorAll('.cta-btn, .modal-btn');
            buttons.forEach(button => {
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
                button.disabled = true;
                
                // Reset after 2 seconds if still on page
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.disabled = false;
                }, 2000);
            });
        }

        // Service card hover effect (desktop only)
        if (!('ontouchstart' in window)) {
            document.querySelectorAll('.service-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add click event to close FAQ when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.faq-item')) {
                document.querySelectorAll('.faq-item').forEach(item => {
                    item.classList.remove('active');
                });
            }
        });

        // Prevent modal scrolling background on mobile
        document.addEventListener('touchmove', function(e) {
            if (document.querySelector('.modal[style*="display: block"]')) {
                e.preventDefault();
            }
        }, { passive: false });

        // Handle orientation change
        window.addEventListener('orientationchange', function() {
            // Close modals on orientation change for better UX
            closeModal();
            
            // Reset body styles
            document.body.style.overflow = 'auto';
            document.body.style.position = 'static';
            
            // Small delay to ensure proper rendering
            setTimeout(() => {
                window.scrollTo(0, 0);
            }, 100);
        });

        // Optimize for mobile performance
        if ('ontouchstart' in window) {
            // Disable hover effects on touch devices
            const style = document.createElement('style');
            style.textContent = `
                @media (hover: none) and (pointer: coarse) {
                    .service-card:hover {
                        transform: none !important;
                    }
                    .bank-logo:hover {
                        transform: none !important;
                    }
                    .benefit-card:hover {
                        transform: none !important;
                    }
                    .requirement-card:hover {
                        transform: none !important;
                    }
                }
            `;
            document.head.appendChild(style);
        }
    </script>
</body>
</html>     