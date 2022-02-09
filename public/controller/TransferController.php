<?php

class TransferController
{
    public function run($postParams)
    {
        global $_GET;

        $id = $_GET['ID'];

        if ($id != $postParams['ID']) {
            die("This should not happen!");
        }

        $id2 = $_GET['ID2'];

        if ($id2 != $postParams['ID2']) {
            die("This should not happen!");
        }

        $data = json_decode(file_get_contents(__DIR__ . "/../data.json"), true);

        for($i = 0; $i < count($data); $i++) {
            $_GET["data"] = $data[$i];

            if (!is_int($_GET["data"]["id"])) {
                die("id must be int");
            }

            if (!is_string($_GET["data"]["name"])) {
                die("name must be string");
            }

            if (!is_float($_GET["data"]["price"])) {
                die("price must be float");
            }
        }

        $entry = $data[$id];

        $dbh = new PDO('mysql:host=mariadb;dbname=foodist', "foodist", "foodist");

        $dbh->query("insert into data (id, name, price) values (" . $id2 . ", \"" . $_GET['data']['name'] . "\", " . $_GET['data']['price'] . ")");

        http_response_code(200);

        echo json_encode($entry);

        exit;
    }
}