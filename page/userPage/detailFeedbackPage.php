<?php
    //Variabel untuk nama title
    $pagetitle = "Peminjaman Buku";
    //Hubungkan halaman dengan sidebar
    include '../../component/sidebarversi1.php';
    
    // <?php
    $id = $_GET['id'];
$user = mysqli_query($con, "SELECT * FROM feedback WHERE id_feedback='$id'") or die(mysqli_error($con));
$data = mysqli_fetch_array($user);
// var_dump($data);
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);">

    <div class="section-header body d-flex justify-content-between">
        <h4>Detail Kritik dan Masukan</h4>
    </div>
    <hr>
    <form action="../userPage/editFeedbackPage.php?id=<?php echo $id?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <div class="form-group">
            <label for="kritik">Kategori</label><br>
            <input type="text" name="kritik" id="saran" cols="60" rows="3" disabled="yes" value="<?php switch($data['Nilai'])
                    {
                        case 1:
                            echo "Jelek!!";
                            break;
                        case 2:
                            echo "perlu ditingkatkan !!";
                            break;
                        case 3:
                            echo "cukup" ;
                            break;
                        case 4:
                            echo "bagus";
                            break;
                        case 5:
                            echo "sangat bagus";
                            break;
                        default:
                            echo "";
                    } ?>">
        </div>
        <div class="form-group">
            <label for="kritik">Kritik</label><br>
            <textarea name="kritik" id="saran" cols="60" rows="3"
                disabled="yes"><?php echo $data['kritik'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Masukan</label><br>
            <textarea name="masukan" id="masukan" cols="60" rows="10" disabled><?php echo $data['masukan']?></textarea>
        </div>
        <?php if($data['email_user'] == $_SESSION['user']['email']){?>
        <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-edit"></i> Edit</button>
        <?php }?>
    </form>

</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>