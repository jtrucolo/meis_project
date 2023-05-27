$(document).ready(function() {
    $('#cadastro_servico').submit(function(event) {
      event.preventDefault();

      let formData = {
        tipo_de_servico: $('#tipo_de_servico').val(),
        data: $('#data').val(),
        valor_servico: $('#valor_servico').val(),
        checkboxGroup: $('input[name=checkboxGroup]').val(),
        estados: $('#estados').val(),
        cidades: $('#cidades').val(),
      }

      $.ajax({
        method: "POST",
        url: "../model/data_insert.php",
        data: formData,
        dataType: "json",

        success: function(response) {

          console.log(response);

          $('#cadastro_servico').modal('hide');
          $(this).trigger('reset');
        },

        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    });
  });