<?php
include('../functions/db.php');/*
if(isset($_POST["register"])){
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = trim($_POST['password']);
    
    $check_query = mysqli_query($conn, "SELECT * FROM users WHERE email ='$email'");
    $rowCount = mysqli_num_rows($check_query);

    if(!empty($email) && !empty($password)){
        if($rowCount > 0){
            echo "<script>alert('User with email already exists!');</script>";
        } else {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $result = mysqli_query($conn, "INSERT INTO users (email, password, status) VALUES ('$email', '$password_hash', 0)");

            if($result){
                $otp = rand(100000, 999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['mail'] = $email;
                require "../Mail/phpmailer/PHPMailerAutoload.php";
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';

                $mail->Username = 'youremail@gmail.com'; // Gantikan dengan email anda
                $mail->Password = 'yourpassword'; // Gantikan dengan kata laluan email anda

                $mail->setFrom('youremail@gmail.com', 'OTP Verification');
                $mail->addAddress($_POST["email"]);

                $mail->isHTML(true);
                $mail->Subject = "Your verify code";
                $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                <br><br>
                <p>With regards,</p>
                <b>Your Company</b>";

                if(!$mail->send()){
                    echo "<script>alert('Register Failed, Invalid Email');</script>";
                } else {
                    echo "<script>alert('Register Successfully, OTP sent to $email'); window.location.replace('verification.php');</script>";
                }
            }
        }
    }
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register Form</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../functions/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Register Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php" style="font-weight:bold; color:black; text-decoration:underline">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="register-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="register">
                            <!-- nama -->
                        <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Username</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>
                            <!-- email -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>
                            <!-- pass -->
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required autofocus>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>
                            <!-- no tel -->
                            <!-- <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                <div class="col-md-6">
                                    <input type="text" id="phone_number" class="form-control" name="phone_number">
                                </div>
                            </div> -->
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Register" name="register" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function() {
        if (password.type === "password") {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
</body>
</html>
