<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $name = "perpus_b_h";

    $con = mysqli_connect($host,$user,$pass,$name);
    
    if(mysqli_connect_errno()){
        echo "Failed to connect : " . mysqli_connect_error();
    }
    session_start();

    function url(){
        if(isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        }
        else{
            $protocol = 'http';
        }
        // return $protocol . "://" . $_SERVER['HTTP_HOST'] .dirname($_SERVER["REQUEST_URI"],count(explode('/',$_SERVER["REQUEST_URI"])) - 2);
        return $protocol . "://" .$_SERVER['HTTP_HOST'] . "/" . "PWB_KELOMPOKH";
        }
?>