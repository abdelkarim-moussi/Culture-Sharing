<?php

include_once "../classes/Visitor-Contr.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $role = $_POST["role"];
    $password = $_POST["password"];
    $passConfirm = $_POST["confirm-password"];

    echo $role;

    if(!isset($email) && !isset($firstname) && !isset($lastname) && !isset($role) && !isset($password) && !isset($passConfirm)){
        echo "error";
    }

    $user = new VisitorContr();
    $user->signUp($firstname,$lastname,$email,$password,$role,$passConfirm);
    // header("Location: ../public/index.php");
}