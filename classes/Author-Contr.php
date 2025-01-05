<?php
include_once "Article.php";
include_once "Author.php";

class AuthorContr extends Author{

    public function setArticle(Article $article){
        $title = $article->getTitle();
        $content = $article->getContent();
        $image = $article->getImage();
        $categorie = $article->getCategorie();
        $author = $article->getAuthor();

        if(empty($article->getTitle()) || empty($article->getContent()) || empty($article->getImage()) || empty($article->getAuthor()) || empty($article->getCategorie())){
            header("Location: ../public/authorDash.php?error=emptyfields-$title-$content-$author-$categorie");
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