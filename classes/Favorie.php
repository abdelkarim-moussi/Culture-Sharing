<?php

include_once "../classes/user.php";
include_once "../classes/Article.php";

class Favorie{

    private $visitorId;
    private $articleId;

    public function __construct($visitorId,$articleId){

        $this->visitorId = $visitorId;
        $this->articleId = $articleId;

    }


    public function getVisitorId(){
        return $this->visitorId;
    }
    public function setVisitorId($VisitorId){
        $this->visitorId = $VisitorId;
    }

    public function getArticleId(){
        return $this->articleId;
    }
    public function setArticleIdd($articleId){
        $this->articleId = $articleId;
    }

    
}