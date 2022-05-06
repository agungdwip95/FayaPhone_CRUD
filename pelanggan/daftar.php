<?php 
   session_start();
   include '../koneksi.php';

   if(isset($_SESSION['pelanggan']))
   {
    echo "<script>alert('Anda telah login, untuk daftar harap logout terlebih dahulu!!!');</script>";
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
              <a class="nav-link" aria-current="page" href="keranjang.php">Keranjang</a>
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
                <a class="nav-link active" aria-current="page" href="daftar.php">Daftar</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="checkout.php">Checkout</a>
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
                Daftar Pelanggan
              </div>
              <div class="card-body">
                <form method="POST" class="form-horizontal" style="padding-left: 300px;">
                  <div class="form-group">
                    <label class="control-label col-md-3">Nama</label>
                    <div class="col-md-7">
                      <input type="text" class="form-control border-dark" name="nama" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Email</label>
                    <div class="col-md-7">
                      <input type="email" class="form-control border-dark" name="email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Password</label>
                    <div class="col-md-7">
                      <input type="text" class="form-control border-dark" name="password" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Alamat</label>
                    <div class="col-md-7">
                      <textarea class="form-control border-dark" name="alamat" required></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Telp/HP</label>
                    <div class="col-md-7">
                      <input type="text" class="form-control border-dark" name="telepon" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-7 mt-3 ">
                      <button class="btn btn-primary" name="daftar">Daftar</button>
                    </div>
                  </div>
                </form>
                
                <?php 
                    
                    if(isset($_POST['daftar']))
                    {
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $alamat = $_POST['alamat'];
                        $telepon = $_POST['telepon'];
                        
                        //cek apakah email sudah digunakan
                        $cek_email = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE email_pelanggan = '".$email."' ");
                        $jika_sudah_ada = mysqli_num_rows($cek_email);

                        if($jika_sudah_ada==1){
                          echo "<script>alert('Pendaftaran gagal, email sudah digunakan');</script>";
                          echo "<script>window.location='daftar.php';</script>";
                        }else{
                          $insert = mysqli_query($conn, "INSERT INTO tb_pelanggan VALUES (
                                      null,
                                        '".$email."',
                                        '".MD5($password)."',
                                        '".$nama."',
                                        '".$telepon."',
                                        '".$alamat."'
                                          )");

                          echo "<script>alert('Pendaftaran sukses, silahkan login');</script>";
                          echo "<script>window.location='login_pelanggan.php';</script>";
                        }
                        
                      }

                 ?>

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