<?php

DEFINE('HOST','localhost');
DEFINE('USER','root');
DEFINE('DB','db_meis');
DEFINE('PW','');

$connection = mysqli_connect(HOST,USER,PW,DB);

class Conexao {

    private $connection;

    public function Connection($connection) {
        $this->connection = $connection;
    }

    public function getConnection() {

        if(!$this->connection)
        {
            throw new Exception('Conexao não estabelecida. \n'); 
        }
        
        return $this->connection;
    }
}

$obj = new Conexao();
$obj->Connection($connection);