<?php
include_once "Categorie.php";
include_once "../config/DataBase.php";

class Admin{

    public function createCategorie(Categorie $categorie){

        if(!empty($categorie->getCatName()) && !empty($categorie->getDescription())){
            $db = DataBase::getInstance();
            $conn = $db->getConnection();

            $sql = $conn->prepare("INSERT INTO categories (categorie_name,description) VALUES(?,?)");
            $sql->execute([$categorie->getCatName(),$categorie->getDescription()]);
        
        }

    }

    public function showCategories(){
        
    }

   
}