<?php 
    include 'koneksi.php';

    if(isset($_GET['idk'])){
    	$delete = mysqli_query($conn, 'DELETE FROM tb_kategori WHERE id_kategori = "'.$_GET['idk'].'" ');
    	echo "<script>window.location='data-kategori.php'</script>";
    }

    if(isset($_GET['idp'])){
        $produk = mysqli_query($conn, 'SELECT foto_produk FROM tb_produk WHERE id_produk= "'.$_GET['idp'].'" ');
        $p = mysqli_fetch_object($produk);

        //mengahpus gambar di folder produk
        unlink('./produk/'.$p->foto_produk);

    	$delete = mysqli_query($conn, 'DELETE FROM tb_produk WHERE id_produk = "'.$_GET['idp'].'" ');
    	echo "<script>window.location='data-produk.php'</script>";
    }

    if(isset($_GET['idpembelian'])){
        $delete = mysqli_query($conn, 'DELETE FROM tb_pembelian WHERE id_pembelian = "'.$_GET['idpembelian'].'" ');
        echo "<script>window.location='data-pembelian.php'</script>";
    }
 ?>