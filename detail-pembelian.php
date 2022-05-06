<?php
     session_start();
     include 'koneksi.php';
     if($_SESSION['status_login'] != true){
        echo "<script>window.location='login.php'</script>";
     }

     $data = mysqli_query($conn, 'SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_pembelian.id_pembelian = "'.$_GET['idpembelian_detail'].'" '); 
     $detail = mysqli_fetch_assoc($data);
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
        <h1><a class="navbar-brand" href="dashboard.php">FAYA PHONE <i class="fa fa-bolt"></i></a></h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profil.php">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="data-kategori.php">Data Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="data-produk.php">Data Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="data-pembelian.php">Data Pembelian</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="keluar.php">Keluar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- content -->
    <div class="section" style="padding-top: 6rem;">
        <div class="container">
            <h3>Detail Pembelian</h3><br>
            
            <div style="padding-bottom: 3rem;">
            <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
            <p class="float-start">
              No Telp : <?php echo $detail['telepon_pelanggan']; ?><br>
              Email : <?php echo $detail['email_pelanggan']; ?>
            </p>
            <p class="float-end">
              Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
              Total : Rp.<?php echo number_format($detail['total_pembelian']); ?>
            </p>
          </div>

            <div class="box">
                <table border="1" cellspacing="0" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                             $no =1;
                             $produk = mysqli_query($conn, "SELECT * FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.id_produk = tb_produk.id_produk WHERE tb_pembelian_produk.id_pembelian = '".$_GET['idpembelian_detail']."' ");
                             if(mysqli_num_rows($produk) > 0){
                             while($row = mysqli_fetch_array($produk)){
                         ?>
                         <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $row['nama_produk']; ?></td>
                              <td>Rp. <?php echo number_format($row['harga_produk']); ?></td>
                              <td><?php echo $row['jumlah']; ?></td>
                              <td>
                                  Rp. <?php echo number_format($row['harga_produk']*$row['jumlah']); ?>
                              </td>
                          </tr>
                      <?php }} else { ?>
                          <!-- jika data produk tidak ada isi -->
                          <tr>
                              <td colspan="7">Tidak ada data</td>
                          </tr>
                      <?php } ?>
                    </tbody>
                </table>
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