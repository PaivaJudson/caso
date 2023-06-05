<?php

    function getUsuarios(){
        return  [
            ["nome"=>"Judson Paiva", "email"=>"judsonpaiva16@gmail.com"],
            ["nome"=>"João André", "email"=>"joao.andre@gmail.com"],
            ["nome"=>"Helena André", "email"=>"joao.helena@gmail.com"]
        ];
    }

    function exibeUsuarios(){
        $usuarios = getUsuarios();
        $html = "";

        foreach($usuarios as $usuario){
            $html .= "<li class='list-group-item'>Nome: ". $usuario['nome'] . " Email: ". $usuario['email'];
        }
        return $html;
    }