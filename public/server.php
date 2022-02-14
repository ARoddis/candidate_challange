<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class Server {
    public static function handle()
    {
        $postParams = $_REQUEST;

        $controllerFound = (bool) preg_match("#/([\w]+)\?#", $_SERVER["REQUEST_URI"], $match);

        $controllerName = $match[1] ?? "index";

        $controllerClassName = ucfirst($controllerName) . "Controller";

        require(__DIR__ . '/controller/' . $controllerClassName . ".php");

        $controller = new $controllerClassName();

        $controller->run($postParams);
    }
}

(new Server())->handle();