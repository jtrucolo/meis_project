<!DOCTYPE html>
<html lang="PT-BR">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./assets/Real_Marca Branca.png" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./views/style.css">

<!-- jQuery Ajax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <title>MEIs Project</title>
</head>
<body>
  <main>
    <figure>
      <img src="./assets/LOGO_REAL.png" alt="Logo Real" width="150px">
    </figure>
    <form class="frm_login" id="frm_login">
      <input id="user_input" class="input_box" name="user_login" type="text" placeholder="Usuario">
      <input id="pw_input" class="input_box" name="pw_user" type="password" placeholder="Senha">
      <input class="login_btn" id="login_btn" type="submit" value="Conectar" onclick="validarInputs()">

      <p></p>
    </form>
  </main>
  <footer>
    <h4 class="footer_index">Todos os direitos reservados - Real Tech LTDA.</h4>
  </footer>
</body>
<script src="./scripts/login_inputs_check.js"></script>
<script src="./controller/log_validate_request.js"></script>
</html>