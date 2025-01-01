<?php
session_start();
include_once "Articles.php";
class Author extends Visitor{

    protected function createArticle($title,$categorie,$content,$image){

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

    public function deleteArticle($article_id){
        
        $author_id = $_SESSION["userId"];

        $stmt = $this->connect()->query("DELETE FROM articles WHERE article_id = $article_id AND user_id = $author_id");
        
        if(!$stmt->execute()){
            header("Location:../public/authorDash.php?error=executionfailed");
        }

    }

    public function updateArticle($title,$categorie,$content,$image){
        $author_id = $_SESSION["userId"];
        $catstmt =$this->connect()->prepare("SELECT cetegorie_id FROM categories WHERE categorie_name = ?");
        $catstmt->execute($categorie);
        $catstmt->fetchAll();
        $categorie_id = $catstmt[0]["categorie_id"];

        $stmt = $this->connect()->prepare("UPDATE TABLE articles SET categorie_id = ?, title = ?, content = ?, image = ? WHERE user_id = ?");
        
        if(!$stmt ->execute([$categorie_id,$title,$content,$author_id])){
            $stmt = null;
            header("Location: ../public/authorDash.php?error=failedUpdatingarticle");
            exit();
        }
    }
}