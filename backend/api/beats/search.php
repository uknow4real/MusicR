<?php

// Allow every Webpage to use the service
header("Access-Control-Allow-Origin: *");
// Defines the responding Content-Type
header("Content-Type: application/json; charset=UTF-8");
// Defines the supported Methods
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$root = $_SERVER['DOCUMENT_ROOT'];

require_once "$root/Musicr/backend/api/config/database.php";
require_once "$root/Musicr/backend/api/objects/beat.php";

$method = $_SERVER['REQUEST_METHOD'];

$database = new Database();
$db = $database->getConnection();

$beat = new Beat($db);

$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

$id = isset($request[0]) && !empty($request[0]) ? $request[0] : NULL;

$stmt = $beat->search("ID", $id);
$num = $stmt->rowCount();


switch ($method) {
    case 'GET':
        if ($num>0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                extract($row);

                $link = array(
                    "link" => $link,
                );
            }
            http_response_code(200);
            $products = json_encode($link);
            echo $products;
        }
}