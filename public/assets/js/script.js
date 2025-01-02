const menuButton = document.getElementById("menu-button");
const navBar = document.getElementById("nav-bar");
const icon = document.querySelector(".fa-solid")
const toggledItems = document.querySelectorAll(".toggeled-item");
const sections = document.querySelectorAll("section");
const globalSections = document.querySelector("body")
const addnewCatBtn = document.getElementById("addnewcat");



// function toggleNavbar(){
//  console.log("toggeled");
//  navBar.classList.toggle("active");
//  navBar.classList.toggle("notActive");
//  menuButton.classList.toggle("left-[220px]")
// }

// menuButton.addEventListener("click",toggleNavbar);



function sectionSwitch(){
    for(let i = 0; i < toggledItems.length; i++){
        toggledItems[i].addEventListener("click", function (){
            let curentSection = document.querySelectorAll(".active-btn");
            curentSection[0].classList.remove("active-btn")
            this.className += " active-btn";
        })
    }
 
    globalSections.addEventListener('click',(e)=>{
     
      const id = e.target.dataset.id;
       if(id){
         
         toggledItems.forEach(item=>{
            item.classList.remove("active");
         })

         sections.forEach(section=>{
            section.classList.remove("active");
         })
         // e.target.classList.add("active");

         let element = document.getElementById(id);
         element.classList.add("active");
         console.log(element);
         
       }
    })
  

}
sectionSwitch();


addnewCatBtn.addEventListener("click",()=>{
   document.getElementById("categories").classList.remove("active");
   document.getElementById("addCategorie").classList.add("active");
})