<?php

    include('config.php');
    include('usuarios.php');
    include('produtos.php');


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
                    var_dump($_GET); exit();
                    $produtos = buscaProdutos($_GET['busca']);
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