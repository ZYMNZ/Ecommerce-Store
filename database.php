<?php

    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $dataBase = "freelance";

    $conn = new mysqli($hostName,$userName,$password,$dataBase);

    if ($conn->connect_error){
        die("Connection Error" . $conn->connect_error);
    }

    echo "Connection Successful";


?>