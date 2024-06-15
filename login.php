<?php session_start();
if(!isset($_POST["username"])){
    header("location:login.html");
    die();
}
$username = $_POST["username"];
$pass = $_POST["password"];

if($username == "" || $pass == ""){
    header("location:login.html");
    echo "username or password is empty";
    die();
}
require_once "connection.php";
$res = $con->prepare("select username, password from accounts where username = :username");
$res->bindParam(":username",$username);
$res->execute();
if($data = $res->fetch(PDO::FETCH_ASSOC)){
    $_SESSION["username"] = $username;
    header("location:main.html");
    die();
}else{
    header("location:login.html");
    echo"no user with this name";
    die();
}
?>