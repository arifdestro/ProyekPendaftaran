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
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>EDIT DATA</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['ID_DAFTAR'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['ID_DAFTAR'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM daftar WHERE ID_DAFTAR='$id'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$jenis			= $_POST['ID_JENIS_LOMBA'];
			$rayon			= $_POST['ID_RAYON'];
            $user			= $_POST['ID_USER'];
            $admin			= $_POST['ID_ADMIN'];
            $tgl			= $_POST['TGL'];
            $status			= $_POST['STATUS_BAYAR'];

			
			$sql = mysqli_query($koneksi, "UPDATE daftar SET ID JENIS LOMBA='$jenis', ID RAYON='$rayon', ID USER='$user', ID ADMIN_='$admin', TANGGAL BAYAR='$tgl', STATUS_BAYAR='$status' WHERE id='$id'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="ubah.php?id='.$id.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="ubah.php?id=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID DAFTAR</label>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID JENIS LOMBA</label>
				<div class="col-sm-10">
                <input type="text" name="ID JENIS LOMBA" class="form-control" value="<?php echo $data['ID_JENIS_LOMBA']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID RAYON</label>
				<div class="col-sm-10">
					<input type="text" name="ID RAYON" class="form-control" value="<?php echo $data['ID_RAYON']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID USER</label>
				<div class="col-sm-10">
					<input type="text" name="ID USER" class="form-control" value="<?php echo $data['ID_USER']; ?>" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">ID ADMIN</label>
				<div class="col-sm-10">
					<input type="text" name="ID ADMIN" class="form-control" value="<?php echo $data['ID_ADMIN']; ?>" required>
				</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">TANGGAL BAYAR</label>
				<div class="col-sm-10">
					<input type="text" name="TANGGAL BAYAR" class="form-control" value="<?php echo $data['TGL']; ?>" required>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">STATUS_BAYAR</label>
				<div class="col-sm-10">
					<input type="text" name="STATUS_BAYAR" class="form-control" value="<?php echo $data['STATUS_BAYAR']; ?>" required>
				</div>
			</div>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>