<?php 
class Visitor extends DataBase{

        protected function createUser($firstname,$lastname,$email,$password,$role){

        $sql = $this->connect()->prepare("SELECT * FROM users WHERE email = ?;");

        if(!$sql->execute($email)){
          $sql = null;
          header("Location: ../public/signup.php?error=failed");
          exit();
        }

        if($sql->rowCount() > 0){
            $result = $sql->fetchAll();

            if($email === $result[0]["email"]){
                $sql = null;
                header("Location: ../public/signup.php?error=emailalreadyexist");
                exit();
            }
        }





        // $sql = $this->connect()->prepare("INSERT INTO users(firstname,lastname,email,password,role)
        // VALUES(?, ?, ?, ?, ?);");
        
        // $sql -> execute([$firstname,$lastname,$email,$role,$password]);
     
    }
}