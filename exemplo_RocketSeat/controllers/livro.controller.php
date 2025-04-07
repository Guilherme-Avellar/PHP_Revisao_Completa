<?php


$id = $_REQUEST["id"];
$db = new DB;
$livro = $db->livro($id);


view('livro', compact('livro'));


/* 
    codigo anterior:

// importa o arquivo dados.php, que tem os livros
require 'dados.php';

//var_dump($_REQUEST); // array(1) { ["id"]=> string(1) "1" } , se clicar no primeiro

// para pegar apenas o id do livro:
$id = $_REQUEST["id"];
*/
/*
// se quiser ver detalhadamente
echo "<pre>"; // esse <pre> motra uma pre-visualização de algo, parecido com pseudo-código
var_dump($livros); // pega o vetor livros de dados.php, os arquivos estão se comunicando
// var_dump($_SERVER) // se quiser ver todas informações do servidor, pode haver algo útil
echo "</pre>";
*/

/*
// filtrando a variavel $livros para a variavel $filtrado
$filtrado = array_filter($livros, function($l) use($id) {
    return $l["id"] == $id; // linha 9
});
// obs: esse use() é uma funcionalidade especifica de funções anonimas do php,
// é usado para importar variaveis do escopo externo para dentro da função

// passando o primeiro elemento para a variavel $livro (SEM O S), pois o 
// array_filter retorna um array
$livro = array_pop($filtrado); 
// array_pop() remove o último elemento de um array e o retorna, como só tem um elemento,
// ele pega o unico elemento e remove de filtrado. Isso evita erros pois se filtrado estiver
// vazio ele retorna null

//$view = "livro"; // variavel que vai ser passada para o app.php, para ele saber qual view carregar
//require "views/template/app.php"; // importa o app.php, que é o template do site
// O visual esta em livro.view.php, que é carregado pelo app.php através da variavel $view, que 
// é quem decide o caminho do que é carregado la em app.php, e depois o código é jogado aqui com
// require "views/template/app.php";

// refatorando linha 32-36
view('livro', ['livro' => $livro]); // chama uma função que faz o mesmo

// o paremetro ['livro' => $livro]
*/