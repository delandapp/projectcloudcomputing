<?php
ob_start();
session_start();
require "assets/php/function.php";
if (isset($_POST['button-registrasi'])) {
    registrasi($_POST);
}
if (isset($_POST['button-biodata'])) {
    biodata($_POST);
}
if (isset($_POST['button-login'])) {
    login($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Keuangan</title>
</head>
<body>
    <?php
        if(isset($_GET['registrasi']) && $_GET['registrasi'] == true) {
            require "assets/source/registrasi.html";
        } elseif (isset($_GET['biodata']) && $_GET['biodata'] == true){
            require "assets/source/biodata.html";
        } else {
            require "assets/source/login.html";
        }
        ?>
</body>
</html>