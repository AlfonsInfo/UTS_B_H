<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['update'])){
        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input                
        // $email = $_POST['email'];
        $tanggal = $_POST['tanggal'];

        $sessionEmail = $_SESSION['user']['email'];                
        
            $query = mysqli_query($con,
            "UPDATE kunjungan SET tanggal='$tanggal' WHERE email='$sessionEmail'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
            if($query){                                
                echo
                '<script> alert("Berhasil Edit Tanggal"); 
                                window.location = "../page/crudPage/editDaftarKunjunganPage.php"
                                </script>';
                        }
                        else{
                            echo
                                '<script>
                                alert("Gagal Edit Tanggal");                                    
                                </script>';
                        }              
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>