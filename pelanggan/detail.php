<!DOCTYPE html>
<html>
<head>
	<title>Detail Pembelian</title>
</head>
<body>

	<h2>Detail Pembelian</h2>
	<?php 
     $data = mysqli_query($conn, 'SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_pembelian.id_pembelian = "'.$_GET['idpembelian_detail'].'" '); 
     $detail = mysqli_fetch_assoc($data);
	 ?>
     
     <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
        <p>
          <?php echo $detail['telepon_pelanggan']; ?>
          <?php echo $detail['email_pelanggan']; ?>
        </p>
        <p>
          tanggal:<?php echo $detail['tanggal_pembelian']; ?><br>
          Total: <?php echo $detail['total_pembelian']; ?>
        </p>

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
                          <td><?php echo $row['harga_produk']; ?></td>
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
</body>
</html>