<?php
    //Variabel untuk nama title
    $pagetitle = "Reservasi Kunjungan";
    //Hubungkan halaman dengan sidebar
    include '../../component/sidebarversi1.php';
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
    solid #D40013; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
    0.19);">
    <div class="body d-flex justify-content-between">
        <h4>Daftar Kunjungan</h4>
        <button type="button" class="btn btn-outline-primary"
            onclick="location.href='../../page/crudPage/editDaftarKunjunganPage.php'">Lihat Kunjungan</button>
    </div>
    <div class="card" style="max-width: 1500px;">
        <div class="card-body">
            <?php
                $sessionEmail = $_SESSION['user']['email'];
                $query = mysqli_query($con, "SELECT * FROM kunjungan WHERE email = '$sessionEmail'") or die(mysqli_error($con));                                

                if(mysqli_num_rows($query) != 0){
                    $_SESSION['kunjungan']['nama'] = "";
                    $_SESSION['kunjungan']['email'] = "";
                    $_SESSION['kunjungan']['tanggal'] = "";
                }
            ?>
            <form action="../../process/createDaftarKunjunganProcess.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama Pengunjung</label>
                    <input class="form-control" id="nama" name="nama" aria-describedby="namaHelp">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input class="form-control" id="email" name="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="inputTanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggalHelp">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>