<?php
include_once "Article.php";
class AuthorContr extends Author{

    public function setArticle(Article $article){

        if(empty($article->getTitle) || empty($article->getContent()) || empty($article->getImage()) || empty($article->getCategorie())){
            header("Location: ../public/authorDash.php?error=emptyfields");
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
    
        $this->createArticle($article->getTitle(),$article->getContent(),$article->getImage(),$article->getCategorie());
    }


}