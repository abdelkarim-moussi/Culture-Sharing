<?php

class UserContr extends User{


    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private string $role;

    // public function __construct($firstname,$lastname,$email,$password,$role){
    //    $this->firstname = $firstname;
    //    $this->lastname = $lastname;
    //    $this->email = $email;
    //    $this->password = $password;
    //    $this->role = $role;
    // }

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

        if(empty($email) || empty($password)){
            header("Location: public/login.php?error=emptyInputs");
            exit();
        }
        
        $user = new User();
        $user->getUser($email,$password);
    
    }

}