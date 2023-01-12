<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'crud-login';

    //database sorunce name
    $dsn ="mysql:host={$host};dbname={$db}";
    try {
        // connectie creeren
        $conn = new PDO( $dsn ,$user,$password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        echo "connection failed : ". $e->getMessage();
    }




