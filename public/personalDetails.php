<?php
session_start();

include_once "../classes/Author.php";
include_once "../classes/Admin.php";
include_once "../classes/User.php";

if(isset($_SESSION['userId'])){
    if($_SESSION['urole'] === "admin"){
        header("Location: adminDash.php");
    }
    elseif($_SESSION['urole'] === "author"){
        header("Location: authorDash.php");

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


<header class="header w-full max-w-[900px] fixed mx-auto bg-white py-3 px-5 rounded-lg shadow-md flex items-center justify-between left-[50%] translate-x-[-50%]">
  <h1 class="text-orange-400 font-semibold text-[1.1rem] capitalize">Culutre/<span class="text-[#111C2D]">Sharing</span></h1>
  
  <div class="flex gap-4 items-center">
  <a href="index.php" class="hover:text-orange-400 text-sm">home</a>
  <a href="../includes/logout.inc.php" class="hover:text-orange-400 text-sm"><i class="fa-solid fa-sign-out"></i> logout</a>
  <a href="" class="hover:text-orange-400"><i class="fa-solid fa-user text-sm"></i></a>
  <button id="showFavories" class="hover:text-orange-400"><i class="fa-solid fa-heart"></i></button>
  </div>
</header>


<!-- pesonal info -->
<section class="w-full text-[#111C2D] bg-white rounded-lg shadow-md max-w-[900px] mt-[80px] mx-auto" >

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

const profileModal = document.getElementById("profileModal");

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



<script src="assets/js/script.js?v=<?php echo time(); ?>"></script>
    
</body>
</html>