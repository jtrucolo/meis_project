<?php

DEFINE('HOST','localhost');
DEFINE('USER','root');
DEFINE('DB','testeMEIs');
DEFINE('PW','');

$connection = mysqli_connect(HOST,USER,PW,DB);

class Conexao {

private $connection;

    public function Connection($connection) {
        $this->conexao = $connection;
    }
}

$obj = new Conexao();
$obj = $this->conexao;