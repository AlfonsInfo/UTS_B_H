<?php

    if(isset($_POST['submit'])){
        include('../db.php');
        
        $id = $_POST['id'];
        $masukan = $_POST['masukan'];
        $saran = $_POST['saran'];
        $query_e = mysqli_query($con, "UPDATE feedback SET masukan='$masukan', saran='$saran' WHERE id_feedback='$id'") or die(mysqli_error($con));
        if($query_e){                                
             echo
                                    '<script>
                                    alert("Saran dan Masukan Berubah!"); 
                                    window.location = "../page/userPage/feedbackPage.php"
                                    </script>';
                            }
                            else{
                                echo
                                    '<script>
                                    alert("Saran dan Masukan tidak terkirim!");
                                    </script>';
                            }
                        
                    // }else{
                    //     echo
                    //     '<script>
                    //     alert("Email must be unique!"); window.location = "../page/registerPage.php"
                    //     </script>';
                    // }
                // }else{
                //     echo
                //     '<script>
                //     alert("Phonenum must be unique!"); window.location = "../page/registerPage.php"
                //     </script>';
                // }
  
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>