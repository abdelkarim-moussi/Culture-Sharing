<?php
// Include database configuration
include_once "../config/DataBase.php";
include_once "Favorie.php";

class Visitor {

    protected function createUser($firstname, $lastname, $email, $role, $password,$image) {
        $db = DataBase::getInstance();
        $conn = $db->getConnection();
        
            // Check if email already exists
            $sql = $conn->prepare("SELECT email FROM users WHERE email = :email");
            $sql->bindParam(":email", $email, PDO::PARAM_STR);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                header("Location: ../public/signup.php?error=emailalreadyexist");
                exit();
            }

            // Hash the password
            $hashedPass = password_hash($password, PASSWORD_BCRYPT);

            // Insert new user into the database
            $insertSQL = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, role, user_image) VALUES (:firstname, :lastname, :email, :password, :role, :image)");
            $insertSQL->bindParam(":firstname", $firstname, PDO::PARAM_STR);
            $insertSQL->bindParam(":lastname", $lastname, PDO::PARAM_STR);
            $insertSQL->bindParam(":email", $email, PDO::PARAM_STR);
            $insertSQL->bindParam(":password", $hashedPass, PDO::PARAM_STR);
            $insertSQL->bindParam(":role", $role);
            $insertSQL->bindParam(":image", $image, PDO::PARAM_STR);
            // $insertSQL->execute();
            if ($insertSQL->execute()) {
                header("Location: ../public/login.php");
            } else {
                header("Location: ../public/signup.php?error=insert-failed");
            }

    }

    public function getPages(){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $rows_per_page = 3;

        $records = $conn->query("SELECT * FROM articles");
        $num_rows = $records->rowCount();

        return $pages = ceil($num_rows / $rows_per_page);
    }
     

    public function displayArticles($pages,$start){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $rows_per_page = 3;

        //number of pages

        $records = $conn->query("SELECT * FROM articles");
        $num_rows = $records->rowCount();

        if(isset($_GET["page-nb"])){
            $page = $_GET["page-nb"] - 1;
            $start = $page * $rows_per_page;
        }

        $sql = $conn->query("SELECT * FROM articles LIMIT $start ,$rows_per_page");
        return $articles = $sql -> fetchAll();
    }

    public function relatedARticles($categorie,$recentId){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();

        $sql = $conn->prepare("SELECT * FROM articles INNER JOIN categories 
        WHERE articles.categorie_id = categories.categorie_id AND categorie_name = ? AND article_id != ?");
        $sql->execute([$categorie,$recentId]);
        return $articles = $sql -> fetchAll();
    }

    public function addToFavorie(Favorie $favorie){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();
        $idArticle = $favorie->getArticleId();
        $idUser = $favorie->getVisitorId();
        try{
            $insertFav = $conn->prepare("INSERT INTO favories (user_id,article_id) VALUES($idUser,$idArticle)");
            $insertFav->execute();
        }catch(PDOException $e){
            //  die("articel already exist").$e->getMessage();
             $insertFav = null;
        }
        

    }

    public function getFavoriteArticles($idUser){
        $db = DataBase::getInstance();
        $conn = $db->getConnection();
        $getArticle = $conn->query("SELECT articles.* FROM articles INNER JOIN favories 
        ON articles.article_id = favories.article_id WHERE  favories.user_id = $idUser");
        $result = $getArticle->fetchAll();
        return $result;
    }

}
