<?php
    $host = "127.0.0.1";
    $puerto = "1024";
    $db = "stats";
    $user = "";
    $pass = "";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true,
    ];

    try{
        $conn = new PDO("mysql:host=$host:$puerto;dbname=$db", $user, $pass, $options);   
    }
    catch (PDOException $e){
        echo $e;
    }
?>