<?php
// team.php - DYNAMIC VERSION
session_start();
require_once 'config.php';
?>

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
            width: 320px;
            height: 320px;
            border-radius: 0;
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

        .ceo-details {
            flex: 1;
            color: white;
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
            cursor: pointer;
        }

        .ceo-contact-icon:hover {
            background: #eeb82e;
            color: #2c2b29;
            transform: translateY(-3px);
        }

        .ceo-contact-icon.link {
            cursor: pointer;
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
            width: 280px; /* Increased from 250px */
            text-align: center;
            background: white;
            border-radius: 15px;
            padding: 25px; /* Increased from 20px */
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .team-member-smaller:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(238, 184, 46, 0.15);
        }

        .team-member-img-smaller {
            width: 200px; /* Increased from 180px */
            height: 200px; /* Increased from 180px */
            border-radius: 0; /* Changed to box shape */
            overflow: hidden;
            margin: 0 auto 20px; /* Increased from 15px */
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
            font-size: 1.4rem; /* Increased from 1.2rem */
            color: #2c2b29;
            margin-bottom: 8px; /* Increased from 5px */
        }

        .team-member-smaller .position {
            color: #eeb82e;
            font-weight: 600;
            font-size: 1rem; /* Increased from 0.9rem */
            margin-bottom: 15px; /* Increased from 10px */
            display: block;
        }

        .team-member-smaller .experience {
            color: #666;
            font-size: 0.9rem; /* Increased from 0.8rem */
            margin-bottom: 15px; /* Increased from 10px */
            display: block;
        }

        .team-member-smaller .bio {
            color: #555;
            font-size: 0.95rem; /* Increased from 0.85rem */
            line-height: 1.6; /* Increased from 1.5 */
            margin-bottom: 20px; /* Increased from 15px */
            height: auto; /* Changed from fixed height */
            overflow: visible;
            flex-grow: 1;
        }

        .team-member-contact-smaller {
            display: flex;
            justify-content: center;
            gap: 15px; /* Increased from 10px */
            margin-top: 20px; /* Increased from 15px */
        }

        .contact-icon-smaller {
            width: 40px; /* Increased from 35px */
            height: 40px; /* Increased from 35px */
            background: #f8f8f8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c2b29;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1rem; /* Increased from 0.9rem */
            cursor: pointer;
        }

        .contact-icon-smaller:hover {
            background: #eeb82e;
            color: white;
            transform: scale(1.1);
        }

        /* Original team member style for other sections */
        .team-member {
            width: 300px; /* Increased from 280px */
            text-align: center;
            background: white;
            border-radius: 15px;
            padding: 30px; /* Increased from 25px */
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(238, 184, 46, 0.15);
        }

        .team-member-img {
            width: 220px; /* Increased from 200px */
            height: 220px; /* Increased from 200px */
            border-radius: 0;
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
            font-size: 1.5rem; /* Increased from 1.4rem */
            color: #2c2b29;
            margin-bottom: 10px; /* Increased from 8px */
        }

        .team-member .position {
            color: #eeb82e;
            font-weight: 600;
            font-size: 1.1rem; /* Increased from 1rem */
            margin-bottom: 15px;
            display: block;
        }

        .team-member .experience {
            color: #666;
            font-size: 1rem; /* Increased from 0.9rem */
            margin-bottom: 15px;
            display: block;
        }

        .team-member .bio {
            color: #555;
            font-size: 1rem; /* Increased from 0.95rem */
            line-height: 1.7; /* Increased from 1.6 */
            margin-bottom: 20px;
            height: auto;
            overflow: visible;
            flex-grow: 1;
        }

        .team-member-contact {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .contact-icon {
            width: 45px; /* Increased from 40px */
            height: 45px; /* Increased from 40px */
            background: #f8f8f8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c2b29;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .contact-icon:hover {
            background: #eeb82e;
            color: white;
            transform: scale(1.1);
        }

        /* Read More/Less button */
        .read-more-btn {
            background: none;
            border: none;
            color: #eeb82e;
            font-weight: 600;
            cursor: pointer;
            padding: 5px 0;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .read-more-btn:hover {
            color: #2c2b29;
            text-decoration: underline;
        }

        /* Mobile Responsive Styles for TEAM CONTENT ONLY */
        @media screen and (max-width: 768px) {
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
                max-width: 350px; /* Increased from 320px */
            }

            /* Mobile adjustments for smaller team member cards */
            .team-member-smaller {
                padding: 20px;
            }

            .team-member-img-smaller {
                width: 180px;
                height: 180px;
            }

            .team-member-smaller h3 {
                font-size: 1.3rem;
            }

            .team-member-smaller .bio {
                margin-bottom: 15px;
            }
        }

        @media screen and (max-width: 480px) {
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
                width: 160px;
                height: 160px;
            }
        }

        /* Dropdown Styles - REMOVE THESE AS THEY'RE IN NAVBAR.PHP */
        /* 
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
        */

        /* Tooltip styles for all contact icons */
        .contact-icon,
        .contact-icon-smaller,
        .ceo-contact-icon {
            position: relative;
        }

        .contact-icon.tooltip::before,
        .contact-icon-smaller.tooltip::before,
        .ceo-contact-icon.tooltip::before {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            margin-bottom: 8px;
            background-color: #333;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            z-index: 100;
        }

        .contact-icon.tooltip::after,
        .contact-icon-smaller.tooltip::after,
        .ceo-contact-icon.tooltip::after {
            content: '';
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            margin-bottom: 2px;
            border-width: 5px;
            border-style: solid;
            border-color: #333 transparent transparent transparent;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            z-index: 100;
        }

        .contact-icon.tooltip:hover::before,
        .contact-icon.tooltip:hover::after,
        .contact-icon-smaller.tooltip:hover::before,
        .contact-icon-smaller.tooltip:hover::after,
        .ceo-contact-icon.tooltip:hover::before,
        .ceo-contact-icon.tooltip:hover::after {
            opacity: 1;
            visibility: visible;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 30px;
            border: 1px solid #888;
            width: 90%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            text-align: center;
        }

        .modal-content h3 {
            font-family: 'Roboto Serif', serif;
            color: #2c2b29;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .modal-content p {
            margin: 10px 0;
            font-size: 1.1rem;
            color: #555;
        }

        .modal-content strong {
            color: #eeb82e;
        }

        .contact-info-container {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            text-align: left;
        }

        .contact-info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .contact-info-row:last-child {
            border-bottom: none;
        }

        .contact-info-label {
            font-weight: bold;
            color: #2c2b29;
            min-width: 80px;
        }

        .contact-info-value {
            flex: 1;
            color: #555;
            margin-left: 10px;
            word-break: break-all;
        }

        .copy-btn {
            background-color: #eeb82e;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
            margin-left: 10px;
        }

        .copy-btn:hover {
            background-color: #d4a324;
        }

        .copy-btn.copied {
            background-color: #4CAF50;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            margin-top: -20px;
            margin-right: -10px;
        }

        .close:hover,
        .close:focus {
            color: #eeb82e;
        }

        /* Remove mobile navbar adjustments as they're handled by navbar.php */
        /*
        @media screen and (max-width: 768px) {
            .modal-content {
                margin: 30% auto;
                padding: 20px;
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
            
            .contact-info-row {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .contact-info-value {
                margin-left: 0;
                margin-top: 5px;
                width: 100%;
            }
            
            .copy-btn {
                margin-left: 0;
                margin-top: 10px;
                width: 100%;
            }
        }
        */
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

        <?php
        // Fetch CEO/Founder
        $ceo_sql = "SELECT * FROM team_members WHERE category = 'ceo' AND is_active = 1 LIMIT 1";
        $ceo_result = mysqli_query($conn, $ceo_sql);
        $ceo = mysqli_fetch_assoc($ceo_result);
        
        if ($ceo): ?>
        <!-- CEO Section -->
        <div class="ceo-section" id="ceo">
            <div class="ceo-container">
                <div class="ceo-image-container">
                    <div class="ceo-image">
                        <img src="<?php echo $ceo['image_path']; ?>" alt="<?php echo htmlspecialchars($ceo['name']); ?>"
                             onerror="this.src='https://cdn-icons-png.flaticon.com/512/6522/6522516.png'">
                    </div>
                </div>
                
                <div class="ceo-details">
                    <h2 class="ceo-name"><?php echo htmlspecialchars($ceo['name']); ?></h2>
                    <div class="ceo-position"><?php echo htmlspecialchars($ceo['position']); ?></div>
                    <?php if (!empty($ceo['experience'])): ?>
                    <div class="ceo-experience"><?php echo htmlspecialchars($ceo['experience']); ?></div>
                    <?php endif; ?>
                    <?php if (!empty($ceo['description'])): ?>
                    <p class="ceo-message"><?php echo htmlspecialchars($ceo['description']); ?></p>
                    <?php endif; ?>
                    
                    <!-- CEO Contact Icons -->
                    <div class="ceo-contact">
                        <?php if (!empty($ceo['email'])): ?>
                            <div class="ceo-contact-icon tooltip" data-tooltip="Email"
                                 onclick="showContactModal('<?php echo htmlspecialchars($ceo['name']); ?>', '<?php echo htmlspecialchars($ceo['email']); ?>', '<?php echo htmlspecialchars($ceo['phone']); ?>', 'email')">
                                <i class="fas fa-envelope"></i>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($ceo['phone'])): ?>
                            <div class="ceo-contact-icon tooltip" data-tooltip="Call"
                                 onclick="showContactModal('<?php echo htmlspecialchars($ceo['name']); ?>', '<?php echo htmlspecialchars($ceo['email']); ?>', '<?php echo htmlspecialchars($ceo['phone']); ?>', 'phone')">
                                <i class="fas fa-phone"></i>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($ceo['facebook_link'])): ?>
                            <a href="<?php echo htmlspecialchars($ceo['facebook_link']); ?>" 
                               target="_blank" 
                               class="ceo-contact-icon tooltip" data-tooltip="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Leadership Team Section -->
        <div class="team-category" id="leadership">
            <h2 class="category-title">LEADERSHIP TEAM</h2>
            <p class="team-category-description">Our leadership team brings decades of experience in financial management, strategic planning, and business development.</p>
            
            <div class="team-container">
                <?php
                // Fetch Leadership Team
                $leadership_sql = "SELECT * FROM team_members WHERE category = 'leadership' AND is_active = 1 ORDER BY display_order ASC, name ASC";
                $leadership_result = mysqli_query($conn, $leadership_sql);
                
                if (mysqli_num_rows($leadership_result) > 0):
                    while ($leader = mysqli_fetch_assoc($leadership_result)):
                ?>
                <div class="team-member">
                    <div class="team-member-img">
                        <img src="<?php echo $leader['image_path']; ?>" alt="<?php echo htmlspecialchars($leader['name']); ?>"
                             onerror="this.src='https://cdn-icons-png.flaticon.com/512/6522/6522516.png'">
                    </div>
                    <h3><?php echo htmlspecialchars($leader['name']); ?></h3>
                    <span class="position"><?php echo htmlspecialchars($leader['position']); ?></span>
                    <?php if (!empty($leader['experience'])): ?>
                    <span class="experience"><?php echo htmlspecialchars($leader['experience']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($leader['description'])): ?>
                    <p class="bio"><?php echo htmlspecialchars($leader['description']); ?></p>
                    <?php endif; ?>
                    <div class="team-member-contact">
                        <?php if (!empty($leader['email'])): ?>
                            <div class="contact-icon tooltip" data-tooltip="Email"
                                 onclick="showContactModal('<?php echo htmlspecialchars($leader['name']); ?>', '<?php echo htmlspecialchars($leader['email']); ?>', '<?php echo htmlspecialchars($leader['phone']); ?>', 'email')">
                                <i class="fas fa-envelope"></i>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($leader['phone'])): ?>
                            <div class="contact-icon tooltip" data-tooltip="Call"
                                 onclick="showContactModal('<?php echo htmlspecialchars($leader['name']); ?>', '<?php echo htmlspecialchars($leader['email']); ?>', '<?php echo htmlspecialchars($leader['phone']); ?>', 'phone')">
                                <i class="fas fa-phone"></i>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($leader['facebook_link'])): ?>
                            <a href="<?php echo htmlspecialchars($leader['facebook_link']); ?>" 
                               target="_blank" 
                               class="contact-icon tooltip" data-tooltip="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php 
                    endwhile;
                else:
                    echo '<p style="grid-column: 1 / -1; text-align: center; color: #666;">No leadership team members found.</p>';
                endif;
                ?>
            </div>
        </div>

        <!-- Account Specialists Section -->
        <div class="team-category" id="specialists">
            <h2 class="category-title">ACCOUNT SPECIALISTS</h2>
            <p class="team-category-description">Our team of account specialists are experts in managing your financial accounts with precision and care.</p>
            
            <div class="team-container">
                <?php
                // Fetch Account Specialists
                $specialists_sql = "SELECT * FROM team_members WHERE category = 'specialists' AND is_active = 1 ORDER BY display_order ASC, name ASC";
                $specialists_result = mysqli_query($conn, $specialists_sql);
                
                if (mysqli_num_rows($specialists_result) > 0):
                    while ($specialist = mysqli_fetch_assoc($specialists_result)):
                ?>
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="<?php echo $specialist['image_path']; ?>" alt="<?php echo htmlspecialchars($specialist['name']); ?>"
                             onerror="this.src='https://cdn-icons-png.flaticon.com/512/6522/6522516.png'">
                    </div>
                    <h3><?php echo htmlspecialchars($specialist['name']); ?></h3>
                    <span class="position"><?php echo htmlspecialchars($specialist['position']); ?></span>
                    <?php if (!empty($specialist['experience'])): ?>
                    <span class="experience"><?php echo htmlspecialchars($specialist['experience']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($specialist['description'])): ?>
                    <p class="bio"><?php echo htmlspecialchars($specialist['description']); ?></p>
                    <?php endif; ?>
                    <div class="team-member-contact-smaller">
                        <?php if (!empty($specialist['email'])): ?>
                            <div class="contact-icon-smaller tooltip" data-tooltip="Email"
                                 onclick="showContactModal('<?php echo htmlspecialchars($specialist['name']); ?>', '<?php echo htmlspecialchars($specialist['email']); ?>', '<?php echo htmlspecialchars($specialist['phone']); ?>', 'email')">
                                <i class="fas fa-envelope"></i>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($specialist['phone'])): ?>
                            <div class="contact-icon-smaller tooltip" data-tooltip="Call"
                                 onclick="showContactModal('<?php echo htmlspecialchars($specialist['name']); ?>', '<?php echo htmlspecialchars($specialist['email']); ?>', '<?php echo htmlspecialchars($specialist['phone']); ?>', 'phone')">
                                <i class="fas fa-phone"></i>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($specialist['facebook_link'])): ?>
                            <a href="<?php echo htmlspecialchars($specialist['facebook_link']); ?>" 
                               target="_blank" 
                               class="contact-icon-smaller tooltip" data-tooltip="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php 
                    endwhile;
                else:
                    echo '<p style="grid-column: 1 / -1; text-align: center; color: #666;">No account specialists found.</p>';
                endif;
                ?>
            </div>
        </div>
        
        <!-- Support Staff Section (Optional) -->
        <?php
        $support_sql = "SELECT * FROM team_members WHERE category = 'support' AND is_active = 1 ORDER BY display_order ASC, name ASC";
        $support_result = mysqli_query($conn, $support_sql);
        
        if (mysqli_num_rows($support_result) > 0): ?>
        <div class="team-category" id="support">
            <h2 class="category-title">SUPPORT STAFF</h2>
            <p class="team-category-description">Our dedicated support team ensures smooth operations and excellent customer service.</p>
            
            <div class="team-container">
                <?php while ($support = mysqli_fetch_assoc($support_result)): ?>
                <div class="team-member-smaller">
                    <div class="team-member-img-smaller">
                        <img src="<?php echo $support['image_path']; ?>" alt="<?php echo htmlspecialchars($support['name']); ?>"
                             onerror="this.src='https://cdn-icons-png.flaticon.com/512/6522/6522516.png'">
                    </div>
                    <h3><?php echo htmlspecialchars($support['name']); ?></h3>
                    <span class="position"><?php echo htmlspecialchars($support['position']); ?></span>
                    <?php if (!empty($support['experience'])): ?>
                    <span class="experience"><?php echo htmlspecialchars($support['experience']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($support['description'])): ?>
                    <p class="bio"><?php echo htmlspecialchars($support['description']); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($support['email']) || !empty($support['phone']) || !empty($support['facebook_link'])): ?>
                    <div class="team-member-contact-smaller">
                        <?php if (!empty($support['email'])): ?>
                            <div class="contact-icon-smaller tooltip" data-tooltip="Email"
                                 onclick="showContactModal('<?php echo htmlspecialchars($support['name']); ?>', '<?php echo htmlspecialchars($support['email']); ?>', '<?php echo htmlspecialchars($support['phone']); ?>', 'email')">
                                <i class="fas fa-envelope"></i>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($support['phone'])): ?>
                            <div class="contact-icon-smaller tooltip" data-tooltip="Call"
                                 onclick="showContactModal('<?php echo htmlspecialchars($support['name']); ?>', '<?php echo htmlspecialchars($support['email']); ?>', '<?php echo htmlspecialchars($support['phone']); ?>', 'phone')">
                                <i class="fas fa-phone"></i>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($support['facebook_link'])): ?>
                            <a href="<?php echo htmlspecialchars($support['facebook_link']); ?>" 
                               target="_blank" 
                               class="contact-icon-smaller tooltip" data-tooltip="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Contact Modal -->
    <div id="contactModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeContactModal()">&times;</span>
            <h3>Contact Information</h3>
            <p>Contact details for <strong id="contactPersonName"></strong></p>
            
            <div class="contact-info-container">
                <div id="emailInfo" style="display: none;">
                    <div class="contact-info-row">
                        <span class="contact-info-label">Email:</span>
                        <span class="contact-info-value" id="emailValue"></span>
                        <button class="copy-btn" onclick="copyToClipboard('emailValue')">Copy</button>
                    </div>
                </div>
                
                <div id="phoneInfo" style="display: none;">
                    <div class="contact-info-row">
                        <span class="contact-info-label">Phone:</span>
                        <span class="contact-info-value" id="phoneValue"></span>
                        <button class="copy-btn" onclick="copyToClipboard('phoneValue')">Copy</button>
                    </div>
                </div>
            </div>
            
            <div style="margin-top: 20px; font-size: 0.9rem; color: #777;">
                <p>Click "Copy" to copy the information to your clipboard</p>
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

        // Read More/Less functionality for descriptions
        document.addEventListener('DOMContentLoaded', function() {
            const bios = document.querySelectorAll('.bio');
            bios.forEach(bio => {
                const text = bio.textContent;
                if (text.length > 150) {
                    const shortText = text.substring(0, 150) + '...';
                    const fullText = text;
                    
                    bio.innerHTML = shortText + 
                        '<button class="read-more-btn" onclick="toggleReadMore(this)">Read More</button>' +
                        '<span style="display:none;">' + fullText.substring(150) + 
                        '<button class="read-more-btn" onclick="toggleReadMore(this)">Read Less</button></span>';
                }
            });
        });

        function toggleReadMore(button) {
            const bio = button.parentElement;
            const shortText = bio.firstChild;
            const hiddenSpan = bio.querySelector('span');
            
            if (hiddenSpan.style.display === 'none') {
                hiddenSpan.style.display = 'inline';
                button.style.display = 'none';
                shortText.textContent = shortText.textContent.replace('...', '');
            } else {
                hiddenSpan.style.display = 'none';
                const readMoreBtn = bio.querySelector('.read-more-btn');
                readMoreBtn.style.display = 'inline';
                shortText.textContent = shortText.textContent + '...';
            }
        }

        // Contact Modal Functions
        function showContactModal(name, email, phone, contactType) {
            const modal = document.getElementById('contactModal');
            const personName = document.getElementById('contactPersonName');
            const emailInfo = document.getElementById('emailInfo');
            const phoneInfo = document.getElementById('phoneInfo');
            
            // Set person name
            personName.textContent = name;
            
            // Hide all contact info first
            emailInfo.style.display = 'none';
            phoneInfo.style.display = 'none';
            
            // Show only the relevant contact info based on the contactType
            if (contactType === 'email' && email) {
                emailInfo.style.display = 'block';
                document.getElementById('emailValue').textContent = email;
            } else if (contactType === 'phone' && phone) {
                phoneInfo.style.display = 'block';
                document.getElementById('phoneValue').textContent = phone;
            } else {
                // If no specific type or info, show all available info
                if (email) {
                    emailInfo.style.display = 'block';
                    document.getElementById('emailValue').textContent = email;
                }
                if (phone) {
                    phoneInfo.style.display = 'block';
                    document.getElementById('phoneValue').textContent = phone;
                }
            }
            
            // Show modal
            modal.style.display = 'block';
        }

        function closeContactModal() {
            const modal = document.getElementById('contactModal');
            modal.style.display = 'none';
        }

        function copyToClipboard(elementId) {
            const element = document.getElementById(elementId);
            const text = element.textContent;
            
            // Create a temporary textarea element
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            
            // Select and copy the text
            textarea.select();
            textarea.setSelectionRange(0, 99999); // For mobile devices
            
            try {
                const successful = document.execCommand('copy');
                const copyBtn = event.target;
                
                if (successful) {
                    // Change button text and color temporarily
                    const originalText = copyBtn.textContent;
                    copyBtn.textContent = 'Copied!';
                    copyBtn.classList.add('copied');
                    
                    // Reset button after 2 seconds
                    setTimeout(() => {
                        copyBtn.textContent = originalText;
                        copyBtn.classList.remove('copied');
                    }, 2000);
                }
            } catch (err) {
                console.error('Failed to copy: ', err);
            }
            
            // Remove the temporary element
            document.body.removeChild(textarea);
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('contactModal');
            if (event.target == modal) {
                closeContactModal();
            }
        }
    </script>
</body>
</html>