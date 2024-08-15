<?php
include '../functions/db.php';
include 'email.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $otp = rand(100000, 999999);
        $sql = "UPDATE users SET verification_code = '$otp' WHERE email = '$email'";
        
        if ($conn->query($sql) === TRUE) {
            sendOtpEmail($email, $otp);
            echo "OTP has been sent to your email.";
        }
    } else {
        echo "No user found with that email.";
    }
}
?>
