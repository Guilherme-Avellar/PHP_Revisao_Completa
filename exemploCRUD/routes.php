<?php

/*
// isset verifica se a variavel existe e não é nula
if(isset($_SERVER["PATH_INFO"])) {
    $controller = str_replace('/', '', $_SERVER['PATH_INFO']); // remove a barra do inicio
    // se $_SERVER['PATH_INFO'] não for vazio, atribui o valor, caso contrario 
    // permanece com o valor padrão "index"
};
*/

//dd($_SERVER, parse_url($_SERVER['REQUEST_URI']));

function carregarController() {
    $uriAux = parse_url($_SERVER['REQUEST_URI'])['path']; // pega o caminho da url, o path do uri
    $controller = str_replace('/', '', $uriAux); // remove a barra do inicio

    if(! $controller)$controller = "index"; // se o uri for vazio, atribui o valor padrão "index"

    //dd($controller); // imprime o caminho da url


    // file_exists() verifica se o arquivo existe
    if ( ! file_exists("controllers/{$controller}.controller.php")) {

        http_response_code(404); // comunica com o browser o erro
        echo "<h1>404 - Página não encontrada</h1>"; // imprime na tela
        die();
        // die() é uma função nativa do php que interrompe a execução do script
        // e não imprime mais nada na tela do navegador depois disso
    };

    // adaptação do require 'views/template/app.php'; para o uso do controller
    require "controllers/{$controller}.controller.php";
}

carregarController();

?>
