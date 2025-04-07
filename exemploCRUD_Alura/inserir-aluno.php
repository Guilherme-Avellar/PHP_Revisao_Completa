<?php

use Alura\Pdo\Domain\Model\Student;
require_once 'vendor/autoload.php';

// variavel que guardara uma strig com o endereço do arquivo
$databasePath = __DIR__ . '/banco.sqlite';

// Nesse exemplo usaremos apenas o primeiro parametro, para um exemplo introdutório
//$pdo = new PDO('sqlite:' . $databasePath);

// Para reutilizar o mesmo código, foi feito uma classe para agilizar:
$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

// Instancia o objeto que vai ser usado para armazenamento do exemplo
$student = new Student(
    null,
    "Maria Da Silva",
    new \DateTimeImmutable('2001-12-22')
);

// Insere as informações do objeto criado anteriormente. Obs: o id é gerado automaticamente (se não for passado) por ser uma PK
//$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";
//var_dump($pdo->exec($sqlInsert));

/*
// Porém, da forma que foi feito essa variavel $sqlInsert, ela permite ataques de SQL insertion, para resolver isso:
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";
// Os ? são placeholders usados em prepared statements (declarações preparadas). Eles representam valores que serão passados depois
$statement = $pdo->prepare($sqlInsert);
// bindValue() vai analizar os dados e modificar os que parecerem maliciosos
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));
// Por fim se executa. O execute() retorna false se a tabela não foi alterada e true se foi.
if($statement->execute()){
    echo "Aluno inserido com sucesso!";
}
*/
// Mas há uma forma mais legível de ser feita, sem esses ?, basta usar a sintaxe :algumaCoisa, com os dois pontos (:)
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:nome, :birth_date);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':nome', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
if($statement->execute()){
    echo "Aluno inserido com sucesso!";
}
// fica mais legível com as variaveis nomeadas do prepare



/* OBS:
    O exec() retorna um inteiro contendo o número de registros afetados. Se você insere
    um registro, o número 1 é retornado. Se insere cinco registros, o número 5 é retornado.
    Se busca dados com SELECT, o número 0 é devolvido, já que nenhum registro foi afetado.
    Ou seja, ele executa um comando SQL e retorna o numero de elementos que esse comando
    alterou
*/
