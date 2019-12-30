<?php
include 'includes/connector.php';

if (isset($_GET['ID_DAFTAR'])) {
    $ID_DAFTAR = $_GET['ID_DAFTAR'];

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            $result =  
            mysqli_query($koneksi, "DELETE FROM bayar WHERE ID_DAFTAR= '$ID_DAFTAR'") or die(mysqli_error($koneksi));
            mysqli_query($koneksi, "DELETE FROM melakukan WHERE ID_DAFTAR= '$ID_DAFTAR'") or die(mysqli_error($koneksi));
            mysqli_query($koneksi, "DELETE FROM daftar WHERE ID_DAFTAR= '$ID_DAFTAR'") or die(mysqli_error($koneksi));
        }
        header("Location: daftar.php");
            
        }
    
}
?>