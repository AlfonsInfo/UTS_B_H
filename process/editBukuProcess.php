<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['create'])){
        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
        $nama = $_FILES['nama_sampul']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['nama_sampul']['size'];
        $file_tmp = $_FILES['nama_sampul']['tmp_name'];
        
        $nama_buku = $_POST['nama_buku'];
        $jumlah_buku = $_POST['jumlah_buku'];
        $id_buku = $_GET['id_buku'];
        
        if(empty($nama)){
            $query = mysqli_query($con,
            "UPDATE buku SET nama_buku = '$nama_buku', jumlah_tersedia = '$jumlah_buku' WHERE id_buku = $id_buku ") 
             or die(mysqli_error($con));
        }else{
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                move_uploaded_file($file_tmp, '../img/assets/'.$nama);
                $query = mysqli_query($con,
                "UPDATE buku SET nama_buku = '$nama_buku' ,nama_sampul = '$nama', jumlah_tersedia = '$jumlah_buku' WHERE id_buku = $id_buku ") 
                     or die(mysqli_error($con));
            }else{
                echo '<script> alert("Extensi Gambar harus JPG,JPEG, PNG!"); window.history.back() </script>';
            }
        }          
                
        if($query){                                
            echo
            '<script> alert("Berhasil UPDATE Buku"); window.location = "../page/adminPage/mainAdminPage.php"</script>';
        }else{
            echo
            '<script> alert("Gagal Menambahkan Buku"); </script>';
        }
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>