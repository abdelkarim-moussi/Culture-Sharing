<?php
session_start();
include_once "../classes/Author-Contr.php";
include_once "../classes/Article.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){

    if(isset($_POST["title"])&& isset($_POST["content"]) && isset($_FILES["image"]["name"]) && isset($_POST["categorie"])){

        $title = $_POST["title"];
        $content = $_POST["content"];
        
        $filename = $_FILES["image"]["name"];
        $fileTmpName = $_FILES["image"]["tmp_name"];
        $newFileName = uniqid() ."-" .$filename;
        move_uploaded_file($fileTmpName,"../uploads/".$newFileName);
    
        $categorie = $_POST["categorie"];

        $author_id = $_SESSION["user_id"];
        
        $article = new Article($title,$content,$newFileName,$author_id,$categorie);
        $authAr = new AuthorContr();
        $authAr->setArticle($article);

    }
   

}