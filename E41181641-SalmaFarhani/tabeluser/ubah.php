<?php include('connector.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>TABEL USER</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light alert alert-warning">
		<div class="container">
			<a class="navbar-brand" href="#">TABEL USER</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="user.php">Home</a>
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
		if(isset($_GET['ID_USER'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$ID_USER = $_GET['ID_USER'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM user WHERE ID_USER='$ID_USER'") or die(mysqli_error($koneksi));
			
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
			$NAMA_USER = $_POST['NAMA_USER'];
			$_EMAIL_USER = $_POST['_EMAIL_USER'];
			$PASSWORD_USER = $_POST['PASSWORD_USER'];
			
			$sql = mysqli_query($koneksi, "UPDATE user SET ID_USER='$ID_USER', NAMA_USER='$NAMA_USER', _EMAIL_USER='$_EMAIL_USER', PASSWORD_USER='$PASSWORD_USER' WHERE ID_USER='$ID_USER'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="ubah.php?ID_USER='.$ID_USER.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="ubah.php?ID_USER=<?php echo $ID_USER; ?>" method="post">
			
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID User</label>
				<div class="col-sm-10">
					<input type="text" name="ID_USER" class="form-control" value="<?php echo $data['ID_USER']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input type="text" name="NAMA_USER" class="form-control" value="<?php echo $data['NAMA_USER']; ?>" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="text" name="_EMAIL_USER" class="form-control" value="<?php echo $data['_EMAIL_USER']; ?>" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="text" name="PASSWORD_USER" class="form-control" value="<?php echo $data['PASSWORD_USER']; ?>" required>
				</div>
			</div>
            
		
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="user.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>