<?php 
   session_start();
    error_reporting(0);
   include '../koneksi.php';

   // jika tidak ada session pelanggan (blm login), maka direct ke login.php
   if(!isset($_SESSION['pelanggan']))
   {
   	echo "<script>alert('silahkan login');</script>";
    echo "<script>window.location='login_pelanggan.php';</script>";
   }

   if(!isset($_SESSION['keranjang'])){
      echo "<script>alert('Keranjang kosong, silahkan belanja dulu!!!')</script>";
      echo "<script>window.location='../index.php'</script>";
    }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Checkout</title>
  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
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
                <a class="nav-link" aria-current="page" href="daftar.php">Daftar</a>
              </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="checkout.php">Checkout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

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
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $totalbelanja = 0; ?>
                    	<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
                        <?php 
                             $no =1;
                             $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '$id_produk' ");
                             if(mysqli_num_rows($produk) > 0){
                             while($row = mysqli_fetch_array($produk)){
                             	$subtotal = $row['harga_produk']*$jumlah;
                         ?>
                         <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $row['nama_produk']; ?></td>
                              <td><?php echo number_format($row['harga_produk']); ?></td>
                              <td><?php echo $jumlah; ?></td>
                              <td>
                                  Rp. <?php echo number_format($subtotal); ?>
                              </td>
                          </tr>
                      <?php }} else { ?>
                          <!-- jika data produk tidak ada isi -->
                          <tr>
                              <td colspan="7">Tidak ada data</td>
                          </tr>
                      <?php  } $totalbelanja+=$subtotal; endforeach ?>
                    </tbody>
                    <tfoot>
                    	<tr>
                    		<th colspan="4">Total Belanja</th>
                    		<th>Rp. <?php echo number_format($totalbelanja); ?></th>
                    	</tr>
                    </tfoot>
                </table>

                <form method="POST">
                	<div class="row">
                		<div class="col-md-4">
                			<div class="form-group">
                				<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>" class="form-control border-dark" >
                			</div>
                		</div>
                		<div class="col-md-4">
                			<div class="form-group">
                				<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan']; ?>" class="form-control border-dark" >
                			</div>
                		</div>
                		<div class="col-md-4">
                			<select class="form-control form-select border-dark" name="id_ongkir" required>
                				<option value="">Pilih Ongkos Kirim</option>
                				<?php 
                                   $data = mysqli_query($conn, 'SELECT * FROM tb_ongkir');
                                   if(mysqli_num_rows($data) > 0){
                                   while($row = mysqli_fetch_array($data)){ 
                				 ?>
	                				<option value="<?php echo $row['id_ongkir']; ?>">
		                				<?php echo $row['nama_kota']; ?>
		                				Rp. <?php echo number_format($row['tarif']); ?>
	                			    </option>
                			    <?php }} ?>
                			</select>
                		</div>
                	</div>
                  <div class="form-group mt-1">
                    <br><label><b>Alamat Lengkap Pengiriman</b></label>
                    <textarea class="form-control mt-2 border-dark" name="alamat_pengiriman" placeholder="masukan alamat lengkap pengiriman" required></textarea>
                  </div>
                	<button class="btn btn-primary mt-2 float-end" name="checkout">Checkout</button>
                </form>

                <?php 
                    
                    if(isset($_POST['checkout']))
                    {
                    	$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                    	$id_ongkir = $_POST['id_ongkir'];
                    	$tanggal_pembelian = date('Y-m-d');
                      $alamat_pengiriman = $_POST['alamat_pengiriman'];
                        
                        $data = mysqli_query($conn, "SELECT * FROM tb_ongkir WHERE id_ongkir = '".$id_ongkir."' ");
                        $arrayongkir = mysqli_fetch_assoc($data);
                        $nama_kota = $arrayongkir['nama_kota'];
                        $tarif = $arrayongkir['tarif'];

                        $total_pembelian = $totalbelanja + $tarif;

                        // menyimpan data ke tabel pembelian
                        $insert = mysqli_query($conn, "INSERT INTO tb_pembelian VALUES (
                        	            null,
                                        '".$id_pelanggan."',
                                        '".$id_ongkir."',
                                        '".$tanggal_pembelian."',
                                        '".$total_pembelian."',
                                        '".$nama_kota."',
                                        '".$tarif."',
                                        '".$alamat_pengiriman."'
                                          )");

                        // mendapatkan id pembelian barusan terjadi
                        $id_pembelian_barusan = $conn->insert_id;

                        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {

                          //mendapatkan data produk berdasrkan id_produk
                          $data_by_id =  mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '".$id_produk."' ");
                          $data1 = mysqli_fetch_assoc($data_by_id);

                          $nama = $data1['nama_produk'];
                          $harga = $data1['harga_produk'];

                          $subharga = $data1['harga_produk']*$jumlah;
                        	$insert_pembelian_produk = mysqli_query($conn, "INSERT INTO tb_pembelian_produk VALUES (
				                        	            null,
				                                        '".$id_pembelian_barusan."',
				                                        '".$id_produk."',
                                                '".$jumlah."',
                                                '".$nama."',
                                                '".$harga."',
				                                        '".$subharga."'
				                                          )");
                        }

                        // mengkosongkan keranjang belanja
                        unset($_SESSION['keranjang']);

                        // tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
                        echo "<script>alert('pembelian sukses');</script>";
						            echo "<script>window.location='nota.php?id=$id_pembelian_barusan';</script>";

                    }
                  
                   
                 ?>

            </div>
        </div>
    </div>
 
 </body>
 </html>