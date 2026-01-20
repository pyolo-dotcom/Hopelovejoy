<?php
// admin_edit_car.php
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

// Fetch the car company data
$sql = "SELECT * FROM affiliated_cars WHERE id = $id";
$result = mysqli_query($conn, $sql);
$car = mysqli_fetch_assoc($result);

if (!$car) {
    header('Location: admin_dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car Company - Admin Panel</title>
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
            max-width: 600px;
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
        
        .current-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .current-logo img {
            max-width: 150px;
            max-height: 100px;
            object-fit: contain;
            border: 3px solid #eee;
            padding: 10px;
            background: white;
        }
        
        .current-logo p {
            margin-top: 10px;
            color: #666;
            font-size: 0.9rem;
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
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-group input:focus, .form-group select:focus {
            border-color: #eeb82e;
            outline: none;
            box-shadow: 0 0 0 3px rgba(238, 184, 46, 0.2);
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
            
            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <div class="edit-header">
            <h1><i class="fas fa-edit"></i> Edit Car Company</h1>
            <a href="admin_dashboard.php" class="back-btn">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
        
        <div class="current-logo">
            <p><strong>Current Logo:</strong></p>
            <img src="<?php echo $car['logo_path']; ?>" 
                 alt="<?php echo htmlspecialchars($car['name']); ?>"
                 onerror="this.src='https://via.placeholder.com/150x100?text=No+Logo'">
            <p>Upload new logo only if you want to change it</p>
        </div>
        
        <form method="POST" action="admin_save_car.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $car['id']; ?>">
            
            <div class="form-group">
                <label for="name"><i class="fas fa-car"></i> Car Company Name *</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($car['name']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="display_order"><i class="fas fa-sort-numeric-up"></i> Display Order</label>
                <input type="number" id="display_order" name="display_order"
                       value="<?php echo $car['display_order']; ?>">
                <small style="color: #666;">Lower numbers appear first</small>
            </div>
            
            <div class="form-group">
                <label for="logo"><i class="fas fa-image"></i> New Logo (Optional)</label>
                <input type="file" id="logo" name="logo" accept="image/*">
                <small style="color: #666;">Leave empty to keep current logo. Max size: 5MB</small>
            </div>
            
            <div class="form-group">
                <label for="is_active"><i class="fas fa-toggle-on"></i> Status</label>
                <select id="is_active" name="is_active">
                    <option value="1" <?php echo $car['is_active'] ? 'selected' : ''; ?>>Active</option>
                    <option value="0" <?php echo !$car['is_active'] ? 'selected' : ''; ?>>Inactive</option>
                </select>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="submit-btn">
                    <i class="fas fa-save"></i> Save Changes
                </button>
                <a href="admin_dashboard.php" class="cancel-btn">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</body>
</html>