<?php
header('Content-Type: application/json');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form data
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $destination = sanitizeInput($_POST['destination'] ?? '');
    $message = sanitizeInput($_POST['message'] ?? '');

    // Validate inputs
    if (empty($name) || empty($email) || empty($destination) || empty($message)) {
        echo json_encode([
            'success' => false,
            'message' => 'Please fill in all required fields.'
        ]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'success' => false,
            'message' => 'Please enter a valid email address.'
        ]);
        exit;
    }

    // Email recipient
    $to = "aabaanrahil@gmail.com";
    
    // Email subject
    $subject = "New Travel Inquiry from $name - Start My Trips";
    
    // Email content
    $email_content = "
    <html>
    <head>
        <style>
            body { 
                font-family: Arial, sans-serif; 
                line-height: 1.6; 
                color: #333;
            }
            .container { 
                max-width: 600px; 
                margin: 0 auto; 
                padding: 20px; 
            }
            .header { 
                background: #0A2647; 
                color: white; 
                padding: 20px; 
                text-align: center;
            }
            .content { 
                padding: 20px; 
                background: #f9f9f9; 
            }
            .footer { 
                text-align: center; 
                padding: 20px; 
                font-size: 12px; 
                color: #666;
            }
            .info-item {
                margin-bottom: 15px;
            }
            .label {
                font-weight: bold;
                color: #0A2647;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Travel Inquiry</h2>
            </div>
            <div class='content'>
                <div class='info-item'>
                    <span class='label'>Name:</span>
                    <p>$name</p>
                </div>
                <div class='info-item'>
                    <span class='label'>Email:</span>
                    <p>$email</p>
                </div>
                <div class='info-item'>
                    <span class='label'>Destination:</span>
                    <p>$destination</p>
                </div>
                <div class='info-item'>
                    <span class='label'>Message:</span>
                    <p>$message</p>
                </div>
            </div>
            <div class='footer'>
                <p>This email was sent from Start My Trips website contact form.</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Email headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Start My Trips <noreply@startmytrips.com>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Attempt to send email
    try {
        if(mail($to, $subject, $email_content, $headers)) {
            echo json_encode([
                'success' => true,
                'message' => 'Message sent successfully!'
            ]);
        } else {
            throw new Exception('Failed to send email');
        }
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Failed to send message. Please try again later.'
        ]);
        
        // Log error for debugging
        error_log("Email sending failed: " . $e->getMessage());
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
}
?>
