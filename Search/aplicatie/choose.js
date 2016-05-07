var VAR;
function choose(choice){
    localStorage.setItem("tip", choice);
}

function test(click){
    alert("You chossed " + localStorage.getItem("tip"));
    window.location='home.html';
}
