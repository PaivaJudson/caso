<?php


    function validaProdutos($dados){
        $erro = false;

        if($dados['titulo'] == ''){
            $erro .= "<p>Preencha um título</p>";
        }

        if($dados['descricao'] == ''){
            $erro .= "<p>Preencha uma descricao</p>";
        }

        if($dados['valor'] == ''){
            $erro .= "<p>Preencha um valor</p>";
        }

        return $erro;
    }


?>