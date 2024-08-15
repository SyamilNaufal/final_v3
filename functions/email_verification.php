<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendVerificationEmail($email, $verificationCode) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com'; // Set the SMTP server to send through
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your-email@example.com';
        $mail->Password   = 'your-email-password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('no-reply@example.com', 'Mailer');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body    = "Please click the link to verify your email: <a href='http://yourdomain.com/pages/verify.php?email=$email&code=$verificationCode'>Verify Email</a>";

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
