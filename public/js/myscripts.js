function showDiv(id){
    document.getElementById(id).style.display = 'block';
}

function hideDiv(id){
    document.getElementById(id).style.display = 'none';
}

function enableInput(name){
    document.querySelector("[name='"+ name +"']").disabled = false;
}

function disableInput(name){
    document.querySelector("[name='"+ name +"']").disabled = true;
}

function resetSelect(name,value){
    miscasillas=document.getElementsByName(name);
    for (let i = 0; i < miscasillas.length ; i++) {
        if (miscasillas[i].value != value) {
            miscasillas[i].checked = false;
        }
      }
}