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
  <a href="../includes/logout.php" class="hover:text-orange-400"><i class="fa-solid fa-sign-out"></i> logout</a>
</header>

<main class="w-full flex flex-col gap-5 max-w-[900px] mx-auto bg-white p-5 rounded-lg shadow-md mt-[80px]">
    <div class="flex gap-3 items-center border-b pb-3">
        <Label for="categorief">Filter by categorie</Label>
        <select name="categorief" id="" class="bg-gray-100 text-sm w-[200px] rounded-md shadow-sm p-0.5">
            <option value="musique">musique</option>
        </select>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
        <div class="rounded-lg shadow-md flex flex-col gap-2 text-center">
            <img class="w-full rounded-t-lg" src="assets/imgs/img1.jpg" alt="article image">
            <h3 class="text-[1.1rem] hover:text-orange-400"><a href="/">Article Title</a></h3>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            <!-- <a href="" class="mb-5 underline text-[1rem] hover:text-orange-400 capitalize">view details</a> -->
        </div>
        
    </div>
</main>
</body>
</html>