<?php 
    session_start();

    //menghancurkan $_SESSION['pelanggan'];
    session_destroy();
    
    echo "<script>alert('anda telah logout');</script>";
    echo "<script>window.location='../index.php';</script>";
 ?>