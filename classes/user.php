<?php 
include_once "../config/DataBase.php";

class User extends DataBase{

    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
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

    //role getter and setter
    public function getRole(){
        return $this -> role;
    }
    public function setRole($role){
      $this -> email = $role;
    }

    protected function login($email,$password){
        $sql = $this->connect()->prepare("SELECT user_id,email,role FROM users 
        WHERE email = ? AND password = ?");

        $sql -> execute([$email,$password]);
     
    }
}