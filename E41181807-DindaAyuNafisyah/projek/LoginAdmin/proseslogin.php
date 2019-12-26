<?php
   session_start();
   require_once("koneksi.php");
   $NAMA_ADMIN = $_POST['NAMA_ADMIN'];
   $PASSWORD_ADMIN = $_POST['PASSWORD_ADMIN'];   
   $sql = "SELECT * FROM admin WHERE NAMA_ADMIN = ('$NAMA_ADMIN')";
   $query = $db->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) {
     echo "<div align='center'>Username Belum Terdaftar! <a href='login.php'>Back</a></div>";
   } 
   else {
     if($PASSWORD_ADMIN <> $hasil['PASSWORD_ADMIN']) {
       echo "<div align='center'>Password salah! <a href='login.php'>Back</a></div>";
     } else {
       $_SESSION['NAMA_ADMIN'] = $hasil['NAMA_ADMIN'];
       header('location:index.php');
     }
      //else {
    // if(empty($NAMA_ADMIN) && empty($NAMA_ADMIN)){
    //   header ("location:login.php?empty_NAMA_USER");
    // } else {
     //  if (empty($PASSWORD_USER) && empty($PASSWORD_USER)){
   //     header ("location:login.php?empty_PASSWORD_USER");
  //   }
   }
  //  if ($NAMA_USER == ""){
  //    echo "<script> alert('username harus diisi')
  //    </script>";
  //    return false;
  //  }
  //  else if ( $PASSWORD_USER == "") {
  //   echo "<script>
  //           alert('password harus diisi');
  //       </script>";
    return false;
?>