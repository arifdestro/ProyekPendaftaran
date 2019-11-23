<?php

   session_start();
   if(isset($_SESSION['NAMA_USER'])) {
   header('location:index.php'); }   

  // //  mencari kode yang paling besar atau kode yang baru masuk
  //  $cari_id = mysqli_query("select max(id) as kode from user");
  //  $tm_cari= mysqli_fetch_array($cari_id);
  // //  mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya
  //  $kode= substr($tm_cari['kode'], 1, 4);
  //  kode yang sudah dipecah ditambah 1
  //  $tambah= $kode+1;
  //  jika kode lebih kecil dari 10(9,8,7,6 dst)maka
  //  if ($tambah<10){
  //    $id="U000".$tambah;
  //  }else{
  //      $id="U00".$tambah;
  //    }
  //    if (isset($_POST['daftar'])){
  //      mysqli_query("INSERT INTO 'simba_database'.'user'('ID_USER', 'NAMA_USER','_EMAIL_USER','PASSWORD_USER') VALUES ('$_POST [id]', '$_POST[username]', '$_POST[email]', '$_POST[pass]')"); }
   // mencari kode dengan nilai paling besar
   $query = "SELECT max(id) as maxKode FROM user";
   $hasil = mysqli_query($db,$query);
   $data = mysqli_fetch_assoc($hasil);
   $id = $data['maxKode'];
   // mengambil angka atau bilangan dalam kode anggota terbesar,
   // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
   // misal 'BRG001', akan diambil '001'
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
   
   
   ?>


<title>Form Pendaftaran</title>
<div align='center'>
  <form action="prosesdaftar.php" method="post">
  <table>
  <tbody>
  <tr><td colspan="2" align="center"><h1>Daftar Baru</h1></td></tr>
  <tr><td>Username</td><td> : <input name="username" type="text"></td></tr>
  <tr><td>Password</td><td> : <input name="password" type="password"></td></tr>
  <tr><td>Alamat E-mail</td><td> : <input name="e-mail" type="text"></td></tr>
  <tr><td colspan="2" align="right"><input value="Daftar" type="submit" name="daftar"> <input value="Batal" type="reset"></td></tr>
  <tr><td colspan="2" align="center">Sudah Punya akun ? <a href="login.php"><b>Login</b></a></td></tr>
  </tbody>
  </table>
  </form>
</div>