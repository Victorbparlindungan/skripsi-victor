<?= $this->extend('layout/frontend') ?>
 
<?= $this->section('content') ?>

 
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url()?>/assets-frontend/images/minibus.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="/">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Kendaraan <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-3 bread">Kendaraan</h1>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      <?php
        foreach ($list_transport as $key => $value) {
      ?>
      <div class="col-md-4">
        <div class="car-wrap rounded ftco-animate">
          <div class="img rounded d-flex align-items-end" style="background-image: url(<?=base_url()?>/assets/img/kendaraan/<?=$value['transport_image']?>);">
          </div>
          <div class="text">
            <h2 class="mb-0"><a href="car-single.html"><?=$value['transport_name']?></a></h2>
            <div class="d-flex mb-3">
              <span class="cat"><?=$value['transport_type']?></span>
                  <p class="price ml-auto"><?=number_format($value['price'])?> <span>/hari</span></p>
            </div>
            <p class="d-flex "><a href="/booking_payment/<?=$value['id']?>" class="btn btn-primary py-2 mr-1">Pesan Sekarang</a> </p>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
  </div>
</section>


<?= $this->endSection() ?>

