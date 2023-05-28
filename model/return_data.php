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

        $aux = "SELECT nome_completo_mei FROM tbl_dados_meis_cadastro where '$user_logged_id' = tbl_dados_meis_cadastro.usuario_mei";

        $safe_this_name = $this->connection->query($aux);

        if($safe_this_name->num_rows > 0) {
            $row = $safe_this_name->fetch_assoc();
            $myNameis = $row['nome_completo_mei'];

            echo "<p>Olá, $myNameis, aqui estão seus Dados até o momento.<p/>";
        }

        $sql = "SELECT * FROM tbl_dados_meis_ativos WHERE '$user_logged_id' = tbl_dados_meis_ativos.chave_dados";

        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {

            $html = '';
            
            while ($row = $result->fetch_assoc()) {
                
                $data = $row['data'];
                $dataFormatada = date('d/m/Y', strtotime($data));

                $html .= '<p>Tipo de Serviço: ' . $row['tipo_de_servico'] . '</p><p>Orçamento do Serviço: ' . $row['valor_servico'] . '<p/><p>Serviço prestado no Dia: ' . $dataFormatada . '<p/>';
            }
            echo $html;
        } else {
            echo "Nenhum dado encontrado";
        }

        $this->connection->close();
    }
    }

$obj = new Data($connection);
$obj->getLinkedData();