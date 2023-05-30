function returnData() {
    var xhr = new XMLHttpRequest();
    
    var dataInicial = document.getElementById('data-inicial').value;
    var dataFinal = document.getElementById('data-final').value;
  
    var url = '../model/return_data.php?dataInicial='+dataInicial+'&dataFinal='+dataFinal;
  
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var resposta = xhr.responseText;
        preencherModal(resposta);
      }
    };
    xhr.send();
  }
  
  function preencherModal(resposta) {
    var modalBody = document.querySelector("#retornoDados");
    if (resposta === "Sem registros nas datas selecionadas") {
      modalBody.innerHTML = "<p>Sem registros nas datas selecionadas</p>";
    } else {
      modalBody.innerHTML = resposta;
    }
  }