<?php
session_start();
include_once "../classes/Author.php";
include_once "../classes/Visitor.php";

if(!isset($_SESSION["userId"])){
   header("Location: login.php");
}
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
  <a href="../includes/logout.inc.php" class="hover:text-orange-400 text-sm"><i class="fa-solid fa-sign-out"></i> logout</a>
</header>

<main class="w-full max-w-[900px] mx-auto bg-white p-5 rounded-lg shadow-md mt-[80px]">
<?php $author = new Author(); 
foreach($author->articleDetails($_GET["ida"]) as $article){
?>
    <div>
        <img class="rounded-t-lg shadow-md h-[400px] w-full object-cover" src="../uploads/<?php echo $article['image']?>" alt="article image">
    </div>

    <article>
        <h1 class="text-[1.5rem] font-semibold capitalize my-5 text-center"><?php echo $article['title']?></h1>
        <h4 class="text-md capitalize font-semibold">categorie <span class="underline font-normal"><?php echo $article['categorie_name']?></span></h4>
        <h3 class="text-md border-b pb-2 mb-3 font-semibold">Created By <span class="text-orange-400 font-normal"><?php echo $article['firstname']." ".$article['firstname']?></span></h3>
        <p class="max-w-[800px]"><?php echo $article['content']?></p>
    </article>
<?php } ?>
    <section class="border-t mt-5 flex flex-col gap-5">
        <h1 class="text-[1.5rem] capitalize trucking-wide">Related Articles</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
        <?php $visitor = new Visitor();
        $author = new Author(); 
        foreach($author->articleDetails($_GET["ida"]) as $art){
        foreach($visitor->relatedARticles($art["categorie_name"],$_GET["ida"]) as $article){
         ?>
        <div class="rounded-lg shadow-md flex flex-col gap-2 text-center">
            <img class="w-full h-[200px] rounded-t-lg" src="../uploads/<?php echo $article["image"] ?>" alt="article image">
            <div class="p-3">
            <h3 class="font-bold text-orange-400 text-md capitalize"><?php echo $article["title"];?></h3>
            <p class="mb-2 text-sm"><?php echo substr($article["content"],0,50);?></p>
            <a href="detailArticle.php?ida=<?php echo $article["article_id"];?>" class="text-md bg-orange-400 text-white py-1 px-3 rounded-md shadow-sm hover:bg-orange-500">View Details</a>
            </div>
            <!-- <a href="" class="mb-5 underline text-[1rem] hover:text-orange-400 capitalize">view details</a> -->
        </div>
        <?php } }?>
    </div>
    <a class="underline hover:text-orange-400 cursor-pointer capitalize mx-auto" href="index.php">view more</a>
    </section>
</main>


<footer class="flex items-center justify-center py-4">
    <p class="text-sm">copyright reserved for CSH</p>
</footer>
</body>
</html>