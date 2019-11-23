<?php include('connector.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tabel Master Jenis Lomba</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light alert alert-warning">
		<div class="container">
			<a class="navbar-brand" href="#">Tabel Master Jenis Lomba</a>
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
		if(isset($_GET['ID_JENIS_LOMBA'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$ID_JENIS_LOMBA = $_GET['ID_JENIS_LOMBA'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM jenis_lomba WHERE ID_JENIS_LOMBA='$ID_JENIS_LOMBA'") or die(mysqli_error($koneksi));
			
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
			$NAMA_LOMBA			= $_POST['NAMA_LOMBA'];
			$BIAYA			= $_POST['BIAYA'];
			
			$sql = mysqli_query($koneksi, "UPDATE jenis_lomba SET ID_JENIS_LOMBA= '$ID_JENIS_LOMBA', NAMA_LOMBA='$NAMA_LOMBA', BIAYA='$BIAYA' WHERE ID_JENIS_LOMBA='$ID_JENIS_LOMBA'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="ubah.php?ID_JENIS_LOMBA='.$ID_JENIS_LOMBA.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
        }
        
		?>
		
		<form action="ubah.php?id=<?php echo $ID_JENIS_LOMBA; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Id Jenis Lomba</label>
				<div class="col-sm-10">
					<input type="text" name="ID_JENIS_LOMBA" class="form-control" size="4" value="<?php echo $data['ID_JENIS_LOMBA']; ?>" required>
				</div>
			</div>

			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lomba</label>
				<div class="col-sm-10">
					<input type="text" name="NAMA_LOMBA" class="form-control" value="<?php echo $data['NAMA_LOMBA']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Biaya</label>
				<div class="col-sm-10">
					<input type="text" name="BIAYA" class="form-control" value="<?php echo $data['BIAYA']; ?>" required>
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