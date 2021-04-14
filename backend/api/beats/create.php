<?php

header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$root = $_SERVER['DOCUMENT_ROOT'];

require_once "$root/Musicr/backend/api/config/database.php";
require_once "$root/Musicr/backend/api/objects/beat.php";

$database = new Database();
$db = $database->getConnection();

$beat = new Beat($db);

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->title) && !empty($data->id) && !empty($data->path) && !empty($data->producer) && !empty($data->beatkey)
    && !empty($data->bpm) && !empty($data->price)) {

    $beat->title = $data->title;
    $beat->id = $data->id;
    $beat->path = $data->path;
    $beat->producer = $data->producer;
    $beat->beatkey = $data->beatkey;
    $beat->bpm = $data->bpm;
    $beat->price = $data->price;

    if ($beat->create()) {
        http_response_code(201);

        echo json_encode(array("message" => "Product was created."));
    } else {

        http_response_code(503);

        echo json_encode(array("message" => "Product was created."));
    }
} else {

    http_response_code(400);

    echo json_encode(array("message" => "Product was created."));
}