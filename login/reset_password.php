<?php
include '../functions/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $otp = $_POST['otp'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
    
    $sql = "SELECT * FROM users WHERE email = '$email' AND verification_code = '$otp'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $sql = "UPDATE users SET password = '$new_password', verification_code = NULL WHERE email = '$email'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Password has been reset successfully.";
        } else {
            echo "Error updating password.";
        }
    } else {
        echo "Invalid OTP.";
    }
}
?>
