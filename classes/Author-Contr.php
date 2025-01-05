<?php
include_once "Article.php";
include_once "Author.php";

class AuthorContr extends Author{

    public function setArticle(Article $article){

        $title = $article->getTitle();
        $content = $article->getContent();
        $image = $article->getImage();
        $cat = $article->getCategorie();
        $author = $article->getAuthor();

        if(empty($title) || empty($content) || empty($image) || empty($author) || empty($cat) ){
            // header("Location: ../public/authorDash.php?error=emptyfields-$categorie");
            echo $cat;
            exit();
        }
        if(strlen($article->getTitle()) < 10){
          header("Location: ../public/authorDash.php?error=titlemusthavemorethen10char");
          exit();
        }
        if(strlen($article->getContent()) < 100){
          header("Location: ../public/authorDash.php?error=contentmusthavemorethen100char");
          exit();
        }
    
        $this->createArticle($article->getTitle(),$article->getContent(),$article->getImage(),$article->getAuthor(),$article->getCategorie());
    }


}