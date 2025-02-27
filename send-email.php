<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "aabaanrahil@gmail.com";
    $subject = "New Travel Inquiry from " . $_POST['name'];
    
    $message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #0A2647; color: white; padding: 20px; }
            .content { padding: 20px; background: #f9f9f9; }
            .footer { text-align: center; padding: 20px; font-size: 12px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Travel Inquiry</h2>
            </div>
            <div class='content'>
                <p><strong>Name:</strong> {$_POST['name']}</p>
                <p><strong>Email:</strong> {$_POST['email']}</p>
                <p><strong>Phone:</strong> {$_POST['phone']}</p>
                <p><strong>Destination:</strong> {$_POST['destination']}</p>
                <p><strong>Message:</strong></p>
                <p>{$_POST['message']}</p>
            </div>
            <div class='footer'>
                <p>This email was sent from Start My Trips website contact form.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Start My Trips <noreply@startmytrips.com>\r\n";
    $headers .= "Reply-To: {$_POST['email']}\r\n";

    if(mail($to, $subject, $message, $headers)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to send email']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
