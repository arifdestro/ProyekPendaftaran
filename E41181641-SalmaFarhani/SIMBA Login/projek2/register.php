<?php
include '../koneksi.php';

// mencari kode dengan nilai paling besar
$query = "SELECT max(ID_USER) as maxKode FROM user";
$hasil = mysqli_query($mysqli,$query);
$data = mysqli_fetch_assoc($hasil);
$iduser = $data['maxKode'];
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($iduser, 1, 4);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
 
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "U";
$iduser = $char . sprintf("%03s", $noUrut);
echo $iduser;

$username = $_POST['pnusername'];
$email = $_POST['pnemail'];
$password = $_POST['pnpassword'];

$check = mysqli_query($mysqli, "SELECT * FROM user WHERE NAMA_USER = '$username'");
$checkusername = mysqli_num_rows($check);


if ($checkusername == 0) {
    $query = mysqli_query($mysqli, "INSERT INTO user VALUES ('$iduser', '$username', '$email', '$password')");
    header("location: login.html");
} else {
    header("location: register.html");
}


?>