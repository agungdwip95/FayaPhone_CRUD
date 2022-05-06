<?php 
session_start();
// mendapatkan id produk dari url
$id_produk = $_GET['id_pro'];

// jika sudah ada produk intu dikeranjang, maka produk itu jumlahnya di +1
if(isset($_SESSION['keranjang'][$id_produk]))
{
	$_SESSION['keranjang'][$id_produk]+=1;
}
// selain itu (belum ada dikeranjang) , maka produk itu dianggap dibeli 1
else
{
	$_SESSION['keranjang'][$id_produk]=1;
}

// direct ke halaman keranjang
echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>window.location='keranjang.php';</script>";

?>