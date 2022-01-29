<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

session_start();
require_once __DIR__ . '/../patternrouter.php';
$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);