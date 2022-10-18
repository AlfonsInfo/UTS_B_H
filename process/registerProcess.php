<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){
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
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nama_user = $_POST['nama_user'];

        $query_e = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'") or die(mysqli_error($con));
        if(mysqli_num_rows($query_e) == 0  && in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, '../img/assets/'.$nama);
            $query = mysqli_query($con, "INSERT INTO user(email, password, nama_user, nama_foto) VALUES ('$email', '$password', '$nama_user', '$nama')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
            if($query){                                
                echo
                '<script> alert("Register Success"); window.location = "../index.php" </script>';
            }
            else{
                echo
                '<script> alert("Register Failed"); </script>';
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