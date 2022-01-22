<?php
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: *");

namespace app\public;

use app\PatternRouter;

session_start();
require __DIR__ . '/../patternrouter.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();

$router->route($uri);

//TODO: make favicon color danger
//TODO: !! use API to load movies and shows
//TODO: !! use javascript to CRUD?
//TODO: !! Make button addToList show dropdown with different lists connected to that user

//FIXME: !! api not working since implementation of autoload
//FIXME: find solution for active nav
//FIXME: User dropdown not aligned correctly