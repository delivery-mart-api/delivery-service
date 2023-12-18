<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section style="">
  <div class="text-center container py-5">
    <h4 class="mt-4 mb-5"><strong>Rekomendasi Untuk Kamu</strong></h4>
    <div class="row">
    <?php foreach($recommendations as $recommendation) : ?>
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/shoes%20(3).webp"
              class="w-100" />
            <a href="#!">
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
            </a>
          </div>
          <div class="card-body">
            <a href="" class="text-reset">
              <h5 class="card-title mb-3"><?= $recommendation['nama']?></h5>
            </a>
            <h6 class="mb-3">
              <p>Rp <?= number_format($recommendation['harga'], 0, ',', '.'); ?></p>
            </h6>
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="/supermarket/<?= $supermarket ?>/checkout/<?= $recommendation['id'] ?>" class="btn btn-primary">Beli</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>

    <h4 class="mt-4 mb-5"><strong>Catalog</strong></h4>
    <div class="row">
    <?php foreach($products as $product) : ?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/shoes%20(3).webp"
              class="w-100" />
            <a href="#!">
              <div class="mask">
                <div class="d-flex justify-content-start align-items-end h-100">
                  <h5><span class="badge bg-success ms-2">Stok : <?= $product['stok'] ?></span></h5>
                </div>
              </div>
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
            </a>
          </div>
          <div class="card-body">
            <a href="" class="text-reset">
              <h5 class="card-title mb-3"><?= $product['nama']?></h5>
            </a>
            <h6 class="mb-3">
              <p>Rp <?= number_format($product['harga'], 0, ',', '.'); ?></p>
            </h6>
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="/supermarket/<?= $supermarket ?>/checkout/<?= $product['id'] ?>" class="btn btn-primary">Beli</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>