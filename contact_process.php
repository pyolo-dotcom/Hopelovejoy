<?php
session_start();
require_once 'config.php';

require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Function to send email
function sendContactEmail($data) {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'pidodionitskiii@gmail.com'; // Your Gmail
        $mail->Password   = 'vjmj ckjr itaw hzat'; // Your App Password - PALITAN MO NA TO AFTER!
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        
        // Enable debugging (optional)
        // $mail->SMTPDebug = 2; // Remove comment for debugging
        
        // Recipients
        $mail->setFrom('pidodionitskiii@gmail.com', 'Hope Account Specialist');
        $mail->addAddress('pidodionitskiii@gmail.com'); // Where to send
        $mail->addReplyTo($data['email'], $data['name']);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Message: ' . ($data['service'] ?: 'General Inquiry');
        
        $mail->Body = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background: #f8f9fa; padding: 15px; border-left: 4px solid #eeb82e; }
                    .field { margin-bottom: 10px; }
                    .label { font-weight: bold; color: #2c2b29; }
                    .message-box { background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 15px 0; }
                    .footer { margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee; color: #666; font-size: 12px; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2> New Contact Form Submission</h2>
                    </div>
                    
                    <div class='field'>
                        <span class='label'> Name:</span> {$data['name']}
                    </div>
                    
                    <div class='field'>
                        <span class='label'> Email:</span> <a href='mailto:{$data['email']}'>{$data['email']}</a>
                    </div>
                    
                    <div class='field'>
                        <span class='label'> Phone:</span> " . ($data['phone'] ?: 'Not provided') . "
                    </div>
                    
                    <div class='field'>
                        <span class='label'> Service Interested:</span> " . ($data['service'] ?: 'Not specified') . "
                    </div>
                    
                    <div class='field'>
                        <span class='label'> Message:</span>
                        <div class='message-box'>
                            " . nl2br(htmlspecialchars($data['message'])) . "
                        </div>
                    </div>
                    
                    <div class='footer'>
                        <p><strong>Submitted:</strong> " . date('F j, Y, g:i a') . "</p>
                        <p>This message was sent from your website contact form.</p>
                    </div>
                </div>
            </body>
            </html>
        ";
        
        $mail->AltBody = "NEW CONTACT FORM SUBMISSION\n\n" .
                        "Name: {$data['name']}\n" .
                        "Email: {$data['email']}\n" .
                        "Phone: " . ($data['phone'] ?: 'Not provided') . "\n" .
                        "Service: " . ($data['service'] ?: 'Not specified') . "\n" .
                        "Message:\n{$data['message']}\n\n" .
                        "Submitted: " . date('Y-m-d H:i:s') . "\n";
        
        return $mail->send();
        
    } catch (Exception $e) {
        // Log error for debugging
        error_log("PHPMailer Error: " . $e->getMessage());
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $service = trim($_POST['service']);
    $message = trim($_POST['message']);
    
    // Escape for database
    $name_db = mysqli_real_escape_string($conn, $name);
    $email_db = mysqli_real_escape_string($conn, $email);
    $phone_db = mysqli_real_escape_string($conn, $phone);
    $service_db = mysqli_real_escape_string($conn, $service);
    $message_db = mysqli_real_escape_string($conn, $message);
    
    // Validation
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    
    if (empty($message)) {
        $errors[] = "Message is required.";
    }
    
    // If there are errors
    if (!empty($errors)) {
        $_SESSION['contact_error'] = implode(" ", $errors);
        header('Location: contact.php');
        exit();
    }
    
    // Save to database
    $sql = "INSERT INTO contact_messages (name, email, phone, service, message) 
            VALUES ('$name_db', '$email_db', '$phone_db', '$service_db', '$message_db')";
    
    if (mysqli_query($conn, $sql)) {
        $message_id = mysqli_insert_id($conn);
        
        // Prepare data for email
        $emailData = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'service' => $service,
            'message' => $message
        ];
        
        // Send email
        if (sendContactEmail($emailData)) {
            $_SESSION['contact_success'] = "Thank you, $name! Your message has been sent successfully. We'll contact you within 24 hours.";
        } else {
            // Email failed but database saved
            $_SESSION['contact_success'] = "Thank you, $name! Your message has been received. (Email notification failed to send)";
        }
    } else {
        // Database error
        $_SESSION['contact_error'] = "Sorry, there was an error saving your message. Please try again later. Error: " . mysqli_error($conn);
    }
    
    // Redirect back to contact page
    header('Location: contact.php');
    exit();
    
} else {
    // If not POST request, redirect to contact page
    header('Location: contact.php');
    exit();
}
?>