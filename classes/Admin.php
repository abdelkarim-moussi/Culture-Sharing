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
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $selectCat = $conn->query("SELECT * FROM categories");
        return $result = $selectCat->fetchAll();

    }

    public function showArtNumByCat(){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $selectNumAr = $conn->query("SELECT count(*) num FROM articles INNER JOIN categories WHERE articles.categorie_id = categories.categorie_id");
        return $result = $selectNumAr->fetchAll();

    }



   
}
