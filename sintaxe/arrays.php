<?php

    // array vazio, para por conteudo
    $arrayComum = [];

    for($i = 0; $i < 3; $i++){
        $arrayComum[$i] = $i + 2;
    }

    // arrayComum = [2, 3, 4]
    //var_dump($arrayComum);

    // Tambem vazio, mas sera usado de outra forma (array associativo)
    $arrayNomeado = [];
    $arrayNomeado["nome"] = "alberto";
    $arrayNomeado["idade"] = 40;

    // array associativos em php
    //arrayNomeado = ["nome" => "alberto", "idade" => 40]
    //var_dump($arrayNomeado);

    // Fazendo o mesmo tipo array (array associativo) manualmente na atribuição
    $arrayNomeado2 = ["nome" => "Maria", "idade" => 39];
    //var_dump($arrayNomeado2);

    // count() é uma função nativa que retorna o número de elementos de um array
    //echo "número de elementos do arrayNomeado2: ". count($arrayNomeado2);


    $numeros = ["um", "dois", "tres", "quatro"];

    // foreach() é uma função feita para percorrer arrays (pode ser usado em outras estruturas também):
    foreach($numeros as $numero){
        echo '$numero = '. $numero. "\n";
    }
    // $numeros as $numero significa que:
    // Será chamado de $numero cada um dos elementos de $numeros, pois $numero
    // percorrerá cada um dos elementos de $numeros, como se fosse $numeros indexado

    // array_sum() é uma função nativa que retorna a soma de todos os elementos de um array
    //echo "soma do arrayComum [2, 3, 4]  =  ". array_sum($arrayComum) ."\n";



