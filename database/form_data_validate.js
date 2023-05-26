function validateForm() {

    var user_input = document.getElementById('user_input').value;
    var pw_input = document.getElementById('pw_input').value;

    var users = [
        {username: "admin", password: "admin"}
    ];

    var isValidUser = users.some(function(user) {
        return user.username === user_input && user.password === pw_input;
    });

    if(isValidUser) {
        window.location.href = "./views/logged.php";

        return false;
    }
    else {
        altert("Usuario ou Senha invalidos.");

        return false;
    }
}