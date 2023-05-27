<?php
require_once '../server/connection.php';

session_set_cookie_params(2);
session_start();

$connection = $connection;

class Login {
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getLogin() {

        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $sql = "SELECT * FROM tbl_dados_meis_cadastro WHERE usuario_mei = ? AND senha_mei = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $_SESSION['logged_user'] = $username;
            $response = array('redirect' => 'views\logged.php');
            echo json_encode($response);
            exit();
          } else {
            $response = array('redirect' => '');
            echo json_encode($response);
            exit();
          }
          

        $stmt->close();
        $this->connection->close();
    }
}

$obj = new Login($connection);
$obj->getLogin();