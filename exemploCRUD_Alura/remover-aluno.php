<?php

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$prepareStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
// para configurar qual id se excluir (segundo parametro, value) e forçar a interpretação como inteiro do ?
$prepareStatement->bindValue(1, 4, PDO::PARAM_INT);

var_dump($prepareStatement->execute());

