<?php
include 'includes/connector.php';

if (isset($_GET['ID_DAFTAR'])) {
    $ID_DAFTAR = $_GET['ID_DAFTAR'];

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            $result = mysqli_query($koneksi, "DELETE FROM daftar WHERE 
            ID_DAFTAR= '$ID_DAFTAR'");
        }
    }
}
?>