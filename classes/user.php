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

    protected function login(){

    }
}