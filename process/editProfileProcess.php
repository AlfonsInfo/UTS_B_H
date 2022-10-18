<?php
    // untuk ngecek tombol yang namenya 'update' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['update'])){
        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
        $nama = $_FILES['nama_foto']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['nama_foto']['size'];
        $file_tmp = $_FILES['nama_foto']['tmp_name'];

        $email = $_POST['email'];
        // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nama_user = $_POST['nama_user'];
        $sessionEmail = $_SESSION['user']['email'];


        $query_e = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'") or
                die(mysqli_error($con));
        $query_e2 = mysqli_query($con, "SELECT * FROM user WHERE email = '$sessionEmail'") or
                die(mysqli_error($con)); 
        $emailFormEdit = mysqli_fetch_assoc($query_e) ; // kalau email yang dimasukin belum ada didatabase return null
        $emailSession = mysqli_fetch_assoc($query_e2) ;  // Email yang sesuai dengan session
        //Kondisi yang mungkin :  EmailFormEdit sama dengan yang ada didatabase (sama dengan emailsession atau dengan email yang lain)
        $emailEditNumRow = mysqli_num_rows($query_e);
        $emailSessionNumRow = mysqli_num_rows($query_e2);
        // var_dump($emailFormEdit);die;
        function checkEmail()
        {
            global $emailFormEdit;
            global $emailSession;
            global $emailEditNumRow;
            global $emailSessionNumRow;
            // Cek apakah ada email yang sama atau tidak, kalau null berarti tidak ada yang sama (benar-benar baru tidak sama dengan yg disession)
            if($emailFormEdit == NULL){
                    return true;
                
            }
            // jika emailformedit tidak null berarti ada email yang sama didatabase, cek apakah email yang sama itu merupakan email awalnya, jika iya berarti bisa diedit
            if($emailFormEdit['email']==$emailSession['email'])
            {
                // 1 dan 1
                return true;
            }
            return false;
        }
                        // Melakukan insert ke databse dengan query dibawah ini
                        if(checkEmail()){
                            if(empty($nama)){
                                $query = mysqli_query($con,
                                "UPDATE user SET nama_user = '$nama_user' , email = '$email' where email = '$sessionEmail'" ) or die(mysqli_error($con));
                            }else{
                                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                                    move_uploaded_file($file_tmp, '../img/assets/'.$nama);
                                    $query = mysqli_query($con,
                                    "UPDATE user SET nama_user = '$nama_user' , nama_foto = '$nama', email = '$email' where email = '$sessionEmail'" ) or die(mysqli_error($con));
                                }else{
                                    echo '<script> alert("Extensi Gambar harus JPG,JPEG, PNG!"); window.history.back() </script>';
                                }
                            }                                                         

                            //update email di peminjaman
                            $query2 = mysqli_query($con,
                            "UPDATE peminjaman SET email_user = '$email' where email_user = '$sessionEmail'" ) or die(mysqli_error($con)); 

                            $querycari = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'") or die(mysqli_error($con));
                                $user = mysqli_fetch_assoc($querycari);                                
                            if($query && $query2){                                       
                                $_SESSION['user'] = $user;                                       
                                echo
                                    '<script>
                                    alert("Update Profile Success"); 
                                    window.location = "../page/userPage/editUserPage.php"
                                    </script>';
                            }
                            else{
                                echo
                                    '<script>
                                    alert("Update Failed");
                                    </script>';
                            }
                        }else{
                            if(checkEmail()==false){
                                echo '<script> alert("Email must be unique!"); window.history.back() </script>';
                            }
                            // if(in_array($ekstensi, $ekstensi_diperbolehkan) !== true){
                            //     echo '<script> alert("Extensi Gambar harus JPG,JPEG, PNG!"); window.history.back() </script>';
                            // }
                        }
                        
  
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>