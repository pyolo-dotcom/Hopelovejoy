<?php
// admin_save_award.php
session_start();
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $award_year = mysqli_real_escape_string($conn, $_POST['award_year']);
    $issuer = mysqli_real_escape_string($conn, $_POST['issuer']);
    $issuer_category = mysqli_real_escape_string($conn, $_POST['issuer_category']);
    $display_order = isset($_POST['display_order']) ? intval($_POST['display_order']) : 0;
    $is_active = isset($_POST['is_active']) ? intval($_POST['is_active']) : 1;
    
    // Handle file uploads
    $image_path = '';
    $background_image_path = '';
    
    // Upload award image (optional)
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = 'uploads/awards/';
        
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_name = time() . '_award_' . basename($_FILES['image']['name']);
        $file_path = $upload_dir . $file_name;
        
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/svg+xml'];
        $file_type = $_FILES['image']['type'];
        
        if (in_array($file_type, $allowed_types) && move_uploaded_file($_FILES['image']['tmp_name'], $file_path)) {
            $image_path = $file_path;
        }
    }
    
    // Upload background image (required for new awards)
    if (isset($_FILES['background_image']) && $_FILES['background_image']['error'] == 0) {
        $upload_dir = 'uploads/awards/backgrounds/';
        
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_name = time() . '_bg_' . basename($_FILES['background_image']['name']);
        $file_path = $upload_dir . $file_name;
        
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
        $file_type = $_FILES['background_image']['type'];
        
        if (in_array($file_type, $allowed_types) && move_uploaded_file($_FILES['background_image']['tmp_name'], $file_path)) {
            $background_image_path = $file_path;
        }
    }
    
    // Check if editing existing record
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = intval($_POST['id']);
        
        // Build update query
        $update_fields = [
            "title = '$title'",
            "description = '$description'",
            "award_year = '$award_year'",
            "issuer = '$issuer'",
            "issuer_category = '$issuer_category'",
            "display_order = $display_order",
            "is_active = $is_active",
            "updated_at = NOW()"
        ];
        
        if (!empty($image_path)) {
            $update_fields[] = "image_path = '$image_path'";
        }
        
        if (!empty($background_image_path)) {
            $update_fields[] = "background_image_path = '$background_image_path'";
        }
        
        $sql = "UPDATE awards SET " . implode(', ', $update_fields) . " WHERE id = $id";
        
        $message = "Award updated successfully!";
    } else {
        // Insert new record - require background image
        if (empty($background_image_path)) {
            $_SESSION['error_message'] = "Please upload a background image";
            header('Location: admin_dashboard.php?tab=awards');
            exit();
        }
        
        $sql = "INSERT INTO awards (title, description, award_year, issuer, issuer_category, image_path, background_image_path, display_order, is_active) 
                VALUES ('$title', '$description', '$award_year', '$issuer', '$issuer_category', '$image_path', '$background_image_path', $display_order, $is_active)";
        
        $message = "Award added successfully!";
    }
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = $message;
    } else {
        $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
    }
    
    header('Location: admin_dashboard.php?tab=awards');
    exit();
}
?>