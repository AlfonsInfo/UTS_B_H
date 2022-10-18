<?php
    if(isset($_POST['submit'])){
        include('../db.php');        
        $id = $_GET['id'];
    
        $query_e = mysqli_query($con, "UPDATE feedback SET status=1 WHERE id_feedback='$id'") or die(mysqli_error($con));
        if($query_e){                                
            echo
            '<script> 
                alert("Saran dan Masukan Berhasil ditandai sudah dibaca, Terimakasih !!"); 
                window.location = "../page/adminPage/viewFeedbackAdminPage.php"
            </script>';
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