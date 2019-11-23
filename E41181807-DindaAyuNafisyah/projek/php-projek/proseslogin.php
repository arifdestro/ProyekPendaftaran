<?php
   session_start();
   require_once("koneksi.php");
   if (isset($_POST["Login"])){
     global $db;
   
   $username = $_POST['NAMA_USER'];
   $pass = $_POST['PASSWORD_USER'];   
   $sql = "SELECT * FROM user WHERE NAMA_USER = ('$username' OR _EMAIL_USER = '$username')";
   $query = $db->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) {
     echo "<div align='center'>Username Belum Terdaftar! <a href='login.php'>Back</a></div>";
   } else {
     if($pass <> $hasil['password']) {
       echo "<div align='center'>Password salah! <a href='login.php'>Back</a></div>";
     } else {
       $_SESSION['username'] = $hasil['username'];
       header('location:index.php');
      }
     }
   }
?>