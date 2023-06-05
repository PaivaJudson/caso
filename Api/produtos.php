<?php

    function getProdutos(){
        return [
            ["titulo"=>"PHP Básico", "Descricao"=>"Curso de PHP Básico", "valor"=>"120.90"],
            ["titulo"=>"PHP Com PDO", "Descricao"=>"Curso de PHP Com PDO", "valor"=>"140.90"],
            ["titulo"=>"PHP OO", "Descricao"=>"Curso de PHP Orientado a Objectos", "valor"=>"150.90"],
            ["titulo"=>"PHP Avancado", "Descricao"=>"Curso de PHP Avancado", "valor"=>"160.90"]
        ];
    }

    function buscaProdutos($busca){
        $produtos = getProdutos();
        $resultados = [];

        foreach($produtos as $produto){
            $existe = in_array($busca, $produto);

            if($existe){
                array_push($resultados, $produto);
            }
        }

        return $resultados;
    }




?>