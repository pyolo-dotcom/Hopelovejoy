<?php
// admin_save_affiliated.php
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
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $years_affiliated = mysqli_real_escape_string($conn, $_POST['years_affiliated']);
    $display_order = isset($_POST['display_order']) ? intval($_POST['display_order']) : 0;
    $is_active = isset($_POST['is_active']) ? intval($_POST['is_active']) : 1;
    
    // Handle file upload
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = 'uploads/affiliated_houses/';
        
        // Create upload directory if it doesn't exist
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_name = time() . '_' . basename($_FILES['image']['name']);
        $file_path = $upload_dir . $file_name;
        
        // Check file type
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/svg+xml'];
        $file_type = $_FILES['image']['type'];
        
        if (in_array($file_type, $allowed_types)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $file_path)) {
                $image_path = $file_path;
            }
        }
    }
    
    // Check if editing existing record
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = intval($_POST['id']);
        
        // If new image uploaded, use it; otherwise keep old image
        if (!empty($image_path)) {
            $sql = "UPDATE affiliated_houses SET 
                    name = '$name',
                    category = '$category',
                    description = '$description',
                    years_affiliated = '$years_affiliated',
                    display_order = $display_order,
                    is_active = $is_active,
                    image_path = '$image_path',
                    updated_at = NOW()
                    WHERE id = $id";
        } else {
            $sql = "UPDATE affiliated_houses SET 
                    name = '$name',
                    category = '$category',
                    description = '$description',
                    years_affiliated = '$years_affiliated',
                    display_order = $display_order,
                    is_active = $is_active,
                    updated_at = NOW()
                    WHERE id = $id";
        }
        
        $message = "Affiliated house updated successfully!";
    } else {
        // Insert new record
        if (empty($image_path)) {
            $_SESSION['error_message'] = "Please upload an image";
            header('Location: admin_dashboard.php');
            exit();
        }
        
        $sql = "INSERT INTO affiliated_houses (name, category, description, years_affiliated, display_order, is_active, image_path) 
                VALUES ('$name', '$category', '$description', '$years_affiliated', $display_order, $is_active, '$image_path')";
        $message = "Affiliated house added successfully!";
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