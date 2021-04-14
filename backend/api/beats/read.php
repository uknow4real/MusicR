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

$stmt = $beat->read();
$num = $stmt->rowCount();


switch ($method) {
    case 'GET':
        if ($num>0) {
            $beats_arr=array();
            $beats_arr["beats"]=array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                extract($row);

                $beat_item = array(
                    "id" => $id,
                    "title" => $title,
                    "path" => $path,
                    "link" => $link,
                    "producer" => $producer,
                    "beatkey" => $beatkey,
                    "bpm" => $bpm,
                    "price" => $price
                );

                array_push($beats_arr["beats"], $beat_item);
            }
            http_response_code(200);
            $products = json_encode($beats_arr);
            echo $products;
        } else {
            http_response_code(404);

            echo json_encode(
                array("message" => "No products found.")
            );
        }
        break;
}
