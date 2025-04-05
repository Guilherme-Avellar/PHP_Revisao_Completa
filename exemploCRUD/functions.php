<?php

function view($view, $data = []) {
    foreach($data as $key => $value) {
        //dd($key, $value); // informações do data
        $$key = $value;
        // "$$" cria variaveis dinamicamente, ou seja, nesse loop
        // vão ser criadas variaveis com o nome do $key e o valor do $value
        // exemplo: se $key = "livro" e $value = "livro1", vai ser criada a
        // variavel $livro com o valor "livro1"
    }

    require "views/template/app.php";
}

// esses 3 pontos (...$dump) são o operador de "resto" do php, parecido com JS
function dd(...$dump) {
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";
    die();
    // esse die() é uma função nativa do php que interrompe a execução do script
    // e não exibe nada na tela do navegador depois disso
}

function abort($code) {
    http_response_code($code); // comunica com o browser o erro
    
    view($code); // função para chamar a view de erro

    die();
    // die() é uma função nativa do php que interrompe a execução do script
    // e não imprime mais nada na tela do navegador depois disso
}
