<?php
include 'dbcon.php';

if (isset($_POST['register'])) {
    $name = $_POST['username'];
    $phone = $_POST['email'];
    $password = $_POST['password'];
    $verification_code = md5(rand());

    // Check if the email already exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists!";
    } else {
        // Insert user into the database
        $query = "INSERT INTO users (name, phone, email, password, verify_token) VALUES ('$name', '$phone', '$email', '$password', '$verify_token')";

        if (mysqli_query($conn, $query)) {
            // Call email sending function
            sendVerificationEmail($name, $email, $verify_token);
            echo "Registration successful! Check your email to verify.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);
}

// Function to send verification email
function sendVerificationEmail($name, $email, $token) {
    $subject = "Email Verification";
    $verification_link = "http://yourwebsite.com/verify.php?token=" . $token;
    $message = "Hi " . $name . ",\nPlease verify your email by clicking the link: " . $verification_link;
    // Use mail() function or PHP Mailer to send email
}
?>