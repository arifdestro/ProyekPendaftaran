<?php
include 'includes/connector.php';
if (isset($_GET['ID_DAFTAR'])) {
    $id_daftar = $_GET['ID_DAFTAR'];
    $data = mysqli_query($koneksi, "SELECT * FROM daftar WHERE ID_DAFTAR='$id_daftar'");
    $data_transaksi = mysqli_fetch_array($data);
    $id_daftar = $data_transaksi['ID_DAFTAR'];
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'update') {
            $result = mysqli_query($koneksi, "UPDATE daftar SET daftar.STATUS='1' WHERE ID_DAFTAR='$id_daftar'");
            header("location: bayar.php");
        }
    }
}