<?php

use Alura\Pdo\Domain\Model\Student;
require_once 'vendor/autoload.php';

// variavel que guardara uma strig com o endereço do arquivo
$databasePath = __DIR__ . '/banco.sqlite';

// Nesse exemplo usaremos apenas o primeiro parametro, para um exemplo introdutório
$pdo = new PDO('sqlite:' . $databasePath);

// Instancia o objeto que vai ser usado para armazenamento do exemplo
$student = new Student(null, 'Alan Turing', new \DateTimeImmutable('1912-06-23'));

// Insere as informações do objeto criado anteriormente. Obs: o id é gerado automaticamente (se não for passado) por ser uma PK
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";


var_dump($pdo->exec($sqlInsert));



/* OBS:
    O exec() retorna um inteiro contendo o número de registros afetados. Se você insere
    um registro, o número 1 é retornado. Se insere cinco registros, o número 5 é retornado.
    Se busca dados com SELECT, o número 0 é devolvido, já que nenhum registro foi afetado.
    Ou seja, ele executa um comando SQL e retorna o numero de elementos que esse comando
    alterou
*/
