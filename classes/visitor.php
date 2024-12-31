<?php 
include_once "../config/DataBase.php";

class Visitor extends DataBase{

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

    protected function login(){
        $sql = $this->connect()->prepare("INSERT INTO users(firstname,lastname,email,password,role)
        VALUES(:firstname, :lastname, :email, :role, :password)");
        $sql->bindParam(":firstname",$this->firstname);
        $sql->bindParam(":lastname",$this->lastname);
        $sql->bindParam(":email",$this->email);
        $sql->bindParam(":password",$this->password);
        $sql->bindParam(":role",$this->role);

        $sql -> execute();
     
    }
}