<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="item-center justify-content-lg-center max-height: 100%">
        <div class="text-center">
            <h1>Belanja Cepat, Belanja HeMart!</h1>
        </div>
        <div class="container mt-5 col-5">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    REGISTER
                </div>
                <div class="card-body">
                    <?php if(session()->getFlashdata('error')) :?>
                        <div class="alert alert-danger">
                            <?php echo implode('<br>', session()->getFlashdata('error')); ?>
                        </div>
                    <?php endif; ?>
                    <form action="/register" method="POST">
                        <div class="mb-3">
                            <label for="inputFn" class="form-label">
                                First Name
                            </label>
                            <input type="text" name="firstname" class="form-control" value="<?php echo session()->getFlashdata('firstname')?>" id="inputFN" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputLn" class="form-label">
                                Last Name
                            </label>
                            <input type="text" name="lastname" class="form-control" value="<?php echo session()->getFlashdata('lastname')?>" id="inputLN" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPhone" class="form-label">
                                Phone
                            </label>
                            <input type="text" name="phone" class="form-control" id="inputPhone" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">
                                Password
                            </label>
                            <input type="password" name="password" class="form-control" id="inputPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPasswordConfirm" class="form-label">
                                Password Confirm
                            </label>
                            <input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Buat Akun" required>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class='my-2 d-flex justify-content-between'>
                <a href='/mitra/register' class='text-primary fw-5'>Ingin menjadi mitra kami?</a>
                <a href='/' class='text-primary fw-5'>Login sebagai pengguna</a>
            </div>
        </div>
    </div>
</body>
</html>