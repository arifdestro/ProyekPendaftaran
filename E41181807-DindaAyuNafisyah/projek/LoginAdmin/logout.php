<?php 
session_start();

$_SESSION['session_NAMA_ADMIN']= '';
unset($_SESSION['session_NAMA_ADMIN']);
session_unset();
session_destroy();
header ('location:login.php');
?>