<?php

require_once '../server/connection.php';

$connection = $connection;

class Data {
    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getLinkedData() {

$sql = "SELECT * FROM tbl_dados_meis_ativos INNER JOIN tbl_dados_meis_cadastro ON tbl_dados_meis_ativos.chave_dados = tbl_dados_meis_cadastro.chave_dados";

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