<?php
session_start();
include_once "Articles.php";
class Author extends Visitor{

    protected function CreateArticle($title,$categorie,$content,$image){

        $author_id = $_SESSION["userId"];
        $cat = $this->connect()->prepare("SELECT categorie_id categories WHERE categorie_name = $categorie");
        $cat ->execute();
        $cat->fetchALL();
        $categorie_id = $cat[0]["categorie_id"];

        $date_pub = date("y-m-d");
        
        $stmt = $this->connect()->prepare("INSERT INTO articles(user_id,categorie_id,title,content,pub_date,image) VALUES(?,?,?,?,?,?);");

        if(!$stmt->execute([$author_id,$categorie_id,$title,$content,$date_pub,$image])){
            $stmt = null;
            header("Location: ../public/authorDash.php?error=executionfailed");
            exit();
        }


    }
}