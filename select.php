<?php
include 'functions/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Renewal Tracking License</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/RTL.png" rel="icon">
  <link href="assets/RTL.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/card.css">

  <!-- QRCode.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="home.php" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">SRTL</h1>
      </a>

       <nav id="navmenu" class="navmenu">
        <ul>
         
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Renewal Tracking License</h1>
            <p>Track your License</p>
            <div class="d-flex">
              <a href="#services" class="btn-get-started">Get Started</a>
              <a href="assets/img_miaow/miaow_video.mp4" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/RTL2.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>
    </section>
    <!-- /Hero Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Welcome</h2>
        <p>Please choose your company to edit</p>
      </div>

      <div class="container">
        <div class="row gy-4">
          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-activity icon"></i></div>
              <h4>Desa Southen Agency</h4>
              <a href="company/dsa/home.php">Click for more...</a>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
              <h4>Desa Southen Food</h4>
              <a href="company/mmf/home.php">Click for more...</a>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
              <h4>Miaow Miaow Food</h4>
              <a href="company/mmf/home.php">Click for more...</a>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-broadcast icon"></i></div>
              <h4>Miaow Biscuts</h4>
              <a href="company/mb/home.php">Click for more...</a>
            </div>
          </div>
          <!-- Flip Card -->
      <div class="col-xl-3 col-md-6">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="assets/RTL.png" alt="Avatar" style="width:200px;height:200px;">
            </div>
            <div class="flip-card-back">
            <h4>Desa Southen Agency</h4>
            <a href="company/dsa/home.php">Click for more...</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="assets/RTL.png" alt="Avatar" style="width:200px;height:200px;">
            </div>
            <div class="flip-card-back">
            <h4>Desa Southen Food</h4>
            <a href="company/dsf/home.php">Click for more...</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="assets/RTL.png" alt="Avatar" style="width:200px;height:200px;">
            </div>
            <div class="flip-card-back">
            <h4>Miaow Miaow Food</h4>
            <a href="company/mmf/home.php">Click for more...</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="assets/RTL.png" alt="Avatar" style="width:200px;height:200px;">
            </div>
            <div class="flip-card-back">
            <h4>Miaow Biscuts</h4>
            <a href="company/mb/home.php">Click for more...</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </main>

  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">System Renewal Tracking License</strong></p>
        <div class="credits">
          Designed by <span>Syamil</span>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/js/main.js"></script>

  <!-- Custom JS for QR Code -->
  <script>
    function generateQRCode() {
      var qrcodeContainer = document.getElementById('qrcode');
      qrcodeContainer.innerHTML = '';
      var qrcode = new QRCode(qrcodeContainer, {
        text: "https://wa.me/60123456789", // Replace with your WhatsApp link
        width: 128,
        height: 128,
      });
    }

    document.addEventListener('DOMContentLoaded', function() {
      var whatsappButton = document.querySelector('.btn-getstarted');
      whatsappButton.addEventListener('click', function() {
        generateQRCode();
      });
    });
  </script> 

  <!-- WhatsApp QR Code Modal
  <div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="whatsappModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="whatsappModalLabel">Scan to WhatsApp</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="qrcode" class="d-flex justify-content-center"></div>
        </div>
      </div>
    </div>
  </div> -->
</body>

</html>
