<?php
    if(isset($_GET['id'])){
        include ('../db.php');
        $id = $_GET['id'];

        $queryCari = mysqli_query($con, "SELECT * FROM peminjaman where id_buku='$id' && status='dipinjam'") or die(mysqli_error($con));

        if(mysqli_num_rows($queryCari) == 0){
            $queryDelete = mysqli_query($con, "DELETE FROM buku WHERE id_buku='$id'") or die(mysqli_error($con));
            if($queryDelete){
                echo'<script>alert("Delete Success"); window.location = "../page/adminPage/mainAdminPage.php"</script>';
            }else{
                echo'<script>alert("Delete Failed"); window.location = "../page/adminPage/mainAdminPage.php"</script>';
            }
        }else{
            echo'<script>alert("Hapus buku tidak bisa karena masih ada yang dipinjam!"); window.location = "../page/adminPage/mainAdminPage.php"</script>';
        }    
    }else {
        echo'<script>window.history.back()</script>';
    }
?>