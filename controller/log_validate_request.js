  $(document).ready(function() {
    $('#frm_login').submit(function(event) {
      event.preventDefault();

      let form_data = {
        username: $('#user_input').val(),
        password: $('#pw_input').val()
      }

      $.ajax({
        method: "POST",
        url: "model/log_user.php",
        data: form_data,
        dataType: "json",
        success: function(response) {
          if (response.redirect) {
            window.location.href = response.redirect;
          }
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
      
    });
  });