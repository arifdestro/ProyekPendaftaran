<?php
   session_start();
   require_once("koneksi.php");
   $NAMA_USER = $_POST['NAMA_USER'];
   $PASSWORD_USER = $_POST['PASSWORD_USER'];   
   $sql = "SELECT * FROM user WHERE NAMA_USER = ('$NAMA_USER' OR _EMAIL_USER = '$NAMA_USER')";
   $query = $db->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) {
     echo "<div align='center'>Username Belum Terdaftar! <a href='login.php'>Back</a></div>";
   } else {
     if($PASSWORD_USER <> $hasil['PASSWORD_USER']) {
       echo "<div align='center'>Password salah! <a href='login.php'>Back</a></div>";
     } else {
       $_SESSION['NAMA_USER'] = $hasil['NAMA_USER'];
       header('location:index.php');
     }
   }
?>