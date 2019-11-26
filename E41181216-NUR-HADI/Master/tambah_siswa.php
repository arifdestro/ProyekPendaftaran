<?php include('connector.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light alert alert-warning">
		<div class="container">
			<a class="navbar-brand" href="#">SEKOLAH</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Data Siswa</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){

			$cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE NISN='$nisn'") or die(mysqli_error($koneksi));
			$cek2 = mysqli_query($koneksi, "SELECT * FROM sekolah,siswa WHERE sekolah.NPSN=siswa.NPSN") or die(mysqli_error($koneksi));

			
			$nisn		= $_POST['NISN'];
			$npsn 		= $_POST['NPSN'];
            $nama_siswa	= $_POST['NAMA_SEKOLAH'];
            $tempat_lahir = $_POST['TANGGAL_LAHIR'];
            $jenis_kelamin = $_POST['JENIS_KELAMIN'];
            $alamat = $_POST['ALAMAT'];
            $surat_rekom = $_POST['SURAT_REKOM'];
            $file_abstrak = $_POST['FILE_ABSTRAK'];
            $foto = $_POST['FOTO'];
			
			

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO siswa (NISN, NPSN, TANGGAL_LAHIR, JENIS_KELAMIN, ALAMAT, SURAT_REKOM, FILE_ABSTRAK, FOTO) VALUES('$nisn, $nama_siswa, $tempat_lahir, $jenis_kelamin, $alamat, $surat_rekom, $file_abstrak, $foto )") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="sekolah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah_siswa.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NISN</label>
				<div class="col-sm-10">
					<input type="text" name="NISN" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA SEKOLAH</label>
				<div class="col-sm-10">
					<input type="text" name="NAMA_SEKOLAH" class="form-control" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-10">
					<input type="text" name="TEMPAT_LAHIR" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-10">
					<input type="text" name="TANGGAL_LAHIR" class="form-control" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10">
					<input type="text" name="JENIS_KELAMIN" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" name="ALAMAT" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Surat Rekom</label>
				<div class="col-sm-10">
					<input type="file" name="SURAT_REKOM" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File Abstrak</label>
				<div class="col-sm-10">
					<input type="file" name="FILE_ABSTRAK" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-10">
					<input type="file" name="FOTO" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>