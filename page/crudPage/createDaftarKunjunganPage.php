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
    </div>
            <div class="card" style="max-width: 1500px;">
                <div class="card-body">
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
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>