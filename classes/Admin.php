<?php
include_once "Categorie.php";
include_once "User.php";
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
   
    public function deleteCategorie($idcategorie){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();
        $deletQuery = $conn->prepare("DELETE FROM categories WHERE categorie_id = :idcategorie");
        $deletQuery->bindParam(":idcategorie",$idcategorie);
        $deletQuery->execute();
        header("Location: ../public/adminDash.php");
    }

    public function UpdateCategorie($categorieId,$categorieName,$categorieDesc){

        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $updateCat = $conn->prepare("UPDATE categories 
        SET categorie_name = :name, description = :description
        WHERE categorie_id = :id");
        $updateCat->bindParam(":name",$categorieName);
        $updateCat->bindParam(":description",$categorieDesc);
        $updateCat->bindParam(":id",$categorieId);
        $updateCat->execute();
    }

    public function showArticles(){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $selectAr = $conn->query("SELECT * FROM articles INNER JOIN users WHERE articles.user_id = users.user_id");
        $selectAr->execute();
        return $result = $selectAr->fetchAll();

    }

    public function disArticles(){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $numArt = $conn->prepare("SELECT count(*) AS num FROM articles");
        $numArt->execute();
        $result = $numArt->fetchAll();
        return $result;

    }

    public function showNumArtStatus($status){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $numArt = $conn->prepare("SELECT count(*) AS num FROM articles WHERE status = ?");
        $numArt->execute([$status]);
        $result = $numArt->fetchAll();
        return $result;

    }

    public function showUsers($role){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $visitors = $conn->prepare("SELECT * FROM users WHERE role = ?");
        $visitors->execute([$role]);
        $result = $visitors->fetchAll();
        return $result;

    }

    public function calcArticles($userId){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $visitors = $conn->prepare("SELECT COUNT(*) AS numar FROM articles 
        WHERE user_id = ?");
        $visitors->execute([$userId]);
        $result = $visitors->fetchAll();
        return $result;

    }




   
}
