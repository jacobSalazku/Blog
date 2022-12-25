<?php 
function dbConnect(string $user, string $pass, string $db, string $host = 'localhost'): PDO
{
    $conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}