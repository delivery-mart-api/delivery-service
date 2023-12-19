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
                <?php
                usort($transactions, function ($a, $b) {
                    return strtotime($b['created_at']) - strtotime($a['created_at']);
                });
                ?>
                <table class="table table-bordered mb-3">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Kuantitas</th>
                            <th>Biaya Pengiriman</th>
                            <th>Alamat Kirim</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $transaction) : ?>
                            <tr>
                                <td><?= $products[$transaction['product_id']] ?></td>
                                <td><?= $transaction['quantity'] ?></td>
                                <td>Rp <?= $transaction['delivery_cost'] ?></td>
                                <td><?= $transaction['address'] ?></td>
                                <td><?= $transaction['created_at'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
<?= $this->endSection(); ?>
