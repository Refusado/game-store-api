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



try {
    $data['games'] = $request->readGames();

    $data['total'] = count($data['games']);
} catch (Exception $e) {
    $data['error'] = $e->getMessage();
}

// print_r($data);







die(json_encode($data));