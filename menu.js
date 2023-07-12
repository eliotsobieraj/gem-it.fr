
const burger_btn = document.getElementById("brg-button")
const burger_div = document.getElementById("brg-contain")
const burger_back = document.getElementById("back")
var state = 0


function menufunction() {
    if(state === 0){
        burger_div.style.top = "0";
        burger_div.style.borderRadius = "0";
        burger_div.style.right = "0";

        state = 1;
    }
    else if(state === 1) {
        burger_div.style.right = "-100vw";
        burger_div.style.top = "-100vh"
        burger_div.style.borderRadius = "600px";

        state = 0
    }
}


if (burger_btn) {
    burger_btn.addEventListener("click", menufunction)
}


if (burger_back){
    burger_back.addEventListener("click",menufunction)
}