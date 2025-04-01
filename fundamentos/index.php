<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundamentos</title>
</head>
<body>
    <h1>Primeiro exemplo</h1>
    <div>
        <!-- para iniciar um código php "dentro de um html" -->
        <?php 
            // echo imprime na tela do navegador
            echo "Hello World!";
        ?>
        <!-- obs: arquivos .html não entendem códigos php -->

        <?php 
            // Exemplo de variavel
            echo "<br><br> exemplo de variavel: <br>";
            $contador = 0;
            echo "contador: " . $contador . "<br>";
            $contador = 1;
            echo "contador: " . $contador . "<br>";
            $contador = 2;
            echo "contador: " . $contador . "<br>";
            // obs: sempre começa com o sinal "$", e "." serve para concatenar

            // para não concatenar, pode-se fazer:
            echo "<br>exemplo extra, contador: {$contador} <br>";

            // obs 2: não precisa esclarecer o tipo da variavel, o php já entende
            $stringQualquer = "João";
            $floatQualquer = 1.5;
            echo "<br>String: " . $stringQualquer . ", Float: " . $floatQualquer . "<br>";
            
        ?>

        <!-- Forma mais abreviada de impreção no navegador, em vez de echo: -->
        <?="<br><br>Forma mais simples de imprimir variaveis, contador: " . $contador?>

        <!-- É possível combar tags com códigos php -->
        <h2><?php echo "<br>Exemplo de tag junto com código php, contador: " . $contador?></h2>

        <?php 
            // Exemplo de if else com aprovação de aluno
            $nota = 7.5;

            // Estrutura condicional com if, else if e else
            if ($nota >= 9) {
                echo "<br><br>Aluno aprovado com excelência! Nota: " . $nota;
            } else if ($nota >= 6) {
                echo "<br><br>Aluno aprovado. Nota: " . $nota;
            } else {
                echo "<br><br>Aluno reprovado. Nota: " . $nota;
            }
        ?>

        <!-- outra forma de se fazer, (mais utilizada) -->
        <?php if ($nota >= 9): ?>
            <br><span style="color: green;">Aluno aprovado com excelência! Nota: <?= $nota ?></span>
        <!-- else e if precisam ser juntos dessa forma de programar -->
        <?php elseif ($nota >= 6): ?>
            <br><span style="color: blue;">Aluno aprovado. Nota: <?= $nota ?></span>
        <?php else: ?>
            <br><span style="color: red;">Aluno reprovado. Nota: <?= $nota ?></span>
        <?php endif; ?>
        <!-- dessa forma há mais praticidade em estilizar o documento -->
    </div>

    <?php $condicao = true; ?>
    <!-- É possível por código php dentro de uma tag -->
    <div 
        <?php if($condicao): ?>
            style = "background-color: green;"
        <?php endif; ?>
    >
        <h2>Exemplo de php dentro de uma tag</h2>
    </div>

    <!-- Exemplo de array em php -->
    <div>
        <?php
            $arrayQualquer = ["João", "Maria", "José",];

            // Declaração de um array vazio
            $arrayQualquer2 = [];
            // Adicionando valores ao array vazio
            $arrayQualquer2[] = "João";
            $arrayQualquer2[] = "Maria";
            $arrayQualquer2[] = 2025;
            $arrayQualquer2[] = 1.5;
        ?>

        <?php
            // foreach é uma estrutura de controle (nativo da linguagem) que percorre 
            // o array, feito para arrays
            foreach($arrayQualquer as $nome) {
                //echo "<br>Nome: " . $nome;
                // exemplo mais trabalhado:
                echo "<li>" . $nome . "</li>";
            }
        ?>

        <!-- array dentro de array -->
        <?php
            $arrayComplexo = [
                [1, 2, 3],
                [4, 5, 6],
                [7, 8, 9],
            ];
            echo "array em forma de matriz: <br>";
            foreach($arrayComplexo as $indice) {
                // coloca se o indice dentro da variavel que percorre o array
                echo "<li>{$indice[1]}</li>";
            }


            // Não há tipo específico para o array
            $arrayComplexo2 = [
                [1, 2, 3],
                [4, 5, 6],
                [7, 8, 9],
                "João",
                "Maria",
                "José",
                1.5,
                true
            ];

        ?>

        <!-- Outra forma de usar o foreach
            <?php foreach($arrayComplexo as $indice): ?>
                echo "<li>{$indice[1]}</li>";
            <?php endforeach; ?> 
        -->

        <?php
            // o que seria a tupla ou "objetoJS" do php
            $tupla = [
                "nome" => "João",
                "idade" => 20,
                "altura" => 1.75,
                "casado" => false,
            ];
            // para acessar o valor de uma chave, usa-se o nome da chave entre colchetes
            echo "<br>Nome: " . $tupla["nome"] . ", Idade: " . $tupla["idade"] . ", Altura: " . $tupla["altura"];
        
            $tupla2 = [
                [
                    "nome" => "João",
                    "idade" => 20,
                    "altura" => 1.75,
                    "casado" => false,
                ],
                [
                    "nome" => "Maria",
                    "idade" => 25,
                    "altura" => 1.65,
                    "casado" => true,
                ],
            ];
        ?>

        <?php foreach($tupla2 as $indice): ?>
            <li>Nome: <?= $indice["nome"];?></li>
            <!-- em vez de nome poderia ser uma variavel com o valor "nome", 
            ou outra chave da tupla -->
        <?php endforeach; ?> 

    </div>

    <!-- funções em php -->
    <div>
        <?php 
            // É possovel por valores padroes para os parametros
            function soma($a, $b = 0) {
                return $a + $b;
            }
            // Se o parametro não for passado, o valor usado pela função será o padrão

            // chamando a função
            echo "<br><br>Resultado da soma 3 + 5 = " . soma(3, 5);
        ?>
        <!-- chamando a função fora do bloco -->
        <strong><?php echo "<br>Função chamada fora do bloco, 2 + 3 = " . soma(2, 3)?></strong>

        <!-- is_null(), função nativa do php que verifica se uma variavel é nula -->

        <!-- Funções anônimas -->
        <?php 
            $variavelFuncao = function($a, $b = 0) {
                return $a + $b;
            };
            // repare no ponto e vírgula no final, pois é uma atribuição de variavel

            // chamando a função anônima
            echo "<br><br>Resultado da soma 3 + 0 = " . $variavelFuncao(3);
            // chama no formato de variavel com parametros
        ?>

        <!-- Possui uma mecânica mais parecida com JS -->
    </div>

    <!-- função nativa array_filter(), filtra um array podendo passar uma função anônima -->
    <div>
        <?php 
            $filtrando = array_filter($tupla2, function($indice) {
                return $indice["idade"] >= 25;
            });
            // filtra o array, retornando apenas os valores que atendem a condição

            // Para pegar o nome do item que foi filtrado e armazenado no "filtrando":
            foreach ($filtrando as $item) {
                $nomeFiltrando = $item['nome'];
            }
            // Poderia ter usado diretamente o $filtrando[1]['nome'], (mas não é a melhor forma)
            // É 1 e não 0 pois a função não reindexa o array que esta sendo filtrado,
            // então é o mesmo índice do array original
        ?>
        <p>Nome do elemento filtrado de tupla2: <?= $nomeFiltrando?></p>
        

    </div>
    
</body>
</html>

<!-- 
    no terminal digitar:
        php -S localhost:8888
    para criar o servidor que ja vem no php e ver a aplicação
    obs: o servidores procuram arquivos com o nome index
    que é o arquivo principal da aplicação, s não houver um
    arquivo com este nome, haverá um erro
-->