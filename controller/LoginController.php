<?php

$pdo = require_once('./db/db.php');
$userProvider = new UserProvider($pdo);
$error = null;

if(isset($_POST['login']) && isset($_POST['password']))
{
   
    ['login' => $login, 'password' => $password] = $_POST;
    $user = $userProvider->getUserByLoginAndPassword($login, $password);
    if(is_null($user)){
        $error = "Некорректные данные! Повторите попытку.";
    }
    else{
        $_SESSION["user"] = $user;
        header("Location: /");
        die();
    }
}

require './view/login.php';
