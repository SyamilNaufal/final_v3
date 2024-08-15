<?php
// home.php
include '../../functions/db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Miaow Biscuts</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img_miaow/mb/mb1.png" rel="icon">
  <link href="../../assets/img_miaow/mb/mb1.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" rel="stylesheet" >

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../../assets/css/main.css" rel="stylesheet">

  <!-- QRCode.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="home.php" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">MB</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="function.php">View</a></li>
        <!-- <li class="dropdown"><a href="#"><span>Edit</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="function.php" onclick="loadContent('view')">View License</a></li>
              <li><a href="function.php" onclick="loadContent('history')">License History</a></li>
            </ul>
          </li> -->
          <a class="btn-getstarted" href="#" data-bs-toggle="modal" data-bs-target="#whatsappModal">WhatsApp</a>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
        </div>
      </nav>

    </div>
  </header>

  <main class="main">
    <section id="hero" class="hero section dark-background">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Miaow Biscuts</h1>
            <p></p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
              <a href="../../assets/img_miaow/miaow_video.mp4" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="../../assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- New Content Section -->
    <!-- <section id="content" class="section light-background">
      <div class="container" data-aos="zoom-in">
        <div id="content-area"></div>
      </div>
    </section> -->
    <!-- /New Content Section -->

    <!-- View Section -->
    <!-- /View Section -->

  </main>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../assets/vendor/aos/aos.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../../assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/js/main.js"></script>

  <!-- table icons -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/script.min.js?h=9b720b676bbafcf8e89b710772661f3b"></script>
  
  <!-- Custom JS for Loading Content -->
  <script>
     function generateQRCode() {
      var qrcodeContainer = document.getElementById('qrcode');
      qrcodeContainer.innerHTML = '';
      var qrcode = new QRCode(qrcodeContainer, {
        text: "https://wa.me/601110781454", // Replace with your WhatsApp link
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
    function loadContent(action) {
      let xhr = new XMLHttpRequest();
      xhr.open('GET', action + '.php', true);
      xhr.onload = function() {
        if (this.status === 200) {
          document.getElementById('content-area').innerHTML = this.responseText;
        }
      };
      xhr.send();
    }
  </script>

  <!-- WhatsApp QR Code Modal -->
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
  </div>

</body>

</html>
