<?php

require_once('function/helper.php');
require_once('function/koneksi.php');

$process = isset($_GET['process']) ? ($_GET['process']) : false;
if ($_SESSION["id"] == null) {
    header("location: " . BASE_URL);
    exit();
}

$id = isset($_GET['id']) ? ($_GET['id']) : false;

$pegawai = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id = $id"));

$error =  isset($_GET['emptyform']) ? ($_GET['emptyform']) : false;

?>


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <?php
                if ($error == "true") : ?>
                    <div class="alert alert-danger" role="alert">
                        Proses gagal, pastikan semuar formulir terisi
                    </div>
                <?php endif; ?>
                <div class="row">
                    <h1 style="text-align: center; color: #185ADB;">Form Edit Pegawai</h1>
                </div>
                <form method="POST" action="<?= BASE_URL . 'process/process_edit.php' ?>">
                    <input name="id" value="<?= $pegawai['id'] ?>" type="hidden">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $pegawai['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="noid" class="form-label">Nomor ID</label>
                        <input type="number" class="form-control" id="noid" name="noid" value="<?= $pegawai['noid'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">Nomor HP</label>
                        <input type="number" class="form-control" id="nohp" name="nohp" value="<?= $pegawai['nohp'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $pegawai['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pegawai['alamat'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>