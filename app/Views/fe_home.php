<?= $this->extend('layout/frontend') ?>
 
<?= $this->section('content') ?>

<div class="hero-wrap ftco-degree-bg" style="background-image: url('<?=base_url()?>/assets-frontend/images/home.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
      <div class="col-lg-8 ftco-animate">
        <div class="text w-100 text-center mb-md-5 pb-md-5">
          <h1 class="mb-4">Rental Kendaraan Terbaik Untuk Semua Kebutuhan Perjalanan</h1>
          <p style="font-size: 18px;">Kami mengerti bahwa setiap bisnis dan pribadi memiliki kebutuhan transportasi yang beragam. Oleh karena itu, TRAC menawarkan berbagai layanan sewa kendaraan sebagai solusi untuk memenuhi kebutuhan transportasi yang dapat disesuaikan dengan berbagai kebutuhan. </p>
          
        </div>
      </div>
    </div>
  </div>
</div>


<section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">Semua Kendaraan</span>
        <h2 class="mb-2">untuk Semua Perjalanan Anda</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="carousel-car owl-carousel">
          <?php 
            foreach ($list_transport as $key => $value) {
          ?>
          <div class="item">
            <div class="car-wrap rounded ftco-animate">
              <div class="img rounded d-flex align-items-end" style="background-image: url(<?=base_url()?>/assets/img/kendaraan/<?=$value['transport_image']?>);">
              </div>
              <div class="text">
                <h2 class="mb-0"><a href="#"><?=$value['transport_name']?></a></h2>
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
    </div>
  </div>
</section>

<section class="ftco-section ftco-about">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?=base_url()?>/assets-frontend/images/astragedung.jpg);">
      </div>
      <div class="col-md-6 wrap-about ftco-animate">
        <div class="heading-section heading-section-white pl-md-5">
          <span class="subheading">Tentang Kami</span>
          <h2 class="mb-4">Track Astra</h2>

          <p>TRAC memberikan pengalaman terbaik melalui solusi transportasi yang menyeluruh, mulai dari rental mobil, sewa bus, sewa motor, layanan pengemudi profesional, hinggal pengelolaan armada. Berawal dengan menyewakan lima mobil di tahun 1986, TRAC kini telah berkembang menjadi salah satu perusahaan transportasi terbesar Indonesia di bawah naungan PT Serasi Autoraya dan Grup Astra International. Hari ini, TRAC memiliki lebih dari 35 ribu kendaraan yang siap melayani dan mendukung mobilitas masyarakat Indonesia. Dengan profesionalitas yang dijunjung, TRAC telah dipercaya oleh ribuan pelanggan bisnis maupun individu.

 

Tentu kesuksesan ini bisa diraih berkat komitmen TRAC memberikan kepuasan pelanggan yang maksimal. Sejalan dengan pergantian zaman, kami memahami masyarakat memiliki tingkat mobilitas yang terus meningkat dan kebutuhan yang berbeda-beda. Menjawab semua itu, TRAC terus berinovasi memberikan beragam layanan solusi transportasi komprehensif yang mengedepankan efisiensi keamanan dan kenyamanan untuk segala kebutuhan Anda. 

 

Dengan seluruh layanan yang kami tawarkan, kami meyakini bahwa TRAC dapat menjadi mitra perjalanan terbaik Anda yang dapat diandalkan dalam segala situasi.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Layanan Kami</span>
        <h2 class="mb-3">Kami menyediakan berbagai layanan rental mobil dan solusi transportasi untuk memenuhi kebutuhan pribadi Anda, mulai dari rental jangka pendek, personal leasing, sewa bus, hingga paket wisata.</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">TRACtoGo</h3>
            <p>TRACtoGo merupakan platform berbagai layanan penyewaan kendaraan untuk kebutuhan pribadi Anda. Kami menyediakan rental mobil harian dengan atau tanpa pengemudi, airport transfer, layanan bus, hingga paket wisata menarik melalui TRACtoGo Experience. </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">TRAC Personal Leasing</h3>
            <p>TRAC Personal Leasing merupakan layanan sewa mobil bulanan untuk kebutuhan personal. TRAC menjamin setiap armada mobil yang disewakan kondisinya baik dan siap pakai. Sewa mobil bulanan di TRAC pastinya bikin kamu lebih tenang, karena diberikan jaminan pelayanan penuh selama 24 jam. Jadi untuk urusan servis rutin ke bengkel hingga perpanjang STNK tahunan, semuanya ditanggung oleh pihak TRAC.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">TRAC Bus Services</h3>
            <p>TRAC Bus Services merupakan layanan sewa bus pariwisata yang siap memberikan solusi transportasi untuk kebutuhan perjalanan dalam jumlah besar, seperti liburan, pernikahan, wisuda, ziarah, atau menghadiri acara-acara lainnya. TRAC punya beragam jenis bus yang bisa disewa mulai dari small bus, medium bus, big bus, hingga luxury bus dengan kapasitas 11 hingga 59 penumpang, serta dilengkapi berbagai fasilitas dan bisa disesuaikan dengan kebutuhan.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- <section class="ftco-counter ftco-section img bg-light" id="section-counter">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="60">0</strong>
            <span>Year <br>Experienced</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="1090">0</strong>
            <span>Total <br>Cars</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="2590">0</strong>
            <span>Happy <br>Customers</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text d-flex align-items-center">
            <strong class="number" data-number="67">0</strong>
            <span>Total <br>Branches</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>	 -->
<?= $this->endSection() ?>

