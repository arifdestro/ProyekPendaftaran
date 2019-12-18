<?php 
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($mysqli,"SELECT * from user where NAMA_ADMIN ='$username' and PASSWORD_ADMIN='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$_SESSION['NAMA_ADMIN'] = $username;
	$_SESSION['status'] = "login";
	header("location:admin/index.php");
}else{
	header("location:index.php");	
}

?>