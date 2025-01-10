<?php
include_once "visitor.php";

class VisitorContr extends Visitor{

    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private string $passConfirm;
    private string $role;
    private string $image;


    public function __construct($firstname,$lastname,$email,$password,$passConfirm,$role,$image){
       $this->firstname = $firstname;
       $this->lastname = $lastname;
       $this->email = $email;
       $this->password = $password;
       $this->passConfirm = $passConfirm;
       $this->role = $role;
       $this->image = $image;
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
    //role getter and setter
    public function getImage(){
        return $this -> image;
    }
    public function setImage($image){
      $this -> email = $image;
    }

    
    public function signUp(){

        $emailRegex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        $nameRegex = "/^[a-zA-Z][a-zA-Z0-9]$/";
        
        if(empty($this->firstname) || empty($this->lastname) || empty($this->email) || empty($this->password) || empty($this->passConfirm) || empty($this->role)){
            header("Location: ../public/signup.php?error=emptyInputs");
            exit();
        }

        if(!preg_match($emailRegex,$this->email)){
          header("Location: ../public/signup.php?error=invaliemail");
          exit();
        }

        // if(!preg_match($nameRegex,$firstname) || !preg_match($nameRegex,$lastname)){
        //   header("Location: ../public/signup.php?error=invalidfirstname?lastname");
        //   exit();
        // }

        if($this->password != $this->passConfirm){
          header("Location: ../public/signup.php?error=passwordsnotmatch");
          exit();
        }
        
        $visitor = new Visitor();
        $visitor->createUser($this->firstname,$this->lastname,$this->email,$this->role,$this->password,$this->image);
    
    }

    

}