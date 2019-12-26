<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
// Start the session
session_start();
require 'connect.php';
require 'item.php';

if(isset($_GET['ID_DAFTAR']) && !isset($_POST['update']))  { 
	$sql= mysqli_query(
		"SELECT daftar.ID_DAFTAR, siswa.NISN , siswa.NAMA_SISWA, siswa.FOTO, jenis_lomba.NAMA_LOMBA,
		jenis_lomba.BIAYA, sekolah.NAMA_SEKOLAH
				FROM melakukan,daftar,siswa,jenis_lomba,sekolah
				WHERE melakukan.ID_DAFTAR = daftar.ID_DAFTAR
				AND melakukan.NISN = siswa.NISN"
	);
	$result = mysqli_query($con, $sql);
	$daftar = mysqli_fetch_object($result);
	$item = new Item();
	$item->ID_DAFTAR = $daftar->ID_DAFTAR;
	$item->NISN = $daftar->NISN;
	$item->NAMA_SISWA = $daftar->NAMA_SISWA;
	$item->TEMPAT_LAHIR = $daftar->TEMPAT_LAHIR;
	$item->TANGGAL_LAHIR = $daftar->TANGGAL_LAHIR;
	$item->ALAMAT = $daftar->ALAMAT;
	$item->JENIS_LOMBA = $daftar->NAMA_LOMBA;
	$item->BIAYA = $daftar->BIAYA;
	// Check product is existing in cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
	for($i=0; $i<count($cart);$i++)
		if ($cart[$i]->id == $_GET['ID_DAFTAR']){
			$index = $i;
			break;
		}
		if($index == -1) 
			$_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
		else {
			
			if (($cart[$index]->quantity) < $iteminstock)
				 $cart[$index]->quantity ++;
			     $_SESSION['cart'] = $cart;
		}
}

// Delete product in cart
if(isset($_GET['index']) && !isset($_POST['update'])) {
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}
// Update quantity in cart
if(isset($_POST['update'])) {
  $arrQuantity = $_POST['quantity'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->quantity = $arrQuantity[$i];
  }
  $_SESSION['cart'] = $cart;
}
?>
<h2> DATA PENDAFTARAN ANDA: </h2> 
<form method="POST">
<table id="t01">
<tr>
	<th>Option</th>
	<th>ID DAFTAR</th>
	<th>NISN</th>
	<th>Nama Siswa</th>
	<th>Tempat Lahir</th>
	<th>Tanggal Lahir</th>
	<th>Alamat</th>
	<th>Jenis Lomba</th>
	<th>Biaya</th>
	<th>Total</th>
</tr>
<?php 
     $cart = unserialize(serialize($_SESSION['cart']));
 	 $s = 0;
 	 $index = 0;
 	for($i=0; $i< count($cart); $i++){
 		$s += $cart[$i]->BIAYA * $cart[$i]->quantity;
 ?>	

   <tr>
    	<td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')" >Delete</a> </td>
		<td> <?php echo $cart[$i]->ID_DAFTAR; ?> </td>
		<td> <?php echo $cart[$i]->NISN; ?> </td>
   		<td> <?php echo $cart[$i]->NAMA_SISWA; ?> </td>
   		<td><?php echo $cart[$i]->TEMPAT_LAHIR; ?> </td>
		<td><?php echo $cart[$i]->TANGGAL_LAHIR; ?> </td>
		<td><?php echo $cart[$i]->ALAMAT; ?> </td>
		<td><?php echo $cart[$i]->JENIS_LOMBA; ?> </td>
		<td><?php echo $cart[$i]->BIAYA; ?> </td>
        <td> Rp.<?php echo $cart[$i]->BIAYA * $cart[$i]->quantity; ?> </td> 
   </tr>
 	<?php 
	 	$index++;
 	} ?>
 	<tr>
 		<td colspan="5" style="text-align:right; font-weight:bold">Sum 
         <input id="saveimg" type="image" src="images/save.png" name="update" alt="Save Button">
         <input type="hidden" name="update">
 		</td>
 		<td> Rp.<?php echo $s; ?> </td>
 	</tr>
</table>
</form>
<br>
<a href="index.php">Daftarkan peserta lagi</a> | <a href="checkout.php">Checkout</a>
<?php 
if(isset($_GET["ID_DAFTAR"]) || isset($_GET["index"])){
 header('Location: cart.php');
} 
?>
</body>
</html>