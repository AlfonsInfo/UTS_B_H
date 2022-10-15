<!-- Container dari Side Bar -->

<!-- 1. Hubungkan page sidebar ke database - agar tidak perlu dihubungkan satu-satu disetiap halamannnya -->
<?php
    include('../../db.php'); 
?>

<!-- Head dari Halaman web + Sidebar -->
<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <title>Library - <?= $pagetitle;?></title>
    <style>
    * {
        font-family: "Poppins";
    }

    .side-bar {
        width: 260px;
        background-color: darkgreen;
        min-height: 100vh;
    }

    a {
        padding-left: 10px;
        font-size: 13px;
        text-decoration: none;
        color: white;
    }

    .menu i {
        padding-left: 20px;
    }

    .menu .content-menu {
        padding: 9px 7px;
    }

    .isActive {
        background-color: #071853 !important;
        border-right: 8px solid #010E2F;
    }

    i {
        color: white;
    }
    </style>
</head>

<body>
    <aside>
        <div class="d-flex">
            <div class="side-bar">
                <h2 class="text-light text-center pt-2">LIBRARY</h2>
                <hr>
                <div class="menu">
                    <div class="content-menu">
                        <i class="fa fa-dashboard"></i>
                        <a href="" style="font-weight:600">PEMINJAMAN BUKU</a>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-film"></i>
                        <a href="" style="font-weight:600">PENGEMBALIAN BUKU</a>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-sign-out"></i>
                        <a href="" style="font-weight:600">&nbspLogout</a>
                    </div>
                    <hr>
                </div>
            </div>