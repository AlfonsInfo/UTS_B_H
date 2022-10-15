<!-- Upload Gambar input type = file
enctype 
variabel super global $_FILES ->Untuk menanmpung data file
move_uploaded_file -->
<?php
    //Variabel untuk nama title
    $pagetitle = "Tambah Data Buku";
include '../../component/sidebarversi1.php';

?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid #D40013; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
    <h4>ADD NEW DATA BUKU</h4>
    <hr>
    <form action="../../process/createBukuProcess.php" method="post" enctype="multipart/form-data">
        <!-- <div>
            <label for="">Nama Series</label>
            <input type="" class="form-control" name="name" aria-describedby="" placeholder="Nama Series">
            <hr>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="formlabel">Genre</label>
            <select class="form-select" aria-label="Default select example" name="Genre" id="membership"
                selected=<?php echo $_SESSION['user']['job']?>>
                <option value="Reguler">Action</option>
                <option value="Platinum">Romance</option>
                 <option value="Gold">Gold</option> 
            </select>
        </div>
        <div class="form-group">
            <label for="Release" name="release">Year Realese</label>
            <input type="" class="form-control" name="realease" placeholder="2020">
            <hr>
        </div>
        <div class="form-group">
            <label for="">Episode</label>
            <input type="" class="form-control" id="" name="episode" placeholder="Udah berapa eps sekarang?">
            <hr>
        </div>
        <div class="form-group">
            <label for="">Season</label>
            <input type="" class="form-control" id="" name="season" placeholder="Season Berapa ?">
            <hr>
        </div>
        <div class="form-group">
            <label for="">Sinopsis</label>
            <input type="" class="form-control" id="" name="sinopsis" placeholder="spoiler ceritanya :)">
            <hr>
        </div> -->
        <div>
            <label for="" name="nama_buku">Nama Buku</label>
            <input type="text" name="nama_buku" placeholder="">
        </div>
        <div>
            <label for="">SAMPUL Buku</label>
            <input type="file" name="nama_sampul" placeholder="">
        </div>

        <button type="save" class="btn btn-primary" style="background-color: darkred;width:100%;"
            name="addSeries">Submit</button>
    </form>
</div>
</div>

</aside>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>