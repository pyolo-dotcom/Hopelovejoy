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

if ($id == 0) {
    header('Location: admin_dashboard.php');
    exit();
}

// Fetch the award data
$sql = "SELECT * FROM awards WHERE id = $id";
$result = mysqli_query($conn, $sql);
$award = mysqli_fetch_assoc($result);

if (!$award) {
    header('Location: admin_dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Award - Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .edit-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 800px;
        }
        
        .edit-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #eeb82e;
        }
        
        .edit-header h1 {
            color: #2c2b29;
            font-size: 2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .back-btn {
            background: #6c757d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .back-btn:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }
        
        .image-preview {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .image-box {
            flex: 1;
            min-width: 150px;
            text-align: center;
        }
        
        .image-box img {
            max-width: 100%;
            max-height: 150px;
            object-fit: contain;
            border-radius: 10px;
            border: 2px solid #eee;
            padding: 10px;
            background: white;
        }
        
        .image-box p {
            margin-top: 10px;
            color: #666;
            font-size: 0.9rem;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #2c2b29;
            font-weight: 600;
        }
        
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: #eeb82e;
            outline: none;
            box-shadow: 0 0 0 3px rgba(238, 184, 46, 0.2);
        }
        
        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .submit-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            flex: 1;
            justify-content: center;
        }
        
        .submit-btn:hover {
            background: #218838;
            transform: translateY(-2px);
        }
        
        .cancel-btn {
            background: #6c757d;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            flex: 1;
            justify-content: center;
            text-decoration: none;
        }
        
        .cancel-btn:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }
        
        @media (max-width: 768px) {
            .edit-container {
                padding: 30px 20px;
            }
            
            .edit-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .image-preview {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <div class="edit-header">
            <h1><i class="fas fa-edit"></i> Edit Award</h1>
            <a href="admin_dashboard.php?tab=awards" class="back-btn">
                <i class="fas fa-arrow-left"></i> Back to Awards
            </a>
        </div>
        
        <div class="image-preview">
            <div class="image-box">
                <p><strong>Current Background:</strong></p>
                <img src="<?php echo $award['background_image_path']; ?>" 
                     alt="<?php echo htmlspecialchars($award['title']); ?>"
                     onerror="this.src='https://via.placeholder.com/150x100?text=No+Image'">
            </div>
            
            <?php if (!empty($award['image_path'])): ?>
            <div class="image-box">
                <p><strong>Current Award Icon:</strong></p>
                <img src="<?php echo $award['image_path']; ?>" 
                     alt="<?php echo htmlspecialchars($award['title']); ?> Icon"
                     onerror="this.src='https://via.placeholder.com/150x100?text=No+Icon'">
            </div>
            <?php endif; ?>
        </div>
        
        <form method="POST" action="admin_save_award.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $award['id']; ?>">
            
            <div class="form-row">
                <div class="form-group">
                    <label for="title"><i class="fas fa-trophy"></i> Title *</label>
                    <input type="text" id="title" name="title" 
                           value="<?php echo htmlspecialchars($award['title']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="award_year"><i class="fas fa-calendar"></i> Year *</label>
                    <input type="text" id="award_year" name="award_year" 
                           value="<?php echo htmlspecialchars($award['award_year']); ?>" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="issuer"><i class="fas fa-building"></i> Issuer *</label>
                    <input type="text" id="issuer" name="issuer" 
                           value="<?php echo htmlspecialchars($award['issuer']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="issuer_category"><i class="fas fa-tag"></i> Issuer Category</label>
                    <input type="text" id="issuer_category" name="issuer_category" 
                           value="<?php echo htmlspecialchars($award['issuer_category']); ?>" 
                           placeholder="e.g., Real Estate, Professional Services">
                </div>
            </div>
            
            <div class="form-group">
                <label for="description"><i class="fas fa-align-left"></i> Description *</label>
                <textarea id="description" name="description" required><?php echo htmlspecialchars($award['description']); ?></textarea>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="image"><i class="fas fa-image"></i> Award Icon (Optional)</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <small style="color: #666;">Leave empty to keep current icon</small>
                </div>
                <div class="form-group">
                    <label for="background_image"><i class="fas fa-image"></i> Background Image (Optional)</label>
                    <input type="file" id="background_image" name="background_image" accept="image/*">
                    <small style="color: #666;">Leave empty to keep current background</small>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="display_order"><i class="fas fa-sort-numeric-up"></i> Display Order</label>
                    <input type="number" id="display_order" name="display_order"
                           value="<?php echo $award['display_order']; ?>">
                    <small style="color: #666;">Lower numbers appear first</small>
                </div>
                <div class="form-group">
                    <label for="is_active"><i class="fas fa-toggle-on"></i> Status</label>
                    <select id="is_active" name="is_active">
                        <option value="1" <?php echo $award['is_active'] ? 'selected' : ''; ?>>Active</option>
                        <option value="0" <?php echo !$award['is_active'] ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="submit-btn">
                    <i class="fas fa-save"></i> Save Changes
                </button>
                <a href="admin_dashboard.php?tab=awards" class="cancel-btn">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</body>
</html>