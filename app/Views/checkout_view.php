<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="py-4 text-center">
    <h2>Checkout form</h2>
  </div>
  <?php if (session()->has('validation_errors')): ?>
    <div class="alert alert-danger" role="alert">
        <?= implode('<br>', session('validation_errors')) ?>
    </div>
  <?php endif; ?>
  <form class="needs-validation" action="/order" method="POST">
  <div class="row mb-4">
    <div class="col-md-4 order-md-2 mb-4">
      
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Keranjangmu</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex align-items-center justify-content-between lh-condensed">
          <div>
            <h6 class="my-1"><?= $product['nama'] ?></h6>
            <div class="d-flex input-group input-group-sm align-items-center">
              <span class="text-muted fw-light">Jumlah</span>
              <input id="quantity" name="quantity" type="number" class="form-control no-focus-outline mx-3 focus-none" value="1" min="1" max="<?= $product['stok'] ?>">
            </div>
          </div>
          <p class="text-muted">Rp. <span id="harga"><?= number_format($product['harga'], 0, ',', '.'); ?></span></p>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Sisa Stok</span>
          <strong><span id="remainingStock"><?= $product['stok'] ?></span></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (Rupiah)</span>
          <strong>Rp <span id="total"><?= number_format($product['harga'], 0, ',', '.'); ?></span></strong>
        </li>
        
      </ul>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Alamat Pengantaran</h4>
        <div class="mb-3">
          <input type="text" class="form-control" id="address" name="address" placeholder="Tulis alamatmu..." required>
        </div>

        <h4 class="mb-3">Tipe Pengiriman</h4>

        <ul class="list-group mb-3">
            <li class="list-group-item d-flex flex-row align-items-center justify-content-between lh-condensed">
                <div class="d-flex flex-column">
                    <div class="custom-control custom-radio">
                        <input id="instantmotor" name="shipping" type="radio" class="my-0 custom-control-input" value="15000" checked required>
                        <label class="custom-control-label" for="instan">Instan - Motor</label>
                    </div>
                    <small class="text-muted">1-2 jam - Maks. 20 kg</small>
                </div>
                <span class="text-muted">Rp 15.000</span>
            </li>
            <li class="list-group-item d-flex flex-row align-items-center justify-content-between lh-condensed">
                <div class="d-flex flex-column">
                    <div class="custom-control custom-radio">
                        <input id="samedaymotor" name="shipping" type="radio" class="my-0 custom-control-input" value="8000" required>
                        <label class="custom-control-label" for="instan">SameDay - Motor</label>
                    </div>
                    <small class="text-muted">6-8 jam - Maks. 5 kg</small>
                </div>
                <span class="text-muted">Rp 8.000</span>
            </li>
            <li class="list-group-item d-flex flex-row align-items-center justify-content-between lh-condensed">
                <div class="d-flex flex-column">
                    <div class="custom-control custom-radio">
                        <input id="instantmobil" name="shipping" type="radio" class="my-0 custom-control-input" value="25000" required>
                        <label class="custom-control-label" for="instan">Instant - Mobil</label>
                    </div>
                    <small class="text-muted">1-2 jam - Maks. 100 kg</small>
                </div>
                <span class="text-muted">Rp 25.000</span>
            </li>
        </ul>

        <h4 class="mb-3">Payment</h4>

        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div class="custom-control custom-radio">
                <input id="cash" name="paymentMethod" type="radio" class="custom-control-input" value="cash" checked required>
                <label class="custom-control-label" for="cash">Cash</label>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div class="custom-control custom-radio">
                <input id="hemart" name="paymentMethod" type="radio" class="custom-control-input" value="hemartpay" required>
                <label class="custom-control-label" for="hemart">HeMart Pay</label>
            </div>
            </li>
        </ul>
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        <input type="hidden" name="supermarket_id" value="<?= $supermarket ?>">
        <input type="hidden" name="user_id" value="<?= $user ?>">
        <input type="hidden" id="remainingStockInput" name="remainingStock" value="<?= $product['stok'] ?>">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
    </div>
  </div>
  </form>
</div>
<script>
  var quantityInput = document.getElementById('quantity');
  var totalElement = document.getElementById('total');
  var remainingStockElement = document.getElementById('remainingStock');
  var remainingStockInput = document.getElementById('remainingStockInput');
  var shippingRadios = document.querySelectorAll('input[name="shipping"]');
  var initialStock = <?= $product['stok'] ?>; // Tambahkan ini

  function updateTotal() {
    var quantity = quantityInput.value;
    var maxQuantity = parseInt(quantityInput.getAttribute('max'));
    var harga = <?= $product['harga'] ?>;
    var shippingCost = 0;

    shippingRadios.forEach(function (radio) {
      if (radio.checked) {
        shippingCost = parseInt(radio.value);
      }
    });

    var total = quantity * harga + shippingCost;

    totalElement.innerText = total.toLocaleString('id-ID');
    remainingStockElement.innerText = initialStock - quantity;

    // Perbarui nilai input tersembunyi
    remainingStockInput.value = initialStock - quantity;

    if (quantity > maxQuantity) {
      alert('Stok tidak cukup, hanya ada ' + maxQuantity);
    }
  }

  quantityInput.addEventListener('input', updateTotal);

  shippingRadios.forEach(function (radio) {
    radio.addEventListener('change', updateTotal);
  });

  updateTotal();
</script>



<?= $this->endSection(); ?>