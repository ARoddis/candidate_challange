<?php

class IndexController
{
    public function run($postParams)
    {
        $data = json_decode(file_get_contents(__DIR__ . "/../data.json"));

        http_response_code(200);

        echo json_encode($data);

        exit;
    }
}