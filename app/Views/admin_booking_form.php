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
          ?>
          <!-- Vertical Form -->
          <form action="<?=$action?>" class="row g-3 needs-validation <?=$was_validated?>" method="POST" novalidate>
							<input type="hidden" name="id" value="<?=$id?>">
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Kendaraan</label>
                <div class="input-group has-validation">
                  <input type="text" name="transport_name" class="form-control" value="<?=$transport_name?>"  readonly>
                </div>
              </div>
            
              <div class="col-6">
                <label for="inputNanme4" class="form-label">Tanggal Dari</label>
                <div class="input-group has-validation">
                  <input type="date" name="transport_name" class="form-control" value="<?=$date_start?>"  readonly>
                </div>
              </div>
              <div class="col-6">
                <label for="inputNanme4" class="form-label">Tanggal Sampai</label>
                <div class="input-group has-validation">
                  <input type="date" name="transport_name" class="form-control" value="<?=$date_end?>"  readonly>
                </div>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Harga</label>
                <div class="input-group has-validation">
                  <input type="text" name="transport_name" class="form-control" value="<?=number_format($total_price)?>"  readonly>
                </div>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Nama Pemesan</label>
                <div class="input-group has-validation">
                  <input type="text" name="transport_name" class="form-control" value="<?=$booking_name?>"  readonly>
                </div>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Hp Pemesan</label>
                <div class="input-group has-validation">
                  <input type="text" name="transport_name" class="form-control" value="<?=$booking_phone?>"  readonly>
                </div>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Alamat Pemesan</label>
                <div class="input-group has-validation">
                  <input type="text" name="transport_name" class="form-control" value="<?=$booking_address?>"  readonly>
                </div>
              </div>
              <div class="col-12">
                <label>Pilih Unit <?=$transport_name?></label>
                <select name="id_unit" class="form-control select2" style="width:100%" >
                  <?php foreach ($list_unit as $key => $value) { ?>
                    <option value="<?=$value['id']?>" <?=($value['id'] == $id_unit?'selected':'')?>><?=$value['plat_number']?></option>
                  <?php } ?>
                </select>
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

