<?php
session_start();
include('../functions/db.php');
?>
<!DOCTYPE html>
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

    <title>Password Reset Form</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Password Reset Form</a>
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
                    <div class="card-header">Reset Your Password</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">
                            <div class="form-group row">
                                <label for="old_password" class="col-md-4 col-form-label text-md-right">Old Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="old_password" class="form-control" name="old_password" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Reset" name="reset" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
if (isset($_POST["reset"])) {
    include('../functions/db.php');
    $old_psw = $_POST["old_password"];
    $new_psw = $_POST["password"];

    $Email = $_SESSION['email'];

    $sql = mysqli_query($conn, "SELECT * FROM login WHERE email='$Email'");
    $fetch = mysqli_fetch_assoc($sql);

    if (password_verify($old_psw, $fetch['password'])) {
        $new_pass_hash = password_hash($new_psw, PASSWORD_DEFAULT);
        mysqli_query($conn, "UPDATE login SET password='$new_pass_hash' WHERE email='$Email'");
        echo "<script>
                window.location.replace('index.php');
                alert('Your password has been successfully reset');
              </script>";
    } else {
        echo "<script>
                alert('Old password is incorrect, please try again');
              </script>";
    }
}
?>

<script>
const toggle = document.getElementById('togglePassword');
const password = document.getElementById('password');

toggle.addEventListener('click', function() {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('bi-eye');
});
</script>

</body>
</html>
