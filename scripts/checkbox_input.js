const checkboxes = document.querySelectorAll('input[name="checkboxGroup"]');
  checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
      const checkedCheckboxes = document.querySelectorAll('input[name="checkboxGroup"]:checked');
      if (checkedCheckboxes.length > 1) {
        // Desmarcar todos os checkboxes
        checkboxes.forEach(cb => {
          cb.checked = false;
        });
        // Marcar apenas o checkbox atual
        checkbox.checked = true;
      }
    });
  });

  function turnCountry() {
    const freeCountry = document.getElementById('checkbox2');
    const blockCountry = document.getElementById('checkbox1');
    const estados_liberados = document.getElementById('estados');
    const cidades_liberadas = document.getElementById('cidades');

    if(blockCountry.checked) {
      estados_liberados.style.display = 'none';
      cidades_liberadas.style.display = 'none';
    }
    else if(freeCountry.checked) {
      estados_liberados.style.display = 'block';
      cidades_liberadas.style.display = 'block';
      
    }
    else {
      estados_liberados.style.display = 'none';
      cidades_liberadas.style.display = 'none';
    }
  }