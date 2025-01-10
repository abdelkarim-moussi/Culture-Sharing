<?php
session_start();
include_once "../classes/Author.php";
include_once "../classes/Visitor.php";

if(!isset($_SESSION["userId"])){
   header("Location: login.php");
}

if(!isset($_GET['ida']) || $_GET['ida'] == null || $_GET['ida'] === ''){
    header("Location: index.php");
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
  
  <div class="flex gap-4 items-center">
  <a href="index.php" class="hover:text-orange-400 text-sm">home</a>
  <a href="../includes/logout.inc.php" class="hover:text-orange-400 text-sm"><i class="fa-solid fa-sign-out"></i> logout</a>
  <a href="" class="hover:text-orange-400"><i class="fa-solid fa-user text-sm"></i></a>
  <button id="showFavories" class="hover:text-orange-400"><i class="fa-solid fa-heart"></i></button>
  </div>
</header>

<main class="w-full max-w-[900px] mx-auto bg-white p-5 rounded-lg shadow-md mt-[80px]">
<?php $author = new Author(); 
foreach($author->articleDetails($_GET["ida"]) as $article){
?>
    <div class="border-t border-b my-3 py-2 relative">
       <a href="../includes/article.inc.php?favId=<?php echo $article['article_id'];?>"><i class="fa-regular fa-heart text-xl hover:text-orange-400"></i></a>
    </div>
    <div>
        <img class="rounded-t-lg shadow-md h-[400px] w-full object-cover" src="../uploads/<?php echo $article['image']?>" alt="article image">
    </div>

    <article>
        <h1 class="text-[1.5rem] font-semibold capitalize my-5 text-center"><?php echo $article['title']?></h1>
        <h4 class="text-md capitalize font-semibold">categorie <span class="underline font-normal"><?php echo $article['categorie_name']?></span></h4>
        <h3 class="text-md border-b pb-2 mb-3 font-semibold">Created By <span class="text-orange-400 font-normal"><?php echo $article['firstname']." ".$article['firstname']?></span></h3>
        <p class="max-w-[800px]"><?php echo $article['content']?></p>

    </article>

    <section>
    <!-- comments form -->
        <form class="text-sm mt-20 border-t py-2" method="post" action="../includes/article.inc.php" id="comment-form">
            <label for="comment" class="font-semibold capitalize">Leave a comment</label>
            <textarea name="comment" id="comment" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
            <input type="hidden" name="articleId" value="<?php echo $article['article_id']?>">
            <button type="submit" name="subcommment" id="subcomment" class="bg-orange-400 py-2.5 px-4 mt-3 rounded-md text-white">save comment</button>
        </form>

        <div class="flex flex-col gap-4" id="comments">
            
        </div>
    </section>
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
            <div class="flex gap-4 justify-center">
              <a href="detailArticle.php?ida=<?php echo $article["article_id"];?>" class="text-sm bg-orange-400 text-white py-1 px-3 rounded-md shadow-sm hover:bg-orange-500">View Details</a>
              <a href="../includes/article.inc.php?favId=<?php echo $article['article_id'];?>" class="bg-orange-400 px-1 rounded-lg hover:bg-orange-500"><i class="fa-regular fa-heart text-xl text-white "></i></a>
            </div>
        </div>
            
        </div>
        <?php } }?>
    </div>
    <a class="underline hover:text-orange-400 cursor-pointer capitalize mx-auto" href="index.php">view more</a>
    </section>
</main>






<script>


document.addEventListener("DOMContentLoaded",function(){
    const commentForm = document.getElementById("comment-form");
    const commentsContainer = document.getElementById("comments");
    const articleId = document.querySelector("input[name='articleId']").value;
    //load comments
    loadComments();
   commentForm.addEventListener("submit",function(e){
    //   e.preventDefault();

      const formData = new FormData(commentForm);
      
      fetch("../includes/article.inc.php",{
        method : 'POST',
        body: formData
      }).then(responce =>responce.json())
      .then(data => {
        if(data.status === "success"){
            commentForm.reset();
            loadComments();
        }
        else{
            alert("error submitting data");
        }
      })
   });

function loadComments(){

fetch(`../includes/article.inc.php?fetchcomments=1&articleId=${articleId}`)
.then(responce => responce.json())
.then(comments =>{
    commentsContainer.innerHTML = "";

    comments.forEach(comment=>{
        const commentdiv = document.createElement("div");
        commentdiv.className = "text-sm shadow-md p-3 rounded-lg bg-gray-100";
        commentdiv.innerHTML = `
            <div class="flex flex-col mb-2">
               <h3 class="font-semibold capitalize"></h3>
               <h3 class="">1 year ago</h3>
            </div>
            <p class="text-sm">${comment.com_content}</p>
        `;

        commentsContainer.appendChild(commentdiv);
    });


});

}

});


</script>


<footer class="flex items-center justify-center py-4">
    <p class="text-sm">copyright reserved for CSH</p>
</footer>
</body>
</html>