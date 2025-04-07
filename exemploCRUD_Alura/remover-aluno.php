<?php

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$prepareStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
// para configurar qual id se excluir (segundo parametro, value) e forçar a interpretação como inteiro do ?
$prepareStatement->bindValue(1, 4, PDO::PARAM_INT);

var_dump($prepareStatement->execute());

