 
<?php
   session_start();
   require_once("koneksi.php");
   if(isset($_SESSION["Login"])) {
    if(login($_POST)){
    header('location:index.php'); 
    exit;
  }
}
   ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form Login</title>
</head>
<body>
 

<div align='center'>
  <form action="index.php" method="post">
  <h1>Masuk</h1>
  <table>
  <tbody>
  <tr><td>Username</td><td> : <input name="username atau email" type="text"></td></tr>
  <tr><td>Password</td><td> : <input name="password" type="password"></td></tr>
  <tr><td colspan="2" align="right"><input nama= "Login" value="Login" type="submit"> <input value="Batal" type="reset"></td></tr>
  <tr><td colspan="2" align="center">Belum Punya akun ? <a href="prosesdaftar.php"><b>Daftar</b></a></td></tr>
  </tbody>
  </table>
  </form>
</div>
</body>
</html>

