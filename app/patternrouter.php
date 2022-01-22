<?php
namespace app;

class PatternRouter
{
    private function stripParams($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }

    public function route($uri)
    {
        //check for api route
        $api = false;
        if (str_starts_with($uri, "api/")) {
            $uri = substr($uri, 4);
            $api = true;
        }

        $defaultController = 'home';
        $defaultMethod = 'index';

        //ignore params
        $uri = $this->stripParams($uri);

        //get controller name from url
        $explodedUri = explode('/', $uri);

        //set controller name
        if (!isset($explodedUri[0]) || empty($explodedUri[0]))
            $explodedUri[0] = $defaultController;
        $controllerName = $explodedUri[0] . "controller";

        //set method name
        if (!isset($explodedUri[1]) || empty($explodedUri[1]))
            $explodedUri[1] = $defaultMethod;
        $methodName = $explodedUri[1];

        //set controller directory
        $filename = __DIR__ . '/controllers/' . $controllerName . '.php';
        if ($api)
            $filename = __DIR__ . '/api/controllers/' . $controllerName . '.php';
        if (file_exists($filename)) {
            require $filename;
        } else {
            http_response_code(404);
            die();
        }

        try {
            $controllerObject = new $controllerName;
            $controllerObject->{$methodName}();
        } catch (Exception $e) {
            http_response_code(404);
            die();
        }
    }
}