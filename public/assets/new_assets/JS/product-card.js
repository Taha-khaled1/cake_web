//////////////////////////////////////////////// select plus-num-minus ////////////////////////////////////////////////////////////////
let plus = document.querySelector(".plus");
let num = document.querySelector(".num");
let minus = document.querySelector(".minus");

x = 1;

//////////////////////////////////////////////// addEventListener click-to-(plus/minus) //////////////////////////////////////////////////
plus.addEventListener("click", () => {
    num.innerHTML = x++;
})

minus.addEventListener("click", () => {
    num.innerHTML = x--;
})

//////////////////////////////////////////////// select big-img and small-img ////////////////////////////////////////////////////////////////
// let bigImg = document.querySelector(".big-img");
// let smallImg = document.querySelectorAll(".small-imgs img");

// smallImg.forEach((img)=>{
//     img.addEventListener("click",()=>{
//         bigImg.src = img.src;
//     })
// })
