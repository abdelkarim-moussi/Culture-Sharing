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
                    
                </ul>
            </div>
            
</section>
    
<main class="w-full main-section">

<!-- categories -->
    <section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec1 categories active" id="categories">
        <div class="border-b pb-2 flex justify-between items-center">
        <h1 class="text-lg mb-5">Disponible categories</h1>
        <button class="bg-orange-200 px-5 py-2 rounded-md capitalize hover:bg-orange-300">add new categorie</button>
        </div>
        <table class="w-full">
         <thead>
            <tr class="text-white uppercase">
            <th>Membre ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Télephone</th>
            <th>Edit Member</th>
            <th>Delete Member</th>
            </tr>
         </thead>
         <tbody>
         
            <tr>
              <td>
                 
              </td>
              <td>
                  
              </td>
              <td>
                  
              </td>
              <td>
                  
              </td>
              <td>
                  
              </td>
              <td><a href="" class="fa-solid fa-edit text-yellow-400"></i></a></td>
              <td><a href=""><i class="fa-solid fa-trash text-red-600"></i></a></td>
            </tr>
         
           
         </tbody>
      </table>

    </section>

<!-- Members section -->
    <section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec2" id="addCategorie">
        <h1 class="text-center pt-5 pb-2 font-extrabold text-3xl">List of existing members</h1>
        <div class="w-[300px] h-[2px] bg-gray-400 mx-auto mb-10"></div>
    <table class="w-full">
         <thead>
            <tr class="text-white uppercase">
            <th>Membre ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Télephone</th>
            <th>Edit Member</th>
            <th>Delete Member</th>
            </tr>
         </thead>
         <tbody>
         
            <tr>
              <td>
                 
              </td>
              <td>
                  
              </td>
              <td>
                  
              </td>
              <td>
                  
              </td>
              <td>
                  
              </td>
              <td><a href="" class="fa-solid fa-edit text-yellow-400"></i></a></td>
              <td><a href=""><i class="fa-solid fa-trash text-red-600"></i></a></td>
            </tr>
         
           
         </tbody>
      </table>
    </section>

<!-- activities -->
    <section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec3 authors" id="authors">
    <h1 class="text-center pt-5 pb-2 font-extrabold text-3xl">List of activities</h1>
        <div class="w-[300px] h-[2px] bg-gray-400 mx-auto mb-10"></div>
    <table class="w-full">
         <thead>
            <tr class="text-white uppercase">
            <th>nom activité</th>
            <th>Description</th>
            <th>date debut</th>
            <th>date fin</th>
            <th>capacité</th>
            <th>disponibility</th>
            </tr>
         </thead>
         <tbody>
       
            <tr>
              <td>
                 
              </td>
              <td>
                 
              </td>
              <td>
                  
              </td>
              <td>
                 
              </td>
              <td>
                  
              </td>
              <td>
                  
              </td>
            </tr>
        
           
         </tbody>
      </table>
    
    </section>

<!-- reservations -->
    <section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec4 visitors" id="visitors">
        <h1 class="text-center pt-5 pb-2 font-extrabold text-3xl">List of reservations</h1>
        <div class="w-[300px] h-[2px] bg-gray-400 mx-auto mb-10"></div>
    <table class="w-full">
         <thead>
            <tr class="text-white uppercase">
            <th>id reservation</th>
            <th>id de l'activity reserver</th>
            <th>id de membre qui a reserver</th>
            <th>date de reservation</th>
            </tr>
         </thead>
         <tbody>
       
            <tr>
              <td>
                
              </td>
              <td>
                  
              </td>
              <td>
                 
              </td>
              <td>

              </td>
           </tr>
           
           
         </tbody>
      </table>
    </section>
    <section class="w-full section text-[#111C2D] bg-white rounded-lg shadow-md sec5 visitors" id="articles">
        <h1 class="text-center pt-5 pb-2 font-extrabold text-3xl">List of reservations</h1>
        
    </section>
    

  </main>





<script src="assets/js/script.js?v=<?php echo time(); ?>"></script>
    
</body>
</html>