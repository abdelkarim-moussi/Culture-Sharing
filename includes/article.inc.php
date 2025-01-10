<?php
session_start();
include_once "../classes/Author-Contr.php";
include_once "../classes/Article.php";
include_once "../classes/Author.php";
include_once "../classes/Comment.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){

    if(isset($_POST["add-art"])){

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
}

//delete article
if(isset($_GET["idart"])){
    $article_id = $_GET["idart"];
    $author = new Author();
    $author->deleteArticle($article_id);
}

//update article

if(isset($_POST["update-article"])){
    
    if(isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["artId"])){
        echo "done";

        $title = $_POST["title"];
        $content = $_POST["content"];

        $articleId = $_POST["artId"];

        if($_FILES["image"]["error"] != 4){
            $filename = $_FILES["image"]["name"];
            $fileTmpName = $_FILES["image"]["tmp_name"];
            $newFileName = uniqid() ."-" .$filename;
            move_uploaded_file($fileTmpName,"../uploads/".$newFileName);
        }
        
        $authAr = new Author();

        $authAr->updateArticle($articleId,$title,$content,$newFileName);

        // header("Location: ../public/authorDash.php?articleudpdatedsucces");
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

if(isset($_GET["ida"])){
    $article_id = $_GET["ida"];
    $article = new Author();
    $article->articleDetails($article_id);
    header("Location: ../public/detailArticle.php");
}


//comlents

if(isset($_POST["subcommment"])){

    if(!empty($_POST["comment"])){
        $content = $_POST['comment'];
        $articleId = $_POST['articleId'];
        $visitorId = $_SESSION["userId"];
        $comment = new Comment();
        if($comment->createComment($visitorId,$articleId,$content)){
            echo json_encode(['status'=>'success']);
        }
        else {
            echo json_encode(['status'=>'error']);
        }
        exit();
    }
    
}

if(isset($_GET["fetchcomments"])){
    $articleId = $_GET['articleId'];
    $comment = new Comment();
    $comments = $comment -> getComments($articleId);
    echo json_encode($comments);
    exit();
}

