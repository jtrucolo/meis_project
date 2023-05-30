<?php
require_once '../server/connection.php';

$connection = $connection;

class Data {
  public function __construct($connection) {
    $this->connection = $connection;
  }

  public function getLinkedData() {
    session_start();
    $user_logged_id = $_SESSION['logged_user'];

    //BUSCA O NOME DO USUARIO LOGADO
    $aux = "SELECT nome_completo_mei FROM tbl_dados_meis_cadastro WHERE '$user_logged_id' = tbl_dados_meis_cadastro.usuario_mei";
    $safe_this_name = $this->connection->query($aux);

    //RETORNO DE CONSULTA POR DATA
    $dataInicial = isset($_REQUEST['dataInicial']) ? $_REQUEST['dataInicial'] : null;
    $dataFinal = isset($_REQUEST['dataFinal']) ? $_REQUEST['dataFinal'] : null;

    $sql = "SELECT * FROM tbl_dados_meis_ativos WHERE data >= '$dataInicial' AND data <= '$dataFinal' AND chave_dados = '$user_logged_id'";

    $result = $this->connection->query($sql);

    if($result === false) {
        echo "Erro na consulta SQL ". $this->connection->error;
        return;
    }

    if ($result->num_rows > 0) {
      if ($safe_this_name->num_rows > 0) {
        $row = $safe_this_name->fetch_assoc();
        $myNameis = $row['nome_completo_mei'];
  
        echo "<p>Olá, $myNameis, aqui estão seus Dados até o momento.</p>";
      }

      $html = '';

      while ($row = $result->fetch_assoc()) {
        $data = $row['data'];
        $dataFormatada = date('d/m/Y', strtotime($data));

        $html .= '<p>Tipo de Serviço: ' . $row['tipo_de_servico'] . '</p><p>Orçamento do Serviço: ' . $row['valor_servico'] . '</p><p>Serviço prestado no Dia: ' . $dataFormatada . '</p>';
      }
      echo $html;
    }
    else {
      echo "Sem registros nas datas selecionadas";
    }

    $this->connection->close();
  }
}

$obj = new Data($connection);
$obj->getLinkedData();
