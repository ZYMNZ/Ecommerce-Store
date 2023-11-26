<?php
    function openDatabaseConnection() {
        $hostName = "localhost:3307";
        $userName = "root";
        $password = "";
        $dataBase = "freelance";

        $conn = new mysqli($hostName,$userName,$password,$dataBase);

        if ($conn->connect_error){
            die("Connection Error" . $conn->connect_error);
        }
        return $conn;
//    echo "Connection Successful";
    }