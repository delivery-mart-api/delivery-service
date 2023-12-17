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
                    LOGIN
                </div>
                <div class="card-body">
                    <form action="/" method="POST">
                        <?php if(session()->getFlashdata('error')) :?>
                            <div class="alert alert-danger">
                                <?php echo session()->getFlashdata('error')?>
                            </div>
                        <?php endif;?>
                        <div class="mb-3">
                            <label for="inputPhone" class="form-label">
                                Phone Number
                            </label>
                            <input type="text" name="phone" class="form-control" value="<?php echo session()->getFlashdata('phone')?>" id="inputPhone">
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">
                                Password
                            </label>
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class='my-2'>
                <a href='/register' class='text-primary fw-5'>Belum punya akun?</a>
            </div>
        </div>
    </div>
</body>
</html>