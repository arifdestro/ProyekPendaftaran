<?php 
include 'includes/connector.php'; 
include 'includes/header.php';
include 'includes/sidebar.php';
?>
    <div id="content-wrapper">

    <div class="container-fluid">


        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
        </ol>

        <?php 
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
    ?>
    
    <form action="tambah_siswa.php" method="post" enctype="multipart/form-data">
    <div class="form-group row">
            <label class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-10">
                <input type="text" name="NISN" class="form-control" placeholder="masukkan NISN" required >
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NAMA SISWA</label>
            <div class="col-sm-10">
                <input type="text" name="NAMA_SISWA" class="form-control" placeholder="masukkan nama, maksimal =50 digit" required="required">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">TEMPAT LAHIR</label>
            <div class="col-sm-10">
                <input type="text" name="TEMPAT_LAHIR" class="form-control" placeholder="masukkan kota kelahiran"  required >
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
            <div class="col-sm-10">
                <input type="date" name="TANGGAL_LAHIR" class="form-control" placeholder="pilih tanggal lahir anda" required>
            </div>
        </div>

        <div class="from-group row">
            <label class="col-sm-2 col-form-label" required >JENIS KELAMIN</label>
            <input type="radio" name="JENIS_KELAMIN" value="LAKI LAKI" required="required" />Laki Laki
            <input type="radio" name="JENIS_KELAMIN" value="PEREMPUAN" required="required" />Perempuan
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ALAMAT</label>
            <div class="col-sm-10">
                <input type="text" name="ALAMAT" class="form-control" placeholder="masukkan alamat" maxlength="50" required>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-10 col-form-label">&nbsp;</label>
            <div class="col-md-10">
                <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                <a href="siswa.php" class="btn btn-warning">KEMBALI</a>
            </div>
        </div>
    </form>
        
        <div class="card-footer mdall text-muted">Updated yesterday at 11:59 PM</div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

<?php 
include 'includes/footer.php'; 
?>