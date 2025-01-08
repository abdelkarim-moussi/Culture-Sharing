<?php
session_start();

include_once "../classes/Categorie.php";
include_once "../classes/Admin.php";


if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST["addCat"])){
        $catName = $_POST["cat-name"];
    $catDesc = $_POST["cat-description"];

    if(isset($catName) && isset($catDesc)){
        
        $categorie = new Categorie($catName,$catDesc);
        $adm = new Admin();
        $adm -> createCategorie($categorie);

        header("Location: ../public/adminDash.php");

    }
    }

}

//delete categorie
if(isset($_GET["idcat"])){

    $catId = $_GET["idcat"];
    $adm = new Admin();
    $adm->deleteCategorie($catId);
}

//update categorie
if(isset($_POST["update-categorie"])){
    
    $categorieId = $_POST["catId"];
    $categorieName = $_POST["catName"];
    $categorieDesc = $_POST["catDes"];

    if(isset($categorieId) && isset($categorieName) && isset($categorieDesc)){
        
        $adm = new Admin();
        $adm->UpdateCategorie($categorieId,$categorieName,$categorieDesc);

        header("Location: ../public/adminDash.php");
    }
    else echo "error";
    
}
