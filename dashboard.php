<?php
     session_start();
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
              <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
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
          <div class="card">
              <div class="card-header">
                Dashboard
              </div>
              <div class="card-body">
                <h5 class="card-title">Selamat Datang <?php echo $_SESSION['a_global']->nama_admin; ?> di Toko Online</h5>
                <p class="card-text">FAYAPHONE - USER</p>
              </div>
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