<?php 
   session_start();
   include '../koneksi.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>nota pembelian</title>
 	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.1.3/css/bootstrap.min.css">
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
              <a class="nav-link" aria-current="page" href="checkout.php">Checkout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <section style="padding-top: 6rem;">
    	<div class="container">
    		<br><h2>Detail Pembelian</h2><br>
			<?php 
		     $data = mysqli_query($conn, 'SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_pembelian.id_pembelian = "'.$_GET['id'].'" '); 
		     $detail = mysqli_fetch_assoc($data);
			 ?>

            <div class="row">
              
              <div class="col-md-4">
                <!-- <h3>Pelanggan</h3> -->
                <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
                <p>
                  <?php echo $detail['email_pelanggan']; ?><br>
                  <?php echo $detail['telepon_pelanggan'] .' - '. $detail['alamat_pengiriman'];  ?><br>
                </p>
              </div>

              <div class="col-md-auto" style="padding-left: 600px;" >
                <!-- <h3>Pembelian</h3> -->
                <strong>No. Pembelian: <?php echo $detail['id_pembelian']; ?></strong><br>
                Tanggal:<?php echo $detail['tanggal_pembelian']; ?><br>
                Total: Rp. <?php echo number_format($detail['total_pembelian']); ?>
              </div>

		        <div class="box">
		            <table border="1" cellspacing="0" class="table table-bordered table-hover">
		                <thead class="table-secondary">
		                    <tr>
		                        <th width="60px">No</th>
		                        <th>Nama Produk</th>
		                        <th>Harga</th>
		                        <th>Jumlah</th>
		                        <th>Subharga</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <?php 
		                         $no =1;
		                         $produk = mysqli_query($conn, "SELECT * FROM tb_pembelian_produk WHERE id_pembelian = '".$_GET['id']."' ");
		                         if(mysqli_num_rows($produk) > 0){
		                         while($row = mysqli_fetch_array($produk)){
		                     ?>
		                     <tr>
		                          <td><?php echo $no++; ?></td>
		                          <td><?php echo $row['nama']; ?></td>
		                          <td>Rp. <?php echo number_format($row['harga']); ?></td>
		                          <td><?php echo $row['jumlah']; ?></td>
		                          <td>
		                              Rp. <?php echo number_format($row['subharga']); ?>
		                          </td>
		                      </tr>
		                  <?php }} else { ?>
		                      <!-- jika data produk tidak ada isi -->
		                      <tr>
		                          <td colspan="7">Tidak ada data</td>
		                      </tr>
		                  <?php } ?>
		                </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4">Ongkos Kirim ( <?php echo $detail['nama_kota']; ?> - Rp. <?php echo number_format($detail['tarif']); ?> )</td>
                        <td>Rp. <?php echo number_format($detail['tarif']); ?></td>
                      </tr>
                      <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($detail['total_pembelian']); ?></th>
                      </tr>
                    </tfoot>
		            </table>
		        </div>
		    </div>
		</div>
                                
        <div class="row">
        	<div class="col-md-7">
        		<div class="alert alert-info">
        			<p>
        				Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
        				<strong>BANK MANDIRI 137-001088-3276 AN. Lionel Messi</strong>
        			</p>
        		</div>
        	</div>    
          </div>
        </div>

    </div>
    </section>
 
 </body>
 </html>