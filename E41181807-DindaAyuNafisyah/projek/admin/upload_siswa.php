<?php 
    include 'includes/connector.php';

    if(isset($_POST['submit'])){
        $NISN           = $_POST['NISN'];
        $NAMA_SISWA     = $_POST['NAMA_SISWA'];
        $TEMPAT_LAHIR   = $_POST['TEMPAT_LAHIR'];
        $TANGGAL_LAHIR  = $_POST['TANGGAL_LAHIR'];
        $JENIS_KELAMIN  = $_POST['JENIS_KELAMIN'];
        $ALAMAT         = $_POST['ALAMAT'];

        $cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE NISN='$NISN'") or die(mysqli_error($koneksi));
        
        if(mysqli_num_rows($cek) == 0){
            $sql = mysqli_query($koneksi, "INSERT INTO siswa(NISN, NAMA_SISWA, TEMPAT_LAHIR, TANGGAL_LAHIR, JENIS_KELAMIN, ALAMAT) VALUES('$NISN', '$NAMA_SISWA', '$TEMPAT_LAHIR', '$TANGGAL_LAHIR', '$JENIS_KELAMIN', '$ALAMAT')") or die(mysqli_error($koneksi));
            
            if($sql){
                echo '<script>alert("Berhasil menambahkan data."); document.location="siswa.php";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
            }else{
            echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
        }
    }

		
		if($_POST['submit']){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'images/'.$nama);
					$query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");s
					if($query){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		?>

		<table>
			<?php 
			$data = mysql_query("select * from upload");
			while($d = mysql_fetch_array($data)){
			?>
			<tr>
				<td>
					<img src="<?php echo "file/".$d['nama_file']; ?>">
				</td>		
			</tr>
			<?php } ?>
		</table>
