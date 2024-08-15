<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Verification</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../functions/style.css">

    <link rel="icon" href="Favicon.png">

    <style>
        body {
            overflow-x: hidden; /* Prevent horizontal scroll */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Verification Account</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php" >Register</a>
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
                    <div class="card-header">Verification Account</div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group row">
                                <label for="otp" class="col-md-4 col-form-label text-md-right">OTP Code</label>
                                <div class="col-md-6">
                                    <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Verify" name="verify" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Bootstrap JS and dependencies -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
include('../functions/db.php');
if(isset($_POST["verify"])){
    $otp = $_SESSION['otp'];
    $email = $_SESSION['mail'];
    $otp_code = $_POST['otp_code'];

    if($otp != $otp_code){
        echo "<script>alert('Invalid OTP code');</script>";
    } else {
        mysqli_query($conn, "UPDATE login SET status = 1 WHERE email = '$email'");
        echo "<script>
                 alert('Verify account done, you may sign in now');
                 window.location.replace('index.php');
              </script>";
    }
}
?>
