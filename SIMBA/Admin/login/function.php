<?php 

//koneksi ke database
$conn= mysqli_connect("localhost", "root", "", "simbafix");


function daftar($data) {
    global $conn;

    $username =strtolower(stripslashes($data["NAMA_USER"]));
    $email= mysqli_real_escape_string($conn, $data["_EMAIL_USER"]);
    $password= mysqli_real_escape_string ($conn, $data["PASSWORD_USER"]);
    $password2= mysqli_real_escape_string ($conn, $data["PASSWORD_USER2"]);

//id autoincrement dari varchar`
$cri_id = mysqli_query ($conn, "SELECT max(ID_USER) AS ID_USER FROM user");
$cari = mysqli_fetch_array ($cri_id);
$kode = substr ($cari ['ID_USER'], 2,5);
$id_tbh = $kode+1;

if($id_tbh<10) {
    $id="U00".$id_tbh;
}else if($id_tbh>=10 && $id_tbh<100)
{$id="U00".$id_tbh;
}else{$id="U".$id_tbh;

}

//cek username sudah ada atau belum
$result = mysqli_query($conn, "SELECT NAMA_USER FROM user
WHERE  NAMA_USER ='$username'");

if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert ('username sudah terdaftar')
        </script>";
        return false;
}
    //cek konfirmasi password
if ( $password !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai');
        </script>";
    return false;
}

//enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);

//tambah username ke database
mysqli_query ($conn , "INSERT INTO user VALUES('$id', '$username', 
'$email', '$password')") ;
  
return mysqli_affected_rows($conn);

}

?>