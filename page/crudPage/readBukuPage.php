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
        <h4>LIST BUKU</h4>
    </div>
    <hr>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Sampul</th>
                <th scope="col">Tersedia</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $query = mysqli_query($con, "SELECT * FROM buku") or die(mysqli_error($con));
                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                }else{
                    $no = 1;
                    while($data = mysqli_fetch_assoc($query)){
                    echo'
                        <tr>
                        <th scope="row">'.$no.'</th>
                        <td>'.$data['nama_buku'].'</td>
                        <td><img src=../../img/assets/'.$data['nama_sampul'].' alt =gambarsampul width=300px></td>
                        <td>'.$data['jumlah_tersedia'].'</td>
                        <td>
                        <a href="../../process/pinjamProcess.php?id='.$data['id_buku'].'&email='.$_SESSION['user']['email'].'" 
                            onClick="return confirm ( \'Are you sure want to delete this 
                            data?\')"';if($data['jumlah_tersedia']==0){echo'class="disable"';};echo'> <i style="color: green" class="fa fa-book fa-lg"> Pinjam</i>
                            </a>';
                            if($data['jumlah_tersedia']==0){echo'
                        <p class="text-danger";>Tidak Bisa Pinjam Buku, Jumlah Tersedia 0 </p>';}
                        echo'</td>
                        </td>
                        </tr>';
                        $no++;
                    }
                }
?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>