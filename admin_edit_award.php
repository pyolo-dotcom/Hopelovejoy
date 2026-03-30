<?php
// admin_edit_award.php
session_start();
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$return_tab = isset($_GET['tab']) ? $_GET['tab'] : 'awards'; // Get the tab to return to

if ($id == 0) {
    header("Location: admin_dashboard.php?tab=$return_tab");
    exit();
}

// Fetch the award data
$sql = "SELECT * FROM awards WHERE id = $id";
$result = mysqli_query($conn, $sql);
$award = mysqli_fetch_assoc($result);

if (!$award) {
    header("Location: admin_dashboard.php?tab=$return_tab");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Award - Hope Account Specialist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
        :root {
            /* Gold & Black Theme - Matching Admin Dashboard */
            --gold-primary: #FFD700;
            --gold-dark: #B8860B;
            --gold-light: #FFF3B0;
            --gold-gradient: linear-gradient(135deg, #FFD700 0%, #B8860B 100%);
            --gold-gradient-light: linear-gradient(135deg, #FFF3B0 0%, #FFD700 100%);
            
            --black-primary: #0A0A0A;
            --black-dark: #000000;
            --black-light: #1A1A1A;
            --black-soft: #2A2A2A;
            --black-gradient: linear-gradient(135deg, #1A1A1A 0%, #0A0A0A 100%);
            --black-gradient-light: linear-gradient(135deg, #2A2A2A 0%, #1A1A1A 100%);
            
            --success-color: #00C851;
            --warning-color: #FFBB33;
            --danger-color: #FF4444;
            --info-color: #33b5e5;
            
            --text-light: #FFFFFF;
            --text-muted: #CCCCCC;
            --text-dark: #E0E0E0;
            
            --border-gold: 1px solid rgba(255, 215, 0, 0.3);
            --border-black: 1px solid rgba(255, 255, 255, 0.1);
            
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.3);
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.5);
            --shadow-gold: 0 0 15px rgba(255, 215, 0, 0.2);
            
            --radius: 12px;
            --radius-sm: 8px;
            --radius-lg: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        
        body {
            background: var(--black-primary);
            min-height: 100vh;
            color: var(--text-light);
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(255, 215, 0, 0.03) 0%, transparent 20%),
                radial-gradient(circle at 90% 70%, rgba(255, 215, 0, 0.03) 0%, transparent 20%);
            padding: 40px 20px;
        }
        
        .edit-container {
            max-width: 950px;
            margin: 0 auto;
            background: var(--black-gradient);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: var(--border-gold);
            animation: slideUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Header Section */
        .edit-header {
            background: var(--black-gradient-light);
            padding: 28px 32px;
            border-bottom: 2px solid var(--gold-dark);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .edit-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--gold-primary);
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
        }
        
        .edit-header h1 i {
            color: var(--gold-primary);
        }
        
        .back-btn {
            background: var(--black-soft);
            color: var(--text-light);
            border: 1px solid var(--gold-dark);
            padding: 12px 24px;
            border-radius: var(--radius-sm);
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.95rem;
        }
        
        .back-btn:hover {
            background: var(--gold-gradient);
            color: var(--black-dark);
            border-color: var(--gold-primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-gold);
        }
        
        /* Current Images Section */
        .current-images-section {
            padding: 32px 32px 0 32px;
            border-bottom: var(--border-gold);
        }
        
        .section-label {
            display: inline-block;
            background: rgba(255, 215, 0, 0.15);
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.8rem;
            color: var(--gold-primary);
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .images-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 24px;
        }
        
        .image-card {
            text-align: center;
            background: var(--black-soft);
            border-radius: var(--radius);
            padding: 20px;
            border: 1px solid var(--gold-dark);
            transition: all 0.3s ease;
        }
        
        .image-card:hover {
            border-color: var(--gold-primary);
            box-shadow: var(--shadow-gold);
            transform: translateY(-3px);
        }
        
        .image-card-title {
            color: var(--gold-primary);
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .image-preview-container {
            background: var(--black-light);
            border-radius: var(--radius-sm);
            padding: 15px;
            margin-bottom: 12px;
            border: 1px solid var(--gold-dark);
        }
        
        .current-image {
            max-width: 100%;
            max-height: 140px;
            object-fit: contain;
            border-radius: var(--radius-sm);
            transition: all 0.3s ease;
        }
        
        .image-note {
            color: var(--text-muted);
            font-size: 0.75rem;
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        
        .image-note i {
            color: var(--gold-dark);
        }
        
        /* Form Styles */
        .edit-form {
            padding: 32px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-bottom: 24px;
        }
        
        .form-group {
            margin-bottom: 24px;
        }
        
        .form-group.full-width {
            grid-column: span 2;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: var(--gold-light);
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.3px;
        }
        
        .form-group label i {
            margin-right: 8px;
            color: var(--gold-primary);
            width: 20px;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px;
            background: var(--black-soft);
            border: 1px solid var(--gold-dark);
            border-radius: var(--radius-sm);
            font-size: 1rem;
            color: var(--text-light);
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2);
            background: var(--black-light);
        }
        
        select.form-control {
            cursor: pointer;
        }
        
        select.form-control option {
            background: var(--black-light);
            color: var(--text-light);
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }
        
        input[type="file"].form-control {
            padding: 10px;
            background: var(--black-soft);
        }
        
        input[type="file"].form-control::-webkit-file-upload-button {
            background: var(--gold-gradient);
            border: none;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            font-weight: 600;
            cursor: pointer;
            margin-right: 12px;
            transition: all 0.2s ease;
        }
        
        input[type="file"].form-control::-webkit-file-upload-button:hover {
            transform: translateY(-1px);
            filter: brightness(1.05);
        }
        
        input[type="number"].form-control {
            -moz-appearance: textfield;
        }
        
        input[type="number"].form-control::-webkit-inner-spin-button,
        input[type="number"].form-control::-webkit-outer-spin-button {
            opacity: 0.5;
        }
        
        /* Helper Text */
        .helper-text {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .helper-text i {
            font-size: 0.7rem;
            color: var(--gold-dark);
        }
        
        /* Year Badge Styling */
        .year-badge-hint {
            display: inline-block;
            background: var(--gold-gradient);
            color: var(--black-dark);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 700;
            margin-left: 8px;
        }
        
        /* Status Toggle Styling */
        .status-toggle {
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .status-option {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 8px 16px;
            background: var(--black-soft);
            border-radius: var(--radius-sm);
            border: 1px solid var(--gold-dark);
            transition: all 0.2s ease;
        }
        
        .status-option:hover {
            border-color: var(--gold-primary);
        }
        
        .status-option input[type="radio"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--gold-primary);
        }
        
        .status-option.active-option {
            background: rgba(0, 200, 81, 0.15);
            border-color: var(--success-color);
        }
        
        .status-option.inactive-option {
            background: rgba(255, 68, 68, 0.1);
            border-color: rgba(255, 68, 68, 0.5);
        }
        
        .status-badge-demo {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .status-badge-demo.active {
            background: rgba(0, 200, 81, 0.2);
            color: var(--success-color);
        }
        
        .status-badge-demo.inactive {
            background: rgba(255, 68, 68, 0.2);
            color: var(--danger-color);
        }
        
        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 16px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: var(--border-gold);
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 14px 28px;
            border-radius: var(--radius-sm);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
            border: none;
            text-decoration: none;
        }
        
        .btn-primary {
            background: var(--gold-gradient);
            color: var(--black-dark);
            border: 1px solid var(--gold-primary);
            flex: 1;
            justify-content: center;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-gold);
            filter: brightness(1.05);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #FF4444 0%, #CC0000 100%);
            color: white;
            border: 1px solid rgba(255, 68, 68, 0.5);
            flex: 1;
            justify-content: center;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            filter: brightness(1.05);
        }
        
        .btn-secondary {
            background: var(--black-soft);
            color: var(--text-light);
            border: 1px solid var(--gold-dark);
            flex: 1;
            justify-content: center;
        }
        
        .btn-secondary:hover {
            background: var(--black-light);
            border-color: var(--gold-primary);
            transform: translateY(-2px);
        }
        
        /* Alert Messages */
        .alert-modern {
            padding: 16px 20px;
            border-radius: var(--radius);
            margin: 20px 32px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.3s ease;
        }
        
        .alert-success {
            background: rgba(0, 200, 81, 0.1);
            color: #00E676;
            border: 1px solid rgba(0, 200, 81, 0.2);
        }
        
        .alert-error {
            background: rgba(255, 68, 68, 0.1);
            color: #FF6B6B;
            border: 1px solid rgba(255, 68, 68, 0.2);
        }
        
        /* Info Card */
        .info-card {
            background: rgba(255, 215, 0, 0.05);
            border-radius: var(--radius);
            padding: 16px;
            margin-top: 24px;
            border-left: 3px solid var(--gold-primary);
        }
        
        .info-card p {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin: 0;
        }
        
        .info-card i {
            color: var(--gold-primary);
            margin-right: 8px;
        }
        
        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes goldPulse {
            0% { box-shadow: 0 0 0 0 rgba(255, 215, 0, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(255, 215, 0, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 215, 0, 0); }
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--black-soft);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--gold-dark);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--gold-primary);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 20px;
            }
            
            .edit-header {
                padding: 20px;
                flex-direction: column;
                text-align: center;
            }
            
            .edit-header h1 {
                font-size: 1.5rem;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }
            
            .form-group.full-width {
                grid-column: span 1;
            }
            
            .edit-form {
                padding: 24px;
            }
            
            .current-images-section {
                padding: 24px 24px 0 24px;
            }
            
            .images-grid {
                gap: 20px;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
        
        @media (max-width: 480px) {
            .image-card {
                padding: 12px;
            }
            
            .current-image {
                max-height: 100px;
            }
            
            .status-toggle {
                flex-direction: column;
                align-items: stretch;
            }
            
            .status-option {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <!-- Header -->
        <div class="edit-header">
            <h1>
                <i class="fas fa-trophy"></i>
                Edit Award
            </h1>
            <a href="admin_dashboard.php?tab=<?php echo $return_tab; ?>" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Back to Awards
            </a>
        </div>
        
        <!-- Current Images Display -->
        <div class="current-images-section">
            <div class="section-label">
                <i class="fas fa-images"></i> Current Images
            </div>
            <div class="images-grid">
                <div class="image-card">
                    <div class="image-card-title">
                        <i class="fas fa-image"></i> Background Image
                    </div>
                    <div class="image-preview-container">
                        <img src="<?php echo $award['background_image_path']; ?>" 
                             alt="Background for <?php echo htmlspecialchars($award['title']); ?>" 
                             class="current-image"
                             id="currentBgImage"
                             onerror="this.src='https://via.placeholder.com/200x140/1A1A1A/FFD700?text=No+Background'">
                    </div>
                    <div class="image-note">
                        <i class="fas fa-info-circle"></i>
                        Main background image for the award
                    </div>
                </div>
                
                <?php if (!empty($award['image_path'])): ?>
                <div class="image-card">
                    <div class="image-card-title">
                        <i class="fas fa-award"></i> Award Icon
                    </div>
                    <div class="image-preview-container">
                        <img src="<?php echo $award['image_path']; ?>" 
                             alt="<?php echo htmlspecialchars($award['title']); ?> Icon" 
                             class="current-image"
                             id="currentIconImage"
                             onerror="this.src='https://via.placeholder.com/200x140/1A1A1A/FFD700?text=No+Icon'">
                    </div>
                    <div class="image-note">
                        <i class="fas fa-info-circle"></i>
                        Optional award icon/badge
                    </div>
                </div>
                <?php else: ?>
                <div class="image-card">
                    <div class="image-card-title">
                        <i class="fas fa-award"></i> Award Icon
                    </div>
                    <div class="image-preview-container">
                        <img src="https://via.placeholder.com/200x140/1A1A1A/FFD700?text=No+Icon" 
                             alt="No Icon" 
                             class="current-image">
                    </div>
                    <div class="image-note">
                        <i class="fas fa-info-circle"></i>
                        No icon uploaded yet (optional)
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Edit Form -->
        <form method="POST" action="admin_save_award.php?tab=<?php echo $return_tab; ?>" enctype="multipart/form-data" class="edit-form">
            <input type="hidden" name="id" value="<?php echo $award['id']; ?>">
            <input type="hidden" name="return_tab" value="<?php echo $return_tab; ?>">
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="title">
                        <i class="fas fa-trophy"></i> Award Title <span style="color: var(--gold-primary);">*</span>
                    </label>
                    <input type="text" id="title" name="title" class="form-control" 
                           value="<?php echo htmlspecialchars($award['title']); ?>" 
                           placeholder="e.g., Best Real Estate Company of the Year" required>
                </div>
                
                <div class="form-group">
                    <label for="award_year">
                        <i class="fas fa-calendar-alt"></i> Year <span style="color: var(--gold-primary);">*</span>
                        <span class="year-badge-hint"><?php echo date('Y'); ?></span>
                    </label>
                    <input type="text" id="award_year" name="award_year" class="form-control" 
                           value="<?php echo htmlspecialchars($award['award_year']); ?>" 
                           placeholder="e.g., 2024, 2023" required>
                    <div class="helper-text">
                        <i class="fas fa-info-circle"></i> Year the award was received
                    </div>
                </div>
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="issuer">
                        <i class="fas fa-building"></i> Issuing Organization <span style="color: var(--gold-primary);">*</span>
                    </label>
                    <input type="text" id="issuer" name="issuer" class="form-control" 
                           value="<?php echo htmlspecialchars($award['issuer']); ?>" 
                           placeholder="e.g., Philippine Real Estate Association" required>
                </div>
                
                <div class="form-group">
                    <label for="issuer_category">
                        <i class="fas fa-tag"></i> Issuer Category
                    </label>
                    <input type="text" id="issuer_category" name="issuer_category" class="form-control" 
                           value="<?php echo htmlspecialchars($award['issuer_category']); ?>" 
                           placeholder="e.g., Real Estate, Professional Services">
                    <div class="helper-text">
                        <i class="fas fa-info-circle"></i> Category or industry of the issuer (optional)
                    </div>
                </div>
            </div>
            
            <div class="form-group full-width">
                <label for="description">
                    <i class="fas fa-align-left"></i> Award Description <span style="color: var(--gold-primary);">*</span>
                </label>
                <textarea id="description" name="description" class="form-control" 
                          placeholder="Describe the award, its significance, and what it represents..." required><?php echo htmlspecialchars($award['description']); ?></textarea>
                <div class="helper-text">
                    <i class="fas fa-info-circle"></i> Detailed description of the award and its significance
                </div>
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="image">
                        <i class="fas fa-award"></i> Award Icon (Optional)
                    </label>
                    <input type="file" id="image" name="image" accept="image/*" class="form-control">
                    <div class="helper-text">
                        <i class="fas fa-info-circle"></i> Max size: 5MB. Leave empty to keep current icon
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="background_image">
                        <i class="fas fa-image"></i> Background Image <span style="color: var(--gold-primary);">*</span>
                    </label>
                    <input type="file" id="background_image" name="background_image" accept="image/*" class="form-control">
                    <div class="helper-text">
                        <i class="fas fa-info-circle"></i> Max size: 5MB. Leave empty to keep current background
                    </div>
                </div>
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="display_order">
                        <i class="fas fa-sort-numeric-up"></i> Display Order
                    </label>
                    <input type="number" id="display_order" name="display_order" class="form-control"
                           value="<?php echo $award['display_order']; ?>" min="0" step="1">
                    <div class="helper-text">
                        <i class="fas fa-info-circle"></i> Lower numbers appear first (0 = highest priority)
                    </div>
                </div>
                
                <div class="form-group">
                    <label>
                        <i class="fas fa-toggle-on"></i> Status
                    </label>
                    <div class="status-toggle">
                        <label class="status-option <?php echo $award['is_active'] ? 'active-option' : ''; ?>">
                            <input type="radio" name="is_active" value="1" <?php echo $award['is_active'] ? 'checked' : ''; ?>>
                            <span class="status-badge-demo active">
                                <i class="fas fa-check-circle"></i> Active
                            </span>
                            <span style="color: var(--text-muted); font-size: 0.85rem;">Display on website</span>
                        </label>
                        <label class="status-option <?php echo !$award['is_active'] ? 'inactive-option' : ''; ?>">
                            <input type="radio" name="is_active" value="0" <?php echo !$award['is_active'] ? 'checked' : ''; ?>>
                            <span class="status-badge-demo inactive">
                                <i class="fas fa-times-circle"></i> Inactive
                            </span>
                            <span style="color: var(--text-muted); font-size: 0.85rem;">Hidden from website</span>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- Award Info Card (Helpful Tip) -->
            <div class="info-card">
                <p>
                    <i class="fas fa-lightbulb"></i> 
                    <strong style="color: var(--gold-primary);">Award Tip:</strong> 
                    Use high-quality background images (landscape orientation recommended). The award icon is optional but adds visual appeal. Active awards will appear in the "Awards" section on the main website, sorted by display order and year.
                </p>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Changes
                </button>
                <a href="admin_dashboard.php?tab=<?php echo $return_tab; ?>" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
                <a href="?tab=<?php echo $return_tab; ?>&delete=<?php echo $award['id']; ?>" 
                   class="btn btn-danger" 
                   onclick="return confirmDelete()">
                    <i class="fas fa-trash-alt"></i> Delete Award
                </a>
            </div>
        </form>
    </div>
    
    <script>
        // Enhanced delete confirmation
        function confirmDelete() {
            return confirm('⚠️ Are you sure you want to delete this award?\n\nAward: <?php echo addslashes($award['title']); ?>\nYear: <?php echo addslashes($award['award_year']); ?>\nIssuer: <?php echo addslashes($award['issuer']); ?>\n\nThis action cannot be undone and will permanently remove this award from the website.');
        }
        
        // Auto-hide any alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert-modern');
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.5s ease';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
        
        // Background image preview
        const bgImageInput = document.getElementById('background_image');
        if (bgImageInput) {
            bgImageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    if (file.size > 5 * 1024 * 1024) {
                        showNotification('error', 'File size exceeds 5MB limit. Please choose a smaller image.');
                        this.value = '';
                        return;
                    }
                    
                    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                    if (!allowedTypes.includes(file.type)) {
                        showNotification('error', 'Invalid file type. Please upload JPG, PNG, GIF, or WEBP images only.');
                        this.value = '';
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const currentImg = document.getElementById('currentBgImage');
                        if (currentImg) {
                            currentImg.style.animation = 'goldPulse 0.5s ease';
                            setTimeout(() => {
                                currentImg.style.animation = '';
                            }, 500);
                            currentImg.src = e.target.result;
                            
                            const card = currentImg.closest('.image-card');
                            if (card) {
                                const note = card.querySelector('.image-note');
                                if (note) {
                                    const originalText = note.innerHTML;
                                    note.innerHTML = '<i class="fas fa-sync-alt"></i> New background selected. Will be replaced on save.';
                                    note.style.color = 'var(--gold-primary)';
                                    setTimeout(() => {
                                        note.innerHTML = originalText;
                                        note.style.color = '';
                                    }, 3000);
                                }
                            }
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
        
        // Icon image preview
        const iconImageInput = document.getElementById('image');
        if (iconImageInput) {
            iconImageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    if (file.size > 5 * 1024 * 1024) {
                        showNotification('error', 'File size exceeds 5MB limit. Please choose a smaller image.');
                        this.value = '';
                        return;
                    }
                    
                    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
                    if (!allowedTypes.includes(file.type)) {
                        showNotification('error', 'Invalid file type. Please upload JPG, PNG, GIF, or SVG images only.');
                        this.value = '';
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const currentImg = document.getElementById('currentIconImage');
                        if (currentImg) {
                            currentImg.style.animation = 'goldPulse 0.5s ease';
                            setTimeout(() => {
                                currentImg.style.animation = '';
                            }, 500);
                            currentImg.src = e.target.result;
                            
                            const card = currentImg.closest('.image-card');
                            if (card) {
                                const note = card.querySelector('.image-note');
                                if (note) {
                                    const originalText = note.innerHTML;
                                    note.innerHTML = '<i class="fas fa-sync-alt"></i> New icon selected. Will be replaced on save.';
                                    note.style.color = 'var(--gold-primary)';
                                    setTimeout(() => {
                                        note.innerHTML = originalText;
                                        note.style.color = '';
                                    }, 3000);
                                }
                            }
                        } else {
                            // If no current icon image exists, we need to create a preview element
                            const iconCard = document.querySelector('.image-card:last-child');
                            if (iconCard) {
                                const previewContainer = iconCard.querySelector('.image-preview-container');
                                if (previewContainer) {
                                    previewContainer.innerHTML = `<img src="${e.target.result}" class="current-image" id="currentIconImage">`;
                                    const note = iconCard.querySelector('.image-note');
                                    if (note) {
                                        note.innerHTML = '<i class="fas fa-sync-alt"></i> New icon selected. Will be saved.';
                                        note.style.color = 'var(--gold-primary)';
                                    }
                                }
                            }
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
        
        // Add animation to status options on selection
        const statusRadios = document.querySelectorAll('input[name="is_active"]');
        statusRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                const activeOption = document.querySelector('.status-option.active-option');
                const inactiveOption = document.querySelector('.status-option.inactive-option');
                if (activeOption) activeOption.classList.remove('active-option');
                if (inactiveOption) inactiveOption.classList.remove('inactive-option');
                
                const parentLabel = this.closest('.status-option');
                if (this.value === '1') {
                    parentLabel.classList.add('active-option');
                } else {
                    parentLabel.classList.add('inactive-option');
                }
                
                parentLabel.style.animation = 'goldPulse 0.3s ease';
                setTimeout(() => {
                    parentLabel.style.animation = '';
                }, 300);
            });
        });
        
        // Display success/error messages from session
        <?php if (isset($_SESSION['success'])): ?>
            showNotification('success', '<?php echo addslashes($_SESSION['success']); ?>');
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            showNotification('error', '<?php echo addslashes($_SESSION['error']); ?>');
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        
        function showNotification(type, message) {
            const container = document.querySelector('.edit-container');
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert-modern alert-${type}`;
            alertDiv.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                <span>${message}</span>
            `;
            container.insertBefore(alertDiv, container.firstChild);
            
            setTimeout(() => {
                alertDiv.style.opacity = '0';
                alertDiv.style.transition = 'opacity 0.5s ease';
                setTimeout(() => alertDiv.remove(), 500);
            }, 5000);
        }
        
        // Input validation for required fields
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const titleInput = document.getElementById('title');
                const yearInput = document.getElementById('award_year');
                const issuerInput = document.getElementById('issuer');
                const descInput = document.getElementById('description');
                
                if (!titleInput.value.trim()) {
                    e.preventDefault();
                    showNotification('error', 'Please enter the award title');
                    titleInput.focus();
                    return false;
                }
                
                if (!yearInput.value.trim()) {
                    e.preventDefault();
                    showNotification('error', 'Please enter the award year');
                    yearInput.focus();
                    return false;
                }
                
                if (!issuerInput.value.trim()) {
                    e.preventDefault();
                    showNotification('error', 'Please enter the issuing organization');
                    issuerInput.focus();
                    return false;
                }
                
                if (!descInput.value.trim()) {
                    e.preventDefault();
                    showNotification('error', 'Please enter the award description');
                    descInput.focus();
                    return false;
                }
                
                return true;
            });
        }
        
        // Add focus effect for better UX
        const formControls = document.querySelectorAll('.form-control');
        formControls.forEach(control => {
            control.addEventListener('focus', function() {
                this.style.transform = 'scale(1.01)';
                this.style.transition = 'transform 0.2s ease';
            });
            control.addEventListener('blur', function() {
                this.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>