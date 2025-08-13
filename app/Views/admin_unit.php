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
                <a href="<?=$add.'/'.$id_transport?>" class="btn btn-primary shadow btn-xs sharp me-1" style="background-color:#2246a8"> Tambah </a>
                <a href="/transport" class="btn btn-secondary shadow btn-xs sharp me-1" style="background-color:#2246a8"> Kembali ke Halaman Sebelumnya </a>
              </h5>
             
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th class="text-center" width="50px">No</th>
                    <th >Unit Kendaraan</th>
                    <th >Plat Nomor</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no =1;
                    foreach ($list_unit as $key => $value) {
                  ?>
                  <tr>
                    <td class="text-center"><?=$no++?></td>
                    <td><?= $value['transport_name']?></td>
                    <td><?= $value['plat_number']?></td>
                    <td>
                        <a href="<?=$update.'/'.$id_transport.'/'.$value['id']?>" class="btn btn-warning shadow btn-xs sharp me-1">Ubah</a>
                        <a id="<?=$id_transport.'/'.$value['id']?>" href="#" class="btn btn-danger shadow btn-xs sharp hapus" onclick="myFunction(<?=$value['id']?>)">Hapus</a>
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

