<?php
    //Variabel untuk nama title
    $pagetitle = "Halaman Utama Admin";
    //Hubungkan halaman dengan sidebar
    include '../../component/sidebarversi1.php';
    $id_buku = $_GET['id_buku'];
    $dataBuku = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM buku where id_buku='$id_buku'"));
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19)">
    <div class=" body d-flex justify-content-between">
        <h4>EDIT BUKU </h4>
    </div>
    <div class="card text-dark bg-white ma-5 shadow" style="max-width: 1500px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../../img/assets/<?= $dataBuku['nama_sampul']; ?>" class="img-fluid rounded-start" alt="..."
                    width="300px">
            </div>
            <div class="col-md-8">
                <div class="card-body">                    
                    <div class="card-body">
                        <form action="../../process/editBukuProcess.php?id_buku=<?=$id_buku?>" method="POST"
                            enctype="multipart/form-data">
                            <div>
                                <label for="nama_buku">Nama Buku</label>
                                <input type="text" class="form-control" id="nama_buku" name="nama_buku"
                                    placeholder="Masukkan Judul Buku" value="<?= $dataBuku['nama_buku'] ?>">
                            </div>
                            <div>
                                <label for="nama_sampul">Sampul Buku Terbaru</label>
                                <input class="form-control" type="file" id="nama_sampul" name="nama_sampul"
                                    value="<?= $dataBuku['nama_sampul']?>">
                            </div>
                            <div>
                                <label for="jumlah_buku">Jumlah Buku</label>
                                <input type="number" class="form-control" id="jumlah_buku" name="jumlah_buku" placeholder="Masukkan Jumlah Buku" value="<?= $dataBuku['jumlah_tersedia']?>">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary" name="create">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
