<?php
// mark_all_read.php
session_start();
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}

$sql = "UPDATE contact_messages SET status = 'read' WHERE status = 'new'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['success' => true, 'affected_rows' => mysqli_affected_rows($conn)]);
} else {
    echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
}
?>