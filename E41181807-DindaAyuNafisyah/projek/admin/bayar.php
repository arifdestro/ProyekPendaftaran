<?php

include 'includes/connector.php'; 
include 'includes/header.php' ;
include 'includes/sidebar.php' ;

//SELECT WARNA
$result = mysqli_query($koneksi, 
    "SELECT daftar.ID_DAFTAR, daftar.TGL, user.NAMA_USER, bayar.ID_BAYAR, bayar.TGL_BAYAR, daftar.STATUS 
    FROM daftar, bayar, user WHERE daftar.ID_USER = user.ID_USER 
    AND bayar.ID_DAFTAR = daftar.ID_DAFTAR");
?>
<div id="content-wrapper">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Siswa</li>
        </ol>

    <!-- DataTales Example -->
    <div class="card  mb-4">
        <div class="card-header py-2">
            <h3 class="mt-2 font-weight-bold float-left text-primary">Daftar Bayar</h3>
            <!-- <button class="mt-2 btn btn-primary float-right ml-auto" data-toggle="modal" data-target="#tambah_produk">Tambah Data</button> -->
        </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAMA USER</th>
                            <th>TGL DAFTAR</th>
                            <th>ID DAFTAR</th>
                            <th>TGL BAYAR</th>
                            <th>ID BAYAR</th>
                            <th>STATUS</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        while ($data_transaksi = mysqli_fetch_assoc($result)) {
                            $NAMA_USER = $data_transaksi['NAMA_USER'];
                            $TGL = $data_transaksi['TGL'];
                            $ID_DAFTAR = $data_transaksi['ID_DAFTAR'];
                            $TGL_BAYAR = $data_transaksi['TGL_BAYAR'];
                            $ID_BAYAR = $data_transaksi['ID_BAYAR'];
                            $STATUS = $data_transaksi['STATUS'];
                            $i += 1;
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td "><?= $NAMA_USER ?></td>
                                <td ><?= $TGL ?></td>
                                <td ><?= $ID_DAFTAR ?></td>
                                <td ><?= $TGL_BAYAR ?></td>
                                <td ><?= $ID_BAYAR ?></td>
                                <td  class="text-center">
                                    <?php if ($STATUS == 0) {
                                            echo '<span class="badge badge-pill badge-info px-3">Belum Bayar</span>';
                                        } else if ($STATUS == 1) {
                                            echo '<span class="badge badge-pill badge-primary px-3">Sudah Bayar</span>';
                                        }?></td>
                                <td >
                                    <div class="block ml-auto text-center">
                                        <a href="bayar_info.php?ID_DAFTAR=<?= $ID_DAFTAR ?>" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-info"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
?>