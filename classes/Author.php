<?php
session_start();
include_once "Articles.php";
class Author extends Visitor{

    protected function CreateArticle($author_id,$categorie_id,$title,$content,$image,$date_pub){

        if(empty($title) || empty($content) || empty($image) || empty($categorie)){
            header("Location: ../public/authorDash.php?error=emptyfields");
            exit();
        }

        $stmt = $this->connect()->prepare("INSERT INTO articles(user_id,categorie_id,title,content,pub_date,image) VALUES(?,?,?,?,?,?);");

        if(!$stmt->execute([$author_id,$categorie_id,$title,$content,$date_pub,$image])){
            $stmt = null;
            header("Location: ../public/authorDash.php?error=executionfailed");
            exit();
        }


    }
}