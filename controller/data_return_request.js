function returnData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../model/return_data.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var resposta = xhr.responseText;
            preencherModal(resposta);
        }
    };
    xhr.send();
}

function preencherModal(resposta) {
    var modalBody = document.querySelector("#livrocaixaModal .modal-body");
    if (resposta === "Nenhum dado encontrado") {
        modalBody.innerHTML = "<p>Nenhum dado encontrado</p>";
    } else {
        modalBody.innerHTML = resposta;
    }
}
