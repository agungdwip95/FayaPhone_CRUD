<?php
     session_start();
     include 'koneksi.php';
     if($_SESSION['status_login'] != true){
        echo "<script>window.location='login.php'</script>";
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
              <a class="nav-link active" href="data-pembelian.php">Data Pembelian</a>
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
            <h3>Data Pembelian</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                             $no =1;
                             $produk = mysqli_query($conn, "SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan = tb_pelanggan.id_pelanggan");
                             if(mysqli_num_rows($produk) > 0){
                             while($row = mysqli_fetch_array($produk)){
                         ?>
                         <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $row['nama_pelanggan']; ?></td>
                              <td><?php echo $row['tanggal_pembelian']; ?></td>
                              <td>Rp. <?php echo number_format($row['total_pembelian']); ?></td>
                              <td>
                                  <a href="proses-hapus.php?idpembelian=<?php echo $row['id_pembelian'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                                  <a href="detail-pembelian.php?idpembelian_detail=<?php echo $row['id_pembelian'] ?>" class="btn btn-info btn-sm text-white">Detail</a>
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
    <footer class="text-black text-center">
      <small>Copyright &copy; 2022 - FAYA PHONE.</small>
    </footer>
    <!-- Akhir Footer -->
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>

  </body>
</html>