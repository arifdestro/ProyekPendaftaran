<?php

session_start();

include '../koneksi.php';

$username = $_POST['pnusername'];
$password = $_POST['pnpassword'];

$querylogin = mysqli_query($mysqli, "SELECT * FROM user WHERE NAMA_USER = '$username' AND PASSWORD_USER = '$password'");
$checklogin = mysqli_num_rows($querylogin);

while ($data = mysqli_fetch_array($querylogin)) {
    $iduser = $data['ID_USER'];
}

if ($checklogin == 1) {
    $_SESSION['status'] = "login";
    $_SESSION['ID_USER'] = $iduser;
    $_SESSION['NAMA_USER'] = $username;
    header("location: pn_dashboard.php");
} else {
    header("location: pn_login.html");
}