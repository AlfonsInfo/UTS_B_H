<?php
    //Variabel untuk nama title
    $pagetitle = "Daftar Kunjungan";
    //Hubungkan halaman dengan sidebar
    include '../../component/sidebarversi1.php';
    
    echo"
    <script>
    function toggleEnable(id1,id2,id3,id4) {
        var textbox = document.getElementById(id1);        
        
        if (textbox.disabled) {
           // If disabled, do this 
           document.getElementById(id1).disabled = true;
             document.getElementById(id2).disabled = true;
             document.getElementById(id3).disabled = false;
           document.getElementById(id4).style.display = 'block';
        } else {
            // Enter code here
             document.getElementById(id1).disabled = true;
             document.getElementById(id2).disabled = true;
             document.getElementById(id3).disabled = true;
             document.getElementById(id4).style.display = 'none';
          }
    }
    </script>   
     
    ";
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);">
    <div class="body d-flex justify-content-between">
        <h4>Kunjungan</h4>        
        <button type="button" class="btn btn-outline-primary"><a href="../process/deleteDaftarKunjuganProcess.php?id='.$_SESSION['kunjungan']['id'].'" onClick="return confirm ( \'Are you sure want to delete this data?\')"></a>Delete Data</button>
        <button type="button" class="btn btn-outline-primary"
            onclick="toggleEnable('nama','email','tanggal','btnsave')">Edit
            Data</button>
        <!-- <i class="fa-solid fa-hand-holding"></i> -->
        <!-- <h4 onclick="toggleEnable('namaUser','email','nama_foto')">Edit Profil</h4> -->
    </div>
    <div class="card" style="max-width: 1500px;">
                    <!-- <h5 class="card-title inline bg-dark">Profile</h5> -->
                    
                    <!-- <h5 class="card-title-right">aaa</h5> -->
                    <div class="card-body">
                        <form action="../../process/editDaftarKunjunganProcess.php" method="POST" enctype="multipart/form-data">             
                            <?php
                                
                                $sessionEmail = $_SESSION['user']['email'];
                                $query = mysqli_query($con, "SELECT * FROM kunjungan WHERE email = '$sessionEmail'") or die(mysqli_error($con));                                

                                if(mysqli_num_rows($query) == 0){
                                    $_SESSION['kunjungan']['nama'] = "";
                                    $_SESSION['kunjungan']['email'] = "";
                                    $_SESSION['kunjungan']['tanggal'] = "";
                                }else{
                                    $user = mysqli_fetch_assoc($query);
                                    $_SESSION['kunjungan'] = $user;
                                }
                            ?>                     
                            <div class="mb-3">
                                <label for="editNama" class="form-label">Nama Pengunjung</label>
                                <input class="form-control" id="nama" name="nama" aria-describedby="namaHelp" 
                                    value="<?= $_SESSION['kunjungan']['nama']?>"disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editEmail" class="form-label">Email</label>
                                <input class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                    value="<?= $_SESSION['kunjungan']['email']?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editTanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggalHelp"
                                    value="<?= $_SESSION['kunjungan']['tanggal']?>" disabled>
                            </div>
                            <div class="d-grid gap-2">
                                <button id="btnsave" type="submit" class="btn btn-primary" name="update"
                                    style="display:none">Save</button>
                            </div>
                        </form>
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