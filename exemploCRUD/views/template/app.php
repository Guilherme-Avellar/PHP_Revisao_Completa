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
                <li><a href="/meus-livros" class="hover:underline">Meus Livros</a></li>
            </ul>

            <ul>
                <li><a href="/login" class="hover:underline">Fazer Login</a></li>
            </ul>
        </nav>
    </header>

    <main class="mx-auto max-w-screen-lg space-y-6">

        <!-- importa um arquivo "variavel", ou seja, não é 
        um arquivo único, o arquivo que será importado pode 
        variar de acordo do que valer o $view, alterando o 
        que se é visto.
        Neste caso "index" que foi passado la em index.php da root
        ficando: views/index.php-->
        <?php require "views/{$view}.view.php"; ?>

        <!-- lembrando essa $view é de outro arquivo que esta usando o app.php -->

    </main>
</body>
</html>