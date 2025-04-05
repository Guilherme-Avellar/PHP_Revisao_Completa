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

// É possível dizer qual é o tipo de retorno de uma função
function soma4($x, $y): float{
    return $x + $y;
}


echo "\nsoma 2 + 3 = ". soma(2, 3);
//echo "\nsoma2 2.2 + 3 = ". soma2(2.2, 3); // Fatal error
echo "\nsoma3 2 + 0 = ". soma3(2);
echo "\nsoma4 2.2 + 3 = ". soma4(2.2, 3);





