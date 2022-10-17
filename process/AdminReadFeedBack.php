<?php
    // var_dump($_POST);die;
    // echo '<br>';
    // var_dump($_GET);die;
    if(isset($_POST['submit'])){
        include('../db.php');

        // $status = 1;
        $id = $_GET['id'];
        // var_dump($id);die;
        // $id = $_POST['id'];
        // $masukan = $_POST['masukan'];
        // $kritik = $_POST['kritik'];
        // $nilai = $_POST['nilai'];
        // $status = $_POST['status'];
        // var_dump($_POST);die;
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