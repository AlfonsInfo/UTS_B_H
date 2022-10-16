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
                        <form action="" method="" enctype="">
                            <div>
                                <label class="form-label">Nama User</label>

                                <input type="text" class="form-control" id="id" name="id_buku"
                                    value="<?=$dataBuku['id_buku'];  ?>" style="margin-bottom: 20px;" disabled>
                            </div>
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
                            <div>
                                <textarea name="" id="" cols="30" rows="10" class="form-control"
                                    disabled>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ipsum sit perferendis aut molestias cupiditate asperiores veniam unde atque nesciunt dicta est voluptatum quibusdam ab facilis quam repudiandae pariatur delectus, cum blanditiis? Molestias neque quam tempora. Ipsam, expedita distinctio? Delectus provident suscipit aliquid alias maxime et ipsa autem. Deleniti natus inventore vitae maxime, voluptate magni est praesentium dolore sunt aliquid sapiente magnam sint impedit ea dolor deserunt amet. Nostrum deserunt, cupiditate error eius vero ducimus ea veniam cum dolor quae nihil, quidem blanditiis ratione dicta ipsa tenetur maiores. Laboriosam ex deserunt debitis tempora voluptatum placeat quisquam fugiat amet provident nulla!</textarea>
                            </div>

                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" body d-flex justify-content-between" style="margin-top:20px;">
        <h4>DAFTAR PEMINJAM </h4>

        <!-- <i class="fa-solid fa-hand-holding"></i> -->
        <!-- <h4 onclick="toggleEnable('namaUser','email','nama_foto')">Edit Profil</h4> -->
    </div>

    <!-- <h5 class="card-title inline bg-dark">Profile</h5> -->

    <div class="container  mt-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);">

        <hr>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // $dataPeminjaman = mysqli_query($con, "SELECT * FROM peminjaman inner join buku  on peminjaman.id_buku = buku.id_buku WHERE status = 'dipinjam' AND id_buku='$id_buku' ") or die(mysqli_error($con));
                $dataPeminjaman = mysqli_query($con, "SELECT * FROM peminjaman inner join buku  on peminjaman.id_buku = buku.id_buku WHERE peminjaman.status='dipinjam' AND  peminjaman.id_buku= '$id_buku'  ") or die(mysqli_error($con));
                
                // var_dump(mysqli_fetch_assoc($query));die;
                if (mysqli_num_rows($dataPeminjaman) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                }else{
                while($data = mysqli_fetch_assoc($dataPeminjaman)){
                    // var_dump($data);die;
                    $kembalian = $data['tanggal_pengembalian'];

                    /* Menjumlahkan waktu dari awal dengan penambahan waktu yang telah ditentukan.*/
                    $tanggal_pinjam = date('Y-m-d', strtotime('-7 days', strtotime($kembalian)));
                echo'
                    <tr>
                        <td>'.$data['email_user'].'</td>
                        <td>'.$tanggal_pinjam.'</td>
                        <td>'.$data['tanggal_pengembalian'].'</td>';
                    echo'</tr>';                                                                 
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    </form>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>`

</html>