<?php


// esses 3 pontos (...$dump) são o operador de "resto" do php, parecido com JS
function dd(...$dump) {
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";
    die();
    // esse die() é uma função nativa do php que interrompe a execução do script
    // e não exibe nada na tela do navegador depois disso
}
