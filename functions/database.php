<?php 
function dbConnect(string $user, string $pass, string $db, string $host = 'localhost'): PDO
{
    $connection = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);

    return $connection;
}

