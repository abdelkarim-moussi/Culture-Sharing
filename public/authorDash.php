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
            
            <div class="py-5 dach ">
                <ul class="pl-2 flex flex-col gap-y-6">
                    <li class="toggeled-item text-[1rem] font-semibold tracking-wide  hover:text-orange-500 flex gap-3 items-center active-btn" ><i class="fa-solid fa-list"></i><a data-id ="articles" href="#">Articles</a></li>
                    <li class="toggeled-item text-[1rem] font-semibold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-user"></i><a data-id ="profile" href="#">Profile</a></li>
                    <li class="toggeled-item absolute bottom-5 text-[1rem] font-semibold tracking-wide  hover:text-orange-500 flex gap-3 items-center" ><i class="fa-solid fa-sign-out"></i><a href="../includes/logout.php">logout</a></li>
                    
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
                <h3 class="text-[2rem]">10</h3>
            </div>
            <h3>My articles</h3>
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
            <h3>refused articles</h3>
        </div>
    </div>

    <h1 class="text-lg mb-5 border-b pb-5 capitalize">Disponible articles</h1>

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