<?php

include_once "classes/Visitor-Contr.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $role = $_POST["role"];
    $password = $_POST["password"];
    $passConfirm = $_POST["passconfirm"];

    if(isset($email) && isset($firstname) && isset($lastname) && isset($role) && isset($password) && isset($passConfirm)){
        $user = new VisitorContr();
        $user->$this->signUp($email,$firstname,$lastname,$role,$password,$passConfirm);
        header("Location: ../public/index.php");
    }
}