$(document).ready(function() {
    $('#cadastro_servico').submit(function(event) {
      event.preventDefault();

      let formData = {
        tipo_de_servico: $('input[name=tipo_de_servico]').val(),
        data: $('input[name=data]').val(),
        valor_servico: $('input[name=valor_servico]').val(),
        checkboxGroup: $('input[name=checkboxGroup]').val(),
        estados: $('input[name=estados]').val(),
        cidades: $('input[name=cidades]').val(),
      }

      $.ajax({
        url: '../model/data_insert.php',
        type: 'POST',
        data: formData,
        dataType: "json",

        success: function(response) {

          console.log(response);

          $('#cadastro_servico').modal('hide'); // Fechar o modal após enviar o formulário
          $(this).trigger('reset'); // Limpar o formulário
        },

        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    });
  });