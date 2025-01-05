<?php
session_start();
include_once "../classes/Author-Contr.php";
include_once "../classes/Article.php";
include_once "../classes/Author.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){

    $title = $_POST["title"];
    $content = $_POST["content"];
    
    $filename = $_FILES["image"]["name"];
    $fileTmpName = $_FILES["image"]["tmp_name"];
    $newFileName = uniqid() ."-" .$filename;
    move_uploaded_file($fileTmpName,"../uploads/".$newFileName);

    $categorie = $_POST["categorie"];

    $author_id = $_SESSION["userId"];


    if(isset($title) && isset($content) &&  isset($categorie) && isset($newFileName)){

        echo $title ."<br>".$content."<br>".$newFileName."<br>".$categorie;
        
        $article = new Article($title,$content,$newFileName,$author_id,$categorie);
        $authAr = new AuthorContr();
        $authAr->setArticle($article);

        // header("Location: ../authorDash.php");

    }
   

}


if(isset($_GET["idart"])){
    $article_id = $_GET["idart"];
    $author = new Author();
    $author->deleteArticle($article_id);
}


if(isset($_POST["update"])){
    
    if(isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["image"]) && isset($_POST["categorie"])){

        $title = $_POST["title"];
        $content = $_POST["content"];

        $categorie = $_POST["categorie"];

        $author_id = $_SESSION["user_id"];

        if($_FILES["image"]["error"] != 4){
            $filename = $_FILES["image"]["name"];
            $fileTmpName = $_FILES["image"]["tmp_name"];
            $newFileName = uniqid() ."-" .$filename;
            move_uploaded_file($fileTmpName,"../uploads/".$newFileName);
        }
        
        $authAr = new Author();

        $authAr->updateArticle($title,$categorie,$content,$newFileName);

        header("Location: ../authorDash.php?articleudpdatedsucces");
    }
   
}

if(isset($_GET["acidart"])){
    $article_id = $_GET["acidart"];
    $author = new Author();
    $author->updateStatus("accepted",$article_id);
}

if(isset($_GET["refidart"])){
    $article_id = $_GET["refidart"];
    $author = new Author();
    $author->updateStatus("refused",$article_id);
}
