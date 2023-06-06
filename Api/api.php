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
                    $produtos = buscaProdutos($_GET['busca']);
                    include("Paginas/home.php");
                break;
                default:
                    $produtos = getProdutos();
                    include("Paginas/home.php");
            }
        }

        if($metodo == "POST"){
            echo "GET"; exit();
        }

    }