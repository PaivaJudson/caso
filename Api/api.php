<?php

    include('config.php');
    include('usuarios.php');
    include('produtos.php');
    include('db.php');


    function getPagina(){
        $url = $_SERVER['REQUEST_URI'];
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        $url = explode("?", $url);
        $url = $url[0];
    
        if($metodo == "GET"){
            
            switch($url){
                case "/sistema/":
                    $produtos = getProdutos();
                    include("Paginas/home.php");
                    break;
                case "/sistema/home/":
                    $produtos = getProdutos();
                    include("Paginas/home.php");
                    break;
                case "/sistema/sobre/":
                    include("Paginas/sobre.php");
                    break;
                case "/sistema/contato/":
                    include("Paginas/contato.php");
                    break;
                case "/sistema/busca":
                    // nao esta captando o valor da busca 
                    var_dump($_GET);
                    $produtos = buscaProdutos($_POST['busca']);
                    include("Paginas/home.php");
                    break;
                case "/sistema/produto/editar":

                    $request = $_SERVER['REQUEST_URI'];
                    $request = explode("=", $request);
                    
                    $produtoEdit = buscarProdutoID($request[1]);
                    $editando = true;
                    include("Paginas/home.php");
                 
                    
                    break;
                default:
                    $produtos = getProdutos();
                    include("Paginas/home.php");
            }
        }

        if($metodo == "POST"){
            switch($url){
                case "/sistema/":
                    $produtos = getProdutos();
                    include("Paginas/home.php");
                    break;
                case "/sistema/home/":
                    $produtos = getProdutos();
                    include("Paginas/home.php");
                    break;
                case "/sistema/sobre/":
                    include("Paginas/sobre.php");
                    break;
                case "/sistema/contato/":
                    include("Paginas/contato.php");
                    break;
                case "/sistema/busca":
                    // nao esta captando o valor da busca 
                    
                    $produtos = buscaProdutos($_POST['busca']);
                    include("Paginas/home.php");
                    break;
                case "/sistema/adicionar":
                    if(!adicionarProdutos($_POST)){
                        $msg = "Erro ao salvar o registo!";
                        $produtos = getProdutos();
                        include("Paginas/home.php");

                        break;
                    }

                   header('location:../sistema/');

                    break;
                case "/sistema/produto/salvar":
                    if(!salvarProdutos($_POST)){
                        
                        $msg = "Erro ao actualizar o registo!";
                        $produtos = getProdutos();
                        include("Paginas/home.php");

                        break;
                    }
                    
                   header('location:../sistema/');

                    break;
                default:
                    $produtos = getProdutos();
                    include("Paginas/home.php");
            }
        }

    }