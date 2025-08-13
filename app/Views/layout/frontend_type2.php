
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Trac Astra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
  <link href="<?=base_url()?>/assets-frontend/images/logo.png" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url()?>/assets-frontend/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets-frontend/css/animate.css">
    
    <link rel="stylesheet" href="<?=base_url()?>/assets-frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets-frontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets-frontend/css/magnific-popup.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets-frontend/css/aos.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets-frontend/css/ionicons.min.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets-frontend/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets-frontend/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?=base_url()?>/assets-frontend/css/flaticon.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets-frontend/css/icomoon.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets-frontend/css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/"><img src="<?=base_url()?>/assets-frontend/images/logo.png" width="100px"alt=""></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item <?=($menu == 'home'?'active':'')?>"><a href="/" class="nav-link"  style="color:#000">Beranda</a></li>
	          <li class="nav-item <?=($menu == 'about'?'active':'')?>"><a href="/about" class="nav-link" style="color:#000">Tentang Kami</a></li>
	          <li class="nav-item <?=($menu == 'rent'?'active':'')?>"><a href="/rent" class="nav-link"style="color:#000">Kendaraan</a></li>
	          <li class="nav-item <?=($menu == 'contact'?'active':'')?>"><a href="/contact" class="nav-link"style="color:#000">Kontak</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
	<?= $this->renderSection('content') ?>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-8">
              <h2 class="ftco-heading-2"><a href="#" class="logo"><img src="<?=base_url()?>/assets-frontend/images/logo.png" width="100px"alt=""></a></h2>
              <p>Rental Kendaraan Terbaik Untuk Semua Kebutuhan Perjalanan</p>
              <p>Kami mengerti bahwa setiap bisnis dan pribadi memiliki kebutuhan transportasi yang beragam. Oleh karena itu, TRAC menawarkan berbagai layanan sewa kendaraan sebagai solusi untuk memenuhi kebutuhan transportasi yang dapat disesuaikan dengan berbagai kebutuhan. </p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Hubungi Kami</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jalan Condet Raya No. 15, RT.5/RW.1, Gedong, Ps. Rebo, Kota Jakarta Timur, DKI Jakarta 13767</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">628111873210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">trac.astrarentcar@ai.astra.co.id</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?=base_url()?>/assets-frontend/js/jquery.min.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/popper.min.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/jquery.easing.1.3.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/jquery.waypoints.min.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/jquery.stellar.min.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/jquery.magnific-popup.min.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/aos.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/jquery.animateNumber.min.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/bootstrap-datepicker.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/jquery.timepicker.min.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?=base_url()?>/assets-frontend/js/google-map.js"></script>
  <script src="<?=base_url()?>/assets-frontend/js/main.js"></script>
    
  </body>
</html>