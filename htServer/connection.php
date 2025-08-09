<?php 
    // this file will be used for db connection

    $servername = "localhost";
    $username = "root";
    $mysqlpassword = "";
    $dbname = "final";

    // Create connection
    $conn = new mysqli($servername, $username, $mysqlpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }