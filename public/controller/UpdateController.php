<?php

class UpdateController
{
    public function run($postParams)
    {
        global $_GET;

        $id = $_GET['ID'];

        if ($id != $postParams['ID']) {
            die("This should not happen!");
        }

        $data = json_decode(file_get_contents(__DIR__ . "/../data.json"));

        $entry = $data[$id];

        http_response_code(200);

        if(!is_int($_GET["data"]["id"])){
            die("id must be int");
        }

        if(!is_string($_GET["data"]["name"])){
            die("name must be string");
        }

        if(!is_float($_GET["data"]["price"])){
            die("price must be float");
        }

        array_merge($entry, $_GET["data"]);

        file_put_contents(__DIR__ . "/../data.json", $entry);

        echo json_encode($entry);

        exit;
    }
}