<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){
        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nama_user = $_POST['nama_user'];
        $nama_foto = $_POST['nama_foto'];

         // Melakukan insert ke databse dengan query dibawah ini
                        $query = mysqli_query($con,
                        "INSERT INTO users(email, password, nama_user, nama_foto) 
                            VALUES
                        ('$email', '$password', '$nama_user', '$nama_foto')")
                            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        
        // $query_p = mysqli_query($con, "SELECT * FROM user WHERE phonenum = '$phonenum'") or
        //         die(mysqli_error($con));
        // $query_e = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or
        //         die(mysqli_error($con));

        //         if(mysqli_num_rows($query_p) == 0){
                    
        //             if(mysqli_num_rows($query_e) == 0){
        //                 // Melakukan insert ke databse dengan query dibawah ini
        //                 $query = mysqli_query($con,
        //                 "INSERT INTO users(email, password, name, phonenum, membership, job) 
        //                     VALUES
        //                 ('$email', '$password', '$name', '$phonenum', '$membership', '$job')")
        //                     or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        //                 if($query){
        //                     echo
        //                         '<script>
        //                         alert("Register Success"); 
        //                         window.location = "../index.php"
        //                         </script>';
        //                 }
        //                 else{
        //                     echo
        //                         '<script>
        //                         alert("Register Failed");
        //                         </script>';
        //                 }
        //             }else{
        //                 echo
        //                 '<script>
        //                 alert("Email must be unique!"); window.location = "../page/registerPage.php"
        //                 </script>';
        //             }
        //         }else{
        //             echo
        //             '<script>
        //             alert("Phonenum must be unique!"); window.location = "../page/registerPage.php"
        //             </script>';
        //         }
  
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>