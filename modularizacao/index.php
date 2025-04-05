<?php

// Para importar um arquivo se usa a palavra-chave: require
//require "funcoesExemplo.php";

// OBS: o php é flexivel na busca de um arquivo, se o programador errar caminho, o php
// ainda tentará buscar pelo nome do arquivo na mesma pasta antes de lançar o erro.
// Porém, é recomendado por o caminho correto na importação, para evitar problemas.

// Para evitar essa mecânica do php de procurar arquivos em outros lugares, pode-se usar
// caminhos absolutos quando for importar algo.
// Para não ter o trabalho de digitar o caminho inteiro, o php disponibiliza a varivel
// __DIR__ que diz o caminho inteiro da pasta em que o arquivo que ele foi usado está
require __DIR__ . '/funcoesExemplo.php';

echo "\n\n" . '__DIR__ desse arquivo: '. "\n" . __DIR__ . '/funcoesExemplo.php' . "\n\n";

$exemplo = 9;
// função que está no outro arquivo
potenciaDe2($exemplo);
echo "\nexemplo = " . $exemplo;


// OBS: Poderia se usar a palavra-chave include para importar um arquivo, mas não é recomendado
// pois caso o arquivo não seja aberto (por um erro ou qualquer outro motivo) o php executará o
// código mesmo assim. Então normalmente se usa pra um arquivo que não faz muita diferença.
//include __DIR__ . '/funcoesExemplo.php';


/* include_once e require_once:
As declarações include_once e require_once incluem e avaliam o arquivo informado durante a
execução do script da mesma forma que include e require, mas com uma única diferença: se o
código do arquivo já foi incluído, não o fará novamente. Como o nome sugere, o arquivo será
incluído somente uma vez.*/






