<?php

// O autoload.php, é um arquivo feito pelo composer responsável por realizar o autoload de classes, eliminando
// a necessidade de require para os arquivos do /vendor, mas ainda exigindo o use, para importar as classes
require 'vendor/autoload.php';
// É possível fazer esse tipo de arquivo manualmente, mas o composer já nos trás pronto. inclusive é possível
// adicionar arquivos feitos mannualmente por nós a esse autoload que o composer fornece

// classe feita manualmente. Não precisa mais importa-la com require, pois foi configurado o autoload no composer.json
//require 'src/BuscadorRepositorios.php';
use Automatiza\Buscador\BuscadorRepositorios;

// OBS: para o autoload funcionar depois de configurado, precisa ainda rodar no terminal: composer dumpautoload

//O pacotes guzzlehttp/guzzle serve para executar requisições HTTP de alto nível

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


// teste de autoload manual ClasseAutoloadTeste.php e FuncoesAutoloadTeste.php
//olaMundo();
//ClasseAutoloadTeste::olaMundo();
//exit(); // para a execução do programa
// OBS: Precisa usar o comando: composer dumpautoload, depois de ter configurado o composer.json


$client = new Client(['base_uri' => 'https://github.com']);
$crawler = new Crawler();

// Mesmo o Crawler sendo criado neste arquivo sem nada, ele é passado por referência para a classe.
// Alterações feitas dentro da classe afetam o mesmo objeto aqui. Permetindo usa-los fora da classe
// com as informções que foram manipuladas lá. (não é o caso desse exemplo, pois ele não é usado depois)
$buscador = new BuscadorRepositorios($client, $crawler);

// buscador() é a função feita manualmente. Ele executa a busca, que retorna o
// array de strings limpo, com o conteudo desejado
$repositorios = $buscador->buscar('/Guilherme-Avellar?tab=repositories');

foreach ($repositorios as $repositorio) {
    echo $repositorio;
}





/*      CODIGO ANTIGO

// O autoload.php, é um arquivo feito pelo composer responsável por realizar o autoload de classes
require 'vendor/autoload.php';
// É possível fazer esse tipo de arquivo manualmente, mas o composer já nos trás pronto

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

// objeto do Guzzle
$client = new Client();

// request com o GET pega infromações de uma url
$resposta = $client->request('GET', 'https://github.com/Guilherme-Avellar?tab=repositories');

// getBody pega o html da url adquirida pela $resposta
$html = $resposta->getBody();


// objeto do Symfony Crawler
$crawler = new Crawler();

// precisa do symfony/css-selector", usar o composer require no terminal
$crawler->addHtmlContent($html);

// $informacoes guardará a tag, classe, etc, do html da pagina com a infromação que eu quero pegar do site.
$informacoes = $crawler->filter('h3 a');
// (nesse caso os nomes do meu repositorio)


// lembrando: informacao é a variavel que vai assumir o valor de cada um dos elementos de informacoes
foreach ($informacoes as $informacao) {
    // os elementos dentro de informacoes são elementos do DOM
    echo $informacao->textContent;
}



*/


