<?php

require_once 'C:\xamppNew\htdocs\meis_project\server\connection.php';

class InsertData {
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function setData() {
        session_start();

        $logged_user_id = $_SESSION['logged_user']; // Obtém o ID do usuário logado
        
        $aux = "SELECT id FROM tbl_dados_meis_cadastro WHERE usuario_mei = ?";
        $stmt_aux = $this->connection->prepare($aux);
        $stmt_aux->bind_param('s', $logged_user_id);
        $stmt_aux->execute();
        $result_aux = $stmt_aux->get_result();

        if ($result_aux->num_rows === 1) {
            $row_aux = $result_aux->fetch_assoc();
            $user_id = $row_aux['id'];

            $data = [
                'chave_dados' => $user_id,
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

            $stmt = $this->connection->prepare($sql);

            if ($stmt === false) {
                echo "<p>Erro ao executar.</p>" . $this->connection->error;
            } else {
                $values = array_values($data);
                $types = str_repeat('s', count($values));
                $stmt->bind_param($types, ...$values);
                $stmt->execute();
                // Restante do código após a inserção dos dados
            }
        } else {
            echo "<p>Usuário não encontrado</p>";
            exit();
        }

        $stmt_aux->close();
        $stmt->close();
    }
}

$obj = new InsertData($connection);
$obj->setData();
