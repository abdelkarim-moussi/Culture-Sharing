<?php

class DataBase{

    private $dsn = 'mysql:host=localhost;dbname:csdb';
    private $username = 'root';
    private $password = 'karim@mysql@25';

    protected function connect(){

       try{
            $pdo = new PDO($this->dsn,$this->username,$this->password);

            $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;

       }catch(PDOException $exception){
          die('connection failed'.$exception->getMessage());
       }
    }

}