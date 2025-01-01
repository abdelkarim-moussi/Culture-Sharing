<?php

class VisitorContr extends Visitor{


    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private string $passConfirm;
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

    
    protected function signUp($email,$firstname,$lastname,$password,$passConfirm){

        $emailRegex = "^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$";
        $nameRegex = "^[a-zA-Z0-9]+$";
        if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($role)){
            header("Location: public/signup.php?error=emptyInputs");
            exit();
        }

        if(!preg_match($emailRegex,$email)){
          header("Location: public/signup.php?error=invaliemail");
          exit();
        }

        if(!preg_match($nameRegex,$firstname) || !preg_match($nameRegex,$lastname)){
          header("Location: public/signup.php?error=invalidfirstname?lastname");
          exit();
        }
        if($password != $passConfirm){
          header("Location: public/signup.php?error=passwordsnotmatch");
          exit();
        }
        
        $Visitor = new Visitor();
        $Visitor->$this->createUser($firstname,$lastname,$email,$password,$role);
    
    }

}