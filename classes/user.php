<?php 

include_once "../config/DataBase.php";

class User {

    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private string $passConfirm;
    private string $role;

    //firstname getter and setter
    public function getFirstName(){
        return $this -> firstname;
    }
    public function setFirstName($firstname){
      $this -> firstname = $firstname;
    }

    //lastname getter and setter
    public function getLastName(){
        return $this -> lastname;
    }
    public function setLastName($lastname){
      $this -> firstname = $lastname;
    }

    //email getter and setter
    public function getEmail(){
        return $this -> email;
    }
    public function setEmail($email){
      $this -> email = $email;
    }

    //password getter and setter
    public function getPassword(){
        return $this -> password;
    }
    public function setPassword($password){
      $this -> email = $password;
    }
    //password confirm getter and setter
    public function getPassConfirm(){
        return $this -> passConfirm;
    }
    public function setPassConfirm($passConfirm){
      $this -> email = $passConfirm;
    }

    //role getter and setter
    public function getRole(){
        return $this -> role;
    }
    public function setRole($role){
      $this -> email = $role;
    }

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


    public function UserInfo($userId){

        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $getUser = $conn->query("SELECT * FROM users WHERE user_id = $userId");
        $result = $getUser->fetch();
        return $result;

    }


    public function updateUser($userId,$firstname,$lastname,$email,$image){

        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $updateUser = $conn->prepare("UPDATE users
        SET firstname = ?, lastname = ?, email = ?, user_image = ?
        WHERE user_id = ?");
        $updateUser->execute([$firstname,$lastname,$email,$image,$userId]);

    }

    public function getOldImage($userId){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $selectImage = $conn->query("SELECT user_image FROM users WHERE user_id = $userId");
        $result = $selectImage->fetch();
        return $result;
    }



}
