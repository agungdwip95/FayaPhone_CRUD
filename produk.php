<?php 
     session_start();
     error_reporting(0);
     include 'koneksi.php';
     $kontak = mysqli_query($conn, "SELECT telepon_admin, alamat_admin FROM tb_admin 
        WHERE id_admin = 1");
     $a = mysqli_fetch_object($kontak);
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">


    <title>FAYA PHONE</title>
  </head>
  <body>
    
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger">
      <div class="container">
        <h1><a class="navbar-brand" href="index.php">FAYA PHONE <i class="fa fa-bolt"></i></a></h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="produk.php">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="pelanggan/keranjang.php">Keranjang</a>
            </li>
            <!-- jika sudah login(ada session pelanggan) -->
            <?php if(isset($_SESSION['pelanggan'])): ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="pelanggan/logout.php">Logout</a>
              </li>
            <!-- selain itu (blm login) atau belum ada session pelanggan -->
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="pelanggan/login_pelanggan.php">Login</a>
              </li>
            <?php endif ?>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="pelanggan/daftar.php">Daftar</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="pelanggan/checkout.php">Checkout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- search -->
    <div class="search" style="padding-top: 7rem;">
        <div class="container">
            <form action="produk.php" method="GET">
            	<div class="row g-2">
            		<div class="col-2"></div>
            		<div class="col-7">
		                <input type="text" class="form-control border-dark" name="search" placeholder="Cari Produk">
		            </div>
		            <div class="col">
		                <input type="submit" class="btn btn-danger" name="cari" value="Cari Produk">
		            </div>
	            </div>
            </form>
        </div>
    </div>
    
    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php 
                    if($_GET['search'] != '' || $_GET['kat'] != ''){
                        $where = "AND nama_produk LIKE '%".$_GET['search']."%' AND id_kategori = '".$_GET['kat']."' ";
                    }
                    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE status_produk = 1 $where ORDER BY id_produk DESC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                 ?>
                    <a href="detail-produk.php?id=<?php echo $p['id_produk']; ?>">
                        <div class="kolom-4">
                            <img src="img/produk/<?php echo $p['foto_produk']; ?>">
                            <p class="nama"><?php echo substr($p['nama_produk'], 0, 30); ?></p>
                            <p class="harga">Rp. <?php echo number_format($p['harga_produk']); ?></p>
                    </a>
                            <a href="pelanggan/beli.php?id_pro=<?php echo $p['id_produk']; ?>" class="btn btn-primary btn-sm form-control">Beli</a>
                            <a href="detail-produk.php?id=<?php echo $p['id_produk']; ?>" class="btn btn-secondary btn-sm form-control">Detail</a>

                        </div>
                    </a>
                <?php }} else { ?>
                    <p>Kategori tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
 

    <!-- Footer -->
    <footer class="text-black text-center">
      <small>Copyright &copy; 2022 - FAYA PHONE.</small>
    </footer>
    <!-- Akhir Footer -->
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>

  </body>
</html>