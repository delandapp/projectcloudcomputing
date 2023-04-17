<?php

require_once('function/helper.php');
require_once('function/koneksi.php');

$process = isset($_GET['process']) ? ($_GET['process']) : false;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/style01.css' ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="topbar">
        <h3 class="text-topbar">@belajaryuk</h3>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0099ff" fill-opacity="1" d="M0,192L60,192C120,192,240,192,360,208C480,224,600,256,720,261.3C840,267,960,245,1080,218.7C1200,192,1320,160,1380,144L1440,128L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
    </svg>

    <div class="content">
        <div class="card-login">
            <div class="card-main">
                <div class="card-header">Form Register</div>
                <div class="card-body">
                    <?php if ($process == 'failedempty') : ?>
                        <div class="alert alert-danger" style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
                            Register gagal, terdapat form yang kosong
                        </div>
                    <?php endif; ?>
                    <?php if ($process == 'failedusername') : ?>
                        <div class="alert alert-danger" style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
                            Register gagal, username sudah terdaftar di database
                        </div>
                    <?php endif; ?>
                    <?php if ($process == 'failedpassword') : ?>
                        <div class="alert alert-danger" style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
                            Register gagal, password tidak sesuai
                        </div>
                    <?php endif; ?>
                    <form class="form-login" method="POST" action="<?= BASE_URL . 'process/process_register.php' ?>">
                        <label class="form-label">Username</label>
                        <input type="username" name="username" class="form-input">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-input">
                        <label class="form-label">Re-Password</label>
                        <input type="password" name="repassword" class="form-input">
                        <button type="submit" class="btn btn-login">Register</button>
                    </form>
                    <p style="text-align: center;">Sudah punya akun?<span><a href="<?= BASE_URL . "index.php" ?>" class=""> Masuk disini</a></span></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>