<?php

require_once "config/headers.php";

require_once "Connection.php";
require_once "Request.php";


$data = [];

$method         = $_REQUEST['method']   ?? null;

$gameId         = $_REQUEST['id']       ?? 0;
$gameName       = $_REQUEST['name']     ?? null;
$gamePrice      = $_REQUEST['price']    ?? null;
$gameCompany    = $_REQUEST['company']  ?? null;
$gameCategory   = $_REQUEST['category'] ?? null;

$request = new Request;
$request->setId($gameId);


if ($method === "post") {
    if (isset($gameName, $gamePrice, $gameCompany, $gameCategory)) {
        try {
            $request->setName($gameName);
            $request->setPrice($gamePrice);
            $request->setCompany($gameCompany);
            $request->setCategory($gameCategory);

            $data['games'] = $request->createGame();
        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }
    } else {
        $data['message'] = "Please set all data";
    }
}

if ($method === "get") {
    try {
        $data['games'] = $request->readGames();

        $data['total'] = count($data['games']);
    } catch (Exception $e) {
        $data['message'] = $e->getMessage();
    }
}




die(json_encode($data));