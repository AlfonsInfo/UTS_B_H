<?php
    // untuk ngecek tombol yang namenya 'update' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['update'])){
        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $password = $_POST['password'];

        $query = mysqli_query($con, "UPDATE user SET password='$password' where email = 'admin'" ) or die(mysqli_error($con)); 
        if($query){                                                          
            echo
                '<script>
                alert("Ubah Password Success"); 
                window.location = "../page/adminPage/ubahPasswordPage.php"
                </script>';
        }
        else{
            echo
                '<script>
                alert("Ubah Password Failed");
                window.location = "../page/adminPage/ubahPasswordPage.php"
                </script>';
        }
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>