<?php
     session_start();
     include 'koneksi.php';
     if($_SESSION['status_login'] != true){
        echo "<script>window.location='login.php'</script>";
     } 

     $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '".$_GET['id']."' ");
     //jika tidak ada data arahkan ke data produk (jika ada orang iseng hapus id di url)
     if(mysqli_num_rows($produk) == 0 ){
        echo "<script>window.location='data-produk.php'</script>";
     }
     $p = mysqli_fetch_object($produk);

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

    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>


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
            <h3>Edit Data Produk</h3>
              <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                     <div class="mb-3">
                       <select class="form-control border-dark" name="kategori" required>
                          <option value="">--Pilih--</option>
                          <?php
                              $kategori = mysqli_query($conn, 'SELECT * FROM tb_kategori ORDER BY id_kategori ASC');
                              while($r = mysqli_fetch_array($kategori)){  
                           ?>
                           <option value="<?php echo $r['id_kategori'] ?>" <?php echo ($r['id_kategori'] == $p->id_kategori)? 'selected': '' ?>><?php echo $r['nama_kategori']; ?></option>
                      <?php } ?>
                      </select>
                    </div>

                	  <div class="mb-3">
                      <input type="text" class="form-control border-dark" name="nama" placeholder="Nama Produk" value="<?php echo $p->nama_produk ?>" required>
                    </div>

                    <div class="mb-3">
                      <input type="text" class="form-control border-dark" name="harga" placeholder="Harga" value="<?php echo $p->harga_produk ?>" required>
                    </div>

                    <div class="mb-3">
                      <img src="img/produk/<?php echo $p->foto_produk ?>" width="100px"><br><br>
                      <input type="hidden" name="foto" value="<?php echo $p->foto_produk  ?>">
                      <input type="file" name="gambar">
                    </div>

                    <div class="mb-3">
                      <textarea class="form-control border-dark" name="deskripsi" placeholder="Deskripsi"><?php echo $p->deskripsi_produk ?></textarea>
                    </div>

                    <div class="mb-3">
                      <select class="form-control border-dark" name="status">
                        <option value="">--Pilih--</option>
                        <option value="1" <?php echo ($p->status_produk == 1) ? 'selected':''; ?>>Aktif</option>
                        <option value="0" <?php echo ($p->status_produk == 0) ? 'selected':''; ?>>Tidak Aktif</option>
                      </select>
                    </div>

                    <input type="submit" name="submit" value="Submit" class="btn-danger float-end">
                </form>
                <?php 
                    if(isset($_POST['submit'])){

                        // data inputam dari form
                        $kategori  = $_POST['kategori'];
                        $nama      = $_POST['nama'];
                        $harga     = $_POST['harga'];     
                        $deskripsi = $_POST['deskripsi'];
                        $status    = $_POST['status'];
                        $foto    = $_POST['foto'];

                        // data gambar yang baru
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];
                        
                        

                        // jika admin ganti gambar 
                        if($filename != ''){
                            //explode untuk mengubah text jadi array
                            //ambil delimiternya atau yang memisahkannya yaitu titik .
                            $type1 = explode('.', $filename);
                            // isi array $type1[0]; yaitu nama file nya 
                            // isi array $type1[1]; yaitu nama formatnya nya misal(jpg) 
                            $type2 = $type1[1];
                            
                            //ubah nama file yang diupload
                            $newname = 'produk'.time().'.'.$type2;

                            // menampung data format file yang diizinkan
                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                           // validasi format file
                            if(!in_array($type2, $tipe_diizinkan)){
                                //jika format file tidak ada di dalam tipe diizinkan
                                echo "<script>alert('Format file tidak diizinkan')</script>";
                            }else{
                                //mengahpus gambar di folder produk
                                unlink('img/produk/'.$foto);
                                // proses upload file sekaligus insert ke database
                                move_uploaded_file($tmp_name, 'img/produk/'.$newname);

                                $namagambar = $newname;
                            }
                        }else{
                                // jika admin tidak ganti gambar
                                $namagambar = $foto;
                        }

                        // query update data produk
                        $update = mysqli_query($conn, "UPDATE tb_produk SET 
                                                id_kategori = '".$kategori."',
                                                nama_produk = '".$nama."',
                                                harga_produk = '".$harga."',
                                                foto_produk = '".$namagambar."',
                                                deskripsi_produk = '".$deskripsi."',
                                                status_produk = '".$status."'
                                                WHERE id_produk = '".$p->id_produk."' ");

                        if($update){
                            echo "<script>alert('Ubah data berhasil')</script>";
                            echo "<script>window.location='data-produk.php'</script>";
                        }else{
                            echo "gagal".mysqli_error($conn);
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

    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>

  </body>
</html>