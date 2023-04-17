<?php 
    session_start();
    ob_start();
    require "assets/php/session.php";
    if(!isset($_SESSION['login'])) {
        header("location:login.php");
    }
    if ($_SESSION['level'] != 1) {
        if (isset($_SESSION['comment'])) {
            require "assets/source/comment.html";
        }
        if (isset($_SESSION['transaksi'])) {
            require "assets/source/transaksi.html";
        }
        if (isset($_SESSION['customers'])) {
            require "assets/source/customer.html";
        }
        if (isset($_SESSION['topup'])) {
            require "assets/source/topup.html";
        }
        if (isset($_SESSION['help'])) {
            
        }
        if (isset($_SESSION['logout'])) {
            unset($_SESSION['logout']);
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['setting'])) {}
        if (isset($_SESSION['home'])) {
            // header("location:home.php");
            require "assets/source/dashboard.php";
        }
    } else {
        require "assets/source/user.html";
    }
?>