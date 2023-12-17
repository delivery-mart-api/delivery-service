<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container">
        <div class="text-center mt-4">
            <h2 class="text-primary">Cari supermarket terdekat!</h2>
        </div>
        <div class="d-flex flex-wrap p-3">
        <?php foreach($supermarkets as $supermarket) : ?>
            <!-- Supermarket card -->
            <div class="card p-2 mx-2 my-4" style="width: 18rem">
                <img class="card-img-top" src="https://awsimages.detik.net.id/community/media/visual/2019/11/28/782baf48-5106-4de3-a06a-74d4346a84a9_169.jpeg?w=1200" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $supermarket['supermarket_username']?></h5>
                    <p class="card-text"><?= $supermarket['supermarket_address']?></p>
                    <a href="/supermarket/<?= $supermarket['supermarket_id']?>" class="btn btn-primary">Kunjungi</a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
<?= $this->endSection(); ?>