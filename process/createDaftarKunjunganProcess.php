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

        if($sessionEmail == $email){
            $query = mysqli_query($con,
            "INSERT INTO kunjungan(nama, email, tanggal) 
            VALUES ('$nama', '$email', '$tanggal')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
            if($query){       
                $_SESSION = $query;                         
                echo
                '<script> alert("Berhasil Mendaftar"); 
                                window.location = "../page/adminPage/mainAdminPage.php"
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
            '<script>
            window.history.back()
            </script>';
    }
?>