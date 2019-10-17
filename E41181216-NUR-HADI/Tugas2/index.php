<?php

//membuat koneksi database dengan file config

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

// File index.php merupakan file utama yang menyertakan file
// konfigurasi untuk koneksi database. Kemudian menampilkan
// semua daftar pengguna menggunakan MySQL Select Query.
// Pengguna yang akan ditampilkan di dalam daftar perlu
// menambahkan terlebih dahulu menggunakan tautan
// Tambahkan Pengguna Baru

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="add.php">Add New User</a>
<br/><br/>
<table width='80%' border=1>
<tr>
<th>nama</th> <th>hp</th> <th>Update</th>
</tr>

<?php
while ($user_data = mysql_fetch_array($result)){
echo "<tr>";
echo "<td>".$user_data['nama']."</td>";
echo "<td>".$user_data['hp']."</td>";
echo "<td>"<a href='edit.php?id=$user_data['id']>Edit</a> |
<a href='delete.php?id=$user_data['id']'Delete</a></td></tr>;


}
?>
    
</body>
</html>