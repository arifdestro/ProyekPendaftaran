<?php
	session_start();
	unset($_SESSION['cart']);
	$_SESSION['message'] = 'Penghapusan Cart Berhasil';
	header('location: index.php');
?>