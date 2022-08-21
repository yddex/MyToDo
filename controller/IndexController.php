<?php

if(isset($_GET["action"]) && $_GET['action'] === "logout"){
    unset($_SESSION["user"]);
    if(isset($_SESSION["tasks"])){
        unset($_SESSION["tasks"]);
    }
    header("Location: /");
}


if(isset($_SESSION["user"])){
    $username = $_SESSION["user"]->getUsername();
}


require_once './view/main.php';