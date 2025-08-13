<?= $this->extend('layout/backend') ?>
 
<?= $this->section('content') ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?=$judul_page?></h1>
      <nav>
        <ol class="breadcrumb" style="background-color:#2246a8">
          <li class="breadcrumb-item"><a href=""><?=$judul_page?></a></li>
          <li class="breadcrumb-item">Tabel</li>
          <li class="breadcrumb-item active"style=" color: #fff"><?=$sub_judul_page?></li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?=$judul_page?> 
              </h5>
             
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th class="text-center" width="50px">No</th>
                    <th >Kendaraan</th>
                    <th >Tgl</th>
                    <th >Nana Pemesan</th>
                    <th >Hp</th>
                    <th >Alamat</th>
                    <th >Unit</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no =1;
                    foreach ($list_booking as $key => $value) {
                      if($value['date_start'] == $value['date_end']){
                        $tgl = date('d F Y',strtotime($value['date_start']));
                      }else{ 
                        $tgl = date('d F Y',strtotime($value['date_start']))." sampai ".date('d F Y',strtotime($value['date_end']));
                      }
                  ?>
                  <tr>
                    <td class="text-center"><?=$no++?></td>
                    <td><?= $value['transport_name']?></td>
                    <td><?= $tgl?></td>
                    <td><?= $value['booking_name']?></td>
                    <td><?= $value['booking_phone']?></td>
                    <td><?= $value['booking_address']?></td>
                    <td><?= $value['plat_number']?></td>
                    <td>
                        <?php
                        if($value['status'] != "DONE"){
                          if( $value['date_end'] < date('Y-m-d')){
                        ?>
                        <a href="<?='/done/'.$value['id']?>" class="btn btn-danger shadow btn-xs sharp me-1">Sudah dikembalikan</a>
                        <?php
                          }else{
                          ?><a href="<?=$update.'/'.$value['id']?>" class="btn btn-warning shadow btn-xs sharp me-1">Pilih Unit</a>
                        
                          <?php
                          }
                        }
                        ?>
                    </td>
                  </tr>
                  <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
<?= $this->endSection() ?>

