<?php
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