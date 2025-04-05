<?php


$vetor1 = [
    "nome" => "Robson",
    "idade" => 20,
    "sexo" => "M"
];


// json_encode()
// é uma função feita para transformar um código php na sintaxe json em formato de string
$vetor1 = json_encode($vetor1);
//var_dump($vetor1);

// json_decode()
// é a função oposta, ela transforma a sintaxe do código json na sintaxe php
$vetor1 = json_decode($vetor1, true);
//var_dump($vetor1);

// OBS: esse true do segundo parametro é para confirmar se quer transformar
// em array associativo. É um parametro opcional, se não for passado, transforma
// em objeto php o código json

// transformando de novo em uma string de sintaxe json
$vetor1 = json_encode($vetor1);

// para criar ou colocar a string do código json em um arquivo novo pode-se usar:

// file_put_contents()
// Essa função faz toda a tarefa de abrir o arquivo no modo certo, escrever e depois
// fechar o arquivo. Se o arquivo não existir, a função o cria. É possível fazer isso
// manualmente pelo php também, mas essa alternativa é mais rápida
file_put_contents(__DIR__ . '/arquivoCriadoEmCodigo.json', $vetor1);
// O primeiro parametro é o caminho absoluto do arquivo, com o seu formato, .php, ou .txt
// ou .json, etc. O segundo é o que vai ser escrito, o conteúdo que estará neste arquivo


// Para fazer o oposto. Transformar um arquivo json em código já feito em php

// file_get_contents()
// Função para pegar um conteudo do jeito que ele está, ou seja, sem modifica-lo originalmente
$conteudoJson = file_get_contents(__DIR__ . '/arquivoCriadoEmCodigo.json');

// transformar o arquivo em um array associativo, nesse caso é um json e está no formato certo
$contgeudoJson = json_decode($conteudoJson, true);

var_dump($contgeudoJson);


/*
 * MAIS FUNÇÕES DE MANIPULAÇÃO
    Ler somente uma linha usando a função fgets.
    Ler um número determinado de bytes do arquivo através de fread.
    Escrever em um arquivo usando fwrite.
    Navegar no arquivo para uma posição específica com fseek.

    OBS: conferir a documentação antes de usar:
    https://www.php.net/manual/en/ref.filesystem.php
*/







