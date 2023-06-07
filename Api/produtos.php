<?php

    function getProdutos(){
        $dados = [
            ["titulo"=>"PHP Básico", "Descricao"=>"Curso de PHP Básico", "valor"=>"120.90"],
            ["titulo"=>"PHP Com PDO", "Descricao"=>"Curso de PHP Com PDO", "valor"=>"140.90"],
            ["titulo"=>"PHP OO", "Descricao"=>"Curso de PHP Orientado a Objectos", "valor"=>"150.90"],
            ["titulo"=>"PHP Avancado", "Descricao"=>"Curso de PHP Avancado", "valor"=>"160.90"]
        ];

        $conexao = getConexao();

        $consulta = "select * from produtos";

        $ret = $conexao->query($consulta);

        $produtos = $ret->fetchAll();
        //echo "<pre>";

        return $produtos;
    }

    function buscaProdutos($busca){
        $produtos = getProdutos();
        $resultados = [];

        foreach($produtos as $produto){
            $existe = in_array(strtolower($busca), array_map('strtolower',$produto));

            if($existe){
                array_push($resultados, $produto);
            }
        }

        return $resultados;
    }


    function adicionarProdutos($produto){
        $conexao = getConexao();

        $inserir = "INSERT INTO PRODUTOS (titulo, descricao, valor) values (:titulo, :descricao, :valor)";

        $stmt = $conexao->prepare($inserir);
        $stmt->bindValue(':titulo', $produto['titulo']);
        $stmt->bindValue(':descricao', $produto['descricao']);
        $stmt->bindValue(':valor', $produto['valor']);

        $stmt->execute();

        return $conexao->lastInsertId();
    }

    function salvarProdutos($produto){
        $conexao = getConexao();
        $conexao->beginTransaction();
        $update = "update produtos set titulo=:titulo, descricao=:descricao, valor=:valor  where id=:id";

        $stmt = $conexao->prepare($update);
        $stmt->bindValue(':titulo', $produto['titulo']);
        $stmt->bindValue(':descricao', $produto['descricao']);
        $stmt->bindValue(':valor', $produto['valor']);
        $stmt->bindValue(':id', $produto['id']);

        $retorno = $stmt->execute();
         $conexao->commit();

        return $retorno;
    }

    function deletarProdutoID($id){
        
        $conexao = getConexao();

        $deletar = "DELETE FROM produtos WHERE id=:id";
        $stmt = $conexao->prepare($deletar);
        $stmt->bindValue(':id', $id);
        
        $retorno = $stmt->execute();
        
        return $retorno;
    }

    function buscarProdutoID($produtoId){
        
        $conexao = getConexao();

        $editar = "select * from produtos where id=:id";
        $stmt = $conexao->prepare($editar);
        $stmt->bindValue(':id', (int)$produtoId);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);

    }


?>