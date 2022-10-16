<?php
    
    if(isset($_GET['id_peminjaman']) && isset($_GET['id_buku'])){
        include ('../db.php');
        $id_peminjaman = $_GET['id_peminjaman'];
        $id_buku = $_GET['id_buku'];

        $queryUpdate = mysqli_query($con, "UPDATE peminjaman SET status = 'Sudah Dikembalikan' WHERE id_peminjaman='$id_peminjaman'") or die(mysqli_error($con));

        //update jumlaah buku
        $queryKurangJumlah = mysqli_query($con, "SELECT * FROM buku WHERE id_buku = '$id_buku'") or die(mysqli_error($con));
        $data = mysqli_fetch_assoc($queryKurangJumlah);
        $jumlah = $data['jumlah_tersedia'] + 1;

        $query1 = mysqli_query($con, "UPDATE buku SET jumlah_tersedia = '$jumlah' WHERE id_buku = '$id_buku'") or die(mysqli_error($con));
        if($queryUpdate && $query1){
            echo'<script>alert("Berhasil Kembalikan Buku"); window.location = "../page/userPage/pengembalianBuku.php"</script>';
        }else{
            echo'<script>alert("Kembalikan buku gagal dilakukan"); window.location = "../page/adminPage/mainAdminPage.php"</script>';
        }
    }else {
        echo'<script>window.history.back()</script>';
    }
?>