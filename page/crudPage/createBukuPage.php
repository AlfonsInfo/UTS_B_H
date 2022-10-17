<!-- Upload Gambar input type = file
enctype 
variabel super global $_FILES ->Untuk menanmpung data file
move_uploaded_file -->
<?php
    //Variabel untuk nama title
    $pagetitle = "Tambah Data Buku";
    //Hubungkan halaman dengan sidebar
    include '../../component/sidebarversi1.php';

?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid #D40013; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
    <h4>ADD NEW DATA BUKU</h4>
    <hr>
    <form action="../../process/createBukuProcess.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="nama_buku">Nama Buku</label>
            <input type="text" class="form-control" id="nama_buku" name="nama_buku" placeholder="Masukkan Judul Buku">
        </div>
        <div>
            <label for="nama_sampul">SAMPUL Buku</label>
            <input class="form-control" type="file" id="nama_sampul" name="nama_sampul">
        </div>
        <div>
            <label for="jumlah_buku">Jumlah Buku</label>
            <input type="number" class="form-control" id="jumlah_buku" name="jumlah_buku"
                placeholder="Masukkan Jumlah Buku">
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="create">Simpan</button>
        </div>
    </form>
</div>
</div>

</aside>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>