<?php session_start();
//functions that helps with the programe such as headingTo()
include "functionsHelp.php";
if(!isset($_POST["username"]))
    headingTo("login.html");

if($username == "" || $pass == "")
    headingTo("login.html");
//declaration for variables
$username = $_POST["username"];
$pass = $_POST["password"];
//connection avec database
require_once "connection.php";
//getting current user
$res = $con->prepare("select username, password from accounts where username = :username");
$res->bindParam(":username",$username);
$res->execute();
//getting the current user if it exist else redirect to login form
if($data = $res->fetch(PDO::FETCH_ASSOC)){
    //if the verification correct we go to the main window
    if($username == $data["username"] && $pass == $data["password"]){
        $_SESSION["username"] = $username;
        headingTo("main.html");
    }else
        headingTo("login.html");
    
}
?>