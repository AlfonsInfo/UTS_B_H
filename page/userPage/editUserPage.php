<?php
    include '../component/sidebar.php';
    $query = mysqli_query($con, "SELECT * FROM users WHERE id = ". $_SESSION['user']['id']);
    $user = mysqli_fetch_assoc($query);
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);" >
    <h4 >EDIT PROFILE</h4>
    <div class="card-body">
        <form action="../process/editProfileProcess.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input class="form-control" id="name" name="name"aria-describedby="emailHelp" value=" <?php echo $user['name']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                <input class="form-control" id="phonenum"name="phonenum" aria-describedby="emailHelp" value=" <?php echo $user['phonenum']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Job</label>
                <select class="form-select" aria-label="Default select example" name="job" id="job" value="<?php echo $user['job']?>">
                    <option value="Chef">Chef</option>
                    <option value="Mechanic">Mechanic</option>
                    <option value="Lecturer">Lecturer</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input class="form-control" id="email"name="email" aria-describedby="emailHelp" value=" <?php echo $user['email']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Membership</label>
                <select class="form-select" aria-label="Default select example" name="membership" id="membership" value=" <?php echo $user['membership']?>" disabled>
                    <option value="Reguler">Reguler</option>
                    <option value="Platinum">Platinum</option>
                    <option value="Gold">Gold</option>
                </select>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            </div>
        </form>
    </div>