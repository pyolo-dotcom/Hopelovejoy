<?php
// admin_dashboard.php
session_start();
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin_login.php');
    exit();
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $sql = "DELETE FROM past_sales WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $success = "Record deleted successfully!";
    } else {
        $error = "Error deleting record: " . mysqli_error($conn);
    }
}

// Fetch all past sales
$sql = "SELECT * FROM past_sales ORDER BY sale_date DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Past Sales</title>
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
            background-color: #f5f5f5;
            min-height: 100vh;
        }
        
        .admin-header {
            background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%);
            color: white;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .admin-header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .admin-header h1 {
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .admin-actions {
            display: flex;
            gap: 15px;
        }
        
        .admin-btn {
            background: #eeb82e;
            color: #2c2b29;
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
        
        .admin-btn:hover {
            background: #ffd95e;
            transform: translateY(-2px);
        }
        
        .admin-btn.logout {
            background: #dc3545;
            color: white;
        }
        
        .admin-btn.logout:hover {
            background: #e35d6a;
        }
        
        .admin-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
        
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .sales-table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .table-header {
            background: #f8f9fa;
            padding: 20px;
            border-bottom: 2px solid #eeb82e;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .table-header h2 {
            color: #2c2b29;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background: #2c2b29;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }
        
        tr:hover {
            background: #f9f9f9;
        }
        
        .thumbnail {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
            border: 2px solid #eee;
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        
        .btn-edit, .btn-delete {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .btn-edit {
            background: #28a745;
            color: white;
        }
        
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        
        .btn-edit:hover {
            background: #218838;
        }
        
        .btn-delete:hover {
            background: #c82333;
        }
        
        .add-form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 30px;
            display: none;
        }
        
        .add-form-container.active {
            display: block;
            animation: slideDown 0.3s ease-out;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: #eeb82e;
            outline: none;
            box-shadow: 0 0 0 3px rgba(238, 184, 46, 0.1);
        }
        
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        @media (max-width: 768px) {
            .admin-header-content {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .admin-actions {
                width: 100%;
                justify-content: center;
            }
            
            .table-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="admin-header-content">
            <h1><i class="fas fa-tachometer-alt"></i> Admin Dashboard - Past Sales</h1>
            <div class="admin-actions">
                <a href="index.php" class="admin-btn" target="_blank">
                    <i class="fas fa-eye"></i> View Website
                </a>
                <a href="?logout" class="admin-btn logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </header>
    
    <div class="admin-container">
        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?php echo $success; ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <div class="sales-table">
            <div class="table-header">
                <h2><i class="fas fa-history"></i> Past Sales Management</h2>
                <button onclick="toggleAddForm()" class="admin-btn">
                    <i class="fas fa-plus"></i> Add New Sale
                </button>
            </div>
            
            <div id="addFormContainer" class="add-form-container">
                <h3><i class="fas fa-plus-circle"></i> Add New Past Sale</h3>
                <form method="POST" action="admin_save.php" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="title">Title *</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category *</label>
                            <select id="category" name="category" required>
                                <option value="vehicle">Vehicle</option>
                                <option value="land">Land</option>
                                <option value="property">Property</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="sale_date">Sale Date *</label>
                            <input type="date" id="sale_date" name="sale_date" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price (₱)</label>
                            <input type="number" id="price" name="price" step="0.01">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Image *</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                        <small style="color: #666;">Max size: 5MB. Supported formats: JPG, PNG, GIF</small>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="admin-btn" style="width: auto;">
                            <i class="fas fa-save"></i> Save Sale
                        </button>
                        <button type="button" onclick="toggleAddForm()" class="admin-btn" style="background: #6c757d; width: auto;">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Sale Date</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td>
                                <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['title']; ?>" class="thumbnail" 
                                     onerror="this.src='https://via.placeholder.com/80x60?text=No+Image'">
                            </td>
                            <td><strong><?php echo htmlspecialchars($row['title']); ?></strong></td>
                            <td>
                                <span style="
                                    background: <?php echo $row['category'] == 'vehicle' ? '#e3f2fd' : ($row['category'] == 'land' ? '#e8f5e9' : '#fff3e0'); ?>;
                                    color: <?php echo $row['category'] == 'vehicle' ? '#1565c0' : ($row['category'] == 'land' ? '#2e7d32' : '#ef6c00'); ?>;
                                    padding: 5px 10px;
                                    border-radius: 20px;
                                    font-size: 0.85rem;
                                    font-weight: 600;
                                    text-transform: uppercase;
                                ">
                                    <?php echo $row['category']; ?>
                                </span>
                            </td>
                            <td><?php echo date('M d, Y', strtotime($row['sale_date'])); ?></td>
                            <td>
                                <?php if ($row['price']): ?>
                                    ₱<?php echo number_format($row['price'], 2); ?>
                                <?php else: ?>
                                    <span style="color: #999;">N/A</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($row['is_active']): ?>
                                    <span style="color: #28a745; font-weight: 600;">
                                        <i class="fas fa-check-circle"></i> Active
                                    </span>
                                <?php else: ?>
                                    <span style="color: #dc3545; font-weight: 600;">
                                        <i class="fas fa-times-circle"></i> Inactive
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="admin_edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="?delete=<?php echo $row['id']; ?>" 
                                       class="btn-delete" 
                                       onclick="return confirm('Are you sure you want to delete this sale?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" style="text-align: center; padding: 30px;">
                                <p style="color: #666; font-size: 1.1rem;">
                                    <i class="fas fa-info-circle" style="font-size: 2rem; color: #eeb82e; margin-bottom: 10px; display: block;"></i>
                                    No past sales found. Add your first sale using the "Add New Sale" button.
                                </p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <div style="margin-top: 30px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
            <h3><i class="fas fa-info-circle"></i> Quick Instructions</h3>
            <ol style="margin-top: 15px; color: #666; line-height: 1.8; padding-left: 20px;">
                <li>To add a new sale, click "Add New Sale" button</li>
                <li>To edit a sale, click the Edit button</li>
                <li>To delete a sale, click the Delete button</li>
                <li>Images will be uploaded to the server automatically</li>
                <li>Changes will appear immediately on the website</li>
            </ol>
        </div>
    </div>
    
    <script>
        function toggleAddForm() {
            const formContainer = document.getElementById('addFormContainer');
            formContainer.classList.toggle('active');
        }
        
        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.5s ease';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>