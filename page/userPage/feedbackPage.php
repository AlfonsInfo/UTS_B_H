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
        <h4>LIST KOMENT</h4><br>
        <a class="border-0" href="../userPage/addFeedbackPage.php">
            <i style="color: red" class="fa fa-plus fa-2x"></i>
        </a>
    </div>
    <hr>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Masukan</th>
                <th scope="col">Saran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $query = mysqli_query($con, "SELECT * FROM feedback") or die(mysqli_error($con));
                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                }else{
                    $no = 1;
                while($data = mysqli_fetch_assoc($query)){
                echo'
                    <tr>
                    <th scope="row">'.$no.'</th>
                    <td>'.$data['masukan'].'</td>
                    <td>'.$data['saran'].'</td>
                    <td>
                    <a href="../../page/userPage/editFeedbackPage.php?id=' . $data['id_feedback'] . '" onClick="return confirm ( \'Apakah anda yakin ingin mengedit masukan dan saran?\')"> 
                                        <i style="color: green" class="fa fa-edit fa-2x"></i>
                    <a href="../../process/deleteFeedbackProcess.php?id=' . $data['id_feedback'] . '" onClick="return confirm ( \'Are you sure want to delete this data?\')"> 
                                        <i style="color: red" class="fa fa-trash fa-2x"></i>
                                    </a>

                    </td>
                    </tr>';
                    $no++;
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