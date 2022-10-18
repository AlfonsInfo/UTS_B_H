<?php

    if(isset($_POST['submit'])){
        include('../db.php');
        
        $email = $_POST['email'];
        $saran = $_POST['saran'];
        $masukan = $_POST['masukan'];
        $nilai = $_POST['nilai'];
        $status = false;

        $query_e = mysqli_query($con, "INSERT INTO feedback(email_user, kritik, masukan,status,nilai) VALUE ('$email','$saran','$masukan','$status','$nilai')") or die(mysqli_error($con));
        if($query_e){                                
             echo
                '<script>
                    alert("Saran dan Masukan Terkirim, Terimakasih !!"); window.location = "../page/userPage/feedbackPage.php"
                </script>';
        }
        else{
            echo '<script> alert("Saran dan Masukan tidak terkirim!"); </script>';
        }          
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>