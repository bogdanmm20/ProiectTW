var VAR;
function choose(choice){
    localStorage.setItem("tip", choice);
    //alert("Ai ales " + localStorage.getItem("tip"));
    window.location='category_map.html';
}
/*function formdata(){
	localStorage.setItem("raza");
}*/

function formdata(){
  var txtName = document.getElementById("txtName");
  var txtOutput = document.getElementById("txtOutput");
  var name = txtName.value;
  window.alert(name);
  localStorage.setItem("raza",name);
  } 