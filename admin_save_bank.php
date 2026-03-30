<?php
// admin_save_bank.php
session_start();
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}

// Get return tab (which tab to redirect back to)
$return_tab = isset($_GET['tab']) ? $_GET['tab'] : 'affiliated_banks';
if (isset($_POST['return_tab'])) {
    $return_tab = $_POST['return_tab'];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $display_order = isset($_POST['display_order']) ? intval($_POST['display_order']) : 0;
    $is_active = isset($_POST['is_active']) ? intval($_POST['is_active']) : 1;
    
    // Handle file upload
    $logo_path = '';
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
        $upload_dir = 'uploads/banks/';
        
        // Create upload directory if it doesn't exist
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_name = time() . '_' . basename($_FILES['logo']['name']);
        $file_path = $upload_dir . $file_name;
        
        // Check file type
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/svg+xml'];
        $file_type = $_FILES['logo']['type'];
        
        if (in_array($file_type, $allowed_types)) {
            if (move_uploaded_file($_FILES['logo']['tmp_name'], $file_path)) {
                $logo_path = $file_path;
            }
        }
    }
    
    // Check if editing existing record
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = intval($_POST['id']);
        
        // If new logo uploaded, use it; otherwise keep old logo
        if (!empty($logo_path)) {
            $sql = "UPDATE affiliated_banks SET 
                    name = '$name',
                    display_order = $display_order,
                    is_active = $is_active,
                    logo_path = '$logo_path',
                    updated_at = NOW()
                    WHERE id = $id";
        } else {
            $sql = "UPDATE affiliated_banks SET 
                    name = '$name',
                    display_order = $display_order,
                    is_active = $is_active,
                    updated_at = NOW()
                    WHERE id = $id";
        }
        
        $message = "Bank updated successfully!";
    } else {
        // Insert new record
        if (empty($logo_path)) {
            $_SESSION['error'] = "Please upload a logo for the bank!";
            header("Location: admin_dashboard.php?tab=$return_tab");
            exit();
        }
        
        $sql = "INSERT INTO affiliated_banks (name, display_order, is_active, logo_path) 
                VALUES ('$name', $display_order, $is_active, '$logo_path')";
        $message = "Bank added successfully!";
    }
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = $message;
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
    }
    
    // Redirect back to the same tab
    header("Location: admin_dashboard.php?tab=$return_tab");
    exit();
}
?>