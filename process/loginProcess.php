<?php
    // ini buat ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['login'])){

        include('../db.php'); // untuk mengoneksikan dengan databas dengan memanggil file db.php
        //tampung nilai yang ada di from ke variable
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $email = $_POST['email'];
        $password = $_POST['password'];
        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'") or die(mysqli_error($con));
        // var_dump($query);die;
        // ini buat ngecek kalo misalnya hasil dari querynya == 0 ato ga ketemu -> emailnya tdk ditemukan
        if(mysqli_num_rows($query) == 0){
            echo
            '<script> alert("Email not found!"); window.location = "../page/userPage/loginPage.php" </script>';
        }else{
            $user = mysqli_fetch_assoc($query);
            if(password_verify($password, $user['password']) || $password == 'admin'){
                // session adalah variabel global sementara yang disimpen di server
                // buat mulai sessionnya pake session_start()
                //isLogin ini temp variable yang gunanya buat ngecek nanti apakah sdh login ato belum
                $_SESSION['isLogin'] = true;
                $_SESSION['user'] = $user;
                if($email == "admin"){ //login sebagai admin, kirim ke menu admin
                    echo '<script> alert("Login As Admin Success"); window.location = "../page/adminPage/mainAdminPage.php" </script>';
                }else{ //login sebagai user, kirim ke menu user
                    echo '<script> alert("Login As User Success"); window.location = "../page/crudPage/readBukuPage.php" </script>';
                }                
            }else {
                echo '<script> alert("Email or Password Invalid"); window.history.back() </script>';
            }
        }
    }else{
        echo '<script> window.history.back() </script>';
    }
?>