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

// Get active tab from URL or default to past_sales
$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'past_sales';

// Handle delete based on active tab
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    
    // Sa admin_dashboard.php, i-update ang delete switch statement:
    switch($active_tab) {
        case 'past_sales':
            $sql = "DELETE FROM past_sales WHERE id = $id";
            $success_msg = "Sale deleted successfully!";
            $error_msg = "Error deleting sale";
            break;
        case 'affiliated_houses':
            $sql = "DELETE FROM affiliated_houses WHERE id = $id";
            $success_msg = "Affiliated house deleted successfully!";
            $error_msg = "Error deleting affiliated house";
            break;
        case 'affiliated_banks':
            $sql = "DELETE FROM affiliated_banks WHERE id = $id";
            $success_msg = "Bank deleted successfully!";
            $error_msg = "Error deleting bank";
            break;
        case 'affiliated_cars':
            $sql = "DELETE FROM affiliated_cars WHERE id = $id";
            $success_msg = "Car company deleted successfully!";
            $error_msg = "Error deleting car company";
            break;
        case 'team_members': // NEW
            $sql = "DELETE FROM team_members WHERE id = $id";
            $success_msg = "Team member deleted successfully!";
            $error_msg = "Error deleting team member";
            break;
        case 'awards':
            $sql = "DELETE FROM awards WHERE id = $id";
            $success_msg = "Award deleted successfully!";
            $error_msg = "Error deleting award";
            break;
        case 'contact_messages':
            $sql = "DELETE FROM contact_messages WHERE id = $id";
            $success_msg = "Message deleted successfully!";
            $error_msg = "Error deleting message";
            break;
        default:
            $sql = "";
            break;
    }
    
    if (!empty($sql) && mysqli_query($conn, $sql)) {
        $_SESSION['success'] = $success_msg;
    } elseif (!empty($sql)) {
        $_SESSION['error'] = $error_msg . ": " . mysqli_error($conn);
    }
    
    // Redirect back to same tab
    header("Location: admin_dashboard.php?tab=$active_tab");
    exit();
}

if (isset($_GET['mark_as_read'])) {
    $id = intval($_GET['mark_as_read']);
    $sql = "UPDATE contact_messages SET status = 'read' WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Message marked as read!";
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
    }
    
    header("Location: admin_dashboard.php?tab=contact_messages");
    exit();
}

// Check for success/error messages from session
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

// Fetch data for ALL tabs initially
$past_sales_result = mysqli_query($conn, "SELECT * FROM past_sales ORDER BY sale_date DESC");
$affiliated_houses_result = mysqli_query($conn, "SELECT * FROM affiliated_houses ORDER BY display_order ASC, name ASC");
$affiliated_banks_result = mysqli_query($conn, "SELECT * FROM affiliated_banks ORDER BY display_order ASC, name ASC");
$affiliated_cars_result = mysqli_query($conn, "SELECT * FROM affiliated_cars ORDER BY display_order ASC, name ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Hope Account Specialist</title>
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
            position: sticky;
            top: 0;
            z-index: 1000;
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
        
        /* Tab Navigation Styles */
        .tab-navigation {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
        
        .tab-buttons {
            display: flex;
            background: #f8f9fa;
            border-bottom: 2px solid #eeb82e;
            overflow-x: auto;
        }
        
        .tab-link {
            padding: 15px 30px;
            background: none;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            color: #666;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            white-space: nowrap;
            position: relative;
            text-decoration: none;
        }
        
        .tab-link:hover {
            background: #f0f0f0;
            color: #2c2b29;
        }
        
        .tab-link.active {
            background: #eeb82e;
            color: #2c2b29;
        }
        
        .tab-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: #2c2b29;
        }
        
        .tab-content {
            display: none;
            animation: fadeIn 0.5s ease;
        }
        
        .tab-content.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Common Table Styles */
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
        
        .thumbnail.small {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }
        
        .thumbnail.logo {
            width: 80px;
            height: 60px;
            object-fit: contain;
            background: #f8f9fa;
            padding: 5px;
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
        
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: #666;
        }
        
        .empty-state i {
            font-size: 3rem;
            color: #eeb82e;
            margin-bottom: 15px;
        }
        
        .empty-state p {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        /* Modal Styles - FIXED SCROLLING ISSUE */
        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            animation: fadeIn 0.3s ease;
            overflow: hidden;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 10px;
            width: 80%;
            max-width: 700px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 5px 25px rgba(0,0,0,0.2);
            animation: slideDown 0.3s ease-out;
            position: relative;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eeb82e;
            position: sticky;
            top: 0;
            background: white;
            z-index: 2;
        }

        .modal-header h2 {
            color: #2c2b29;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .close-modal {
            font-size: 28px;
            cursor: pointer;
            color: #999;
            transition: color 0.3s ease;
            background: none;
            border: none;
            padding: 5px;
        }

        .close-modal:hover {
            color: #2c2b29;
        }

        .message-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #eeb82e;
            margin-bottom: 20px;
        }

        .message-details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }

        .message-detail-item {
            padding: 5px 0;
        }

        .message-detail-item strong {
            color: #2c2b29;
            display: block;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .message-detail-item a {
            color: #007bff;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .message-detail-item a:hover {
            text-decoration: underline;
        }

        .message-content {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            line-height: 1.6;
            white-space: pre-wrap;
            font-size: 1.05rem;
            margin: 20px 0;
        }

        .message-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .message-actions .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .message-actions .btn-view {
            background: #17a2b8;
            color: white;
        }

        .message-actions .btn-view:hover {
            background: #138496;
        }

        .message-actions .btn-reply {
            background: #28a745;
            color: white;
        }

        .message-actions .btn-reply:hover {
            background: #218838;
        }

        .message-actions .btn-delete {
            background: #dc3545;
            color: white;
        }

        .message-actions .btn-delete:hover {
            background: #c82333;
        }
        
        /* Contact Messages Specific Styles */
        .contact-messages-table {
            font-size: 0.95rem;
        }

        .contact-messages-table th {
            padding: 18px 15px;
            font-size: 0.95rem;
            white-space: nowrap;
        }

        .contact-messages-table td {
            padding: 16px 15px;
            vertical-align: top;
        }

        .contact-messages-table tr:hover {
            background: #f8f9fa;
        }

        /* Better status badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            min-width: 80px;
            justify-content: center;
        }

        .status-new {
            background: #e3f2fd;
            color: #1565c0;
            border: 1px solid #bbdefb;
        }

        .status-read {
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #c8e6c9;
        }

        .status-archived {
            background: #fff3e0;
            color: #ef6c00;
            border: 1px solid #ffcc80;
        }

        /* Message preview with better styling */
        .message-preview {
            max-width: 300px;
            line-height: 1.5;
            color: #555;
            position: relative;
        }

        .message-preview-content {
            max-height: 60px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .message-preview:hover .message-preview-content {
            max-height: none;
            background: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: absolute;
            z-index: 100;
            width: 350px;
            max-height: 200px;
            overflow-y: auto;
            left: 0;
            top: 0;
        }

        /* Contact info styling */
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .contact-name {
            font-weight: 600;
            color: #2c2b29;
        }

        .contact-email, .contact-phone {
            font-size: 0.9rem;
            color: #666;
        }

        .contact-email a, .contact-phone a {
            color: #0066cc;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .contact-email a:hover, .contact-phone a:hover {
            text-decoration: underline;
        }

        /* Enhanced action buttons */
        .contact-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 180px;
        }

        .contact-action-btn {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            justify-content: center;
            transition: all 0.3s ease;
            text-decoration: none;
            width: 100%;
        }

        .contact-action-btn.view {
            background: #17a2b8;
            color: white;
        }

        .contact-action-btn.view:hover {
            background: #138496;
            transform: translateY(-2px);
        }

        .contact-action-btn.reply {
            background: #28a745;
            color: white;
        }

        .contact-action-btn.reply:hover {
            background: #218838;
            transform: translateY(-2px);
        }

        .contact-action-btn.delete {
            background: #dc3545;
            color: white;
        }

        .contact-action-btn.delete:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        /* Date styling */
        .message-date {
            color: #666;
            font-size: 0.9rem;
            min-width: 150px;
        }

        .message-date .date {
            font-weight: 600;
            color: #2c2b29;
        }

        .message-date .time {
            color: #888;
            font-size: 0.85rem;
        }

        /* Service tag */
        .service-tag {
            background: #f0f0f0;
            color: #555;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.85rem;
            display: inline-block;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Scrollable table container */
        .table-scroll-container {
            overflow-x: auto;
            border-radius: 0 0 10px 10px;
        }

        /* Message count badge */
        .message-count {
            background: #eeb82e;
            color: #2c2b29;
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-left: 10px;
        }

        /* Body no-scroll class */
        .no-scroll {
            overflow: hidden;
            position: fixed;
            width: 100%;
            height: 100%;
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
            
            .tab-buttons {
                flex-wrap: wrap;
            }
            
            .tab-link {
                flex: 1;
                min-width: 120px;
                justify-content: center;
                padding: 12px 15px;
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
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-edit, .btn-delete {
                width: 100%;
                justify-content: center;
            }
            
            .modal-content {
                width: 95%;
                margin: 10% auto;
                padding: 20px;
            }
        }
        
        @media (max-width: 480px) {
            .tab-link span {
                display: none;
            }
            
            .tab-link i {
                font-size: 1.2rem;
            }
            
            .tab-link {
                min-width: 70px;
                padding: 12px 5px;
            }
            
            .modal-content {
                width: 98%;
                margin: 5% auto;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="admin-header-content">
            <h1><i class="fas fa-tachometer-alt"></i> Admin Dashboard</h1>
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
        
        <!-- Tab Navigation -->
        <div class="tab-navigation">
            <div class="tab-buttons">
                <a href="?tab=past_sales" class="tab-link <?php echo $active_tab == 'past_sales' ? 'active' : ''; ?>">
                    <i class="fas fa-history"></i>
                    <span>Past Sales</span>
                </a>
                <a href="?tab=affiliated_houses" class="tab-link <?php echo $active_tab == 'affiliated_houses' ? 'active' : ''; ?>">
                    <i class="fas fa-home"></i>
                    <span>Affiliated Houses</span>
                </a>
                <a href="?tab=affiliated_banks" class="tab-link <?php echo $active_tab == 'affiliated_banks' ? 'active' : ''; ?>">
                    <i class="fas fa-university"></i>
                    <span>Affiliated Banks</span>
                </a>
                <a href="?tab=affiliated_cars" class="tab-link <?php echo $active_tab == 'affiliated_cars' ? 'active' : ''; ?>">
                    <i class="fas fa-car"></i>
                    <span>Car Companies</span>
                </a>
                <a href="?tab=team_members" class="tab-link <?php echo $active_tab == 'team_members' ? 'active' : ''; ?>">
                    <i class="fas fa-users"></i>
                    <span>Team Members</span>
                </a>
                <a href="?tab=awards" class="tab-link <?php echo $active_tab == 'awards' ? 'active' : ''; ?>">
                    <i class="fas fa-award"></i>
                    <span>Awards</span>
                </a>
                <a href="?tab=contact_messages" class="tab-link <?php echo $active_tab == 'contact_messages' ? 'active' : ''; ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Contact Messages</span>
                </a>
            </div>
            
            <!-- Past Sales Tab -->
            <div id="past_sales" class="tab-content <?php echo $active_tab == 'past_sales' ? 'active' : ''; ?>">
                <div class="sales-table">
                    <div class="table-header">
                        <h2><i class="fas fa-history"></i> Past Sales Management</h2>
                        <button onclick="toggleAddForm('past_sales')" class="admin-btn">
                            <i class="fas fa-plus"></i> Add New Sale
                        </button>
                    </div>
                    
                    <div id="past_sales_form" class="add-form-container">
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
                                <button type="button" onclick="toggleAddForm('past_sales')" class="admin-btn" style="background: #6c757d; width: auto;">
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
                            <?php if (mysqli_num_rows($past_sales_result) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($past_sales_result)): ?>
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
                                            <a href="admin_edit.php?id=<?php echo $row['id']; ?>&tab=past_sales" class="btn-edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="?tab=past_sales&delete=<?php echo $row['id']; ?>" 
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
                                    <td colspan="8">
                                        <div class="empty-state">
                                            <i class="fas fa-info-circle"></i>
                                            <p>No past sales found</p>
                                            <p>Add your first sale using the "Add New Sale" button</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Affiliated Houses Tab -->
            <div id="affiliated_houses" class="tab-content <?php echo $active_tab == 'affiliated_houses' ? 'active' : ''; ?>">
                <div class="sales-table">
                    <div class="table-header">
                        <h2><i class="fas fa-home"></i> Affiliated Houses Management</h2>
                        <button onclick="toggleAddForm('affiliated_houses')" class="admin-btn">
                            <i class="fas fa-plus"></i> Add New House
                        </button>
                    </div>
                    
                    <div id="affiliated_houses_form" class="add-form-container">
                        <h3><i class="fas fa-plus-circle"></i> Add New Affiliated House</h3>
                        <form method="POST" action="admin_save_affiliated.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="affiliated_name">Name *</label>
                                    <input type="text" id="affiliated_name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="affiliated_category">Category *</label>
                                    <input type="text" id="affiliated_category" name="category" placeholder="e.g., Luxury Residential, Condominium" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="affiliated_years">Years Affiliated *</label>
                                    <input type="text" id="affiliated_years" name="years_affiliated" placeholder="e.g., Affiliated since 2018" required>
                                </div>
                                <div class="form-group">
                                    <label for="affiliated_order">Display Order</label>
                                    <input type="number" id="affiliated_order" name="display_order" value="0">
                                    <small style="color: #666;">Lower numbers appear first</small>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="affiliated_description">Description *</label>
                                <textarea id="affiliated_description" name="description" rows="3" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="affiliated_image">Logo/Image *</label>
                                <input type="file" id="affiliated_image" name="image" accept="image/*" required>
                                <small style="color: #666;">Max size: 5MB. Supported formats: JPG, PNG, GIF</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="affiliated_status">Status</label>
                                <select id="affiliated_status" name="is_active">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="admin-btn" style="width: auto;">
                                    <i class="fas fa-save"></i> Save House
                                </button>
                                <button type="button" onclick="toggleAddForm('affiliated_houses')" class="admin-btn" style="background: #6c757d; width: auto;">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Years Affiliated</th>
                                <th>Description</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($affiliated_houses_result) > 0): ?>
                                <?php while ($affiliated = mysqli_fetch_assoc($affiliated_houses_result)): ?>
                                <tr>
                                    <td><?php echo $affiliated['id']; ?></td>
                                    <td>
                                        <img src="<?php echo $affiliated['image_path']; ?>" alt="<?php echo htmlspecialchars($affiliated['name']); ?>" 
                                            class="thumbnail small"
                                            onerror="this.src='https://via.placeholder.com/60x60?text=No+Logo'">
                                    </td>
                                    <td><strong><?php echo htmlspecialchars($affiliated['name']); ?></strong></td>
                                    <td><?php echo htmlspecialchars($affiliated['category']); ?></td>
                                    <td><?php echo htmlspecialchars($affiliated['years_affiliated']); ?></td>
                                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                        <?php echo htmlspecialchars(substr($affiliated['description'], 0, 100)); ?>
                                        <?php if (strlen($affiliated['description']) > 100): ?>...<?php endif; ?>
                                    </td>
                                    <td><?php echo $affiliated['display_order']; ?></td>
                                    <td>
                                        <?php if ($affiliated['is_active']): ?>
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
                                            <a href="admin_edit_affiliated.php?id=<?php echo $affiliated['id']; ?>&tab=affiliated_houses" class="btn-edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="?tab=affiliated_houses&delete=<?php echo $affiliated['id']; ?>" 
                                            class="btn-delete" 
                                            onclick="return confirm('Are you sure you want to delete this affiliated house?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="9">
                                        <div class="empty-state">
                                            <i class="fas fa-home"></i>
                                            <p>No affiliated houses found</p>
                                            <p>Add your first affiliated house using the "Add New House" button</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Affiliated Banks Tab -->
            <div id="affiliated_banks" class="tab-content <?php echo $active_tab == 'affiliated_banks' ? 'active' : ''; ?>">
                <div class="sales-table">
                    <div class="table-header">
                        <h2><i class="fas fa-university"></i> Affiliated Banks Management</h2>
                        <button onclick="toggleAddForm('affiliated_banks')" class="admin-btn">
                            <i class="fas fa-plus"></i> Add New Bank
                        </button>
                    </div>
                    
                    <div id="affiliated_banks_form" class="add-form-container">
                        <h3><i class="fas fa-plus-circle"></i> Add New Bank</h3>
                        <form method="POST" action="admin_save_bank.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="bank_name">Bank Name *</label>
                                    <input type="text" id="bank_name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="bank_order">Display Order</label>
                                    <input type="number" id="bank_order" name="display_order" value="0">
                                    <small style="color: #666;">Lower numbers appear first</small>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="bank_logo">Bank Logo *</label>
                                <input type="file" id="bank_logo" name="logo" accept="image/*" required>
                                <small style="color: #666;">Max size: 5MB. Supported formats: JPG, PNG, GIF, SVG</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="bank_status">Status</label>
                                <select id="bank_status" name="is_active">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="admin-btn" style="width: auto;">
                                    <i class="fas fa-save"></i> Save Bank
                                </button>
                                <button type="button" onclick="toggleAddForm('affiliated_banks')" class="admin-btn" style="background: #6c757d; width: auto;">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Logo</th>
                                <th>Bank Name</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($affiliated_banks_result) > 0): ?>
                                <?php while ($bank = mysqli_fetch_assoc($affiliated_banks_result)): ?>
                                <tr>
                                    <td><?php echo $bank['id']; ?></td>
                                    <td>
                                        <img src="<?php echo $bank['logo_path']; ?>" alt="<?php echo htmlspecialchars($bank['name']); ?>" 
                                            class="thumbnail logo"
                                            onerror="this.src='https://via.placeholder.com/80x60?text=No+Logo'">
                                    </td>
                                    <td><strong><?php echo htmlspecialchars($bank['name']); ?></strong></td>
                                    <td><?php echo $bank['display_order']; ?></td>
                                    <td>
                                        <?php if ($bank['is_active']): ?>
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
                                            <a href="admin_edit_bank.php?id=<?php echo $bank['id']; ?>&tab=affiliated_banks" class="btn-edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="?tab=affiliated_banks&delete=<?php echo $bank['id']; ?>" 
                                            class="btn-delete" 
                                            onclick="return confirm('Are you sure you want to delete this bank?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <i class="fas fa-university"></i>
                                            <p>No affiliated banks found</p>
                                            <p>Add your first bank using the "Add New Bank" button</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Affiliated Cars Tab -->
            <div id="affiliated_cars" class="tab-content <?php echo $active_tab == 'affiliated_cars' ? 'active' : ''; ?>">
                <div class="sales-table">
                    <div class="table-header">
                        <h2><i class="fas fa-car"></i> Car Companies Management</h2>
                        <button onclick="toggleAddForm('affiliated_cars')" class="admin-btn">
                            <i class="fas fa-plus"></i> Add New Car Company
                        </button>
                    </div>
                    
                    <div id="affiliated_cars_form" class="add-form-container">
                        <h3><i class="fas fa-plus-circle"></i> Add New Car Company</h3>
                        <form method="POST" action="admin_save_car.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="car_name">Car Company Name *</label>
                                    <input type="text" id="car_name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="car_order">Display Order</label>
                                    <input type="number" id="car_order" name="display_order" value="0">
                                    <small style="color: #666;">Lower numbers appear first</small>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="car_logo">Company Logo *</label>
                                <input type="file" id="car_logo" name="logo" accept="image/*" required>
                                <small style="color: #666;">Max size: 5MB. Supported formats: JPG, PNG, GIF, SVG</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="car_status">Status</label>
                                <select id="car_status" name="is_active">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="admin-btn" style="width: auto;">
                                    <i class="fas fa-save"></i> Save Car Company
                                </button>
                                <button type="button" onclick="toggleAddForm('affiliated_cars')" class="admin-btn" style="background: #6c757d; width: auto;">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Logo</th>
                                <th>Company Name</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($affiliated_cars_result) > 0): ?>
                                <?php while ($car = mysqli_fetch_assoc($affiliated_cars_result)): ?>
                                <tr>
                                    <td><?php echo $car['id']; ?></td>
                                    <td>
                                        <img src="<?php echo $car['logo_path']; ?>" alt="<?php echo htmlspecialchars($car['name']); ?>" 
                                            class="thumbnail logo"
                                            onerror="this.src='https://via.placeholder.com/80x60?text=No+Logo'">
                                    </td>
                                    <td><strong><?php echo htmlspecialchars($car['name']); ?></strong></td>
                                    <td><?php echo $car['display_order']; ?></td>
                                    <td>
                                        <?php if ($car['is_active']): ?>
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
                                            <a href="admin_edit_car.php?id=<?php echo $car['id']; ?>&tab=affiliated_cars" class="btn-edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="?tab=affiliated_cars&delete=<?php echo $car['id']; ?>" 
                                            class="btn-delete" 
                                            onclick="return confirm('Are you sure you want to delete this car company?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <i class="fas fa-car"></i>
                                            <p>No car companies found</p>
                                            <p>Add your first car company using the "Add New Car Company" button</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- NEW: Team Members Tab Content -->
            <div id="team_members" class="tab-content <?php echo $active_tab == 'team_members' ? 'active' : ''; ?>">
                <div class="sales-table">
                    <div class="table-header">
                        <h2><i class="fas fa-users"></i> Team Members Management</h2>
                        <button onclick="toggleAddForm('team_members')" class="admin-btn">
                            <i class="fas fa-plus"></i> Add New Team Member
                        </button>
                    </div>
                    
                    <div id="team_members_form" class="add-form-container">
                        <h3><i class="fas fa-plus-circle"></i> Add New Team Member</h3>
                        <form method="POST" action="admin_save_team.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="team_name">Name *</label>
                                    <input type="text" id="team_name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="team_position">Position *</label>
                                    <input type="text" id="team_position" name="position" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="team_category">Category *</label>
                                    <select id="team_category" name="category" required>
                                        <option value="ceo">CEO/Founder</option>
                                        <option value="leadership">Leadership Team</option>
                                        <option value="specialists">Account Specialists</option>
                                        <option value="support">Support Staff</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="team_order">Display Order</label>
                                    <input type="number" id="team_order" name="display_order" value="0">
                                    <small style="color: #666;">Lower numbers appear first</small>
                                </div>
                                <div class="form-group">
                                    <label for="team_status">Status</label>
                                    <select id="team_status" name="is_active">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="team_description">Description/Bio</label>
                                <textarea id="team_description" name="description" rows="3" placeholder="Short bio or description about the team member"></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="team_phone">Phone Number</label>
                                    <input type="text" id="team_phone" name="phone" placeholder="e.g., +63 912 345 6789">
                                </div>
                                <div class="form-group">
                                    <label for="team_email">Email Address</label>
                                    <input type="email" id="team_email" name="email" placeholder="e.g., name@example.com">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="team_facebook">Facebook Link</label>
                                <input type="url" id="team_facebook" name="facebook_link" placeholder="https://facebook.com/username">
                            </div>
                            
                            <div class="form-group">
                                <label for="team_image">Profile Image *</label>
                                <input type="file" id="team_image" name="image" accept="image/*" required>
                                <small style="color: #666;">Recommended: Square image, 400x400px. Max size: 5MB</small>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="admin-btn" style="width: auto;">
                                    <i class="fas fa-save"></i> Save Team Member
                                </button>
                                <button type="button" onclick="toggleAddForm('team_members')" class="admin-btn" style="background: #6c757d; width: auto;">
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
                                <th>Name</th>
                                <th>Position</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Fetch team members data
                            $team_members_result = mysqli_query($conn, "SELECT * FROM team_members ORDER BY category ASC, display_order ASC, name ASC");
                            
                            if (mysqli_num_rows($team_members_result) > 0): ?>
                                <?php while ($member = mysqli_fetch_assoc($team_members_result)): ?>
                                <tr>
                                    <td><?php echo $member['id']; ?></td>
                                    <td>
                                        <img src="<?php echo $member['image_path']; ?>" alt="<?php echo htmlspecialchars($member['name']); ?>" 
                                            class="thumbnail small"
                                            onerror="this.src='https://via.placeholder.com/60x60?text=No+Image'">
                                    </td>
                                    <td><strong><?php echo htmlspecialchars($member['name']); ?></strong></td>
                                    <td><?php echo htmlspecialchars($member['position']); ?></td>
                                    <td>
                                        <?php if (!empty($member['phone'])): ?>
                                            <a href="tel:<?php echo htmlspecialchars($member['phone']); ?>" 
                                            style="color: #007bff; text-decoration: none; font-size: 0.9rem;">
                                                <i class="fas fa-phone"></i> <?php echo htmlspecialchars($member['phone']); ?>
                                            </a>
                                        <?php else: ?>
                                            <span style="color: #999; font-size: 0.9rem;">N/A</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($member['email'])): ?>
                                            <a href="mailto:<?php echo htmlspecialchars($member['email']); ?>" 
                                            style="color: #007bff; text-decoration: none; font-size: 0.9rem;">
                                                <i class="fas fa-envelope"></i> View Email
                                            </a>
                                        <?php else: ?>
                                            <span style="color: #999; font-size: 0.9rem;">N/A</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php 
                                        $category_labels = [
                                            'ceo' => 'CEO',
                                            'leadership' => 'Leadership',
                                            'specialists' => 'Specialist',
                                            'support' => 'Support'
                                        ];
                                        echo $category_labels[$member['category']] ?? $member['category'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($member['is_active']): ?>
                                            <span style="color: #28a745; font-weight: 600; font-size: 0.9rem;">
                                                <i class="fas fa-check-circle"></i> Active
                                            </span>
                                        <?php else: ?>
                                            <span style="color: #dc3545; font-weight: 600; font-size: 0.9rem;">
                                                <i class="fas fa-times-circle"></i> Inactive
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="admin_edit_team.php?id=<?php echo $member['id']; ?>&tab=team_members" class="btn-edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="?tab=team_members&delete=<?php echo $member['id']; ?>" 
                                            class="btn-delete" 
                                            onclick="return confirm('Are you sure you want to delete this team member?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="9">
                                        <div class="empty-state">
                                            <i class="fas fa-users"></i>
                                            <p>No team members found</p>
                                            <p>Add your first team member using the "Add New Team Member" button</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Awards Tab -->
        <div id="awards" class="tab-content <?php echo $active_tab == 'awards' ? 'active' : ''; ?>">
            <div class="sales-table">
                <div class="table-header">
                    <h2><i class="fas fa-award"></i> Awards & Recognition Management</h2>
                    <button onclick="toggleAddForm('awards')" class="admin-btn">
                        <i class="fas fa-plus"></i> Add New Award
                    </button>
                </div>
                
                <div id="awards_form" class="add-form-container">
                    <h3><i class="fas fa-plus-circle"></i> Add New Award</h3>
                    <form method="POST" action="admin_save_award.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="award_title">Title *</label>
                                <input type="text" id="award_title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="award_year">Year *</label>
                                <input type="text" id="award_year" name="award_year" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="award_issuer">Issuer *</label>
                                <input type="text" id="award_issuer" name="issuer" required>
                            </div>
                            <div class="form-group">
                                <label for="award_issuer_category">Issuer Category</label>
                                <input type="text" id="award_issuer_category" name="issuer_category" placeholder="e.g., Real Estate, Professional Services">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="award_description">Description *</label>
                            <textarea id="award_description" name="description" rows="3" required></textarea>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="award_image">Award Image/Icon</label>
                                <input type="file" id="award_image" name="image" accept="image/*">
                                <small style="color: #666;">Main award icon (optional)</small>
                            </div>
                            <div class="form-group">
                                <label for="award_bg_image">Background Image *</label>
                                <input type="file" id="award_bg_image" name="background_image" accept="image/*" required>
                                <small style="color: #666;">Background image for the award card</small>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="award_order">Display Order</label>
                                <input type="number" id="award_order" name="display_order" value="0">
                                <small style="color: #666;">Lower numbers appear first</small>
                            </div>
                            <div class="form-group">
                                <label for="award_status">Status</label>
                                <select id="award_status" name="is_active">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="admin-btn" style="width: auto;">
                                <i class="fas fa-save"></i> Save Award
                            </button>
                            <button type="button" onclick="toggleAddForm('awards')" class="admin-btn" style="background: #6c757d; width: auto;">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                        </div>
                    </form>
                </div>
                
                <?php
                // Fetch awards data
                $awards_sql = "SELECT * FROM awards ORDER BY display_order ASC, award_year DESC";
                $awards_result = mysqli_query($conn, $awards_sql);
                ?>
                
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Background Image</th>
                            <th>Title</th>
                            <th>Year</th>
                            <th>Issuer</th>
                            <th>Description</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($awards_result) > 0): ?>
                            <?php while ($award = mysqli_fetch_assoc($awards_result)): ?>
                            <tr>
                                <td><?php echo $award['id']; ?></td>
                                <td>
                                    <img src="<?php echo $award['background_image_path']; ?>" 
                                        alt="<?php echo htmlspecialchars($award['title']); ?>" 
                                        class="thumbnail"
                                        onerror="this.src='https://via.placeholder.com/80x60?text=No+Image'"
                                        style="width: 80px; height: 60px; object-fit: cover;">
                                </td>
                                <td><strong><?php echo htmlspecialchars($award['title']); ?></strong></td>
                                <td>
                                    <span style="
                                        background: #eeb82e;
                                        color: #2c2b29;
                                        padding: 5px 10px;
                                        border-radius: 20px;
                                        font-size: 0.85rem;
                                        font-weight: 600;
                                    ">
                                        <?php echo htmlspecialchars($award['award_year']); ?>
                                    </span>
                                </td>
                                <td><?php echo htmlspecialchars($award['issuer']); ?></td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo htmlspecialchars(substr($award['description'], 0, 100)); ?>
                                    <?php if (strlen($award['description']) > 100): ?>...<?php endif; ?>
                                </td>
                                <td><?php echo $award['display_order']; ?></td>
                                <td>
                                    <?php if ($award['is_active']): ?>
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
                                        <a href="admin_edit_award.php?id=<?php echo $award['id']; ?>&tab=awards" class="btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="?tab=awards&delete=<?php echo $award['id']; ?>" 
                                        class="btn-delete" 
                                        onclick="return confirm('Are you sure you want to delete this award?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9">
                                    <div class="empty-state">
                                        <i class="fas fa-award"></i>
                                        <p>No awards found</p>
                                        <p>Add your first award using the "Add New Award" button</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Contact Messages Tab -->
        <div id="contact_messages" class="tab-content <?php echo $active_tab == 'contact_messages' ? 'active' : ''; ?>">
            <div class="sales-table">
                <div class="table-header">
                    <h2><i class="fas fa-envelope"></i> Contact Messages Management 
                        <span class="message-count">
                            <?php 
                            $count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM contact_messages");
                            $count = mysqli_fetch_assoc($count_query)['total'];
                            echo $count;
                            ?>
                        </span>
                    </h2>
                    <div style="display: flex; gap: 10px;">
                        <span style="color: #666; font-size: 0.95rem;">
                            <i class="fas fa-circle" style="color: #1565c0;"></i> New: 
                            <?php 
                            $new_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM contact_messages WHERE status = 'new'"))['count'];
                            echo $new_count;
                            ?>
                        </span>
                        <span style="color: #666; font-size: 0.95rem;">
                            <i class="fas fa-circle" style="color: #2e7d32;"></i> Read: 
                            <?php 
                            $read_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM contact_messages WHERE status = 'read'"))['count'];
                            echo $read_count;
                            ?>
                        </span>
                    </div>
                </div>
                
                <div class="table-scroll-container">
                    <?php
                    $messages_result = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY 
                        CASE WHEN status = 'new' THEN 0 ELSE 1 END,
                        created_at DESC");
                    ?>
                    
                    <table class="contact-messages-table">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th width="200">Contact Information</th>
                                <th width="120">Service</th>
                                <th width="300">Message Preview</th>
                                <th width="160">Date & Time</th>
                                <th width="120">Status</th>
                                <th width="200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($messages_result) > 0): ?>
                                <?php while ($message = mysqli_fetch_assoc($messages_result)): ?>
                                <tr data-message-id="<?php echo $message['id']; ?>">
                                    <td>
                                        <strong style="color: #2c2b29;">#<?php echo str_pad($message['id'], 4, '0', STR_PAD_LEFT); ?></strong>
                                    </td>
                                    <td>
                                        <div class="contact-info">
                                            <div class="contact-name"><?php echo htmlspecialchars($message['name']); ?></div>
                                            <div class="contact-email">
                                                <a href="mailto:<?php echo htmlspecialchars($message['email']); ?>" title="Send email">
                                                    <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($message['email']); ?>
                                                </a>
                                            </div>
                                            <?php if (!empty($message['phone'])): ?>
                                            <div class="contact-phone">
                                                <a href="tel:<?php echo htmlspecialchars($message['phone']); ?>" title="Call">
                                                    <i class="fas fa-phone"></i> <?php echo htmlspecialchars($message['phone']); ?>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="service-tag" title="<?php echo htmlspecialchars($message['service'] ?: 'Not specified'); ?>">
                                            <?php echo htmlspecialchars($message['service'] ?: 'Not specified'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="message-preview" title="Click View to read full message">
                                            <div class="message-preview-content">
                                                <?php echo htmlspecialchars($message['message']); ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="message-date">
                                        <div class="date"><?php echo date('M d, Y', strtotime($message['created_at'])); ?></div>
                                        <div class="time"><?php echo date('h:i A', strtotime($message['created_at'])); ?></div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-<?php echo $message['status']; ?>">
                                            <i class="fas fa-<?php echo $message['status'] == 'new' ? 'clock' : 'check-circle'; ?>"></i>
                                            <?php echo ucfirst($message['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="contact-actions">
                                            <button onclick="viewMessage(<?php echo $message['id']; ?>)" 
                                                    class="contact-action-btn view" title="View full message">
                                                <i class="fas fa-eye"></i> View Message
                                            </button>
                                            <a href="mailto:<?php echo htmlspecialchars($message['email']); ?>" 
                                            class="contact-action-btn reply" target="_blank" title="Reply via email">
                                                <i class="fas fa-reply"></i> Reply via Email
                                            </a>
                                            <a href="?tab=contact_messages&delete=<?php echo $message['id']; ?>" 
                                            class="contact-action-btn delete" 
                                            onclick="return confirm('Are you sure you want to delete this message?')"
                                            title="Delete message">
                                                <i class="fas fa-trash"></i> Delete Message
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state" style="padding: 40px;">
                                            <i class="fas fa-inbox" style="font-size: 3.5rem; color: #eeb82e; margin-bottom: 15px;"></i>
                                            <h3 style="color: #2c2b29; margin-bottom: 10px;">No Messages Yet</h3>
                                            <p style="color: #666; max-width: 500px; margin: 0 auto;">
                                                All contact form submissions will appear here. Check back later for new messages.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <?php if (mysqli_num_rows($messages_result) > 0): ?>
                <div style="padding: 15px 20px; background: #f8f9fa; border-top: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
                    <div style="color: #666; font-size: 0.9rem;">
                        Showing <?php echo mysqli_num_rows($messages_result); ?> message(s)
                    </div>
                    <div>
                        <button onclick="markAllAsRead()" class="admin-btn" style="background: #6c757d; font-size: 0.9rem;">
                            <i class="fas fa-check-double"></i> Mark All as Read
                        </button>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Quick Instructions -->
        <div class="sales-table" style="margin-top: 20px;">
            <div class="table-header">
                <h2><i class="fas fa-info-circle"></i> Quick Instructions</h2>
            </div>
            <div style="padding: 20px;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div>
                        <h4 style="color: #2c2b29; margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-history" style="color: #eeb82e;"></i> Past Sales
                        </h4>
                        <p style="color: #666; line-height: 1.6;">
                            Manage your past sales records. Add, edit, or delete sales with images, categories, and prices.
                        </p>
                    </div>
                    <div>
                        <h4 style="color: #2c2b29; margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-home" style="color: #eeb82e;"></i> Affiliated Houses
                        </h4>
                        <p style="color: #666; line-height: 1.6;">
                            Manage property developer partners. Add logos, descriptions, and set display order.
                        </p>
                    </div>
                    <div>
                        <h4 style="color: #2c2b29; margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-university" style="color: #eeb82e;"></i> Affiliated Banks
                        </h4>
                        <p style="color: #666; line-height: 1.6;">
                            Manage bank partners. Upload bank logos and control their display order on the website.
                        </p>
                    </div>
                    <div>
                        <h4 style="color: #2c2b29; margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-car" style="color: #eeb82e;"></i> Car Companies
                        </h4>
                        <p style="color: #666; line-height: 1.6;">
                            Manage car brand partners. Add car company logos and set their display priority.
                        </p>
                    </div>
                    <div>
                        <h4 style="color: #2c2b29; margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-users" style="color: #eeb82e;"></i> Team Members
                        </h4>
                        <p style="color: #666; line-height: 1.6;">
                            Manage team members. Add team member and set their display priority.
                        </p>
                    </div>
                    <div>
                        <h4 style="color: #2c2b29; margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-award" style="color: #eeb82e;"></i> Awards & Recognition
                        </h4>
                        <p style="color: #666; line-height: 1.6;">
                            Manage awards, certificates, and recognition received by your company. Upload award images and backgrounds.
                        </p>
                    </div>
                    <div>
                        <h4 style="color: #2c2b29; margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-envelope" style="color: #eeb82e;"></i> Contact Messages
                        </h4>
                        <p style="color: #666; line-height: 1.6;">
                            Manage all incoming contact form submissions. View, reply to, or delete messages. Use the "View Message" button to see full details and automatically mark messages as read.
                        </p>
                        <ul style="color: #666; font-size: 0.9rem; margin-top: 8px; padding-left: 20px;">
                            <li><span style="color: #1565c0;">●</span> Blue dot: New/unread messages</li>
                            <li><span style="color: #2e7d32;">●</span> Green dot: Read messages</li>
                            <li>Hover over message preview to see more content</li>
                            <li>Click "Reply via Email" to respond quickly</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Message View Modal -->
    <div id="messageModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-envelope"></i> Message Details</h2>
                <button type="button" class="close-modal" onclick="closeModal()">&times;</button>
            </div>
            
            <div id="modalMessageContent">
                <!-- Content will be loaded via AJAX -->
            </div>
        </div>
    </div>
    
    <script>
        // Form toggle function
        function toggleAddForm(tabName) {
            const formContainer = document.getElementById(`${tabName}_form`);
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

        // I-update ang viewMessage function para mas maganda ang modal:
        function viewMessage(messageId) {
            // Show loading state
            document.getElementById('modalMessageContent').innerHTML = `
                <div style="text-align: center; padding: 60px 40px;">
                    <i class="fas fa-spinner fa-spin" style="font-size: 2.5rem; color: #eeb82e;"></i>
                    <p style="margin-top: 20px; color: #666; font-size: 1.1rem;">Loading message details...</p>
                </div>
            `;
            
            // Show modal and disable body scroll
            document.getElementById('messageModal').style.display = 'block';
            document.body.classList.add('no-scroll');
            
            // Fetch message details via AJAX
            fetch(`get_message.php?id=${messageId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const message = data.message;
                        
                        // Format the date
                        const date = new Date(message.created_at);
                        const formattedDate = date.toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                        
                        // Create beautiful modal content
                        document.getElementById('modalMessageContent').innerHTML = `
                            <div style="background: linear-gradient(135deg, #2c2b29 0%, #3a3937 100%); 
                                        color: white; padding: 25px; border-radius: 10px; margin-bottom: 25px;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                    <h3 style="margin: 0; color: white; font-size: 1.4rem;">
                                        <i class="fas fa-user-circle"></i> ${escapeHtml(message.name)}
                                    </h3>
                                    <span style="
                                        background: ${message.status == 'new' ? '#17a2b8' : '#28a745'};
                                        color: white;
                                        padding: 6px 15px;
                                        border-radius: 20px;
                                        font-size: 0.9rem;
                                        font-weight: 600;
                                    ">
                                        <i class="fas fa-${message.status == 'new' ? 'clock' : 'check-circle'}"></i>
                                        ${message.status.toUpperCase()}
                                    </span>
                                </div>
                                
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                                    <div>
                                        <div style="font-size: 0.9rem; color: rgba(255,255,255,0.8); margin-bottom: 5px;">
                                            <i class="fas fa-envelope"></i> Email
                                        </div>
                                        <div style="font-size: 1.1rem;">
                                            <a href="mailto:${escapeHtml(message.email)}" 
                                            style="color: #ffd95e; text-decoration: none;">
                                                ${escapeHtml(message.email)}
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <div style="font-size: 0.9rem; color: rgba(255,255,255,0.8); margin-bottom: 5px;">
                                            <i class="fas fa-phone"></i> Phone
                                        </div>
                                        <div style="font-size: 1.1rem;">
                                            ${message.phone ? 
                                                `<a href="tel:${escapeHtml(message.phone)}" 
                                                style="color: #ffd95e; text-decoration: none;">
                                                    <i class="fas fa-phone-alt"></i> ${escapeHtml(message.phone)}
                                                </a>` : 
                                                '<span style="color: rgba(255,255,255,0.6);">Not provided</span>'}
                                        </div>
                                    </div>
                                </div>
                                
                                <div style="margin-top: 15px;">
                                    <div style="font-size: 0.9rem; color: rgba(255,255,255,0.8); margin-bottom: 5px;">
                                        <i class="fas fa-calendar"></i> Date Received
                                    </div>
                                    <div style="font-size: 1.1rem;">
                                        <i class="far fa-clock"></i> ${formattedDate}
                                    </div>
                                </div>
                            </div>
                            
                            <div style="background: #fff8e1; padding: 20px; border-radius: 10px; border-left: 4px solid #eeb82e; margin-bottom: 20px;">
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                    <i class="fas fa-briefcase" style="color: #eeb82e; font-size: 1.2rem;"></i>
                                    <div>
                                        <div style="font-size: 0.9rem; color: #666; margin-bottom: 5px;">Service Interested In</div>
                                        <div style="font-size: 1.1rem; font-weight: 600; color: #2c2b29;">
                                            ${escapeHtml(message.service || 'General Inquiry')}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div style="margin-bottom: 30px;">
                                <h4 style="color: #2c2b29; margin-bottom: 15px; padding-bottom: 10px; 
                                        border-bottom: 2px solid #eeb82e; display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-comment-dots" style="color: #eeb82e;"></i>
                                    Message Content
                                </h4>
                                <div style="
                                    background: #f8f9fa;
                                    padding: 25px;
                                    border-radius: 10px;
                                    line-height: 1.8;
                                    white-space: pre-wrap;
                                    font-size: 1.1rem;
                                    color: #444;
                                    max-height: 300px;
                                    overflow-y: auto;
                                    box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
                                ">
                                    ${escapeHtml(message.message).replace(/\n/g, '<br>')}
                                </div>
                            </div>
                            
                            <div style="display: flex; gap: 15px; justify-content: flex-end; border-top: 1px solid #eee; padding-top: 20px;">
                                <a href="mailto:${escapeHtml(message.email)}?subject=Re: Your inquiry about ${escapeHtml(message.service || 'our services')}&body=Dear ${escapeHtml(message.name)},%0D%0A%0D%0AThank you for contacting us.%0D%0A%0D%0ARegarding your message:%0D%0A${encodeURIComponent(message.message.substring(0, 200))}...%0D%0A%0D%0ABest regards,%0D%0A[Your Name]%0D%0AHope Account Specialist" 
                                class="admin-btn" target="_blank" style="background: #28a745;">
                                    <i class="fas fa-reply"></i> Reply with Template
                                </a>
                                
                                <a href="mailto:${escapeHtml(message.email)}" 
                                class="admin-btn" target="_blank">
                                    <i class="fas fa-envelope"></i> Compose New Email
                                </a>
                                
                                <button onclick="deleteMessage(${message.id})" class="admin-btn" style="background: #dc3545;">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        `;
                        
                        // Mark as read automatically when viewed
                        if (message.status === 'new') {
                            markMessageAsRead(message.id);
                        }
                    } else {
                        document.getElementById('modalMessageContent').innerHTML = `
                            <div style="text-align: center; padding: 60px 40px; color: #dc3545;">
                                <i class="fas fa-exclamation-triangle" style="font-size: 3rem; margin-bottom: 20px;"></i>
                                <h3 style="margin-bottom: 15px;">Error Loading Message</h3>
                                <p style="margin-bottom: 25px; color: #666;">${data.error || 'Unable to load message details'}</p>
                                <button onclick="closeModal()" class="admin-btn" style="width: auto;">
                                    <i class="fas fa-times"></i> Close
                                </button>
                            </div>
                        `;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('modalMessageContent').innerHTML = `
                        <div style="text-align: center; padding: 60px 40px; color: #dc3545;">
                            <i class="fas fa-exclamation-triangle" style="font-size: 3rem; margin-bottom: 20px;"></i>
                            <h3 style="margin-bottom: 15px;">Network Error</h3>
                            <p style="margin-bottom: 25px; color: #666;">Please check your internet connection and try again.</p>
                            <button onclick="closeModal()" class="admin-btn" style="width: auto;">
                                <i class="fas fa-times"></i> Close
                            </button>
                        </div>
                    `;
                });
        }

        // Helper function to escape HTML
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // Function to mark message as read
        function markMessageAsRead(messageId) {
            fetch(`mark_as_read.php?id=${messageId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update status in the table
                        const statusSpan = document.querySelector(`tr[data-message-id="${messageId}"] .status-badge`);
                        if (statusSpan) {
                            statusSpan.className = 'status-badge status-read';
                            statusSpan.innerHTML = '<i class="fas fa-check-circle"></i> Read';
                        }
                        
                        // Update new count
                        const newCountElement = document.querySelector('span[style*="color: #1565c0"]');
                        if (newCountElement) {
                            const newCount = parseInt(newCountElement.nextSibling.textContent.trim());
                            if (newCount > 0) {
                                newCountElement.nextSibling.textContent = newCount - 1;
                            }
                        }
                    }
                });
        }

        // Function to delete message
        function deleteMessage(messageId) {
            if (confirm('Are you sure you want to delete this message?')) {
                window.location.href = `?tab=contact_messages&delete=${messageId}`;
            }
        }

        // Function to close modal
        function closeModal() {
            document.getElementById('messageModal').style.display = 'none';
            document.body.classList.remove('no-scroll');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('messageModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });

        // Function to mark all messages as read
        function markAllAsRead() {
            if (confirm('Mark all unread messages as read?')) {
                fetch('mark_all_read.php')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update all status badges
                            document.querySelectorAll('.status-new').forEach(badge => {
                                badge.className = 'status-badge status-read';
                                badge.innerHTML = '<i class="fas fa-check-circle"></i> Read';
                            });
                            
                            // Update new count
                            const newCountElement = document.querySelector('span[style*="color: #1565c0"]');
                            if (newCountElement) {
                                newCountElement.nextSibling.textContent = '0';
                            }
                            
                            alert('All messages marked as read!');
                        } else {
                            alert('Error: ' + data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error marking messages as read');
                    });
            }
        }
    </script>
</body>
</html>