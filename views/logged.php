<!-- Diovana ♥ -->
<?php
require_once './logged.php';
session_start();

if(!isset($_SESSION['logged_user'])) {

  header('Location: ../index.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../assets/Real_Marca Branca.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--
      JS / JQUERY
    -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--
      BOOTSTRAP
    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <script src="../scripts/preload.js"></script>
    <script src="../scripts/set-estados-visible.js"></script>

    <title>MEIs Project</title>
  </head>
  <body>

    <div class="preloader">
        <figure>
          <img src="../assets/LOGO_REAL.png" alt="#">
        </figure>
        <div class="welcome-message"></div>
    </div>

  <header class="headerContent">

    <!--
    NAVBAR
    -->

    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="../assets/LOGO_REAL.png" width="120px" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="bi bi-list-nested"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <button class="nav-link" aria-current="page" data-bs-toggle="modal" data-bs-target="#cadastro_servico">Registrar Dados</button>

            <!--
              FORMULARIO DE COLETAS
            -->

              <div class="modal fade" id="cadastro_servico" aria-labelledby="cadastro_servico" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content" style="height: 350px !important; width: 550px !important;">
                    <div class="modal-body">
                      <div class="frm_cadastro_servico">
                        <form action="" method="POST" enctype="multipart/form-data">
                          <select name="tipo_de_servico" id="tipo_de_servico">
                            <option value="#">Selecione o Tipo de Serviço Prestado</option>
                            <option value="Agua e Esgoto">Agua e Esgoto</option>
                            <option value="Alimentação">Alimentação</option>
                            <option value="Alugueis">Alugueis</option>
                            <option value="Bens de Pequeno Valor">Bens de Pequeno Valor</option>
                            <option value="Brindes e Bonificações">Brindes e Bonificações</option>
                            <option value="Combustivel">Combustivel</option>
                            <option value="Condomínio">Condomínio</option>
                            <option value="Correios">Correios</option>
                            <option value="Despesas Bancárias">Despesas Bancárias</option>
                            <option value="Encargos">Encargos</option>
                            <option value="Energia Elétrica">Energia Elétrica</option>
                            <option value="Eventos/Feiras">Eventos/Feiras</option>
                            <option value="Fretes">Fretes</option>
                            <option value="Honorários">Honorários</option>
                            <option value="Impostos">Impostos</option>
                            <option value="Impostos e Taxas">Impostos e Taxas</option>
                            <option value="IPVA">IPVA</option>
                            <option value="Juros de Mora">Juros de Mora</option>
                            <option value="Locações">Locações</option>
                            <option value="Manutenção e Conservação">Manutenção e Conservação</option>
                            <option value="Manutenções">Manutenções</option>
                            <option value="Matéria Prima">Matéria Prima</option>
                            <option value="Material de Consumo">Material de Consumo</option>
                            <option value="Material de Expediente">Material de Expediente</option>
                            <option value="Material de Limpeza">Material de Limpeza</option>
                            <option value="Mensalidades e Assinaturas">Mensalidades e Assinaturas</option>
                            <option value="Mercadoria">Mercadoria</option>
                            <option value="Pro Labore">Pro Labore</option>
                            <option value="Propaganda e Publicidade">Propaganda e Publicidade</option>
                            <option value="Salários">Salários</option>
                            <option value="Seguros">Seguros</option>
                            <option value="Telefone e Internet">Telefone e Internet</option>
                            <option value="Viagens">Viagens</option>
                            <option value="Serviços de Terceiros">Serviços de Terceiros</option>
                          </select>
                        <div style="display: flex; flex-direction: row;">
                          <input type="date" name="data" id="data" class="bi bi-calendar" style="width: 130px;">
                          <input type="text" placeholder="Orçamento" name="valor_servico" id="valor_servico" style="margin-top: 30px; width: 90px; margin-left: 50px;">
                        </div>
                          <label for="location" style="margin-top: 30px;">Serviço prestado no estado do RS?  </label><br/>
                          <input id="checkbox1" type="checkbox" value="sim" name="checkboxGroup" onclick="turnCountry()">Sim 
                          <input id="checkbox2" type="checkbox" value="nao" name="checkboxGroup" onclick="turnCountry()">Não
          
                          <div id="estados_cidades_brasil">
                          <select name="estados" id="estados" style="display: none !important;" onchange="carregarCidades()">
                            <option value="#">Selecione o Estado</option>
                          </select>
          
                          <select name="cidades" id="cidades" style="display: none;">
                            <option value="#">Selecione a cidade</option>
                          </select>
                        </div>
          
                        <label class="ficheiro" for="files">Comprovante do Serviço</label>
                        <input type="file" name="files">
                      <div class="modal-footer">
                        <button class="btn btn-primary" name="submit_btn" value="submit">Enviar</button>
                      </div>
                        </form>
                        </div>
                    </div>
                    <br>
                    <br>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#livrocaixaModal">Ver meu Livro Caixa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Solicitar Dashboard (Pensar)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Suporte</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#faqModal">FAQ</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
  </header>


    <main>

      <!--
      NEWS
      -->

        <div class="bg-news">
          <p id="news"></p>
        </div>


        <div class="line"></div>


      <!--
      CARROUSSEL
      -->
        
        <div class="middleContent">
          <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../assets/LOGO_REAL.png" class="d-block w-100" alt="#">
              </div>
              <div class="carousel-item">
                <img src="../assets/LOGO_REAL.png" class="d-block w-100" alt="#">
              </div>
              <div class="carousel-item">
                <img src="../assets/LOGO_REAL.png" class="d-block w-100" alt="#">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>

        <div class="line"></div>

            <figure>
                <img class="footerLogo" src="../assets/LOGO_REAL.png" width="220px" alt="Real Assessoria Logo">
            </figure>
        </div>
    </main>

    <!--
    MODAL LIVRO CAIXA
    -->

<div class="modal fade" id="livrocaixaModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="livrocaixaModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="livrocaixaModal">Meu Livro Caixa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Realize o Filtro dos seus Registros.</p>
        <div class="form-group">
          <label for="data-inicial">Data Inicial:</label>
          <input type="date" class="form-control" id="data-inicial" required>
        </div>
        <div class="form-group">
          <label for="data-final">Data Final:</label>
          <input type="date" class="form-control" id="data-final" required>
        </div>
  <br/>
        <div id="retornoDados"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="btn_date_request" onclick="returnData()">Filtrar</button>
      </div>
    </div>
  </div>
</div>


      <!--
        MODAL FAQ
      -->
</body>

<script src="https://unpkg.com/scrollreveal"></script>
<script src="../views/script.js"></script>
<script src="../scripts/change_news.js"></script>
<script src="../scripts/showForm.js"></script>
<script src="../scripts/abrir_form.js"></script>
<script src="../scripts/abrir_form_fim.js"></script>
<script src="../scripts/fechar_form.js"></script>
<script src="../scripts/fechar_form_fim.js"></script>
<script src="../scripts/welcome_message.js"></script>
<script src="../scripts/checkbox_input.js"></script>
<script src="../scripts/estados_brasil.js"></script>
<script src="../scripts/mask_input_orcamento.js"></script>
<script src="../controller/data_return_request.js"></script>
<script src="../controller/data_submit_request.js"></script>
</html>
