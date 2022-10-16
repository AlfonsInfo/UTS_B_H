<?php
    //Variabel untuk nama title
    $pagetitle = "Peminjaman Buku";
    //Hubungkan halaman dengan sidebar
    include '../../component/sidebarversi1.php';
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);">
    <div class="body d-flex justify-content-between">
        <h4>Saran dan Masukan</h4>
    </div>
    <hr>
    <form action="../../process/feedbackProcess.php" method="post">
        
    <input type="hidden" name="email" value="<?php echo $_SESSION['user']['email']?>">
  <div class="form-group">
    <label for="saran">Saran</label><br>
    <textarea name="saran" id="saran" cols="60" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Masukan</label><br>
    <textarea name="masukan" id="masukan" cols="60" rows="10"required></textarea>
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