<?php
    //Variabel untuk nama title
    $pagetitle = "Edit User";
    //Hubungkan halaman dengan sidebar
    include '../../component/sidebarversi1.php';
    $query = mysqli_query($con, "SELECT * FROM user WHERE id = ". $_SESSION['user']['email']);
    $user = mysqli_fetch_assoc($query);
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);" >
    <h4 >EDIT PROFILE</h4>
    <div class="card-body">
        <form action="../../process/editProfileProcess.php" method="POST">
            <div class="mb-3">
                <label for="editNamaUser" class="form-label">Nama User</label>
                    <input class="form-control" id="namaUser" name="namaUser" aria-describedby="namaUserHelp" value=" <?php echo $user['nama_user']?>">
            </div>
            <div class="mb-3">
                <label for="editPassword" class="form-label">Password</label>
                <input class="form-control" id="password" name="password" aria-describedby="passwordHelp" value=" <?php echo $user['password']?>">
            </div>
            <div class="mb-3">
                <label for="editEmail" class="form-label">Email</label>
                <input class="form-control" id="email" name="email" aria-describedby="emailHelp" value=" <?php echo $user['email']?>">
            </div>
            <div class="mb-3">
                <label for="editNamaFoto" class="form-label">Photo</label>
                <input class="form-control" type="file" id="nama_foto" name="nama_foto" aria-describedby="namaFotoHelp">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            </div>
        </form>
    </div>