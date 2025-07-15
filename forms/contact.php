<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php'; // Ensure Composer has been run to install PHPMailer

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'localhost';                   // Specify main and backup SMTP servers
    $mail->SMTPAuth = false;                               // Enable SMTP authentication
    // $mail->Username = 'your-smtp-username';               // SMTP username
    // $mail->Password = 'your-smtp-password';               // SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` for SSL
    $mail->Port = 1025;                                    // TCP port to connect to (587 for TLS, 465 for SSL)

    // Recipients
    $fullName = $_POST['name'];
    $mail->setFrom($_POST['email']);      // Sender's email and name
    $mail->addAddress('contact@example.com');             // Add a recipient (your receiving email address)

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Project Details';
    $mail->Body = '
        <div style="max-width: 600px; margin: auto; padding: 20px; background: #272727; border: 2px solid #D4AA7D; border-radius: 10px; font-family: Arial, sans-serif; font-size: 16px; color: #ffffff;">
            <h2 style="color: #D4AA7D;">New Message!!!</h2>

            <p><strong style="color: #D4AA7D;">From:</strong> ' . htmlspecialchars($fullName) . '</p>
            <p><strong style="color: #D4AA7D;">Email:</strong> ' . htmlspecialchars($_POST['email']) . '</p>
            <p><strong style="color: #D4AA7D;">Contact Number:</strong> ' . htmlspecialchars($_POST['phone']) . '</p>

            <hr style="margin: 20px 0; border: none; border-top: 1px solid #888;">

            <p><strong style="color: #D4AA7D;">Message:</strong></p>
            <div style="padding: 15px; background: #f9f9f9; color: #000; border: 1px solid #ddd; border-radius: 5px;">
            ' . nl2br(htmlspecialchars($_POST['details'])) . '
            </div>

            <br>
            <p style="font-size: 14px; color: #aaaaaa;">This message was sent via your website contact form.</p>
        </div>';


        $mail->AltBody =
            "New Message!!!\n\n" .
            "From: $fullName\n" .
            "Email: " . $_POST['email'] . "\n" .
            "Contact Number: " . $_POST['phone'] . "\n\n" .
            "Message:\n" . $_POST['details'] . "\n\n" .
            "This message was sent via your website contact form.";

    // Send email
    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>