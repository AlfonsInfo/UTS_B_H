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
        <h4>DESKRIPSI BUKU </h4>
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
                        <form action="" method="" enctype="">
                            <div>
                                <label class="form-label">ID Buku</label>

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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" body d-flex justify-content-between" style="margin-top:20px;">
        <h4>DAFTAR PEMINJAM </h4>        
    </div>
    <div class="container  mt-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <hr>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $dataPeminjaman = mysqli_query($con, "SELECT * FROM peminjaman inner join buku  on peminjaman.id_buku = buku.id_buku WHERE peminjaman.status='dipinjam' AND  peminjaman.id_buku= '$id_buku'  ") or die(mysqli_error($con));
                
                    if (mysqli_num_rows($dataPeminjaman) == 0) {
                        echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                    }else{
                        while($data = mysqli_fetch_assoc($dataPeminjaman)){
                            // var_dump($data);die;
                            $emailPeminjam = $data['email_user'];
                            $dataPeminjam = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM user where email = '$emailPeminjam'"));
                            $kembalian = $data['tanggal_pengembalian'];
                            // var_dump($dataPeminjam);die;
                            /* Menjumlahkan waktu dari awal dengan penambahan waktu yang telah ditentukan.*/
                            $tanggal_pinjam = date('Y-m-d', strtotime('-7 days', strtotime($kembalian)));
                            echo'
                            <tr>
                            <td>'.$data['email_user'].'<i data-bs-toggle="modal" data-bs-target="#modal'.$data['id_peminjaman'].'"" style="color: blue; margin-left:10px" class="fa fa-eye "></i></td>
                            <td>'.$tanggal_pinjam.'</td>
                            <td>'.$data['tanggal_pengembalian'].'</td>';
                            echo'</tr>';                            
                ?>
                            <!-- Modal -->
                            <div class="modal fade" id="modal<?=$data['id_peminjaman']?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Profile Peminjam</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <img src="../../img/assets/<?=$dataPeminjam['nama_foto']?>" class="card-img-top"
                                                    alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?=$dataPeminjam['nama_user']?></h5>
                                                    <p class="card-text"><?= $dataPeminjam['email']?></p>
                                                    <p class="card-text">buku mulai dipinjam <?=$dataPeminjam['nama_user']?> pada
                                                        tanggal <?= $tanggal_pinjam?> ,pengembalian harus dilakukan paling akhiri
                                                        pada tanggal <?= $kembalian?> </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK!!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>