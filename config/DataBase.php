<?php
// require_once "dbconfig.php";

class DataBase{
   private $dsn = "mysql:host=localhost;dbname=csdb";
   private $user = "root";
   private $password = "karim@mysql@25";
   private static $instance;
   private $connection;

    private function __construct(){

       try{
            $this->connection = new PDO($this->dsn,$this->user,$this->password);
            $this->connection -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            $this->connection -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

       }catch(PDOException $e){
          die('connection failed'.$e->getMessage());
       }
    }

    public static function getInstance(){
      if(!isset(self::$instance)){
         self::$instance = new self;
      }
      return self::$instance;
    }

    public function getConnection(){
      return $this->connection;
    }

   
}





