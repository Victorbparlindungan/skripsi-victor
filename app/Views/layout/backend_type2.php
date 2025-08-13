<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Trac Astra</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=base_url()?>/assets-frontend/images/logo.png" rel="icon">
  <link href="<?=base_url()?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>/assets/css/select2.min.css">
  

  <!-- Template Main CSS File -->
  <link href="<?=base_url()?>/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?=base_url()?>/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Trac Astra</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?=base_url('assets-admin/img/profile/'.$photoProfile);?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$name?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$name?></h6>
              <span><?=$level_name?></span>
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url()?>/profile">
                <i class="bi bi-box-arrow-right"></i>
                <span>Profile</span>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url()?>/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?=($url=='dashboard'?'':'collapsed')?>" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <?php if($level_name != 'warga'){?>
      <li class="nav-item">
        <a class="nav-link <?=($url=='surat'?'':'collapsed')?>" data-bs-target="#components-nav-8" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Surat Keterangan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-8" class="nav-content collapse <?=($url=='surat'?'show':'')?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/surat" class="<?=($url=='surat'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Surat Keterangan</span>
            </a>
          </li>
        </ul>
      </li>
      <?php }?>
      <li class="nav-item">
        <a class="nav-link <?=($url=='iuran'?'':($url=='iuran_admin'?'':($url == 'masteriuran'?'':'collapsed')))?>" data-bs-target="#components-nav-10" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Iuran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-10" class="nav-content collapse <?=($url=='iuran'?'show':($url=='iuran_admin'?'show':($url=='masteriuran'?'show':'')))?>" data-bs-parent="#sidebar-nav">
        
          <?php if($level_name == 'warga'){?>  
          <li>
            <a href="/iuran/<?=date('Y')?>" class="<?=($url=='iuran'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Iuran Bulanan</span>
            </a>
          </li>
          <?php }else{?>
          <li>
            <a href="/iuran_admin/<?=date('Y')?>/0" class="<?=($url=='iuran_admin'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Iuran Bulanan</span>
            </a>
          </li>
          <li>
            <a href="/masteriuran" class="<?=($url=='masteriuran'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Master Iuran</span>
            </a>
          </li>
          <?php }?>
        </ul>
      </li>
      <?php 
      if($level_name != 'warga'){
      ?>
      <li class="nav-item">
        <a class="nav-link <?=($url=='kasmasuk'?'':($url=='kaskeluar'?'':($url=='akunkas'?'':($url=='akunkascr'?'':($url=='akunkasdb'?'':($url=='reportKas'?'':'collapsed'))))))?>" data-bs-target="#components-nav-1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Kas RT</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-1" class="nav-content collapse <?=($url=='kasmasuk'?'show':($url=='kaskeluar'?'show':($url=='akunkas'?'show':($url=='akunkascr'?'show':($url=='akunkasdb'?'show':($url=='reportKas'?'show':''))))))?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/kasmasuk" class="<?=($url=='kasmasuk'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Kas Masuk</span>
            </a>
          </li>
          <li>
            <a href="/kaskeluar" class="<?=($url=='kaskeluar'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Kas Keluar</span>
            </a>
          </li>
          <li>
            <a href="/reportKas/0/<?=date('Y')?>" class="<?=($url=='reportKas'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Laporan Kas</span>
            </a>
          </li>
          <li>
            <a href="/akunkas" class="<?=($url=='akunkas'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Akun Kas</span>
            </a>
          </li>
          <li>
            <a href="/akunkascr" class="<?=($url=='akunkascr'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Akun Pengeluran</span>
            </a>
          </li>
          <li>
            <a href="/akunkasdb" class="<?=($url=='akunkasdb'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Akun Pemasukan</span>
            </a>
          </li>
          
        </ul>
      </li>
      <?php 
      }
      ?>
      
      <li class="nav-item">
        <a class="nav-link <?=($url=='ronda'?'':($url=='jadwal_ronda'?'':'collapsed'))?>" data-bs-target="#components-nav-11" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Ronda</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-11" class="nav-content collapse <?=($url=='ronda'?'show':($url=='jadwal_ronda'?'show':''))?>" data-bs-parent="#sidebar-nav">
          
          <?php if($level_name != 'warga'){?>
          <li>
            <a href="/ronda" class="<?=($url=='ronda'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Grup Ronda</span>
            </a>
          </li>
          <?php }?>
          <li>
            <a href="/jadwal_ronda" class="<?=($url=='jadwal_ronda'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Jadwal Ronda</span>
            </a>
          </li>
        </ul>
      </li>
      <?php 
      if($level_name != 'warga'){
      ?>
      <li class="nav-item">
        <a class="nav-link <?=($url=='level'?'':($url=='statuskeluarga'?'':($url=='warga'?'':($url=='masterblok'?'':'collapsed'))))?>" data-bs-target="#components-nav-2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Data Warga</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-2" class="nav-content collapse <?=($url=='level'?'show':($url=='statuskeluarga'?'show':($url=='warga'?'show':($url=='masterblok'?'show':''))))?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/warga" class="<?=($url=='warga'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Warga</span>
            </a>
          </li>
          <li>
            <a href="/statuskeluarga" class="<?=($url=='statuskeluarga'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Status Keluarga</span>
            </a>
          </li>
          <li>
            <a href="/masterblok" class="<?=($url=='masterblok'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Data Blok Komplek</span>
            </a>
          </li>
          <li>
            <a href="/level" class="<?=($url=='level'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Perangkat RT</span>
            </a>
          </li>
          
        </ul>
      </li>
      
      <?php }?>
      
      <?php if($level_name == 'warga'){?>
        <li class="nav-item">
        <a class="nav-link <?=($url=='profile'?'':'collapsed')?>" data-bs-target="#components-nav-6" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-6" class="nav-content collapse <?=($url=='profile'?'show':'')?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/profile" class="<?=($url=='profile'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Profile</span>
            </a>
          </li>
          
        </ul>
      </li>
      <?php }?>
      <li class="nav-item">
        <a class="nav-link <?=($url=='inventory'?'':($url=='statusinventory'?'':'collapsed'))?>" data-bs-target="#components-nav-4" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Aset RT</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-4" class="nav-content collapse <?=($url=='inventory'?'show':($url=='statusinventory'?'show':''))?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/inventory" class="<?=($url=='inventory'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Aset</span>
            </a>
          </li>
          <?php if($level_name != 'warga'){?>
          <li>
            <a href="/statusinventory" class="<?=($url=='statusinventory'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Master Kondisi Aset</span>
            </a>
          </li>
          <?php }?>
          
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link <?=($url=='kritiksaran'?'':'collapsed')?>" data-bs-target="#components-nav-7" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Kritik & Saran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-7" class="nav-content collapse <?=($url=='kritiksaran'?'show':'')?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/kritiksaran" class="<?=($url=='kritiksaran'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Kritik & Saran</span>
            </a>
          </li>
          
        </ul>
      </li>
      <?php if($level_name != 'warga'){?>
      <li class="nav-item">
        <a class="nav-link <?=($url=='user'?'':'collapsed')?>" data-bs-target="#components-nav-3" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Pengaturan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-3" class="nav-content collapse <?=($url=='user'?'show':'')?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/user" class="<?=($url=='user'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Pengguna</span>
            </a>
          </li>
          
        </ul>
      </li>
      <?php }?>
    </ul>

  </aside><!-- End Sidebar-->

	<?= $this->renderSection('content') ?>


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Trac Astra</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url()?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?=base_url()?>/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?=base_url()?>/assets/vendor/quill/quill.min.js"></script>
  <script src="<?=base_url()?>/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?=base_url()?>/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?=base_url()?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url()?>/assets/js/main.js"></script>

  <script src="<?=base_url()?>/assets/js/sweetalert.min.js"></script>
<script src="<?=base_url()?>/assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="<?=base_url()?>/assets/js/select2.min.js"></script>

<script >
    
  function change_password() {
    var newPassword = $('#newPassword').val().trim();
    var renewPassword = $('#renewPassword').val().trim();
    var currentPassword = $('#currentPassword').val().trim();
    var cek = 0;
    if(newPassword.length == 0 || renewPassword.length == 0 || currentPassword.length == 0){
      cek = 1;
      swal("Isi kolom terlebih dahulu", "", "error");
    }else{
      if(newPassword != renewPassword){
        cek = 1;
        $('#newPassword').val("");
        $('#renewPassword').val("");
        swal("Password Baru Tidak Sama", "", "error");
      }
    }
    if(cek == 0){
      $.ajax({
          type: "POST",
          url: '<?=$action2?>',
          data: { 
            currentPassword: currentPassword,
            newPassword: newPassword,
          },
          context: document.body
        }).done(function(data) {
          if(data == 1){
            $('#newPassword').val("");
            $('#renewPassword').val("");
            $('#currentPassword').val("");
            swal("Success", "Pasdword sudah diubah", "success");
          }else{
            swal("Password Lama Tidak Sama", "", "error");
          }
          console.log(data);
        })
    }
  }
  
  function bacaGambaredit(input)
    {
      if(input.files && input.files[0])
      {
        var reader = new FileReader();

        reader.onload = function (e){
          $('#gambar_edit').attr('src',e.target.result);
          console.log(e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
      
    }
    $('#gambar').change(function(){
        bacaGambaredit(this);
      })
    $(document).ready(function () {
        bacaGambaredit(this);
        });
</script>
</body>

</html>