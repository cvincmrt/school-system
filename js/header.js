const navIcon = document.querySelector(".nav-icon");
const navigation = document.querySelector("nav");
const hamburgerIcon = document.querySelector(".fa-solid");


//zachytenie kliknutia na hamburger

navIcon.addEventListener("click",() => {
   //musim zistit ake classy ma ikonka hamburgeru pomocou classList[]

   //console.log(hamburgerIcon.classList[1]);
   
    if (hamburgerIcon.classList[1] === "fa-bars") {
        hamburgerIcon.classList.remove("fa-bars");
        hamburgerIcon.classList.add("fa-xmark");
        navigation.style.display = "block";
    }else{
        hamburgerIcon.classList.remove("fa-xmark");
        hamburgerIcon.classList.add("fa-bars");
        navigation.style.display = "none";
    }
})


