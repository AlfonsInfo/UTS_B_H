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

                // if(mysqli_num_rows($query_p) == 0){
                    
                    // if(mysqli_num_rows($query_e) == 0){
                        // Melakukan insert ke databse dengan query dibawah ini
                        if(mysqli_num_rows($query_e) == 0  && in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                            move_uploaded_file($file_tmp, '../img/assets/'.$nama);
                            $query = mysqli_query($con,
                            "UPDATE user SET nama_user = '$nama_user' , nama_foto = '$nama', email = '$email' where email = '$sessionEmail'" )
                            or die(mysqli_error($con)); 
                                // var_dump($query);
                                $updatedUser = mysqli_fetch_assoc($query);
                                var_dump($updatedUser);
                            if($query){          
                                // $_SESSION['user'] = $updatedUser; 
                                // var_dump($_SESSION);die;        
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
                            if(mysqli_num_rows($query_e) != 0){
                                echo '<script> alert("Email must be unique!"); window.history.back() </script>';
                            }
                            if(in_array($ekstensi, $ekstensi_diperbolehkan) !== true){
                                echo '<script> alert("Extensi Gambar harus JPG,JPEG, PNG!"); window.history.back() </script>';
                            }
                        }
                        
  
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>