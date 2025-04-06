<?php

// O autoload.php, é um arquivo feito pelo composer responsável por realizar o autoload de classes, eliminando
// a necessidade de require para os arquivos do /vendor, mas ainda exigindo o use, para importar as classes
require 'vendor/autoload.php';
// É possível fazer esse tipo de arquivo manualmente, mas o composer já nos trás pronto

// classe feita manualmente
require 'src/BuscadorRepositorios.php';

//O pacotes guzzlehttp/guzzle serve para executar requisições HTTP de alto nível

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Automatiza\Buscador\BuscadorRepositorios;


$client = new Client(['base_uri' => 'https://github.com']);
$crawler = new Crawler();

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


