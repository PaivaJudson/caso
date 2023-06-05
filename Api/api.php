<?php

    include('config.php');
    include('usuarios.php');


    function getPagina(){
        $url = $_SERVER['REQUEST_URI'];
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo == "GET"){
            
            switch($url){
                case "/sistema/":
                    include("Paginas/home.php");
                    break;
                case "/home/":
                    include("Paginas/home.php");
                    break;
                case "/sobre/":
                    include("Paginas/sobre.php");
                    break;
                case "/contato/":
                    include("Paginas/contato.php");
                    break;
                default:
                    include("Paginas/home.php");
            }
        }

        if($metodo == "POST"){
            echo "GET"; exit();
        }


        var_dump($_SERVER);exit();
        return include("Paginas/home.php");
    }