<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $nome = $_POST["nome"];
        $genero = $_POST["genero"];

        if($nome !== '' && $genero !==''){
            $filmes[] =
            [
                "nome" => $nome,
                "genero" => $genero
            ];
        }



    }





?>