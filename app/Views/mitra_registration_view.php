<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    MITRA REGISTER 
                </div>
                <div class="card-body">
                <?php if(session()->getFlashdata('error')) :?>
                    <div class="alert alert-danger">
                        <? session()->getFlashdata('error')?>
                    </div>
                <?php endif;?>
                    <form action="/mitra/register" method="POST">
                        <div class="mb-3">
                            <label for="inputName" class="form-label">
                                Name
                            </label>
                            <input type="text" name="supermarket_name" class="form-control" value="<?php echo session()->getFlashdata('supermarket_name')?>" id="inputFN">
                        </div>
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">
                                Username
                            </label>
                            <input type="text" name="supermarket_username" class="form-control" value="<?php echo session()->getFlashdata('supermarket_username')?>" id="inputLN">
                        </div>
                        <div class="mb-3">
                            <label for="inputAddress" class="form-label">
                                Address
                            </label>
                            <input type="text" name="supermarket_address" class="form-control" value="<?php echo session()->getFlashdata('supermarket_address')?>" id="inputLN">
                        </div>
                        <div class="mb-3">
                            <label for="inputPhone" class="form-label">
                                Telephone
                            </label>
                            <input type="text" name="supermarket_telephone" class="form-control" id="inputPhone">
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">
                                Password
                            </label>
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                        <div class="mb-3">
                            <label for="inputPasswordConfirm" class="form-label">
                                Password Confirm
                            </label>
                            <input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Buat Akun">
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>