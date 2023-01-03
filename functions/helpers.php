<?php 
function registerExpectionHandler(): void
{
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
}

function emptyInputSignup(string $email,string $password ) :bool
{
    $result="";
    if(empty($name)|| empty($passwordw) ){

        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function InvalidEmail(string $email):bool
{
    $result="";
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emailExist(PDO $conn,string $email): bool
{
   $sql = "SELECT * FROM User WHERE email = ? ;";
    $stmt = $conn->prepare($sql);
    if (!$stmt){
        header("location: ./signin?php?error=stmtfailed");
        exit;
    }
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $resultData = $stmt-> fetchAll();

    if($row = $stmt->fetchAll(PDO::FETCH_ASSOC) )
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }
    $stmt ->closeCursor();

}

function createUser(PDO $conn,string $email,string $password) :bool
{
    $sql = "INSERT INTO Users (email,password) VALUES (?,?);";
    $stmt = $conn->prepare($sql);
    if (!$stmt){
        header("location: ./signin?php?error=stmtfailed");
        exit;
    }
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $hashedPw= password_hash($password,PASSWORD_DEFAULT);
    $stmt->bindParam(':password', $hashedPw, PDO::PARAM_STR);
    $stmt->execute();
    $stmt ->closeCursor();

    header("location: ./pages/login.php");
    exit();

}