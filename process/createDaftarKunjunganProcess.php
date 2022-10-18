<?php
    if(isset($_POST['save'])){        
        include('../db.php');
             
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $tanggal = $_POST['tanggal'];

        $sessionEmail = $_SESSION['user']['email'];
        
        $queryCek = mysqli_query($con, "SELECT * FROM kunjungan WHERE email='$sessionEmail'") or die(mysqli_error($con));

        if(mysqli_num_rows($queryCek) == 0){
            if($sessionEmail == $email){
                $query = mysqli_query($con,
                "INSERT INTO kunjungan(nama, email, tanggal) 
                VALUES ('$nama', '$email', '$tanggal')") or die(mysqli_error($con));            
                if($query){                                           
                    echo
                    '<script> 
                        alert("Berhasil Mendaftar"); window.location = "../page/crudPage/editDaftarKunjunganPage.php"
                    </script>';
                }
                else{
                    echo
                        '<script> alert("Gagal Mendaftar"); </script>';
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
                    alert("Anda sudah mendaftar"); window.location = "../page/crudPage/editDaftarKunjunganPage.php"
                </script>';
        }        
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>