<?php 
include 'includes/connector.php'; 
include 'includes/header.php' ;
include 'includes/sidebar.php' ;
?>
    
    <div id="content-wrapper">

    <div class="container-fluid">


        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Siswa</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i>
            Data Siswa</div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>NAMA USER</th>
                <th>TGL DAFTAR</th>
                <th>ID DAFTAR</th>
                <th>TGL BAYAR</th>
                <th>ID BAYAR</th>
                <th>STATUS</th>
                <th>AKSI</th>
            </tr>
            </thead>
            <tbody>
                <?php
                //query ke database SELECT tabel printer urut berdasarkan id yang paling besar
                $sql = mysqli_query($koneksi, 
                "SELECT user.ID_USER, user.NAMA_USER, daftar.TGL, daftar.STATUS, bayar.ID_BAYAR, bayar.ID_DAFTAR, bayar.TGL_BAYAR 
                FROM user, daftar, bayar 
                WHERE daftar.ID_USER=user.ID_USER
                AND bayar.ID_DAFTAR=daftar.ID_DAFTAR
                ORDER BY ID_BAYAR ASC ") or die(mysqli_error($koneksi));
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
                            <td>'.$data['NAMA_USER'].'</td>
                            <td>'.$data['TGL'].'</td>
                            <td>'.$data['ID_DAFTAR'].'</td>
                            <td>'.$data['TGL_BAYAR'].'</td>
                            <td>'.$data['ID_BAYAR'].'</td>
                            <td>'.$data['STATUS'].'</td>
                            <td>
                                <a href="bayar_info.php?ID_BAYAR='.$data['ID_BAYAR'].'" class="badge badge-warning">Lihat</a>
                                <a href="#?ID_BAYAR='.$data['ID_BAYAR'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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