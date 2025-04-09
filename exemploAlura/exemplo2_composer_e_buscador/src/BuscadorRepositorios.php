<?php

namespace Automatiza\Buscador; // PSR-4: Automatiza\Buscador = src (o mapeamento do autoloader manual)

/*
    O ClientInterface define o contrato (interface) que o Client implementa. Você não é obrigado a usar os dois juntos,
    mas usar ClientInterface em vez de Client permite injeção de dependência mais flexível e testável, já que você pode
    trocar a implementação facilmente (ex: mockar em testes).
*/
use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class BuscadorRepositorios
{
    private ClientInterface $httpClient;
    private Crawler $crawler;

    // httpClient é uri base e crawler é uma passem de referencia para essa classe manipula-lo
    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;

    }

    // recebe o caminho específico do site, pois a uri base ja está guadada em httpClient
    public function buscar(string $url): array {
        // Junta a uri base com a url especifica que se quer para identificar a pagina web que se quer
        $resposta = $this->httpClient->request('GET', $url);

        // getBody é a instrução para pegar o html inteiro do endereço web, guarda em $html para ser usada depois
        $html = $resposta->getBody();

        // pega o html inteiro da página e armazena no crawler
        $this->crawler->addHtmlContent($html);

        // filtra para pegar apenas o que se quer da página, nesse caso, uma tag <a> dentro de um <h3>
        $elementosRepositorio = $this->crawler->filter('h3 a');

        // para preencher o array $repositorios com os elementos do site.
        $repositorios = [];

        foreach ($elementosRepositorio as $elemento) {
            // pega o texto que está na tag, nesse caso o texto que se está dentro do <a> do <h3>
            $repositorios[] = $elemento->textContent;
        }

        // Retorna o conteudo de texto das tags <a> em um array
        return $repositorios;
    }


}