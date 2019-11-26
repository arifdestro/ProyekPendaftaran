<?php
//memasukkan file config.php
include('connector.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>MASTER SISWA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light alert alert-warning">
		<div class="container">
			<a class="navbar-brand" href="#">Master Siswa</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah_siswa.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Daftar Siswa</h2>
		
		<hr>
		
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					
					<th>NISN</th>
					<th>NAMA SISWA</th>
                    <th>TEMPAT LAHIR</th>
                    <th>TANGGAL LAHIR</th>
                    <th>JENIS_KELAMIN</th>
                    <th>ALAMAT</th>
                    <th>SURAT REKOM</th>
                    <th>FILE ABSTRAK</th>
                    <th>FOTO</th>
					<th>AKSI</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel printer urut berdasarkan id yang paling besar
                $sql = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY NISN ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['NISN'].'</td>
                            <td>'.$data['NAMA_SISWA'].'</td>
                            <td>'.$data['TEMPAT_LAHIR'].'</td>
                            <td>'.$data['TANGGAL_LAHIR'].'</td>
                            <td>'.$data['JENIS_KELAMIN'].'</td>
                            <td>'.$data['ALAMAT'].'</td>
                            <td>'.$data['SURAT_REKOM'].'</td>
                            <td>'.$data['FILE_ABSTRAK'].'</td>
                            <td>'.$data['FOTO'].'</td>
                            <td>
								<a href="ubah_siswa.php?NPSN='.$data['NISN'].'" class="badge badge-warning">Edit</a>
								<a href="hapus_siswa.php?NPSN='.$data['NISN'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6"><b>Tidak ada data.</b></td>
					</tr>
					';
				}
				?>
			<body>
		</table>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>