<?= $this->extend('layout/backend') ?>
 
<?= $this->section('content') ?>


<main id="main" class="main">

<div class="pagetitle">
  <h1><?=$judul_page?></h1>
  <nav>
    <ol class="breadcrumb" style="background-color:#2246a8">
      <li class="breadcrumb-item"><a href=""><?=$judul_page?></a></li>
      <li class="breadcrumb-item">Formulir</li>
      <li class="breadcrumb-item active"style=" color: #fff"><?=$sub_judul_page?></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">

    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?=$judul_page?></h5>
          <?php 
            $was_validated = "";
            if($validation->hasError('transport_name')) {
              $was_validated = "was-validated";
            }
          ?>
          <!-- Vertical Form -->
          <form action="<?=$action?>" class="row g-3 needs-validation <?=$was_validated?>" method="POST" enctype="multipart/form-data" novalidate>
							<input type="hidden" name="id" value="<?=$id?>">
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Kendaraan</label>
              <div class="input-group has-validation">
                <input type="text" name="transport_name" class="form-control" value="<?=$transport_name?>"  <?=($validation->hasError('transport_name')?'required=""':'')?>>
                <?php if($validation->hasError('transport_name')) {?>
                  <div class="invalid-feedback">
                        <?= $validation->getError('transport_name')?> 
                  </div>
                <?php }?>
              
              </div>
            </div>
            
            <div class="col-12">
              <label>Pilih Jenis Kendaraan</label>
              <select name="id_transport_type" class="form-control select2" style="width:100%" >
                <?php foreach ($list_type as $key => $value) { ?>
                  <option value="<?=$value['id']?>" <?=($value['id'] == $id_transport_type?'selected':'')?>><?=$value['transport_type']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Harga Sewa Kendaraan per Hari</label>
              <div class="input-group has-validation">
                <input type="text" name="price" class="form-control number" value="<?=number_format($price)?>"  required="">
              </div>
            </div>
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Foto Kendaraan</label>
              <div class="input-group has-validation">
                    <input type="file" name="file_upload" id="transport_image_input" class="pull-left" onchange="read_transport_image(this);">
                    <img src="<?=base_url('assets/img/kendaraan/'.$transport_image);?>" id="transport_image"alt="Profile"/>
              </div>
            </div>
            
               
            <div class="text-center">
              <button type="submit" class="btn btn-primary" style="background-color:#2246a8">Simpan</button>
              <a href="<?=$back?>" class="btn btn-secondary">Batal</a>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
<?= $this->endSection() ?>

