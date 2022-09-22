<?php

// use function PHPSTORM_META\type;

require_once "Request.php";

$_URL       = explode('/', $_GET['url']);
$data       = [];
$method     = null;
$request    = new Request;

if ($_URL[0] === "create") {
    if (
        !empty($_URL[1]) &&
        !empty($_URL[2]) &&
        !empty($_URL[3]) &&
        !empty($_URL[4])
    ) {
        $request->setName($_URL[1]);
        $request->setPrice($_URL[2]);
        $request->setCompany($_URL[3]);
        $request->setCategory($_URL[4]);

        try {
            $data['games'] = $request->insertNewGame();
        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }
    } else {
        $data['message'] = "Please set all data";
    }
}

if ($_URL[0] === "games") {
    $request->setId($_URL[1]);

    try {
        $data['games'] = $request->getAllGames();

        $data['total'] = count($data['games']);
    } catch (Exception $e) {
        $data['message'] = $e->getMessage();
    }
}




die(json_encode($data));