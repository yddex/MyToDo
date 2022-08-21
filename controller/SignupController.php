<?php
$pdo = require_once './db/db.php';

$UserProvider = new UserProvider($pdo);
$TaskRepository = new TaskRepository($pdo);



$error = null;
if(isset($_POST["username"]) && isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"])){

    ["password" => $password, "confirmPassword" => $confirmPassword] = $_POST;
    $username = htmlentities(strip_tags($_POST["username"]));
    $login = htmlentities(strip_tags($_POST["login"]));

    $patternUsername = '/^[а-яА-ЯёЁa-zA-Z0-9]{2,14}$/';
    $patternLogin = '/^[A-Za-z0-9]{4,14}$/';
    
   
    if(!preg_match($patternUsername, $username)){
        $error = "Неккоректное имя!";

    }elseif(!preg_match($patternLogin, $login)){
        $error = "Неккоректный логин!";

    }elseif($UserProvider->includesLoginInDB($login)){
        $error = "Логин уже занят!";

    }elseif ($password !== $confirmPassword){
        $error = "Пароли не совпадают!";

    }else{
        $UserProvider->registerNewUser($username, $login, $password);
        $user = $UserProvider->getUserByLoginAndPassword($login, $password);
        $TaskRepository->createTableForNewUser($user);
        $_SESSION["user"] = $user;
        header("Location: /");
        die();
    }
}



require './view/signup.php';