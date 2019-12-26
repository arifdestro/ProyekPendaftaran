<?php
require'proseslogin.php';
session_start();
if(!isset($_SESSION["Login"])) {
   header('location:login.php'); 
   exit;
} else { 
   $username = $_SESSION['NAMA_ADMIN']; 
}
?>

<title>Halaman Sukses Login</title>
<div align='center'>
   Selamat Datang, <b><?php echo $username;?></b> <a href="logout.php"><b>Logout</b></a>
</div>