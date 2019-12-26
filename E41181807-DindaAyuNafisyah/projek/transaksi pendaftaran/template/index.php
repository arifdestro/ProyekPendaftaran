<?php
 require 'function.php';
if (isset($_POST["signup_submit"])){
  if (daftar($_POST) > 0){
    echo "<script>
          alert ('user berhasil ditambah');
        </script>";
  }else{
    echo mysqli_error($conn);}
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Pendaftaran</title>
    </head>
<body>
    
    <div class="container">
            <h2>Pendaftaran Olimpiade </h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama-pendaftar">Username</label>
                    <input type="text" class="form-control" id="nama-pendaftar" placeholder="Enter Nama Pendaftar" name="NAMA_USER">
                </div>
                <div class="form-group">
                    <label for="email">email:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Email" name="_EMAIL_USER">
                </div>
                <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="PASSWORD_USER">
                </div>
                <div class="form-group">
                        <label for="ulangi-pwd">Ulangi Password:</label>
                        <input type="password" class="form-control" id="ulangi-pwd" placeholder="Ulangi Password" name="PASSWORD_USER2">
                </div>
        </div>
        <!-- <table>
            <tr><td>Captcha</td>
                    <td id="captcha">
                        <script>createCaptcha();</script>
                    </td>
            </tr>
            <tr>
                <td>Type Captcha</td>
                <td><input type="text" name="recaptcha" id="recaptcha" placeholder="Enter The Captcha"></td>
                <td od= 'errCaptcha' class="errmsg"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                <input type="button" value="submit" onclick="validateRecaptcha()"/>
            </td>
            </tr>
        </table> -->
   
                <button type="submit" class="btn btn-primary">LOGIN</button>
                <button type="submit" class="btn btn-primary" name="signup_submit">DAFTAR</button>
                </form>
    </div>
    
</body>
</html>
