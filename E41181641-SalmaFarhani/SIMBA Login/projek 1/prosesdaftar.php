<?php
   require_once("koneksi.php");
   // mencari kode barang dengan nilai paling besar
   $query = "SELECT max(id) as maxKode FROM user";
   $hasil = mysqli_query($db,$query);
   $data = mysqli_fetch_assoc($hasil);
   $id = $data['maxKode'];
   // mengambil angka atau bilangan dalam kode anggota terbesar,
   // dengan cara mengambil substring mulai dari karakter ke-1 diambil 5 karakter
   // setelah substring bilangan diambil lantas dicasting menjadi integer
   $noUrut = (int) substr($id, 1, 4);
   
   // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
   $noUrut++;
    
   // membentuk kode anggota baru
   // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
   // misal sprintf("%03s", 12); maka akan dihasilkan '012'
   // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
   $char = "U";
   $id = $char . sprintf("%03s", $noUrut);
   
  //  $username = isset($_POST['NAMA_USER']) ? $_POST['NAMA_USER'] : "";
  //  $pass = isset($_POST['PASSWORD_USER']) ? $_POST['PASSWORD_USER'] : "";
  //  if(isset($_POST['NAMA_USER'])) { $username = $_POST['NAMA_USER']; }
  
  // if(isset($_POST['PASSWORD_USER'])) { $pass = $_POST['PASSWORD_USER']; }
  //  $id = $_POST["id"];
   $username = $_POST["NAMA_USER"];
   $pass = $_POST["PASSWORD_USER"];
   $email = $_POST["_EMAIL_USER"];
   $sql = "SELECT * FROM user WHERE NAMA_USER = '$username'";
   $query = $db->query($sql);
   if($query->num_rows != 0) {
     echo "<div align='center'>Username Sudah Terdaftar! <a href='prosesdaftar.php'>Back</a></div>";
   } else {
     if(!$username || !$pass || !$email) {
       echo "<div align='center'>Masih ada data yang kosong! <a href='prosesdaftar.php'>Back</a>";
     } else {
       $data = "INSERT INTO user VALUES ('$id', '$username','$email', '$pass')";
       $simpan = $db->query($data);
       if($simpan) {
         echo "<div align='center'>Pendaftaran Sukses, Silahkan <a href='login.php'>Login</a></div>";
       } else {
         echo "<div align='center'>Proses Gagal!</div>";
       }
     }
   }

   session_start();
   if(isset($_SESSION['NAMA_USER'])) {
   header('location:index.php'); }
   ?>

<title>Form Pendaftaran</title>
<div align='center'>
  <form action="prosesdaftar.php" method="post">
  <table>
  <tbody>
  <tr><td colspan="2" align="center"><h1>Daftar Baru</h1></td></tr>
  <!-- <tr><td>Id</td><td> : <input name="id" type="text" value= "<?php echo $id;?>" readonly="readonly"/></td></tr> -->
  <tr><td>Username</td><td> : <input name="username" type="text"></td></tr>
  <tr><td>Password</td><td> : <input name="password" type="password"></td></tr>
  <tr><td>Alamat E-mail</td><td> : <input name="e-mail" type="text"></td></tr>
  <tr><td colspan="2" align="right"><input value="Daftar" type="submit" name="daftar"> <input value="Batal" type="reset"></td></tr>
  <tr><td colspan="2" align="center">Sudah Punya akun ? <a href="login.php"><b>Login</b></a></td></tr>
  </tbody>
  </table>
  </form>
</div>