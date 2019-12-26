<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<?php 
require 'connect.php';
$sql = 'SELECT * FROM siswa';
$result = mysqli_query($con, $sql);
 ?>
<h2> DAFTARKAN </h2>
 <table id="t01">
 <tr>
 	<th>NISN</th>
 	<th>Nama Siswa</th>
 	<th>Tempat Lahir</th>
 	<th>Tanggal Lahir</th>
 	<th>Alamat</th>
	<th>Action</th>
 </tr>
 	<?php while($siswa = mysqli_fetch_object($result)) { ?> 
	<tr>
		<td> <?php echo $siswa->NISN; ?> </td>
		<td> <?php echo $siswa->NAMA_SISWA; ?> </td>
		<td> <?php echo $siswa->TEMPAT_LAHIR; ?> </td>
		<td> <?php echo $siswa->TANGGAL_LAHIR; ?> </td>
		<td> <?php echo $siswa->ALAMAT; ?> </td>
		<td> <a href="cart.php?id=<?php echo $siswa->NISN; ?>&action=add">Daftar</a> </td>
	</tr>
	<?php } ?>
 </table>
</body>

 </html>