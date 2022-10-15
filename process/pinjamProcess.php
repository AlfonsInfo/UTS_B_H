<?php
if (isset($_GET['id']) && isset($_GET['email'])) {

    include('../db.php'); 
    $id = $_GET['id'];
    $email = $_GET['email'];
    // exit();
    $tanggal_pinjam = date('Y-m-d');
    /* Menjumlahkan waktu dari awal dengan penambahan waktu yang telah ditentukan.*/
    $tanggal_kembali = date('Y-m-d', strtotime('+7 days', strtotime($tanggal_pinjam)));
    $status = "Pinjam";
    // $query = mysqli_query($con, "INSERT INTO peminjaman(email_user, id_buku, tanggal_pengembalian, status) VALUES('$email', '$id', '$tanggal_kembali', '$status')") or die(mysqli_error($con));

    // if ($query) {
        $queryKurangJumlah = mysqli_query($con, "SELECT * FROM buku WHERE id_buku = '$id'") or die(mysqli_error($con));
        $data = mysqli_fetch_assoc($queryKurangJumlah);
        $jumlah = $data['jumlah_tersedia'] - 1;
    
        if($jumlah!=-1){
            $query1 = mysqli_query($con, "UPDATE buku SET jumlah_tersedia = '$jumlah' WHERE id_buku = '$id'") or die(mysqli_error($con));
            echo
            '<script>
                    alert("Berhasil Pinjam Buku, Tekan OK maka akan di eksekusi4"); window.location = "../page/crudPage/readBukuPage.php"
                    </script>';
        }
        else{
            echo
            '<script>
                    alert("Stok Buku sudah Habis"); window.location = "../page/crudPage/readBukuPage.php"
            </script>';
        }
    // } else {
    //     echo
    //     '<script>
    //             alert("Stok Buku sudah Habis"); window.location = "../page/listBukuPage.php"
    //             </script>';
    // }
} else {
    echo
    '<script>
            window.history.back()
            </script>';
}