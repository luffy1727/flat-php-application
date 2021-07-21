<?php

namespace Boozt\Controller;

use Boozt\Service\AnalyticService;

class AnalyticController
{
    private $service;

    private $requestMethod;

    private $path;

    private $params;

    public function __construct($db, $requestMethod, $path, $params)
    {
        $this->service = new AnalyticService($db);
        $this->requestMethod = $requestMethod;
        $this->path = $path;
        $this->params = [];
        foreach($params as $param) {
            $tmp = explode( '=', $param);
            $this->params[$tmp[0]] = $tmp[1];
        }
    }

    public function processRequest()
    {
        switch ($this->path) {
            case 'number':
                $response = $this->getCountNumbers();
                break;
            case 'graph':
                $response = $this->getGraphNumbers($this->params);
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function getCountNumbers()
    {
        $result = $this->service->findCountNumbers();

        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);

        return $response;
    }

    private function getGraphNumbers($params)
    {
        $result = $this->service->findGraphNumbers($params);

        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);

        return $response;
    }

    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}
