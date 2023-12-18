<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold"><?= $user['firstname'] . " " . $user['lastname']; ?></span>
                <span class="text-black-50"><?= $user['phone']; ?></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form class="needs-validation" action="/profile" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">First Name</label>
                            <input type="text" name="firstname" class="form-control" value="<?= $user['firstname']; ?>">
                        </div>
                        <div class="col-md-6"><label class="labels">Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="<?= $user['lastname']; ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">New Password</label>
                            <input type="password" name="password" class="form-control" value="">
                        </div>
                        <div class="col-md-6"><label class="labels">Confirm Password</label>
                            <input type="password" name="password_confirm" class="form-control" value="">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">
                            Save Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>