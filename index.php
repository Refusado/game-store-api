<?php

require "src/Request.php";

$_URL       = explode('/', @$_GET['url']);
$data       = [];
$method     = null;
$request    = new Request;

if ($_URL[0] === "create") {
    require "src/config/headers.php";

    if (
        !empty($_URL[1]) &&
        !empty($_URL[2]) &&
        !empty($_URL[3]) &&
        !empty($_URL[4])
    ) {
        $request->setName($_URL[1]);
        $request->setPrice($_URL[2]);
        $request->setCategory($_URL[3]);
        $request->setCompany($_URL[4]);

        try {
            $data['games'] = $request->insertNewGame();
        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }
    } else {
        $data['message'] = "Please set all data";
    }

    die(json_encode($data));
}

if ($_URL[0] === "games") {
    require "src/config/headers.php";

    if (!empty($_URL[1])) {
        $request->setId($_URL[1]);
    }

    try {
        $data['games'] = $request->getAllGames();

        $data['total'] = count($data['games']);
    } catch (Exception $e) {
        $data['message'] = $e->getMessage();
    }

    die(json_encode($data));
}







if ($_SERVER['REQUEST_URI'] != "/game-store-api/") {
    $rootPath = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    header("location: $rootPath/game-store-api/");
}

echo "<h1>Welcome to Game Store API</h1>";