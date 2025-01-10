<?php
include_once "../config/dbconfig.php";
class Comment{

    private $articleId;
    private $visitorId;
    private $content;

    // public function __construct($visitorId,$articleId,$content)
    // {
    //     $this->visitorId= $visitorId;
    //     $this->articleId= $articleId;
    //     $this->content= $content;
    // }


//getters and setters
    public function getArticleId(){
        return $this->articleId;
    }
    public function setArticleId($articleId){
        $this->articleId = $articleId;
    }

    public function getVisitorId(){
        return $this->visitorId;
    }
    public function setVisitorId($visitorId){
        $this->visitorId = $visitorId;
    }

    public function getContentId(){
        return $this->content;
    }
    public function setContentId($content){
        $this->content = $content;
    }


    public function createComment($visitorId,$articleId,$content){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $sql = $conn->prepare("INSERT INTO comments (visitor_id,article_id,com_content)
        VALUES(:vid,:aid,:content)");
        $sql->bindParam(":vid",$visitorId,PDO::PARAM_STR);
        $sql->bindParam(":aid",$articleId,PDO::PARAM_STR);
        $sql->bindParam(":content",$content,PDO::PARAM_STR);
        $sql->execute();
    }

    public function getComments($articleId){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $sql = $conn->query("SELECT * FROM comments WHERE article_id = $articleId");
        $sql->execute();
        $result = $sql->fetchAll();
        return $result;
    }
}