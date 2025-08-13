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
            if($validation->hasError('plat_number')) {
              $was_validated = "was-validated";
            }
          ?>
          <!-- Vertical Form -->
          <form action="<?=$action?>" class="row g-3 needs-validation <?=$was_validated?>" method="POST" novalidate>
							<input type="hidden" name="id" value="<?=$id?>">
							<input type="hidden" name="id_transport" value="<?=$id_transport?>">
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Kendaraan</label>
                <div class="input-group has-validation">
                  <input type="text" name="transport_name" class="form-control" value="<?=$transport_name?>"  readonly>
                </div>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Plat Nomor</label>
                <div class="input-group has-validation">
                  <input type="text" name="plat_number" class="form-control" value="<?=$plat_number?>"  <?=($validation->hasError('plat_number')?'required=""':'')?>>
                  <?php if($validation->hasError('plat_number')) {?>
                    <div class="invalid-feedback">
                          <?= $validation->getError('plat_number')?> 
                    </div>
                  <?php }?>
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

