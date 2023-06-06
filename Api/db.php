<?php
    
    function getConexao(){
        $conexao = new \PDO("mysql:host=localhost;dbname=php_demo", "root", "");
        return $conexao;
    }


?>