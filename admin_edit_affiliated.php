<?php
// admin_edit_affiliated.php
session_start();
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$return_tab = isset($_GET['tab']) ? $_GET['tab'] : 'affiliated_houses'; // Get the tab to return to

if ($id == 0) {
    header("Location: admin_dashboard.php?tab=$return_tab");
    exit();
}

// Fetch the affiliated house data
$sql = "SELECT * FROM affiliated_houses WHERE id = $id";
$result = mysqli_query($conn, $sql);
$affiliated = mysqli_fetch_assoc($result);

if (!$affiliated) {
    header("Location: admin_dashboard.php?tab=$return_tab");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Affiliated House - Hope Account Specialist</title>
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
            max-width: 900px;
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
        
        /* Current Logo Section */
        .current-logo-section {
            padding: 32px 32px 0 32px;
            text-align: center;
            border-bottom: var(--border-gold);
        }
        
        .current-logo-label {
            display: inline-block;
            background: rgba(255, 215, 0, 0.15);
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.8rem;
            color: var(--gold-primary);
            margin-bottom: 16px;
            font-weight: 600;
        }
        
        .logo-preview-container {
            background: var(--black-soft);
            border-radius: 50%;
            padding: 20px;
            display: inline-block;
            margin-bottom: 16px;
            border: 2px solid var(--gold-dark);
            transition: all 0.3s ease;
        }
        
        .logo-preview-container:hover {
            border-color: var(--gold-primary);
            box-shadow: var(--shadow-gold);
            transform: scale(1.02);
        }
        
        .current-logo {
            width: 150px;
            height: 150px;
            object-fit: contain;
            border-radius: 50%;
            background: white;
            padding: 12px;
            transition: all 0.3s ease;
        }
        
        .logo-note {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-top: 12px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .logo-note i {
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
            
            .current-logo-section {
                padding: 24px 24px 0 24px;
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
            .logo-preview-container {
                padding: 12px;
            }
            
            .current-logo {
                width: 120px;
                height: 120px;
            }
            
            .status-toggle {
                flex-direction: column;
                align-items: stretch;
            }
            
            .status-option {
                justify-content: center;
            }
        }
        
        /* Display Order Input Styling */
        input[type="number"].form-control {
            -moz-appearance: textfield;
        }
        
        input[type="number"].form-control::-webkit-inner-spin-button,
        input[type="number"].form-control::-webkit-outer-spin-button {
            opacity: 0.5;
        }
        
        /* Category Badge Styling for Preview */
        .category-hint {
            display: inline-block;
            background: rgba(255, 215, 0, 0.1);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            color: var(--gold-primary);
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <!-- Header -->
        <div class="edit-header">
            <h1>
                <i class="fas fa-building"></i>
                Edit Affiliated House
            </h1>
            <a href="admin_dashboard.php?tab=<?php echo $return_tab; ?>" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Back to Dashboard
            </a>
        </div>
        
        <!-- Current Logo Display -->
        <div class="current-logo-section">
            <div class="current-logo-label">
                <i class="fas fa-image"></i> Current Logo
            </div>
            <div class="logo-preview-container">
                <img src="<?php echo $affiliated['image_path']; ?>" 
                     alt="<?php echo htmlspecialchars($affiliated['name']); ?>" 
                     class="current-logo"
                     onerror="this.src='https://via.placeholder.com/150x150/1A1A1A/FFD700?text=No+Logo'">
            </div>
            <div class="logo-note">
                <i class="fas fa-info-circle"></i>
                Upload a new logo only if you want to replace the current one
            </div>
        </div>
        
        <!-- Edit Form -->
        <form method="POST" action="admin_save_affiliated.php?tab=<?php echo $return_tab; ?>" enctype="multipart/form-data" class="edit-form">
            <input type="hidden" name="id" value="<?php echo $affiliated['id']; ?>">
            <input type="hidden" name="return_tab" value="<?php echo $return_tab; ?>">
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">
                        <i class="fas fa-building"></i> House/Developer Name <span style="color: var(--gold-primary);">*</span>
                    </label>
                    <input type="text" id="name" name="name" class="form-control" 
                           value="<?php echo htmlspecialchars($affiliated['name']); ?>" required>
                    <div class="helper-text">
                        <i class="fas fa-info-circle"></i> Full name of the affiliated house or developer
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="category">
                        <i class="fas fa-tag"></i> Category <span style="color: var(--gold-primary);">*</span>
                    </label>
                    <input type="text" id="category" name="category" class="form-control" 
                           value="<?php echo htmlspecialchars($affiliated['category']); ?>" 
                           placeholder="e.g., Luxury Residential, Condominium" required>
                    <div class="helper-text">
                        <i class="fas fa-info-circle"></i> Property type or specialization
                    </div>
                </div>
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="years_affiliated">
                        <i class="fas fa-calendar-alt"></i> Years Affiliated <span style="color: var(--gold-primary);">*</span>
                    </label>
                    <input type="text" id="years_affiliated" name="years_affiliated" class="form-control" 
                           value="<?php echo htmlspecialchars($affiliated['years_affiliated']); ?>" 
                           placeholder="e.g., Since 2015, Affiliated since 2018" required>
                    <div class="helper-text">
                        <i class="fas fa-info-circle"></i> How long has this house been affiliated?
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="display_order">
                        <i class="fas fa-sort-numeric-up"></i> Display Order
                    </label>
                    <input type="number" id="display_order" name="display_order" class="form-control"
                           value="<?php echo $affiliated['display_order']; ?>" min="0">
                    <div class="helper-text">
                        <i class="fas fa-info-circle"></i> Lower numbers appear first (0 = highest priority)
                    </div>
                </div>
            </div>
            
            <div class="form-group full-width">
                <label for="description">
                    <i class="fas fa-align-left"></i> Description <span style="color: var(--gold-primary);">*</span>
                </label>
                <textarea id="description" name="description" class="form-control" 
                          placeholder="Describe the affiliated house, its specialties, achievements, etc." required><?php echo htmlspecialchars($affiliated['description']); ?></textarea>
                <div class="helper-text">
                    <i class="fas fa-info-circle"></i> Detailed description of the house/developer
                </div>
            </div>
            
            <div class="form-group full-width">
                <label for="image">
                    <i class="fas fa-cloud-upload-alt"></i> New Logo (Optional)
                </label>
                <input type="file" id="image" name="image" accept="image/*" class="form-control">
                <div class="helper-text">
                    <i class="fas fa-info-circle"></i> Max size: 5MB. Supported formats: JPG, PNG, GIF, SVG. Leave empty to keep current logo.
                </div>
            </div>
            
            <div class="form-group full-width">
                <label>
                    <i class="fas fa-toggle-on"></i> Status
                </label>
                <div class="status-toggle">
                    <label class="status-option <?php echo $affiliated['is_active'] ? 'active-option' : ''; ?>">
                        <input type="radio" name="is_active" value="1" <?php echo $affiliated['is_active'] ? 'checked' : ''; ?>>
                        <span class="status-badge-demo active">
                            <i class="fas fa-check-circle"></i> Active
                        </span>
                        <span style="color: var(--text-muted); font-size: 0.85rem;">Display on website</span>
                    </label>
                    <label class="status-option <?php echo !$affiliated['is_active'] ? 'inactive-option' : ''; ?>">
                        <input type="radio" name="is_active" value="0" <?php echo !$affiliated['is_active'] ? 'checked' : ''; ?>>
                        <span class="status-badge-demo inactive">
                            <i class="fas fa-times-circle"></i> Inactive
                        </span>
                        <span style="color: var(--text-muted); font-size: 0.85rem;">Hidden from website</span>
                    </label>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Changes
                </button>
                <a href="admin_dashboard.php?tab=<?php echo $return_tab; ?>" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
                <a href="?tab=<?php echo $return_tab; ?>&delete=<?php echo $affiliated['id']; ?>" 
                   class="btn btn-danger" 
                   onclick="return confirmDelete()">
                    <i class="fas fa-trash-alt"></i> Delete House
                </a>
            </div>
        </form>
    </div>
    
    <script>
        // Enhanced delete confirmation with modern styling
        function confirmDelete() {
            return confirm('⚠️ Are you sure you want to delete this affiliated house?\n\nHouse: <?php echo addslashes($affiliated['name']); ?>\n\nThis action cannot be undone and will permanently remove the record from the database.');
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
        
        // Image preview on file select with animation
        const imageInput = document.getElementById('image');
        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewContainer = document.querySelector('.logo-preview-container');
                        const currentImg = document.querySelector('.current-logo');
                        if (previewContainer && currentImg) {
                            // Add a subtle animation to indicate new image will replace
                            currentImg.style.animation = 'goldPulse 0.5s ease';
                            setTimeout(() => {
                                currentImg.style.animation = '';
                            }, 500);
                            
                            // Optional: Show preview of new image
                            currentImg.src = e.target.result;
                            
                            // Show tooltip that image will be replaced on save
                            const note = document.querySelector('.logo-note');
                            if (note) {
                                const originalText = note.innerHTML;
                                note.innerHTML = '<i class="fas fa-sync-alt"></i> New logo selected. Current logo will be replaced when you save.';
                                note.style.color = 'var(--gold-primary)';
                                setTimeout(() => {
                                    note.innerHTML = originalText;
                                    note.style.color = '';
                                }, 3000);
                            }
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
        
        // Add floating label effect (optional visual enhancement)
        const formControls = document.querySelectorAll('.form-control');
        formControls.forEach(control => {
            control.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            control.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
        
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
                
                // Add subtle animation
                parentLabel.style.animation = 'goldPulse 0.3s ease';
                setTimeout(() => {
                    parentLabel.style.animation = '';
                }, 300);
            });
        });
        
        // Display success/error messages from session if any
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
                const nameInput = document.getElementById('name');
                const categoryInput = document.getElementById('category');
                const yearsInput = document.getElementById('years_affiliated');
                const descInput = document.getElementById('description');
                
                if (!nameInput.value.trim()) {
                    e.preventDefault();
                    showNotification('error', 'Please enter the house/developer name');
                    nameInput.focus();
                    return false;
                }
                
                if (!categoryInput.value.trim()) {
                    e.preventDefault();
                    showNotification('error', 'Please enter the category');
                    categoryInput.focus();
                    return false;
                }
                
                if (!yearsInput.value.trim()) {
                    e.preventDefault();
                    showNotification('error', 'Please enter the years affiliated');
                    yearsInput.focus();
                    return false;
                }
                
                if (!descInput.value.trim()) {
                    e.preventDefault();
                    showNotification('error', 'Please enter the description');
                    descInput.focus();
                    return false;
                }
                
                return true;
            });
        }
    </script>
</body>
</html>