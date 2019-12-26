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
            <li class="breadcrumb-item active">Admin</li>
            </ol>

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                <i class="fas fa-table"></i>
                Laporan Siswa</div>
                <div><a class="btn mt-2 ml-2 btn-primary" href="cetak_laporan.php" role="button">Cetak</a></div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>ID DAFTAR</th>
                    <th>NISN</th>
                    <th>NAMA SISWA</th>
                    <th>ASAL SEKOLAH</th>
                    <th>LOMBA</th>
                    <th>RAYON</th>
                    <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                    
                    <?php
                    //query ke database SELECT tabel printer urut berdasarkan id yang paling besar
                    $sql = mysqli_query($koneksi, "SELECT 
                    detail_daftar.NISN, detail_daftar.ID_DAFTAR,
                    siswa.NISN, siswa.NAMA_SISWA,
                    sekolah.NPSN, sekolah.NAMA_SEKOLAH,
                    jenis_lomba.ID_JENIS_LOMBA,
                    jenis_lomba.NAMA_LOMBA, 
                    rayon.ID_RAYON, rayon.NAMA_RAYON,
                    daftar.STATUS, 
                    bayar.ID_BAYAR 
                    
                    FROM siswa, sekolah, jenis_lomba, rayon, daftar, bayar, detail_daftar 

                    WHERE detail_daftar.NISN=siswa.NISN AND 
                    detail_daftar.ID_DAFTAR=daftar.ID_DAFTAR AND 
                    daftar.NPSN=sekolah.NPSN AND 
                    daftar.ID_RAYON=rayon.ID_RAYON AND 
                    daftar.ID_JENIS_LOMBA=jenis_lomba.ID_JENIS_LOMBA AND 
                    bayar.ID_DAFTAR=daftar.ID_DAFTAR  AND
                    daftar.STATUS='1' ") or die(mysqli_error($koneksi));

                    var_dump($sql);
                    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                    if(mysqli_num_rows($sql) > 0){
                        //membuat variabel $no untuk menyimpan nomor urut
                        $no = 1;
                        //melakukan perulangan while dengan dari dari query $sql
                        while($data = mysqli_fetch_assoc($sql)){
                            //menampilkan data perulangan
                            echo '
                            <tr>
                                <td>'.$no.'</td>
                                <td>'.$data['ID_DAFTAR'].'</td>
                                <td>'.$data['NISN'].'</td>
                                <td>'.$data['NAMA_SISWA'].'</td>
                                <td>'.$data['NAMA_SEKOLAH'].'</td>
                                <td>'.$data['NAMA_LOMBA'].'</td>
                                <td>'.$data['RAYON'].'</td>
                                <td>
                                    <a href="view_laporan.php?NISN='.$data['NISN'].'" class="badge badge-warning">View</a>
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
                </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

            <p class="small text-center text-muted my-5">
                <em>More table examples coming soon...</em>
            </p>

        </div>
            <!-- /.container-fluid -->

<?php
include 'includes/footer.php';
?>