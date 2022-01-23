<?php
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: *");

use app\PatternRouter;

session_start();
require_once __DIR__ . '/../patternrouter.php';
$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);

//Must:
//FIXME: confirm reloads page when creating watchLists

//TODO: !! On list click show list items (including remove button)
//TODO: !! use javascript to CRUD?
//TODO: !! Implement functionality for cancel button (creating lists)

//Should:
//TODO: !! use API to load movies and shows

//FIXME: alert after list creation shows before page update
//FIXME: find solution for active nav
//FIXME: User dropdown not aligned correctly

//TODO: set repository as construct value in service

//Want:
//TODO: preset queries in repositories
//TODO: make favicon color danger