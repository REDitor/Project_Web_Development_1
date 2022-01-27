<?php
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: *");

use app\PatternRouter;

session_start();
require_once __DIR__ . '/../patternrouter.php';
$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);

//region TODO
//Should:
//TODO: feedback if username incorrect (login has to be implemented through javascript in that case, to be able to reuse the user.js code)

//Want:
//TODO: find solution for active nav
//TODO: message when adding to list showing listname and itemname
//endregion