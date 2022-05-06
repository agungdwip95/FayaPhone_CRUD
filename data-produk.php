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
              <a class="nav-link active" href="data-produk.php">Data Produk</a>
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
            <h3>Data Produk</h3>
            <div class="box">
                <p><a href="tambah-produk.php" class="btn btn-success">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="140px">Nama Produk</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                             $no =1;
                             $produk = mysqli_query($conn, "SELECT * FROM tb_produk LEFT JOIN tb_kategori USING (id_kategori) ORDER BY id_produk ASC");
                             if(mysqli_num_rows($produk) > 0){
                             while($row = mysqli_fetch_array($produk)){
                         ?>
                         <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $row['nama_kategori']; ?></td>
                              <td><?php echo $row['nama_produk']; ?></td>
                              <td>Rp. <?php echo number_format($row['harga_produk']); ?></td>
                              <td><?php echo $row['deskripsi_produk']; ?></td>
                              <td><a href="img/produk/<?php echo $row['foto_produk'] ?>" target="_blank"><img src="img/produk/<?php echo $row['foto_produk']; ?>" width="50px"> </a></td>
                              <td><?php echo ($row['status_produk'] == 0)? 'Tidak AKtif':'Aktif'; ?></td>
                              <td>
                                  <a href="edit-produk.php?id=<?php echo $row['id_produk'] ?>" class="btn btn-primary btn-sm">Edit</a> 
                                  <a href="proses-hapus.php?idp=<?php echo $row['id_produk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
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