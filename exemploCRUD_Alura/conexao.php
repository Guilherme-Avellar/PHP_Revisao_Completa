<?php

// a função pdo aceita 3 parametros (alem de parametros extras opcionais também)
// 1 - A primeira é uma string para conexão, que informa qual driver estamos utilizando com detalhes
// específico de cada banco de dados (separados por : cada um)
// 2 - usuario
// 3 - senha

// mais informações em https://www.php.net/manual/en/book.pdo.php

// variavel que guardara uma strig com o endereço do arquivo
$databasePath = __DIR__ . '/banco.sqlite';

// Nesse exemplo usaremos apenas o primeiro parametro, para um exemplo introdutório
$pdo = new PDO('sqlite:' . $databasePath);

echo "\nconectei\n\n";

// Cria a tabela no BD
$pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');

