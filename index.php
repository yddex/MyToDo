<?php
require_once "./model/TaskRepository.php";
require_once "./model/UserProvider.php";
session_start();

$controller = $_GET['controller'] ?? "index";

if(!isset($_SESSION["user"])){

    $routes = require_once "./public_routes.php";
}else{

    $routes = require_once "./auth_routes.php";
}


if(!isset($routes[$controller])){
    $controller = "index";
}

require $routes[$controller];