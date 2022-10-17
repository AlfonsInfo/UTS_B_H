<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['save'])){
        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input        
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $tanggal = $_POST['tanggal'];

        $sessionEmail = $_SESSION['user']['email'];
        
        $queryCek = mysqli_query($con, "SELECT * FROM kunjungan WHERE email='$sessionEmail'") or die(mysqli_error($con));

        if(mysqli_num_rows($queryCek) == 0){
            if($sessionEmail == $email){
                $query = mysqli_query($con,
                "INSERT INTO kunjungan(nama, email, tanggal) 
                VALUES ('$nama', '$email', '$tanggal')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”            
                if($query){                                           
                    echo
                    '<script> alert("Berhasil Mendaftar"); 
                                    window.location = "../page/crudPage/editDaftarKunjunganPage.php"
                                    </script>';
                            }
                            else{
                                echo
                                    '<script>
                                    alert("Gagal Mendaftar");                                    
                                    </script>';
                            }
            }else{
                echo
                '<script>
                alert("Email tidak terdaftar");                  
                window.history.back()
                </script>';
            }        
        }else{
            echo
                    '<script> alert("Anda sudah mendaftar"); 
                                    window.location = "../page/crudPage/editDaftarKunjunganPage.php"
                                    </script>';
        }        
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>