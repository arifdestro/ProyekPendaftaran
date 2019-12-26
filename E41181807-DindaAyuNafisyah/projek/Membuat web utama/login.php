<?php

session_start();

include '../koneksi.php';

$username = $_POST['NAMA_ADMIN'];
$password = $_POST['PASSWORD_IAIN'];

$querylogin = mysqli_query($mysqli, "SELECT * FROM admin WHERE NAMA_ADMIN = '$username' AND PASSWORD_ADMIN = '$password'");
$checklogin = mysqli_num_rows($querylogin);

while ($data = mysqli_fetch_array($querylogin)) {
    $idadmin = $data['ID_ADMIN'];
}

if ($checklogin == 1) {
    $_SESSION['status'] = "login";
    $_SESSION['ID_ADMIN'] = $idadmin;
    $_SESSION['NAMA_ADMIN'] = $username;
    header("location: pn_dashboard.php");
} else {
    header("location: login.html");
}