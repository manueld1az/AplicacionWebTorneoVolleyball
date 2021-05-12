let counter = 0;
let counterb = 0;

function countingClicks(){
    document.getElementById("counting").innerHTML = ++counter;
}
function deductClicks(){
    if (counter >= 1) {
        document.getElementById("counting").innerHTML= --counter;
    }
    
}

function countingClicksb(){
    document.getElementById("countingb").innerHTML = ++counterb;
}
function deductClicksb(){
    if (counterb >= 1) {
        document.getElementById("countingb").innerHTML= --counterb;
    }
    
}