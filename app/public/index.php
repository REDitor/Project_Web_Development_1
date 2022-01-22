<?php
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: *");

use app\PatternRouter;

session_start();
require_once __DIR__ . '/../patternrouter.php';
$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);

//Must Fix:
//FIXME: !! api not working since implementation of autoload

//TODO: !! use API to load movies and shows
//TODO: !! use javascript to CRUD?
//TODO: !! Implement functionality for cancel button (creating lists)

//Should Fix:
//FIXME: alert after list creation shows before page update
//FIXME: find solution for active nav
//FIXME: User dropdown not aligned correctly

//Want to Fix:
//TODO: make favicon color danger