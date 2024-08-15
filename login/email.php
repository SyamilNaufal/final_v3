<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Make sure to install PHPMailer via Composer

function sendVerificationEmail($email, $verification_code) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@example.com'; // SMTP username
        $mail->Password = 'your_password'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('your_email@example.com', 'Your Name');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body    = 'Please click the link below to verify your email:<br><a href="http://yourdomain.com/verify.php?code=' . $verification_code . '">Verify Email</a>';

        $mail->send();
        echo 'Verification email has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

