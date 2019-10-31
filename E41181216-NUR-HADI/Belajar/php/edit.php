<?php
    if(isset($_POST['update']))
        {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $hp = $_POST['hp'];

            $result = mysqli_query($mysqli, "UPDATE users SET nama='$nama', hp='hp' WHERE id=$id");

            header("Location: index.php")
        }
?>
<?php

$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
while ($user_data = mysqli_fetch_array($result)) 
{
    $nama = $user_data['nama'];
    $hp = $hp['hp'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User Data</title>
</head>
<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>nama</td>
                <td><input type="text" nama="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Hp</td>
                <td><input type="text" name="hp" value=<?php echo $hp;?>></td>
            </tr>
            <tr> 
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>

    <!-- Edit.php digunakan untuk mengedit / update data pengguna. 
    Anda dapat mengubah data pengguna dan memperbaruinya.
    File ini akan mengarahkan pengguna kembali ke homepage, setelah update sukses. -->

</body>
</html>