<?php

    // array vazio, para por conteudo
    $arrayComum = [];

    for($i = 0; $i < 3; $i++){
        $arrayComum[$i] = $i + 2;
    }

    // arrayComum = [2, 3, 4]
    //var_dump($arrayComum);

    // Tambem vazio, mas sera usado de outra forma
    $arrayNomeado = [];

    $arrayNomeado = [];
    $arrayNomeado["nome"] = "alberto";
    $arrayNomeado["idade"] = 40;

    //arrayNomeado = ["nome" => "alberto", "idade" => 40]
    //var_dump($arrayNomeado);

    // Fazendo o mesmo tipo array manualmente na atribuição
    $arrayNomeado2 = ["nome" => "Maria", "idade" => 39];
    var_dump($arrayNomeado2);



