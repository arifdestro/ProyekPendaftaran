<?php
session_start();
if(!isset($_SESSION['NAMA_ADMIN'])) {
   header('location:login.php'); 
} else { 
   $username = $_SESSION['NAMA_ADMIN']; 
}
?>

<title>Halaman Sukses Login</title>
<div align='center'>
   Selamat Datang, <b><?php echo $username;?></b> <a href="logout.php"><b>Logout</b></a>
</div>