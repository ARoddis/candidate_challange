<?php

class DeleteController
{
    public function run($postParams)
    {
        global $_GET;

        $id = $_GET['ID'];

        if ($id != $postParams['ID']) {
            die("This should not happen!");
        }

        $data = json_decode(file_get_contents(__DIR__ . "/../data.json"));

        unset($data[$id]);

        http_response_code(200);

        file_put_contents(__DIR__ . "/../data.json", $data);

        echo json_encode($entry);

        exit;
    }
}