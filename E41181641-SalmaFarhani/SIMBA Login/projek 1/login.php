 
<?php
   session_start();
   if(isset($_SESSION['NAMA_USER'])) {
   header('location:index.php'); }
   require_once("koneksi.php");
?>

<title>Form Login</title>
<div align='center'>
  <form action="proseslogin.php" method="post">
  <h1>Masuk</h1>
  <table>
  <tbody>
  <tr><td>Username</td><td> : <input name="NAMA_USER atau _EMAIL_USER" type="text"></td></tr>
  <tr><td>Password</td><td> : <input name="PASSWORD_USER" type="password"></td></tr>
  <tr><td colspan="2" align="right"><input value="Login" type="submit"> <a href="index.php"></a><input value="Batal" type="reset"></td></tr>
  <tr><td colspan="2" align="center">Belum Punya akun ? <a href="prosesdaftar.php"><b>Daftar</b></a></td></tr>
  </tbody>
  </table>
  </form>
</div>

