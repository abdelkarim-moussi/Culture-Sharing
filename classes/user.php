<?php 

class User{

    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private string $role;
    private $pdo;

    public function __construct($pdo){
        $this -> pdo = $pdo;
    }

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

    protected function login(){

    }
}