<?php

use Alura\Pdo\Domain\Model\Student;
require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

// para se fazer uma query no banco usa-se o query() do obj PDO instanciado com o comando SQL que se quer. Ou seja
// guarda o comando SQL em uma variavel para ser usado depois
$statement = $pdo->query('SELECT * FROM students;');
// guardando em $studentDataList um array associativo dos estudantes, bem organizado para poder ser manipulado
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

//($studentDataList);

// Usa as informações organizadas do $studentDataList para instanciar objetos (nesse caso apenas 1, é o único no BD)
foreach ($studentDataList as $studentData) {
    $studentList[] = new Student(
        $studentData['id'],
        $studentData['name'],
        new \DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);






// Para pegar apenas um único elemento do BD:
$statementOne = $pdo->query('SELECT * FROM students WHERE id = 1;');
// Usa-se o fetch(), já que você não precisará de uma lista de arrays com informações de cada linha da tabela
$oneStudent = $statementOne->fetch(PDO::FETCH_ASSOC);
//var_dump($oneStudent);

// Uma estratégia para percorrer grandes volumes de dados é:
/*
while ($oneStudent = $statementOne->fetch(PDO::FETCH_ASSOC)) {
    $student = new Student(
        $oneStudent['id'],
        $oneStudent['name'],
        new \DateTimeImmutable($oneStudent['birth_date'])
    );
    // exemplo de operação, exibir a idade de todos os estudantes
    echo $student->age() . PHP_EOL;
}
*/
// por que esse while? Para não ocupar memória, ele pega a informação do BD, faz o que tem que ser feito dentro de 1
// loop e joga o objeto fora na próxima interação com o loop, não ocupando memória com infinitos objetos, e usando 1 por
// vez a cada loop.
// Ou seja em relação a tabela do BD o fetch retorna uma linha da tabela, enquanto o fetchAll retorna um array com todas
// as linhas do SELECT da tabela.
// E como sai do while? O PDO::FETCH_ASSOC que é o que a variavel $oneStudent esta utilizando, quando termina de
// percorrer uma informação, ele coloca o "cursor" na próxima informação, e se for chamado novamente da mesma forma
// ele lê apartir do "cursor" posto por ele mesmo, com o while executrando isso toda hora ele percorre o array inteiro,
// caso não haja informação onde estiver o "cursor de leitura" dele, ele retorna false, que é o que sai do while.
// Outros fetch funcionam da mesma forma, como o fetchColumn(), etc...



/* OBS:
 * O fetchAll() do query() pega tudo dublicado em dois formatos, array comum indexado começando de 0, e um array
 * associativo, com o nome dos atributos. Isso pode ser um problema. Exemplo: [0]["nome"] ou [0][0], primeiro
 * indice representa os alunos e o segundo os atributos do aluno específico.
 * O fetchAll() possui varios parametros. O default, ou seja, se não for passado nada, será o PDO::FETH_BOTH,
 * que faz exatamente o que foi descrito a cima. Mas é possível passar parametros que mudem esse comportamento, como:

PDO::FETCH_ASSOC: Retorna cada linha como um array associativo, onde a chave é o nome da coluna, e o valor é o valor da
coluna em si

PDO::FETCH_BOTH (esse é o padrão): Retorna cada linha como um array com as chaves sendo tanto o índice da coluna
(começando do 0) quanto o nome da coluna, ou seja, os valores acabam ficando duplicados nesse formato

PDO::FETCH_CLASS: Cada linha do resultado é retornado como uma instância da classe especificada em outro parâmetro. A
classe não pode ter parâmetros no construtor e cada coluna terá o seu valor atribuído a uma propriedade de mesmo nome
no objeto criado

PDO::FETCH_INTO: Funciona de forma muito semelhante ao FETCH_CLASS, mas ao invés de criar o objeto para você, ele
preenche um objeto já criado com os valores buscados

PDO::FETCH_NUM: Retorna cada linha como um array, onde a chave é o índice numérico da coluna, começando do 0, e o valor
é o valor da coluna em si
*/
