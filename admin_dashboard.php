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
        case 'team_members':
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
        :root {
            /* Gold & Black Theme */
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
            
            --accent-amber: #FFB347;
            --accent-bronze: #CD7F32;
            
            --success-color: #00C851;
            --warning-color: #FFBB33;
            --danger-color: #FF4444;
            
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
            background-color: var(--black-primary);
            min-height: 100vh;
            color: var(--text-light);
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(255, 215, 0, 0.03) 0%, transparent 20%),
                radial-gradient(circle at 90% 70%, rgba(255, 215, 0, 0.03) 0%, transparent 20%);
        }
        
        .admin-header {
            background: var(--black-gradient);
            color: var(--gold-primary);
            padding: 20px 30px;
            box-shadow: var(--shadow-lg);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 2px solid var(--gold-dark);
        }
        
        .admin-header-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .admin-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: -0.025em;
            color: var(--gold-primary);
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
        }
        
        .admin-header h1 i {
            color: var(--gold-primary);
        }
        
        .admin-actions {
            display: flex;
            gap: 16px;
            align-items: center;
        }
        
        .admin-btn {
            background: var(--gold-gradient);
            color: var(--black-dark);
            border: none;
            padding: 12px 24px;
            border-radius: var(--radius-sm);
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.95rem;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 215, 0, 0.5);
        }
        
        .admin-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-gold);
            background: linear-gradient(135deg, #FFE55C 0%, #DAA520 100%);
        }
        
        .admin-btn.logout {
            background: linear-gradient(135deg, #FF4444 0%, #CC0000 100%);
            color: white;
            border: 1px solid rgba(255, 68, 68, 0.5);
        }
        
        .admin-btn.logout:hover {
            background: linear-gradient(135deg, #FF5E5E 0%, #E60000 100%);
        }
        
        .admin-container {
            max-width: 1400px;
            margin: 30px auto;
            padding: 0 24px;
        }
        
        /* Tab Navigation - Gold & Black */
        .tab-navigation-modern {
            background: var(--black-light);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            margin-bottom: 30px;
            border: var(--border-gold);
            background: var(--black-gradient);
        }
        
        .tab-container {
            display: flex;
            justify-content: center;
            padding: 0 20px;
            position: relative;
        }
        
        .tab-scroll-wrapper {
            width: 100%;
            max-width: 1200px;
            overflow-x: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
            scroll-behavior: smooth;
        }
        
        .tab-scroll-wrapper::-webkit-scrollbar {
            display: none;
        }
        
        .tab-nav {
            display: flex;
            justify-content: space-between;
            gap: 4px;
            padding: 12px 0;
            min-width: min-content;
            width: 100%;
        }
        
        .tab-item {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 16px;
            flex: 1;
            min-width: 120px;
            max-width: 160px;
            background: transparent;
            border: none;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: var(--radius);
            color: var(--text-muted);
            gap: 10px;
            user-select: none;
            text-align: center;
        }
        
        .tab-item:hover {
            background: rgba(255, 215, 0, 0.1);
            color: var(--gold-primary);
            transform: translateY(-3px);
            box-shadow: var(--shadow-gold);
        }
        
        .tab-item.active {
            background: var(--gold-gradient);
            color: var(--black-dark);
            box-shadow: var(--shadow-gold);
            transform: translateY(-3px);
        }
        
        .tab-icon {
            font-size: 1.5rem;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-sm);
            transition: all 0.3s ease;
            margin: 0 auto;
        }
        
        .tab-item.active .tab-icon {
            color: var(--black-dark);
        }
        
        .tab-label {
            font-size: 0.95rem;
            font-weight: 600;
            white-space: nowrap;
            letter-spacing: 0.01em;
            display: block;
            width: 100%;
            text-align: center;
        }
        
        .tab-item.active .tab-label {
            color: var(--black-dark);
            font-weight: 700;
        }
        
        .tab-indicator {
            position: absolute;
            bottom: 8px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 30px;
            height: 4px;
            background: var(--gold-primary);
            border-radius: 2px;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .tab-item.active .tab-indicator {
            background: var(--black-dark);
            transform: translateX(-50%) scaleX(1);
        }
        
        /* Dashboard Cards - Gold & Black Theme */
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--black-gradient);
            border-radius: var(--radius);
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
            border: var(--border-gold);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-gold);
            border-color: var(--gold-primary);
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--black-dark);
        }

        .stat-icon.sales { background: var(--gold-gradient); }
        .stat-icon.houses { background: var(--gold-gradient); }
        .stat-icon.banks { background: var(--gold-gradient); }
        .stat-icon.cars { background: var(--gold-gradient); }
        .stat-icon.team { background: var(--gold-gradient); }
        .stat-icon.awards { background: var(--gold-gradient); }
        .stat-icon.messages { background: var(--gold-gradient); }

        .stat-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gold-primary);
            margin-bottom: 4px;
            text-shadow: 0 0 5px rgba(255, 215, 0, 0.3);
        }

        .stat-content p {
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        /* Modern Table Styles - Gold & Black */
        .modern-table {
            background: var(--black-gradient);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: var(--border-gold);
        }
        
        .table-header-modern {
            padding: 24px;
            border-bottom: var(--border-gold);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--black-gradient-light);
        }
        
        .table-header-modern h2 {
            color: var(--gold-primary);
            font-size: 1.4rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .table-header-modern h2 i {
            color: var(--gold-primary);
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }
        
        thead {
            background: var(--black-soft);
        }
        
        th {
            padding: 16px 20px;
            text-align: left;
            font-weight: 600;
            color: var(--gold-primary);
            border-bottom: 2px solid var(--gold-dark);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            white-space: nowrap;
        }
        
        td {
            padding: 16px 20px;
            border-bottom: var(--border-black);
            vertical-align: middle;
            color: var(--text-dark);
        }
        
        tbody tr {
            transition: background-color 0.2s ease;
        }
        
        tbody tr:hover {
            background: rgba(255, 215, 0, 0.05);
        }
        
        /* Modern Thumbnails */
        .thumbnail-modern {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: var(--radius-sm);
            border: 2px solid var(--gold-dark);
            transition: transform 0.3s ease, border-color 0.3s ease;
        }
        
        .thumbnail-modern:hover {
            transform: scale(1.05);
            border-color: var(--gold-primary);
            box-shadow: var(--shadow-gold);
        }
        
        .thumbnail-modern.small {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }
        
        .thumbnail-modern.logo {
            width: 80px;
            height: 60px;
            object-fit: contain;
            background: white;
            padding: 8px;
            border: 1px solid var(--gold-dark);
        }
        
        /* Modern Action Buttons - Gold & Black */
        .action-buttons-modern {
            display: flex;
            gap: 8px;
        }
        
        .btn-modern {
            padding: 8px 16px;
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            font-size: 0.875rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-edit-modern {
            background: var(--gold-gradient);
            color: var(--black-dark);
            border: 1px solid var(--gold-primary);
        }
        
        .btn-delete-modern {
            background: linear-gradient(135deg, #FF4444 0%, #CC0000 100%);
            color: white;
            border: 1px solid rgba(255, 68, 68, 0.5);
        }
        
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-gold);
        }
        
        /* Modern Form Styles - Gold & Black */
        .add-form-modern {
            background: var(--black-gradient);
            padding: 32px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            margin-bottom: 30px;
            display: none;
            border: var(--border-gold);
        }
        
        .add-form-modern.active {
            display: block;
            animation: slideDown 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .form-header {
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid var(--gold-dark);
        }
        
        .form-header h3 {
            color: var(--gold-primary);
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }
        
        .form-group-modern {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .form-group-modern label {
            color: var(--gold-light);
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .form-control {
            padding: 12px 16px;
            border: 1px solid var(--gold-dark);
            border-radius: var(--radius-sm);
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--black-soft);
            color: var(--text-light);
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2);
            background: var(--black-light);
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        select.form-control option {
            background: var(--black-light);
            color: var(--text-light);
        }
        
        .form-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            padding-top: 20px;
            border-top: var(--border-gold);
        }
        
        /* Status Badges */
        .status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            letter-spacing: 0.05em;
        }
        
        .status-active {
            background: rgba(0, 200, 81, 0.2);
            color: #00E676;
            border: 1px solid rgba(0, 200, 81, 0.3);
        }
        
        .status-inactive {
            background: rgba(255, 68, 68, 0.2);
            color: #FF6B6B;
            border: 1px solid rgba(255, 68, 68, 0.3);
        }
        
        .status-new {
            background: rgba(255, 215, 0, 0.2);
            color: var(--gold-primary);
            border: 1px solid rgba(255, 215, 0, 0.3);
        }
        
        .status-read {
            background: rgba(0, 200, 81, 0.2);
            color: #00E676;
            border: 1px solid rgba(0, 200, 81, 0.3);
        }
        
        /* Empty State */
        .empty-state-modern {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-muted);
        }
        
        .empty-icon {
            font-size: 3.5rem;
            color: var(--gold-dark);
            margin-bottom: 16px;
            opacity: 0.6;
        }
        
        .empty-state-modern h3 {
            color: var(--gold-primary);
            margin-bottom: 8px;
            font-size: 1.3rem;
        }
        
        .empty-state-modern p {
            max-width: 400px;
            margin: 0 auto;
            line-height: 1.6;
            color: var(--text-muted);
        }
        
        /* Modern Alert */
        .alert-modern {
            padding: 16px 20px;
            border-radius: var(--radius);
            margin-bottom: 24px;
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
        
        /* Modern Modal - Gold & Black */
        .modal-modern {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(8px);
            animation: fadeIn 0.3s ease;
        }
        
        .modal-content-modern {
            background: var(--black-gradient);
            margin: 5% auto;
            padding: 0;
            border-radius: var(--radius-lg);
            width: 90%;
            max-width: 800px;
            max-height: 85vh;
            overflow: hidden;
            box-shadow: var(--shadow-lg), var(--shadow-gold);
            animation: slideUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: var(--border-gold);
        }
        
        .modal-header-modern {
            padding: 24px;
            border-bottom: var(--border-gold);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--black-gradient-light);
        }
        
        .modal-header-modern h2 {
            color: var(--gold-primary);
        }
        
        .modal-header-modern button {
            color: var(--text-muted) !important;
        }
        
        .modal-header-modern button:hover {
            color: var(--gold-primary) !important;
        }
        
        .modal-body {
            padding: 24px;
            overflow-y: auto;
            max-height: calc(85vh - 140px);
            color: var(--text-dark);
        }
        
        /* Message Preview */
        .message-preview-modern {
            max-width: 300px;
            line-height: 1.5;
            color: var(--text-muted);
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
        
        /* Contact Info */
        .contact-info-modern {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        
        .contact-name {
            font-weight: 600;
            color: var(--gold-primary);
        }
        
        .contact-email, .contact-phone {
            font-size: 0.875rem;
            color: var(--text-muted);
        }
        
        .contact-email a, .contact-phone a {
            color: var(--text-light);
            text-decoration: none;
        }
        
        .contact-email a:hover, .contact-phone a:hover {
            color: var(--gold-primary);
        }
        
        /* Quick Guide Section */
        .quick-guide {
            background: var(--black-gradient);
            border: var(--border-gold);
        }
        
        .quick-guide h4 {
            color: var(--gold-primary) !important;
        }
        
        .quick-guide p {
            color: var(--text-muted) !important;
        }
        
        /* Links */
        a {
            color: var(--gold-primary);
            transition: color 0.3s ease;
        }
        
        a:hover {
            color: var(--gold-light);
        }
        
        /* Category Tags */
        .category-tag {
            background: rgba(255, 215, 0, 0.1);
            color: var(--gold-primary);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            border: 1px solid var(--gold-dark);
        }
        
        /* Year Badge */
        .year-badge {
            background: var(--gold-gradient);
            color: var(--black-dark);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-block;
        }
        
        /* Animations */
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
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
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
            0% {
                box-shadow: 0 0 5px rgba(255, 215, 0, 0.2);
            }
            50% {
                box-shadow: 0 0 20px rgba(255, 215, 0, 0.4);
            }
            100% {
                box-shadow: 0 0 5px rgba(255, 215, 0, 0.2);
            }
        }
        
        /* Scrollbar Styling - Gold & Black */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
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
        
        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .tab-nav {
                justify-content: flex-start;
                gap: 8px;
                padding: 12px 16px;
            }
            
            .tab-item {
                min-width: 110px;
                padding: 18px 12px;
            }
        }
        
        @media (max-width: 1024px) {
            .dashboard-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .admin-header-content {
                flex-direction: column;
                gap: 16px;
                text-align: center;
            }
            
            .admin-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .dashboard-stats {
                grid-template-columns: 1fr;
            }
            
            .tab-item {
                min-width: 90px;
                padding: 16px 8px;
            }
            
            .modal-content-modern {
                width: 95%;
                margin: 20px auto;
            }
        }
        
        @media (max-width: 640px) {
            .admin-container {
                padding: 0 16px;
            }
            
            .table-header-modern {
                flex-direction: column;
                gap: 16px;
                text-align: center;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn-modern {
                width: 100%;
                justify-content: center;
            }
            
            .action-buttons-modern {
                flex-direction: column;
            }
            
            .tab-item {
                min-width: 80px;
                padding: 14px 6px;
            }
        }
        
        @media (max-width: 480px) {
            .tab-label {
                display: none;
            }
            
            .tab-item {
                min-width: 70px;
                padding: 12px 4px;
            }
            
            .tab-icon {
                width: 32px;
                height: 32px;
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <!-- Modern Header - Gold & Black -->
    <header class="admin-header">
        <div class="admin-header-content">
            <h1>
                <img src="img/logo.png" alt="Hope Account Specialist" style="height: 40px; width: auto; margin-right: 10px;">
                Admin Dashboard
            </h1>
            <div class="admin-actions">
                <a href="index.php" class="admin-btn" target="_blank">
                    <i class="fas fa-external-link-alt"></i> View Site
                </a>
                <a href="?logout" class="admin-btn logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </header>
    
    <div class="admin-container">
        <?php if (isset($success)): ?>
            <div class="alert-modern alert-success">
                <i class="fas fa-check-circle"></i>
                <span><?php echo $success; ?></span>
            </div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="alert-modern alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <span><?php echo $error; ?></span>
            </div>
        <?php endif; ?>
        
        <!-- Dashboard Stats - Gold & Black -->
        <div class="dashboard-stats">
            <?php
            // Get counts for ALL stats
            $sales_count = mysqli_num_rows($past_sales_result);
            $houses_count = mysqli_num_rows($affiliated_houses_result);
            $banks_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM affiliated_banks"))['count'];
            $cars_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM affiliated_cars"))['count'];
            $team_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM team_members"))['count'];
            $awards_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM awards"))['count'];
            $messages_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM contact_messages"))['count'];
            ?>
            
            <div class="stat-card">
                <div class="stat-icon sales">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $sales_count; ?></h3>
                    <p>Past Sales</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon houses">
                    <i class="fas fa-building"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $houses_count; ?></h3>
                    <p>Affiliated Houses</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon banks">
                    <i class="fas fa-university"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $banks_count; ?></h3>
                    <p>Affiliated Banks</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon cars">
                    <i class="fas fa-car"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $cars_count; ?></h3>
                    <p>Car Companies</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon team">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $team_count; ?></h3>
                    <p>Team Members</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon awards">
                    <i class="fas fa-award"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $awards_count; ?></h3>
                    <p>Awards</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon messages">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $messages_count; ?></h3>
                    <p>Contact Messages</p>
                </div>
            </div>
        </div>
        
        <!-- Modern Tab Navigation - Gold & Black -->
        <div class="tab-navigation-modern">
            <div class="tab-container">
                <div class="tab-scroll-wrapper">
                    <nav class="tab-nav">
                        <a href="?tab=past_sales" class="tab-item <?php echo $active_tab == 'past_sales' ? 'active' : ''; ?>">
                            <div class="tab-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <span class="tab-label">Sales</span>
                            <div class="tab-indicator"></div>
                        </a>
                        
                        <a href="?tab=affiliated_houses" class="tab-item <?php echo $active_tab == 'affiliated_houses' ? 'active' : ''; ?>">
                            <div class="tab-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <span class="tab-label">Houses</span>
                            <div class="tab-indicator"></div>
                        </a>
                        
                        <a href="?tab=affiliated_banks" class="tab-item <?php echo $active_tab == 'affiliated_banks' ? 'active' : ''; ?>">
                            <div class="tab-icon">
                                <i class="fas fa-university"></i>
                            </div>
                            <span class="tab-label">Banks</span>
                            <div class="tab-indicator"></div>
                        </a>
                        
                        <a href="?tab=affiliated_cars" class="tab-item <?php echo $active_tab == 'affiliated_cars' ? 'active' : ''; ?>">
                            <div class="tab-icon">
                                <i class="fas fa-car"></i>
                            </div>
                            <span class="tab-label">Cars</span>
                            <div class="tab-indicator"></div>
                        </a>
                        
                        <a href="?tab=team_members" class="tab-item <?php echo $active_tab == 'team_members' ? 'active' : ''; ?>">
                            <div class="tab-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <span class="tab-label">Team</span>
                            <div class="tab-indicator"></div>
                        </a>
                        
                        <a href="?tab=awards" class="tab-item <?php echo $active_tab == 'awards' ? 'active' : ''; ?>">
                            <div class="tab-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <span class="tab-label">Awards</span>
                            <div class="tab-indicator"></div>
                        </a>
                        
                        <a href="?tab=contact_messages" class="tab-item <?php echo $active_tab == 'contact_messages' ? 'active' : ''; ?>">
                            <div class="tab-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <span class="tab-label">Messages</span>
                            <div class="tab-indicator"></div>
                        </a>
                    </nav>
                </div>
            </div>
            
            <!-- Past Sales Tab -->
            <div id="past_sales" class="tab-content <?php echo $active_tab == 'past_sales' ? 'active' : ''; ?>" style="<?php echo $active_tab != 'past_sales' ? 'display: none;' : ''; ?>">
                <div class="modern-table">
                    <div class="table-header-modern">
                        <h2><i class="fas fa-history"></i> Past Sales Management</h2>
                        <button onclick="toggleAddForm('past_sales')" class="admin-btn">
                            <i class="fas fa-plus"></i> Add New Sale
                        </button>
                    </div>
                    
                    <div id="past_sales_form" class="add-form-modern">
                        <div class="form-header">
                            <h3><i class="fas fa-plus-circle"></i> Add New Past Sale</h3>
                        </div>
                        <form method="POST" action="admin_save.php" enctype="multipart/form-data">
                            <div class="form-grid">
                                <div class="form-group-modern">
                                    <label for="title">Title *</label>
                                    <input type="text" id="title" name="title" class="form-control" required>
                                </div>
                                <div class="form-group-modern">
                                    <label for="category">Category *</label>
                                    <select id="category" name="category" class="form-control" required>
                                        <option value="vehicle">Vehicle</option>
                                        <option value="land">Land</option>
                                        <option value="property">Property</option>
                                    </select>
                                </div>
                                <div class="form-group-modern">
                                    <label for="sale_date">Sale Date *</label>
                                    <input type="date" id="sale_date" name="sale_date" class="form-control" required>
                                </div>
                                <div class="form-group-modern">
                                    <label for="price">Price (₱)</label>
                                    <input type="number" id="price" name="price" step="0.01" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" rows="3" class="form-control"></textarea>
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="image">Image *</label>
                                <input type="file" id="image" name="image" accept="image/*" class="form-control" required>
                                <small style="color: var(--text-muted); display: block; margin-top: 4px;">Max size: 5MB. Supported: JPG, PNG, GIF</small>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="admin-btn">
                                    <i class="fas fa-save"></i> Save Sale
                                </button>
                                <button type="button" onclick="toggleAddForm('past_sales')" class="admin-btn" style="background: var(--black-soft); color: var(--text-light); border: 1px solid var(--gold-dark);">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="table-container">
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
                                        <td><strong>#<?php echo str_pad($row['id'], 3, '0', STR_PAD_LEFT); ?></strong></td>
                                        <td>
                                            <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['title']; ?>" class="thumbnail-modern" 
                                                 onerror="this.src='https://via.placeholder.com/80x60/1A1A1A/FFD700?text=No+Image'">
                                        </td>
                                        <td><strong style="color: var(--gold-primary);"><?php echo htmlspecialchars($row['title']); ?></strong></td>
                                        <td>
                                            <span class="category-tag">
                                                <?php echo $row['category']; ?>
                                            </span>
                                        </td>
                                        <td><?php echo date('M d, Y', strtotime($row['sale_date'])); ?></td>
                                        <td>
                                            <?php if ($row['price']): ?>
                                                <strong style="color: var(--gold-primary);">₱<?php echo number_format($row['price'], 2); ?></strong>
                                            <?php else: ?>
                                                <span style="color: var(--text-muted);">N/A</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($row['is_active']): ?>
                                                <span class="status-badge status-active">
                                                    <i class="fas fa-check-circle"></i> Active
                                                </span>
                                            <?php else: ?>
                                                <span class="status-badge status-inactive">
                                                    <i class="fas fa-times-circle"></i> Inactive
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="action-buttons-modern">
                                                <a href="admin_edit.php?id=<?php echo $row['id']; ?>&tab=past_sales" class="btn-modern btn-edit-modern">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="?tab=past_sales&delete=<?php echo $row['id']; ?>" 
                                                   class="btn-modern btn-delete-modern" 
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
                                            <div class="empty-state-modern">
                                                <div class="empty-icon">
                                                    <i class="fas fa-history"></i>
                                                </div>
                                                <h3>No Sales Found</h3>
                                                <p>Add your first sale using the "Add New Sale" button above.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Affiliated Houses Tab -->
            <div id="affiliated_houses" class="tab-content <?php echo $active_tab == 'affiliated_houses' ? 'active' : ''; ?>" style="<?php echo $active_tab != 'affiliated_houses' ? 'display: none;' : ''; ?>">
                <div class="modern-table">
                    <div class="table-header-modern">
                        <h2><i class="fas fa-building"></i> Affiliated Houses Management</h2>
                        <button onclick="toggleAddForm('affiliated_houses')" class="admin-btn">
                            <i class="fas fa-plus"></i> Add New House
                        </button>
                    </div>
                    
                    <div id="affiliated_houses_form" class="add-form-modern">
                        <div class="form-header">
                            <h3><i class="fas fa-plus-circle"></i> Add New Affiliated House</h3>
                        </div>
                        <form method="POST" action="admin_save_affiliated.php" enctype="multipart/form-data">
                            <div class="form-grid">
                                <div class="form-group-modern">
                                    <label for="affiliated_name">Name *</label>
                                    <input type="text" id="affiliated_name" name="name" class="form-control" required>
                                </div>
                                <div class="form-group-modern">
                                    <label for="affiliated_category">Category *</label>
                                    <input type="text" id="affiliated_category" name="category" class="form-control" placeholder="e.g., Luxury Residential, Condominium" required>
                                </div>
                                <div class="form-group-modern">
                                    <label for="affiliated_years">Years Affiliated *</label>
                                    <input type="text" id="affiliated_years" name="years_affiliated" class="form-control" placeholder="e.g., Affiliated since 2018" required>
                                </div>
                                <div class="form-group-modern">
                                    <label for="affiliated_order">Display Order</label>
                                    <input type="number" id="affiliated_order" name="display_order" class="form-control" value="0">
                                </div>
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="affiliated_description">Description *</label>
                                <textarea id="affiliated_description" name="description" rows="3" class="form-control" required></textarea>
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="affiliated_image">Logo/Image *</label>
                                <input type="file" id="affiliated_image" name="image" accept="image/*" class="form-control" required>
                                <small style="color: var(--text-muted); display: block; margin-top: 4px;">Max size: 5MB. Supported: JPG, PNG, GIF</small>
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="affiliated_status">Status</label>
                                <select id="affiliated_status" name="is_active" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="admin-btn">
                                    <i class="fas fa-save"></i> Save House
                                </button>
                                <button type="button" onclick="toggleAddForm('affiliated_houses')" class="admin-btn" style="background: var(--black-soft); color: var(--text-light); border: 1px solid var(--gold-dark);">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Years</th>
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
                                        <td><strong>#<?php echo str_pad($affiliated['id'], 3, '0', STR_PAD_LEFT); ?></strong></td>
                                        <td>
                                            <img src="<?php echo $affiliated['image_path']; ?>" alt="<?php echo htmlspecialchars($affiliated['name']); ?>" 
                                                class="thumbnail-modern small"
                                                onerror="this.src='https://via.placeholder.com/60x60/1A1A1A/FFD700?text=No+Logo'">
                                        </td>
                                        <td><strong style="color: var(--gold-primary);"><?php echo htmlspecialchars($affiliated['name']); ?></strong></td>
                                        <td><span class="category-tag"><?php echo htmlspecialchars($affiliated['category']); ?></span></td>
                                        <td style="color: var(--text-light);"><?php echo htmlspecialchars($affiliated['years_affiliated']); ?></td>
                                        <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; color: var(--text-muted);">
                                            <?php echo htmlspecialchars(substr($affiliated['description'], 0, 100)); ?>
                                            <?php if (strlen($affiliated['description']) > 100): ?>...<?php endif; ?>
                                        </td>
                                        <td style="color: var(--gold-primary);"><?php echo $affiliated['display_order']; ?></td>
                                        <td>
                                            <?php if ($affiliated['is_active']): ?>
                                                <span class="status-badge status-active">
                                                    <i class="fas fa-check-circle"></i> Active
                                                </span>
                                            <?php else: ?>
                                                <span class="status-badge status-inactive">
                                                    <i class="fas fa-times-circle"></i> Inactive
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="action-buttons-modern">
                                                <a href="admin_edit_affiliated.php?id=<?php echo $affiliated['id']; ?>&tab=affiliated_houses" class="btn-modern btn-edit-modern">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="?tab=affiliated_houses&delete=<?php echo $affiliated['id']; ?>" 
                                                class="btn-modern btn-delete-modern" 
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
                                            <div class="empty-state-modern">
                                                <div class="empty-icon">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                                <h3>No Houses Found</h3>
                                                <p>Add your first affiliated house using the "Add New House" button above.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Affiliated Banks Tab -->
            <div id="affiliated_banks" class="tab-content <?php echo $active_tab == 'affiliated_banks' ? 'active' : ''; ?>" style="<?php echo $active_tab != 'affiliated_banks' ? 'display: none;' : ''; ?>">
                <div class="modern-table">
                    <div class="table-header-modern">
                        <h2><i class="fas fa-university"></i> Affiliated Banks Management</h2>
                        <button onclick="toggleAddForm('affiliated_banks')" class="admin-btn">
                            <i class="fas fa-plus"></i> Add New Bank
                        </button>
                    </div>
                    
                    <div id="affiliated_banks_form" class="add-form-modern">
                        <div class="form-header">
                            <h3><i class="fas fa-plus-circle"></i> Add New Bank</h3>
                        </div>
                        <form method="POST" action="admin_save_bank.php" enctype="multipart/form-data">
                            <div class="form-grid">
                                <div class="form-group-modern">
                                    <label for="bank_name">Bank Name *</label>
                                    <input type="text" id="bank_name" name="name" class="form-control" required>
                                </div>
                                <div class="form-group-modern">
                                    <label for="bank_order">Display Order</label>
                                    <input type="number" id="bank_order" name="display_order" class="form-control" value="0">
                                </div>
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="bank_logo">Bank Logo *</label>
                                <input type="file" id="bank_logo" name="logo" accept="image/*" class="form-control" required>
                                <small style="color: var(--text-muted); display: block; margin-top: 4px;">Max size: 5MB. Supported: JPG, PNG, GIF, SVG</small>
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="bank_status">Status</label>
                                <select id="bank_status" name="is_active" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="admin-btn">
                                    <i class="fas fa-save"></i> Save Bank
                                </button>
                                <button type="button" onclick="toggleAddForm('affiliated_banks')" class="admin-btn" style="background: var(--black-soft); color: var(--text-light); border: 1px solid var(--gold-dark);">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="table-container">
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
                                        <td><strong>#<?php echo str_pad($bank['id'], 3, '0', STR_PAD_LEFT); ?></strong></td>
                                        <td>
                                            <img src="<?php echo $bank['logo_path']; ?>" alt="<?php echo htmlspecialchars($bank['name']); ?>" 
                                                class="thumbnail-modern logo"
                                                onerror="this.src='https://via.placeholder.com/80x60/1A1A1A/FFD700?text=No+Logo'">
                                        </td>
                                        <td><strong style="color: var(--gold-primary);"><?php echo htmlspecialchars($bank['name']); ?></strong></td>
                                        <td style="color: var(--gold-primary);"><?php echo $bank['display_order']; ?></td>
                                        <td>
                                            <?php if ($bank['is_active']): ?>
                                                <span class="status-badge status-active">
                                                    <i class="fas fa-check-circle"></i> Active
                                                </span>
                                            <?php else: ?>
                                                <span class="status-badge status-inactive">
                                                    <i class="fas fa-times-circle"></i> Inactive
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="action-buttons-modern">
                                                <a href="admin_edit_bank.php?id=<?php echo $bank['id']; ?>&tab=affiliated_banks" class="btn-modern btn-edit-modern">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="?tab=affiliated_banks&delete=<?php echo $bank['id']; ?>" 
                                                class="btn-modern btn-delete-modern" 
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
                                            <div class="empty-state-modern">
                                                <div class="empty-icon">
                                                    <i class="fas fa-university"></i>
                                                </div>
                                                <h3>No Banks Found</h3>
                                                <p>Add your first bank using the "Add New Bank" button above.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Affiliated Cars Tab -->
            <div id="affiliated_cars" class="tab-content <?php echo $active_tab == 'affiliated_cars' ? 'active' : ''; ?>" style="<?php echo $active_tab != 'affiliated_cars' ? 'display: none;' : ''; ?>">
                <div class="modern-table">
                    <div class="table-header-modern">
                        <h2><i class="fas fa-car"></i> Car Companies Management</h2>
                        <button onclick="toggleAddForm('affiliated_cars')" class="admin-btn">
                            <i class="fas fa-plus"></i> Add New Car Company
                        </button>
                    </div>
                    
                    <div id="affiliated_cars_form" class="add-form-modern">
                        <div class="form-header">
                            <h3><i class="fas fa-plus-circle"></i> Add New Car Company</h3>
                        </div>
                        <form method="POST" action="admin_save_car.php" enctype="multipart/form-data">
                            <div class="form-grid">
                                <div class="form-group-modern">
                                    <label for="car_name">Car Company Name *</label>
                                    <input type="text" id="car_name" name="name" class="form-control" required>
                                </div>
                                <div class="form-group-modern">
                                    <label for="car_order">Display Order</label>
                                    <input type="number" id="car_order" name="display_order" class="form-control" value="0">
                                </div>
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="car_logo">Company Logo *</label>
                                <input type="file" id="car_logo" name="logo" accept="image/*" class="form-control" required>
                                <small style="color: var(--text-muted); display: block; margin-top: 4px;">Max size: 5MB. Supported: JPG, PNG, GIF, SVG</small>
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="car_status">Status</label>
                                <select id="car_status" name="is_active" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="admin-btn">
                                    <i class="fas fa-save"></i> Save Car Company
                                </button>
                                <button type="button" onclick="toggleAddForm('affiliated_cars')" class="admin-btn" style="background: var(--black-soft); color: var(--text-light); border: 1px solid var(--gold-dark);">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="table-container">
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
                                        <td><strong>#<?php echo str_pad($car['id'], 3, '0', STR_PAD_LEFT); ?></strong></td>
                                        <td>
                                            <img src="<?php echo $car['logo_path']; ?>" alt="<?php echo htmlspecialchars($car['name']); ?>" 
                                                class="thumbnail-modern logo"
                                                onerror="this.src='https://via.placeholder.com/80x60/1A1A1A/FFD700?text=No+Logo'">
                                        </td>
                                        <td><strong style="color: var(--gold-primary);"><?php echo htmlspecialchars($car['name']); ?></strong></td>
                                        <td style="color: var(--gold-primary);"><?php echo $car['display_order']; ?></td>
                                        <td>
                                            <?php if ($car['is_active']): ?>
                                                <span class="status-badge status-active">
                                                    <i class="fas fa-check-circle"></i> Active
                                                </span>
                                            <?php else: ?>
                                                <span class="status-badge status-inactive">
                                                    <i class="fas fa-times-circle"></i> Inactive
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="action-buttons-modern">
                                                <a href="admin_edit_car.php?id=<?php echo $car['id']; ?>&tab=affiliated_cars" class="btn-modern btn-edit-modern">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="?tab=affiliated_cars&delete=<?php echo $car['id']; ?>" 
                                                class="btn-modern btn-delete-modern" 
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
                                            <div class="empty-state-modern">
                                                <div class="empty-icon">
                                                    <i class="fas fa-car"></i>
                                                </div>
                                                <h3>No Car Companies Found</h3>
                                                <p>Add your first car company using the "Add New Car Company" button above.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Team Members Tab -->
            <div id="team_members" class="tab-content <?php echo $active_tab == 'team_members' ? 'active' : ''; ?>" style="<?php echo $active_tab != 'team_members' ? 'display: none;' : ''; ?>">
                <div class="modern-table">
                    <div class="table-header-modern">
                        <h2><i class="fas fa-users"></i> Team Members Management</h2>
                        <button onclick="toggleAddForm('team_members')" class="admin-btn">
                            <i class="fas fa-plus"></i> Add New Team Member
                        </button>
                    </div>
                    
                    <div id="team_members_form" class="add-form-modern">
                        <div class="form-header">
                            <h3><i class="fas fa-plus-circle"></i> Add New Team Member</h3>
                        </div>
                        <form method="POST" action="admin_save_team.php" enctype="multipart/form-data">
                            <div class="form-grid">
                                <div class="form-group-modern">
                                    <label for="team_name">Name *</label>
                                    <input type="text" id="team_name" name="name" class="form-control" required>
                                </div>
                                <div class="form-group-modern">
                                    <label for="team_position">Position *</label>
                                    <input type="text" id="team_position" name="position" class="form-control" required>
                                </div>
                                <div class="form-group-modern">
                                    <label for="team_category">Category *</label>
                                    <select id="team_category" name="category" class="form-control" required>
                                        <option value="ceo">CEO/Founder</option>
                                        <option value="leadership">Leadership Team</option>
                                        <option value="specialists">Account Specialists</option>
                                        <option value="support">Support Staff</option>
                                    </select>
                                </div>
                                <div class="form-group-modern">
                                    <label for="team_order">Display Order</label>
                                    <input type="number" id="team_order" name="display_order" class="form-control" value="0">
                                </div>
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="team_description">Description/Bio</label>
                                <textarea id="team_description" name="description" rows="3" class="form-control" placeholder="Short bio or description about the team member"></textarea>
                            </div>

                            <div class="form-grid">
                                <div class="form-group-modern">
                                    <label for="team_phone">Phone Number</label>
                                    <input type="text" id="team_phone" name="phone" class="form-control" placeholder="e.g., +63 912 345 6789">
                                </div>
                                <div class="form-group-modern">
                                    <label for="team_email">Email Address</label>
                                    <input type="email" id="team_email" name="email" class="form-control" placeholder="e.g., name@example.com">
                                </div>
                            </div>

                            <div class="form-group-modern">
                                <label for="team_facebook">Facebook Link</label>
                                <input type="url" id="team_facebook" name="facebook_link" class="form-control" placeholder="https://facebook.com/username">
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="team_image">Profile Image *</label>
                                <input type="file" id="team_image" name="image" accept="image/*" class="form-control" required>
                                <small style="color: var(--text-muted); display: block; margin-top: 4px;">Recommended: Square image, 400x400px. Max size: 5MB</small>
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="team_status">Status</label>
                                <select id="team_status" name="is_active" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="admin-btn">
                                    <i class="fas fa-save"></i> Save Team Member
                                </button>
                                <button type="button" onclick="toggleAddForm('team_members')" class="admin-btn" style="background: var(--black-soft); color: var(--text-light); border: 1px solid var(--gold-dark);">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="table-container">
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
                                $team_members_result = mysqli_query($conn, "SELECT * FROM team_members ORDER BY category ASC, display_order ASC, name ASC");
                                
                                if (mysqli_num_rows($team_members_result) > 0): ?>
                                    <?php while ($member = mysqli_fetch_assoc($team_members_result)): ?>
                                    <tr>
                                        <td><strong>#<?php echo str_pad($member['id'], 3, '0', STR_PAD_LEFT); ?></strong></td>
                                        <td>
                                            <img src="<?php echo $member['image_path']; ?>" alt="<?php echo htmlspecialchars($member['name']); ?>" 
                                                class="thumbnail-modern small"
                                                onerror="this.src='https://via.placeholder.com/60x60/1A1A1A/FFD700?text=No+Image'">
                                        </td>
                                        <td><strong style="color: var(--gold-primary);"><?php echo htmlspecialchars($member['name']); ?></strong></td>
                                        <td style="color: var(--text-light);"><?php echo htmlspecialchars($member['position']); ?></td>
                                        <td>
                                            <?php if (!empty($member['phone'])): ?>
                                                <a href="tel:<?php echo htmlspecialchars($member['phone']); ?>" 
                                                style="color: var(--gold-primary); text-decoration: none; font-size: 0.875rem;">
                                                    <i class="fas fa-phone"></i> <?php echo htmlspecialchars($member['phone']); ?>
                                                </a>
                                            <?php else: ?>
                                                <span style="color: var(--text-muted); font-size: 0.875rem;">N/A</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($member['email'])): ?>
                                                <a href="mailto:<?php echo htmlspecialchars($member['email']); ?>" 
                                                style="color: var(--gold-primary); text-decoration: none; font-size: 0.875rem;">
                                                    <i class="fas fa-envelope"></i> View Email
                                                </a>
                                            <?php else: ?>
                                                <span style="color: var(--text-muted); font-size: 0.875rem;">N/A</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="category-tag">
                                                <?php 
                                                $category_labels = [
                                                    'ceo' => 'CEO',
                                                    'leadership' => 'Leadership',
                                                    'specialists' => 'Specialist',
                                                    'support' => 'Support'
                                                ];
                                                echo $category_labels[$member['category']] ?? $member['category'];
                                                ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if ($member['is_active']): ?>
                                                <span class="status-badge status-active">
                                                    <i class="fas fa-check-circle"></i> Active
                                                </span>
                                            <?php else: ?>
                                                <span class="status-badge status-inactive">
                                                    <i class="fas fa-times-circle"></i> Inactive
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="action-buttons-modern">
                                                <a href="admin_edit_team.php?id=<?php echo $member['id']; ?>&tab=team_members" class="btn-modern btn-edit-modern">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="?tab=team_members&delete=<?php echo $member['id']; ?>" 
                                                class="btn-modern btn-delete-modern" 
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
                                            <div class="empty-state-modern">
                                                <div class="empty-icon">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                                <h3>No Team Members Found</h3>
                                                <p>Add your first team member using the "Add New Team Member" button above.</p>
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
            <div id="awards" class="tab-content <?php echo $active_tab == 'awards' ? 'active' : ''; ?>" style="<?php echo $active_tab != 'awards' ? 'display: none;' : ''; ?>">
                <div class="modern-table">
                    <div class="table-header-modern">
                        <h2><i class="fas fa-award"></i> Awards Management</h2>
                        <button onclick="toggleAddForm('awards')" class="admin-btn">
                            <i class="fas fa-plus"></i> Add New Award
                        </button>
                    </div>
                    
                    <?php
                    $awards_sql = "SELECT * FROM awards ORDER BY display_order ASC, award_year DESC";
                    $awards_result = mysqli_query($conn, $awards_sql);
                    ?>
                    
                    <div id="awards_form" class="add-form-modern">
                        <div class="form-header">
                            <h3><i class="fas fa-plus-circle"></i> Add New Award</h3>
                        </div>
                        <form method="POST" action="admin_save_award.php" enctype="multipart/form-data">
                            <div class="form-grid">
                                <div class="form-group-modern">
                                    <label for="award_title">Title *</label>
                                    <input type="text" id="award_title" name="title" class="form-control" required>
                                </div>
                                <div class="form-group-modern">
                                    <label for="award_year">Year *</label>
                                    <input type="text" id="award_year" name="award_year" class="form-control" required>
                                </div>
                                <div class="form-group-modern">
                                    <label for="award_issuer">Issuer *</label>
                                    <input type="text" id="award_issuer" name="issuer" class="form-control" required>
                                </div>
                                <div class="form-group-modern">
                                    <label for="award_issuer_category">Issuer Category</label>
                                    <input type="text" id="award_issuer_category" name="issuer_category" class="form-control" placeholder="e.g., Real Estate, Professional Services">
                                </div>
                            </div>
                            
                            <div class="form-group-modern">
                                <label for="award_description">Description *</label>
                                <textarea id="award_description" name="description" rows="3" class="form-control" required></textarea>
                            </div>
                            
                            <div class="form-grid">
                                <div class="form-group-modern">
                                    <label for="award_image">Award Image/Icon</label>
                                    <input type="file" id="award_image" name="image" accept="image/*" class="form-control">
                                </div>
                                <div class="form-group-modern">
                                    <label for="award_bg_image">Background Image *</label>
                                    <input type="file" id="award_bg_image" name="background_image" accept="image/*" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="form-grid">
                                <div class="form-group-modern">
                                    <label for="award_order">Display Order</label>
                                    <input type="number" id="award_order" name="display_order" class="form-control" value="0">
                                </div>
                                <div class="form-group-modern">
                                    <label for="award_status">Status</label>
                                    <select id="award_status" name="is_active" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="admin-btn">
                                    <i class="fas fa-save"></i> Save Award
                                </button>
                                <button type="button" onclick="toggleAddForm('awards')" class="admin-btn" style="background: var(--black-soft); color: var(--text-light); border: 1px solid var(--gold-dark);">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Background</th>
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
                                        <td><strong>#<?php echo str_pad($award['id'], 3, '0', STR_PAD_LEFT); ?></strong></td>
                                        <td>
                                            <img src="<?php echo $award['background_image_path']; ?>" 
                                                alt="<?php echo htmlspecialchars($award['title']); ?>" 
                                                class="thumbnail-modern"
                                                onerror="this.src='https://via.placeholder.com/80x60/1A1A1A/FFD700?text=No+Image'">
                                        </td>
                                        <td><strong style="color: var(--gold-primary);"><?php echo htmlspecialchars($award['title']); ?></strong></td>
                                        <td>
                                            <span class="year-badge">
                                                <?php echo htmlspecialchars($award['award_year']); ?>
                                            </span>
                                        </td>
                                        <td style="color: var(--text-light);"><?php echo htmlspecialchars($award['issuer']); ?></td>
                                        <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; color: var(--text-muted);">
                                            <?php echo htmlspecialchars(substr($award['description'], 0, 100)); ?>
                                            <?php if (strlen($award['description']) > 100): ?>...<?php endif; ?>
                                        </td>
                                        <td style="color: var(--gold-primary);"><?php echo $award['display_order']; ?></td>
                                        <td>
                                            <?php if ($award['is_active']): ?>
                                                <span class="status-badge status-active">
                                                    <i class="fas fa-check-circle"></i> Active
                                                </span>
                                            <?php else: ?>
                                                <span class="status-badge status-inactive">
                                                    <i class="fas fa-times-circle"></i> Inactive
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="action-buttons-modern">
                                                <a href="admin_edit_award.php?id=<?php echo $award['id']; ?>&tab=awards" class="btn-modern btn-edit-modern">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="?tab=awards&delete=<?php echo $award['id']; ?>" 
                                                class="btn-modern btn-delete-modern" 
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
                                            <div class="empty-state-modern">
                                                <div class="empty-icon">
                                                    <i class="fas fa-award"></i>
                                                </div>
                                                <h3>No Awards Found</h3>
                                                <p>Add your first award using the "Add New Award" button above.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Contact Messages Tab -->
            <div id="contact_messages" class="tab-content <?php echo $active_tab == 'contact_messages' ? 'active' : ''; ?>" style="<?php echo $active_tab != 'contact_messages' ? 'display: none;' : ''; ?>">
                <div class="modern-table">
                    <div class="table-header-modern">
                        <h2><i class="fas fa-envelope"></i> Contact Messages</h2>
                        <div style="display: flex; gap: 20px; align-items: center;">
                            <span style="color: var(--text-muted); font-size: 0.95rem;">
                                <i class="fas fa-circle" style="color: var(--gold-primary);"></i> New: 
                                <?php 
                                $new_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM contact_messages WHERE status = 'new'"))['count'];
                                echo $new_count;
                                ?>
                            </span>
                            <span style="color: var(--text-muted); font-size: 0.95rem;">
                                <i class="fas fa-circle" style="color: var(--success-color);"></i> Read: 
                                <?php 
                                $read_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM contact_messages WHERE status = 'read'"))['count'];
                                echo $read_count;
                                ?>
                            </span>
                        </div>
                    </div>
                    
                    <?php
                    $messages_result = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY 
                        CASE WHEN status = 'new' THEN 0 ELSE 1 END,
                        created_at DESC");
                    ?>
                    
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Contact Information</th>
                                    <th>Service</th>
                                    <th>Message Preview</th>
                                    <th>Date & Time</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($messages_result) > 0): ?>
                                    <?php while ($message = mysqli_fetch_assoc($messages_result)): ?>
                                    <tr data-message-id="<?php echo $message['id']; ?>">
                                        <td><strong>#<?php echo str_pad($message['id'], 4, '0', STR_PAD_LEFT); ?></strong></td>
                                        <td>
                                            <div class="contact-info-modern">
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
                                            <span class="category-tag">
                                                <?php echo htmlspecialchars($message['service'] ?: 'General Inquiry'); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="message-preview-modern" title="Click View to read full message">
                                                <div class="message-preview-content">
                                                    <?php echo htmlspecialchars($message['message']); ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="font-size: 0.875rem; color: var(--gold-primary);">
                                                <?php echo date('M d, Y', strtotime($message['created_at'])); ?>
                                            </div>
                                            <div style="font-size: 0.75rem; color: var(--text-muted);">
                                                <?php echo date('h:i A', strtotime($message['created_at'])); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($message['status'] == 'new'): ?>
                                                <span class="status-badge status-new">
                                                    <i class="fas fa-clock"></i> New
                                                </span>
                                            <?php else: ?>
                                                <span class="status-badge status-read">
                                                    <i class="fas fa-check-circle"></i> Read
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="action-buttons-modern">
                                                <button onclick="viewMessage(<?php echo $message['id']; ?>)" 
                                                        class="btn-modern" style="background: var(--gold-gradient); color: var(--black-dark); border: 1px solid var(--gold-primary);">
                                                    <i class="fas fa-eye"></i> View
                                                </button>
                                                <a href="mailto:<?php echo htmlspecialchars($message['email']); ?>" 
                                                class="btn-modern btn-edit-modern" target="_blank">
                                                    <i class="fas fa-reply"></i> Reply
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">
                                            <div class="empty-state-modern">
                                                <div class="empty-icon">
                                                    <i class="fas fa-inbox"></i>
                                                </div>
                                                <h3>No Messages Yet</h3>
                                                <p>All contact form submissions will appear here. Check back later for new messages.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <?php if (mysqli_num_rows($messages_result) > 0): ?>
                    <div style="padding: 16px 24px; background: var(--black-soft); border-top: var(--border-gold); display: flex; justify-content: space-between; align-items: center;">
                        <div style="color: var(--text-muted); font-size: 0.875rem;">
                            Showing <?php echo mysqli_num_rows($messages_result); ?> message(s)
                        </div>
                        <div>
                            <button onclick="markAllAsRead()" class="admin-btn" style="background: var(--black-soft); color: var(--text-light); border: 1px solid var(--gold-dark);">
                                <i class="fas fa-check-double"></i> Mark All as Read
                            </button>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Quick Guide - Gold & Black Theme -->
        <div class="modern-table quick-guide" style="margin-top: 30px;">
            <div class="table-header-modern">
                <h2><i class="fas fa-info-circle"></i> Quick Guide</h2>
            </div>
            <div style="padding: 24px;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px;">
                    <!-- Past Sales -->
                    <div>
                        <h4 style="color: var(--gold-primary); margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-history"></i> Past Sales
                        </h4>
                        <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;">
                            Manage your past sales records with images, categories, and prices. Add, edit, or delete sales transactions.
                        </p>
                    </div>
                    
                    <!-- Affiliated Houses -->
                    <div>
                        <h4 style="color: var(--gold-primary); margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-building"></i> Affiliated Houses
                        </h4>
                        <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;">
                            Manage property developer partners with logos, descriptions, and display order. Control visibility status.
                        </p>
                    </div>
                    
                    <!-- Affiliated Banks -->
                    <div>
                        <h4 style="color: var(--gold-primary); margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-university"></i> Affiliated Banks
                        </h4>
                        <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;">
                            Manage bank partners and their display order. Upload bank logos and set active/inactive status.
                        </p>
                    </div>
                    
                    <!-- Car Companies -->
                    <div>
                        <h4 style="color: var(--gold-primary); margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-car"></i> Car Companies
                        </h4>
                        <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;">
                            Manage car brand partners with company logos. Control display priority and visibility.
                        </p>
                    </div>
                    
                    <!-- Team Members -->
                    <div>
                        <h4 style="color: var(--gold-primary); margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-users"></i> Team Members
                        </h4>
                        <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;">
                            Manage your team members' profiles, positions, photos, and contact information. Organize by categories.
                        </p>
                    </div>
                    
                    <!-- Awards -->
                    <div>
                        <h4 style="color: var(--gold-primary); margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-award"></i> Awards
                        </h4>
                        <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;">
                            Showcase company achievements with titles, years, issuers, and background images.
                        </p>
                    </div>
                    
                    <!-- Contact Messages -->
                    <div>
                        <h4 style="color: var(--gold-primary); margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-envelope"></i> Contact Messages
                        </h4>
                        <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;">
                            View and manage customer inquiries. Read full messages, reply via email, and track new/unread status.
                        </p>
                    </div>
                    
                    <!-- Pro Tips -->
                    <div>
                        <h4 style="color: var(--gold-primary); margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-lightbulb"></i> Pro Tips
                        </h4>
                        <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;">
                            Use Display Order (0 = highest priority). Set to Inactive instead of delete. Compress images for faster loading.
                        </p>
                    </div>
                </div>
                
                <!-- Quick Stats Summary -->
                <div style="margin-top: 24px; padding-top: 20px; border-top: var(--border-gold); display: flex; flex-wrap: wrap; gap: 20px; justify-content: space-between; align-items: center;">
                    <div style="display: flex; gap: 16px; flex-wrap: wrap;">
                        <span style="color: var(--text-muted); font-size: 0.9rem;">
                            <i class="fas fa-check-circle" style="color: var(--gold-primary);"></i> 7 Active Sections
                        </span>
                        <span style="color: var(--text-muted); font-size: 0.9rem;">
                            <i class="fas fa-database"></i> Auto-saves to database
                        </span>
                        <span style="color: var(--text-muted); font-size: 0.9rem;">
                            <i class="fas fa-image"></i> Max 5MB per image
                        </span>
                    </div>
                    <div style="color: var(--text-muted); font-size: 0.85rem;">
                        <i class="fas fa-clock"></i> Last updated: <?php echo date('M d, Y'); ?>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modern Modal - Gold & Black -->
    <div id="messageModal" class="modal-modern">
        <div class="modal-content-modern">
            <div class="modal-header-modern">
                <h2><i class="fas fa-envelope" style="color: var(--gold-primary);"></i> Message Details</h2>
                <button type="button" class="close-modal" onclick="closeModal()" style="background: none; border: none; font-size: 28px; color: var(--text-muted); cursor: pointer;">&times;</button>
            </div>
            
            <div class="modal-body" id="modalMessageContent">
                <!-- Content will be loaded via AJAX -->
            </div>
        </div>
    </div>
    
    <script>
        // Form toggle function
        function toggleAddForm(tabName) {
            const formContainer = document.getElementById(`${tabName}_form`);
            formContainer.classList.toggle('active');
            
            // Scroll to form
            if (formContainer.classList.contains('active')) {
                formContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
        
        // Tab switching functionality
        document.querySelectorAll('.tab-item').forEach(tab => {
            tab.addEventListener('click', function(e) {
                if (this.href.includes('#')) return;
                
                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.style.display = 'none';
                });
                
                // Remove active class from all tabs
                document.querySelectorAll('.tab-item').forEach(t => {
                    t.classList.remove('active');
                });
                
                // Add active class to clicked tab
                this.classList.add('active');
            });
        });
        
        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert-modern');
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.5s ease';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);

        // View message function
        function viewMessage(messageId) {
            // Show loading state
            document.getElementById('modalMessageContent').innerHTML = `
                <div style="text-align: center; padding: 60px 40px;">
                    <i class="fas fa-spinner fa-spin" style="font-size: 2.5rem; color: var(--gold-primary);"></i>
                    <p style="margin-top: 20px; color: var(--text-muted); font-size: 1.1rem;">Loading message details...</p>
                </div>
            `;
            
            // Show modal
            document.getElementById('messageModal').style.display = 'block';
            
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
                        
                        // Create modal content - Gold & Black Theme
                        document.getElementById('modalMessageContent').innerHTML = `
                            <div style="background: var(--gold-gradient); 
                                        color: var(--black-dark); padding: 20px; border-radius: var(--radius); margin-bottom: 20px;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                    <h3 style="margin: 0; color: var(--black-dark); font-size: 1.3rem;">
                                        <i class="fas fa-user-circle"></i> ${escapeHtml(message.name)}
                                    </h3>
                                    <span style="
                                        background: ${message.status == 'new' ? 'var(--gold-primary)' : 'var(--black-dark)'};
                                        color: ${message.status == 'new' ? 'var(--black-dark)' : 'var(--gold-primary)'};
                                        padding: 6px 15px;
                                        border-radius: 20px;
                                        font-size: 0.85rem;
                                        font-weight: 600;
                                        border: 1px solid var(--black-dark);
                                    ">
                                        <i class="fas fa-${message.status == 'new' ? 'clock' : 'check-circle'}"></i>
                                        ${message.status.toUpperCase()}
                                    </span>
                                </div>
                                
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                                    <div>
                                        <div style="font-size: 0.875rem; color: rgba(0,0,0,0.6); margin-bottom: 5px;">
                                            <i class="fas fa-envelope"></i> Email
                                        </div>
                                        <div style="font-size: 1rem;">
                                            <a href="mailto:${escapeHtml(message.email)}" 
                                            style="color: var(--black-dark); text-decoration: none; font-weight: 600;">
                                                ${escapeHtml(message.email)}
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <div style="font-size: 0.875rem; color: rgba(0,0,0,0.6); margin-bottom: 5px;">
                                            <i class="fas fa-phone"></i> Phone
                                        </div>
                                        <div style="font-size: 1rem;">
                                            ${message.phone ? 
                                                `<a href="tel:${escapeHtml(message.phone)}" 
                                                style="color: var(--black-dark); text-decoration: none; font-weight: 600;">
                                                    <i class="fas fa-phone-alt"></i> ${escapeHtml(message.phone)}
                                                </a>` : 
                                                '<span style="color: rgba(0,0,0,0.6);">Not provided</span>'}
                                        </div>
                                    </div>
                                </div>
                                
                                <div style="margin-top: 15px;">
                                    <div style="font-size: 0.875rem; color: rgba(0,0,0,0.6); margin-bottom: 5px;">
                                        <i class="fas fa-calendar"></i> Date Received
                                    </div>
                                    <div style="font-size: 1rem; font-weight: 600;">
                                        <i class="far fa-clock"></i> ${formattedDate}
                                    </div>
                                </div>
                            </div>
                            
                            <div style="background: rgba(255, 215, 0, 0.1); padding: 16px; border-radius: var(--radius); border-left: 4px solid var(--gold-primary); margin-bottom: 20px;">
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                    <i class="fas fa-briefcase" style="color: var(--gold-primary); font-size: 1.2rem;"></i>
                                    <div>
                                        <div style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 5px;">Service Interested In</div>
                                        <div style="font-size: 1.1rem; font-weight: 600; color: var(--gold-primary);">
                                            ${escapeHtml(message.service || 'General Inquiry')}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div style="margin-bottom: 30px;">
                                <h4 style="color: var(--gold-primary); margin-bottom: 15px; padding-bottom: 10px; 
                                        border-bottom: 2px solid var(--gold-dark); display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-comment-dots"></i>
                                    Message Content
                                </h4>
                                <div style="
                                    background: var(--black-soft);
                                    padding: 20px;
                                    border-radius: var(--radius);
                                    line-height: 1.6;
                                    white-space: pre-wrap;
                                    font-size: 1rem;
                                    color: var(--text-light);
                                    max-height: 300px;
                                    overflow-y: auto;
                                    border: 1px solid var(--gold-dark);
                                ">
                                    ${escapeHtml(message.message).replace(/\n/g, '<br>')}
                                </div>
                            </div>
                            
                            <div style="display: flex; gap: 12px; justify-content: flex-end; border-top: var(--border-gold); padding-top: 20px;">
                                <a href="mailto:${escapeHtml(message.email)}?subject=Re: Your inquiry about ${escapeHtml(message.service || 'our services')}" 
                                class="admin-btn" target="_blank">
                                    <i class="fas fa-reply"></i> Reply
                                </a>
                                
                                <a href="?tab=contact_messages&delete=${message.id}" 
                                class="admin-btn" style="background: linear-gradient(135deg, #FF4444 0%, #CC0000 100%); color: white;"
                                onclick="return confirm('Are you sure you want to delete this message?')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                                
                                <button onclick="closeModal()" class="admin-btn" style="background: var(--black-soft); color: var(--text-light); border: 1px solid var(--gold-dark);">
                                    <i class="fas fa-times"></i> Close
                                </button>
                            </div>
                        `;
                        
                        // Mark as read automatically when viewed
                        if (message.status === 'new') {
                            markMessageAsRead(message.id);
                        }
                    } else {
                        document.getElementById('modalMessageContent').innerHTML = `
                            <div style="text-align: center; padding: 60px 40px; color: var(--danger-color);">
                                <i class="fas fa-exclamation-triangle" style="font-size: 3rem; margin-bottom: 20px; color: var(--gold-primary);"></i>
                                <h3 style="margin-bottom: 15px; color: var(--gold-primary);">Error Loading Message</h3>
                                <p style="margin-bottom: 25px; color: var(--text-muted);">${data.error || 'Unable to load message details'}</p>
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
                        <div style="text-align: center; padding: 60px 40px; color: var(--danger-color);">
                            <i class="fas fa-exclamation-triangle" style="font-size: 3rem; margin-bottom: 20px; color: var(--gold-primary);"></i>
                            <h3 style="margin-bottom: 15px; color: var(--gold-primary);">Network Error</h3>
                            <p style="margin-bottom: 25px; color: var(--text-muted);">Please check your internet connection and try again.</p>
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
                    }
                });
        }

        // Function to close modal
        function closeModal() {
            document.getElementById('messageModal').style.display = 'none';
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
        
        // Initialize current active tab
        document.addEventListener('DOMContentLoaded', function() {
            const activeTab = "<?php echo $active_tab; ?>";
            if (activeTab) {
                const activeElement = document.querySelector(`#${activeTab}`);
                if (activeElement) {
                    activeElement.style.display = 'block';
                }
            }
        });
    </script>
</body>
</html>