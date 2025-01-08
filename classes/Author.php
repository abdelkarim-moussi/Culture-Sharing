<?php
// session_start();
include_once "Article.php";
include_once "Visitor.php";
include_once "../config/DataBase.php";

class Author extends Visitor{

    protected function createArticle($title,$content,$image,$author_id,$categorie){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();
        
        $cat = $conn->prepare("SELECT * FROM categories WHERE categorie_name = ?");
        $cat->execute([$categorie]);
        $res = $cat->fetchAll();
        // $categorie_id = $res[0]["categorie_id"];
    
        if ($res && isset($res[0]["categorie_id"])) {

            $categorie_id = $res[0]["categorie_id"];
            $date_pub = date("y-m-d");

            $stmt = $conn->prepare("INSERT INTO articles(user_id,categorie_id,title,content,pub_date,image) VALUES(?,?,?,?,?,?);");

            if(!$stmt->execute([$author_id,$categorie_id,$title,$content,$date_pub,$image])){
            $stmt = null;
            header("Location: ../public/authorDash.php?error=executionfailed");
            exit();
           }

           header("Location: ../public/authorDash.php");

        } else {
            $categorie_id = null; // Handle this case as needed (e.g., log or return an error)
        }


    }

    public function deleteArticle($article_id){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        // $author_id = $_SESSION["userId"];

        $stmt = $conn->query("DELETE FROM articles WHERE article_id = $article_id");
        
        if(!$stmt->execute()){
            $stmt = null;
            header("Location:../public/authorDash.php?error=executionfailed");
            exit();
        }
        header("Location:../public/authorDash.php");

    }


    public function showArticles(){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $author_id = $_SESSION["userId"];
        $catstmt =$conn->prepare("SELECT * FROM articles JOIN users WHERE articles.user_id = users.user_id AND articles.user_id = ?");
        $catstmt->execute([$author_id]);
        $articles = $catstmt->fetchAll();
        return $articles;
    }

    public function showNumArtByStat($status){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $author_id = $_SESSION["userId"];
        $slectNumARt =$conn->prepare("SELECT COUNT(*)AS numart FROM articles JOIN users WHERE articles.user_id = users.user_id AND articles.user_id = ? AND articles.status = ?");
        $slectNumARt->execute([$author_id,$status]);
        $articles = $slectNumARt->fetchAll();
        return $articles;
    }

    public function countNumARt(){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $author_id = $_SESSION["userId"];
        $numARt =$conn->prepare("SELECT COUNT(*) AS numArt FROM articles WHERE user_id = ?");
        $numARt->execute([$author_id]);
        $articles = $numARt->fetchAll();
        return $articles;
    }

    public function updateStatus($status,$article_id){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $author_id = $_SESSION["userId"];
        $numARt =$conn->prepare("UPDATE articles SET articles.status = ? WHERE article_id = ?");
        $numARt->execute([$status,$article_id]);

        header("Location: ../public/adminDash.php");
      
    }

    public function articleDetails($article_id){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $sql = $conn->prepare("SELECT * FROM articles JOIN users JOIN categories WHERE articles.user_id = users.user_id AND articles.categorie_id = categories.categorie_id AND article_id = ?");
        $sql -> execute([$article_id]);
        return $result = $sql->fetchAll();
        header("Location: ../public/detailArticle.php");
    }

    public function UpdateArticle($articleId,$title,$content,$image){

        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $updateCat = $conn->prepare("UPDATE articles 
        SET title = :title, content = :content , image = :image , status = 'pending'
        WHERE article_id = :id");
        $updateCat->bindParam(":title",$title);
        $updateCat->bindParam(":content",$content);
        $updateCat->bindParam(":image",$image);
        $updateCat->bindParam(":id",$articleId);
        $updateCat->execute();
        header("Location: ../authorDash.php?articleudpdatedsucces");
    }

    
}