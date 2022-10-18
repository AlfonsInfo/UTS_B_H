<?php
    if(isset($_POST['create'])){     
        include('../db.php');
        $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
        $nama = $_FILES['nama_sampul']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['nama_sampul']['size'];
        $file_tmp = $_FILES['nama_sampul']['tmp_name'];
        
        $nama_buku = $_POST['nama_buku'];
        $jumlah_buku = $_POST['jumlah_buku'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, '../img/assets/'.$nama);
            $query = mysqli_query($con,
                "INSERT INTO buku(nama_buku, nama_sampul, jumlah_tersedia) 
                VALUES ('$nama_buku', '$nama', '$jumlah_buku')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                if($query){                                
                    echo
                    '<script> alert("Berhasil Menambahkan Buku"); 
                                    window.location = "../page/adminPage/mainAdminPage.php"
                                    </script>';
                }
                else{
                    echo
                        '<script> alert("Gagal Menambahkan Buku"); </script>';
                }
        }else{                        
            echo '<script> alert("Extensi Gambar harus JPG,JPEG, PNG!"); window.history.back() </script>';                            
        }
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>