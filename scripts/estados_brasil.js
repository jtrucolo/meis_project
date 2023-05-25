function carregarEstados() {
  const estadosSelect = document.getElementById('estados');

  // Chamada para a API do IBGE para obter os estados do Brasil
  fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados')
    .then(response => response.json())
    .then(estados => {
      // Preencher as opções do select com os estados do Brasil
      estados.forEach(estado => {
        const option = document.createElement('option');
        option.value = estado.id;
        option.textContent = estado.nome;
        estadosSelect.appendChild(option);
      });
    })
    .catch(error => {
      console.error('Erro ao carregar os estados:', error);
    });
}

function carregarCidades() {
  const estadoSelect = document.getElementById('estados');
  const cidadesSelect = document.getElementById('cidades');

  if (estadoSelect.value && !checkbox1.checked) {
    // Limpar as opções existentes
    while (cidadesSelect.firstChild) {
      cidadesSelect.removeChild(cidadesSelect.firstChild);
    }

    // Chamada para a API do IBGE para obter as cidades do estado selecionado
    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSelect.value}/municipios`)
      .then(response => response.json())
      .then(cidades => {
        // Preencher as opções do select com as cidades correspondentes
        cidades.forEach(cidade => {
          const option = document.createElement('option');
          option.value = cidade.nome;
          option.textContent = cidade.nome;
          cidadesSelect.appendChild(option);
        });

        // Mostrar o select das cidades
        cidadesSelect.style.display = 'block';
      })
      .catch(error => {
        console.error('Erro ao carregar as cidades:', error);
      });
  } else {
    // Limpar as opções e ocultar o select das cidades
    while (cidadesSelect.firstChild) {
      cidadesSelect.removeChild(cidadesSelect.firstChild);
    }
    cidadesSelect.style.display = 'none';
  }
}

carregarEstados();