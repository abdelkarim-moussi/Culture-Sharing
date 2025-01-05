<?php 

include_once "../config/DataBase.php";

class User {

    protected function getUser($email, $password) {
        // Start session at the beginning

        // Access the database
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        try {
            // Prepare query to fetch hashed password by email
            $sql = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $sql->bindParam(':email',$email);
            $sql->execute();

            // Check if the user exists
            if ($sql->rowCount() == 0) {
                header("Location: ../public/login.php?error=usernotfound");
                exit();
            }

            $user = $sql->fetch(PDO::FETCH_ASSOC); // Use fetch() for single-row retrieval

            // Verify the password
            if (!password_verify($password, $user["password"])) {
                header("Location: ../public/login.php?error=passwordincorrect");
                exit();
            }

            $_SESSION["username"] = $user["firstname"];
            $_SESSION["userId"] = $user["user_id"];
            $_SESSION["urole"] = $user["role"];


        } catch (PDOException $e) {
            // Log error for debugging
            error_log("Database Error: " . $e->getMessage());
            header("Location: ../public/login.php?error=stmfailed");
            exit();
        }
    }
}
