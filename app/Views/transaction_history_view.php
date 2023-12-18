<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container">
        <div class="text-center mt-4">
            <h2 class="text-primary">Riwayat Transaksi</h2>
        </div>
        <div class="d-flex flex-column p-3 items-center">
        <?php if (empty($transactions)) : ?>
            <p class="text-center text-body-secondary fs-5">Belum ada transaksi</p>
        <?php else : ?>
            <?php foreach ($transactions as $transaction) : ?>
                <ul class="list-group list-group-horizontal mx-auto my-2">
                    <li class="list-group-item"><?= $products[$transaction['product_id']]?></li>
                    <li class="list-group-item"><?= $transaction['quantity']?></li>
                    <li class="list-group-item">Rp <?= $transaction['delivery_cost']?></li>
                    <li class="list-group-item"><?= $transaction['address']?></li>
                    <li class="list-group-item"><?= $transaction['created_at']?></li>
                </ul>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
<?= $this->endSection(); ?>