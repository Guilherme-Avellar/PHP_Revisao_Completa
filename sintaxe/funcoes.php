<?php

// usa-se a palavra chave function


function soma($x, $y) {
    return $x + $y;
}

// é possível fazer um parametro ser obrigatóriamente de um tipo
function somar2 (int $x, $y) {
    return $x + $y;
}
// $x precisa ser do tipo inteiro.

// É possível colocar valores padrões nos parametros, para ser facultativo a serem passados no argumento
function soma3(int $x, $y = 0){
    return $x + $y;
}
// obs: valores padrões SÓ PODEM estar no FINAL dos parametros, depois que um tem valor padrão, todos em diante
// precisam ter, se não será lançado uma exceção

// É possível dizer qual é o tipo de retorno de uma função
function soma4($x, $y): float{
    return $x + $y;
}


echo "\nsoma 2 + 3 = ". soma(2, 3);
//echo "\nsoma2 2.2 + 3 = ". soma2(2.2, 3); // Fatal error
echo "\nsoma3 2 + 0 = ". soma3(2);
echo "\nsoma4 2.2 + 3 = ". soma4(2.2, 3);


// para uma função receber uma referencia da variavel passada usa-se o &, muito parecido com ponteiros do C:
function somarDois(&$x) {
    $x += 2;
}

$variavelQualquer = 0;
somarDois($variavelQualquer);
echo "\n\nVariavel Qualquer = ".$variavelQualquer."\n\n";



// para passar parametros fora de ordem se nomeia no argumento da chamada da função
function criarPessoa (string $nome, int $idade, string $sexo): array {
    return [
        'nome' => $nome,
        'idade' => $idade,
        'sexo' => $sexo
    ];
}

$pessoa1 = criarPessoa(idade: 45, nome: 'jubileu', sexo: 'M');

var_dump($pessoa1);
