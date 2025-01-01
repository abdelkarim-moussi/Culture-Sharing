<?php

class UserContr extends User{

    private string $email;
    private string $password;

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

    
    protected function login($email,$password){

        if(empty($email) || empty($password)){
            header("Location: public/login.php?error=emptyInputs");
            exit();
        }
        
        $this->getUser($email,$password);
    
    }

}