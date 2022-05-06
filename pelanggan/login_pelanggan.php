<?php 
   session_start();
   include '../koneksi.php';
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

    <link rel="stylesheet" type="text/css" href="../css/style.css">


    <title>Login | FAYA PHONE</title>
  </head>
  <body id="bg-login">

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
                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
              </li>
            <!-- selain itu (blm login) atau belum ada session pelanggan -->
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login_pelanggan.php">Login</a>
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

    <div class="container section-utama" style="padding-top: 6rem;">
        <div class="row">
          <div class="col-lg-12 col-md-12 text-center user-login-header">
            <h3 style="color: white;">Login Pelanggan</h3>
          </div>
        </div>
      
      <form action="" method="POST">
        <div class="row">
          <div class="col-md-4 col-sm-8 col-xs-12 offset-md-4 offset-sm-2 login-image-main text-center">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 user-image-section">
                <img src="../img/businessman.png">
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 user-login-box">
                <div class="mb-3">
                  <input type="email" name="user" class="form-control" placeholder="Email" id="usr">
                </div>
                <div class="mb-3">
                  <input type="password" name="pass" class="form-control" placeholder="Password" id="usr">
                </div>
                <input type="submit" id="submit" name="login" value="Login" class="btn btn-defualt">
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 last-part">
                <p>Not registered?<a href="#"> Create an account</a></p>
              </div>
            </div>
          </div>     
        </div> 
      </form>
      <?php
           if(isset($_POST['login'])){
                
                $user = mysqli_real_escape_string($conn, $_POST['user']);
                $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                $cek = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE email_pelanggan = '".$user."' AND password_pelanggan = '".MD5($pass)."'");
                if(mysqli_num_rows($cek) > 0){
                  $akun = mysqli_fetch_assoc($cek);
                  $_SESSION['pelanggan'] = $akun;
                  echo "<script>window.location='checkout.php'</script>";
                }else{
                  echo "<script>alert('Username atau Password Anda Salah!')</script>";
                }

           } 
       ?>
    </div>      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>

  </body>
</html>