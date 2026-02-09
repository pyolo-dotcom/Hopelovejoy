<?php
// get_message.php
session_start();
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $sql = "SELECT * FROM contact_messages WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $message = mysqli_fetch_assoc($result);
        
        // Update status to 'read' when viewed
        $update_sql = "UPDATE contact_messages SET status = 'read' WHERE id = $id";
        mysqli_query($conn, $update_sql);
        
        echo json_encode([
            'success' => true,
            'message' => $message
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => 'Message not found'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'error' => 'No message ID provided'
    ]);
}
?>