<?php
//memasukkan file config.php
include 'includes/connector.php'; 
include 'includes/header.php' ;
include 'includes/sidebar.php' ;
?>

    <div id="content-wrapper">

        <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead class="thead-dark">
			
            <?php
				$result = mysqli_query(
                    $koneksi,
                    "SELECT daftar.ID_DAFTAR , jenis_lomba.ID_JENIS_LOMBA , rayon.ID_RAYON , user.ID_USER , tabel_admin.ID_ADMIN , sekolah.NPSN , daftar.TGL , daftar.SURAT_REKOM , daftar.FILE_ABSTRAK , daftar.BAYAR_STATUS
                    FROM daftar, jenis_lomba, rayon, user, tabel_admin, sekolah
                    WHERE
                    daftar.ID_JENIS_LOMBA = jenis_lomba.ID_JENIS_LOMBA
                    AND daftar.ID_RAYON = rayon.ID_RAYON
                    AND daftar.ID_USER = user.ID_USER
                    AND daftar.ID_ADMIN = tabel_admin.ID_ADMIN
                    AND daftar.NPSN = sekolah.NPSN"
                );
				?>
            <tr>
				<th>ID DAFTAR</th>
				<th>ID JENIS LOMBA</th>
                <th>ID RAYON</th>
                <th>ID USER</th>
                <th>ID ADMIN</th>
                <th>NPSN</th>
                <th>TANGGAL DAFTAR</th>
                <th>SURAT REKOM</th>
                <th>FILE ABSTRAK</th>
                <th>STATUS</th>
                <th>AKSI</th>
			</tr>
            <?php
          while($data=mysqli_fetch_assoc($result)){
            $ID_DAFTAR = $data['ID_DAFTAR'];
            $ID_JENIS_LOMBA = $data['ID_JENIS_LOMBA'];
            $ID_RAYON = $data['ID_RAYON'];
            $ID_USER = $data['ID_USER'];
            $ID_ADMIN = $data['ID_ADMIN'];
            $NPSN =$data['NPSN'];
            $TGL =$data['TGL'];
            $SURAT_REKOM =$data['SURAT_REKOM'];
            $FILE_ABSTRAK =$data['FILE_ABSTRAK'];
            $BAYAR_STATUS = $data['BAYAR_STATUS'];
        
       ?>
       <tr>
         <td><?php echo $data['ID_DAFTAR'];?></td>
         <td><?php echo $data['ID_JENIS_LOMBA'];?></td>
         <td><?php echo $data['ID_RAYON'];?></td>
         <td><?php echo $data['ID_USER'];?></td>
         <td><?php echo $data['ID_ADMIN'];?></td>
         <td><?php echo $data['NPSN'];?></td>
         <td><?php echo $data['TGL'];?></td>
         <td><?php echo $data['SURAT_REKOM'];?></td>
         <td><?php echo $data['FILE_ABSTRAK'];?></td>
         <td><?php echo $data['BAYAR_STATUS'];?></td>
         <td> 
         <div class="block ml-auto text-center">

         <a href="hapus_daftar.php?id=<?php echo $data['ID_DAFTAR']?>">Delete</a>
            <!-- <a href="hapus_daftar.php?action=delete&ID_DAFTAR=<?= $ID_DAFTAR ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Delete -->
            <i class="fas fa-trash"></i>
            </a>
		    <!-- <a href="ubah_daftar.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="badge badge-warning">Edit</a>
			<a href="hapus_daftar.php?ID_DAFTAR='.$data['ID_DAFTAR'].'"class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a> -->
		</td>
       </tr>
       <?php } ?>
			</thead>
			<tbody>
            
			<body>
		</table>
	    </div>
            </div>
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div> -->

        <!-- <p class="small text-center text-muted my-5">
            <em>More table examples coming soon...</em>
        </p> -->

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php 
include 'includes/footer.php'; 
?>