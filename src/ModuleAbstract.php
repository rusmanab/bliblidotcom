<?php
namespace Rusmanab\Blibli;

use Rusmanab\Blibli\BlibliClient;

abstract class ModuleAbstract{

    protected $client;

    public function __construct(BlibliClient $client)
    {
        $this->client = $client;
    }

    public function post($uri, $parameters, $methode="POST")
    {

        $request = $this->client->send($uri, $parameters, $methode);
        return $request;
    }

    public function printLabel($uri){
        $request = $this->client->printLabel($uri);
        return $request;
    }
    public function put($uri, $parameters)
    {
        $request = $this->client->put($uri, $parameters);
        return $request;
    }
}
