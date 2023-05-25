function validarInputs() {

var user = document.getElementById('user_input').value;
var pw = document.getElementById('pw_input').value;

if(user == "" || pw == "") {
    alert("Por favor preencha todos os campos.");
    return false;
}

return true;
}