<?php
include('connector.php');

if (isset($_GET['ID_DAFTAR'])) {
    $ID_DAFTAR = $_GET['ID_DAFTAR'];

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            $result = mysqli_query($koneksi, "DELETE FROM daftar WHERE ID_DAFTAR='$ID_DAFTAR'");
        }
    }
}

if (isset($_POST['edit_daftar'])) {
    $ID_DAFTAR = $_POST['ID_DAFTAR'];
    $ID_JENIS_LOMBA = $_POST['ID_JENIS_LOMBA'];
    $ID_RAYON = $_POST['ID_RAYON'];
    $ID_USER = $_POST['ID_USER'];
    $ID_ADMIN = $_POST['ID_ADMIN'];
    $NPSN = $_POST['NPSN'];
    $TGL = $_POST['TGL'];
    $SURAT_REKOM = $_POST['SURAT_REKOM'];
    $FILE_ABSTRAK = $_POST['FILE_ABSTRAK'];
    $STATUS=$_POST['STATUS'];

    $result = mysqli_query($koneksi, "UPDATE daftar SET
    ID_DAFTAR = '$ID_DAFTAR',
    ID_JENIS_LOMBA = '$ID_JENIS_LOMBA', 
    ID_RAYON = '$ID_RAYON',
    ID_USER = '$ID_USER',
    ID_ADMIN = '$ID_ADMIN',
    NPSN = '$NPSN',
    TGL = '$TGL',
    SURAT_REKOM = '$SURAT_REKOM',
    FILE_ABSTRAK = '$FILE_ABSTRAK',
    STATUS = '$STATUS'
    WHERE
    ID_DAFTAR = '$ID_DAFTAR'
    ");
}
?>