<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class Server {
    public static function handle()
    {
        $postParams = $_REQUEST;

        require(__DIR__ . '/controller/' . $_REQUEST['CONTROLLER']);

        $className = str_replace(".php", "", $_REQUEST['CONTROLLER']);

        $controller = new $className();

        $controller->run($postParams);
    }
}

(new Server())->handle();