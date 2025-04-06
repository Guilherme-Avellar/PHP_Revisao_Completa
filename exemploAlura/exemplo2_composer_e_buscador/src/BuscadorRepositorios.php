<?php

namespace Automatiza\Buscador; // PSR-4: Automatiza\Buscador = src (o mapeamento do autoloader manual)

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class BuscadorRepositorios
{
    private ClientInterface $httpClient;
    private Crawler $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;

    }

    public function buscar(string $url): array {
        $resposta = $this->httpClient->request('GET', $url);

        // getBody pega o html da url adquirida pela $resposta
        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);

        $elementosRepositorio = $this->crawler->filter('h3 a');
        $repositorios = [];

        // para preencher o array $repositorios com os elementos do site.
        foreach ($elementosRepositorio as $elemento) {
            $repositorios[] = $elemento->textContent;
        }
        // Precisa fazer isso pois $elementosRepositorio não é um array "limpo", dessa forma vc faz um array com elementos

        return $repositorios;
    }


}