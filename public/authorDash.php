<?php
session_start();

include_once "../classes/Author.php";
include_once "../classes/Admin.php";
include_once "../classes/User.php";

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
                <h4 class="text-orange-500 font-extrabold text-[1.1rem] mt-5">Culture<span class="text-[#111C2D]">/Sharing</span></h4>
            </div>
            
            <div class="py-5 dach ">
                <ul class="pl-2 flex flex-col gap-y-6">

                    <li class="toggeled-item text-sm font-semibold tracking-wide  hover:text-orange-500 flex gap-3 items-center active-btn" ><i class="fa-solid fa-list"></i><a data-id ="articles" href="#">Articles</a></li>
                    <li class="toggeled-item text-sm font-semibold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-list"></i><a data-id ="addArticle" href="#">Add Articles</a></li>
                    <li class="toggeled-item text-sm font-semibold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-user"></i><a data-id ="profile" href="#">Profile</a></li>
                    <li class="toggeled-item absolute bottom-5 text-sm font-semibold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-sign-out"></i><a href="../includes/logout.inc.php">logout</a></li>
                    
                </ul>
            </div>
            
</section>
    
<main class="w-full main-section">



<!-- Articles -->
<section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec5 articles active relative" id="articles">
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
    <button id="addnewart" class="bg-orange-200 px-3 py-1 text-sm rounded-md capitalize hover:bg-orange-300">add new article</button>
    </div>
    <table class="w-full rounded-lg text-sm">
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
                <a href="javascript:void(0);" onclick="openModal('<?php echo $article['article_id']; ?>','<?php echo $article['title']; ?>','<?php echo $article['content']; ?>')" class="bg-yellow-100 hover:bg-yellow-200 rounded-md py-1 px-3">update</a>
                <a href="../includes/article.inc.php?idart=<?php echo $article['article_id']; ?>" class="bg-red-100 hover:bg-red-200 rounded-md py-1 px-3">delete</i></a>
              </td>
            </tr>
         <?php }?>
         </tbody>
      </table>
    
    
    <!-- update article -->
    <div class="w-full hidden bg-white rounded-lg shadow-lg dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 absolute top-5" id="updateArtModal">
        <img src="../public/assets/imgs/close.png" alt="" class="w-[30px] float-right m-3 cursor-pointer" onclick="closeArtModal()" id="closeUpCatModal">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl border-b pb-3 text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                 Update article
              </h1>
    
            <form class="space-y-4 md:space-y-6 text-sm" action="../includes/article.inc.php" method="post" id="">

                 <div>
                      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">title</label>
                      <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 </div>
                 <div>
                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">content</label>
                    <textarea name="content" id="content" class="h-[150px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                 </div>
                 <div>
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">image</label>
                    <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 </div>

                    <input type="hidden" name="artId" id="artId">

                  <button type="submit" name="update-article" id="update-article" class="w-full uppercase tracking-wide text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">update Article</button>
        
            </form>

          </div>
    </div>

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
                    <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
<?php
      $user = new User();
      $userInfo = $user->UserInfo($_SESSION["userId"]);
?>
   <div class="flex flex-col gap-2 border-t border-1 py-5 px-10 shadow-md rounded-md text-sm">
        <img src="../profile-imgs/<?php echo $userInfo["user_image"]; ?>" alt="author image" class="w-[80px] h-[80px] p-2 rounded-full object-cover">
        <p>firstname : <span class="font-semibold"><?php echo $userInfo["firstname"]; ?></span></p>
        <p>lastname : <span class="font-semibold"><?php echo $userInfo["lastname"]; ?></span></p>
        <p>email : <span class="font-semibold"><?php echo $userInfo["email"]; ?></span></p>
        <p>role : <span class="font-semibold"><?php echo $userInfo["role"]; ?></span></p>
        <button type="button" id="booking-btn" onclick="infoModal('<?php echo $userInfo['firstname']; ?>','<?php echo $userInfo['lastname']; ?>','<?php echo $userInfo['email']; ?>')" class="rounded-md bg-orange-400 hover:bg-orange-500 text-white w-[200px] uppercase px-3 py-1 my-4">edit info</button>
   </div>
 <?php ?>


 <!-- update info -->
 <div class="w-full hidden bg-white rounded-lg shadow-lg dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 absolute top-5" id="profileModal">
        <img src="../public/assets/imgs/close.png" alt="" class="w-[30px] float-right m-3 cursor-pointer" onclick="closeInfoModal()">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl border-b pb-3 text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                 Update Inormations
              </h1>
    
            <form class="space-y-4 md:space-y-6 text-sm" action="../includes/updateUser.inc.php" method="post" id="" enctype="multipart/form-data">

                 <div>
                      <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">firstname</label>
                      <input type="text" name="fname" id="fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 </div>
                 <div>
                    <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">lastname</label>
                    <textarea name="lname" id="lname" class="h-[150px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                 </div>
                 <div>
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">image</label>
                    <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 </div>
                 <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 </div>

                    <input type="hidden" name="userId" id="userId">

                  <button type="submit" name="update-user" id="update-info" class="w-full uppercase tracking-wide text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">update Article</button>
        
            </form>

          </div>
    </div>
</section>

  </main>

<script>

const artModal = document.getElementById("updateArtModal");
const profileModal = document.getElementById("profileModal");
var artId;
var title;
var content;
var image;

function openModal(artId,title,content){

    artModal.classList.remove("hidden");

   document.getElementById("title").value = title;
   document.getElementById("content").textContent = content;
   document.getElementById("artId").value = artId;

}

function closeArtModal(){
    artModal.classList.add("hidden");
}


function infoModal(fname,lname,email){

profileModal.classList.remove("hidden");

document.getElementById("fname").value = fname;
document.getElementById("lname").value = lname;
document.getElementById("email").value = email;
document.getElementById("userId").value = userId;

}


function closeInfoModal(){

profileModal.classList.add("hidden");

}
</script>



<script src="assets/js/script.js?v=<?php echo time(); ?>"></script>
    
</body>
</html>