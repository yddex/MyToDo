<?php
$pdo = require_once "db/db.php";

$pdo->exec('CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(150) NOT NULL,
    login VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
  )');

//учетка админа
$adminPass = password_hash('123', PASSWORD_DEFAULT);
$adminLogin = "admin";
$pdo->exec("INSERT INTO `users` (`username`, `login`, `password`) VALUES ('Admin', '$adminLogin', '$adminPass')");

//таблица задач для админа
$pdo->exec("CREATE TABLE admintasks (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    description VARCHAR(150) NOT NULL,
    isDone BOOLEAN NOT NULL
  )");
