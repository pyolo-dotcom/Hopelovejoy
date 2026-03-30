<?php
// admin_save.php
session_start();
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}

// Get return tab (which tab to redirect back to)
$return_tab = isset($_GET['tab']) ? $_GET['tab'] : 'past_sales';
if (isset($_POST['return_tab'])) {
    $return_tab = $_POST['return_tab'];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $sale_date = mysqli_real_escape_string($conn, $_POST['sale_date']);
    $price = !empty($_POST['price']) ? floatval($_POST['price']) : NULL;
    $is_active = isset($_POST['is_active']) ? intval($_POST['is_active']) : 1;
    
    // Handle file upload
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = 'uploads/past_sales/';
        
        // Create upload directory if it doesn't exist
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_name = time() . '_' . basename($_FILES['image']['name']);
        $file_path = $upload_dir . $file_name;
        
        // Check file type
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
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
            $sql = "UPDATE past_sales SET 
                    title = '$title',
                    description = '$description',
                    category = '$category',
                    sale_date = '$sale_date',
                    price = " . ($price !== NULL ? "'$price'" : "NULL") . ",
                    image_path = '$image_path',
                    is_active = $is_active,
                    updated_at = NOW()
                    WHERE id = $id";
        } else {
            $sql = "UPDATE past_sales SET 
                    title = '$title',
                    description = '$description',
                    category = '$category',
                    sale_date = '$sale_date',
                    price = " . ($price !== NULL ? "'$price'" : "NULL") . ",
                    is_active = $is_active,
                    updated_at = NOW()
                    WHERE id = $id";
        }
        
        $message = "Sale updated successfully!";
    } else {
        // Insert new record
        if (empty($image_path)) {
            $_SESSION['error'] = "Image is required for new sales!";
            header("Location: admin_dashboard.php?tab=$return_tab");
            exit();
        }
        
        $sql = "INSERT INTO past_sales (title, description, category, sale_date, price, image_path, is_active) 
                VALUES ('$title', '$description', '$category', '$sale_date', 
                " . ($price !== NULL ? "'$price'" : "NULL") . ", '$image_path', $is_active)";
        $message = "Sale added successfully!";
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