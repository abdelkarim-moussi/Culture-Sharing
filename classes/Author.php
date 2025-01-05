<?php
// session_start();
include_once "Article.php";
include_once "Visitor.php";
include_once "../config/DataBase.php";

class Author extends Visitor{

    protected function createArticle($title,$categorie,$content,$image){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $author_id = $_SESSION["userId"];
        $cat = $conn->prepare("SELECT categorie_id categories WHERE categorie_name = $categorie");
        $cat ->execute();
        $cat->fetchALL();

        $categorie_id = $cat[0]["categorie_id"];
        $date_pub = date("y-m-d");

        $stmt = $conn->prepare("INSERT INTO articles(user_id,categorie_id,title,content,pub_date,image) VALUES(?,?,?,?,?,?);");

        if(!$stmt->execute([$author_id,$categorie_id,$title,$content,$date_pub,$image])){
            $stmt = null;
            header("Location: ../public/authorDash.php?error=executionfailed");
            exit();
        }

    }

    public function deleteArticle($article_id){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $author_id = $_SESSION["userId"];

        $stmt = $conn->query("DELETE FROM articles WHERE article_id = $article_id AND user_id = $author_id");
        
        if(!$stmt->execute()){
            $stmt = null;
            header("Location:../public/authorDash.php?error=executionfailed");
            exit();
        }

    }

    public function updateArticle($title,$categorie,$content,$image){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $author_id = $_SESSION["userId"];
        $catstmt =$conn->prepare("SELECT cetegorie_id FROM categories WHERE categorie_name = ?");
        $catstmt->execute([$categorie]);
        $catstmt->fetchAll();
        $categorie_id = $catstmt[0]["categorie_id"];

        $stmt = $conn->prepare("UPDATE TABLE articles SET categorie_id = ?, title = ?, content = ?, image = ? WHERE user_id = ?");
        
        if(!$stmt ->execute([$categorie_id,$title,$content,$image,$author_id])){
            $stmt = null;
            header("Location: ../public/authorDash.php?error=failedUpdatingarticle");
            exit();
        }
    }

    public function showArticles(){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $author_id = $_SESSION["userId"];
        $catstmt =$conn->prepare("SELECT * FROM articles JOIN users WHERE articles.user_id = ?");
        $catstmt->execute([$author_id]);
        $articles = $catstmt->fetchAll();
        return $articles;
    }
}