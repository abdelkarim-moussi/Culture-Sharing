<?php
session_start();

include_once "../classes/Categorie.php";
include_once "../classes/Admin.php";


if($_SERVER['REQUEST_METHOD'] === "POST"){

    $catName = $_POST["cat-name"];
    $catDesc = $_POST["cat-description"];

    if(isset($catName) && isset($catDesc)){
        
        $categorie = new Categorie($catName,$catDesc);
        $adm = new Admin();
        $adm -> createCategorie($categorie);

        header("Location: ../public/adminDash.php");

    }
   

}

if(isset($_GET["idcat"])){

    $catId = $_GET["idcat"];
    $adm = new Admin();
    $adm->deleteCategorie($catId);
}
