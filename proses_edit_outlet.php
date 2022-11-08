<?php
$id_outlet = $_POST['id_outlet'];
    $nama_outlet = $_POST["nama_outlet"];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    
    include "koneksi.php";
    $input = mysqli_query($conn, "UPDATE outlet SET nama_outlet='".$nama_outlet."', 
    alamat='".$alamat."', telp='".$telp."'
    where id_outlet = '".$id_outlet."'");

    if ($input) {
        echo "<script>alert('Success to Edit Outlet');location.href='view_outlet.php';</script>";
    }
    else {
        echo "<script>alert('Failed to Edit Outlet');location.href='view_outlet.php';</script>";
    }
?>