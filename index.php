<?php

require_once "Connection.php";
require_once "CrudRequests.php";

header("Content-Type: Application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

define('DB_HOST',       "localhost");
define('DB_USER',       "root");
define('DB_PASSWORD',   "");
define('DB_NAME',       "game-store");

$result = [];

$data = new GameRequests;
$data->setId(2);
$result['games'] = $data->readGames();

// print_r($result);
die(json_encode($result));


// try {

//    $connection = Connection::getConnection();
//    $query      = $connection->query("SELECT game_name, price, company FROM games");
//    $allGames   = $query->fetchAll(PDO::FETCH_ASSOC);

//    die(json_encode($allGames));
// } catch (Exception $e) {

//    $result['error'] = $e->getMessage();
//    die(json_encode($result));
// }
