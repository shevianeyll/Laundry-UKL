<?php
    session_start();
    include "koneksi.php";
    $cart=@$_SESSION['cart'];
    $id_member = $_POST['id_member'];
    $id_outlet = $_POST['id_outlet'];
    // echo $_POST['id_member'];
    // echo $_POST['id_outlet'];
    if(count($cart)>0 and $id_member != NULL){
        $tgl_bayar=5; //satuan hari
        $tgl_harus_bayar=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$tgl_bayar),date('Y')));
        mysqli_query($conn,"INSERT INTO transaksi (id_outlet, id_member, id_user, tgl_transaksi, batas_waktu, tgl_bayar, status, dibayar) VALUES ('".$id_outlet."', '".$id_member."', '".$_SESSION['id_user']."', '".date('Y-m-d')."','".$tgl_harus_bayar."', '".date('Y-m-d')."','Baru',  'Belum Bayar')");
        $id=mysqli_insert_id($conn);
        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($conn,"INSERT INTO detail_transaksi(id_transaksi, id_paket, qty) VALUES ('".$id."','".$val_produk['id_paket']."', '".$val_produk['qty']."')");
        }
        unset($_SESSION['cart']);
            echo '<script>alert("Pembelian berhasil");location.href="view_order.php"</script>';
    }else {
        echo '<script>alert("Belum diisi semua");location.href="add_order.php"</script>';
    }
?>