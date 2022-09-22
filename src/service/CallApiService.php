<?php

namespace App\service;


use PHPUnit\Exception;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getTopMangas($page): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.jikan.moe/v4/top/manga?page=' . $page,
        );
        return $response->toArray();
    }

    public function getMangaById($id): array
    {
        try {
            $response = $this->client->request(
                'GET',
                'https://api.jikan.moe/v4/manga/' . $id,
            );
            $responseStatusCode = $response->getStatusCode();
            if ($responseStatusCode == 200) {
                $response = $response->toArray();
            } else {
                $response = array();
            }
        } catch (Exception $exception) {
            $response = $response->getStatusCode();
            dd('je comprend pas ce qui se passe... sur callapiservice' . $response);
        }
        return $response;
    }
//    https://api.jikan.moe/v4/manga?letter=Kimetsu

    public function getMangaBySearch($q): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.jikan.moe/v4/manga?q=' . $q,
        );
        return $response->toArray();
    }

}