<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eclearance";

    $con = new mysqli($servername, $username, $password, $dbname, 3306);

    if($con->connect_error){
        die('Connection failed ' . $con->connect_error);
    }

    return $con;

?>