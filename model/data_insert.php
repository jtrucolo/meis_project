<?php

require_once 'C:\xamppNew\htdocs\meis_project\server\connection.php';

class InsertData {

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function setData() {
        
        $data = [
            'tipo_de_servico' => $_REQUEST['tipo_de_servico'],
            'data' => $_REQUEST['data'],
            'valor_servico' => $_REQUEST['valor_servico'],
            'checkboxGroup' => $_REQUEST['checkboxGroup'],
            'estados' => $_REQUEST['estados'],
            'cidades' => $_REQUEST['cidades']
          ];
          
          
            $columns = implode(', ', array_keys($data));
            $placeholders = implode(', ', array_fill(0, count($data), '?'));
            $sql = "INSERT INTO tbl_dados_meis_ativos ($columns) VALUES ($placeholders)";

            $values = array_values($data);
            $types = str_repeat('s', count($values));

            $stmt = $this->connection->prepare($sql);

            if($stmt === false) {
                echo "<p>Erro ao executar.<p/>" . $this->connection->error;
            }
            else {
            $stmt->bind_param($types, ...$values);
            $stmt->execute();

        }
    }
}

$obj = new InsertData($connection);
$obj->setData();