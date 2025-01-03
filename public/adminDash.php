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
                <h4 class="text-orange-500 font-extrabold text-[1.2rem] mt-5">Culture<span class="text-[#111C2D]">/Sharing</span>
                </h4>
            </div>
            
            <div class="py-5 dach">
                <ul class="pl-2 flex flex-col gap-y-6">
                    <li class="toggeled-item text-[1rem] font-bold tracking-wide  hover:text-orange-500 flex gap-3 items-center active-btn" ><i class="fa-solid fa-gauge"></i><a data-id ="categories" href="#">Categories</a></li>
                    <li class="toggeled-item text-[1rem] font-bold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-list-check"></i><a data-id ="addCategorie" href="#">Add Categorie</a></li>
                    <li class="toggeled-item text-[1rem] font-bold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-users-gear"></i><a data-id ="authors" href="#">Authors</a></li>
                    <li class="toggeled-item text-[1rem] font-bold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-users-gear"></i><a data-id ="visitors" href="#">Visitors</a></li>
                    <li class="toggeled-item text-[1rem] font-bold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-list"></i><a data-id ="articles" href="#">Articles</a></li>
                    <li class="toggeled-item absolute bottom-5 text-[1rem] font-semibold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-sign-out"></i><a href="../includes/logout.php">logout</a></li>
                </ul>
            </div>
            
</section>
    
<main class="w-full main-section">

<!-- categories -->
    <section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec1 categories active" id="categories">
        <div class="border-b pb-2 flex justify-between items-center mb-5">
            <h1 class="text-lg mb-5 capitalize">Disponible categories</h1>
            <button id="addnewcat" class="bg-orange-200 px-5 py-2 rounded-md capitalize hover:bg-orange-300">add new categorie</button>
        </div>

        <table class="w-full rounded-lg">
         <thead>
            <tr class="text-[#686a6d] capitalize">
            <th class="font-normal">Categorie Id</th>
            <th class="font-normal">Categorie name</th>
            <th class="font-normal">number of articles</th>
            <th class="font-normal">Actions</th>
            </tr>
         </thead>
         <tbody>
         
            <tr>
              <td class="font-normal">
                 1
              </td>
              <td class="font-normal">
                  categorie 1
              </td>
              <td class="font-normal">
                   20
              </td>
              <td class="font-normal flex justify-center gap-3">
                <a href="" class="bg-orange-100 hover:bg-orange-200 rounded-md py-1 px-3">update</a>
                <a href="" class="bg-red-100 hover:bg-red-200 rounded-md py-1 px-3">delete</i></a>
              </td>

            </tr>
         
         </tbody>
      </table>

    </section>

<!-- Add Categorie section -->
    <section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec2" id="addCategorie">
    <h1 class="text-lg mb-5 border-b pb-5 capitalize">Add new categorie</h1>
    <form class="space-y-4 md:space-y-6" action="/" method="post" id="signup-form" enctype="multipart/form-data">
                 <div>
                      <label for="cat-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">categorie name</label>
                      <input type="text" name="cat-name" id="cat-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="categorie example">
                  </div>
                 <div>
                    <label for="cat-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">categorie description</label>
                    <textarea name="cat-description" id="cat-description" class="h-[150px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="categorie..."></textarea>
                    <div class="error text-sm text-red-600"></div>
                </div>
            
                
                  <button type="submit" id="add-cat" class="w-full uppercase tracking-wide text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Add Categorie</button>
        
            </form>
    </section>

<!-- Authors list -->
    <section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec3 authors" id="authors">
    <h1 class="text-lg mb-5 border-b pb-5 capitalize">Disponible authors</h1>

    <table class="w-full rounded-lg">
         <thead>
            <tr class="text-[#686a6d] capitalize">
            <th class="font-normal">Author Id</th>
            <th class="font-normal">Author name</th>
            <th class="font-normal">Email</th>
            <th class="font-normal">articles</th>
            </tr>
         </thead>
         <tbody>
         
            <tr>
              <td class="font-normal">
                 1
              </td>
              <td class="font-normal">
                  author name
              </td>
              <td class="font-normal">
                  author email
              </td>
              <td class="font-normal">
                  4
              </td>
            
            </tr>
         
         </tbody>
      </table>
    
    </section>

<!-- Visitors List -->
<section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec4 visitors" id="visitors">
    <h1 class="text-lg mb-5 border-b pb-5 capitalize">Disponible visitors</h1>

    <table class="w-full rounded-lg">
         <thead>
            <tr class="text-[#686a6d] capitalize">
            <th class="font-normal">visitor Id</th>
            <th class="font-normal">visitor name</th>
            <th class="font-normal">Email</th>
            </tr>
         </thead>
         <tbody>
         
            <tr>
              <td class="font-normal">
                 1
              </td>
              <td class="font-normal">
                  visitor name
              </td>
              <td class="font-normal">
                  visitor email
              </td>

            </tr>
         
         </tbody>
      </table>
    
    </section>


<!-- Articles -->
<section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec5 articles" id="articles">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 mb-5 gap-5">
        <div class="flex flex-col rounded-lg shadow-md px-5 py-6 gap-3">
            <div class="flex gap-3 items-center">
                <div class="bg-blue-100 w-[50px] h-[50px] rounded-lg"></div>
                <h3 class="text-[2rem]">10</h3>
            </div>
            <h3>all articles</h3>
        </div>

        <div class="flex flex-col rounded-lg shadow-md px-5 py-6 gap-3">
            <div class="flex gap-3 items-center">
                <div class="bg-green-100 w-[50px] h-[50px] rounded-lg"></div>
                <h3 class="text-[2rem]">5</h3>
            </div>
            <h3>accepted articles</h3>
        </div>

        <div class="flex flex-col rounded-lg shadow-md px-5 py-6 gap-3">
            <div class="flex gap-3 items-center">
                <div class="bg-orange-100 w-[50px] h-[50px] rounded-lg"></div>
                <h3 class="text-[2rem]">1</h3>
            </div>
            <h3>pending articles</h3>
        </div>

        <div class="flex flex-col rounded-lg shadow-md px-5 py-6 gap-3">
            <div class="flex gap-3 items-center">
                <div class="bg-red-100 w-[50px] h-[50px] rounded-lg"></div>
                <h3 class="text-[2rem]">3</h3>
            </div>
            <h3>my articles</h3>
        </div>
    </div>
    <h1 class="text-lg mb-5 border-b pb-5 capitalize">My disponible articles</h1>

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
         
            <tr>
              <td class="font-normal">
                 1
              </td>
              <td class="font-normal">
                  article title
              </td>
              <td class="font-normal">
                  author name
              </td>
              <td class="font-normal">
                  <p class="bg-blue-50 rounded-md">status</p>
              </td>
              <td class="font-normal flex justify-center gap-3">
                <a href="" class="bg-green-100 hover:bg-green-200 rounded-md py-1 px-3">accept</a>
                <a href="" class="bg-orange-100 hover:bg-orange-200 rounded-md py-1 px-3">refuse</i></a>
              </td>
            </tr>
         
         </tbody>
      </table>
    
    </section>

    <!-- author profile -->
    <section>
       
    </section>
    

  </main>





<script src="assets/js/script.js?v=<?php echo time(); ?>"></script>
    
</body>
</html>