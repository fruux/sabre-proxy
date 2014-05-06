<?php

namespace Sabre\Proxy;

use Sabre\HTTP\Sapi;
use Sabre\HTTP\Response;
use Sabre\HTTP\Client;

class Proxy {

    protected $logFile;

    protected $sapi;

    function __construct() {

        $this->sapi = new Sapi();

    }

    function start() {

        $request = $this->sapi->getRequest();
        $response = new Response();

        $client = new Client();
        $response = $client->send($request);
 
        $this->sapi->sendResponse($response);

    }

}
