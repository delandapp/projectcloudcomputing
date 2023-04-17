<?php

require_once('../function/helper.php');
require_once('../function/koneksi.php');

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM pegawai WHERE id = $id");
header("location:" . BASE_URL . 'dashboard.php?page=home&status=success');
