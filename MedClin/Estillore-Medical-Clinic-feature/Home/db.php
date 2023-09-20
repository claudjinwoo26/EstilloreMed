<?php
    $localhost = "localhost";
    $root = "root";
    $password = "";
    $db = "profiles";
    $con = mysqli_connect($localhost, $root, $password, $db);
    if(mysqli_connect_errno()){
        echo"Failed to connect to MySQL: ".mysqli_connect_error();
    }
?>