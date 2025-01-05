<?php
session_start();
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
<body class="px-4 bg-[#F0F5F9] flex flex-col gap-5 relative">

<header class="header w-full max-w-[900px] fixed mx-auto bg-white py-3 px-5 rounded-lg shadow-md flex items-center justify-between left-[50%] translate-x-[-50%]">
  <h1 class="text-orange-400 font-semibold text-[1.2rem] capitalize">Culutre/<span class="text-[#111C2D]">Sharing</span></h1>
  <a href="../includes/logout.inc.php" class="hover:text-orange-400"><i class="fa-solid fa-sign-out"></i> logout</a>
</header>

<main class="w-full max-w-[900px] mx-auto bg-white p-5 rounded-lg shadow-md mt-[80px]">
    <div>
        <img class="rounded-t-lg shadow-md h-[400px] w-full object-cover" src="assets/imgs/img1.jpg" alt="article image">
    </div>

    <article>
        <h1 class="text-[1.8rem] capitalize">Article Title</h1>
        <h4 class="text-[1.2rem] capitalize">categorie <span class="underline">musique</span></h4>
        <h3 class="text-[1.1rem] border-b pb-2 mb-3">Created By <span class="text-orange-400">author name</span></h3>
        <p class="max-w-[800px]">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque totam, optio culpa enim magnam ipsa officiis aliquid dignissimos odit reprehenderit ipsum numquam sunt quas suscipit minus aperiam repellendus animi nostrum quaerat maxime, eligendi doloribus itaque? Ullam explicabo ipsam quibusdam fugiat ipsa nostrum! Dolorem nisi quas aliquid magni? Quo praesentium ipsam non enim quos inventore voluptas numquam a autem, quisquam ea nihil laborum sunt deserunt in dolore quasi! Deleniti incidunt obcaecati sequi natus dolorem temporibus optio magnam repudiandae neque iure, nisi reprehenderit alias et accusantium eius odio asperiores fuga atque animi modi. Ullam deleniti non fuga dignissimos quia aliquid commodi enim rerum sunt et nam incidunt id illum autem eum dolores delectus dolor, veniam omnis sed magni. Pariatur, expedita vero veniam ex reprehenderit dolorum dignissimos ut vel assumenda recusandae facere sed nam molestias voluptas dolore quod explicabo saepe quam excepturi quo ea odit perferendis. Voluptas nemo, ducimus, minima distinctio eius magnam, modi architecto non commodi nam illo? Adipisci eum odit modi praesentium pariatur nemo nulla deserunt minima possimus, commodi, iste voluptas ex autem ipsa iure quidem quaerat accusamus. Ratione nesciunt rerum sequi doloremque deleniti minima sint ea, corporis distinctio placeat fugiat asperiores molestiae vel, suscipit officiis error quo facere, iste rem? Unde ratione quod dolor molestias optio ipsam tempora amet nostrum, labore est sunt beatae perferendis autem, eum, id voluptates laboriosam deleniti voluptatibus cumque non ullam sequi fugiat! Doloribus, nulla modi? Officia repudiandae aut voluptas animi quia, nulla iusto saepe aspernatur laborum distinctio tempora quam cupiditate modi eligendi, amet quod! Sequi sint repellendus dolore suscipit inventore, perspiciatis expedita saepe deserunt, atque modi debitis dolores temporibus totam eum, eligendi quaerat impedit delectus? Officia facilis, eaque aperiam eveniet possimus veniam impedit exercitationem voluptate enim. Porro vel maiores quisquam sit cumque dolores reiciendis? Repudiandae, sit rerum quas doloribus, laborum dolorum vitae error, ipsa vel corporis soluta dolorem quos? Sint debitis aliquid illo eligendi officiis voluptatibus beatae animi necessitatibus fugit nobis eaque exercitationem quam corrupti quas, hic dolores et tenetur omnis odit ratione vitae consequatur. Minus mollitia dolore labore obcaecati natus, quos veniam culpa, officiis quo qui consectetur vel. Ducimus tenetur libero, quibusdam qui laudantium ipsa enim possimus consequatur aspernatur nostrum praesentium, rerum, fugit omnis! Tenetur rem soluta impedit cumque enim, numquam alias dicta modi quaerat quos, quae mollitia minus a molestias provident officiis beatae deleniti fugiat blanditiis. Sit, fugit ea hic dolorum beatae expedita cum officia consectetur excepturi quidem debitis iusto est corporis cumque placeat soluta unde minus aspernatur! Nesciunt rem quod magnam voluptas excepturi aspernatur velit tempore tenetur ut accusantium suscipit nobis cum, laboriosam maiores placeat. Cum quam asperiores voluptates quaerat dolorem, alias obcaecati voluptatem ad tenetur minus non consequuntur voluptas fuga inventore magnam deserunt mollitia amet neque eligendi laudantium dignissimos. Non totam error nemo, maiores sequi similique ex. Quibusdam doloremque ex tempore tempora exercitationem eum enim! Beatae accusamus sequi quaerat suscipit cum, rerum eveniet dolorem. Dolores optio accusantium exercitationem aspernatur quidem? Odio sed aliquid, praesentium iusto ut repellendus a maxime in suscipit obcaecati. Et nostrum, sit architecto harum aliquid illum iusto laborum.</p>
    </article>

    <section class="border-t mt-5 flex flex-col gap-5">
        <h1 class="text-[1.5rem] capitalize trucking-wide">Related Articles</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
        
        <div class="rounded-lg shadow-md flex flex-col gap-2 text-center">
            <img class="w-full rounded-t-lg" src="assets/imgs/img1.jpg" alt="article image">
            <h3 class="text-[1.1rem] hover:text-orange-400"><a href="detailArticle.php">Article Title</a></h3>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
        </div>
    </div>
    <a class="underline hover:text-orange-400 cursor-pointer capitalize mx-auto" href="index.php">view more</a>
    </section>
</main>


<footer class="flex items-center justify-center py-4">
    <p class="text-sm">copyright reserved for CSH</p>
</footer>
</body>
</html>