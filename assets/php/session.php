<?php
    if (isset($_GET['home'])) {
        $_SESSION['home'] = true;
        unset($_SESSION['comment']);
        unset($_SESSION['customers']);
        unset($_SESSION['topup']);
        unset($_SESSION['help']);
        unset($_SESSION['setting']);
        unset($_SESSION['logout']);
        unset($_SESSION['transaksi']);
        header("location:home.php");
    }
    if (isset($_GET['transaksi'])) {
        $_SESSION['transaksi'] = true;
        unset($_SESSION['comment']);
        unset($_SESSION['customers']);
        unset($_SESSION['topup']);
        unset($_SESSION['help']);
        unset($_SESSION['setting']);
        unset($_SESSION['logout']);
        unset($_SESSION['home']);
        header("location:home.php");
    }
    if (isset($_GET['comment'])) {
        $_SESSION['comment'] = true;
        unset($_SESSION['transaksi']);
        unset($_SESSION['customers']);
        unset($_SESSION['topup']);
        unset($_SESSION['help']);
        unset($_SESSION['setting']);
        unset($_SESSION['logout']);
        unset($_SESSION['home']);
        header("location:home.php");
    }
    if (isset($_GET['customers'])) {
        $_SESSION['customers'] = true;
        unset($_SESSION['comment']);
        unset($_SESSION['tranksasi']);
        unset($_SESSION['topup']);
        unset($_SESSION['help']);
        unset($_SESSION['setting']);
        unset($_SESSION['logout']);
        unset($_SESSION['home']);
        header("location:home.php");
    }
    if (isset($_GET['topup'])) {
        $_SESSION['topup'] = true;
        unset($_SESSION['comment']);
        unset($_SESSION['customers']);
        unset($_SESSION['transaksi']);
        unset($_SESSION['help']);
        unset($_SESSION['setting']);
        unset($_SESSION['logout']);
        unset($_SESSION['home']);
        header("location:home.php");
    }
    if (isset($_GET['help'])) {
        $_SESSION['help'] = true;
        unset($_SESSION['comment']);
        unset($_SESSION['customers']);
        unset($_SESSION['topup']);
        unset($_SESSION['transaksi']);
        unset($_SESSION['setting']);
        unset($_SESSION['logout']);
        unset($_SESSION['home']);
        header("location:home.php");
    }
    if (isset($_GET['setting'])) {
        $_SESSION['setting'] = true;
        unset($_SESSION['comment']);
        unset($_SESSION['customers']);
        unset($_SESSION['topup']);
        unset($_SESSION['help']);
        unset($_SESSION['transaksi']);
        unset($_SESSION['logout']);
        unset($_SESSION['home']);
        header("location:home.php");
    }
    if (isset($_GET['signout'])) {
        $_SESSION['logout'] = true;
        unset($_SESSION['comment']);
        unset($_SESSION['customers']);
        unset($_SESSION['topup']);
        unset($_SESSION['help']);
        unset($_SESSION['setting']);
        unset($_SESSION['tranksaksi']);
        unset($_SESSION['home']);
        header("location:home.php");
    }
?>