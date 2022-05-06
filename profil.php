<?php
     session_start();
     include 'koneksi.php';
     if($_SESSION['status_login'] != true){
        echo "<script>window.location='login.php'</script>";
     } 

     $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['id']."' ");
     $d = mysqli_fetch_object($query);
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
              <a class="nav-link active" href="profil.php">Profil</a>
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
            <h3>Profil</h3>
              <div class="box">
                <form action="" method="POST">
                	<div class="mb-3">
	                    <input type="text" class="form-control border-dark" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->nama_admin ?>" required>
                    </div>

                    <div class="mb-3">
	                    <input type="text" class="form-control border-dark" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                    </div>

                    <div class="mb-3">
	                    <input type="text" class="form-control border-dark" name="hp" placeholder="No HP" class="input-control" value="<?php echo $d->telepon_admin ?>" required>
                    </div>

                    <div class="mb-3">
	                    <input type="text" class="form-control border-dark" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->alamat_admin ?>" required>
                    </div>

                    <input type="submit" name="submit" value="Ubah Profil" class="btn-danger float-end">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        
                        $nama   = ucwords($_POST['nama']);
                        $user   = $_POST['user'];
                        $hp     = $_POST['hp'];
                        $alamat = ucwords($_POST['alamat']);

                        $update = mysqli_query($conn, 'UPDATE tb_admin SET 
                                        nama_admin = "'.$nama.'",
                                        username = "'.$user.'",
                                        telepon_admin = "'.$hp.'",
                                        alamat_admin = "'.$alamat.'"
                                        WHERE id_admin = "'.$d->id_admin.'" ');

                        if($update){
                            echo "<script>alert('Ubah data berhasil')</script>";
                            echo "<script>window.location='profil.php'</script>";
                        }else{
                            echo "gagal".mysqli_error($conn);
                        }

                    } 
                 ?>
              </div>

            <h3>Ubah Password</h3>
              <div class="box">
                <form action="" method="POST">
                	<div class="mb-3"> 
	                    <input type="password" class="form-control border-dark" name="pass1" placeholder="Password Baru" class="input-control" required>
                    </div>

                    <div class="mb-3">
	                    <input type="password" class="form-control border-dark" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                    </div>

	                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn-danger float-end">
                </form>
                <?php
                    if(isset($_POST['ubah_password'])){
                        
                        $pass1   = $_POST['pass1'];
                        $pass2   = $_POST['pass2'];

                        if($pass2 != $pass1){
                            echo "<script>alert('Konfirmasi Password Baru tidak sesuai')</script>";
                        }else{
                             $update_pass = mysqli_query($conn, 'UPDATE tb_admin SET
                                        password = "'.MD5($pass1).'"
                                        WHERE id_admin = "'.$d->id_admin.'" ');

                            if($update_pass){
                                echo "<script>alert('Ubah data berhasil')</script>";
                                echo "<script>window.location='profil.php'</script>";
                            }else{
                                echo "gagal".mysqli_error($conn);
                            }
                        }
                    } 
                 ?>
              </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="bg-dark text-white text-center">
      <small>Copyright &copy; 2022 - FAYA PHONE.</small>
    </footer>
    <!-- Akhir Footer -->
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>

  </body>
</html>