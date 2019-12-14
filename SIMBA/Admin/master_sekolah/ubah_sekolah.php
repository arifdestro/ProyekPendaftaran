<?php 
include('connector.php'); 
?>
    
    <!DOCTYPE html>
    <html lang="en">

    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    </head>

    <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search"
            aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search"></i>
            </button>
            </div>
        </div>
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
        </ul>

    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Master Data</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Data</h6>
            <a class="dropdown-item" href="#">Admin</a>
            <a class="dropdown-item" href="#">User</a>
            <a class="dropdown-item" href="#">Pendaftaran</a>
            <a class="dropdown-item" href="#">Pembayaran</a>
            <a class="dropdown-item" href="siswa.php">Siswa</a>
            <a class="dropdown-item" href="sekolah.php">Sekolah</a>
            <a class="dropdown-item" href="jenis_lomba.php">Jenis Lomba</a>
            <a class="dropdown-item" href="#">Rayon</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Cetak Laporan</h6>
            <a class="dropdown-item" href="#">Data Peserta</a>
            <a class="dropdown-item" href="#">Kartu Peserta</a>
            <a class="dropdown-item" href="#">Data Pemenang</a>
            </div>
        </li>
        </ul>
            <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
                </ol>

                <div class="container" style="margin-top:20px">
            <h2>UBAH DATA SEKOLAH</h2>
            
            <hr>
            
            <?php
            //jika sudah mendapatkan parameter GET id dari URL
            if(isset($_GET['NPSN'])){
                //membuat variabel $id untuk menyimpan id dari GET id di URL
                $NPSN = $_GET['NPSN'];
                
                //query ke database SELECT tabel mahasiswa berdasarkan id = $id
                $select = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE NPSN='$NPSN'") or die(mysqli_error($koneksi));
                
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
                $NPSN			= $_POST['NPSN'];
                $NAMA_SEKOLAH	= $_POST['NAMA_SEKOLAH'];
                
                $sql = mysqli_query($koneksi, "UPDATE sekolah SET NPSN='$NPSN', NAMA_SEKOLAH='$NAMA_SEKOLAH' WHERE NPSN='$NPSN'") or die(mysqli_error($koneksi));
                
                if($sql){
                    echo '<script>alert("Berhasil menyimpan data."); 
                    document.location="sekolah.php?NPSN='.$NPSN.'";</script>';
                }else{
                    echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
                }
            }
            ?>
            
            <form action="ubah_sekolah.php?NPSN=<?php echo $NPSN; ?>" method="post">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NPSN</label>
                    <div class="col-sm-10">
                        <input type="text" name="NPSN" class="form-control" value="<?php echo $data['NPSN']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NAMA SEKOLAH</label>
                    <div class="col-sm-10">
                        <input type="text" name="NAMA_SEKOLAH" class="form-control" value="<?php echo $data['NAMA_SEKOLAH']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">&nbsp;</label>
                    <div class="col-sm-10">
                        <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                        <a href="sekolah.php" class="btn btn-warning">KEMBALI</a>
                    </div>
                </div>
            </form>
            
        </div>
                
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2019</span>
                </div>
                </div>
            </footer>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Page level plugin JavaScript-->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>

        <!-- Demo scripts for this page-->
        <script src="js/demo/datatables-demo.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>

        </body>

        </html>