<?php

    if(isset($_POST['submit'])){
        include('../db.php');
        
        $email = $_POST['email'];
        $saran = $_POST['saran'];
        $masukan = $_POST['masukan'];
        $query_e = mysqli_query($con, "INSERT INTO feedback(email_user, saran, masukan) VALUE ('$email','$saran','$masukan')") or die(mysqli_error($con));
        if($query_e){                                
             echo
                                    '<script>
                                    alert("Saran dan Masukan Terkirim!"); 
                                    window.location = "../page/crudPage/createBukuPage.php"
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