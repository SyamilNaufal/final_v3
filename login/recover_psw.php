<?php session_start(); ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>Password Recovery</title>

    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">User Password Recover</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Password Recover</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="recover_psw">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Recover" name="recover" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>

<?php 
if (isset($_POST["recover"])) {
    include('../functions/db.php');
    $email = $_POST["email"];

    $sql = mysqli_query($conn, "SELECT * FROM login WHERE email='$email'");
    $fetch = mysqli_fetch_assoc($sql);

    if (mysqli_num_rows($sql) <= 0) {
        echo "<script>alert('Sorry, no emails exists!');</script>";
    } else if ($fetch["status"] == 0) {
        echo "<script>alert('Sorry, your account must verify first, before you recover your password!');</script>";
    } else {
        // generate OTP
        $otp = rand(100000, 999999);

        // send OTP
        require "Mail/phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'youremail@gmail.com'; // Gantikan dengan email anda
        $mail->Password = 'yourpassword'; // Gantikan dengan kata laluan email anda

        $mail->setFrom('youremail@gmail.com', 'OTP Password Recover');
        $mail->addAddress($_POST["email"]);

        $mail->isHTML(true);
        $mail->Subject = "Your Password Recover OTP Code";
        $mail->Body = "<p>Dear user, </p> <h3>Your password recover OTP code is $otp <br></h3>
                       <br><br>
                       <p>With regards,</p>
                       <b>Your Company</b>";

        if (!$mail->send()) {
            echo "<script>alert('Failed while sending code!');</script>";
        } else {
            // save OTP in session
            $_SESSION['otp'] = $otp;
            $_SESSION['mail'] = $email;
            echo "<script>window.location.replace('reset_psw.php');</script>";
        }
    }
}
?>
