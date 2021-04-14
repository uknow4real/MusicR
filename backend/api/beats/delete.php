<?php

// Allow every Webpage to use the service
header("Access-Control-Allow-Origin: *");
// Defines the responding Content-Type
header("Content-Type: application/json; charset=UTF-8");
// Defines the supported Methods
header("Access-Control-Allow-Methods: DELETE");

$root = $_SERVER['DOCUMENT_ROOT'];

$host = $_SERVER['HTTP_HOST'];

require_once "$root/Musicr/backend/api/config/database.php";
require_once "$root/Musicr/backend/api/objects/beat.php";

$method = $_SERVER['REQUEST_METHOD'];

$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

$id = isset($request[0]) && !empty($request[0]) ? $request[0] : NULL;

$database = new Database();
$db = $database->getConnection();

$beat = new Beat($db);

if ($method == 'DELETE') {
    if ($beat->delete($id) == true) {
        echo "DELETED";
    } else {
        echo "NOT DELETED";
    }
}