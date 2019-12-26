<?php
   session_start();
   if(isset($_SESSION['NAMA_ADMIN'])) {
   header('location:index.php'); }
   require_once("connector.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<title>Form Login</title>
<div align='center'>
  <form action="proseslogin.php" method="post">
  <h1>Masuk</h1>
  <table>
  <tbody>
  <tr><td>Username</td><td> : <input name="NAMA_ADMIN" type="text">
          <?php 
          if (isset($_GET["empty_all"])|| isset($_GET["empty_NAMA_ADMIN"]) )
          echo "username harus diisi"
          ?>
  </td></tr>
  <tr><td>Password</td><td> : <input name="PASSWORD_ADMIN" type="password">
  <?php 
          if (isset($_GET["empty_all"])|| isset($_GET["empty_PASSWORD_ADMIN"]) )
          echo "password harus diisi"
          ?>
  </td></tr>
  <tr><td colspan="2" align="right"><input value="Login" type="submit"> <a href="index.php"></a><input value="Batal" type="reset">
        <?php 
        if(isset($_GET["failed"])) echo "Incorrect Account!"
        ?>
  </td></tr>
  </tbody>
  </table>
  </form>
</div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
