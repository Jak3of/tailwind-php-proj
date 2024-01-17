<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "db_blogvideojuegos";

    $conn = mysqli_connect($server, $user, $password, $database);
    if (mysqli_connect_errno()) {
        die("Failed to connect with MySQL: ".mysqli_connect_error());
    } else {
        //echo "Connected successfully";

        mysqli_query($conn, "SET NAMES 'utf8'");

        session_start();
    }




