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
        <h4>LIST BUKU YANG DIPINJAM </h4>
    </div>
    <hr>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">Nama Buku</th>
                <th scope="col">Sampul</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $email = $_SESSION['user']['email'];
                $query = mysqli_query($con, "SELECT * FROM peminjaman inner join buku  on peminjaman.id_buku = buku.id_buku WHERE email_user = '$email' ") or die(mysqli_error($con));
                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                }else{
                while($data = mysqli_fetch_assoc($query)){
                    // var_dump($data);die;
                echo'
                    <tr>
                    <td>'.$data['nama_buku'].'</td>
                    <td><img src=../../img/assets/'.$data['nama_sampul'].' alt =gambarsampul width=300px></td>
            <td>'.$data['status'].'</td>
            <td>'.$data['tanggal_pengembalian'].'</td>
            <td> 
            <a href="../../process/pengembalianProcess.php?id='.$data['id_buku'].'&email='.$_SESSION['user']['email'].'" 
                        onClick="return confirm ( \'Are you sure want to delete this 
                        data?\')"> <i style="color: green" class="fa fa-book fa-lg"> Kembalikan</i>
                        </a>
            </td>            
            </tr>';
            }
            }
            ?>
        </tbody>
    </table>
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>