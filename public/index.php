<?php 
session_start();
include_once "../classes/visitor.php";
include_once "../classes/Admin.php";

if($_SESSION["urole"] === "author"){
    header("Location:authorDash.php");
}
elseif($_SESSION["urole"] === "admin"){
    header("Location:adminDash.php");
}
// else  header("Location:index.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <title>Culture Sharing</title>
</head>
<body class="px-4 pt-3 bg-[#F0F5F9] flex flex-col gap-5 relative">

<header class="header w-full max-w-[900px] fixed mx-auto bg-white py-3 px-5 rounded-lg shadow-md flex items-center justify-between left-[50%] translate-x-[-50%]">
  <h1 class="text-orange-400 font-semibold text-[1.1rem] capitalize">Culutre/<span class="text-[#111C2D]">Sharing</span></h1>
  
  <div class="flex gap-4 items-center">
  <a href="../includes/logout.inc.php" class="hover:text-orange-400 text-sm"><i class="fa-solid fa-sign-out"></i> logout</a>
  <a href="" class="hover:text-orange-400"><i class="fa-solid fa-user text-sm"></i></a>
  <button id="showFavories" class="hover:text-orange-400"><i class="fa-solid fa-heart"></i></button>
  </div>
</header>

<main class="w-full flex flex-col gap-5 max-w-[900px] mx-auto bg-white p-5 rounded-lg shadow-md mt-[80px]">
    <div class="flex gap-3 items-center border-b pb-3">
        <Label for="categorief">Filter by categorie</Label>
        <select name="categorief" id="" class="bg-gray-100 text-sm w-[200px] rounded-md shadow-sm p-0.5">
            <?php $adm = new Admin();
             foreach($adm->showCategories()as $categorie){
            ?>
            <option value="<?php echo $categorie["categorie_name"]; ?>"><?php echo $categorie["categorie_name"]; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
        <?php $visitor = new Visitor();
        foreach($visitor->displayArticles() as $article){
         ?>
        <div class="rounded-lg shadow-md flex flex-col gap-2 text-center">
            <img class="w-full h-[200px] rounded-t-lg" src="../uploads/<?php echo $article["image"];?>" alt="article image">
            <div class="p-3">
              <h3 class="font-semibold text-orange-400 text-md capitalize"><?php echo $article["title"];?></h3>
              <p class="mb-2 text-sm"><?php echo substr($article["content"],0,50);?></p>
              <div class="flex gap-4 justify-center">
              <a href="detailArticle.php?ida=<?php echo $article["article_id"];?>" class="text-sm bg-orange-400 text-white py-1 px-3 rounded-md shadow-sm hover:bg-orange-500">View Details</a>
              <a href="../includes/article.inc.php?favId=<?php echo $article['article_id'];?>" class="bg-orange-400 px-1 rounded-lg hover:bg-orange-500"><i class="fa-regular fa-heart text-xl text-white "></i></a>
              </div>
            </div>
            <!-- <a href="" class="mb-5 underline text-[1rem] hover:text-orange-400 capitalize">view details</a> -->
        </div>
        <?php } ?>
    </div>
</main>

<section id="favorie" class="w-[90%] lg:w-[30%] bg-gray-100 h-full fixed right-[100%] shadow-md overflow-auto">
   <button type="button" id="close-fav-md" class="mb-5"><i class="fa-solid fa-close text-xl hover:text-orange-400"></i></button>
   <div class="grid grid-cols-1 gap-5">
   <?php 
        $vis = new Visitor();
        $idUser = $_SESSION['userId'];
        if(count($vis->getFavoriteArticles($idUser)) == 0){
         $res = "aucun article au favoris";
         echo "<h1 class='text-center capitalize font-semibold'>$res</h1>";
        }
        else {
            $res = $vis->getFavoriteArticles($idUser);
        
        foreach($res as $art){
         ?>
        <div class="rounded-lg shadow-md flex flex-col gap-2 text-center">
            <img class="w-full h-[200px] rounded-t-lg" src="../uploads/<?php echo $art["image"];?>" alt="article image">
            <div class="p-3">
              <h3 class="font-semibold text-orange-400 text-md capitalize"><?php echo $art["title"];?></h3>
              <p class="mb-2 text-sm"><?php echo substr($art["content"],0,50);?></p>
              <div class="flex gap-4 justify-center">
              <a href="detailArticle.php?ida=<?php echo $art["article_id"];?>" class="text-sm bg-orange-400 text-white py-1 px-3 rounded-md shadow-sm hover:bg-orange-500">View Details</a>
              <a href="../includes/article.inc.php?favId=<?php echo $art['article_id'];?>" class="bg-orange-400 px-1 rounded-lg hover:bg-orange-500"><i class="fa-regular fa-heart text-xl text-white "></i></a>
              </div>
            </div>
            <!-- <a href="" class="mb-5 underline text-[1rem] hover:text-orange-400 capitalize">view details</a> -->
        </div>
        <?php } }?>
   </div>
</section>



<script>
    const closeFavMod = document.getElementById("close-fav-md");
    const favModal = document.getElementById("favorie");
    const openFavorie = document.getElementById("showFavories");

    openFavorie.addEventListener("click",()=>{
        favModal.style.right = '0';
        console.log("clicked");
    })
    closeFavMod.addEventListener("click",()=>{
        // favModal.classList.add("hidden");
        favModal.style.right = '100%';
    })

</script>
</body>
</html>