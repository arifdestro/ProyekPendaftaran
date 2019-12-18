<?php include('connector.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIMBA IAIN</title>
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
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Data</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
            $daftar         = $_POST ['ID_DAFTAR'];
            $jenis			= $_POST['ID_JENIS_LOMBA'];
			$rayon			= $_POST['ID_RAYON'];
            $user			= $_POST['ID_USER'];
            $admin			= $_POST['ID_ADMIN'];
            $tgl			= $_POST['TGL'];
            $status			= $_POST['STATUS_BAYAR'];

			
			$cek = mysqli_query($koneksi, "SELECT * FROM daftar WHERE ID_DAFTAR='$daftar'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO daftar(ID_DAFTAR,ID_JENIS_LOMBA, ID_RAYON, ID_USER, ID_ADMIN,TGL,STATUS_BAYAR) VALUES('$daftar','$jenis', '$rayon', '$user', '$admin','$tgl','$status')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
			}
		}

		
$result = mysqli_query(
    $con,
    "SELECT daftar.ID_DAFTAR, jenis_lomba.ID_JENIS_LOMBA ,rayon.ID_RAYON,user.ID_USER ,admin.ID_ADMIN
    FROM daftar,jenis_lomba,rayon,user,admin
    WHERE produk.ID_HALAMAN = halaman.ID_HALAMAN 
    AND produk.ID_WARNA = warna.ID_WARNA 
    AND produk.ID_UKURAN = ukuran.ID_UKURAN"
);

?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID DAFTAR</label>
				<div class="col-sm-10">
					<input type="text" name="produk" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID JENIS LOMBA</label>
				<div class="col-sm-10">
                <input type="text" name="warna" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID RAYON</label>
				<div class="col-sm-10">
					<input type="text" name="warna" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID USER</label>
				<div class="col-sm-10">
					<input type="text" name="jumlah" class="form-control" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">ID ADMIN</label>
				<div class="col-sm-10">
					<input type="text" name="jumlah" class="form-control" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">TANGGAL BAYAR</label>
				<div class="col-sm-10">
					<input type="text" name="jumlah" class="form-control" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">STATUS BAYAR</label>
				<div class="col-sm-10">
					<input type="text" name="jumlah" class="form-control" required>
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