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
            if($validation->hasError('transport_type')) {
              $was_validated = "was-validated";
            }
          ?>
          <!-- Vertical Form -->
          <form action="<?=$action?>" class="row g-3 needs-validation <?=$was_validated?>" method="POST" novalidate>
							<input type="hidden" name="id" value="<?=$id?>">
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Jenis Kendaraan</label>
              <div class="input-group has-validation">
                <input type="text" name="transport_type" class="form-control" value="<?=$transport_type?>"  <?=($validation->hasError('transport_type')?'required=""':'')?>>
                <?php if($validation->hasError('transport_type')) {?>
                  <div class="invalid-feedback">
                        <?= $validation->getError('transport_type')?> 
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

