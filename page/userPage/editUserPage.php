<?php
    //Variabel untuk nama title
    $pagetitle = "Profile User";
    //Hubungkan halaman dengan sidebar
    include '../../component/sidebarversi1.php';
    
    echo"
    <script>
    function toggleEnable(id1,id2,id3,id4) {
        var textbox = document.getElementById(id1);
        var textbox2 = document.getElementById(id4);
        
        if (textbox.disabled) {
           // If disabled, do this 
           document.getElementById(id1).disabled = false;
           document.getElementById(id2).disabled = false;
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
        <h4>PROFILE</h4>
        <button type="button" class="btn btn-outline-primary"
            onclick="toggleEnable('namaUser','email','nama_foto','btnsave')">Edit
            Data</button>
        <!-- <i class="fa-solid fa-hand-holding"></i> -->
        <!-- <h4 onclick="toggleEnable('namaUser','email','nama_foto')">Edit Profil</h4> -->
    </div>
    <div class="card" style="max-width: 1500px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../../img/assets/<?= isset($_SESSION['user']['nama_foto']) ? $_SESSION['user']['nama_foto'] : 'default-profile.png'; ?>"
                    class="img-fluid rounded-start" alt="..." width="1000px">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <!-- <h5 class="card-title inline bg-dark">Profile</h5> -->

                    <!-- <h5 class="card-title-right">aaa</h5> -->
                    <div class="card-body">
                        <form action="../../process/editProfileProcess.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="editNamaUser" class="form-label">Nama User</label>
                                <input class="form-control" id="namaUser" name="nama_user"
                                    aria-describedby="namaUserHelp" value="<?= $_SESSION['user']['nama_user']?>"
                                    disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editEmail" class="form-label">Email</label>
                                <input class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                    value="<?= $_SESSION['user']['email']?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editNamaFoto" class="form-label">Photo</label>
                                <input class="form-control" type="file" id="nama_foto" name="nama_foto"
                                    aria-describedby="namaFotoHelp" disabled>
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
    </div>
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>`

</html>