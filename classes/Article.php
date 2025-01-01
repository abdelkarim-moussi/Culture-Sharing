<?php

class Article{
    private $title;
    private $content;
    private $image;
    private $author;
    private $categorie;

    public function __construct($title,$content,$image,$author,$categorie){

        $this->title = htmlspecialchars($title);
        $this->content = htmlspecialchars($content);
        $this->image = $image;
        $this->author = $author;
        $this->categorie->$categorie;

    }

    //title getter and setter
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }

    //content getter and setter
    public function getContent(){
        return $this->content;
    }
    public function setContent($content){
        $this->content = $content;
    }

    //image getter and setter
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }

    //author getter and setter
    public function getAuthor(){
        return $this->author;
    }
    public function setAuthor($author){
        $this->author = $author;
    }

    //categorie getter and setter
    public function getCategorie(){
        return $this->categorie;
    }
    public function setCategorie($categorie){
        $this->categorie = $categorie;
    }
}