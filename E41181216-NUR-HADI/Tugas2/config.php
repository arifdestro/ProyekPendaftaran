<?php

$databaseHost = 'localhost';
$databaseName = 'crud_db';
$dataseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// File config.php menyimpan informasi tentang database host, username dan password.
// ebagian besar server lokal bekerja dengan detail yang diberikan.
// Anda dapat mengubahnya sesuai dengan detail host dan database Anda.
// Untuk menghubungkan PHP dengan MySQL, kita menggunakan fungsi mysqli_connect()
// dengan alamat server sebagai parameter pertama, user database sebagai parameter kedua,
// password user sebagai parameter ketiga, dan nama database sebagai parameter keempat.


?>