<?php
// importa o arquivo dados.php, que tem os livros
require 'dados.php';


//$view = "index"; // variavel que vai ser passada para o app.php, para ele saber qual view carregar
//require "views/template/app.php"; // importa o app.php, que é o template do site
// O visual esta em livro.view.php, que é carregado pelo app.php através da variavel $view, que 
// é quem decide o caminho do que é carregado la em app.php, e depois o código é jogado aqui com
// require "views/template/app.php";

// refatorando linha 6-10
view('index', ['livros' => $livros]); // chama uma função que faz o mesmo

// o paremetro ['livro' => $livro]

?>