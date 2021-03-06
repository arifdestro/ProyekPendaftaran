<?php
//memasukkan file config.php
include('connector.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>FORM MASTER DAFTAR</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light alert alert-warning">
		<div class="container">
			<a class="navbar-brand" href="#">SIMBA IAIN</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>DAFTAR</h2>
		
		<hr>
		
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>ID DAFTAR</th>
					<th>ID JENIS LOMBA</th>
					<th>ID RAYON</th>
					<th>ID USER</th>
                    <th>ID ADMIN</th>
                    <th>TANGGAL DAFTAR</th>
					<th>STATUS BAYAR</th>
                    <th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel printer urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM daftar ORDER BY ID_DAFTAR DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['ID_DAFTAR'].'</td>
							<td>'.$data['ID_JENIS_LOMBA'].'</td>
                            <td>'.$data['ID_RAYON'].'</td>
                            <td>'.$data['ID_USER'].'</td>
                            <td>'.$data['ID_ADMIN'].'</td>
                            <td>'.$data['TGL'].'</td>
                            <td>'.$data['STATUS_BAYAR'].'</td>
                            <td>
								<a href="ubah.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="badge badge-warning">Edit</a>
								<a href="hapus.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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