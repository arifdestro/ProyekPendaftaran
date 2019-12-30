<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA PESERTA LOMBA</title>
</head>
<body>
 
	<center>
 
		<h2>DATA PESERTA LOMBA</h2>
		<h4>SIMBA IAIN JEMBER</h4>
 
	</center>
 
	<?php 
	include 'includes/connector.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>ID DAFTAR</th>
			<th>ID JENIS LOMBA</th>
            <th>ID RAYON</th>
            <th>ID USER</th>
            <th>ID ADMIN</th>
            <th>NPSN</th>
            <th>TANGGAL DAFTAR</th>
            <th>SURAT REKOM</th>
            <th>FILE ABSTRAK</th>
            <th>STATUS</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select daftar.ID_DAFTAR , jenis_lomba.ID_JENIS_LOMBA , rayon.ID_RAYON , user.ID_USER , tabel_admin.ID_ADMIN , sekolah.NPSN , daftar.TGL , daftar.SURAT_REKOM , daftar.FILE_ABSTRAK , daftar.BAYAR_STATUS
        FROM daftar, jenis_lomba, rayon, user, tabel_admin, sekolah
        WHERE
        daftar.ID_JENIS_LOMBA = jenis_lomba.ID_JENIS_LOMBA
        AND daftar.ID_RAYON = rayon.ID_RAYON
        AND daftar.ID_USER = user.ID_USER
        AND daftar.ID_ADMIN = tabel_admin.ID_ADMIN
        AND daftar.NPSN = sekolah.NPSN");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
        <td><?php echo $no++; ?></td>
            <td><?php echo $data['ID_DAFTAR'];?></td>
            <td><?php echo $data['ID_JENIS_LOMBA'];?></td>
            <td><?php echo $data['ID_RAYON'];?></td>
            <td><?php echo $data['ID_USER'];?></td>
            <td><?php echo $data['ID_ADMIN'];?></td>
            <td><?php echo $data['NPSN'];?></td>
            <td><?php echo $data['TGL'];?></td>
            <td><?php echo $data['SURAT_REKOM'];?></td>
            <td><?php echo $data['FILE_ABSTRAK'];?></td>
            <td><?php echo $data['BAYAR_STATUS'];?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>













