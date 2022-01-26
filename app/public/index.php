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
//TODO: forgot password

//Must:
//FIXME: !! On list click show list items (including remove button) (element is null)

//TODO: add shows to list like movies

//Should:
//TODO: feedback if username incorrect

//FIXME: find solution for active nav
//FIXME: User dropdown not aligned correctly

//TODO: set repository as construct value in service
//TODO: fix footer spacing

//Want:
//TODO: merge listDetails items together with empty columns for empty data
//TODO: preset queries in repositories
//TODO: make favicon color danger
//endregion