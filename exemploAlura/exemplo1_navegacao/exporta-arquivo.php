<?php

// Esse arquivo vai receber o formulario de index.php
// A variavel nativa do php $_POST (superglobal) captura toda a informação do formulário
//var_dump($_POST);

// alguns exemplos de manipulação com essa infromação:
$arrayFilme = [
    'nome' =>$_POST['nome'],
    'anoLancamento' => $_POST['ano'],
    'nota' => $_POST['nota'],
    'genero' => $_POST['genero']
];

// criando um arquivo .json, e o preenchendo
file_put_contents('filme.json', json_encode($arrayFilme));

/* Porém o ideal é fazer o POST/rederect/GET
 * Quando o arquivo php recebe uma requisisão do tipo POST pelo servidor
 * deve se redirecionar para uma requisição do tipo GET.
 * E redirecionamentos no mundo web são feitos por cabeçalhos
 * */

// Para enviar uma informação por um cabeçalho, se usa o header()
header('Location: /sucesso.php?filme=' . $arrayFilme['nome']);
// OBS: depois do ? o navegador entende que o que for passado são parametros


