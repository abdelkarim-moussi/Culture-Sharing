<?php
// Include database configuration
include_once "../config/DataBase.php";

class Visitor {

    protected function createUser($firstname, $lastname, $email, $role, $password) {
        $db = DataBase::getInstance();
        $conn = $db->getConnection();
        
            // Check if email already exists
            $sql = $conn->prepare("SELECT email FROM users WHERE email = :email");
            $sql->bindParam(":email", $email, PDO::PARAM_STR);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                header("Location: ../public/signup.php?error=emailalreadyexist");
                exit();
            }

            // Hash the password
            $hashedPass = password_hash($password, PASSWORD_BCRYPT);

            // Insert new user into the database
            $insertSQL = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, role) VALUES (:firstname, :lastname, :email, :password, :role)");
            $insertSQL->bindParam(":firstname", $firstname, PDO::PARAM_STR);
            $insertSQL->bindParam(":lastname", $lastname, PDO::PARAM_STR);
            $insertSQL->bindParam(":email", $email, PDO::PARAM_STR);
            $insertSQL->bindParam(":password", $hashedPass, PDO::PARAM_STR);
            $insertSQL->bindParam(":role", $role);
            // $insertSQL->execute();
            if ($insertSQL->execute()) {
                header("Location: ../public/index.php?executed");
            } else {
                error_log("Insert Query Failed: " . implode(", ", $insertSQL->errorInfo()));
                header("Location: ../public/signup.php?error=insert-failed");
            }

    }
}
