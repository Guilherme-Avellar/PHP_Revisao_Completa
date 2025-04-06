<?php

// concatenação
$stringQualquer = "Hello" . " World";
// é feita com .

// interpolação
$stringQualquer2 = "Frase da primeira string: $stringQualquer, com parenteses: {$stringQualquer}";
// é feita com aspas duplas "", não funciona com aspas simples ''

//echo "\n\n" .$stringQualquer . "\n\n" . $stringQualquer2 . "\n\n";



// Funções de manipulação de Strings

$stringQualquer3 = "www.algumSite.com/";

// strpos()
// string position, é uma função que busca em que posição da string está uma subsrting ou carater.
// Muito usado pegar a posição do que se quer e manipular depois. Strings são consideradas arrays de
// caracteres começando do zero
echo "\n\n" . 'posição da "/" na stringQualquer3 = ' . strpos($stringQualquer3, '/');


// substr()
// sub string, é uma função que pega um trcho da string original
echo "\n\n[2] a [5] de www.algumSite.com/ = ";
var_dump(substr($stringQualquer3, 2, 5));


// para conhecer mais funções de manipulação de texto https://www.php.net/manual/en/ref.strings.php

