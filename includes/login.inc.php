<?php
session_start();
include_once "../classes/User-Contr.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(isset($email) && isset($password)){
        $user = new UserContr();
        $user->login($email,$password);
        header("Location: ../public/index.php");
    }
}