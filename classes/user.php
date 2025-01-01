<?php 
include_once "../config/DataBase.php";

class User extends DataBase{

    protected function getUser($email,$password){
        $sql = $this->connect()->prepare("SELECT password FROM users 
        WHERE email = ?");

        if(!$sql -> execute([$email])){
            $sql = null;
            exit();
        }

        if($sql->rowCount() == 0){
          $sql = null;
          header("Location: ../public/login.php?error=usernotfound");
          exit();
        }
        
        $hachedPass = $sql->fetchAll();
        $checkPass = password_verify($password,$hachedPass[0]["password"]);

        if($checkPass === false){
            $sql = null;
            header('Location: ../public/login.php?error=passwordincorect');
            exit();
        }

        else if($checkPass === true){
            $stmt = $this->connect()->prepare("SELECT * FROM users 
            WHERE email = ? AND password = ?");

            if(!$stmt->execute([$email,$hachedPass[0]["password"]])){
                $sql = null;
                header("Location: ../public/login.php?error=stmfailed");
                exit();
            }

            $user = $stmt->fetchAll();

            session_start();

            $_SESSION["username"] = $user[0]["firstname"];
            $_SESSION["userId"] = $user[0]["user_id"];

        }
        
     
    }
}