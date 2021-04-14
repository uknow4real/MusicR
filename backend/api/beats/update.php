<?php

// Allow every Webpage to use the service
header("Access-Control-Allow-Origin: *");
// Defines the responding Content-Type
header("Content-Type: application/json; charset=UTF-8");
// Defines the supported Methods
header("Access-Control-Allow-Methods: PUT");

$root = $_SERVER['DOCUMENT_ROOT'];

require_once "$root/Musicr/backend/api/config/database.php";
require_once "$root/Musicr/backend/api/objects/beat.php";

$method = $_SERVER['REQUEST_METHOD'];

$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

$id = isset($request[0]) && !empty($request[0]) ? $request[0] : NULL;
$title = isset($request[1]) && !empty($request[1]) ? $request[1] : NULL;

$database = new Database();
$db = $database->getConnection();

$beat = new Beat($db);

if ($method == 'PUT') {
    if ($beat->update($title, $id) == true) {
        echo "UPDATED";
    } else {
        echo "NOT UPDATED";
    }
}