<?php
    if(isset($_GET['id'])){
        include ('../db.php');
        $id = $_GET['id'];
        $queryDelete = mysqli_query($con, "DELETE FROM feedback WHERE id_feedback='$id'") or die(mysqli_error($con));
        if($queryDelete){
            echo'<script>alert("Delete Success"); window.location = "../page/userPage/feedbackPage.php"</script>';
        }else{
            echo'<script>alert("Delete Failed"); window.location = "../page/userPage/feedbackPage.php"</script>';
        }
    }else {
        echo'<script>window.history.back()</script>';
    }
?>