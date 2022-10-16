<?php
    //Variabel untuk nama title
    $pagetitle = "Peminjaman Buku";
    //Hubungkan halaman dengan sidebar
    include '../../component/sidebarversi1.php';
    
    // <?php
    $id = $_GET['id'];
$user = mysqli_query($con, "SELECT * FROM feedback WHERE id_feedback='$id'") or die(mysqli_error($con));
$data = mysqli_fetch_array($user);
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);">

<div class="section-header body d-flex justify-content-between">
                        <h4>Edit Masukan dan Saran</h4>
                        <a class="border-0" href="../userPage/detailFeedbackPage.php?id=<?php echo $id?>">
                            <i style=" color: #97D2EC;" class="fa fa-arrow-left fa-2x"></i>
                        </a>
                    </div>
    <hr>
    <form action="../../process/editFeedbackProcess.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id?>">
  <div class="form-group">
    <label for="saran">Saran</label><br>
    <textarea name="saran" id="saran" cols="60" rows="3" required ><?php echo $data['masukan']?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Masukan</label><br>
    <textarea name="masukan" id="masukan" cols="60" rows="10" required><?php echo $data['saran']?></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-plus"></i> Submit</button>
</form>
    
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>