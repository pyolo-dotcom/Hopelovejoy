<?php
// admin_save_bank.php
session_start();
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
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
            $_SESSION['error_message'] = "Please upload a logo";
            header('Location: admin_dashboard.php');
            exit();
        }
        
        $sql = "INSERT INTO affiliated_banks (name, display_order, is_active, logo_path) 
                VALUES ('$name', $display_order, $is_active, '$logo_path')";
        $message = "Bank added successfully!";
    }
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = $message;
    } else {
        $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
    }
    
    header('Location: admin_dashboard.php');
    exit();
}
?>