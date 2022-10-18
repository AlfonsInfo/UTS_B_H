<?php

    if(isset($_POST['submit'])){
        include('../db.php');
        
        $id = $_POST['id'];
        $masukan = $_POST['masukan'];
        $kritik = $_POST['kritik'];
        $nilai = $_POST['nilai'];
        
        $query_e = mysqli_query($con, "UPDATE feedback SET masukan='$masukan', kritik='$kritik', nilai=$nilai WHERE id_feedback='$id'") or die(mysqli_error($con));
        if($query_e){                                
             echo
                '<script> alert("Saran dan Masukan Berhasil diubah, Terimakasih !!"); window.location = "../page/userPage/feedbackPage.php" </script>';
        }
        else{
            echo
                '<script> alert("Saran dan Masukan tidak terkirim!"); </script>';
        }
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>