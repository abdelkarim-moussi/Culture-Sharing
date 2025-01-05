<?php
session_start();

include_once "../classes/Author.php";
include_once "../classes/Admin.php";

if(isset($_SESSION['userId'])){
    if($_SESSION['urole'] === "admin"){
        header("Location: adminDash.php");
    }
    elseif($_SESSION['urole'] === "visitor"){
        header("Location: index.php");

    }
    
}
else header("Location: login.php");

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

<body class="flex bg-[#F0F5F9] p-4 relative gap-5">

<!-- <button id="menu-button" type="button" class="text-[#111C2D] z-20 px-1 rounded absolute top-5 left-6 hover:text-orange-500"><i class="fa-solid fa-bars text-xl"></i></button> -->
<section id="nav-bar" class="px-3 text-[#111C2D] h-[95vh] w-[250px] bg-white notActive rounded-lg shadow-md">
            <div class="flex items-center justify-center py-2 border-b-[1px] border-gray-300">
                <h4 class="text-orange-500 font-extrabold text-[1.2rem] mt-5">Culture<span class="text-[#111C2D]">/Sharing</span></h4>
            </div>
            
            <div class="py-5 dach ">
                <ul class="pl-2 flex flex-col gap-y-6">

                    <li class="toggeled-item text-[1rem] font-semibold tracking-wide  hover:text-orange-500 flex gap-3 items-center active-btn" ><i class="fa-solid fa-list"></i><a data-id ="articles" href="#">Articles</a></li>
                    <li class="toggeled-item text-[1rem] font-semibold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-list"></i><a data-id ="addArticle" href="#">Add Articles</a></li>
                    <li class="toggeled-item text-[1rem] font-semibold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-user"></i><a data-id ="profile" href="#">Profile</a></li>
                    <li class="toggeled-item absolute bottom-5 text-[1rem] font-semibold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-sign-out"></i><a href="../includes/logout.inc.php">logout</a></li>
                    
                </ul>
            </div>
            
</section>
    
<main class="w-full main-section">



<!-- Articles -->
<section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec5 articles active" id="articles">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 mb-5 gap-5">
        <div class="flex flex-col rounded-lg shadow-md px-5 py-6 gap-3">
            <div class="flex gap-3 items-center">
                <div class="bg-blue-100 w-[50px] h-[50px] rounded-lg"></div>
                <?php
                $author = new Author();
                foreach($author->countNumARt() as $numARt){ ?>
                <h3 class="text-[2rem]"><?php echo $numARt["numArt"];?></h3>
                <?php } ?>
            </div>
            <h3>My articles</h3>
        </div>

        <div class="flex flex-col rounded-lg shadow-md px-5 py-6 gap-3">
            <div class="flex gap-3 items-center">
                <div class="bg-green-100 w-[50px] h-[50px] rounded-lg"></div>
                <?php
                $author = new Author();
                foreach($author->showNumArtByStat("accepted") as $artNum){ ?>
                <h3 class="text-[2rem]"><?php echo $artNum["numart"];?></h3>
                <?php } ?>
            </div>
            <h3>accepted articles</h3>
        </div>

        <div class="flex flex-col rounded-lg shadow-md px-5 py-6 gap-3">
            <div class="flex gap-3 items-center">
                <div class="bg-orange-100 w-[50px] h-[50px] rounded-lg"></div>
                <?php
                $author = new Author();
                foreach($author->showNumArtByStat("pending") as $artNum){ ?>
                <h3 class="text-[2rem]"><?php echo $artNum["numart"];?></h3>
                <?php } ?>
            </div>
            <h3>pending articles</h3>
        </div>

        <div class="flex flex-col rounded-lg shadow-md px-5 py-6 gap-3">
            <div class="flex gap-3 items-center">
                <div class="bg-red-100 w-[50px] h-[50px] rounded-lg"></div>
                <?php
                $author = new Author();
                 foreach($author->showNumArtByStat("refused") as $artNum){ ?>
                <h3 class="text-[2rem]"><?php echo $artNum["numart"];?></h3>
                <?php } ?>
            </div>
            <h3>refused articles</h3>
        </div>
    </div>

    <div class="flex items-enter justify-between mb-5 border-b pb-5">
    <h1 class="text-lg capitalize">Disponible articles</h1>
    <button id="addnewart" class="bg-orange-200 px-5 py-2 rounded-md capitalize hover:bg-orange-300">add new article</button>
    </div>
    <table class="w-full rounded-lg">
         <thead>
            <tr class="text-[#686a6d] capitalize">
               <th class="font-normal">article Id</th>
               <th class="font-normal max-w-[200px]">article title</th>
               <th class="font-normal">author name</th>
               <th class="font-normal">status</th>
               <th class="font-normal">actions</th>
            </tr>
         </thead>
         <tbody>
         <?php 
         $author = new Author();
         $result = $author->showArticles();
         foreach($result as $article){
         ?>
            <tr>
              <td class="font-normal">
                 <?php echo $article["article_id"] ?>
              </td>
              <td class="font-normal">
              <?php echo $article["title"] ?>
              </td>
              <td class="font-normal">
              <?php echo $article["firstname"]." ".$article["lastname"] ?>
              </td>
              <td class="font-normal">
                  <p class="bg-blue-50 rounded-md"><?php echo $article["status"] ?></p>
              </td>
              <td class="font-normal flex justify-center gap-3">
                <a href="" class="bg-yellow-100 hover:bg-yellow-200 rounded-md py-1 px-3">edit</a>
                <a href="../includes/article.inc.php?idart=<?php echo $article['article_id']; ?>" class="bg-red-100 hover:bg-red-200 rounded-md py-1 px-3">delete</i></a>
              </td>
            </tr>
         <?php }?>
         </tbody>
      </table>
    
    </section>
    
<!-- Add Article section -->
<section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec7" id="addArticle">
    <h1 class="text-lg mb-5 border-b pb-5 capitalize">Add new article</h1>
    <form class="space-y-4 md:space-y-6" action="../includes/article.inc.php" method="POST" id="signup-form" enctype="multipart/form-data">
                 <div>
                      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                      <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="article name">
                  </div>
                 <div>
                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                    <textarea name="content" id="content"  class="h-[200px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="article content..."></textarea>
                    <div class="error text-sm text-red-600"></div>
                </div>
                 <div>
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">image</label>
                    <input type="file" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div class="error text-sm text-red-600"></div>
                </div>
            
                <div>
                      <label for="categorie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorie</label>
                      <select name="categorie" id="categorie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <?php 
                      $adm = new Admin();
                      foreach($adm->showCategories() as $cat){
                      ?>  
                      <option value="<?php echo $cat["categorie_name"];?>"><?php echo $cat["categorie_name"] ;?></option>
                      <?php } ?>

                      </select>
                  </div>
                
                  <button type="submit" name="add-art" id="add-art" class="w-full uppercase tracking-wide text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Add Article</button>
        
            </form>
    </section>

<!-- pesonal info -->
<section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec6 profile" id="profile">

<h1 class="text-lg mb-5 border-b pb-5 capitalize">My personal informations </h1>

   <div class="flex flex-col gap-2 border-t border-1 py-5 px-10 shadow-md rounded-md">
        <p>furstname : <span class="font-semibold"></span></p>
        <p>lastname : <span class="font-semibold"></span></p>
        <p>email : <span class="font-semibold"></span></p>
        <button type="button" id="booking-btn" class="rounded-md bg-orange-400 hover:bg-orange-500 text-white w-[200px] uppercase px-6 py-1 my-4">edit info</button>
   </div>
 
</section>

  </main>





<script src="assets/js/script.js?v=<?php echo time(); ?>"></script>
    
</body>
</html>