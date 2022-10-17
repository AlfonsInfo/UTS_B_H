<?php
    //Variabel untuk nama title
    $pagetitle = "Peminjaman Buku";
    //Hubungkan halaman dengan sidebar
    include '../../component/sidebarversi1.php';
    
    echo'
    <script>
    function myFunction(checkbox) {
      var checkBox = document.getElementById(checkbox);
      
      var text = document.getElementById("text");
      if (checkBox.checked == true){
          text.style.display = "block";
      } else {
         text.style.display = "none";
      }
  }
  </script>
    ';

    // <?php
    $id = $_GET['id'];
$user = mysqli_query($con, "SELECT * FROM feedback WHERE id_feedback='$id'") or die(mysqli_error($con));
$data = mysqli_fetch_array($user);

function checkChecked($value, $data)
{
    if($value==$data)
    {
        echo 'checked';
    }else{
        echo '';
    }
}
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);">

    <div class="section-header body d-flex justify-content-between">
        <h4>Edit Kritik dan Masukan</h4>
        <a class="border-0" href="../userPage/detailFeedbackPage.php?id=<?php echo $id?>">
            <i style=" color: #97D2EC;" class="fa fa-arrow-left fa-2x"></i>
        </a>
    </div>
    <hr>
    <form action="../../process/editFeedbackProcess.php" method="post">
        <div class="form-group">
            <label for="btnradio1">Secara keseluruhan , Gimana Pelayanan Aplikasi ini?</label>
            <br>
            <br>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group" name="nilai">
                <input type="radio" class="btn-check" name="nilai" id="jelek" autocomplete="off" value="1"
                    onclick="myFunction('jelek')" <?php checkChecked(1,$data['Nilai'])?>>
                <label class="btn btn-outline-primary" for="jelek">Jelek !!</label>

                <input type="radio" class="btn-check" name="nilai" id="ditingkatkan" autocomplete="off" value="2"
                    onclick="myFunction('ditingkatkan')" <?php checkChecked(2,$data['Nilai'])?>>
                <label class="btn btn-outline-primary" for="ditingkatkan">Perlu Ditingkatkan !!</label>

                <input type="radio" class="btn-check" name="nilai" id="cukup" autocomplete="off" value="3"
                    onclick="myFunction('cukup')" <?php checkChecked(3,$data['Nilai'])?>>
                <label class="btn btn-outline-primary" for="cukup">Cukup</label>

                <input type="radio" class="btn-check" name="nilai" id="bagus" autocomplete="off" value="4"
                    onclick="myFunction('bagus')" <?php checkChecked(4,$data['Nilai'])?>>
                <label class="btn btn-outline-primary" for="bagus">Bagus</label>

                <input type="radio" class="btn-check" name="nilai" id="sangatbagus" autocomplete="off" value="5"
                    onclick="myFunction('sangatbagus')" <?php checkChecked(5,$data['Nilai'])?>>
                <label class="btn btn-outline-primary" for="sangatbagus">Sangat Bagus</label>
            </div>
            <p id="text" style="display:none">Terimakasih !! Berdasarkan Penilaian Anda, Mohon berikan kami masukan dan
                saran </p>
            <div class="form-group">
                <label for="Kritik">Kritik</label><br>
                <textarea name="kritik" id="Kritik" cols="60" rows="3" required><?php echo $data['kritik']?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Masukan</label><br>
                <textarea name="masukan" id="masukan" cols="60" rows="10"
                    required><?php echo $data['masukan']?></textarea>
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