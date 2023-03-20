/***************************************************** selesct + - num *********************************/
let plus = document.querySelector(".order .plus");
let num = document.querySelector(".order .num");
let minus = document.querySelector(".order .minus");

/************************************************* add event click at this element **********************************************/
x = 1;

plus.addEventListener("click",function(){
num.innerHTML= x++
})

minus.addEventListener("click",function(){
        num.innerHTML= x--;
})
