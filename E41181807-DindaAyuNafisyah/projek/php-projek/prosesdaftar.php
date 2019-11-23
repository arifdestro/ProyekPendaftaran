<?php
   require_once("koneksi.php");
   
   
  //  $username = isset($_POST['NAMA_USER']) ? $_POST['NAMA_USER'] : "";
  //  $pass = isset($_POST['PASSWORD_USER']) ? $_POST['PASSWORD_USER'] : "";
  //  if(isset($_POST['NAMA_USER'])) { $username = $_POST['NAMA_USER']; }
  
  // if(isset($_POST['PASSWORD_USER'])) { $pass = $_POST['PASSWORD_USER']; }
  //  $id = $_POST["id"];
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $email = $_POST['e-mail'];
   $sql = "SELECT * FROM user WHERE NAMA_USER = '$username'";
   $query = $db->query($sql);
   if($query->num_rows != 0) {
     echo "<div align='center'>Username Sudah Terdaftar! <a href='daftar.php'>Back</a></div>";
   } else {
     if(!$username || !$pass || !$email) {
       echo "<div align='center'>Masih ada data yang kosong! <a href='daftar.php'>Back</a>";
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

