
<?php
// chega nessa pagina pelo link passado: href="/livro.php?id=<?=$livro["id"] ? >
// ou seja passa o id do livro pela url

//var_dump($_REQUEST); // array(1) { ["id"]=> string(1) "1" } , se clicar no primeiro

// para pegar apenas o id do livro:
$id = $_REQUEST["id"];

// importa o arquivo dados.php, que tem os livros
require 'dados.php';

/*
// se quiser ver detalhadamente
echo "<pre>"; // esse <pre> motra uma pre-visualização de algo, parecido com pseudo-código
var_dump($livros); // pega o vetor livros de dados.php, os arquivos estão se comunicando
// var_dump($_SERVER) // se quiser ver todas informações do servidor, pode haver algo útil
echo "</pre>";
*/

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

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-stone-950 text-stone-300">

    <header class="bg-stone-900">
        <nav class="mx-auto max-w-screen-lg flex justify-between px-8 py-4"> 

            <div class="font-bold text-xl tracking-wide">Book Wise</div>

            <ul class="flex space-x-4 font-bold">
                <li><a href="/" class="text-emerald-600">Explorar</a></li>
                <li><a href="/meus-livros.php" class="hover:underline">Meus Livros</a></li>
            </ul>

            <ul>
                <li><a href="/login.php" class="hover:underline">Fazer Login</a></li>
            </ul>
        </nav>
    </header>

    <main class="mx-auto max-w-screen-lg space-y-6">

        <?= $livro['titulo']?>
        <div class="p-2 rounded border-stone-800 border-2 bg-stone-900">
            <div class="flex">
                <div class="w-1/3">imagem</div>

                <div class="space-y-1">
                    <a href="/livro.php?id=<?=$livro["id"]?>" class="font-semibold hover:underline"><?=$livro["titulo"]?></a>
                    <div class="text-xs italic"><?=$livro["autor"]?></div>
                    <div class="text-xs italic">⭐⭐⭐⭐⭐(3 Avaliações)</div>
                </div>

            </div>

            <div class="text-sm mt-2">
                <?=$livro["descricao"]?>
            </div>
        </div>
    </main>
</body>
</html>