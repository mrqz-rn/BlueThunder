

// Increment & Decrement Product
const sub = document.querySelector(".sub");
const add = document.querySelector(".add");
const value = document.querySelector(".value");
let TotalValue = 1;
document.getElementById("prodQTY").value = TotalValue;
value.innerHTML = TotalValue;
add.onclick = function() {
    TotalValue++;
    value.innerHTML = TotalValue;
    document.getElementById("prodQTY").value = TotalValue;
    }
sub.onclick = function() {
    if(TotalValue == 0){
    TotalValue=0;
    } else{
    TotalValue--;
    value.innerHTML = TotalValue;
    document.getElementById("prodQTY").value = TotalValue;
    }
} 


// Star Review
const btn = document.querySelector("button");
const post = document.querySelector(".post");
const widget = document.querySelector(".star-widget");
const editBtn = document.querySelector(".edit");
btn.onclick = ()=>{
    widget.style.display = "none"
    post.style.display = "block";
    editBtn.onclick = ()=>{
    widget.style.display = "block";
    post.style.display = "none";
    }
    return false;
}


// Add to Cart Function
