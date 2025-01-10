<?php
session_start();
include_once "../classes/user.php";

if(isset($_POST['update-user'])){
    
    $userId = $_SESSION["userId"];
    $email = $_POST["email"];
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];

     if($_FILES["image"]["error"] != 4){
        $filename = $_FILES["image"]["name"];
        $fileTmpName = $_FILES["image"]["tmp_name"];
        $newFileName = uniqid() ."-" .$filename;
        move_uploaded_file($fileTmpName,"../profile-imgs/".$newFileName);
    }

    if(!isset($email) && !isset($firstname) && !isset($lastname) && !isset($newFileName)){
        echo "error";
        header("Location: ../public/index.php?error");
    }

    $user = new User();
    $userOldImg = $user->getOldImage($userId);

    if(isset($newFileName)){
        $user->updateUser($userId,$firstname,$lastname,$email,$newFileName);
        if($_SESSION['urole'] === "visitor"){
            header("Location: ../public/personalDetails.php");
        }
        else if($_SESSION['urole'] === "author"){
            header("Location: ../public/authorDash.php");
        }
    }
    else {
        $user->updateUser($userId,$firstname,$lastname,$email,$userOldImg["user_image"]);
        if($_SESSION['urole'] === "visitor"){
            header("Location: ../public/personalDetails.php");
        }
        else if($_SESSION['urole'] === "author"){
            header("Location: ../public/authorDash.php");
        }
    }
    
}