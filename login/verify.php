<?php
include '../functions/db.php';

if (isset($_GET['code'])) {
    $verification_code = $_GET['code'];
    $sql = "UPDATE users SET verified = 1 WHERE verification_code = '$verification_code'";

    if ($conn->query($sql) === TRUE) {
        echo "Email verified successfully! You can now login.";
    } else {
        echo "Invalid verification code.";
    }
}
?>
