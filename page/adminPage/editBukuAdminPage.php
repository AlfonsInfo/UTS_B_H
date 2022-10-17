<?php
    //Variabel untuk nama title
    $pagetitle = "Halaman Utama Admin";
    //Hubungkan halaman dengan sidebar
    include '../../component/sidebarversi1.php';
    $id_buku = $_GET['id_buku'];
    $dataBuku = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM buku where id_buku='$id_buku'"));
    // var_dump($dataBuku);die;
    

?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19)">
    <div class=" body d-flex justify-content-between">
        <h4>DESKRIPSI BUKU </h4>

        <!-- <i class="fa-solid fa-hand-holding"></i> -->
        <!-- <h4 onclick="toggleEnable('namaUser','email','nama_foto')">Edit Profil</h4> -->
    </div>
    <div class="card text-dark bg-white ma-5 shadow" style="max-width: 1500px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../../img/assets/<?= $dataBuku['nama_sampul']; ?>" class="img-fluid rounded-start" alt="..."
                    width="300px">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <!-- <h5 class="card-title inline bg-dark">Profile</h5> -->

                    <!-- <h5 class="card-title-right">aaa</h5> -->
                    <div class="card-body">
                        <form action="../../process/edit" method="" enctype="">

                            <div>
                                <label for="nama_buku">Nama Buku</label>
                                <input type="text" class="form-control" id="nama_buku" name="nama_buku"
                                    value="<?=$dataBuku['nama_buku'];  ?>" disabled style="margin-bottom: 20px;">
                            </div>
                            <div>
                                <label for="jumlah_buku">Jumlah Buku</label>
                                <input type="number" class="form-control" id="jumlah_buku" name="jumlah_buku"
                                    value="<?=$dataBuku['jumlah_tersedia']; ?>" disabled style="margin-bottom: 20px;">
                            </div>

                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>