<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="add.php" method="post" name="form1">
    <table width="25%" border="1">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Hp</td>
            <td><input type="text" name="hp"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Add"> </td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['Submit'])) {
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
}
?>
</body>
</html>

<!-- File add.php berfungsi untuk menambahkan pengguna baru.
Formulir HTML digunakan untuk menerima masukan data pengguna.
Setelah data pengguna diserahkan,MySQL INSERT Query
 digunakan untuk memasukkan data pengguna ke dalam database. -->