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

    public function getConnection() {

        if(!$this->conexao)
        {
            throw new Exception('Conexao não estabelecida. \n'. @mysqli_connect_error($this->conexao)); 
        }
        
        return $this->conexao;
    }
}

$obj = new Conexao();
$obj = $this->conexao;