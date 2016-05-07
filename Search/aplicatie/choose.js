var VAR;
function choose(choice){
    localStorage.setItem("tip", choice);
    alert("You chossed " + localStorage.getItem("tip"));
    window.location='home.html';
}


