<?php
	session_start();

	//check if product is already in the cart
	if(!in_array($_GET['ID_DAFTAR'], $_SESSION['cart'])){
		array_push($_SESSION['cart'], $_GET['ID_DAFTAR']);
		$_SESSION['message'] = 'Pendaftaran ditambahkan ke keranjang';
	}
	else{
		$_SESSION['message'] = 'Pendaftaran sudah ada di keranjang';
	}

	header('location: index.php');
?>