 <?php
     session_start();
     include '../koneksi.php';

     if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang']))
     {
     	echo "<script>alert('Keranjang kosong, silahkan belanja dulu');</script>";
        echo "<script>window.location='../index.php';</script>";
     }
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
    <link rel="stylesheet" type="text/css" href="../css/style.css">


    <title>FAYA PHONE</title>
  </head>
  <body>
    
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger">
      <div class="container">
        <h1><a class="navbar-brand" href="../index.php">FAYA PHONE <i class="fa fa-bolt"></i></a></h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../produk.php">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="keranjang.php">Keranjang</a>
            </li>
            <!-- jika sudah login(ada session pelanggan) -->
            <?php if(isset($_SESSION['pelanggan'])): ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
              </li>
            <!-- selain itu (blm login) atau belum ada session pelanggan -->
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="login_pelanggan.php">Login</a>
              </li>
            <?php endif ?>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="daftar.php">Daftar</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="checkout.php">Checkout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- konten -->
    <div class="section" style="padding-top: 6rem;">
        <div class="container">
            <br><h3>Keranjang Belanja</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php  
                             foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):
                             $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '".$id_produk."' " );
                             if(mysqli_num_rows($produk) > 0){
                             while($row = mysqli_fetch_array($produk)){
                             	$subtotal = $row['harga_produk']*$jumlah;
                         ?>
                         <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $row['nama_produk']; ?></td>
                              <td>Rp. <?php echo number_format($row['harga_produk']); ?></td>
                              <td><?php echo $jumlah; ?></td>
                              <td>
                                  Rp. <?php echo number_format($subtotal); ?>
                              </td>
                              <td>
                              	<a href="hapuskeranjang.php?id_produk_hapus=<?php echo $id_produk; ?>" class="btn btn-danger btn-xs">hapus</a>
                              </td>
                          </tr>
                      <?php }} else { ?>
                          <!-- jika data produk tidak ada isi -->
                          <tr>
                              <td colspan="7">Tidak ada data</td>
                          </tr>
                      <?php  } endforeach ?>
                    </tbody>
                </table>

                <a href="../index.php" class="btn btn-secondary">Lanjutkan Belanja</a>
                <a href="checkout.php" class="btn btn-success">Checkout</a>
            </div>
        </div>
    </div>
 

    <!-- Footer -->
    <footer class="bg-dark text-white text-center" id="footer_bawah">
      <small>Copyright &copy; 2022 - FAYA PHONE.</small>
    </footer>
    <!-- Akhir Footer -->
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>

  </body>
</html>