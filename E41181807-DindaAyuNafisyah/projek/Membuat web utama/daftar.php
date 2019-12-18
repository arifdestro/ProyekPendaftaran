<?php
include '../koneksi.php';

session_start();



$iduser = $_SESSION['iduser'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];

if ($iduser != "login") {
    header("location: login.html");
}

?>
